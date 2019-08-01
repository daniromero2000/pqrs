<?php

namespace App\Http\Controllers\Admin\PqrCommentaries;

use App\Shop\CustomerCommentaries\Commentary;
use App\Shop\CustomerCommentaries\Repositories\CommentaryRepository;
use App\Shop\CustomerCommentaries\Repositories\Interfaces\CommentaryRepositoryInterface;
use App\Shop\CustomerCommentaries\Requests\CreateCommentaryRequest;
use App\Shop\CustomerCommentaries\Requests\UpdateCommentaryRequest;
use App\Shop\CustomerCommentaries\Transformations\CommentaryTransformable;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    use CommentaryTransformable;

    private $commentaryRepo;
    private $customerRepo;

    public function __construct(
        CommentaryRepositoryInterface $commentaryRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->commentaryRepo = $commentaryRepository;
        $this->customerRepo = $customerRepository;
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
        $list = $this->commentaryRepo->listCommentary('created_at', 'desc');

        if ($request->has('q')) {
            $list = $this->commentaryRepo->searchCommentary($request->input('q'));
        }

        $commentaries = $list->map(function (Commentary $commentary) {
            return $this->transformCommentary($commentary);
        })->all();

        return view('admin.customerCommentaries.list', ['commentaries' => $this->commentaryRepo->paginateArrayResults($commentaries)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customerRepo->listCustomers();
        return view('admin.customerCommentaries.create', [
            'customers' => $customers,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCommentaryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentaryRequest $request)
    {
        $this->commentaryRepo->createCommentary($request->except('_token', '_method'));
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
        return view('admin.customerCommentaries.show', ['commentary' => $this->commentaryRepo->findCommentaryById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {

        $commentary = $this->commentaryRepo->findCommentaryById($id);
        $commentaryRepo = new CommentaryRepository($commentary);
        $customer = $commentaryRepo->findCustomer();

        return view('admin.customerCommentaries.edit',  [
            'commentary' => $commentary,
            'customers' => $this->customerRepo->listCustomers(),
            'customerId' => $customer->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCommentaryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentaryRequest $request, $id)
    {
        $commentary = $this->commentaryRepo->findCommentaryById($id);

        $update = new CommentaryRepository($commentary);
        $update->updateCommentary($request->except('_method', '_token'));

        $request->session()->flash('message', 'Actualización Exitosa!');
        return redirect()->route('admin.customerCommentaries.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentary = $this->commentaryRepo->findCommentaryById($id);
        $delete = new CommentaryRepository($commentary);
        $delete->deleteCommentary();

        request()->session()->flash('message', 'Eliminado Satisfactoriamente');
        return redirect()->route('admin.customerCommentaries.index');
    }
}
