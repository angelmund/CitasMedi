<?php

use App\Http\Controllers\DashboardController;
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

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/usuarios', function () {
        return view('usuario.index');
    })->name('usuarios');
});

//****************   Servicios ********** */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('Servicios.index');
    Route::get('/Servicios/create', [App\Http\Controllers\ServiciosController::class, 'create'])->name('Servicios.create');
   
});