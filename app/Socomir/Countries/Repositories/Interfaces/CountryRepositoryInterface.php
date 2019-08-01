<?php

namespace App\Socomir\Countries\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Countries\Country;
use Illuminate\Support\Collection;

interface CountryRepositoryInterface extends BaseRepositoryInterface
{
    public function updateCountry(array $params) : Country;

    public function listCountries(string $order = 'id', string $sort = 'desc') : Collection;

    public function createCountry(array $params) : Country;

    public function findCountryById(int $id) : Country;

    public function findProvinces();

    public function listStates() : Collection;
}
