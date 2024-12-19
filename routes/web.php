<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PeliculasController;

// Rutas de frontend
Route::get('/', [FrontEndController::class, 'inicio'])->name('inicio');
Route::get('/catalogo', [FrontEndController::class, 'catalogo'])->name('catalogo');

// Rutas de admin
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'autenticar'])->name('autenticar');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/admin/agregar', [AdminController::class, 'agregarPelicula'])->name('agregarPelicula');


Route::post('/admin/nuevocliente', [AdminController::class, 'agregarCliente'])->name('agregarCliente');

Route::get('admin/lista-clientes', [ClienteController::class, 'listaClientes'])->name('listaClientes');


Route::get('admin/gestion-peliculas', [PeliculasController::class, 'listaPeliculas'])->name('listaPeliculas');


//Nuevas rutas



// Ruta para mostrar el formulario de agregar película.
Route::get('/peliculas/agregar', [PeliculasController::class, 'mostrarFormularioAgregarPelicula'])
    ->name('mostrarFormularioAgregarPelicula');

// Ruta para procesar el formulario de agregar película.
Route::post('/peliculas/agregar', [PeliculasController::class, 'agregarPelicula'])
    ->name('agregarPelicula');

// Ruta para mostrar la lista de películas.
Route::get('/peliculas', [PeliculasController::class, 'listaPeliculas'])
    ->name('listaPeliculas');
