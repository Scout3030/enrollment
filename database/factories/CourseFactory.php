<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Grade;
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
            'grade_id' => Grade::all()->random()->id,
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text,
            'type' => $this->faker->randomElement([
                Course::MANDATORY, Course::MANDATORY_OPTIONAL, Course::OPTIONAL
            ]),
            'bilingual' => $this->faker->boolean,
        ];
    }
}
