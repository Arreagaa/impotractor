<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

/*Route::get('/', function () {
    return Inertia::render('Landing/IShow', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::get('/', function () {
    return Inertia::render('Landing/IShow');
})->name('landing');

Route::get('/Succes', function () {
    return Inertia::render('IContact/ISucces');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

/* IMPOTRACTOR S.A */
Auth::routes();

Route::get('/cotizar', 'App\Http\Controllers\CotizationController@index')->name('cotization');
Route::get('/imprimir/{id}', 'App\Http\Controllers\CotizationController@printPDF')->name('cotization.print');
Route::get('/excel/{id}', 'App\Http\Controllers\CotizationController@excel')->name('cotizacion.excel');
Route::get('/cotizar/{id}', 'App\Http\Controllers\CotizationController@edit')->name('cotization.edit');
Route::post('/guardar/{id}', 'App\Http\Controllers\CotizationController@update')->name('cotization.update');
Route::post('/ordenar/{id}', 'App\Http\Controllers\CotizationController@order')->name('cotization.order');
Route::post('/guardar', 'App\Http\Controllers\CotizationController@store')->name('guardar');
Route::get('/historial', 'App\Http\Controllers\HistorialController@index')->name('historial');
