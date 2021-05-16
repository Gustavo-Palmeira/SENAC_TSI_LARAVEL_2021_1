<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendas;


class VendasController extends Controller
{
    public function index()
    {
        return Vendas::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $json = $request->getContent();

        return Vendas::create( json_decode($json, JSON_OBJECT_AS_ARRAY) );
    }

    public function show($id)
    {
        $venda = Vendas::find($id);

        if ($venda) {
            return $venda;
        } else {
            return json_encode([$id => 'Venda nao existe']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $venda = Vendas::find($id);

        if ($venda) {
            $json = $request->getContent();
            $atualizacao = json_decode($json, JSON_OBJECT_AS_ARRAY);
            
            $venda->cliente_id = $atualizacao['cliente_id'];
            $venda->funcionario_id = $atualizacao['funcionario_id'];
            $venda->data_da_venda = $atualizacao['data_da_venda'];
            $venda->valor = $atualizacao['valor'];

            $return = $venda->update() ? [$id => 'Atualizado com sucesso'] : [$id => 'Erro ao atualizar'];
        } else {
            $return = [$id => 'Venda nao existe'];
        }
        return json_encode($return);
    }

    public function destroy($id)
    {
        $venda = Vendas::find($id);

        if ($venda) {
            $return = $venda->delete() ? [$id => 'Apagado com sucesso'] : [$id => 'Erro ao apagar'];
        } else {
            $return = [$id => 'Venda nao existe'];
        }

        return json_encode($return);
    }
}
