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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('layouts.master');
    });
    
    /**
     * Ruta principal de sección
     */
    Route::get('blank', function () {
        return view('blank');
    });

    Route::get('/home', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/', 'DashboardController@dashboard')->name('/');

});

