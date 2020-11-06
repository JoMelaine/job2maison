<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use \App\Http\Middleware\SessionMiddleware;

use \App\Models\Job;
use \App\Models\Jobtask;
use \App\Models\Candidate;

class CandidateController extends Controller
{


    private $request;
/**
*** Create a new controller instance.
*/
    public function __construct(Request $request){

        //$this->middleware('session');

        $this->request = $request;
    }


/*
*** Lire les infos du candidat
*/
    public function ReadCandidateInfos(){
        $tab_genre = [];
        $tab_genre = ['MASCULIN','FEMININ'];

        $data = Candidate::where('cand_code', $this->request->session()->get('code'))->first()->toArray();
        for($i=0; $i< count($tab_genre); $i++){

        }
        return view('candidats.profil.infos', ['infos'=>$data,'tab_genre'=>$tab_genre]);
    }


    public function UpdatedCandidate(){
        if($this->request->name == 'cand_name' || $this->request->name == 'cand_birthplace' ||
            $this->request->name == 'cand_gender' || $this->request->name == 'cand_country' ||
            $this->request->name == 'cand_town' || $this->request->name == 'cand_city' ||
            $this->request->name == 'cand_address' ){

                $value = strtoupper($this->request->val);
        }else{
            $value = $this->request->val;
        }

        $data = Candidate::where('cand_code',$this->request->session()->get('code'))->update([$this->request->name => $value]);

        return redirect('candidate/showinfo');
    }




    //Enregistrer une photo

    public function Register_photo(){

        if($this->request->cand_photo){
            $file = $this->request->file('cand_photo');
            $filename = $file->getClientOriginalName();
            $filename = time(). '.' . $filename;
            $file->storeAs('/public',$filename);

            Candidate::where('cand_code',$this->request->session()->get('code'))->update(['cand_photo'=>$filename]);


        }
        return redirect('candidate/showinfo');

    }
    /*
*** Mettre à jour les infos du candidat
*/
public function PageUpdateCandidateInfos(){

    $data = Candidate::where('cand_code', $this->request->session()->get('code'))->first()->toArray();
    $job = Job::All();
    $jobtask = Jobtask::All();

    return view('candidats.profil.updatedinfos',['infos'=>$data, 'job'=>$job,'jobtask'=>$jobtask]);
}

public function UpdateCandidateInfos(){
    if($this->request->photo){
        $file = $this->request->file('photo');
            $filename = $file->getClientOriginalName();
            $filename = time(). '.' . $filename;
            $file->storeAs('/public',$filename);

            Candidate::where('cand_code',$this->request->session()->get('code'))->update(['cand_photo'=>$filename]);
    }

    $data = [
        'cand_gender'            => strtoupper($this->request->gender),
        'cand_birthday'          => $this->request->birthday,
        'cand_birthplace'        => strtoupper($this->request->birthplace),
        'cand_phone1'            => $this->request->phone1,
        'cand_phone2'            => $this->request->phone2,
        //'cand_email'             => $request->email,
        'cand_descrip'           => $this->request->description,
        'cand_wapp'              => $this->request->whatsapp,
        'cand_country'           => strtoupper($this->request->country),
        'cand_town'              => strtoupper($this->request->town),
        'cand_city'              => strtoupper($this->request->city),
        'cand_address'           => strtoupper($this->request->address),
        'cand_job'               => strtoupper($this->request->job),
        'cand_job_tasks'         => $this->request->tasks,
        'cand_job_time'          => strtoupper($this->request->job_time),
        'cand_job_place'         => strtoupper($this->request->job_place),
        'cand_school_level'      => strtoupper($this->request->school_level),
        'cand_diploma'           => strtoupper($this->request->diploma),
        'cand_salary'            => $this->request->salary,
        'cand_contract_type'     => strtoupper($this->request->cand_contract_type),
        'cand_available'         => $this->request->availability,
        'cand_tutor_name'        => strtoupper($this->request->tutor_name),
        'cand_tutor_phone1'      => $this->request->tutor_phone,
        'cand_tutor_address'     => strtoupper($this->request->tutor_address)
    ];

    Candidate::where(['cand_code'=>$this->request->code])->update($data);
    return redirect('candidate/showinfo')->with('message','success');

    return redirect('candidate/showinfo')->with('message','success');
}
}
