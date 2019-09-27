<?php

namespace App\Http\Controllers\Admin\Countries;

use App\Socomir\Countries\Repositories\CountryRepository;
use App\Socomir\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Socomir\Countries\Requests\UpdateCountryRequest;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    private $countryRepo;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepo = $countryRepository;
    }


    public function index()
    {
        $list = $this->countryRepo->listCountries('created_at', 'desc');

        return view('admin.countries.list', [
            'countries' => $this->countryRepo->paginateArrayResults($list->all(), 10)
        ]);
    }


    public function show(int $id)
    {
        $country     = $this->countryRepo->findCountryById($id);
        $countryRepo = new CountryRepository($country);
        $provinces   = $countryRepo->findProvinces();

        return view('admin.countries.show', [
            'country'   => $country,
            'provinces' => $this->countryRepo->paginateArrayResults($provinces->toArray())
        ]);
    }


    public function edit($id)
    {
        return view('admin.countries.edit', ['country' => $this->countryRepo->findCountryById($id)]);
    }


    public function update(UpdateCountryRequest $request, $id)
    {
        $country = $this->countryRepo->findCountryById($id);
        $update  = new CountryRepository($country);
        $update->updateCountry($request->except('_method', '_token'));
        $request->session()->flash('message', 'Actualización Exitosa!');

        return redirect()->route('admin.countries.edit', $id);
    }
}
