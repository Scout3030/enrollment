<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(99)
            ->create()->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id
                ])
                    ->count(1)
                    ->create();
            });

        foreach ($users as $user){
            $user->assignRole('student');
        }

        $users = User::factory()
            ->count(1)
            ->create([
                'name' => 'Student',
                'email' => 'student@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id
                ])
                    ->count(1)
                    ->create();
            });
        foreach ($users as $user){
            $user->assignRole('student');
        }
    }
}
