<?php

namespace App\Socomir\Permissions\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Permissions\Exceptions\CreatePermissionErrorException;
use App\Socomir\Permissions\Exceptions\DeletePermissionErrorException;
use App\Socomir\Permissions\Exceptions\PermissionNotFoundErrorException;
use App\Socomir\Permissions\Exceptions\UpdatePermissionErrorException;
use App\Socomir\Permissions\Permission;
use App\Socomir\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
        $this->model = $permission;
    }


    public function createPermission(array $data): Permission
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CreatePermissionErrorException($e);
        }
    }


    public function findPermissionById(int $id): Permission
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PermissionNotFoundErrorException($e);
        }
    }


    public function updatePermission(array $data): bool
    {
        try {
            return $this->update($data);
        } catch (QueryException $e) {
            throw new UpdatePermissionErrorException($e);
        }
    }


    public function deletePermissionById(): bool
    {
        try {
            return $this->delete();
        } catch (QueryException $e) {
            throw new DeletePermissionErrorException($e);
        }
    }


    public function listPermissions($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc'): Collection
    {
        return $this->all($columns, $orderBy, $sortBy);
    }
}
