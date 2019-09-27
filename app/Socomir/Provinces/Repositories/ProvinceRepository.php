<?php

namespace App\Socomir\Provinces\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Countries\Country;
use App\Socomir\Provinces\Exceptions\ProvinceNotFoundException;
use App\Socomir\Provinces\Province;
use App\Socomir\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    public function __construct(Province $province)
    {
        parent::__construct($province);
    }

    public function listProvinces(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection
    {
        return $this->all($columns, $order, $sort);
    }

    public function findProvinceById(int $id): Province
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ProvinceNotFoundException($e->getMessage());
        }
    }


    public function updateProvince(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new ProvinceNotFoundException($e->getMessage());
        }
    }


    public function listCities(int $provinceId): Collection
    {
        return $this->findProvinceById($provinceId)->cities()->get();
    }


    public function findCountry(): Country
    {
        return $this->model->country;
    }
}
