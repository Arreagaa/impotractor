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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cotizar', 'CotizationController@index')->name('cotization');
Route::get('/imprimir/{id}', 'CotizationController@printPDF')->name('cotization.print');
Route::get('/excel/{id}', 'CotizationController@excel')->name('cotizacion.excel');
Route::get('/cotizar/{id}', 'CotizationController@edit')->name('cotization.edit');
Route::post('/guardar/{id}', 'CotizationController@update')->name('cotization.update');
Route::post('/ordenar/{id}', 'CotizationController@order')->name('cotization.order');
Route::post('/guardar', 'CotizationController@store')->name('guardar');
Route::get('/historial', 'HistorialController@index')->name('historial');
Route::post('/contactus', 'EmailController@sendMail')->name('contactus');
