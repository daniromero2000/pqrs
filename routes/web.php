<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.'], function () {
    Route::namespace('Admin')->group(function () {
        Route::group(['middleware' => ['role:admin|superadmin|operativo|marketing, guard:employee']], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');


            Route::namespace('Subsidiaries')->group(function () {
                Route::resource('subsidiaries', 'SubsidiaryController');
                Route::get('remove-image-subsidiary', 'SubsidiaryController@removeImage')->name('subsidiary.remove.image');
            });



            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
        });

        
        Route::group(['middleware' => ['role:admin|superadmin|marketing|operativo, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
        });
    });
});


/**
 * Frontend routes
 */
Auth::routes();
Route::namespace('Auth')->group(function () { });

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'front'], function () {

        Route::namespace('About')->group(function () {
            Route::resource('about', 'AboutController');
            Route::get('about', 'AboutController@about')->name('about');
        });

        Route::namespace('Asociarse')->group(function () {
            Route::resource('asociarse', 'AsociarseController');
            Route::get('asociarse', 'AsociarseController@asociarse')->name('asociarse');
        });

        Route::namespace('Beneficios')->group(function () {
            Route::resource('beneficios', 'BeneficiosController');
            Route::get('beneficios', 'BeneficiosController@beneficios')->name('beneficios');
        });

        Route::namespace('Libranza')->group(function () {
            Route::resource('libranza', 'LibranzaController');
            Route::get('libranza', 'LibranzaController@libranza')->name('libranza');
        });

        Route::namespace('Reglamentos')->group(function () {
            Route::resource('reglamentos', 'ReglamentosController');
            Route::get('reglamentos', 'ReglamentosController@reglamentos')->name('reglamentos');
        });

        Route::namespace('RegistroWeb')->group(function () {
            Route::resource('registroweb', 'RegistroWebController');
            Route::get('registroweb', 'RegistroWebController@registroweb')->name('registroweb');
        });

        Route::namespace('Tarifas')->group(function () {
            Route::resource('tarifas', 'TarifasController');
            Route::get('tarifas', 'TarifasController@tarifas')->name('tarifas');
        });

        Route::namespace('InformacionFinanciera')->group(function () {
            Route::resource('informacionfinanciera', 'InformacionFinancieraController');
            Route::get('informacionfinanciera', 'InformacionFinancieraController@informacionfinanciera')->name('informacionfinanciera');
        });

        Route::namespace('ProductosServicios')->group(function () {
            Route::resource('productosservicios', 'ProductosServiciosController');
            Route::get('productosservicios', 'ProductosServiciosController@productosservicios')->name('productosservicios');
        });

        Route::namespace('Pqr')->group(function () {
            Route::resource('pqr', 'PqrController');
            Route::get('pqr', 'PqrController@pqr')->name('pqr');
        });

        Route::namespace('Convenios')->group(function () {
            Route::resource('convenios', 'ConveniosController');
            Route::get('convenios', 'ConveniosController@convenios')->name('convenios');
        });

        Route::namespace('Directorio')->group(function () {
            Route::resource('directorio', 'DirectorioController');
            Route::get('directorio', 'DirectorioController@directorio')->name('directorio');
        });
    });
});
