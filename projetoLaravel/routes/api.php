<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VendasController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(static function() {

    //Funcionários
    Route::get('funcionarios', [FuncionarioController::class, 'index']);
    Route::post('funcionarios/create', [FuncionarioController::class, 'store']);
    Route::delete('funcionarios/delete/{id}', [FuncionarioController::class, 'destroy']);
    Route::get('funcionarios/show/{id}', [FuncionarioController::class, 'show']);
    Route::put('funcionarios/update/{id}', [FuncionarioController::class, 'update']);

    //Vendas
    Route::get('vendas', [VendasController::class, 'index']);
    Route::post('vendas/create', [VendasController::class, 'store']);
    Route::delete('vendas/delete/{id}', [VendasController::class, 'destroy']);
    Route::get('vendas/show/{id}', [VendasController::class, 'show']);
    Route::put('vendas/update/{id}', [VendasController::class, 'update']);
    
});