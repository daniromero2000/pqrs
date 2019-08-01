<?php

namespace App\Http\Controllers\Admin\Subsidiaries;

use App\Socomir\Subsidiaries\Repositories\SubsidiaryRepository;
use App\Socomir\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use App\Socomir\Subsidiaries\Requests\CreateSubsidiaryRequest;
use App\Socomir\Subsidiaries\Requests\UpdateSubsidiaryRequest;
use App\Socomir\Products\Transformations\ProductTransformable;
use App\Socomir\Cities\City;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Socomir\ProductStatuses\ProductStatus;
use App\Socomir\ProductStatuses\Repositories\Interfaces\ProductStatusRepositoryInterface;
use App\Socomir\ProductStatuses\Repositories\ProductStatusRepository;

class SubsidiaryController extends Controller
{

    /**
     * @var SubsidiaryRepositoryInterface
     */
    private $subsidiaryRepo;
    private $cityRepo;

    /**
     * SubsidiaryController constructor.
     *
     * @param SubsidiaryRepositoryInterface $subsidiaryRepository
     */
    public function __construct(
        SubsidiaryRepositoryInterface $subsidiaryRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->subsidiaryRepo = $subsidiaryRepository;
        $this->cityRepo = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('employee')->user();
        $list = $this->subsidiaryRepo->rootSubsidiaries('created_at', 'desc');

        return view('admin.subsidiaries.list', [
            'subsidiaries' => $this->subsidiaryRepo->paginateArrayResults($list->all()),
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subsidiaries.create', [
            'cities' => City::all(),
            'subsidiaries' => $this->subsidiaryRepo->listSubsidiaries('name', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubsidiaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubsidiaryRequest $request)
    {
        $this->subsidiaryRepo->createSubsidiary($request->except('_token', '_method'));

        return redirect()->route('admin.subsidiaries.index')->with('message', 'Sucursal creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = auth()->guard('employee')->user();
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);
        $cat = new SubsidiaryRepository($subsidiary);



        return view('admin.subsidiaries.show', [
            'statuses' => $this->productStatusRepo->listProductStatuses(),
            'subsidiary' => $subsidiary,
            'subsidiaries' => $subsidiary->children,

            'user' =>  $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);
        $SubsidiaryRepo = new SubsidiaryRepository($subsidiary);
        return view('admin.subsidiaries.edit', [
            'subsidiary' => $subsidiary,
            'cities' => $this->cityRepo->listCities(),
            'cityId' => $subsidiary->city_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubsidiaryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubsidiaryRequest $request, $id)
    {
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);

        $update = new SubsidiaryRepository($subsidiary);
        $update->updateSubsidiary($request->except('_token', '_method'));

        $request->session()->flash('message', 'Actualizacion Exitosa');
        return redirect()->route('admin.subsidiaries.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $subsidiary = $this->subsidiaryRepo->findSubsidiaryById($id);
        $subsidiary->delete();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.subsidiaries.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->subsidiaryRepo->deleteFile($request->only('subsidiary'));
        request()->session()->flash('message', 'Imagen Eliminada Satisfactoriamente');
        return redirect()->route('admin.subsidiaries.edit', $request->input('subsidiary'));
    }
}
