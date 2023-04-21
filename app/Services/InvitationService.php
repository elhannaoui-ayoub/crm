<?php
namespace App\Services;
use App\Models\Invitation;

class InvitationService{



    public static function createInvitation($societe,$employe){
       
        $invitation = Invitation::forcecreate([
            'societe_id'=>$societe,
            'employe_id'=>$employe,
          ]);

          return $invitation;
    }
}