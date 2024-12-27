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

//VISTA NUEVA ADMIN LOGUEADO
Route::get('/admin-logueado', [AdminController::class, 'adminLog'])->name('adminLog');






Route::post('/admin/nuevocliente', [AdminController::class, 'agregarCliente'])->name('agregarCliente');







//Rutas de la carpeta PELICULAS y todo lo que tiene que ver con ellas

//Ruta al formulario
Route::get('admin/gestion-peliculas', [PeliculasController::class, 'adminPeliculas'])->name('adminPeliculas');

//Ruta que devuelve la vista lista-peliculas
Route::get('admin/gestion-peliculas/lista-peliculas', [PeliculasController::class, 'listaPeliculas'])->name('listaPeliculas');

Route::post('admin/gestion-peliculas', [PeliculasController::class, 'agregarPelicula'])->name('agregarPelicula');




//Rutas de la carpeta CLIENTES y todo lo que tiene que ver con ella

Route::get('admin/gestion-clientes', [ClienteController::class, 'adminClientes'])->name('adminClientes');

//Devuelve la vista de lista-clientes
Route::get('admin/gestion-clientes/lista-clientes', [ClienteController::class, 'listaClientes'])->name('listaClientes');

Route::post('admin/gestion-clientes', [ClienteController::class, 'agregarCliente'])->name('agregarCliente');

Route::get('admin/lista-clientes', [ClienteController::class, 'listaClientes'])->name('listaClientes');
