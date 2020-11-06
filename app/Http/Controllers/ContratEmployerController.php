<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use \App\Models\Employerlink;
use \App\Models\Candidate;

class ContratEmployerController extends Controller{

    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function IndexContrats(){
        $data = Candidate::join('employerlinks','link_cand_code','=','candidates.cand_code')->where('link_evolution',1)->get();

        return view('recruteur.contrats.contrat',['data'=>$data]);
    }

    public function ProposerContrat(){
        $count = 0;

        $count = Employerlink::where(['link_subcrip_code'=>$this->request->subcrip_code,
                                    'link_employ_code'=>$this->request->employ_code,
                                    'link_evolution'=>1, 'link_cand_code'=>$this->request->link_cand_code])
                                    ->count();
        $sms_contrat = null;

        if($count == 0){
            $sms_contrat = 'Vous avez proposé un contrat à '.$this->request->cand_name;
            Employerlink::where('link_id',$this->request->id)->update(['link_evolution'=>1]);
        }else{
            $sms_contrat = 'Vous avez déjà proposé un contrat au candidat '.$this->request->cand_name;
        }

        return redirect('/employer/read/contact')->with('sms_contrat',$sms_contrat);
    }
}
