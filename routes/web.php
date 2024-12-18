<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;

// Rutas de frontend
Route::get('/', [FrontEndController::class, 'inicio'])->name('inicio');
Route::get('/catalogo', [FrontEndController::class, 'catalogo'])->name('catalogo');

// Rutas de admin
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'autenticar'])->name('autenticar');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/admin/agregar', [AdminController::class, 'agregarPelicula'])->name('agregarPelicula');

Route::post('/admin/nuevocliente', [AdminController::class, 'agregarCliente'])->name('agregarCliente');

use App\Http\Controllers\ClienteController;

Route::get('/lista-clientes', [ClienteController::class, 'listaClientes']);
