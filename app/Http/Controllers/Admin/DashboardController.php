<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Socomir\Tools\UploadableTrait;
use Illuminate\Foundation\Auth\RegistersUsers;


class DashboardController extends Controller
{

    use UploadableTrait;
    use RegistersUsers;
    use PqrTransformable;

    private $pqrStatusRepo;
    private $pqrRepo;

    public function __construct(
        PqrRepositoryInterface $pqrRepository
    ) {
        $this->pqrRepo = $pqrRepository;
        $this->middleware('guest');
        $this->pqrRepo = $pqrRepository;
    }

    public function index()
    {
        // CRM PQRS Socomir
        $listLead                 = $this->pqrRepo->listPqrs('id')->where('pqr_status_id', 3);
        $listTramite              = $this->pqrRepo->listPqrs('id')->where('pqr_status_id', 2);
        $listAtendido             = $this->pqrRepo->listPqrs('id')->where('pqr_status_id', 1);
        $listTramitePendienteInfo = $this->pqrRepo->listPqrs('id')->where('pqr_status_id', 4);

        $pqrLead = $listLead->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        $pqrTramite = $listTramite->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        $pqrAtendido = $listAtendido->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        $pqrTramitePendienteInfo = $listTramitePendienteInfo->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        $listLeadCount            = $listLead->count();
        $listTramiteCount         = $listTramite->count();
        $listAtendidoCount        = $listAtendido->count();
        $listTramitePendienteInfo = $listTramitePendienteInfo->count();

        return view('admin.dashboard', [
            'pqrGlobalCount'           => pqr::where('status', 1)->count(),
            'pqrSCCount'               => pqr::where('pqr_status_id', 3)->where('status', 1)->count(),
            'pqrCCount'                => pqr::where('pqr_status_id', 1)->where('status', 1)->count(),
            'user'                     => auth()->guard('employee')->user(),
            'pqrLeads'                 => $this->pqrRepo->paginateArrayResults($pqrLead, 25),
            'pqrTramites'              => $this->pqrRepo->paginateArrayResults($pqrTramite, 25),
            'pqrAtendidos'             => $this->pqrRepo->paginateArrayResults($pqrAtendido, 25),
            'pqrTramitePendienteInfos' => $this->pqrRepo->paginateArrayResults($pqrTramitePendienteInfo, 25),
            'listLeadCount'            => $listLeadCount,
            'listTramiteCount'         => $listTramiteCount,
            'listAtendidoCount'        => $listAtendidoCount,
            'listTramitePendienteInfo' => $listTramitePendienteInfo,
        ]);
    }
}
