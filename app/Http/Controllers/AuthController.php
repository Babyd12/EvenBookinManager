<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginResquest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function goLogin()
    {
        return view('auth.login');
    }

    public function login(LoginResquest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('clients')->attempt($credentials)) {
            //dd($credentials);
            //dd(Auth::guard('clients')->user());
            $request->session()->regenerate();
            return redirect()->route('home');
        } 
        else {
           
            return to_route('login')->withErrors('Identifiant incorrect')->withInput();
        }

    }

    public function logoutClient(Request $request)
    {
        Auth::guard('clients')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
