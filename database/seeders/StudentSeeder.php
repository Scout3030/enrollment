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
        // ESO
        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 1 ESO',
                'email' => 'student1@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG', //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                    'dni' => "11111111"
                ])
                    ->count(1)
                    ->create();
            });


        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 ESO',
                'email' => 'student2@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG', //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                    'dni' => "22222222"
                ])
                    ->count(1)
                    ->create();
            });


        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 3 ESO',
                'email' => 'student3@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG', //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                    'dni' => "33333333"
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 4 ESO',
                'email' => 'student4@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG', //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                    'dni' => "44444444"
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 1 PMAR',
                'email' => 'student5@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG', //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_HIGH_SCHOOL,
                    'dni' => "55555555"
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 PMAR',
                'email' => 'student6@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                    'dni' => '66666666'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 3 PMAR',
                'email' => 'student7@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                    'dni' => '7777777'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student CIENCIA y TECNOLOGIA',
                'email' => 'student8@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                    'dni' => '88888888'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 1 HUMANIDADES Y CIENCIAS SOCIALES',
                'email' => 'student9@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                    'dni' => '99999999'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student BACHILLERATO GENERAL',
                'email' => 'student10@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                    'dni' => '10101010'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 BACHILLERATO CIENCIAS',
                'email' => 'student12@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                    'dni' => '12121212'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 HUMANIDADES Y CIENCIAS SOCIALES',
                'email' => 'student13@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                    'dni' => '13131313'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 1 FPB',
                'email' => 'student14@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                    'dni' => '14141414'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 FPB',
                'email' => 'student15@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                    'dni' => '15151515'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 1 CFGM',
                'email' => 'student16@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                    'dni' => '16161616'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(1)
            ->create([
                'name' => 'Student 2 CFGM',
                'email' => 'student17@mail.com',
                'password' => '$2y$10$nK4EQKL2hz1e6lMNsGUw5O/8lRjCdPRSo6e/te3GgrqUz9sTsl/qG' //secret
            ])->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                    'dni' => '17171717'
                ])
                    ->count(1)
                    ->create();
            });

        User::factory()
            ->count(99)
            ->create()
            ->each(function (\App\Models\User $u) {
                Student::factory([
                    'user_id' => $u->id,
                    'grade_id' => Grade::SECOND_HIGH_SCHOOL
                ])
                    ->count(1)
                    ->create();
            });
    }
}
