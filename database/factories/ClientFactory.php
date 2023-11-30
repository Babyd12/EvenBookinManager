<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = ['association', 'user', 'admin'];
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'telephone' => fake()->phoneNumber(),
            'mot_de_passe' => 'client',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role'=>$role[mt_rand(0,2)],
        ];
    }
}
