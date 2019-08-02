<?php

namespace App\Socomir\Pqrs\Repositories\Interfaces;


use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Pqrs\Pqr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Support;

interface PqrRepositoryInterface extends BaseRepositoryInterface
{
    public function listPqrs(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Support;

    public function createPqr(array $params): Pqr;

    public function updatePqr(array $params): bool;

    public function findPqrById(int $id): Pqr;

    public function findPqrByEmail(string $email): Pqr;

    public function deletePqr(): bool;

    public function searchPqr(string $text): Collection;

    public function charge(int $amount, array $options);

    public function sendEmailToPqr($pqr);

    public function sendEmailNotificationToAdmin($pqr);
}
