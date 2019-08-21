<?php

namespace App\Http\Controllers\Admin\PqrCommentaries;

use App\Socomir\PqrCommentaries\PqrCommentary;
use App\Socomir\PqrCommentaries\Repositories\PqrCommentaryRepository;
use App\Socomir\PqrCommentaries\Repositories\Interfaces\PqrCommentaryRepositoryInterface;
use App\Socomir\PqrCommentaries\Requests\CreatePqrCommentaryRequest;
use App\Socomir\PqrCommentaries\Requests\UpdatePqrCommentaryRequest;
use App\Socomir\PqrCommentaries\Transformations\PqrCommentaryTransformable;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PqrCommentaryController extends Controller
{
    use PqrCommentaryTransformable;

    private $pqrcommentaryRepo;
    private $pqrRepo;

    public function __construct(
        PqrCommentaryRepositoryInterface $pqrcommentaryRepository,
        PqrRepositoryInterface $pqrRepository
    ) {
        $this->pqrcommentaryRepo = $pqrcommentaryRepository;
        $this->pqrRepo = $pqrRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->pqrcommentaryRepo->listPqrCommentary('created_at', 'desc');

        if ($request->has('q')) {
            $list = $this->pqrcommentaryRepo->searchPqrCommentary($request->input('q'));
        }

        $pqrcommentaries = $list->map(function (PqrCommentary $pqrcommentary) {
            return $this->transformPqrCommentary($pqrcommentary);
        })->all();

        return view('admin.pqrCommentaries.list', ['pqrcommentaries' => $this->pqrcommentaryRepo->paginateArrayResults($pqrcommentaries)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pqrs = $this->pqrRepo->listpqrs();
        return view('admin.pqrCommentaries.create', [
            'pqrs' => $pqrs,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePqrCommentaryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePqrCommentaryRequest $request)
    {
        $this->pqrcommentaryRepo->createPqrCommentary($request->except('_token', '_method'));
        $request->session()->flash('message', 'Creación Exitosa');
        return back()->with('message','Operation Successful !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return view('admin.pqrCommentaries.show', ['pqrcommentary' => $this->pqrcommentaryRepo->findPqrCommentaryById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {

        $pqrcommentary = $this->pqrcommentaryRepo->findPqrCommentaryById($id);
        $pqrcommentaryRepo = new PqrCommentaryRepository($pqrcommentary);
        $pqr = $pqrcommentaryRepo->findPqr();

        return view('admin.pqrCommentaries.edit',  [
            'pqrcommentary' => $pqrcommentary,
            'pqrs' => $this->pqrRepo->listPqrs(),
            'pqrId' => $pqr->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePqrCommentaryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePqrCommentaryRequest $request, $id)
    {
        $pqrcommentary = $this->pqrcommentaryRepo->findPqrCommentaryById($id);

        $update = new PqrCommentaryRepository($pqrcommentary);
        $update->updatePqrCommentary($request->except('_method', '_token'));

        $request->session()->flash('message', 'Actualización Exitosa!');
        return redirect()->route('admin.pqrCommentaries.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pqrcommentary = $this->pqrcommentaryRepo->findPqrCommentaryById($id);
        $delete = new PqrCommentaryRepository($pqrcommentary);
        $delete->deletePqrCommentary();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.pqrCommentaries.index');
    }
}
