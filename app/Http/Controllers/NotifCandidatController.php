<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Employerlink;
use \App\Models\Employerprovlink;
use \App\Models\Candidate;
use \App\Http\Middleware\SessionMiddleware;

use \App\Http\Traits\NotificationTrait;
use App\Models\Employer;

class NotifCandidatController extends Controller{
    use NotificationTrait;

    public function __construct(Request $request)
    {
        $this->middleware('session');
        $this->request = $request;
    }

    public function index(){

        $notif = $this->getNotification($this->request->session()->get('code'));
        $tab_notif = [];

        foreach($notif as $value){
            if($value->notif_type == 'Recruteur-Candidat'){
                $recruteur = Employer::where('employ_code',$value->notif_transmitter)->first();

                $date = $value->created_at->format('d/m/Y H:i:s');

                $tab_notif[]=[
                    'val'       => $value,
                    'date'      => $date,
                    'recruteur' => $recruteur
                ];

            }
        }

        return view('candidats.notifications.notification',['notif'=>$tab_notif]);
    }

}
