<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabajo>
 */
class TrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'fecha_publication' => $this->faker->date(),
        'categoria' => $this->faker->word,
        'description' => $this->faker->sentence,
        'salario' => $this->faker->randomFloat(2, 1000, 5000),
        'fecha_inicio' => $this->faker->date(),
        'fecha_fin' => $this->faker->date(),
        'requiere_experiencia' => $this->faker->randomElement(['Sí', 'No']),
        'modalidad_tiempo' => $this->faker->randomElement(['Tiempo completo', 'Medio tiempo']),
        'beneficios' => $this->faker->sentence,
        'datos_contacto' => $this->faker->phoneNumber,
        'titulo' => $this->faker->sentence,
        'antecedentes' => $this->faker->sentence,
        'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
        'empresa_id'=>Empresa::all()->random()->id,
        ];
    }
}
