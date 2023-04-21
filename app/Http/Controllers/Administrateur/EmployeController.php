<?php

namespace App\Http\Controllers\Administrateur;

use Illuminate\Http\Request;
use App\Models\{Employe,Societe,Invitation};
use App\Http\Controllers\Controller;
use App\Services\InvitationService;
use App\Services\HistoriqueService;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function liste(){
        $employes = Employe::all();
        return view('administrateur.employe.liste',compact('employes'));
    }
    public function create(Request $request){
      $societes = Societe::all();
        return view('administrateur.employe.new',compact('societes'));
    }
    public function store(Request $request){
            Employe::forcecreate([
                'nom'=>$request->nom,
                'email'=>$request->email,
           ] );

           return redirect()->back()->with('msg','Employé est bien ajouté');
    }
    public function delete(Request $request,$id){
        $employe = Employe::findOrfail($id);
        $employe->delete();
        return redirect()->back()->with('msg','Employe est bien supprimé');
    }
    /*public function edit($id){
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

    }*/
    public function inviterEmploye(Request $request){
      
      if($this->checkIfAlreadyInvited($request->email)) redirect()->back()->with('msg','Employé est déja invité');

      $employe = Employe::forcecreate([
        'nom'=>$request->nom,
        'email'=>$request->email,
        'societe_id'=>$request->societe,
      ]);
      $societe=Societe::findOrfail($request->societe);

      $invitation = InvitationService::createInvitation($request->societe,$employe->id);

      HistoriqueService::envoyerInvitation(Auth::user(),$employe,$societe);

      return "this link must be sent to employé ( i don't have smtp server to send it from here) : http://localhost:8000/employe/register/".$invitation->id;
    }

    public function checkIfAlreadyInvited($email){
      $invitations = Invitation::all();
      foreach($invitations as $invitation){
        if($invitation->employe->email == $email){
            return true;
        }
      }
      return false;
    }

    public function CancelEmployeInvitation($id){
      
        $employe=Employe::findOrfail($id);
        HistoriqueService::annulerInvitation(Auth::user(),$employe);
        $employe->delete();

        return redirect()->back();
    }
}
