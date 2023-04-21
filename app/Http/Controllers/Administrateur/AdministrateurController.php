<?php

namespace App\Http\Controllers\Administrateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrateur;
class AdministrateurController extends Controller
{
    public function create(Request $request){
        return view('administrateur.administrateur.new');
    }
    public function store(Request $request){
            Administrateur::forcecreate([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'password'=>Hash::make($request->email),
           ] );

           return redirect()->back()->with('msg','Administrateur est bien ajouté');
    }
    public function delete(Request $request,$id){
        $admin = Administrateur::findOrfail($id);
        $admin->delete();
        return redirect()->back()->with('msg','Administrateur est bien supprimé');
    }

    public function liste(){
        $administrateurs = Administrateur::where('id','!=',Auth::user()->id)->get();
        return view('administrateur.administrateur.liste',compact('administrateurs'));
    }
    public function edit($id){
        $administrateur = Administrateur::findOrfail($id); 
        
        return view('administrateur.administrateur.edit',compact('administrateur'));
    }
    public function editStore(Request $request,$id){
        
        $admin = Administrateur::findOrfail($id);
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom; 
        $admin->email = $request->email; 
        $admin->password = $request->password!=null?Hash::make($request->password):Hash::make($request->email); 
        $admin->save();
        return redirect()->route('administrateur.administrateurs.liste');

    }
}
