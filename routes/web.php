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

// Accueil
Route::get('/', function () {
    return view('home');
})->name('index');

// Authentification
Auth::routes();

Route::get('/accueil', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/accueil', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/accueil', 'HomeController@index')->name('home');


// Partie Réservation
Route::get('reservations/dates', 'ReservationController@index')->name('reservationsdates');

Route::get('reservations/valider', 'ReservationController@index2')->name('reservationsvalider');


Route::get('reservations/heures', 'ReservationController@create');
Route::post('reservations/heures', 'ReservationController@store');



// Partie Véhicule
Route::get('vehicules', 'VehiculesController@index2')->name('vehicules');

Route::group([
    'middleware' => ['auth', 'admin']
], function () {
// Véhicules
Route::get('admin/vehicules', 'VehiculesController@index')->name('adminvehicules');

Route::get('admin/vehicules/create', 'VehiculesController@create');
Route::post('admin/vehicules/create', 'VehiculesController@store');

Route::get('admin/vehicules/edit/{id}', 'VehiculesController@edit');
Route::post('admin/vehicules/edit/{id}', 'VehiculesController@update');

Route::delete('admin/vehicules/delete/{id}', 'VehiculesController@destroy');
});
