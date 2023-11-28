<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Association;
use App\Models\Client;
use App\Models\Evenement;
use Database\Factories\ClientReservationFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(10)->create();
        $associations =  Association::factory(10)->create();
        Evenement::factory(10)->create();
        $client_id = [1, 2, 3, 4, 5, 6, 7, 8];
        $evenement_id = [1, 2, 3, 4, 5, 6, 7, 8];
        foreach ($associations as $association) {
            // Supposons que votre table d'association a les colonnes client_id et reservation_id
            DB::table('client_reservations')->insert([
                'reference' => fake()->numerify('REF-#####'),
                'date_reservation' => fake()->date(),
                'est_accepte_ou_pas' => fake()->boolean(),
                'client_id' => $client_id[mt_rand(0, 7)],
                'evenement_id' => $evenement_id[mt_rand(0, 7)],
            ]);
        }

        //ClientReservationFactory::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
