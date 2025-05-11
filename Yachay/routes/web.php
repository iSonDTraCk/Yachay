<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\RegistroProfesorController;

// Página de bienvenida con elección de rol (alumno o profesor)
Route::get('/', [AccesoController::class, 'index'])->name('acceso.index');

// Selección de rol y verificación de DNI
Route::get('/seleccionar/{rol}', [AccesoController::class, 'seleccionar'])->name('acceso.seleccionar');
Route::post('/verificar-dni', [AccesoController::class, 'verificarDni'])->name('acceso.verificar');

// Registro según el rol (alumno o profesor)
Route::get('/registro/{rol}', [AccesoController::class, 'registro'])->name('acceso.registro');

// Registro de profesor (formulario y guardado)
Route::get('/registro/profesor', [AccesoController::class, 'create'])->name('registro.profesor');
Route::post('/registro/profesor', [AccesoController::class, 'store'])->name('registro.profesor.store');

// Registro de alumno (formulario y guardado)
Route::get('/registro/alumno', [AccesoController::class, 'createAlumno'])->name('registro.alumno');
Route::post('/registro/alumno', [AccesoController::class, 'storeAlumno'])->name('registro.alumno.store');


// Login (si aplica)
Route::post('/login', [AccesoController::class, 'login'])->name('acceso.login');

// Home para cada rol
Route::get('/profesor', function () {
    return view('registro.profesor');
})->name('profesor.home');

Route::get('/alumno', function () {
    return view('alumno.home');
})->name('alumno.home');

// CRUD de lecciones
Route::resource('lessons', LessonController::class);
