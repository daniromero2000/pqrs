<?php

namespace App\Socomir\Provinces\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Socomir\Countries\Country;
use App\Socomir\Provinces\Province;
use Illuminate\Support\Collection;

interface ProvinceRepositoryInterface extends BaseRepositoryInterface
{
    public function listProvinces(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    public function findProvinceById(int $id) : Province;

    public function updateProvince(array $params) : bool;

    public function listCities(int $provinceId);

    public function findCountry() : Country;
}
