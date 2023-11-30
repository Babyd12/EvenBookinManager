<?php

namespace App\Http\Controllers\Evenement;

use App\Models\Evenement;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EvenementFormRequest;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    private function extractDataWithImage(EvenementFormRequest $request, Evenement $evenement ): array 
    {
        // La je traite les données qui sont envoyé par le navigateur
        $data = $request -> validated();
        
        $image = $request ->validated('image_mise_en_avant');
       // dd($image);
        if($image === null || $image ->getError() ){
            return $data;
        }
        //la je traite les données de l'instance du model
        if($evenement -> image ){
            Storage::disk('public')->delete($evenement -> image);
        }
        $data['image_mise_en_avant'] = $image -> store('evenementImg', 'public');
        // dd($data);
        return $data;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {    //$associationId = session('association_id'); Au faite jai stocké l'id de l'association la session de laravel juste apres avoir enregistre sont evenement p
       
        return view('associations.evenements.index',[
            'evenements' => Evenement::orderBy('created_at', 'desc')->where('association_id', '=', Auth::guard('clients')->user()->id )->paginate(9),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('associations.evenements.form', [
            'evenement' => new Evenement(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvenementFormRequest $request, Evenement $evenement)
    {
        Evenement::create( $this -> extractDataWithImage($request, $evenement) );
        return to_route('association.evenement.index')->with('Evenement enregistrer avce succes');
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
    public function edit(Evenement $evenement)
    {
        return view('associations.evenements.form', [ 'evenement' => $evenement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvenementFormRequest $request, Evenement $evenement)
    {
        $evenement->update($this -> extractDataWithImage($request, $evenement));
        return to_route('association.evenement.index')->with('Evenement modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        if($evenement ->image)
        {
            Storage::disk('public')->delete($evenement ->image);
        }
        $evenement->delete($evenement);
        return to_route('association.evenement.index')->with('Evenement supprimé avec succes');
    }
}
