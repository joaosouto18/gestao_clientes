<?php

use App\Http\Controllers\ClienteController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/checklogin', 'LoginController@checklogin')->name('login.submit');


Route::get('/dashboard', 'LoginController@dashboard');


//Route::get('/dashboard', 'LoginController@dashboard');









//Route::post('/login', 'LoginController@login')->name('login.submit');
//Route::get('/', 'LoginController@index')->name('dashboard');


Route::get('/logout','LoginController@logout')->name('logout');


// LOGIN - POST
//Route::get('/login', 'ClienteController@index')->name('lista_clientes');

// Cliente - Get
Route::get('/clientes', 'ClienteController@index')->name('lista_clientes');
Route::get('/clientes/novo', 'ClienteController@create')->name('novo_cliente');
Route::get('/clientes/deletar/{id}', 'ClienteController@destroy');
Route::get('/clientes/edit/{id}','ClienteController@edit');

// Cliente - POST
Route::post('/clientes', 'ClienteController@store');
Route::post('/clientes/{id}', 'ClienteController@update');

