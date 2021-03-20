<?php

use Illuminate\Support\Facades\Route;

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