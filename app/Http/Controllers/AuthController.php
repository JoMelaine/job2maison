<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Candidate;
use App\Models\Employer;

use App\Http\Requests\AuthRequest;

class AuthController extends Controller{
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }


    /*code de subscription*/

    public function Employ_subs($user){
        $code = time();
        $data = [
            'subscrip_code'=>$code,
            'subscrip_key' =>$code,
            'subscrip_pack_code' => '2001',
            'subscrip_user_code' =>$user,
            'subscrip_created_date' => date('d/m/Y'),
            'subscrip_created_hour' => date('H:m'),
            'subscrip_amount',
            'subscrip_date_start',
            'subscrip_date_end',
            'subscrip_days',
            'subscrip_pai_code',
            'subscrip_pai_mode',
            'subscrip_status',
        ];
    }

    /*
    * Authentifier un utilsateur
    */

    public function AuthenticateUser(AuthRequest $request){
        $user_cand = Candidate::where(['cand_email'=>$request->email])->first();
        $user_emp = Employer::where(['employ_email'=>$request->email])->first();


        if(!$user_cand && !$user_emp){
            return redirect('login')->with('message',"Utilisateur non authentifié. Veuillez vous inscrire");
        }

        if($user_cand){
            if(!Hash::check($request->pwd, $user_cand->cand_pwd)){
                return redirect('login')->with('message',"Le mot de passe est incorrect");
            }else{
                $user_id     = $user_cand->cand_id;
                $user_code   = $user_cand->cand_code;
                $user_name   = $user_cand->cand_name;
                $user_email  = $user_cand->cand_email;
                $account     = 1;
            }

        }
        if($user_emp){
            if(!Hash::check($request->pwd, $user_emp->employ_pwd)){
                return redirect('login')->with('message',"Le mot de passe est incorrect");
            }else{
                $user_id     = $user_emp->employ_id;
                $user_code   = $user_emp->employ_code;
                $user_name   = $user_emp->employ_name;
                $user_email  = $user_emp->employ_email;
                $account     = 2;
            }

        }

        $output['code']     = $user_code;
        $output['uname']    = $user_name;
        $output['email']    = $user_email;
        $output['type']     = $account;

        session($output);


        if($user_cand){
            return redirect('candidate/showinfo')->with('response', $output);
        }
        if($user_emp){
            return redirect('employer/showinfo')->with('response', $output);
        }

    }

    public function power(){
        $this->request->session()->flush();
        return redirect('login');
    }

    //--Modifier le mot de passe
    public function resetpassword(){
        $messages = [
            'required' => 'le champs  est requis.',
            'email' => 'le format  est incorrect.',
            'unique' => ':input existe déjà',
            'string' => 'Ce champs :attribute doit être de type texte.',
        ];
        Validator::make($this->request->all(),[
            'email' => 'required|email',
        ],$messages)->validate();

        $user_cand = Candidate::where(['cand_email'=>$this->request->email])->first();
        $user_emp = Employer::where(['employ_email'=>$this->request->email])->first();

        if($user_cand){
            $user_nom = $user_cand->cand_name;

        }
        if($user_emp){
            $user_nom = $user_emp->employ_name;
        }


        if($user_cand || $user_emp){
            return redirect('mot_de_passe_oublie')->with('message','Votre requête a été enregistré. Verifier vos mail afin de pouvoir changer de mot de passe.');
            /* Mail::to($this->request->email)->send(
                new notifyresetpassword([
                    'email'     => $this->request->email,
                    'nom'       => $user_nom,
                    'date'      => date("d/m/Y"),
                ])
            ); */
        }else{
            return redirect('mot_de_passe_oublie')->with('message',"Ce email n'existe pas. Inscrivez vous svp.");
        }
    }
}


