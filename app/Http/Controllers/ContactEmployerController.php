<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Employerlink;
use \App\Models\Employerprovlink;
use \App\Models\Candidate;

use \App\Http\Traits\NotificationTrait;

class ContactEmployerController extends Controller{

    use NotificationTrait;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // contacts

    public function Contacts(){
        $tab_cand = Employerprovlink::join('candidates','cand_code','=','employerprovlinks.provlinks_cand_code')
                        ->orderBy("candidates.cand_name", "asc")
                        ->select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                            'cand_birthplace','cand_descrip','cand_country','cand_town','cand_city',
                            'cand_address','cand_job','cand_job_tasks','cand_job_time','cand_job_place',
                            'cand_school_level','cand_diploma','cand_experience','cand_salary','cand_salary_min',
                            'cand_salary_max','provlinks_employ_code','provlinks_cand_code','provlinks_id')
                        ->get();

        $cand = Candidate::join('employerlinks','link_cand_code','=','candidates.cand_code')->get();
        $token = $this->request->session()->get('_token');

        return view('recruteur.contacts.contacts',['tab_cand'=>$tab_cand,'cand'=>$cand,'token'=>$token]);
    }



    public function ActiveContrat(){
        $date = 0;
        $message = null;
        $data_verif = Employerprovlink::where(['provlinks_employ_code'=>$this->request->session()->get('code'),'provlinks_cand_code'=>$this->request->code])
                    ->first();

        if(!$data_verif){
            $data = [
                'provlinks_employ_code'=>$this->request->session()->get('code'),
                'provlinks_cand_code'=>$this->request->code,
            ];
            $message = 'Le candidat a été enrégistré dans votre liste provisoire';

            Employerprovlink::create($data);
        }else{
            $message = 'Le candidat est déjà sur la liste';
        }

        return redirect('employer/read/candidate')->with('message',$message);
    }



    public function VoirContact(){

        //modifier aprés
        $verif = Employerlink::where(['link_subcrip_code'=>3456789,'link_employ_code'=>$this->request->session()->get('code'),'link_cand_code'=>$this->request->code,])
                    ->first();

        $sms_cont = null;
        if(!$verif){

            $sms_cont = 'Le candidat '.$this->request->cand_name.' a été enregistré dans vos contacts.';
            $data = [
                'link_subcrip_code'=>3456789,
                'link_employ_code'=>$this->request->session()->get('code'),
                'link_cand_code'=>$this->request->code,
                'link_created_date'=>date('d/m/Y'),
                'link_created_hour'=>date('H:m'),
                'link_evolution'=>0
            ];

            Employerlink::create($data);
            Employerprovlink::where('provlinks_id',$this->request->id)->delete();

            //Envoyer une notification au candidat
            $notif = [
                'notif_type'           => "Recruteur-Candidat",
                'notif_subject'        => "Alerte",
                'notif_message'        => "Un recruteur vient de consulter votre contact",
                'notif_recipient'      => $this->request->code,
                'notif_transmitter'    => $this->request->session()->get('code'),
                'notif_status'         => 0
            ];
            $this->setNotification($notif);

        }else{
            $sms_cont = 'Le candidat '.$this->request->cand_name.' fait déjà parti de vos contacts. ';
        }





        return redirect('employer/read/contact')->with('sms_cont',$sms_cont);
    }

    public function DeleteContact(){
        Employerlink::where('link_id',$this->request->id)->delete();

        return redirect('employer/read/contact');
    }

}
