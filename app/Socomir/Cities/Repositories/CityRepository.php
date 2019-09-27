<?php

namespace App\Socomir\Cities\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Cities\Exceptions\CityNotFoundException;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Socomir\Cities\City;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $city)
    {
        parent::__construct($city);
        $this->model = $city;
    }


    public function listCities($columns = ['*'], string $orderBy = 'name', string $sortBy = 'asc')
    {
        return $this->all($columns, $orderBy, $sortBy);
    }


    public function findCityById(int $id): City
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CityNotFoundException('Ciudad no encontrada.');
        }
    }


    public function updateCity(array $params): bool
    {
        $this->model->update($params);
        return $this->model->save();
    }


    public function findCityByName(string $name): City
    {
        try {
            return $this->model->where(compact('name'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new CityNotFoundException('Ciudad no encontrada.');
        }
    }
}
