<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'firs_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'address' => fake()->address(),
        'bith_date' => fake()->date(),
        'DNI' => fake()->randomNumber(9)
        ];
    }
}
