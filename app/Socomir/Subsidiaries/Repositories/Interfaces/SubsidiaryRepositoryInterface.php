<?php

namespace App\Socomir\Subsidiaries\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Subsidiaries\Subsidiary;
use Illuminate\Support\Collection;
use App\Socomir\Subsidiaries\SubsidiaryRepository;

interface SubsidiaryRepositoryInterface extends BaseRepositoryInterface
{
    public function listSubsidiaries(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createSubsidiary(array $params) : Subsidiary;

    public function updateSubsidiary(array $params) : bool;

    public function findSubsidiaryById(int $id) : Subsidiary;

    public function deleteSubsidiary() : bool;

        public function deleteFile(array $file, $disk = null) : bool;

    public function findSubsidiaryBySlug(array $slug) : Subsidiary;

    public function rootSubsidiaries(string $string, string $string1);
}
