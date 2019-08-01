<?php

namespace App\Socomir\CustomerCommentaries\Repositories;

use App\Socomir\PqrCommentaries\Commentary;
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
     * @param Commentary $commentary
     */
    public function __construct(Commentary $commentary)
    {
        parent::__construct($commentary);
        $this->model = $commentary;
    }

    /**
     * Create the commentary
     *
     * @param array $data
     *
     * @return Commentary
     * @throws CreatePqrCommentaryErrorException
     */
    public function createCommentary(array $data) : Commentary
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreateCommentaryErrorException('Commentary creation error');
        }
    }

    /**
     * Attach the customer to the commentary
     *
     * @param Commentary $commentary
     * @param Pqr $pqr
     */
    public function attachToPqr(Commentary $commentary, Pqr $pqr)
    {
        $pqr->commentaries()->save($commentary);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateCommentary(array $data): bool
    {
        return $this->update($data);
    }

    /**
     * Soft delete the commentary
     *
     */
    public function deleteCommentary()
    {
        $this->model->pqr()->dissociate();
        return $this->model->delete();
    }

    /**
     * List all the commentary
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return array|Collection
     */
    public function listCommentary(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Return the commentary
     *
     * @param int $id
     *
     * @return PqrCommentary
     * @throws PqrCommentaryNotFoundException
     */
    public function findCommentaryById(int $id) : Commentary
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PqrCommentaryNotFoundException('Commentary not found.');
        }
    }

    /**
     * Return the commentary
     *
     * @param int $id
     *
     * @return PqrCommentary
     * @throws PqrCommentaryNotFoundException
     */
    public function findCustomerCommentaryById(int $id, Pqr $pqr) : Commentary
    {
        try 
        {
            return $pqr
                        ->commentaries()
                        ->whereId($id)
                        ->firstOrFail();
        } 
        catch (ModelNotFoundException $e) 
        {
            throw new PqrCommentaryNotFoundException('Commentary not found.');
        }
    }

    /**
     * Return the customer owner of the commentary
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
    public function searchCommentary(string $text = null) : Collection
    {
        if (is_null($text)) {
            return $this->all(['*'], 'commentary_1', 'asc');
        }
        return $this->model->searchCommentary($text)->get();
    }

    /**
     * @return Collection
     */
    public function findOrders() : Collection
    {
        return $this->model->orders()->get();
    }
}
