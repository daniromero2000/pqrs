<?php

namespace App\Http\Controllers\Front\Pqr;

use App\Http\Controllers\Controller;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Requests\CreatePqrRequest;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\City;

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


    public function pqr()
    {
        return view('front.pqr.pqr');
    }

    public function create()
    {
        return view('front.pqrs.create', [
            'statuses' => $this->pqrStatusRepo->listPqrStatuses(),
            'cities'   => City::all()
        ]);
    }


    public function store(CreatePqrRequest $request)
    {
        $pqr =  $this->pqrRepo->createPqr($request->except('_token', '_method'));
        $request->session()->flash('message', 'Hemos recibido tu PQR satisfactoriamente.');
        return view('front.pqrs.pqrtkspage', [
            'pqr' =>  $this->pqrRepo->findPqrById($pqr->id)
        ]);
    }


    public function show(int $id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);

        return view('admin.pqrs.show', [
            'user'            => auth()->guard('employee')->user(),
            'pqr'             => $pqr,
            'pqrcommentaries' => $pqr->pqrcommentaries,
            'items'           => $pqr->items,
            'currentStatus'   => $this->pqrStatusRepo->findPqrStatusById($pqr->pqr_status_id)
        ]);
    }


    public function edit()
    { }

    public function update()
    { }
}
