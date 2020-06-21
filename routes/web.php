<?php

use App\Http\Controllers\ClienteController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

//LOGIN GET
Route::get('/login', 'LoginController@login');

//LOGIN POST
Route::post('/checklogin', 'LoginController@checklogin')->name('login.submit');


//DASHBOARD
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');


// Cliente - Get
Route::get('/clientes', 'ClienteController@index')->name('lista_clientes');
Route::get('/clientes/novo', 'ClienteController@create')->name('novo_cliente');
Route::get('/clientes/deletar/{id}', 'ClienteController@destroy');
Route::get('/clientes/edit/{id}','ClienteController@edit');

// Cliente - POST
Route::post('/clientes', 'ClienteController@store');
Route::post('/clientes/{id}', 'ClienteController@update');


//LOGOUT
Route::get('/logout', 'LoginController@logout')->name('logout');
