<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', '\\' . \App\Http\Controllers\HomeController::class)
    ->name('home');

Route::get('/show', '\\' . \App\Http\Controllers\ShowController::class)
    ->name('show');

Route::get('/show/{id?}', '\\' . \App\Http\Controllers\ShowController::class)
    ->name('show');

Route::middleware('guest')->group(function (){
    Route::get('/login','\\' . \App\Http\Controllers\AuthController::class . '@login')
        ->name('login');

    Route::post('/login','\\' . \App\Http\Controllers\AuthController::class . '@check');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/logout','\\' . \App\Http\Controllers\AuthController::class . '@logout')
        ->name('logout');

    Route::get('/create', '\\' . \App\Http\Controllers\CreateController::class . "@form")
        ->name('create');

    Route::post('/create', '\\' . \App\Http\Controllers\CreateController::class . '@check');

    Route::get('/delete/{id?}', '\\' . \App\Http\Controllers\DeleteAdController::class)
        ->name('delete');

    Route::middleware(\App\Http\Middleware\CheckAdAuthor::class)
        ->get('/edit/{id?}', '\\' . \App\Http\Controllers\EditAdController::class . '@find')
        ->name('edit');

    Route::middleware(\App\Http\Middleware\CheckAdAuthor::class)
        ->post('/edit/{id?}', '\\' . \App\Http\Controllers\EditAdController::class . '@save')
        ->name('edit');
});



