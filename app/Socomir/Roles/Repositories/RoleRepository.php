<?php

namespace App\Socomir\Roles\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Permissions\Permission;
use App\Socomir\Roles\Exceptions\CreateRoleErrorException;
use App\Socomir\Roles\Exceptions\DeleteRoleErrorException;
use App\Socomir\Roles\Exceptions\RoleNotFoundErrorException;
use App\Socomir\Roles\Exceptions\UpdateRoleErrorException;
use App\Socomir\Roles\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->model = $role;
    }


    public function listRoles(string $order = 'id', string $sort = 'desc'): Collection
    {
        return $this->all(['*'], $order, $sort);
    }

    public function createRole(array $data): Role
    {
        try {
            $role = new Role($data);
            $role->save();
            return $role;
        } catch (QueryException $e) {
            throw new CreateRoleErrorException($e);
        }
    }


    public function findRoleById(int $id): Role
    {
        try {
            return $this->findOneOrFail($id);
        } catch (QueryException $e) {
            throw new RoleNotFoundErrorException($e);
        }
    }


    public function updateRole(array $data): bool
    {
        try {
            return $this->update($data);
        } catch (QueryException $e) {
            throw new UpdateRoleErrorException($e);
        }
    }


    public function deleteRoleById(): bool
    {
        try {
            return $this->delete();
        } catch (QueryException $e) {
            throw new DeleteRoleErrorException($e);
        }
    }


    public function attachToPermission(Permission $permission)
    {
        $this->model->attachPermission($permission);
    }


    public function attachToPermissions(...$permissions)
    {
        $this->model->attachPermissions($permissions);
    }


    public function syncPermissions(array $ids)
    {
        $this->model->syncPermissions($ids);
    }


    public function listPermissions(): Collection
    {
        return $this->model->permissions()->get();
    }
}
