<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\UserController;
use App\Models\Classs;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Route::resource('usuarios', UserController::class)->names('admin');

/* Route::get('',[HomeController::class,'index']); */

/* Rutas para los Maestros */
/* 
Route::get('/maestros',[MaestroController::class,'index'])
->middleware(['auth','verified'])->name('maestros');

Route::put('/maestros/update{id}', [MaestroController::class,'update'])
->middleware(['auth','verified'])->name('maestros.update');

Route::get('/destroy{id}', [MaestroController::class,'destroy'])
->middleware(['auth','verified'])->name('maestros.destroy');

Route::put('/add', [MaestroController::class,'store'])
->middleware(['auth','verified'])->name('maestros.store');

/* Rutas para los Alumnos */
/* 
Route::get('/alumnos',[AlumnoController::class,'index'])
->name('alumnos');

Route::put('alumnos/update{id}', [AlumnoController::class,'update'])
->name('alumnos.update');

Route::get('alumnos/destroy{id}', [AlumnoController::class,'destroy'])
->name('alumnos.destroy');

Route::put('alumnos/add', [AlumnoController::class,'store'])
->name('alumnos.store');

/* Rutas para mis clases Clases  

Route::get('/clases',[ClaseController::class,'index'])
->name('clases');

Route::put('clases/update{id}', [ClaseController::class,'update'])
->name('clases.update');

Route::get('clases/destroy{id}', [ClaseController::class,'destroy'])
->name('clases.destroy');

Route::put('clases/add', [ClaseController::class,'store'])
->name('clases.store'); */


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('role:admin','auth','verified')->group(function (){
    Route::get('/permisos',[UserController::class,'index'])
    ->name('permisos');

    Route::put('/update{id}', [UserController::class,'update'])
    ->name('permisos.update');

    Route::get('/maestros',[MaestroController::class,'index'])
    ->name('maestros');

    Route::put('maestros/update{id}', [MaestroController::class,'update'])
    ->name('maestros.update');

    Route::get('/destroy{id}', [MaestroController::class,'destroy'])
    ->name('maestros.destroy');

    Route::put('/add', [MaestroController::class,'store'])
    ->name('maestros.store');

    Route::get('/alumnos',[AlumnoController::class,'index'])
    ->name('alumnos');

    Route::put('alumnos/update{id}', [AlumnoController::class,'update'])
    ->name('alumnos.update');

    Route::get('alumnos/destroy{id}', [AlumnoController::class,'destroy'])
    ->name('alumnos.destroy');

    Route::put('alumnos/add', [AlumnoController::class,'store'])
    ->name('alumnos.store');

    Route::get('/clases',[ClaseController::class,'index'])
    ->name('clases');

    Route::put('clases/update{id}', [ClaseController::class,'update'])
    ->name('clases.update');

    Route::get('clases/destroy{id}', [ClaseController::class,'destroy'])
    ->name('clases.destroy');

    Route::put('clases/add', [ClaseController::class,'store'])
    ->name('clases.store');
});

Route::middleware('role:maestro','auth','verified')->group(function (){
    Route::get('/notas',[NoteController::class,'index'])
    ->name('notas');
    Route::put('/update{id}', [NoteController::class,'update'])
    ->name('calificacion.update');
    Route::put('/store{id}', [NoteController::class,'store'])
    ->name('calificacion.store');
});