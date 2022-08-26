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

Route::get('/gerenciar', function () {
    return view('gerenciar');
});

Route::get('/editarEntrega', function () {
    return view('editarEntrega');
});

Route::get('/em_andamento', function () {
    return view('em_andamento');
});

Route::get('/finalizadas', function () {
    return view('finalizadas');
});

Route::get('/fazerLogin', [flaskApiController::class, 'fazerLogin']);
Route::get('/home', [flaskApiController::class, 'listaEntregas']);
Route::get('/detalhesentrega/{id}', [flaskAPIController::class, 'detalhesentrega'])->name('details');
Route::get('/aceitarEntrega/{id}', [flaskApiController::class, 'aceitarEntrega'])->name('aceitar');
Route::get('/minhasEntregas', [flaskApiController::class, 'entregas']);
Route::get('/finalizarEntrega/{id}', [flaskApiController::class, 'finalizarEntrega'])->name('finalizar');
Route::get('/removeentrega/{id}', [flaskAPIController::class, 'removeentrega'])->name('delete_entrega');
Route::get('/gerenciar', [flaskAPIController::class, 'gerenciarEntregas']);
Route::get('/em_andamento', [flaskAPIController::class, 'gerenciar_andamento']);
Route::get('/finalizadas', [flaskAPIController::class, 'v_entregue']);
Route::get('/editar/{id}', [flaskAPIController::class, 'editar'])->name('edit_entregas');
Route::get('/editar2/{id}', [flaskAPIController::class, 'editar2'])->name('editar_entregas');
