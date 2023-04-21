<?php

namespace App\Http\Controllers\Employe;

use Illuminate\Http\Request;
use App\Models\Employe;
class ProfileController extends Controller
{
    public function edit(){
        return view('administrateur.profile.edit');
    }
    public function editStore(Request $request){
      $employe = Employe::findOrfail(Auth::guard('employe')->user()->id);
      $employe->nom=$request->nom;
      $employe->prenom=$request->prenom;
      $employe->email=$request->email;  
      if($request->password !=null){
        $employe->pasword=$request->password;
      }    
      $employe->save();
      return redirect()->back()->with('msg','les modifications ont été apportées');
    }
}
