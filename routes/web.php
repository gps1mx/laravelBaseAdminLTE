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

    /**
     * Rutas users
     */
    Route::get('users.index', 'UsersController@index')->name('users.index');
    Route::get('users.{id}.show', 'UsersController@show')->name('users.show');
    Route::any('users.search', 'UsersController@search')->name('users.search');
    Route::get('users.create', 'UsersController@create')->name('users.create');
    Route::post('users.store', 'UsersController@store')->name('users.store');
    Route::get('users.{id}.edit', 'UsersController@edit')->name('users.edit');
    Route::post('users.{id}.edit', 'UsersController@edit')->name('users.edit');
    Route::put('users.{id}.update', 'UsersController@update')->name('users.update');
    Route::get('users.{id}.active', 'UsersController@active')->name('users.active');
    Route::get('users.{id}.unactive', 'UsersController@unactive')->name('users.unactive');
    Route::get('users.{id}.pwd', 'UsersController@pwd')->name('users.pwd');
    Route::post('users.{id}.pwd', 'UsersController@pwd')->name('users.pwd');
    Route::put('users.{id}.pwdsave', 'UsersController@pwdsave')->name('users.pwdsave');
    
    /**
     * Rutas permisos
     */
    Route::get('permisos.index', 'PermisosController@index')->name('permisos.index');
    Route::get('permisos.create', 'PermisosController@create')->name('permisos.create');
    Route::get('permisos.store', 'PermisosController@store')->name('permisos.store');
    Route::post('permisos.store', 'PermisosController@store')->name('permisos.store');

    /**
     * Rutas asignación de permisos
     */
    Route::get('permisos.index', 'PermisosController@index')->name('permisos.index');
    Route::get('permisos.create', 'PermisosController@create')->name('permisos.create');
    Route::get('permisos.store', 'PermisosController@store')->name('permisos.store');
    Route::post('permisos.store', 'PermisosController@store')->name('permisos.store');


});

