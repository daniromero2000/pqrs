<?php

namespace App\Http\Controllers\Admin\Cities;

<<<<<<< HEAD
use App\Socomir\Cities\Repositories\CityRepository;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\Requests\UpdateCityRequest;
=======
use App\Model\Cities\Repositories\CityRepository;
use App\Model\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Model\Cities\Requests\UpdateCityRequest;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepo;

    /**
     * CityController constructor.
     *
     * @param CityRepositoryInterface $cityRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepo = $cityRepository;
    }

    /**
     * Show the edit form
     *
     * @param int $countryId
     * @param int $provinceId
     * @param string $city
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($countryId, $provinceId, $cityId)
    {
        return view('admin.cities.edit', [
            'countryId' => $countryId,
            'provinceId' => $provinceId,
            'city' => $this->cityRepo->findCityById($cityId)
        ]);
    }

    /**
     * Update the city
     *
     * @param UpdateCityRequest $request
     * @param int $countryId
     * @param int $provinceId
     * @param $city
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCityRequest $request, $countryId, $provinceId, $city)
    {
        $city = $this->cityRepo->findCityById($city);
        $update = new CityRepository($city);
        $update->updateCity($request->only('name'));

        return redirect()
            ->route('admin.countries.provinces.cities.edit', [$countryId, $provinceId, $city])
            ->with('message', 'Actualización Exitosa!');
    }
}
