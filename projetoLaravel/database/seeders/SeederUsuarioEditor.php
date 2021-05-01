<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederUsuarioEditor extends Seeder
{
    public function run()
    {
        $user = User::create(['name' => 'Marco Antônio',
        'email' => 'marco.editor@sp.senac.br',
        'password' => bcrypt('senacsenac')]);

        $role = Role::create(['name' => 'Editor']);

        $permissions = Permission::pluck('id', 'id')->where(['id' => 'role-list', 'id' => 'role-edit']);

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
