<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $association_id = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
        return [
            'libelle' => fake()->words(3, true),
            'date_limite_inscription' => fake()->date,
            'image_mise_en_avant' => fake()->imageUrl(), 
            'est_cloturer_ou_pas' => fake()->boolean,
            'date_evenement' => fake()->date,
            'association_id' => $association_id[mt_rand(0,9)],

        ];
    }
}
