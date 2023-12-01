<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationFormResquest;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('evenements.form', [
            'evenement' => new Evenement(),
            'evenement_id' => $request->evenement_id,
            'association_id' => $request->association_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function genere_reference_aleatoire()
    {
        $longueurReference = 8; // Vous pouvez ajuster la longueur de la référence selon vos besoins
        $caracteresPermis = '012569ABCD2EFG4HIJK7L43MNOPQ3RSTUV8WXYZabcd43efghijklm434nopqr5s4tuvw54xyz';
        $reference = '';
        for ($i = 0; $i < $longueurReference; $i++) {
            $reference .= $caracteresPermis[random_int(0, strlen($caracteresPermis) - 1)];
        }
        return $reference;
    }
    public function store(ReservationFormResquest $request)
    {
        $donnée = $request->validated();
        $evenement = Evenement::find($donnée['evenement_id']);
        $client = Client::find($donnée['client_id']);
        if(!$evenement || !$client)
        {
            return Redirect::back()->with('error', 'Connexion à la base de donnéé impossible');
        }
       
        $donnée['reference'] = $this->genere_reference_aleatoire();
        $donnée['date_reservation'] = Carbon::now()->format('Y-m-d');
        $donnée['est_accepte_ou_pas'] = 1;
        //dd($donnée);
        $reservation = $evenement->clients()->attach($client->id, $donnée );
        
        return to_route('home')->with('success', 'Votre réservation a été prise en compte');
          //$reservation = Reservation::create($donnée);
         // $reservation->sync($request->utilisateur_connecte_id);
         //PIVOT 
        //$reservation->
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
