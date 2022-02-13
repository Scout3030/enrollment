<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::get()->each(function (\App\Models\Student $s) {
                Enrollment::factory([
                    'student_id' => $s->id
                ])
                    ->count(1)
                    ->create();
            });
    }
}
