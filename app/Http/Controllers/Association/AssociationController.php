<?php

namespace App\Http\Controllers\Association;

use App\Models\Association;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssociationFormRequest;

class AssociationController extends Controller
{
    private function extractDataWithImage(AssociationFormRequest $request, Association $association ): array 
    {
        // La je traite les données qui sont envoyé par le navigateur
        $data = $request -> validated();
        $image = $request ->validated('image');
        //dd($image);
        if($image === null || $image ->getError() ){
            return $data;
        }
        //la je traite les données de l'instance du model
        if($association -> image ){
            Storage::disk('public')->delete($association -> image);
        }
        $data['image'] = $image -> store('associationImg', 'public');
        // dd($data);
        return $data;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('associations.index',[
            'associations' => Association::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $association = new Association();
        return view('associations.form', [
            'association' => $association,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssociationFormRequest $request, Association $association)
    {
        Association::create( $request->validated($this -> extractDataWithImage($request, $association)) );
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
