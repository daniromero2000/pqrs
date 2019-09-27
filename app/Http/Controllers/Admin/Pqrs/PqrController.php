<?php

namespace App\Http\Controllers\Admin\Pqrs;

use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\PqrRepository;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Requests\CreatePqrRequest;
use App\Socomir\Pqrs\Requests\UpdatePqrRequest;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use App\Socomir\PqrStatuses\PqrStatus;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\PqrStatuses\Repositories\PqrStatusRepository;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\City;

use App\Http\Controllers\Controller;

class PqrController extends Controller
{
    use PqrTransformable;

    private $pqrRepo;
    private $pqrStatusRepo;
    private $cityRepo;


    public function __construct(
        PqrRepositoryInterface $pqrRepository,
        PqrStatusRepositoryInterface $pqrStatusRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->pqrRepo       = $pqrRepository;
        $this->pqrStatusRepo = $pqrStatusRepository;
        $this->cityRepo      = $cityRepository;
    }


    public function index()
    {
        $list = $this->pqrRepo->listPqrs('created_at', 'desc');

        if (request()->has('q')) {
            $list = $this->pqrRepo->searchPqr(request()->input('q'));
        }

        $pqrs = $list->where('status', 1)->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        return view('admin.pqrs.list', [
            'pqrs' => $this->pqrRepo->paginateArrayResults($pqrs),
            'user' => auth()->guard('employee')->user()
        ]);
    }


    public function create()
    {
        return view('admin.pqrs.create', [
            'statuses' => $this->pqrStatusRepo->listPqrStatuses(),
            'cities'   => City::all()
        ]);
    }


    public function store(CreatePqrRequest $request)
    {
        $this->pqrRepo->createPqr($request->except('_token', '_method'));
        return redirect()->route('admin.pqrs.index');
    }


    public function show(int $id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);

        return view('admin.pqrs.show', [
            'user'            => auth()->guard('employee')->user(),
            'pqr'             => $pqr,
            'pqrcommentaries' => $pqr->pqrcommentaries,
            'currentStatus'   => $this->pqrStatusRepo->findPqrStatusById($pqr->pqr_status_id),
            'city'            => $this->cityRepo->findCityById($pqr->city_id),
        ]);
    }


    public function edit($id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);

        return view('admin.pqrs.edit', [
            'pqr'      => $pqr,
            'statuses' => $this->pqrStatusRepo->listPqrStatuses(),
            'currentStatus' => $this->pqrStatusRepo->findPqrStatusById($pqr->pqr_status_id)
        ]);
    }


    public function update(UpdatePqrRequest $request, $id)
    {
        $pqr    = $this->pqrRepo->findPqrById($id);
        $update = new PqrRepository($pqr);
        $data   = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update->updatePqr($data);
        $request->session()->flash('message', 'Actualización Exitosa!');
        return redirect()->route('admin.pqrs.show', $id);
    }


    public function destroy($id)
    {
        $pqr     = $this->pqrRepo->findPqrById($id);
        $pqrRepo = new PqrRepository($pqr);
        $pqrRepo->deletePqr();

        return redirect()->route('admin.pqrs.index')->with('message', 'Eliminado Satisfactoriamente');
    }


    private function transFormOrder(Collection $list)
    {
        $pqrStatusRepo = new PqrStatusRepository(new PqrStatus());

        return $list->transform(function (Order $pqr) use ($pqrStatusRepo) {
            $pqr->status = $pqrStatusRepo->findPqrStatusById($pqr->order_status_id);
            return $pqr;
        })->all();
    }
}
