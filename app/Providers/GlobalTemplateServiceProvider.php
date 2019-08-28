<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Socomir\Employees\Employee;
use App\Socomir\Employees\Repositories\EmployeeRepository;
use App\Socomir\Years\Year;
use App\Socomir\Years\Repositories\YearRepository;
=======
use App\Model\Employees\Employee;
use App\Model\Employees\Repositories\EmployeeRepository;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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
<<<<<<< HEAD
            'admin.shared.finances',
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });

        view()->composer(['layouts.front.app', 'front.years.sidebar-year'], function ($view) {
            $view->with('years', $this->getYears());
        });

        view()->composer(['layouts.front.year-nav'], function ($view) {
            $view->with('years', $this->getYears());
        });
    }

 /**
     * Get all the categories
     *
     */
    private function getYears()
    {
        $yearRepo = new YearRepository(new Year);
        return $yearRepo->listYears('year', 'asc', 1)->whereIn('parent_id', [1]);
=======
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
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
