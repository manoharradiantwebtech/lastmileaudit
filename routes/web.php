<?php

use App\Http\Controllers\setup\DepartmentController;
use App\Http\Controllers\setup\LocationController;
use App\Http\Controllers\setup\RoleController;
use App\Http\Controllers\setup\SubLocationController;
use App\Http\Controllers\setup\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});

Route::get('/getsublocations/{locationId}', [SubLocationController::class, 'getallsublocations'])->name('getsublocations');
Route::group(['prefix' => 'master', 'middleware' => ['auth:sanctum'], 'as' => 'master.'], function () {
    // Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::resource('user', UserController::class);
    Route::resource('location', LocationController::class);
    Route::resource('sublocation', SubLocationController::class);
    Route::resource('department', DepartmentController::class);
    
});
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login', [UserController::class, 'loginview'])->name('loginview');
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::get('/getsublocations/{locationId}', 'SubLocationController@getSublocations')->name('getsublocations');


Route::group(['prefix' => 'setup', 'as' => 'setup.'], function () {
    // Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::resource('role', RoleController::class);

});

Route::get('/department', function () {
    return view('master.department');
})->name('master.department');


Route::get('/sublocations', function () {
    return view('master.sublocation');
})->name('master.sublocations');


Route::get('/calender', function () {
    return view('master.calender');
})->name('master.calender');