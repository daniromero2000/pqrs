<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Socomir\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Socomir\Roles\Repositories\RoleRepository;
use App\Socomir\Roles\Repositories\RoleRepositoryInterface;
use App\Socomir\Roles\Requests\CreateRoleRequest;
use App\Socomir\Roles\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    private $roleRepo;
    private $permissionRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->roleRepo             = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }


    public function index()
    {
        $list = $this->roleRepo->listRoles('name', 'asc')->all();

        return view('admin.roles.list', [
            'roles' => $this->roleRepo->paginateArrayResults($list),
        ]);
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(CreateRoleRequest $request)
    {
        $this->roleRepo->createRole($request->except('_method', '_token'));

        return redirect()->route('admin.roles.index')
            ->with('message', 'Create role successful!');
    }


    public function edit($id)
    {
        $role                        = $this->roleRepo->findRoleById($id);
        $roleRepo                    = new RoleRepository($role);
        $attachedPermissionsArrayIds = $roleRepo->listPermissions()->pluck('id')->all();
        $permissions                 = $this->permissionRepository->listPermissions(['*'], 'name', 'asc');

        return view('admin.roles.edit', compact(
            'role',
            'permissions',
            'attachedPermissionsArrayIds'
        ));
    }


    public function update(UpdateRoleRequest $request, $id)
    {
        $role = $this->roleRepo->findRoleById($id);

        if ($request->has('permissions')) {
            $roleRepo = new RoleRepository($role);
            $roleRepo->syncPermissions($request->input('permissions'));
        }

        $this->roleRepo->updateRole($request->except('_method', '_token'), $id);

        return redirect()->route('admin.roles.edit', $id)
            ->with('message', 'Update role successful!');
    }
}
