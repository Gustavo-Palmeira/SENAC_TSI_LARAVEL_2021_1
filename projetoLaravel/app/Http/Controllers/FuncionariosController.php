<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionariosController extends Controller
{
    public function listar() {
        $funcionarios = Funcionario::all();
        return view('funcionarios.listar', ['funcionarios' => $funcionarios]);
    }
}
