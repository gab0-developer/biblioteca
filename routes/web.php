<?php

use App\Http\Controllers\AsignarpermisoUsersController;
use App\Http\Controllers\CiudadanoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LectorController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\solicitudLibroController;
use App\Http\Controllers\UserAdminBibliotecarioController;
use App\Http\Controllers\UserAminBibliotecarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('/register', LectorController::class)->names('register');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
    'role.redirect' //llamado del middlware de redicreccion de ruta por rol
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/dashboard', DashboardController::class)->names('dashboard');
        Route::resource('/UsersAdminBibliotecario', UserAdminBibliotecarioController::class)->names('UsersAdminBibliotecario');
    });
    Route::middleware(['role:administrador|bibliotecario'])->group(function () {
        Route::resource('/solicitudLibro', solicitudLibroController::class)->names('solicitudLibro');
    });
    Route::middleware(['role:administrador|lector|bibliotecario'])->group(function () {
        Route::resource('/libros', LibrosController::class)->names('libros');
        // el lector solo accede al controlador solicitudLibro.store debido a que unicamente solicita el libro 
        Route::post('/solicitudLibro', [solicitudLibroController::class,'store'])->name('solicitudLibro.store'); 
    });

     // Protege las rutas con el middleware 'role'
    //  Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/roles', RolesController::class)->names('roles');
        Route::resource('/permisos', PermisoController::class)->names('permisos');
        Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
    // });
    //  Route::middleware(['role:administrador|lector'])->group(function () {
    //     Route::resource('/clients', ClienteController::class)->names('cliente');
    // });

    
});
