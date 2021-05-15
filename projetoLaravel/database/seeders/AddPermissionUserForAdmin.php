<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AddPermissionUserForAdmin extends Seeder
{
    public function run()
    {
        $role = Role::find(2);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

    }
}