<?php

namespace Database\Factories;

use App\Models\AcademicPeriod;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicPeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'level_id' => Level::all()->random()->id,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([AcademicPeriod::INACTIVE, AcademicPeriod::ACTIVE]),
            'started_at' => $this->faker->dateTimeBetween('+10 days', '+30 days'),
            'finished_at' => $this->faker->dateTimeBetween('+30 days','+90 days'),
        ];
    }
}
