<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEndController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index']);
Route::get('/home', [App\Http\Controllers\FrontEndController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\FrontEndController::class, 'admin'])->name('admin');

//con escribirCatalogo estoy llamando a la función cada vez que se solicita esa vista.
Route::get('/catalogo', [App\Http\Controllers\FrontEndController::class, 'mostrarCatalogo'])->name('mostrarCatalogo');

// Rutas de administración
Route::get('/admin', [BackEndController::class, 'mostrarAdmin'])->name('mostrarAdmin');
Route::post('/admin/agregar', [BackEndController::class, 'agregarEventoCatalogo'])->name('agregarEventoCatalogo');
