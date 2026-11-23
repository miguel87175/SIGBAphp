<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pagina'); // O la vista que corresponda
});
// interfaz de inicio de sesión
Route::get('/login', function () {
    return view('LandingPage.login'); // o la vista que corresponda
})->name('login');
// interfaz registro de usuarios
Route::get('/registro', function () {
    return view('LandingPage.registro'); // o la vista que corresponda
})->name('registro');

Route::get('/olvido-contraseña', function () {
    return view('LandingPage.olvido'); // o la vista que corresponda
})->name('olvido-contraseña');

Route::get('/Pagina-principal', function () {
    return view('pagina'); // o la vista que corresponda
})->name('pagina');

// Opción directa retornando la vista
Route::get('/iniciar-sesion', function () {
    return view('IniciarSesion.iniciarSesion');
})->name('login.view');

Route::get('/panel-administrador', function () {
    return view('dashboard');
})->name('panel-administrador');

Route::get('/Formulario', function () {
    return view('formulario');
})->name('formulario');

Route::get('/personas', [PersonaController::class, 'mostrar']);

Route::view('/aprendices/crear', 'aprendices.formulario');

Route::post('/aprendices', [PersonaController::class, 'presentar']);

Route::get('/aprendices', [PersonaController::class, 'listar']);

Route::get('/aprendices/{id}/editar', [PersonaController::class, 'editar'])
    ->whereNumber('id');

Route::put('/aprendices/{id}', [PersonaController::class, 'actualizar'])
    ->whereNumber('id');