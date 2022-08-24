<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FlaskAPIController;


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

Route::get('/home', function () {
    return view('home');
});

Route::get('/add_farmacia', function () {
    return view('add_farmacia');
});

Route::get('/editar_farmacia', function () {
    return view('editar_farmacia');
});

Route::get('/entregadores', function () {
    return view('entregadores');
});

Route::get('/add_entregador', function () {
    return view('add_entregador');
});

Route::get('/edit_entregador', function () {
    return view('edit_entregador');
});

Route::get('/entregas', function () {
    return view('entregas');
});

Route::get('/auditoria', function () {
    return view('auditoria');
});

Auth::routes();


Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::get('/home', [FlaskAPIController::class, 'all_farmacias'])->middleware('auth');

Route::get('/add_farmacias', [FlaskAPIController::class, 'add_farmacias'])->middleware('auth');
Route::get('/detalhesfarmacia/{id}', [FlaskAPIController::class, 'detalhesfarmacia'])->name('farmDetails');
Route::get('/editarfarmacia/{id}', [FlaskAPIController::class, 'editarfarmacia'])->name('edit_farmacia');
Route::get('/editarfarmacia2/{id}', [FlaskAPIController::class, 'editarfarmacia2'])->name('editar_farmacias');
Route::get('/removefarmacia/{id}', [FlaskAPIController::class, 'removefarmacia'])->name('delete_farmacia');

//ENTREGADORES
Route::get('/entregadores', [FlaskAPIController::class, 'all_entregadores'])->middleware('auth');
Route::get('/add_entregadores', [FlaskAPIController::class, 'add_entregadores'])->middleware('auth');
Route::get('/editentregadores/{id}', [FlaskAPIController::class, 'editentregadores'])->name('edit_entregadores');
Route::get('/editentregadores2/{id}', [FlaskAPIController::class, 'editentregadores2'])->name('editar_entregadores');
Route::get('/removeentregadores/{id}', [FlaskAPIController::class, 'removeentregadores'])->name('delete_entregador');


//ENTREGAS
Route::get('/entregas', [FlaskAPIController::class, 'exibe_entregas']);
//AUDITORIA
Route::get('/auditoria', [FlaskAPIController::class, 'exibe_auditoria']);
