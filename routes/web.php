<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index']);
// Route::get('/home', [App\Http\Controllers\FrontEndController::class, 'index'])->name('home');
// Route::get('/catalogo', [App\Http\Controllers\FrontEndController::class, 'catalogo'])->name('catalogo');


Route::get('/', [App\Http\Controllers\FrontEndController::class, 'indexTopMenu']);
Route::get('/home', [App\Http\Controllers\FrontEndController::class, 'indexTopMenu'])->name('home');
Route::get('/catalogo', [App\Http\Controllers\FrontEndController::class, 'catalogoTopMenu'])->name('catalogo');
