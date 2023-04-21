<?php

namespace App\Http\Controllers\Administrateur;
use App\Models\Societe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SocieteController extends Controller
{
    public function create(){
        return view('administrateur.societe.new');
    }

    public function store(Request $request){
        Societe::forcecreate([
            'nom'=>$request->nom,
            'ice'=>$request->ice,
            'siteweb'=>$request->siteweb,
        ]);
        return redirect()->back()->with('msg','La societe est bien crée!');
    }

    public function delete(Request $request,$id){
        $societe = Societe::findOrfail($id);
        $societe->delete();
        return redirect()->back()->with('msg','La societe est bien été supprimé');
    }

    public function edit($id){
        $societe = Societe::findOrfail($id);
        return view('administrateur.societe.edit',compact('societe'));
    }

    public function editStore(Request $request,$id){
        
        $societe = Societe::findOrfail($id);
        $societe->nom = $request->nom;
        $societe->ice = $request->ice;
        $societe->siteweb = $request->siteweb;
        $societe->save();
        return redirect()->back()->with('msg','Les modifications on été bien enregitrée');
    }

    public function liste(){
        $societes = Societe::all();
        return view('administrateur.societe.liste',compact('societes'));
    }
}
