<?php

namespace App\Http\Traits;

use App\model\Employerlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Candidate;
use App\Models\Notification;


trait NotificationTrait
{

/*
** Envoi de notification
*/
    public function setNotification($data){
        Notification::create($data);
    }


/*
**  Charger les notifications d'un utilisateur
*/
    public function getNotification($usercode){
        $list = Notification::where("notif_recipient", $usercode)->orderBy("notif_id", "desc")->get();

        if($list && count($list)>0){
            return $list;
        }
        return false;
    }


/*
** Modifier le statut d'une notification
*/
    public function updateNotification($id, $status){
        Notification::where("notif_id", $id)->update(["notif_status" => $status]);
    }


}
