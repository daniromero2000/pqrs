<?php

namespace App\Socomir\Employees\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Employees\Employee;
use App\Socomir\Employees\Exceptions\EmployeeNotFoundException;
use App\Socomir\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
        $this->model = $employee;
    }

    /**
     * List all the employees
     *
     * @param string $order
     * @param string $sort
     *
     * @return Collection
     */
    public function listEmployees(string $order = 'name', string $sort = 'asc'): Collection
    {
        return $this->all(['*'], $order, $sort);
    }


    public function createEmployee(array $data): Employee
    {
        $data['password'] = Hash::make($data['password']);
        return $this->create($data);
    }


    public function findEmployeeById(int $id): Employee
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new EmployeeNotFoundException;
        }
    }


    public function updateEmployee(array $params): bool
    {
        if (isset($params['password'])) {
            $params['password'] = Hash::make($params['password']);
        }

        return $this->update($params);
    }


    public function syncRoles(array $roleIds)
    {
        $this->model->roles()->sync($roleIds);
    }


    public function listRoles(): Collection
    {
        return $this->model->roles()->get();
    }


    public function hasRole(string $roleName): bool
    {
        return $this->model->hasRole($roleName);
    }


    public function isAuthUser(Employee $employee): bool
    {
        $isAuthUser = false;
        if (Auth::guard('employee')->user()->id == $employee->id) {
            $isAuthUser = true;
        }
        return $isAuthUser;
    }


    public function deleteEmployee(): bool
    {
        return $this->delete();
    }
}
