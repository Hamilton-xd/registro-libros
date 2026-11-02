<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

// Ruta GET para cargar la vista principal con el formulario y la tabla
Route::get('/', [LibroController::class, 'index'])->name('libros.index');

// Ruta POST para recibir los datos del formulario y almacenarlos
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');