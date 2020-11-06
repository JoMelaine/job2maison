<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Candidate;
use \App\Models\Employer;
use \App\Models\Employerlink;
use \App\Models\Employerprovlink;
use \App\Models\Jobtask;
use \App\Http\Middleware\SessionMiddleware;

use \App\Http\Traits\EmployerLinkTrait;


class EmployerController extends Controller {
    use EmployerLinkTrait;


    private $request;
/**
*** Create a new controller instance.
*/
    public function __construct(Request $request){
        //$this->middleware('session');
        $this->UpdatedEmpLink();
        $this->request = $request;
    }

    public function Identite(){
        $data = Employer::select('employ_city','employ_town','employ_country','employ_gender','employ_email','employ_name','employ_marital_status','employ_address')
                ->where('employ_code',$this->request->session()->get('code'))->first()->toArray();
        if(!$data['employ_city']){
            $data['employ_city'] = 'Commun (néant)';
        }
        if(!$data['employ_town']){
            $data['employ_town'] = 'Ville (néant)';
        }
        if(!$data['employ_country']){
            $data['employ_country'] = 'Pays (néant)';
        }
        if(!$data['employ_gender']){
            $data['employ_gender'] = 'Néant';
        }
        if(!$data['employ_marital_status']){
            $data['employ_marital_status'] = 'Néant';
        }

        $tab_genre = [];
        $tab_situation_matri = [];

        $tab_genre = ['MASCULIN','FEMININ'];
        $tab_situation_matri = ['CELIBATAIRE','MARIE SANS ENFANT','MARIE AVEC ENFANT'];

        for($i=0; $i< count($tab_genre); $i++){
            if($tab_genre[$i] == $data['employ_gender']){
                unset($tab_genre[$i]);
            }
        }

        for($i=0; $i<count($tab_situation_matri); $i++){
            if($data['employ_marital_status'] == $tab_situation_matri[$i]){
                unset($tab_situation_matri[$i]);
            }
        }


        return view('recruteur.profil.identite.identite',['infos'=>$data,'tab_genre'=>$tab_genre, 'marital_status'=>$tab_situation_matri]);
    }
    public function ContactsEmployer(){
        return view('recruteur.profil.contacts.contact');
    }
    public function InfosProEmployer(){
        return view('recruteur.profil.infospro.infospro');
    }
/*
*** Lire les infos de l'employeur
*/
    public function ReadEmployerInfos(){

        $data = Employer::where('employ_code',$this->request->session()->get('code'))->first()->toArray();

        if(!$data['employ_job']){
            $data['employ_job'] = 'Néant';
        }
        if(!$data['employ_job_place']){
            $data['employ_job_place'] = 'Néant';
        }
        if(!$data['employ_phone1']){
            $data['employ_phone1'] = 'Néant';
        }
        if(!$data['employ_phone2']){
            $data['employ_phone2'] = 'Néant';
        }
        if(!$data['employ_wapp']){
            $data['employ_wapp'] = 'Néant';
        }
        if(!$data['employ_email']){
            $data['employ_email'] = 'Néant';
        }
        $tab_genre = [];
        $tab_situation_matri = [];

        $tab_genre = ['MASCULIN','FEMININ'];
        $tab_situation_matri = ['CELIBATAIRE','MARIE SANS ENFANT','MARIE AVEC ENFANT'];


        for($i=0; $i< count($tab_genre); $i++){
            if($tab_genre[$i] == $data['employ_gender']){
                unset($tab_genre[$i]);
            }
        }

        for($i=0; $i<count($tab_situation_matri); $i++){
            if($data['employ_marital_status'] == $tab_situation_matri[$i]){
                unset($tab_situation_matri[$i]);
            }
        }


        return view('recruteur.profil.infos',
                ['infos'=>$data,'tab_genre'=>$tab_genre, 'marital_status'=>$tab_situation_matri,
                'token'=>$this->request->session()->get('_token')]);
    }
    /*
    *** Mettre à jour les infos de l'employeur
    */

    public function UpdateEmployer(){
        if($this->request->name == 'employ_name' || $this->request->name == 'employ_gender' ||
            $this->request->name == 'employ_country' || $this->request->name == 'employ_town' ||
            $this->request->name == 'employ_city' || $this->request->name == 'employ_address' ||
            $this->request->name == 'employ_marital_status' ){

                $value = strtoupper($this->request->val);
        }else{
            $value = $this->request->val;
        }
        $data = Employer::where('employ_code',$this->request->session()->get('code'))->update([$this->request->name => $value]);

        return redirect('employer/showinfo');
    }

    public function PageUpdateEmployerInfos(){

        $data = Employer::where('employ_code',$this->request->session()->get('code'))->first()->toArray();

        return view('recruteur.profil.updatedinfos',['infos'=>$data]);
    }

    public function UpdatephotoEmployer(){

        if($this->request->photo){
            $file = $this->request->file('photo');
                $filename = $file->getClientOriginalName();
                $filename = time(). '.' . $filename;
                $file->storeAs('/public',$filename);

            Employer::where('employ_code',$this->request->session()->get('code'))->update(['employ_photo'=>$filename]);
        }

        return redirect('employer/showinfo');

    }
    public function UpdateEmployerInfos(){
        if($this->request->photo){
            $file = $this->request->file('photo');
                $filename = $file->getClientOriginalName();
                $filename = time(). '.' . $filename;
                $file->storeAs('/public',$filename);

                Employer::where('employ_code',$this->request->session()->get('code'))->update(['employ_photo'=>$filename]);
        }
        $data = [
            'employ_gender'            => strtoupper($this->request->gender),
            'employ_name'              => strtoupper($this->request->name),
            'employ_phone1'            => $this->request->phone1,
            'employ_phone2'            => $this->request->phone2,
            //'employ_email'             => $request->email,
            'employ_wapp'              => $this->request->whatsapp,
            'employ_country'           => strtoupper($this->request->country),
            'employ_town'              => strtoupper($this->request->town),
            'employ_city'              => strtoupper($this->request->city),
            'employ_address'           => strtoupper($this->request->address),
            'employ_job'               => strtoupper($this->request->job),
            'employ_job_place'         => strtoupper($this->request->job_place),
            'employ_marital_status'    => strtoupper($this->request->marital_status),
        ];

       Employer::where(['employ_code'=>$this->request->code])->update($data);

        return redirect('employer/showinfo')->with('message','success');
    }












    public function DeleteEmployLink($id){
        Employerprovlink::where('provlinks_id',$id)->delete();
        return redirect('employer/read/contract');
    }








}
