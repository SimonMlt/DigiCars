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

// Page Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Partie Réservation
Route::get('reservations/dates', 'ReservationController@index')->name('reservationsdates');
Route::get('reservations/valider', 'ReservationController@index2')->name('reservationsvalider');


Route::get('reservations/heures', 'ReservationController@create');
Route::post('reservations/heures', 'ReservationController@store');

Route::get('reservations/liste', 'ReservationController@index3')->name('reservationsliste');

Route::delete('reservations/liste/delete/{id}', 'ReservationController@destroyList');



// Partie Véhicule
Route::get('vehicules', 'VehiculesController@index2')->name('vehicules');
Route::get('/', 'VehiculesController@index3');
Route::get('vehicules/details/{id}', 'VehiculesController@details')->name('detailsvehicules');

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


// Partie Réservation Back
Route::get('admin/backreservations/dates', 'ReservationController@indexBack')->name('backreservationsdates');

Route::get('admin/backreservations/valider', 'ReservationController@indexBack2')->name('backreservationsvalider');


Route::get('admin/backreservations/heures', 'ReservationController@createBack');
Route::post('admin/backreservations/heures', 'ReservationController@storeBack');

Route::get('admin/backreservations/details', 'ReservationController@createBackDetails')->name('backreservationsdetails');;
Route::post('admin/backreservations/details', 'ReservationController@createBackDetails');
// Route::post('admin/backreservations/details', 'ReservationController@storeBackDetails');

Route::delete('admin/backreservations/delete/{id}', 'ReservationController@destroy');

// Partie Echanges
Route::get('admin/devis/create', 'EchangesController@create')->name('createdevis');
Route::post('admin/devis/create', 'EchangesController@store');
Route::get('admin/devis', 'EchangesController@index')->name('admindevis');
Route::get('admin/devis/edit/{id}', 'EchangesController@edit');
Route::post('admin/devis/edit/{id}', 'EchangesController@update');
Route::delete('admin/devis/delete/{id}', 'EchangesController@destroy');


});

// Partie Echanges
Route::get('devis', 'EchangesController@index2');
Route::get('admin/devis/{id}', 'EchangesController@show');

