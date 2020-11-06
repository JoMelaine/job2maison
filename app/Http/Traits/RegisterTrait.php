<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMailable;

use App\Models\Candidate;
use App\Models\Employer;


trait RegisterTrait
{

/*
*** Inscrire un candidat
*/
    public function setNewAccount(Request $request){

//return [$this->addDaysToDate(date("d/m/Y"), 2), time() + 60*60*48];

        $this->validate($request, [
            'name'=>'required',
            'email' =>'required|email',
            'pwd'   =>'required',
            'acc'   =>'required'
        ]);

        $act_ressource   = "Registration";
        $act_type        = "Creat";
        $act_result      = "FAILED";

        $response = [
            'status'    => false,
            'message'   => "Echec ! Erreur d'enregistrement du compte",
            'data'      => []
        ];


        if($request->acc <> 1 && $request->acc <> 2){
            return $response;
        }

        if($request->acc == 1){
            $user = Candidate::where(['cand_email'=>$request->email])->first();
        }

        if($request->acc == 2){
            $user = Employer::where(['employ_email'=>$request->email])->first();
        }

        // Verifier l'unicité de l'email
        if($user){
            $response = [
                'status'    => false,
                'message'   => "Echec ! Cette adresse est déjà utilisée",
                'data'      => []
            ];
            return $response;
        }

        $usercode   = $this->getUserCode();   //  Générer le code utilisateur

        // Enregistrer le candidat
        if($this->setNewAccountInfo($request->email, $request->pwd, $usercode, $request->acc, $request->nom, $request->prenom)){

            // Envoyer un Email de confirmation

            $key = env('JWT_SECRET');

            $token['uid']     = $usercode;
            $token['acc']     = $request->acc;
            $token['rec']     = $request->email;
            $token['expdate'] = $this->addDaysToDate(date("d/m/Y"), 2);
            $token['exp']     = time() + 60*60*48;  // Lien valide pour 2 jours

            /* $validationkey  = JWT::encode($token, $key);

            $url        = env('APP_URL');
            $link       = $url."/public/register/confirm/".$validationkey;
            $logo       = $url."/public/images/avatars/default.png";
            $to_email   = $request->email;
            $data       = ['link'=> $link, 'logo'=> $logo]; */

            /*
            Mail::send('emails.registration', $data, function($message) use ($to_email) {
                 $message->to($to_email)->subject
                    ("Confirmation d'inscription");
                 $message->from('register-no-reply@wikeahotels.com','WikeaHotels Registration');
            });
            */
            $response = [
                'status'    => true,
                'message'   => "Inscription enregistrée. Consultez votre adresse électronique pour valider",
                /* 'data'      => ['usercode'=>$usercode, 'username'=>"", 'link'=>$data] */
            ];

            $act_result = "SUCCESS";
        }

        //$this->setUserAction($resource, $action, $actionresult,  $usercode, $hotelcode);
        return $response;
    }


/*
*** Créer le compte du Utilisateur : CANDIDAT ou EMPLOYEUR
*/
    public function setNewAccountInfo($login, $password, $usercode, $usertype,$usernom, $userprenom){

        $user = null;

        if($usertype == 1){
            $user = new Candidate;

            $user->cand_code            = $usercode;
            $user->cand_pwd             = Hash::make($password);
            $user->cand_email           = $login;
            $user->cand_status          = 0;
            $user->cand_created_date    = date("d/m/Y");
            $user->cand_created_hour    = date("H:i");
            $user->cand_name            = strtoupper($usernom)+' '+strtoupper($userprenom);
            $user->save();
        }

        if($usertype == 2){
            $user = new Employer;

            $user->employ_code            = $usercode;
            $user->employ_pwd             = Hash::make($password);
            $user->employ_email           = $login;
            $user->employ_status          = 0;
            $user->employ_created_date    = date("d/m/Y");
            $user->employ_created_hour    = date("H:i");
            $user->save();
        }

        if($user){
            return true;
        }
        return false;
    }


/*
*** Valider l'inscription de l'Utilisateur : CANDIDAT ou EMPLOYEUR
*/
    public function setAccountConfirmation($usercode, $usertype){

        $updated = false;

        if($usertype == 1){
            $data       = ['cand_status'=>100, 'cand_updated_date'=>date("d/m/Y"), 'cand_updated_hour'=>date("H:i")];
            $updated    = Candidate::where(['cand_code'=>$usercode, 'cand_status'=>0])->update($data);
        }

        if($usertype == 2){
            $data       = ['employ_status'=>100, 'employ_updated_date'=>date("d/m/Y"), 'employ_updated_hour'=>date("H:i")];
            $updated    = Employer::where(['employ_code'=>$usercode, 'employ_status'=>0])->update($data);
        }

        if($updated){
            return true;
        }
        return false;
    }

}
