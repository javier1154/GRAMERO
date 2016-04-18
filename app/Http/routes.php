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

    Route::get('/home', 'HomeController@index');

  
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


});