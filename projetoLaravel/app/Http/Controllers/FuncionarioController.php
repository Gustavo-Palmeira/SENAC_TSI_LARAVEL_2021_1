<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        return Funcionario::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $json = $request->getContent();

        return Funcionario::create( json_decode($json, JSON_OBJECT_AS_ARRAY) );
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            return $funcionario;
        } else {
            return json_encode([$id => 'Funcionario nao existe']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            $json = $request->getContent();
            $atualizacao = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $funcionario->nome = $atualizacao['nome'];

            $return = $funcionario->update() ? [$id => 'Atualizado com sucesso'] : [$id => 'Erro ao atualizar'];
        } else {
            $return = [$id => 'Funcionario nao existe'];
        }
        return json_encode($return);
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            $return = $funcionario->delete() ? [$id => 'Apagado com sucesso'] : [$id => 'Erro ao apagar'];
        } else {
            $return = [$id => 'Funcionario nao existe'];
        }

        return json_encode($return);
    }
}
