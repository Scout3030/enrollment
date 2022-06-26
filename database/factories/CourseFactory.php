<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $grade = Grade::all()->random();
        return [
            'grade_id' => $grade->id,
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text,
            'course_type_id' => Level::all()->random()->courseTypes->random()->id,
            'bilingual' => false,
            'duration' => $grade->level->id == Level::HIGH_SCHOOL ? $this->faker->randomElement([1, 3, 4]) : null,
        ];
    }
}
