<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store(RegisterRequest $request)
    {
        $donnée = $request->validated();
        $donnée['role'] = 'client';
        $donnée['mot_de_passe'] =  Hash::make($request->validated('mot_de_passe'));
        //dd($donnée);
        Client::create($donnée);
        return to_route('login')->with('success', 'Super Veuillez-vous connecter à présent');
    }
}
