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
        if(config('app.env') == 'local') {
            $adminUser = User::whereEmail('admin@mail.com')->first();
            if (!$adminUser) {
                User::factory()
                    ->count(1)
                    ->create([
                        'name' => 'Admin',
                        'email' => 'admin@mail.com',
                        'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
                    ]);
            }
        } else {
            $adminUser = User::whereEmail('admin@iesleopoldoalasclarin.com')->first();
            if (!$adminUser) {
                User::factory()
                    ->count(1)
                    ->create([
                        'name' => 'Admin',
                        'email' => 'admin@iesleopoldoalasclarin.com',
                        'password' => '$2y$10$QE.ru7KQgLhB/KW336Rz.ua9R4PVd5ZVH/8geuh3h/yoTxZtHaluW'
                    ]);
            }
        }
    }
}
