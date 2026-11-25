<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Aprendiz;

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

Route::get('/Formulario-Alimentario', function () {
    return view('FormularioAlimentacion');
})->name('formulario.alimentario');

Route::get('/Formulario-Monetario', function () {
    return view('FormularioMonetario');
})->name('formulario.monetario');

Route::get('/Formulario-Transporte', function () {
    return view('FormularioTransporte');
})->name('formulario.transporte');

Route::get('/personas', [PersonaController::class, 'mostrar']);

Route::view('/aprendices/crear', 'aprendices.formulario');

Route::post('/aprendices', [PersonaController::class, 'presentar']);

Route::get('/aprendices', [PersonaController::class, 'listar']);

Route::get('/aprendices/{id}/editar', [PersonaController::class, 'editar'])
    ->whereNumber('id');

Route::put('/aprendices/{id}', [PersonaController::class, 'actualizar'])
    ->whereNumber('id');

Route::post('/registro', function (Request $request) {
    // 1. Validar (asegúrate de que los campos coincidan con tu formulario)
    $request->validate([
        'nombre' => 'required',
        'apellidos' => 'required',
        'num_documento' => 'required|unique:aprendiz',
        'correo' => 'required|email|unique:aprendiz',
        'password' => 'required|min:6|confirmed',
    ]);

    // 2. Guardar en la tabla aprendiz
    Aprendiz::create([
        'num_documento' => $request->num_documento,
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'correo' => $request->correo,
        'password' => $request->password, // Se encripta solo por el 'casts' que pusimos
        // ... otros campos como telefono, ficha, etc.
    ]);

    // 3. Redirigir
    return redirect('/login')->with('success', '¡Registro exitoso!');
})->name('registro.guardar');