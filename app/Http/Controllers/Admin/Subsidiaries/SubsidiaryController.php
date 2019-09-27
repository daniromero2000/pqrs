<?php

namespace App\Http\Controllers\Admin\Subsidiaries;

use App\Socomir\Subsidiaries\Repositories\SubsidiaryRepository;
use App\Socomir\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use App\Socomir\Subsidiaries\Requests\CreateSubsidiaryRequest;
use App\Socomir\Subsidiaries\Requests\UpdateSubsidiaryRequest;
use App\Socomir\Cities\City;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubsidiaryController extends Controller
{
    private $subsidiaryRepo;
    private $cityRepo;


    public function __construct(
        SubsidiaryRepositoryInterface $subsidiaryRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->subsidiaryRepo = $subsidiaryRepository;
        $this->cityRepo       = $cityRepository;
    }


    public function index()
    {
        $list = $this->subsidiaryRepo->rootSubsidiaries('name', 'asc');

        return view('admin.subsidiaries.list', [
            'subsidiaries' => $this->subsidiaryRepo->paginateArrayResults($list->all()),
            'user'         => auth()->guard('employee')->user()
        ]);
    }


    public function create()
    {
        return view('admin.subsidiaries.create', [
            'cities'       => City::all(),
            'subsidiaries' => $this->subsidiaryRepo->listSubsidiaries('name', 'asc')
        ]);
    }


    public function store(CreateSubsidiaryRequest $request)
    {
        $this->subsidiaryRepo->createSubsidiary($request->except('_token', '_method'));

        return redirect()->route('admin.subsidiaries.index')->with('message', 'Sucursal creada');
    }


    public function show($id)
    {
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);

        return view('admin.subsidiaries.show', [
            'subsidiary'   => $subsidiary,
            'subsidiaries' => $subsidiary->children,
            'user'         => auth()->guard('employee')->user()
        ]);
    }


    public function edit($id)
    {
        $subsidiary     = $this->subsidiaryRepo->findSubsidiaryById($id);

        return view('admin.subsidiaries.edit ', [
            'subsidiary' => $subsidiary,
            'cities'     => $this->cityRepo->listCities(),
            'cityId'     => $subsidiary->city_id,
        ]);
    }


    public function update(UpdateSubsidiaryRequest $request, $id)
    {
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);
        $update     = new SubsidiaryRepository($subsidiary);
        $update->updateSubsidiary($request->except('_token', '_method'));

        $request->session()->flash('message', 'Actualizacion Exitosa');
        return redirect()->route('admin.subsidiaries.edit', $id);
    }


    public function destroy(int $id)
    {
        $subsidiary     = $this->subsidiaryRepo->findSubsidiaryById($id);
        $subsidiaryRepo = new SubsidiaryRepository($subsidiary);
        $subsidiaryRepo->deleteSubsidiary();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.subsidiaries.index');
    }


    public function removeImage(Request $request)
    {
        $this->subsidiaryRepo->deleteFile($request->only('subsidiary'));
        request()->session()->flash('message', 'Imagen Eliminada Satisfactoriamente');
        return redirect()->route('admin.subsidiaries.edit', $request->input('subsidiary'));
    }
}
