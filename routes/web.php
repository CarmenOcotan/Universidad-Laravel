<?php

use App\Http\Controllers\MaestroController;
use App\Http\Controllers\UserController;
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


Route::get('/maestros',[MaestroController::class,'index'])
->middleware(['auth','verified'])->name('maestros');

Route::put('/maestros/update{id}', [MaestroController::class,'update'])
->middleware(['auth','verified'])->name('maestros.update');

Route::get('/destroy{id}', [MaestroController::class,'destroy'])
->middleware(['auth','verified'])->name('maestros.destroy');

Route::put('/add', [MaestroController::class,'store'])
->middleware(['auth','verified'])->name('maestros.store');

Route::get('/admin/alumnos', function () {
    return view('/admin/alumnos');
});

Route::get('/admin/clases', function () {
    return view('/admin/clases');
});




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
