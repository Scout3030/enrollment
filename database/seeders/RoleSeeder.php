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

        // General permissions
        $permissions = [
            //User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',
            'restore users',
            //Course permissions
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'restore courses',
            //Level permissions
            'view levels',
            //Grade permissions
            'view grades',
            //Section permissions
            'view sections',
            //Student permissions
            'view students',
            'view bus stops',
            //Enrollment permissions
            'view enrollments'
        ];

        foreach ($permissions as $permission){
            $permissionExist = Permission::whereName($permission)->first();
            if(!$permissionExist){
                $permissionExist = Permission::create(['guard_name' => 'web', 'name' => $permission]);
            }
            $adminRole->givePermissionTo($permissionExist->name);
        }

        // Student permissions
        $permissions = [
            'create enrollment',
            'view levels',
            'view grades',
            'view bus stops'
        ];

        $studentRole = Role::whereName('student')->first();

        foreach ($permissions as $permission){
            $permissionExist = Permission::whereName($permission)->first();
            if(!$permissionExist){
                $permissionExist = Permission::create(['guard_name' => 'web', 'name' => $permission]);
            }
            $studentRole->givePermissionTo($permissionExist->name);
        }
    }
}
