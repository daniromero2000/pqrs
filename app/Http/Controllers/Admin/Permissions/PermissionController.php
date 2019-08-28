<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Socomir\Permissions\Repositories\PermissionRepository;
=======
use App\Model\Permissions\Repositories\PermissionRepository;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

class PermissionController extends Controller
{
    /**
     * @var PermissionRepository
     */
    private $permRepo;

    /**
     * PermissionController constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permRepo = $permissionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->permRepo->listPermissions();
        $permissions = $this->permRepo->paginateArrayResults($list->all());

        return view('admin.permissions.list', compact('permissions'));
    }
}
