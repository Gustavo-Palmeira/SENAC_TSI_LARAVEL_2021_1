<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

route::get('/avisos', function() {
    return view('avisos', [ 'nome' => 'Gustavo', 
                            'mostrar' => true,
                            'avisos' => [[ 'id' => 1,
                                          'texto' => 'Feriados Agora'],
                                        [ 'id' => 2,
                                          'texto' => 'Feriado semana que vem']]]);
});

route::get('/product', function() {
    return view('product', [ 'nome' => 'Game of Thrones', 
                             'estoque' => true,
                             'paginas' => 475,
                             'peso' => 2,
                             'edicoes' => [[ 'id' => 1,
                                             'edicao' => '1'],
                                          [ 'id' => 2,
                                             'edicao' => '1.2'],
                                          [ 'id' => 3,
                                              'edicao' => '1.3']]],
                            [ 'nome2' => 'Pathfinder', 
                              'estoque2' => false,
                              'paginas2' => 200,
                              'pes2' => 1,
                              'edicoes2' => [[ 'id2' => 1,
                                                'edicao2' => '1'],
                                            [ 'id2' => 2,
                                                'edicao2' => '2'],
                                            [ 'id2' => 3,
                                                'edicao2' => '2.1']]]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function (){
    Route::get('/listar', [ClientesController::class, 'listar'])->middleware('auth');
    Route::get('/', [ClientesController::class, 'index'])->middleware('auth');;
});

Route::group(['prefix' => 'funcionarios'], function (){
    Route::get('/listar', [FuncionariosController::class, 'listar'])->middleware('auth');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});