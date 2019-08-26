<?php

namespace App\Http\Controllers\Front\Pqr;


use App\Http\Controllers\Controller;

use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\PqrRepository;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Requests\CreatePqrRequest;
use App\Socomir\Pqrs\Requests\UpdatePqrFrontRequest;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\City;

class PqrController extends Controller
{
    use PqrTransformable;

    /**
     * @var PqrRepositoryInterface
     */
    private $pqrRepo;

    /**
     * @var PqrStatusRepositoryInterface
     */
    private $pqrStatusRepo;

    private $cityRepo;

    /**
     * PqrController constructor.
     * @param PqrRepositoryInterface $pqrRepository
     */
    public function __construct(
        PqrRepositoryInterface $pqrRepository,
        PqrStatusRepositoryInterface $pqrStatusRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->pqrRepo = $pqrRepository;
        $this->pqrStatusRepo = $pqrStatusRepository;
        $this->cityRepo = $cityRepository;
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pqr()
    {
        return view('front.pqr.pqr');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->pqrRepo->listPqrs('created_at', 'desc');

        if (request()->has('q')) {
            $list = $this->pqrRepo->searchPqr(request()->input('q'));
        }

        $pqrs = $list->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        return view('admin.pqrs.list', [
            'pqrs' => $this->pqrRepo->paginateArrayResults($pqrs),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.pqrs.create', [
            'statuses' => $this->pqrStatusRepo->listPqrStatuses(),
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePqrRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePqrRequest $request)
    {
        $pqr =  $this->pqrRepo->createPqr($request->except('_token', '_method'));
        $request->session()->flash('message', 'Hemos recibido tu PQR satisfactoriamente.');
        return view('front.pqrs.pqrtkspage', [
            'pqr' =>  $this->pqrRepo->findPqrById($pqr->id)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);
        return view('admin.pqrs.show', [
            'user' => auth()->guard('employee')->user(),
            'pqr' =>  $pqr,
            'pqrcommentaries' => $pqr->pqrcommentaries,
            'items' => $pqr->items,
            'currentStatus' => $this->pqrStatusRepo->findPqrStatusById($pqr->pqr_status_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePqrFrontRequest $request
     * @param  int $id
     * @param  int $itemid
     * @return \Illuminate\Http\Response
     */
    public function update()
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pqr = $this->pqrrRepo->findPqrById($id);
        $pqrRepo = new PqrRepository($pqr);
        $pqrRepo->deletePqr();
        return redirect()->route('admin.pqrs.index')->with('message', 'Eliminado Satisfactoriamente');
    }
}
