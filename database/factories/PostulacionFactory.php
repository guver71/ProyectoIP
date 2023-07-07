<?php

namespace Database\Factories;

use App\Models\Egresado;
use App\Models\Trabajo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulacion>
 */
class PostulacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ruta_cv' => $this->faker->url,
            'puntaje' => $this->faker->numberBetween(0, 100),
            'estado' => $this->faker->randomElement(['Aprobado', 'Rechazado', 'Pendiente']),
            'Egresado_id'=>Egresado::all()->random()->id,
            'Trabajo_id'=>Trabajo::all()->random()->id,
        ];
    }
}
