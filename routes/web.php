<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ElencoController;
use App\Helpers\FechaHelper;
use App\Http\Controllers\PruebasController;




// Rutas de frontend
Route::get('/', [FrontEndController::class, 'inicio'])->name('inicio');
Route::get('/catalogo', [FrontEndController::class, 'catalogo'])->name('catalogo');





// Rutas de admin
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'autenticar'])->name('autenticar');

//VISTA NUEVA ADMIN LOGUEADO
Route::get('/admin-logueado', [AdminController::class, 'adminLog'])->name('adminLog');






Route::post('/admin/nuevocliente', [AdminController::class, 'agregarCliente'])->name('agregarCliente');





//RUTAS de la carpeta ELENCO ytodo lo que tiene que ver con ellas
//Ruta al formulario
Route::get('/admin/gestion-peliculas/introducir-elenco', [ElencoController::class, 'adminElenco'])->name('adminElenco');

Route::get('/admin/elenco/agregar', [ElencoController::class, 'mostrarAgregarElencoFormulario'])->name('mostrarAgregarElencoFormulario');
Route::post('/admin/elenco/agregar', [ElencoController::class, 'agregarElenco'])->name('agregarElenco');


Route::get('/admin/gestion-peliculas/lista-elenco', [ElencoController::class, 'listaElenco'])->name('listaElenco');

Route::get('/admin/gestion-peliculas/lista-elenco-peliculas/{id}', [ElencoController::class, 'mostrarPeliculasElenco'])->name('elenco.lista-elenco-peliculas');





//Rutas de la carpeta PELICULAS y todo lo que tiene que ver con ellas

//Ruta al formulario
Route::get('admin/gestion-peliculas', [PeliculasController::class, 'adminPeliculas'])->name('adminPeliculas');

//Ruta que devuelve la vista lista-peliculas
Route::get('admin/gestion-peliculas/lista-peliculas', [PeliculasController::class, 'listaPeliculas'])->name('listaPeliculas');
//Ruta para agregar películas
Route::post('admin/gestion-peliculas', [PeliculasController::class, 'agregarPelicula'])->name('agregarPelicula');





//RUTAS DE LA CARPETA DIRECTORES

// Ruta para listar todos los directores
Route::get('/admin/gestion-peliculas/lista-directores', [DirectorController::class, 'listaDirectores'])->name('listaDirectores');

Route::get('/admin/gestion-peliculas/lista-directores-peliculas/{id}', [DirectorController::class, 'mostrarPeliculasDirector'])->name('directores.lista-directores-peliculas');










//Rutas de la carpeta CLIENTES y todo lo que tiene que ver con ella

Route::get('admin/gestion-clientes', [ClienteController::class, 'adminClientes'])->name('adminClientes');

//Devuelve la vista de lista-clientes
Route::get('admin/gestion-clientes/lista-clientes', [ClienteController::class, 'listaClientes'])->name('listaClientes');

Route::post('admin/gestion-clientes', [ClienteController::class, 'agregarCliente'])->name('agregarCliente');

Route::get('admin/lista-clientes', [ClienteController::class, 'listaClientes'])->name('listaClientes');





//RUTAS DE PRUEBA

Route::get('/prueba-fechas', [PruebasController::class, 'ejemploParaFechasEjercicio']);
