<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Socomir\Employees\Repositories\EmployeeRepository;
use App\Socomir\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );
        
    }
}
