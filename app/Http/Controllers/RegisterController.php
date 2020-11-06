<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



use App\Http\Requests\RegisterRequest;

use App\Models\Candidate;
use App\Models\Employer;

class RegisterController extends Controller{


    private $request;

    /**
    *** Create a new controller instance.
    */
    public function __construct(Request $request){
        $this->request = $request;

    }

    public function code($id){
        $count = 1;
        $verified = null;
        while($count >= 1){
            $verified = rand(1000,2000);
            if($id == 1){
                $count = Candidate::where('cand_code',$verified)->count();
            }
            if($id == 2){
                $count = Employer::where('employ_code',$verified)->count();
            }

        }

        return $verified;
    }

    /*
*** Créer un compte candidat ou employeur
*/
public function CreatAccount(RegisterRequest $request){

    $usercode   = $this->code($request->acc);

    if($request->acc == 1){
        $user = Candidate::where(['cand_email'=>$request->email])->first();
    }

    if($request->acc == 2){
        $user = Employer::where(['employ_email'=>$request->email])->first();
    }

    // Verifier l'unicité de l'email
    if($user){
        return redirect('inscription')->with('message',"L'email existe déjà");
    }else{
        $user = null;
        if($request->acc == 1){
            $user = new Candidate;

            $user->cand_code            = $usercode;
            $user->cand_pwd             = Hash::make($request->pwd);
            $user->cand_email           = $request->email;
            $user->cand_status          = 0;
            $user->cand_created_date    = date("d/m/Y");
            $user->cand_created_hour    = date("H:i");
            $user->cand_name            = strtoupper($request->nom);
            $user->save();

        }
        if($request->acc == 2){
            $user = new Employer;

            $user->employ_code            = $usercode;
            $user->employ_pwd             = Hash::make($request->pwd);
            $user->employ_email           = $request->email;
            $user->employ_status          = 0;
            $user->employ_created_date    = date("d/m/Y");
            $user->employ_created_hour    = date("H:i");
            $user->employ_name              = strtoupper($request->nom);
            $user->save();
        }

        /* Mail::to($request->email)->send(
            new notifyConfirmpassword([
                'email'     => $request->email,
                'nom'       => $request->nom,
                'date'      => date("d/m/Y"),
                'password'  => $request->pwd,
            ])
        ); */

        return redirect('login')->with('message','Le compte a été enregistré avec succés. Vérifier votre mail pour confirmer votre mot de passe');
    }



    /*  $response = $this->setNewAccount($this->request);

    return redirect('login')->with('response',$response); */
}


}
