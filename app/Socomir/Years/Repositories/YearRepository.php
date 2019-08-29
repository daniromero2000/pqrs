<?php

namespace App\Socomir\Years\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Years\Year;
use App\Socomir\Years\Exceptions\YearInvalidArgumentException;
use App\Socomir\Years\Exceptions\YearNotFoundException;
use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use App\Socomir\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class YearRepository extends BaseRepository implements YearRepositoryInterface
{
    use UploadableTrait, FinanceTransformable;

    /**
     * YearRepository constructor.
     * @param Year $year
     */
    public function __construct(Year $year)
    {
        parent::__construct($year);
        $this->model = $year;
    }

    /**
     * List all the years
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listYears(string $order = 'id', string $sort = 'desc', $except = []): Collection
    {
        return $this->model->orderBy($order, $sort)->where('status', 1)->get()->except($except);
    }

    /**
     * List all root years
     *
     * @param  string $order
     * @param  string $sort
     * @param  array  $except
     * @return \Illuminate\Support\Collection
     */
    public function rootYears(string $order = 'id', string $sort = 'desc', $except = []): Collection
    {
        return $this->model->whereIsRoot()
            ->orderBy($order, $sort)
            ->get()
            ->except($except);
    }

    /**
     * Create the year
     *
     * @param array $params
     *
     * @return Year
     * @throws YearInvalidArgumentException
     * @throws YearNotFoundException
     */
    public function createYear(array $params): Year
    {
        try {
            $collection = collect($params);
            if (isset($params['year'])) {
                $slug = str_slug($params['year']);
            }

            if (isset($params['cover']) && ($params['cover'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['cover'], 'years');
            }

            $merge = $collection->merge(compact('slug'));

            $year = new Year($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findYearById($params['parent']);
                $year->parent()->associate($parent);
            }

            $year->save();
            return $year;
        } catch (QueryException $e) {
            throw new YearInvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the Year
     *
     * @param array $params
     *
     * @return Year
     * @throws YearNotFoundException
     */
    public function updateYear(array $params): Year
    {
        $year = $this->findYearById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = str_slug($collection->get('year'));

        $merge = $collection->merge(compact('slug'));
        if (isset($params['parent'])) {
            $parent = $this->findYearById($params['parent']);
            $year->parent()->associate($parent);
        }

        $year->update($merge->all());
        return $year;
    }

    /**
     * @param int $id
     * @return Year
     * @throws YearNotFoundException
     */
    public function findYearById(int $id): Year
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CategoryNotFoundException($e->getMessage());
        }
    }

    /**
     * Delete a years
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteYear(): bool
    {
        return $this->model->delete();
    }

    /**
     * Associate a finance in a years
     *
     * @param Finance $finance
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function associateFinance(Finance $finance)
    {
        return $this->model->finances()->save($finance);
    }

    /**
     * Return all the finances associated with the year
     *
     * @return mixed
     */
    public function findFinances(): Collection
    {
        return $this->model->finances;
    }

    /**
     * @param array $params
     */
    public function syncFinances(array $params)
    {
        $this->model->finances()->sync($params);
    }

    /**
     * Detach the association of the finance
     *
     */
    public function detachFinances()
    {
        $this->model->finances()->detach();
    }

    /**
     * Return the years by using the slug as the parameter
     *
     * @param array $slug
     *
     * @return Year
     * @throws YearNotFoundException
     */
    public function findYearBySlug(array $slug): Year
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new YearNotFoundException($e);
        }
    }

    /**
     * @return mixed
     */
    public function findParentYear()
    {
        return $this->model->parent;
    }

    /**
     * @return mixed
     */
    public function findChildren()
    {
        return $this->model->children;
    }
}
