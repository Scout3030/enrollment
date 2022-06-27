<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::whereEmail('admin@mail.com')->first();
        $adminUser->assignRole('administrator');

        if(config('app.env') == 'local'){
            $users = User::factory()
                ->count(10)
                ->create();

            foreach ($users as $user){
                $user->assignRole('manager');
            }
        };
    }
}
