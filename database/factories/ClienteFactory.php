<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
           'nome' => $this->faker->name(),
           'telefone' => '51' . $this->faker->numerify('#########'),
           'email' => $this->faker->unique()->safeEmail()
       ];
    }
}
