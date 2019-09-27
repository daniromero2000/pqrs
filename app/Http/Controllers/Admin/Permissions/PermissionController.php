<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use App\Socomir\Permissions\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    private $permRepo;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permRepo = $permissionRepository;
    }


    public function index()
    {
        $list        = $this->permRepo->listPermissions();
        $permissions = $this->permRepo->paginateArrayResults($list->all());

        return view('admin.permissions.list', compact('permissions'));
    }
}
