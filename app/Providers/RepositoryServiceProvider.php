<?php

namespace App\Providers;


use App\Socomir\Subsidiaries\Repositories\SubsidiaryRepository;
use App\Socomir\Subsidiaries\Repositories\Interfaces\SubsidiaryRepositoryInterface;
use App\Socomir\Cities\Repositories\CityRepository;
use App\Socomir\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Socomir\Countries\Repositories\CountryRepository;
use App\Socomir\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Socomir\Employees\Repositories\EmployeeRepository;
use App\Socomir\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Socomir\Permissions\Repositories\PermissionRepository;
use App\Socomir\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Socomir\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Socomir\Provinces\Repositories\ProvinceRepository;
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