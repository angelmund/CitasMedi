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
// Limpiar caché
Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return "¡Cache limpio!";
});

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

// ****************   Servicios ********** 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('Servicios.index');
    Route::get('/Servicios/create', [App\Http\Controllers\ServiciosController::class, 'create'])->name('Servicios.create');
    Route::post('/Servicios/store', [App\Http\Controllers\ServiciosController::class, 'store'])->name('Servicios.store');
    Route::get('/Servicios/edit/{id}', [App\Http\Controllers\ServiciosController::class, 'edit'])->name('Servicios.edit');
    Route::put('/Servicios/update/{id}', [App\Http\Controllers\ServiciosController::class, 'update'])->name('Servicios.update');
    Route::post('/Servicios/eliminar/{id}', [App\Http\Controllers\ServiciosController::class, 'desactivarServicio'])->name('Servicios.desactivarServicio');
});

// ****************   Especialidades ********** 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Especialidades', [App\Http\Controllers\EspecialidadesController::class, 'index'])->name('Especialidades.index');
    Route::get('/Especialidades/create', [App\Http\Controllers\EspecialidadesController::class, 'create'])->name('Especialidades.create');
    Route::post('/Especialidades/store', [App\Http\Controllers\EspecialidadesController::class, 'store'])->name('Especialidades.store');
    Route::get('/Especialidades/edit/{id}', [App\Http\Controllers\EspecialidadesController::class, 'edit'])->name('Especialidades.edit');
    Route::put('/Especialidades/update/{id}', [App\Http\Controllers\EspecialidadesController::class, 'update'])->name('Especialidades.update');
    Route::post('/Especialidades/eliminar/{id}', [App\Http\Controllers\EspecialidadesController::class, 'desactivarServicio'])->name('Especialidades.desactivarServicio');
});



//****************   Citas ********** */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Citas', [App\Http\Controllers\CitasController::class, 'index'])->name('Citas.index');
    Route::get('/Citas/create', [App\Http\Controllers\CitasController::class, 'create'])->name('Citas.create');
   
});
