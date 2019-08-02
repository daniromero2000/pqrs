<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Schema;
use App\Socomir\Pqrs\Pqr;
use App\Socomir\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use App\Socomir\Pqrs\Transformations\PqrTransformable;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pqrSCCount = Pqr::where('pqr_status_id', 3)->where('status', 1)->count();
              Schema::defaultStringLength(191);
        View::share('pqrSCCount', $pqrSCCount);
     
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
