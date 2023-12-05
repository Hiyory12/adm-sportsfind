<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\documentoController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\espacoController;
use App\Http\Controllers\reservaController;

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
    return view('cliente/list');
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

Route::get('/',[documentoController::class,'index'])->name('documento.list');
Route::get('/documento',[documentoController::class,'index'])->name('documento.list');
Route::get('/documento/destroy/{id}',[documentoController::class,'destroy'])->name('documento.destroy');
Route::get('/documento/search/',[documentoController::class,'search'])->name('documento.search');

Route::get('/documento/create/cliente/{id}',[documentoController::class,'cadastrar'])->name('documento.cadastrar');




Route::get('cliente/search', [App\Http\Controllers\clienteController::class, 'search']);
Route::resource('cliente', App\Http\Controllers\clienteController::class);
Route::get('/cliente',[clienteController::class,'index'])->name('cliente.list');
Route::get('/cliente/destroy/{id}',[clienteController::class,'destroy'])->name('cliente.destroy');
Route::post('/cliente/search/',[clienteController::class,'search'])->name('cliente.search');
Route::get('/cliente/detalhes/{id}',[clienteController::class,'detalhes'])->name('cliente.detalhes');



Route::get('reserva/search', [App\Http\Controllers\reservaController::class, 'search']);
Route::resource('reserva', App\Http\Controllers\reservaController::class);
Route::get('/reserva',[reservaController::class,'index'])->name('reserva.list');
Route::get('/reserva/create/cliente/{id}',[reservaController::class,'cadastrar'])->name('reserva.cadastrar');
Route::get('/reserva/destroy/{id}',[reservaController::class,'destroy'])->name('reserva.destroy');





Route::get('espaco/search', [App\Http\Controllers\espacoController::class, 'search']);
Route::resource('espaco', App\Http\Controllers\espacoController::class);
Route::get('/espaco',[espacoController::class,'index'])->name('espaco.list');
Route::get('/espaco/destroy/{id}',[espacoController::class,'destroy'])->name('espaco.destroy');
Route::post('/espaco/search/',[espacoController::class,'search'])->name('espaco.search');
Route::get('/espaco/detalhes/{id}',[espacoController::class,'detalhes'])->name('espaco.detalhes');