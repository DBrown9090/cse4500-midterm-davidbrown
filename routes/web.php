<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hwcategoryController;
use App\Http\Controllers\employeeController;
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

Route::get('/{name}', function () {
    return view('welcome');
})->where('name', '|home');

Route::resource('/hwcategories', hwcategoryController::class);

Route::get('/hwcategories/restore/{id}', [hwcategoryController::class, 'restore']);

Route::resource('/employees', employeeController::class);

Route::get('/employees/restore/{id}', [employeesController::class, 'restore']);





// Database Functions will be below Here

Route::get('/db-test', function() {
    try {
        \DB::connection()->getPDO();
        $db_name = \DB::connection()->getDatabaseName();
        echo 'Database Connected: '.$db_name;
    } catch (\Exception $e) {
        echo 'None';
    }
});

Route::get('/db-migrate', function() {
   Artisan::call('migrate:fresh');
    echo Artisan::output();
});

//For whatever event feeds we may need, use this format
//Route::get('/events-feed', [employeeController::class, 'test']);

Route::fallback(function() {
    return view('unknown');
});
