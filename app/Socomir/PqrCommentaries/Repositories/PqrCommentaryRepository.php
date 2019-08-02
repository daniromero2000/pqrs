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

    /**
     * CommentaryRepository constructor.
     * @param PqrCommentary $pqrcommentary
     */
    public function __construct(PqrCommentary $pqrcommentary)
    {
        parent::__construct($pqrcommentary);
        $this->model = $pqrcommentary;
    }

    /**
     * Create the pqrcommentary
     *
     * @param array $data
     *
     * @return PqrCommentary
     * @throws CreatePqrCommentaryErrorException
     */
    public function createPqrCommentary(array $data) : PqrCommentary
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreatePqrCommentaryErrorException('PqrCommentary creation error');
        }
    }

    /**
     * Attach the pqr to the pqrcommentary
     *
     * @param PqrCommentary $commentary
     * @param Pqr $pqr
     */
    public function attachToPqr(PqrCommentary $pqrcommentary, Pqr $pqr)
    {
        $pqr->pqrcommentaries()->save($pqrcommentary);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updatePqrCommentary(array $data): bool
    {
        return $this->update($data);
    }

    /**
     * Soft delete the pqrcommentary
     *
     */
    public function deletePqrCommentary()
    {
        $this->model->pqr()->dissociate();
        return $this->model->delete();
    }

    /**
     * List all the pqrcommentary
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return array|Collection
     */
    public function listPqrCommentary(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Return the pqrcommentary
     *
     * @param int $id
     *
     * @return PqrCommentary
     * @throws PqrCommentaryNotFoundException
     */
    public function findPqrCommentaryById(int $id) : PqrCommentary
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrCommentaryNotFoundException('PqrCommentary not found.');
        }
    }

    // /**
    //  * Return the pqrcommentary
    //  *
    //  * @param int $id
    //  *
    //  * @return PqrCommentary
    //  * @throws PqrCommentaryNotFoundException
    //  */
    // public function findPqrCommentaryById(int $id, Pqr $pqr) : Pqr
    // {
    //     try 
    //     {
    //         return $pqr
    //                     ->pqrcommentaries()
    //                     ->whereId($id)
    //                     ->firstOrFail();
    //     } 
    //     catch (ModelNotFoundException $e) 
    //     {
    //         throw new PqrCommentaryNotFoundException('PqrCommentary not found.');
    //     }
    // }

    /**
     * Return the pqr owner of the pqrcommentary
     *
     * @return Pqr
     */
    public function findPqr() : Pqr
    {
        return $this->model->pqr;
    }

    /**
     * @param string $text
     * @return mixed
     */
    public function searchPqrCommentary(string $text = null) : Collection
    {
        if (is_null($text)) {
            return $this->all(['*'], 'pqrcommentary_1', 'asc');
        }
        return $this->model->searchPqrCommentary($text)->get();
    }

    /**
     * @return Collection
     */
    public function findOrders() : Collection
    {
        return $this->model->orders()->get();
    }
}
