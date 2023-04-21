<?php
namespace App\Services;
use App\Models\Historique;
class HistoriqueService{

    public static function envoyerInvitation($admin,$employe,$societe){
       
        $history = Historique::forcecreate([
            'detail'=>" Admin ".$admin->nom." ".$admin->prenom." a invite l'employé ".$employe->nom." à joindre la société ".$societe->nom,
        ]);

    }

    public static function annulerInvitation($admin,$employe){
       
        $history = Historique::forcecreate([
            'detail'=>"Admin ".$admin->nom." ".$admin->prenom." a annuler l'invitation de l'employé ".$employe->nom,
        ]);

    }

    public static function validerProfile($employe){
       
        $history = Historique::forcecreate([
            'detail'=>$employe->nom." à confirmer son profile",
        ]);

    }

}