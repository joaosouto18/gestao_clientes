<?php

use App\Http\Controllers\ClienteController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('login');
});

//Route::post('/login', 'LoginController@login');


Route::post('/checklogin', 'LoginController@checklogin')->name('login.submit');


//Route::post('/dashboard', 'DashboardController@dashboard');

Route::get('/dashboard', 'DashboardController@dashboard');


//Route::group(['middleware' => ['auth']], function (){
    //Route::get('/logout','LoginController@logout')->name('logout');
//});

Route::get('/logout', 'LoginController@logout')->name('logout');

//Route::group(['middleware' => 'my_auth'], function() {
//
//    Route::get('/logout','LoginController@logout')->name('logout');
//
//});



// Cliente - Get
Route::get('/clientes', 'ClienteController@index')->name('lista_clientes');
Route::get('/clientes/novo', 'ClienteController@create')->name('novo_cliente');
Route::get('/clientes/deletar/{id}', 'ClienteController@destroy');
Route::get('/clientes/edit/{id}','ClienteController@edit');

// Cliente - POST
Route::post('/clientes', 'ClienteController@store');
Route::post('/clientes/{id}', 'ClienteController@update');

