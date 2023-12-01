<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAssociationRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\Association;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function storeClient(RegisterRequest $request)
    {
        $donnée = $request->validated();
        $donnée['role'] = 'client';
        $donnée['mot_de_passe'] =  Hash::make($request->validated('mot_de_passe'));
        //dd($donnée);
        Client::create($donnée);
        return to_route('clientLoginForm')->with('success', 'Super Veuillez-vous connecter à présent');
    }

    public function storeAssociation(RegisterAssociationRequest $request)
    {
        $donnée = $request->validated();
        $donnée['role'] = 'association';
        $donnée['mot_de_passe'] =  Hash::make($request->validated('mot_de_passe'));
        //dd($donnée);
        Association::create($donnée);
        return to_route('loginAssociation')->with('success', 'Super Veuillez-vous connecter à présent');
    }
}
