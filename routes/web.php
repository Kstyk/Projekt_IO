<?php

use Illuminate\Support\Facades\Route;
use App\Models\Trip;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFlightController;
use App\Http\Controllers\UserBankBalanceController;


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

Route::view('/aboutus', 'contactinfo.aboutus')->name('aboutus');
Route::view('/contact', 'contactinfo.contact')->name('contact');

Route::get('/', [TripController::class, 'index']);

Route::resource('trips', TripController::class);
Route::resource('countries', CountryController::class);
Route::resource('airports', AirportController::class);
Route::resource('flights', FlightController::class);
Route::resource('users', UserController::class);

Route::get('reserve/{id}', [UserFlightController::class, 'create'])->name('reserve');
Route::post('store', [UserFlightController::class, 'store'])->name('userflight.store');
Route::resource('userflights', UserFlightController::class);

Route::post('add-to-cart/{id}', [
    'uses' => 'App\Http\Controllers\UserFlightController@getAddToCart',
    'as' => 'userflight.addToCart'
]);

Route::get('shopping-cart', [
    'uses' => 'App\Http\Controllers\UserFlightController@getCart',
    'as' => 'userflight.shoppingCart'
]);

Route::get('delete-one/{id}', [
    'uses' => 'App\Http\Controllers\UserFlightController@deleteOne',
    'as' => 'userflight.deleteOne'
]);

Route::get('delete/{id}', [
    'uses' => 'App\Http\Controllers\UserFlightController@delete',
    'as' => 'userflight.delete'
]);

Route::post('delete-all', [
    'uses' => 'App\Http\Controllers\UserFlightController@deleteAll',
    'as' => 'userflight.deleteAll'
]);

Route::controller(UserBankBalanceController::class) -> group(function() {
    Route::get('/addmoney', 'edit')->name('addmoney');
    Route::put('/saved', 'update')->name('save');
});


require __DIR__.'/auth.php';

