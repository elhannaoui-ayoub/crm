<?php

namespace App\Http\Controllers\Employe\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Employe;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('employe.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $employe = Employe::where('email',$request->email)->first();
        if($employe ==null || $employe->estValide == 0) redirect()->route('employe.login')->with('msg', 'Compte est pas encore valide !');
        $dd=true;
        $dd = $request->authenticate('employe');
    
        if(!$dd){
        return redirect()->route('employe.login')->with('errorr', 'Mail invalide !');
        }
        $request->session()->regenerate();
        return redirect()->route('employe.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employe')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('employe.login');
    }
}
