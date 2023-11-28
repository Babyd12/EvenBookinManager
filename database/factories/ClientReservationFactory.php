<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClientReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client_id = [1,2,3, 4, 5, 6, 7, 8 ];
        $evenement_id = [1,2,3, 4, 5, 6, 7, 8 ];
        return [
            'reference' => fake()->numerify('REF-#####'),
            'date_reservation' => fake()->date(),
            'est_accepte_ou_pas' => fake()->boolean(),
            'client_id' => $client_id[mt_rand(0, 7)],
            'evenement_id' => $evenement_id[mt_rand(0, 7)],
        ];
    }
}
