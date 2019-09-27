<?php

namespace App\Socomir\PqrStatuses\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\PqrStatuses\Exceptions\PqrStatusInvalidArgumentException;
use App\Socomir\PqrStatuses\Exceptions\PqrStatusNotFoundException;
use App\Socomir\PqrStatuses\PqrStatus;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class PqrStatusRepository extends BaseRepository implements PqrStatusRepositoryInterface
{
    public function __construct(PqrStatus $pqrStatus)
    {
        parent::__construct($pqrStatus);
        $this->model = $pqrStatus;
    }


    public function createPqrStatus(array $params): PqrStatus
    {
        try {
            return $this->create($params);
        } catch (QueryException $e) {
            throw new PqrStatusInvalidArgumentException($e->getMessage());
        }
    }


    public function updatePqrStatus(array $data): bool
    {
        try {
            return $this->update($data);
        } catch (QueryException $e) {
            throw new PqrStatusInvalidArgumentException($e->getMessage());
        }
    }


    public function findPqrStatusById(int $id): PqrStatus
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrStatusNotFoundException('pqr status not found.');
        }
    }

    public function listPqrStatuses()
    {
        return $this->all();
    }


    public function deletePqrStatus(): bool
    {
        return $this->delete();
    }


    public function findPqrs(): Collection
    {
        return $this->model->pqrs()->get();
    }


    public function findByName(string $name)
    {
        return $this->model->where('name', $name)->first();
    }
}
