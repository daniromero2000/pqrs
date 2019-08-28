<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Socomir\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Socomir\Roles\Repositories\RoleRepository;
use App\Socomir\Roles\Repositories\RoleRepositoryInterface;
use App\Socomir\Roles\Requests\CreateRoleRequest;
use App\Socomir\Roles\Requests\UpdateRoleRequest;
=======
use App\Model\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Model\Roles\Repositories\RoleRepository;
use App\Model\Roles\Repositories\RoleRepositoryInterface;
use App\Model\Roles\Requests\CreateRoleRequest;
use App\Model\Roles\Requests\UpdateRoleRequest;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

class RoleController extends Controller
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    /**
     * RoleController constructor.
     *
     * @param RoleRepositoryInterface $roleRepository
     * @param PermissionRepositoryInterface $permissionRepository
     */
    public function __construct(
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->roleRepo = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->roleRepo->listRoles('name', 'asc')->all();

        return view('admin.roles.list', [
            'roles' => $this->roleRepo->paginateArrayResults($list),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * @param CreateRoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $this->roleRepo->createRole($request->except('_method', '_token'));

        return redirect()->route('admin.roles.index')
            ->with('message', 'Create role successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->roleRepo->findRoleById($id);

        $roleRepo = new RoleRepository($role);
        $attachedPermissionsArrayIds = $roleRepo->listPermissions()->pluck('id')->all();
        $permissions = $this->permissionRepository->listPermissions(['*'], 'name', 'asc');

        return view('admin.roles.edit', compact(
            'role',
            'permissions',
            'attachedPermissionsArrayIds'
        ));
    }

    /**
     * @param UpdateRoleRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
<<<<<<< HEAD
}
=======
}
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
