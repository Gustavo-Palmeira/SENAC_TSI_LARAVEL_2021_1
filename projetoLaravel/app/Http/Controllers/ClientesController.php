<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientesController extends Controller
{

    /*  public function __construct() {
            $this->middleware('auth');
    } */

    public function __construct() {
        $this->middleware('permission:cliente-list',['only' => ['index', 'show']]);
        $this->middleware('permission:cliente-create',['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete',['only' => ['destroy', 'show']]);
    }

    public function getCliente($id)
    {
        $cliente = Clientes::find($id);
        return $cliente;
    }

    public function checkCliente(int $id) {
        $cliente = Clientes::find($id);

        return $cliente ?? false;
    }

    public function listar() {
        $clientes = Clientes::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index(Request $request)
    {
        $quantityPage = 5;
        $data = Clientes::orderBy('id', 'DESC')->paginate($quantityPage);
        return view('clientes.index', compact('data'))->with('index', ($request->input('page', 1) - 1) * $quantityPage);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('clientes.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validação de campos
        $this->validate($request,
            ['nome' => 'required',
            'email' => 'required|email|unique:users,email']);

        $input = $request->all();
        Clientes::create($input);
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Clientes::find($id);
    
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        // Validação de campos
        $this->validate($request,
            ['nome' => 'required',
            'email' => 'required|email|unique:users,email']);

        $input = $request->all();

        $cliente = Clientes::find($id);

        $cliente->update($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
