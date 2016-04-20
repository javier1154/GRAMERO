<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web', 'auth']], function () {
  
    //USUARIOS
    Route::resource('/usuarios','UsersController');
    Route::get('/usuarios/{id}/status',[
        'uses' => 'UsersController@status',
        'as'   => 'usuarios.status'
        ]);

    Route::get('/usuarios/{id}/destroy',[
        'uses' => 'UsersController@destroy',
        'as'   => 'usuarios.destroy'
        ]);

    //COFIGURACIONES
    Route::resource('/configuraciones','ConfiguracionesController');

    //IVAS
    Route::resource('/ivas','IvasController');

    //ITEMS
    Route::resource('/items','ItemsController');
    Route::get('/items/{id}/status',[
        'uses' => 'ItemsController@status',
        'as'   => 'items.status'
        ]);

    Route::get('/items/{id}/destroy',[
        'uses' => 'ItemsController@destroy',
        'as'   => 'items.destroy'
        ]);

    //CATEGORIAS
    Route::resource('/categorias','CategoriasController');
    Route::get('/categorias/{id}/destroy',[
        'uses' => 'CategoriasController@destroy',
        'as'   => 'categorias.destroy'
        ]);

    //UNIDADES COMPRAS
    Route::resource('/unidades','UnidadesComprasController');
    Route::get('/unidades/{id}/destroy',[
        'uses' => 'UnidadesComprasController@destroy',
        'as'   => 'unidades.destroy'
        ]);

    //UNIDADES VENTAS
    Route::resource('/unidadesVentas','UnidadesVentasController');
    Route::get('/unidadesVentas/{id}/destroy',[
        'uses' => 'UnidadesVentasController@destroy',
        'as'   => 'unidadesVentas.destroy'
        ]);

    //ITEMS
    Route::resource('/proveedores','ProveedoresController');
    Route::get('/proveedores/{id}/status',[
        'uses' => 'ProveedoresController@status',
        'as'   => 'proveedores.status'
        ]);

    Route::get('/proveedores/{id}/destroy',[
        'uses' => 'ProveedoresController@destroy',
        'as'   => 'proveedores.destroy'
        ]);



});