<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEndController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/catalogo', [FrontEndController::class, 'mostrarCatalogo'])->name('mostrarCatalogo');

// Rutas para administración (centralizado en BackEndController)
Route::get('/admin', [BackEndController::class, 'mostrarAdmin'])->name('mostrarAdmin');
Route::post('/admin/agregar', [BackEndController::class, 'agregarEventoCatalogo'])->name('agregarEventoCatalogo');
Route::post('/procesar-datos', [BackEndController::class, 'procesarDatos']);
