<?php

namespace App\Http\Controllers\Admin\PqrCommentaries;

use App\Socomir\PqrCommentaries\Repositories\Interfaces\PqrCommentaryRepositoryInterface;
use App\Socomir\PqrCommentaries\Requests\CreatePqrCommentaryRequest;
use App\Socomir\PqrCommentaries\Transformations\PqrCommentaryTransformable;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Http\Controllers\Controller;


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
        $this->pqrRepo           = $pqrRepository;
    }

    public function create()
    {
        return view('admin.pqrCommentaries.create', [
            'pqrs' => $this->pqrRepo->listpqrs(),
            'user' => auth()->guard('employee')->user()
        ]);
    }


    public function store(CreatePqrCommentaryRequest $request)
    {
        $this->pqrcommentaryRepo->createPqrCommentary($request->except('_token', '_method'));
        $request->session()->flash('message', 'Creación Exitosa');
        return back()->with('message', 'Comentario guardado.');
    }
}
