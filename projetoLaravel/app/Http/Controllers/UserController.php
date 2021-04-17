<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $quantityPage = 5;
        $data = User::orderBy('id', 'DESC')->paginate($quantityPage);
        return view('users.index', compact('data'))->with('index', ($request->input('page', 1) - 1) * $quantityPage);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact());
    }

    public function store(Request $request)
    {
        $this->validate($request, 
                       ['name' => 'required',
                        'email' => 'required | email | unique:users, email',
                        'password' => 'required | same:confirm-password',
                        'roles' => 'required']);
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
