<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    // private function extractDataWithImage(AssociationFormReques $request, Evenement $property ): array 
    // {
    //     // La je traite les données qui sont envoyé par le navigateur
    //     $data = $request -> validated();
    //     $image = $request ->validated('image');
    //     //dd($image);
    //     if($image === null || $image ->getError() ){
    //         return $data;
    //     }
    //     //la je traite les données de l'instance du model
    //     if($property -> image ){
    //         Storage::disk('public')->delete($property -> image);
    //     }
    //     $data['image'] = $image -> store('evenmentImg', 'public');
    //     // dd($data);
    //     return $data;

    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        //
    }
}
