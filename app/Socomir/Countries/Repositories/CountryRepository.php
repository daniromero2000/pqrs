<?php

namespace App\Socomir\Countries\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Countries\Exceptions\CountryInvalidArgumentException;
use App\Socomir\Countries\Exceptions\CountryNotFoundException;
use App\Socomir\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Socomir\Countries\Country;
use Illuminate\Support\Collection;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $country)
    {
        parent::__construct($country);
        $this->model = $country;
    }


    public function listCountries(string $order = 'id', string $sort = 'desc'): Collection
    {
        return $this->model->where('status', 1)->get();
    }


    public function createCountry(array $params): Country
    {
        return $this->create($params);
    }


    public function findCountryById(int $id): Country
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CountryNotFoundException('País no encontrado.');
        }
    }


    public function findProvinces()
    {
        return $this->model->provinces;
    }


    public function updateCountry(array $params): Country
    {
        try {
            $this->model->update($params);
            return $this->findCountryById($this->model->id);
        } catch (QueryException $e) {
            throw new CountryInvalidArgumentException($e->getMessage());
        }
    }


    public function listStates(): Collection
    {
        return $this->model->states()->get();
    }
}
