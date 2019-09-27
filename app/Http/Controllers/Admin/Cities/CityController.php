<?php

namespace App\Http\Controllers\Admin\Cities;

use App\Socomir\Cities\Repositories\CityRepository;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\Requests\UpdateCityRequest;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    private $cityRepo;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepo = $cityRepository;
    }


    public function edit($countryId, $provinceId, $cityId)
    {
        return view('admin.cities.edit', [
            'countryId' => $countryId,
            'provinceId' => $provinceId,
            'city'       => $this->cityRepo->findCityById($cityId)
        ]);
    }


    public function update(UpdateCityRequest $request, $countryId, $provinceId, $city)
    {
        $city   = $this->cityRepo->findCityById($city);
        $update = new CityRepository($city);
        $update->updateCity($request->only('name'));

        return redirect()
            ->route('admin.countries.provinces.cities.edit', [$countryId, $provinceId, $city])
            ->with('message', 'Actualización Exitosa!');
    }
}
