<?php

namespace Database\Factories;

use App\Models\BusStop;
use App\Models\Country;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'grade_id' => Grade::all()->random()->id,
            'middle_name' => $this->faker->name,
            'paternal_surname' => $this->faker->lastName,
            'maternal_surname' => $this->faker->lastName,
            'dni' => $this->faker->randomNumber(8,true),
            'birth' => $this->faker->date,
            'address' => $this->faker->address,
            'address_number' => $this->faker->randomNumber(2, true),
            'door' => $this->faker->randomLetter,
            'stair' => $this->faker->randomNumber(2, true),
            'floor' => $this->faker->randomDigit(),
            'letter' => $this->faker->randomLetter,
            'postal_code' => $this->faker->postcode,
            'first_tutor_dni' => $this->faker->randomNumber(8,true),
            'first_tutor_full_name' => $this->faker->lastName,
            'first_tutor_phone_number' => $this->faker->phoneNumber,
            'first_tutor_email' => $this->faker->email,
            'first_tutor_address' => $this->faker->address,
            'second_tutor_dni' => $this->faker->randomNumber(8,true),
            'second_tutor_full_name' => $this->faker->lastName,
            'second_tutor_phone_number' => $this->faker->phoneNumber,
            'second_tutor_email' => $this->faker->email,
            'second_tutor_address' => $this->faker->address,
            'bus_stop_id' => $this->faker->boolean ? BusStop::all()->random()->id : null,
            'parents_condition' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
