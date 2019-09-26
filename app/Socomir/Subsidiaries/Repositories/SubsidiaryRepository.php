<?php

namespace App\Socomir\Subsidiaries\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Subsidiaries\Subsidiary;
use App\Socomir\Subsidiaries\Exceptions\SubsidiaryInvalidArgumentException;
use App\Socomir\Subsidiaries\Exceptions\SubsidiaryNotFoundException;
use App\Socomir\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class SubsidiaryRepository extends BaseRepository implements SubsidiaryRepositoryInterface
{
    public function __construct(Subsidiary $subsidiary)
    {
        parent::__construct($subsidiary);
        $this->model = $subsidiary;
    }


    public function listSubsidiaries(string $order = 'id', string $sort = 'desc', $except = []): Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }


    public function rootSubsidiaries(string $order = 'id', string $sort = 'desc', $except = []): Collection
    {
        return $this->model->whereIsRoot()
            ->orderBy($order, $sort)
            ->get()
            ->except($except);
    }

    public function createSubsidiary(array $params): Subsidiary
    {
        try {
            return $this->create($params);
        } catch (QueryException $e) {
            throw new SubsidiaryInvalidArgumentException($e->getMessage());
        }
    }


    public function updateSubsidiary(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new ProvinceNotFoundException($e->getMessage());
        }
    }


    public function findSubsidiaryById(int $id): Subsidiary
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new SubsidiaryNotFoundException($e->getMessage());
        }
    }


    public function deleteSubsidiary(): bool
    {
        return $this->model->delete();
    }


    public function deleteFile(array $file, $disk = null): bool
    {
        return $this->update(['cover' => null], $file['subsidiary']);
    }


    public function findSubsidiaryBySlug(array $slug): Subsidiary
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new SubsidiaryNotFoundException($e);
        }
    }


    public function findParenSubsidiary()
    {
        return $this->model->parent;
    }


    public function findChildren()
    {
        return $this->model->children;
    }
}
