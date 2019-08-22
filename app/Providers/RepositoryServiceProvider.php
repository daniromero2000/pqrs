<?php

namespace App\Providers;

use App\Model\Employees\Repositories\EmployeeRepository;
use App\Model\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Model\Permissions\Repositories\PermissionRepository;
use App\Model\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Model\Roles\Repositories\RoleRepository;
use App\Model\Roles\Repositories\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );
    }
}
