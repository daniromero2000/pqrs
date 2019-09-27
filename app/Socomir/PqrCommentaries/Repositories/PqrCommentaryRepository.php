<?php

namespace App\Socomir\PqrCommentaries\Repositories;

use App\Socomir\PqrCommentaries\PqrCommentary;
use App\Socomir\PqrCommentaries\Exceptions\CreatePqrCommentaryErrorException;
use App\Socomir\PqrCommentaries\Exceptions\PqrCommentaryNotFoundException;
use App\Socomir\PqrCommentaries\Repositories\Interfaces\PqrCommentaryRepositoryInterface;
use App\Socomir\PqrCommentaries\Transformations\PqrCommentaryTransformable;
use App\Socomir\Pqrs\Pqr;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;

class PqrCommentaryRepository extends BaseRepository implements PqrCommentaryRepositoryInterface
{
    use PqrCommentaryTransformable;

    public function __construct(PqrCommentary $pqrcommentary)
    {
        parent::__construct($pqrcommentary);
        $this->model = $pqrcommentary;
    }


    public function createPqrCommentary(array $data): PqrCommentary
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreatePqrCommentaryErrorException('PqrCommentary creation error');
        }
    }


    public function attachToPqr(PqrCommentary $pqrcommentary, Pqr $pqr)
    {
        $pqr->pqrcommentaries()->save($pqrcommentary);
    }


    public function updatePqrCommentary(array $data): bool
    {
        return $this->update($data);
    }


    public function deletePqrCommentary()
    {
        $this->model->pqr()->dissociate();
        return $this->model->delete();
    }


    public function listPqrCommentary(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection
    {
        return $this->all($columns, $order, $sort);
    }


    public function findPqrCommentaryById(int $id): PqrCommentary
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrCommentaryNotFoundException('PqrCommentary not found.');
        }
    }

    public function findPqr(): Pqr
    {
        return $this->model->pqr;
    }


    public function searchPqrCommentary(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->all(['*'], 'pqrcommentary_1', 'asc');
        }
        return $this->model->searchPqrCommentary($text)->get();
    }


    public function findOrders(): Collection
    {
        return $this->model->orders()->get();
    }
}
