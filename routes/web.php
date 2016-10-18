<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handledlocale
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Base Route
Route::get('/', 'Front\HomeController@index');

// Language
Route::get('language/{lang}', 'Front\HomeController@language')->where('lang', implode('|', config('app.languages')));

Auth::routes();

Route::post('/login', [
  'uses'  => 'Front\HomeController@doLogin',
]);

Route::post('/register', [
  'uses'  => 'Auth\RegisterController@create',
]);

Route::get('/logout', ['uses' => 'Front\HomeController@doLogout']);

Route::get('/home', 'HomeController@index');

Route::get('/got', [
  'middleware'  => ['auth'],
  'uses'        => function () {
      echo 'You allowed';
  },
]);

// Items
Route::get('/items/in-warehouse', [
  'middleware'  => ['auth'],
  'uses'        => 'Front\WarehouseItemsController@in_warehouse',
]);
Route::get('/items/in-warehouse/add', [
  'middleware'  => ['auth'],
  'uses'        => 'Front\WarehouseItemsController@in_warehouse_add',
]);
Route::get('/chart', ['uses' => 'Front\SoldItemsController@getAllItem']);
