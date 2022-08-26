<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\flaskApiController;

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

Route::get('/minhasEntregas', function () {
    return view('minhasEntregas');
});

Route::get('/solicitarEntrega', function () {
    return view('solicitarEntrega');
});

Route::get('/andamento', function () {
    return view('andamento');
});

Route::get('/entregues', function () {
    return view('entregues');
});

Route::get('/fazerLogin', [flaskApiController::class, 'fazerLogin']);
Route::get('/home', [flaskApiController::class, 'listaEntregas']);
Route::get('/detalhesentrega/{id}', [flaskAPIController::class, 'detalhesentrega'])->name('details');
Route::get('/add_entrega', [flaskAPIController::class, 'add_entrega']);
Route::get('/editar/{id}', [flaskAPIController::class, 'editar'])->name('edit_entregas');
Route::get('/editar2/{id}', [flaskAPIController::class, 'editar2'])->name('editar_entregas');
Route::get('/removeentrega/{id}', [flaskAPIController::class, 'removeentrega'])->name('delete_entrega');
Route::get('/andamento', [flaskApiController::class, 'listaAndamentos']);
Route::get('/entregues', [flaskApiController::class, 'listaEntregues']);