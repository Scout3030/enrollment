<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::whereEmail('admin@mail.com')->first();
        if(!$adminUser){
            User::factory()
                ->count(1)
                ->create([
                    'name' => 'Roberth',
                    'email' => 'admin@mail.com',
                    'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG'
                ]);
        }
        User::factory()
            ->count(20)
            ->create();
    }
}
