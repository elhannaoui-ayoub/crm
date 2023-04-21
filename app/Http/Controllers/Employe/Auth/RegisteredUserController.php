<?php

namespace App\Http\Controllers\Employe\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Invitation;
use App\Services\HistoriqueService;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($id)
    {
        $invitation = Invitation::where('id',$id)->first();
        if($invitation==null) return "Token est invalid";
        return view('employe.auth.register',compact('id'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,$id): RedirectResponse
    {
        $invitation = Invitation::where('id',$id)->first();
        if($invitation==null) return "Token est invalid";

        $request->validate([
            'nom' => ['required'],
            'password' => ['required'],
            'adresse' => ['required'],
            'telephone' => ['required'],
            'date' => ['required'],
        ]);
        
        $employe = Employe::where('id',$invitation->employe->id)->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'dateNaissance' => $request->date,
            'password' => Hash::make($request->password),
        ]);
        $employe = Employe::where('id',$invitation->employe->id)->first();
        $employe->estValide=1;
        $employe->save();
        HistoriqueService::ValiderProfile($employe);
        $invitation->delete();
        return redirect()->route('employe.login');
    }
}
