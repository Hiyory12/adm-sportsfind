<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('categoria/search', [App\Http\Controllers\categoriaController::class, 'search']);
Route::resource('categoria', App\Http\Controllers\categoriaController::class);

Route::get('documento/search', [App\Http\Controllers\documentoController::class, 'search']);
Route::resource('documento', App\Http\Controllers\documentoController::class);

Route::get('cliente/search', [App\Http\Controllers\clienteController::class, 'search']);
Route::resource('cliente', App\Http\Controllers\clienteController::class);

Route::get('reserva/search', [App\Http\Controllers\reservaController::class, 'search']);
Route::resource('reserva', App\Http\Controllers\reservaController::class);

Route::get('espaco/search', [App\Http\Controllers\espacoController::class, 'search']);
Route::resource('espaco', App\Http\Controllers\espacoController::class);


Route::get('categoria/search', [App\Http\Controllers\categoriaController::class, 'search']);
Route::resource('categoria', App\Http\Controllers\categoriaController::class);

Route::get('documento/search', [App\Http\Controllers\documentoController::class, 'search']);
Route::resource('documento', App\Http\Controllers\documentoController::class);

Route::get('cliente/search', [App\Http\Controllers\clienteController::class, 'search']);
Route::resource('cliente', App\Http\Controllers\clienteController::class);

Route::get('reserva/search', [App\Http\Controllers\reservaController::class, 'search']);
Route::resource('reserva', App\Http\Controllers\reservaController::class);

Route::get('espaco/search', [App\Http\Controllers\espacoController::class, 'search']);
Route::resource('espaco', App\Http\Controllers\espacoController::class);
