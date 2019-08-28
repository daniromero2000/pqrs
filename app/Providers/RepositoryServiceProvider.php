<?php

namespace App\Providers;

<<<<<<< HEAD

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
use App\Socomir\Pqrs\Repositories\PqrRepository;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\PqrStatuses\Repositories\PqrStatusRepository;
use App\Socomir\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use App\Socomir\PqrCommentaries\Repositories\PqrCommentaryRepository;
use App\Socomir\PqrCommentaries\Repositories\Interfaces\PqrCommentaryRepositoryInterface;
use App\Socomir\Years\Repositories\YearRepository;
use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Socomir\Finances\Repositories\FinanceRepository;
=======
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
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );

<<<<<<< HEAD
        
        $this->app->bind(
            YearRepositoryInterface::class,
            YearRepository::class
        );

        $this->app->bind(
            FinanceRepositoryInterface::class,
            FinanceRepository::class
=======
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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
<<<<<<< HEAD

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );

        $this->app->bind(
            PqrRepositoryInterface::class,
            PqrRepository::class
        );

        $this->app->bind(
            PqrStatusRepositoryInterface::class,
            PqrStatusRepository::class
        );

        $this->app->bind(
            PqrCommentaryRepositoryInterface::class,
            PqrCommentaryRepository::class
        );
=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    }
}
