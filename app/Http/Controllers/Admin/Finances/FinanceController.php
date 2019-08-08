<?php

namespace App\Http\Controllers\Admin\Finances;


use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Socomir\Finances\Exceptions\FinanceInvalidArgumentException;
use App\Socomir\Finances\Exceptions\FinanceNotFoundException;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Socomir\Finances\Repositories\FinanceRepository;
use App\Socomir\Finances\Requests\CreateFinanceRequest;
use App\Socomir\Finances\Requests\UpdateFinanceRequest;
use App\Http\Controllers\Controller;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use App\Socomir\Tools\UploadableTrait;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    use FinanceTransformable, UploadableTrait;

    /**
     * @var FinanceRepositoryInterface
     */
    private $financeRepo;

    /**
     * @var YearRepositoryInterface
     */
    private $yearRepo;


    /**
     * FinanceController constructor.
     *
     * @param FinanceRepositoryInterface $financeRepository
     * @param YearRepositoryInterface $yearRepository
     */
    public function __construct(
        YearRepositoryInterface $yearRepository,
        FinanceRepositoryInterface $financeRepository
    ) {
        $this->financeRepo = $financeRepository;
        $this->yearRepo = $yearRepository;
        $this->middleware(['permission:create-finance, guard:employee'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:update-finance, guard:employee'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete-finance, guard:employee'], ['only' => ['destroy']]);
        $this->middleware(['permission:view-finance, guard:employee'], ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('employee')->user();
        $list = $this->financeRepo->listFinances('id');

        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->financeRepo->searchFinance(request()->input('q'));
        }

        $finances = $list->map(function (Finance $item) {
            return $this->transformFinance($item);
        })->all();

        return view('admin.finances.list', [
            'finances' => $this->financeRepo->paginateArrayResults($finances, 25),
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
        $years = $this->yearRepo->listYears('year', 'asc')->where('parent_id', 1);
        return view('admin.finances.create', [
            'years' => $years,
            'finance' => new Finance
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFinanceRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFinanceRequest $request)
    {
        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->financeRepo->saveCoverImage($request->file('cover'));
        }

        $finance = $this->financeRepo->createFinance($data);

        $financeRepo = new FinanceRepository($finance);

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

        return redirect()->route('admin.finances.edit', $finance->id)->with('message', 'Creación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $finance = $this->financeRepo->findFinanceById($id);
        return view('admin.finances.show', [], compact('finance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $finance = $this->financeRepo->findFinanceById($id);

        $years = $this->yearRepo->listYears('year', 'asc')
            ->where('parent_id', 1);

        return view('admin.finances.edit', [
            'finance' => $finance,
            'years' => $years,
            'selectedIdsC' => $finance->years()->pluck('year_id')->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFinanceRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Socomir\Finances\Exceptions\FinanceUpdateErrorException
     */
    public function update(UpdateFinanceRequest $request, int $id)
    {
        $finance = $this->financeRepo->findFinanceById($id);
        $financeRepo = new FinanceRepository($finance);

        $data = $request->except(
            'years',
            '_token',
            '_method',
            'default',
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

        return redirect()->route('admin.finances.edit', $id)
            ->with('message', 'Actualización Exitosa!');
    }

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
        $finance = $this->financeRepo->findFinanceById($id);
        $finance->years()->sync([]);
        $financeRepo = new FinanceRepository($finance);
        $financeRepo->removeFinance();

        return redirect()->route('admin.finances.index')->with('message', 'Eliminado Satisfactoriamente');
    }

   
 
}
