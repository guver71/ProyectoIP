<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Egresado>
 */
class EgresadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'especialidad' => $this->faker->word,
            'nivel_academico' => $this->faker->randomElement(['Licenciatura', 'Maestría', 'Doctorado']),
            'User_id'=>User::all()->random()->id,
        ];
    }
}
