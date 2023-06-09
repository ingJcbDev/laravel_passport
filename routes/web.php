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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// middleware -> para poder acceder debe de estar autenticado
Route::get('/client','ClientController@index')->middleware('auth');

Route::get('/clientExample','ClientController@clientExample')->middleware('auth');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
