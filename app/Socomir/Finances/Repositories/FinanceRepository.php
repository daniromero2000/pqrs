<?php

namespace App\Socomir\Finances\Repositories;

use App\Socomir\Finances\Exceptions\FinanceCreateErrorException;
use App\Socomir\Finances\Exceptions\FinanceUpdateErrorException;
use App\Socomir\Tools\UploadableTrait;
use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\FinanceImages\FinanceImage;
use App\Socomir\Finances\Exceptions\FinanceNotFoundException;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FinanceRepository extends BaseRepository implements FinanceRepositoryInterface
{
    use FinanceTransformable, UploadableTrait;

    /**
     * FinanceRepository constructor.
     * @param Finance $finance
     */
    public function __construct(Finance $finance)
    {
        parent::__construct($finance);
        $this->model = $finance;
    }

    /**
     * List all the finances
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listFinances(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the finance
     *
     * @param array $data
     *
     * @return Finance
     * @throws FinanceCreateErrorException
     */
    public function createFinance(array $data): Finance
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new FinanceCreateErrorException($e);
        }
    }

    /**
     * Update the finance
     *
     * @param array $data
     *
     * @return bool
     * @throws FinanceUpdateErrorException
     */
    public function updateFinance(array $data): bool
    {
        $filtered = collect($data)->except('image')->all();

        try {
            return $this->model->where('id', $this->model->id)->update($filtered);
        } catch (QueryException $e) {
            throw new FinanceUpdateErrorException($e);
        }
    }

    /**
     * Find the finance by ID
     *
     * @param int $id
     *
     * @return Finance
     * @throws FinanceNotFoundException
     */
    public function findFinanceById(int $id): Finance
    {
        try {
            return $this->transformFinance($this->findOneOrFail($id));
        } catch (ModelNotFoundException $e) {
            throw new FinanceNotFoundException($e);
        }
    }

    /**
     * Delete the finance
     *
     * @param Finance $finance
     *
     * @return bool
     * @throws \Exception
     * @deprecated
     * @use removeFinance
     */
    public function deleteFinance(Finance $finance): bool
    {
        $finance->images()->delete();
        return $finance->delete();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function removeFinance(): bool
    {
        return $this->model->where('id', $this->model->id)->delete();
    }

    /**
     * Detach the categories
     */
    public function detachYears()
    {
        $this->model->years()->detach();
    }

    /**
     * Return the categories which the finance is associated with
     *
     * @return Collection
     */
    public function getYears(): Collection
    {
        return $this->model->years()->get();
    }

    /**
     * Sync the categories
     *
     * @param array $params
     */
    public function syncYears(array $params)
    {
        $this->model->years()->sync($params);
    }

    
    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null): bool
    {
        return $this->update(['cover' => null], $file['finance']);
    }

    /**
     * @param string $src
     * @return bool
     */
    public function deleteThumb(string $src): bool
    {
        return DB::table('finance_images')->where('src', $src)->delete();
    }

    /**
     * Get the finance via slug
     *
     * @param array $slug
     *
     * @return Finance
     * @throws FinanceNotFoundException
     */
    public function findFinanceBySlug(array $slug): Finance
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new FinanceNotFoundException($e);
        }
    }

    /**
     * @param string $text
     * @return mixed
     */
    public function searchFinance(string $text): Collection
    {
        if (!empty($text)) {
            return $this->model->searchFinance($text);
        } else {
            return $this->listFinances();
        }
    }

    /**
     * @return mixed
     */
    public function findFinanceImages(): Collection
    {
        return $this->model->images()->get();
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file): string
    {
dd('entre a guardar imagen');

        return $file->store('finances', ['disk' => 'public']);
    }

    /**
     * @param Collection $collection
     *
     * @return void
     */
    public function saveFinanceImages(Collection $collection)
    {
        $collection->each(function (UploadedFile $file) {
            $filename = $this->storeFile($file);
            $financeImage = new FinanceImage([
                'finance_id' => $this->model->id,
                'src' => $filename
            ]);
            $this->model->images()->save($financeImage);
        });
    }
}
