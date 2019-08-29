<?php

namespace App\Http\Controllers\Admin\Years;

use App\Socomir\Years\Repositories\YearRepository;
use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Socomir\Years\Requests\CreateYearRequest;
use App\Socomir\Years\Requests\UpdateYearRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Socomir\Finances\Transformations\FinanceTransformable;

class YearController extends Controller
{
    /**
     * @var YearRepositoryInterface
     */
    private $yearRepo;

    use FinanceTransformable;

    /**
     * YearController constructor.
     *
     * @param YearRepositoryInterface $yearRepository
     */
    public function __construct(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepo = $yearRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->yearRepo->rootYears('created_at', 'desc');

        return view('admin.years.list', [
            'years' => $this->yearRepo->paginateArrayResults($list->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.years.create', [
            'years' => $this->yearRepo->listYears('year', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateYearRequest $request)
    {
        $this->yearRepo->createYear($request->except('_token', '_method'));

        return redirect()->route('admin.years.index')->with('message', 'Año creado');
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
        $year = $this->yearRepo->findYearById($id);

        $cat = new YearRepository($year);

        $finances = $cat->findFinances();

        if (!empty($finances)) {
            foreach ($finances as $key => $finance) {
                $finances[$key] = $this->transformFinance($finance);
            }
        }

        return view('admin.years.show', [
            'year' => $year,
            'years' => $year->children,
            'finances' => $finances,
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
        return view('admin.years.edit', [
            'years' => $this->yearRepo->listYears('year', 'asc', $id),
            'year' => $this->yearRepo->findYearById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateYearRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request, $id)
    {
        $year = $this->yearRepo->findYearById($id);
        $update = new YearRepository($year);
        $update->updateYear($request->except('_token', '_method'));

        $request->session()->flash('message', 'Actualización Exitosa!');
        return redirect()->route('admin.years.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $year = $this->yearRepo->findYearById($id);
        $year->finances()->sync([]);
        $year->delete();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.years.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->yearRepo->deleteFile($request->only('year'));
        request()->session()->flash('message', 'Imagen Eliminada Satisfactoriamente');
        return redirect()->route('admin.years.edit', $request->input('year'));
    }
}
