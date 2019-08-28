<?php

namespace App\Socomir\Years\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Years\Year;
use App\Socomir\Finances\Finance;
use Illuminate\Support\Collection;
use App\Socomir\Years\YearRepository;

interface YearRepositoryInterface extends BaseRepositoryInterface
{
    public function listYears(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createYear(array $params) : Year;

    public function updateYear (array $params) : Year;

    public function findYearById(int $id) : Year;

    public function deleteYear() : bool;

    public function associateFinance(Finance $finance);

    public function findFinances() : Collection;

    public function syncFinances(array $params);

    public function detachFinances();

    public function findYearBySlug(array $slug) : Year;

    public function rootYears(string $string, string $string1);
}
