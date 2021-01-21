<?php

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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Login and Register
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes Admin
|--------------------------------------------------------------------------
|
|
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){

	Route::resources([
		'province' => \App\Http\Controllers\Admin\ProvinceController::class,
		'region' => \App\Http\Controllers\Admin\RegionController::class,
		'city' => \App\Http\Controllers\Admin\CityController::class,
		'office' => \App\Http\Controllers\Admin\OfficeController::class,
		'car' => \App\Http\Controllers\Admin\CarController::class,
		'courier' => \App\Http\Controllers\Admin\CourierController::class,

	]);

});