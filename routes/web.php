<?php

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

/* Route::put('/permisos/update{id}', [StudentController::class,'update'])
->middleware(['auth','verified'])->name('admin.update');  */


/* Route::get('/admin/permisos', [UserController::class, 'index'])->name('admin.permisos');
 */
/* Route::get('/admin/permisos', function () {
    return view('/admin/permisos');
});
 */


Route::get('/admin/maestros', function () {
    return view('/admin/maestros');
});

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
