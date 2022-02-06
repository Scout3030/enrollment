<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'administrator',
            'manager',
            'student',
        ];

        foreach ($roles as $role){
            $roleExist = Role::whereName($role)->first();
            if(!$roleExist){
                Role::create(['guard_name' => 'web', 'name' => $role]);
            }
        }

        $adminRole = Role::whereName('administrator')->first();

        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'restore users',
        ];

        foreach ($permissions as $permission){
            $permissionExist = Permission::whereName($permission)->first();
            if(!$permissionExist){
                $permissionExist = Permission::create(['guard_name' => 'web', 'name' => $permission]);
            }
            $adminRole->givePermissionTo($permissionExist->name);
        }
    }
}
