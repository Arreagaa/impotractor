<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CotizationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SettlementController;
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
})->name('Succes');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:dashboard',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    }
    )->name('dashboard');
});

Route::get('/error', function () {
    return Inertia::render('IDashboard/utils/IError');
})->name('error');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('orders', ItemController::class); 
    Route::get('/order', 'App\Http\Controllers\ItemController@onlyOrder')->name('only');
    Route::get('/order/{id}', 'App\Http\Controllers\ItemController@order')->name('order');
    Route::post('/order/{order_item_id}/item/{id}', 'App\Http\Controllers\ItemController@updateItem')->name('order_item.update');
    Route::post('/order/{order_item_id}/item/update', 'App\Http\Controllers\ItemController@updateItems')->name('order_item.update_all');
    Route::delete('/order/{order_item_id}/item/{id}', 'App\Http\Controllers\ItemController@deleteItem')->name('order_item.delete');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('settlements', SettlementController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('cotizations', CotizationController::class);
    Route::get('/cotization', 'App\Http\Controllers\CotizationController@cotization')->name('cotization');
    Route::post('/cotization/{id}/order', 'App\Http\Controllers\CotizationController@cotizationOrder')->name('cotizations.order');
    Route::delete('/cotization/{cotization_id}/item/{id}', 'App\Http\Controllers\CotizationController@deleteItem')->name('cotization_item.delete');
    Route::post('/cotization/{cotization_id}/item/{id}', 'App\Http\Controllers\CotizationController@updateItem')->name('cotization_item.update');

    Route::get('/cotization/{cotization_id}/cotizationPDF', 'App\Http\Controllers\CotizationController@printPDF')->name('cotization.pdf');
    Route::get('/cotization/{cotization_id}/PDFcotization', 'App\Http\Controllers\CotizationController@newClientPDF')->name('cotizationClient.pdf');
});

Route::post('/contact', ContactController::class)->name('contact');