<?php

namespace App\Http\Controllers\Admin\Finances;


use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Socomir\Finances\Repositories\FinanceRepository;
use App\Socomir\Finances\Requests\CreateFinanceRequest;
use App\Socomir\Finances\Requests\UpdateFinanceRequest;
use App\Http\Controllers\Controller;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use App\Socomir\Tools\UploadableTrait;
use Illuminate\Http\UploadedFile;

class FinanceController extends Controller
{
    use FinanceTransformable, UploadableTrait;

    private $financeRepo;
    private $yearRepo;

    public function __construct(
        YearRepositoryInterface $yearRepository,
        FinanceRepositoryInterface $financeRepository
    ) {
        $this->financeRepo = $financeRepository;
        $this->yearRepo    = $yearRepository;
        $this->middleware(['permission:create-finance, guard:employee'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:update-finance, guard:employee'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete-finance, guard:employee'], ['only' => ['destroy']]);
        $this->middleware(['permission:view-finance, guard:employee'], ['only' => ['index', 'show']]);
    }

    public function index()
    {
        $list = $this->financeRepo->listFinances('id');

        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->financeRepo->searchFinance(request()->input('q'));
        }

        $finances = $list->map(function (Finance $item) {
            return $this->transformFinance($item);
        })->all();

        return view('admin.finances.list', [
            'finances' => $this->financeRepo->paginateArrayResults($finances, 25),
            'user'     => auth()->guard('employee')->user()
        ]);
    }


    public function create()
    {
        return view('admin.finances.create', [
            'years'   => $this->yearRepo->listYears('year', 'asc')->where('parent_id', 1),
            'finance' => new Finance
        ]);
    }


    public function store(CreateFinanceRequest $request)
    {
        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->financeRepo->saveCoverImage($request->file('cover'));
        }

        $data['slug'] = str_slug($request->input('name'));
        $finance      = $this->financeRepo->createFinance($data);
        $financeRepo  = new FinanceRepository($finance);

        if ($request->hasFile('image')) {
            $financeRepo->saveFinanceImages(collect($request->file('image')));
        }

        $financeRepo = new FinanceRepository($finance);
        if ($request->hasFile('image')) {
            $financeRepo->saveFinanceImages(collect($request->file('image')));
        }

        if ($request->has('years')) {
            $financeRepo->syncYears($request->input('years'));
        } else {
            $financeRepo->detachYears();
        }

        return redirect()->route('admin.finances.show', $finance->id)->with('message', 'Creación Exitosa');
    }


    public function show(int $id)
    {
        return view('admin.finances.show', [
            'finance' => $this->financeRepo->findFinanceById($id)
        ]);
    }


    public function edit(int $id)
    {
        $finance = $this->financeRepo->findFinanceById($id);

        return view('admin.finances.edit', [
            'finance'      => $finance,
            'years'        => $this->yearRepo->listYears('year', 'asc')->where('parent_id', 1),
            'selectedIdsC' => $finance->years()->pluck('year_id')->all()
        ]);
    }


    public function update(UpdateFinanceRequest $request, int $id)
    {
        $finance     = $this->financeRepo->findFinanceById($id);
        $financeRepo = new FinanceRepository($finance);

        $data = $request->except(
            'years',
            '_token',
            '_method',
            'default'
        );

        if ($request->hasFile('cover')) {
            $data['cover'] = $financeRepo->saveCoverImage($request->file('cover'));
        }

        if ($request->has('years')) {
            $financeRepo->syncYears($request->input('years'));
        } else {
            $financeRepo->detachYears();
        }

        $financeRepo->updateFinance($data);

        return redirect()->route('admin.finances.show', $id)
            ->with('message', 'Actualización Exitosa!');
    }


    public function destroy($id)
    {
        $finance = $this->financeRepo->findFinanceById($id);
        $finance->years()->sync([]);
        $financeRepo = new FinanceRepository($finance);
        $financeRepo->removeFinance();

        return redirect()->route('admin.finances.index')->with('message', 'Eliminado Satisfactoriamente');
    }
}
