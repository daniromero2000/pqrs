<?php

namespace App\Providers;

use App\Model\Employees\Repositories\EmployeeRepository;
use App\Model\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Model\Permissions\Repositories\PermissionRepository;
use App\Model\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Model\Roles\Repositories\RoleRepository;
use App\Model\Roles\Repositories\RoleRepositoryInterface;
use App\Model\Subsidiaries\Repositories\SubsidiaryRepository;
use App\Model\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use App\Model\Cities\Repositories\CityRepository;
use App\Model\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Model\Countries\Repositories\CountryRepository;
use App\Model\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Model\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Model\Provinces\Repositories\ProvinceRepository;
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

        $this->app->bind(
            SubsidiaryRepositoryInterface::class,
            SubsidiaryRepository::class
        );


        $this->app->bind(
            CountryRepositoryInterface::class,
            CountryRepository::class
        );

        $this->app->bind(
            ProvinceRepositoryInterface::class,
            ProvinceRepository::class
        );

        $this->app->bind(
            CityRepositoryInterface::class,
            CityRepository::class
        );
    }
}
