<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Employerlink;
use \App\Models\Employerprovlink;
use \App\Models\Candidate;

use \App\Http\Traits\EmployerLinkTrait;

class ContratCandidatController extends Controller{
    use EmployerLinkTrait;

    private $request;

    public function __construct(Request $request){
        $this->UpdatedEmpLink();
        $this->request = $request;
    }

    public function index(){

        $contrat = Employerlink::where(['link_cand_code'=>$this->request->session()->get('code'),
                    'link_evolution'=>1])
                    ->join('employers','employ_code','=','employerlinks.link_employ_code')
                    ->get();
        return view('candidats.contrats.contrat',['contrat'=>$contrat]);
    }

}
