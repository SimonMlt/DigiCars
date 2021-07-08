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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Véhicules
Route::get('vehicules', 'VehiculesController@index')->name('vehicules');

Route::get('vehicules/create', 'VehiculesController@create');
Route::post('vehicules/create', 'VehiculesController@store');

Route::get('vehicules/edit/{id}', 'VehiculesController@edit');
Route::post('vehicules/edit/{id}', 'VehiculesController@update');

Route::delete('vehicules/delete/{id}', 'VehiculesController@destroy');

