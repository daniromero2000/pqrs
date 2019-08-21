<?php

namespace App\Providers;

use App\Socomir\Employees\Repositories\EmployeeRepository;
use App\Socomir\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Socomir\Permissions\Repositories\PermissionRepository;
use App\Socomir\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Socomir\Roles\Repositories\RoleRepository;
use App\Socomir\Roles\Repositories\RoleRepositoryInterface;
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
