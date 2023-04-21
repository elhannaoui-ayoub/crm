<?php

namespace App\Http\Controllers\Administrateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historique;
class HistoriqueController extends Controller
{
    public function liste(){
        $historiques = Historique::all();
        return view('administrateur.historique.liste',compact('historiques'));
    }
}
