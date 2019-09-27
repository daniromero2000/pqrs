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
    private $yearRepo;

    use FinanceTransformable;

    public function __construct(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepo = $yearRepository;
    }


    public function index()
    {
        $list = $this->yearRepo->rootYears('created_at', 'desc');

        return view('admin.years.list', [
            'years' => $this->yearRepo->paginateArrayResults($list->all())
        ]);
    }


    public function create()
    {
        return view('admin.years.create', [
            'years' => $this->yearRepo->listYears('year', 'asc')
        ]);
    }


    public function store(CreateYearRequest $request)
    {
        $this->yearRepo->createYear($request->except('_token', '_method'));

        return redirect()->route('admin.years.index')->with('message', 'Año creado');
    }


    public function show($id)
    {
        $user     = auth()->guard('employee')->user();
        $year     = $this->yearRepo->findYearById($id);
        $cat      = new YearRepository($year);
        $finances = $cat->findFinances();

        if (!empty($finances)) {
            foreach ($finances as $key => $finance) {
                $finances[$key] = $this->transformFinance($finance);
            }
        }

        return view('admin.years.show', [
            'year'     => $year,
            'years'    => $year->children,
            'finances' => $finances,
            'user'     => $user
        ]);
    }


    public function edit($id)
    {
        return view('admin.years.edit', [
            'years' => $this->yearRepo->listYears('year', 'asc', $id),
            'year'  => $this->yearRepo->findYearById($id)
        ]);
    }


    public function update(UpdateYearRequest $request, $id)
    {
        $year   = $this->yearRepo->findYearById($id);
        $update = new YearRepository($year);
        $update->updateYear($request->except('_token', '_method'));
        $request->session()->flash('message', 'Actualización Exitosa!');

        return redirect()->route('admin.years.edit', $id);
    }


    public function destroy(int $id)
    {
        $year = $this->yearRepo->findYearById($id);
        $year->finances()->sync([]);
        $year->delete();
        request()->session()->flash('message', 'Eliminado Satisfactoriamente');

        return redirect()->route('admin.years.index');
    }


    public function removeImage(Request $request)
    {
        $this->yearRepo->deleteFile($request->only('year'));
        request()->session()->flash('message', 'Imagen Eliminada Satisfactoriamente');

        return redirect()->route('admin.years.edit', $request->input('year'));
    }
}
