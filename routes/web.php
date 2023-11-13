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
use App\Http\Controllers\UserController; //agregado

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

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
//agregado
Route::get('/perfil-update/{id}', function(){
    return view("perfilupdate");
})
    ->middleware('auth')
    ->name('perfil.update');

Route::post('/perfil-update/{id}',[UserController::class,'update'])
    ->middleware('auth')
    ->name('user.update');
Route::get('/curr',function(){
    return view('curriculums');
})->name('curr');

Route::resource('formacion', FormacionController::class);
Route::get('formacion/editar/{id}', [FormacionController::class,'updateFormacion'])->middleware('auth')->name('formacion.updateFormacion');
Route::post('formacion/editar/{id}', [FormacionController::class,'update'])->middleware('auth')->name('formacion.update');