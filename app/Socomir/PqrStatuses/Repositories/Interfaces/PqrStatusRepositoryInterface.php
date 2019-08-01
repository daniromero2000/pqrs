<?php

namespace App\Socomir\PqrStatuses\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\PqrStatuses\PqrStatus;
use Illuminate\Support\Collection;

interface PqrStatusRepositoryInterface extends BaseRepositoryInterface
{
    public function createPqrStatus(array $pqrStatusData) : PqrStatus;

    public function updatePqrStatus(array $data) : bool;

    public function findPqrStatusById(int $id) : PqrStatus;

    public function listPqrStatuses();

    public function deletePqrStatus() : bool;

    public function findPqrs(): Collection;

    public function findByName(string $name);
}
