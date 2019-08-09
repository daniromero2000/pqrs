<?php

namespace App\Http\Controllers\Front\Pqr;


use App\Http\Controllers\Controller;

use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\PqrRepository;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Requests\CreatePqrRequest;
use App\Socomir\Pqrs\Requests\UpdatePqrFrontRequest;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use App\Socomir\PqrStatuses\PqrStatus;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\PqrStatuses\Repositories\PqrStatusRepository;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Cities\City;
use Illuminate\Support\Facades\Auth;

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
        $this->pqrRepo->createPqr($request->except('_token', '_method'));
        return redirect()->route('admin.pqrs.index');
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
            'pqr' => $this->pqrRepo->findPqrById($id),
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
    public function edit($id)
    {
        return view('front.pqrs.edit', [
            'pqr' => $this->pqrRepo->findPqrById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePqrFrontRequest $request
     * @param  int $id
     * @param  int $itemid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePqrFrontRequest $request, $id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);
        $update = new PqrRepository($pqr);
        $data = $request->except('_method', '_token', 'password');
        $email =  $data['email'];
        $pqrMail = pqr::where('email', $email)->first();

        if ($pqrMail !== NULL && $pqrMail->id != $pqr->id) {
            /**throw new \Exception('ya existe un cliente creado con ese correo electrónico.');*/
            $itemid =  $data['itemid'];
            $item = $this->itemRepo->findItemById($itemid);
            $itemRepo = new ItemRepository($item);
            $data1 = array(
                "pqr_id" => $pqrMail->id
            );
            $itemRepo->updateItem($data1);
            $this->destroy($pqr->id);
            Auth::login($pqrMail);
            $request->session()->flash('message', 'Hemos recibido tu artículo satisfactoriamente. ¡Ya eres un cliente registrado de Standard!');
            $this->itemRepo->sendEmailToPqr($itemid, $pqrMail);
            $this->itemRepo->sendEmailNotificationToAdmin($itemid);
            return view('front.items.itemtkspage', [
                'pqr' => $pqrMail,
                'item' =>  $this->itemRepo->findItemById($itemid)
            ]);
        } elseif ($data['update'] == 1) {

            $update = new PqrRepository($pqr);
            if ($request->has('password')) {
                $data['password'] = bcrypt($request->input('password'));
            }
            $update->updatePqr($data);
            Auth::login($pqr);
            $request->session()->flash('message', 'Asignación de clave exitosa');
            return redirect()->route('accounts');
        } else {
            $itemid =  $data['itemid'];
            $item = $this->itemRepo->findItemById($itemid);
            if ($request->has('password')) {
                $data['password'] = bcrypt($request->input('password'));
            }
            $update->updatePqr($data);
            $pqr = $this->pqrRepo->findPqrById($id);

            $pqrMail =  $pqr;
            $this->itemRepo->sendEmailToPqr($itemid,  $pqrMail);
            $this->itemRepo->sendEmailNotificationToAdmin($itemid);
            $request->session()->flash('message', 'Hemos recibido tu artículo satisfactoriamente.');
            return view('front.items.itemtkspage', [
                'pqr' => $this->pqrRepo->findPqrById($id),
                'item' => $item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePqrRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePqrRequest $request, $id)
    {
        $pqr = $this->pqrRepo->findPqrById($id);

        $update = new PqrRepository($pqr);
        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update->updatePqr($data);

        $request->session()->flash('message', 'Asignación de clave exitosa');
        return redirect()->route('home');
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
        $pqr = $this->pqrrRepo->findPqrById($id);
        $pqrRepo = new PqrRepository($pqr);
        $pqrRepo->deletePqr();
        return redirect()->route('admin.pqrs.index')->with('message', 'Eliminado Satisfactoriamente');
    }


    /**
     * @param Collection $list
     * @return array
     */
    private function transFormOrder(Collection $list)
    {
        $pqrStatusRepo = new PqrStatusRepository(new PqrStatus());

        return $list->transform(function (Order $pqr) use ($pqrStatusRepo) {
            $pqr->status = $pqrStatusRepo->findPqrStatusById($pqr->order_status_id);
            return $pqr;
        })->all();
    }
}
