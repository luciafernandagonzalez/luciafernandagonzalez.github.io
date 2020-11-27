<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProveedorController;
use App\Http\Controllers\API\TecnicoController;
use App\Http\Controllers\API\EquipoController;
use App\Http\Controllers\API\ControlController;

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

//el resource contiene las acciones crear, editar, listar, eliminar y ver


Route::resource('/tecnicos', 'API\ControlController');
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::group(['prefix' => 'cont'], function(){
    Route::get('', [
        'uses' => 'API\ControlController@index',
        'as' => 'cont.index'
    ]);
   
    Route::get('show', [
        'uses' => 'API\ControlController@show',
        'as' => 'cont.show'
    ]);   
    Route::get('listado', [
        'uses' => 'API\ControlController@getStore',
        'as' => 'cont.store'
    ]);
    Route::post('listado', [
        'uses' => 'API\ControlController@store',
        'as' => 'cont.store'
    ]);
    
});

Route::resource('/proveedors','API\ProveedorController');

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
Route::group(['prefix' => 'prov'], function() {
    Route::get('', [
        'uses' => 'API\ProveedorController@index',
        'as' => 'prov.index'
    ]);
    Route::get('create', [
        'uses' => 'API\ProveedorController@getStore',
        'as' => 'prov.store'
    ]);
    Route::post('create', [
        'uses' => 'API\ProveedorController@store',
        'as' => 'prov.store'
    ]);
    Route::get('update/{proveedor_legajo}', [
        'uses' => 'API\ProveedorController@getUpdate',
        'as' => 'prov.update'
    ]);
    Route::post('update', [
        'uses' => 'API\ProveedorController@update',
        'as' => 'prov.update'
    ]);
    Route::get('destroy/{proveedor_legajo}', [
        'uses' => 'API\ProveedorController@destroy',
        'as' => 'prov.delete'
    ]);
    Route::get('calificaciones', [
        'uses' => 'API\ProveedorController@calificaciones',
        'as' => 'prov.calificaciones'
    ]);
});



Route::resource('/equipos', 'API\EquipoController');

Route::group(['prefix' => 'eq'], function(){
    Route::get('', [
        'uses' => 'API\EquipoController@index',
        'as' => 'eq.index'
    ]);
    Route::get('mostrarEquipos', [
        'uses' => 'API\EquipoController@show',
        'as' => 'eq.show'
    ]);
});



