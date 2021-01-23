<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CarController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

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

	Route::get('courier/{id}/phone', [\App\Http\Controllers\Admin\CourierController::class, 'getPhone'])->name('courier.phone');
	Route::post('courier/{id}/phone', [\App\Http\Controllers\Admin\CourierController::class, 'storePhone'])->name('courier.phone.store');
	Route::resource('courier', \App\Http\Controllers\Admin\CourierController::class)->only(['index', 'show', 'destroy']);

	Route::get('office/{id}/phone', [\App\Http\Controllers\Admin\OfficeController::class, 'getPhone'])->name('office.phone');
	Route::post('office/{id}/phone', [\App\Http\Controllers\Admin\OfficeController::class, 'storePhone'])->name('office.phone.store');
	Route::get('office/{id}/courier', [\App\Http\Controllers\Admin\OfficeController::class, 'getCourier'])->name('office.courier');
	Route::post('office/{id}/courier', [\App\Http\Controllers\Admin\OfficeController::class, 'storeCourier'])->name('office.courier.store');

	Route::resources([
		'province' => \App\Http\Controllers\Admin\ProvinceController::class,
		'region' => \App\Http\Controllers\Admin\RegionController::class,
		'city' => \App\Http\Controllers\Admin\CityController::class,
		'office' => \App\Http\Controllers\Admin\OfficeController::class,
		'car' => \App\Http\Controllers\Admin\CarController::class,
		'phone' => \App\Http\Controllers\Admin\PhoneController::class,
		'user' => \App\Http\Controllers\Admin\UserController::class,
	]);

});

/*
|--------------------------------------------------------------------------
| Web Routes Admin
|--------------------------------------------------------------------------
|
|
*/
Route::name('province.')->group(function(){
	Route::get('province', [ProvinceController::class, 'index'])->name('all');
	Route::get('province/{id}/region', [ProvinceController::class, 'getRegionsByProvinceId'])->name('region');
	Route::get('province/{id}/city', [ProvinceController::class, 'getCitiesByProvinceId'])->name('city');
});

Route::name('region.')->group(function(){
	Route::get('region', [RegionController::class, 'index'])->name('all');
	Route::get('region/{id}/province', [RegionController::class, 'getProvinceByRegionId'])->name('province');
	Route::get('region/{id}/city', [RegionController::class, 'getCitiesByRegionId'])->name('city');
});

Route::name('city.')->group(function(){
	Route::get('city', [CityController::class, 'index'])->name('all');
	Route::get('city/{id}/province', [CityController::class, 'getProvinceByCityId'])->name('province');
	Route::get('city/{id}/region', [CityController::class, 'getRegionByCityId'])->name('region');
	Route::get('city/{id}/office', [CityController::class, 'getOfficeByCityId'])->name('office');
});

Route::name('office.')->group(function(){
	Route::get('office', [OfficeController::class, 'index'])->name('all');
	Route::get('office/{id}', [OfficeController::class, 'getOfficeById'])->name('office');
	Route::get('office/{id}/car', [OfficeController::class, 'getCarsByOfficeId'])->name('car');
	Route::get('office/{id}/city', [OfficeController::class, 'getCityByOfficeId'])->name('city');
	Route::get('office/{id}/courier', [OfficeController::class, 'getCouriersByOfficeId'])->name('courier');
});

Route::name('courier.')->group(function(){
	Route::get('courier', [CourierController::class, 'index'])->name('all');
	Route::get('courier/uuid/{uuid}', [CourierController::class, 'getCourierByUuid'])->name('uuid');
	Route::post('courier/uuid/autocomplete', [CourierController::class, 'getAutocompleteByUuid'])->name('autocomplete');
	Route::get('courier/{id}', [CourierController::class, 'getCourierById'])->name('courier');
	Route::get('courier/{id}/car', [CourierController::class, 'getCarsByCourierId'])->name('car');
});

Route::name('car.')->group(function(){
	Route::get('car', [CarController::class, 'index'])->name('all');
	Route::get('car/{id}', [CarController::class, 'getCarById'])->name('car');
	Route::get('car/{id}/car', [CarController::class, 'getCourierByCarId'])->name('courier');
});