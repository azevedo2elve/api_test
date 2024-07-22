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
//        return [
//            'nome' => fake()->name(),
//            'telefone' => fake()->phoneNumber(),
//            'email' => fake()->unique()->safeEmail(),
//        ];

        return [
            'nome' => 'Gabriel Azevedo',
            'telefone' => '5555555555',
            'email' => 'gabrielazevedo@gmail.com',
        ];
    }
}
