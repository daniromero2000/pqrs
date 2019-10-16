<?php

namespace App\Socomir\Lead\Repositories\Interfaces;


use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Lead\Lead;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Support;

interface PqrRepositoryInterface extends BaseRepositoryInterface
{
    public function listLeads(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Support;

    public function createLeads(array $params): lead;

    public function updateLeads(array $params): bool;

    public function findLeadById(int $id): lead;

    public function findLeadByEmail(string $email): lead;

    public function deleteLeads(): bool;

    public function searchLeads(string $text): Collection;

    public function charge(int $amount, array $options);

    public function sendEmailToLeads($lead);

    public function sendEmailNotificationToAdmin($lead);
}
