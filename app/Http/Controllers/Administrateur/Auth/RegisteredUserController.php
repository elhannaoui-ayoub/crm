<?php

namespace App\Http\Controllers\Administrateur\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('administrateur.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:administrateurs'],
            'password' => ['required'],
        ]);

        $Administrateur = Administrateur::forcecreate([
            'nom' => $request->nom,
            'prenom'=>$request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        return redirect()->route('administrateur.dashboard');
    }
}
