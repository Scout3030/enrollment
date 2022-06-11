<?php

namespace Database\Seeders;

use App\Models\Grade;
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
                'name' => 'Student 1',
                'email' => 'student1@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_MIDDLE_SCHOOL
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
                'name' => 'Student 2',
                'email' => 'student2@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_MIDDLE_SCHOOL
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
                'name' => 'Student 3',
                'email' => 'student3@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_HIGH_SCHOOL
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
                'name' => 'Student 4',
                'email' => 'student4@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::THIRD_MIDDLE_SCHOOL
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
            'name' => 'Student 5',
            'email' => 'student5@mail.com',
            'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
        ])->each(function (\App\Models\User $u) {
            Student::factory([
                'user_id' => $u->id,
                'grade_id' => Grade::THIRD_HIGH_SCHOOL
            ])
                ->count(1)
                ->create();
        });
    foreach ($users as $user){
        $user->assignRole('student');
    }
    }
}
