<?php

namespace App\Http\Controllers\Admin;

use App\Socomir\Subsidiaries\Subsidiary;
use App\Socomir\Admins\Requests\CreateEmployeeRequest;
use App\Socomir\Admins\Requests\UpdateEmployeeRequest;
use App\Socomir\Employees\Repositories\EmployeeRepository;
use App\Socomir\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Socomir\Roles\Repositories\RoleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepositoryInterface
     */
    private $employeeRepo;
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->employeeRepo = $employeeRepository;
        $this->roleRepo = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('employee')->user();
        $list = $this->employeeRepo->listEmployees('created_at', 'desc');

        return view('admin.employees.list', [
            'employees' => $this->employeeRepo->paginateArrayResults($list->all()),
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
        return view('admin.employees.create', [
            'roles' => $this->roleRepo->listRoles(),
            'subsidiaries' => Subsidiary::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEmployeeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = $this->employeeRepo->createEmployee($request->all());
        if ($request->has('role')) {
            $employeeRepo = new EmployeeRepository($employee);
            $employeeRepo->syncRoles([$request->input('role')]);
        }

        return redirect()->route('admin.employees.index');
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
        return view('admin.employees.show', [
            'employee' => $this->employeeRepo->findEmployeeById($id)
        ]);
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
        $employee = $this->employeeRepo->findEmployeeById($id);

        return view(
            'admin.employees.edit',
            [
                'employee' => $employee,
                'roles' => $this->roleRepo->listRoles('created_at', 'desc'),
                'isCurrentUser' => $this->employeeRepo->isAuthUser($employee),
                'selectedIds' => $employee->roles()->pluck('role_id')->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployeeRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);
        $isCurrentUser = $this->employeeRepo->isAuthUser($employee);

        $empRepo = new EmployeeRepository($employee);
        $empRepo->updateEmployee($request->except('_token', '_method', 'password'));

        if ($request->has('password') && !empty($request->input('password'))) {
            $employee->password = Hash::make($request->input('password'));
            $employee->save();
        }

        if ($request->has('roles') and !$isCurrentUser) {
            $employee->roles()->sync($request->input('roles'));
        } elseif (!$isCurrentUser) {
            $employee->roles()->detach();
        }

        return redirect()->route('admin.employees.index')
            ->with('message', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);
        $employeeRepo = new EmployeeRepository($employee);
        $employeeRepo->deleteEmployee();

        return redirect()->route('admin.employees.index')->with('message', 'Eliminado Satisfactoriamente');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        return view('admin.employees.profile', [
            'employee' => $this->employeeRepo->findEmployeeById($id)
        ]);
    }

    /**
     * @param UpdateEmployeeRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);

        $update = new EmployeeRepository($employee);
        $update->updateEmployee($request->except('_token', '_method', 'password'));

        if ($request->has('password') && $request->input('password') != '') {
            $update->updateEmployee($request->only('password'));
        }

        return redirect()->route('admin.employee.profile', $id)
            ->with('message', 'Actualización Exitosa!');
    }
}
