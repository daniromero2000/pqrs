<?php

namespace App\Providers;

use App\Socomir\Employees\Employee;
use App\Socomir\Employees\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.admin.app',
            'layouts.admin.sidebar',
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });
        view()->composer(['layouts.front.app'], function ($view) { });
    }


    /**
     * @param Employee $employee
     * @return bool
     */
    private function isAdmin(Employee $employee)
    {
        $employeeRepo = new EmployeeRepository($employee);
        return $employeeRepo->hasRole('admin');
    }
}
