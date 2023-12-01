<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginResquest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function ClientLoginForm()
    {
        return view('auth.login');
    }

    public function loginClient(LoginResquest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('clients')->attempt($credentials)) {
            //dd($credentials);
            //dd(Auth::guard('clients')->user());
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return Redirect::back()->withErrors('Identifiant incorrect');
        }
    }

    public function loginAssociation(LoginResquest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('associations')->attempt($credentials)) {
            $request->session()->regenerate();
            //dd(Auth::guard('associations')->user());
            return redirect()->route('association.evenement.create');
        } else {
            return to_route('loginAssociation')->withErrors('Identifiant incorrect')->withInput();
        }
    }


    public function logoutClient(Request $request)
    {
        Auth::guard('clients')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }


    public function logoutAssociation(Request $request)
    {
        Auth::guard('associations')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginAssociation'));
    }
}
