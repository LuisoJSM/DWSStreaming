<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index']);
Route::get('/home', [App\Http\Controllers\FrontEndController::class, 'index'])->name('home');

//con escribirCatalogo estoy llamando a la función cada vez que se solicita esa vista.
Route::get('/catalogo', [App\Http\Controllers\FrontEndController::class, 'escribirCatalogo'])->name('catalogo');



