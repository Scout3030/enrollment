<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

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
    }
}
