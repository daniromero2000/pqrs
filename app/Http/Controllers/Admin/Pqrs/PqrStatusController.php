<?php

namespace App\Http\Controllers\Admin\Pqrs;


use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\PqrStatuses\Repositories\PqrStatusRepository;
use App\Socomir\PqrStatuses\Requests\CreatePqrStatusRequest;
use App\Socomir\PqrStatuses\Requests\UpdatePqrStatusRequest;
use App\Http\Controllers\Controller;

class PqrStatusController extends Controller
{
    private $qqrStatuses;


    public function __construct(PqrStatusRepositoryInterface $pqrStatusRepository)
    {
        $this->pqrStatuses = $pqrStatusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('employee')->user();
        return view('admin.pqr-statuses.list', [
            'pqrStatuses' => $this->pqrStatuses->listPqrStatuses(),
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
        return view('admin.pqr-statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePqrStatusRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePqrStatusRequest $request)
    {
        $this->pqrStatuses->createPqrStatus($request->except('_token', '_method'));
        $request->session()->flash('message', 'Creación Exitosa');
        return redirect()->route('admin.pqr-statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.pqr-statuses.edit', ['pqrStatus' => $this->pqrStatuses->findPqrStatusById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePqrStatusRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePqrStatusRequest $request, int $id)
    {
        $pqrStatus = $this->pqrStatuses->findPqrStatusById($id);

        $update = new PqrStatusRepository($pqrStatus);
        $update->updatePqrStatus($request->all());

        $request->session()->flash('message', 'Actualización Exitosa!');
        return redirect()->route('admin.pqr-statuses.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->pqrStatuses->findPqrStatusById($id)->delete();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.pqr-statuses.index');
    }
}