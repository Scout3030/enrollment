<?php

namespace Database\Factories;

use App\Models\BusStop;
use App\Models\Grade;
use App\Models\Student;
use App\Models\AcademicPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::all()->random()->id,
            'grade_id' => Grade::all()->random()->id,
            'academic_period_id' => AcademicPeriod::all()->random()->id,
            'bus_stop_id' => $this->faker->boolean ? BusStop::all()->random()->id : null,
            'bilingual' => $this->faker->boolean,
            'previous_school' => $this->faker->sentence,
            'repeat_course' => $this->faker->boolean,
        ];
    }
}
