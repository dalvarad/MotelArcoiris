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

Route::resource('users','UserController');

	Route::get('users/{id}/destroy', [
			'uses' => 'UserController@destroy',
			'as' => 'users.destroy'
		]);

Route::resource('userstype','UserTypeController');

  Route::get('userstype/{id}/destroy', [
		'uses' => 'UserTypeController@destroy',
		'as' => 'userstype.destroy'
	]);

Route::resource('controlhorario','ControlHorarioController'); 

  Route::get('controlhorario/{id}/destroy', [
		'uses' => 'ControlHorarioController@destroy',
		'as' => 'controlhorario.destroy'
	]);


 Route::resource('jornadas','JornadaController'); 

 	Route::get('jornadas/{id}/destroy', [
		'uses' => 'JornadaController@destroy',
		'as' => 'jornadas.destroy'
	]);

Route::resource('usersjornadas','UserJornadaController'); 

 	Route::get('usersjornadas/{id}/destroy', [
		'uses' => 'userJornadaController@destroy',
		'as' => 'usersjornadas.destroy'
	]);

Route::resource('proveedores','ProveedorController'); 

	Route::get('proveedores/{id}/destroy', [
		'uses' => 'ProveedorController@destroy',
		'as' => 'proveedores.destroy'
	]);

Route::resource('proveedoresinsumos','ProveedorInsumoController'); 


	Route::get('proveedoresinsumos/{id}/destroy', [
		'uses' => 'ProveedorInsumoController@destroy',
		'as' => 'proveedoresinsumos.destroy'
	]);
Route::resource('proveedoresproductos','ProveedorProductoController');
	Route::get('proveedoresproductos/{id}/destroy', [
		'uses' => 'ProveedorProductoController@destroy',
		'as' => 'proveedoresproductos.destroy'
	]);


Route::resource('tipoproducto','TipoProductoController');

  Route::get('tipoproducto/{id}/destroy', [
		'uses' => 'TipoProductoController@destroy',
		'as' => 'tipoproducto.destroy'
	]);

Route::resource('productos','ProductoController');

  Route::get('productos/{id}/destroy', [
		'uses' => 'ProductoController@destroy',
		'as' => 'productos.destroy'
	]);

Route::resource('tipoinsumo','TipoInsumoController');

  Route::get('tipoinsumo/{id}/destroy', [
		'uses' => 'TipoInsumoController@destroy',
		'as' => 'tipoinsumo.destroy'
	]);
Route::resource('insumos','InsumoController');

  Route::get('insumos/{id}/destroy', [
		'uses' => 'InsumoController@destroy',
		'as' => 'insumos.destroy'
	]);

route::resource('tipohabitacion','TipoHabitacionController');

Route::get('tipohabitacion/{id}/destroy', [
		'uses' => 'TipoHabitacionController@destroy',
		'as' => 'tipohabitacion.destroy'
	]);

 Route::resource('estadohabitacion','EstadoHabitacionController');

 Route::get('estadohabitacion/{id}/destroy', [
		'uses' => 'EstadoHabitacionController@destroy',
		'as' => 'estadohabitacion.destroy'
	]);

Route::resource('habitaciones','HabitacionController');

Route::get('habitaciones/{id}/destroy', [
	'uses' => 'HabitacionController@destroy',
	'as' => 'habitaciones.destroy'
	]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
