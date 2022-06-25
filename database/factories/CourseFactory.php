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
        return [
            'grade_id' => null,
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text,
            'course_type_id' => null,
            'bilingual' => false,
            'duration' => null,
        ];
    }
}
