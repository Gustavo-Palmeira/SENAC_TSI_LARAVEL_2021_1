<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\APIController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth.jwt','prefix' => 'v1/funcionarios'], function(){

    //Funcionários
    Route::get('/', [FuncionarioController::class, 'index']);
    Route::post('/create', [FuncionarioController::class, 'store']);
    Route::delete('/delete/{id}', [FuncionarioController::class, 'destroy']);
    Route::get('/show/{id}', [FuncionarioController::class, 'show']);
    Route::put('/update/{id}', [FuncionarioController::class, 'update']);
    
});

Route::group(['middleware' => 'auth.jwt','prefix' => 'v1/vendas'], function(){

    //Vendas
    Route::get('/', [VendasController::class, 'index']);
    Route::post('/create', [VendasController::class, 'store']);
    Route::delete('/delete/{id}', [VendasController::class, 'destroy']);
    Route::get('/show/{id}', [VendasController::class, 'show']);
    Route::put('/update/{id}', [VendasController::class, 'update']);
    
});

Route::post('login', [APIController::class, 'login']);

Route::get('logout', [APIController::class, 'logout']);