<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Clientes;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class ClientesController extends Controller
{

    /*  public function __construct() {
            $this->middleware('auth');
    } */

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
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, 
                       ['name' => 'required',
                        'email' => 'required | email | unique:users, email',
                        'roles' => 'required']);

        $input = $request->all();

        $user = Clientes::create($input);

        $user->assignRole($request->input('roles'));

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
        $roles = Role::pluck('name', 'name')->all();
        $clienteRole = $cliente->roles->pluck('name', 'name')->all();
        
        return view('clientes.edit', compact('cliente', 'roles', 'clienteRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, 
                       ['name' => 'required',
                        'email' => 'required | email | unique:users, email',
                        'roles' => 'required']);

        $input = $request->all();

        $cliente = Clientes::find($id);

        $cliente->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $cliente->assignRole($request->input('roles'));

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
