<?php

namespace App\Model\Subsidiaries\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Model\Subsidiaries\Subsidiary;
use App\Model\Subsidiaries\Exceptions\SubsidiaryInvalidArgumentException;
use App\Model\Subsidiaries\Exceptions\SubsidiaryNotFoundException;
use App\Model\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use App\Model\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class SubsidiaryRepository extends BaseRepository implements SubsidiaryRepositoryInterface
{
    use UploadableTrait;

    /**
     * SubsidiaryRepository constructor.
     * @param Subsidiary $subsidiary
     */
    public function __construct(Subsidiary $subsidiary)
    {
        parent::__construct($subsidiary);
        $this->model = $subsidiary;
    }

    /**
     * List all the subsidiaries
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listSubsidiaries(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * List all root Subsidiaries
     * 
     * @param  string $order 
     * @param  string $sort  
     * @param  array  $except
     * @return \Illuminate\Support\Collection  
     */
    public function rootSubsidiaries(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->whereIsRoot()
                        ->orderBy($order, $sort)
                        ->get()
                        ->except($except);
    }

    /**
     * Create the subsidiary
     *
     * @param array $params
     *
     * @return Subsidiary
     * @throws SubsidiaryInvalidArgumentException
     * @throws SubsidiaryNotFoundException
     */
    public function createSubsidiary(array $params) : Subsidiary
    {
        try {
            return $this->create($params);
        }
        catch (QueryException $e) {
            throw new SubsidiaryInvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the subsidiary
     *
     * @param array $params
     *
     * @return boolean
     * @throws SubsidiaryNotFoundException
     */
    public function updateSubsidiary(array $params) : bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new ProvinceNotFoundException($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Subsidiary
     * @throws SubsidiaryNotFoundException
     */
    public function findSubsidiaryById(int $id) : Subsidiary
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new SubsidiaryNotFoundException($e->getMessage());
        }
    }

    /**
     * Delete a subsidiary
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteSubsidiary() : bool
    {
        return $this->model->delete();
    }

    
       /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['cover' => null], $file['subsidiary']);
    }

    /**
     * Return the subsidiary by using the slug as the parameter
     *
     * @param array $slug
     *
     * @return Subsidiary
     * @throws SubsidiaryNotFoundException
     */
    public function findSubsidiaryBySlug(array $slug) : Subsidiary
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new SubsidiaryNotFoundException($e);
        }
    }

    /**
     * @return mixed
     */
    public function findParenSubsidiary()
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
