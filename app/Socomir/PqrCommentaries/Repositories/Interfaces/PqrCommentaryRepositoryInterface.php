<?php

namespace App\Socomir\PqrCommentaries\Repositories\Interfaces;

use App\Socomir\PqrCommentaries\Commentary;
use App\Socomir\Pqrs\Pqr;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PqrCommentaryRepositoryInterface extends BaseRepositoryInterface
{
    public function createCommentary(array $params) : Commentary;

    public function attachToPqr(Commentary $commentary, Pqr $pqr);

    public function updateCommentary(array $update): bool;

    public function deleteCommentary();

    public function listCommentary(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    public function findCommentaryById(int $id) : Commentary;

    public function findPqr() : Pqr;

    public function searchCommentary(string $text) : Collection;


}
