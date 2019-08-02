<?php

namespace App\Socomir\PqrCommentaries\Repositories\Interfaces;

use App\Socomir\PqrCommentaries\PqrCommentary;
use App\Socomir\Pqrs\Pqr;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PqrCommentaryRepositoryInterface extends BaseRepositoryInterface
{
    public function createPqrCommentary(array $params) : PqrCommentary;

    public function attachToPqr(PqrCommentary $pqrcommentary, Pqr $pqr);

    public function updatePqrCommentary(array $update): bool;

    public function deletePqrCommentary();

    public function listPqrCommentary(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    public function findPqrCommentaryById(int $id) : PqrCommentary;

    public function findPqr() : Pqr;

    public function searchPqrCommentary(string $text) : Collection;


}
