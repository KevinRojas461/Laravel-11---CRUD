<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// cuando intentemos acceder a una vista tenemos que estar previamente logueados

// para la autenticación y gestión de usuarios, incluyendo la administración
// de equipos, perfiles de usuario, verificación de correo electrónico, autenticación
// de dos factores y sesiones de navegador.

// Para proteger una ruta con Jetstream usando middleware, como por ejemplo para
// asegurarse de que solo los usuarios autenticados puedan acceder a una ruta específica,
// debes utilizar el middleware auth. 

// A continuación se muestra cómo se puede proteger la ruta / (o cualquier otra ruta)
// para que solo los usuarios autenticados puedan acceder a ella
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // vamos a introducir las rutas dentro del middleware
    // para que esten protegidas

    // especificar la ruta en este caso es "students" en plural
    // coma el nombre del controlador
    // las rutas ya las definimos con una sola liena de codigo

    // ------- Route se esta haciendo referencia a la ruta /students
    // o http://localhost:8000/students
    Route::resource('students', StudentController::class);
});
