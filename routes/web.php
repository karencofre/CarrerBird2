<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormacionController; //agregado
use App\Http\Controllers\TrabajoController; //agregado
use App\Http\Controllers\HabilidadController; //agregado
use App\Http\Controllers\EmpleoController; //agregado
use App\Http\Controllers\ListadoController; //agregado

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');

//agregado
Route::resource('formacion', FormacionController::class);
Route::resource('trabajo', TrabajoController::class);
Route::resource('habilidad', HabilidadController::class);
Route::resource('empleo', EmpleoController::class);
Route::post('/empleo/{id}', [EmpleoController::class,'destroy'])->name('empleo.destroy')->middleware('auth');
Route::get('empleo/editar/{id}', [EmpleoController::class,'updateEmpleo'])->name('empleo.updateEmpleo')->middleware('auth');
Route::post('empleo/editar/{id}', [EmpleoController::class,'update'])->name('empleo.update')->middleware('auth');
// agregado 2

Route::resource('listado', ListadoController::class);
Route::post('listado/{id}', [ListadoController::class,'store'])->name('listado.store');

// agregado 3

Route::get('/perfil/{id}', function(){
    return view("miperfil");
})
    ->middleware('auth')
    ->name('perfil.index');