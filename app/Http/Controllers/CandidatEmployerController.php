<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Candidate;
use \App\Models\Job;
use \App\Models\Jobtask;
use \App\Http\Middleware\SessionMiddleware;

use \App\Http\Traits\PourcentTrait;

class CandidatEmployerController extends Controller{

    use PourcentTrait;

    private $request;
    public function __construct(Request $request)
    {
        $this->middleware('session');
        $this->request = $request;
    }

    /* Lister les candidates */



    public function ReadCandidate(){
        $ville = [];
        $tab_finale = [];

        $token = $this->request->session()->get('_token');

        $metier = Job::orderBy("job_name", "asc")->get();

        $data = $this->Pourcent_cand();

        foreach($data as $value){
            $tab_finale[] = Candidate::select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                                'cand_descrip','cand_country','cand_town','cand_city','cand_job','cand_job_tasks',
                                'cand_job_time','cand_job_place','cand_school_level','cand_diploma','cand_experience',
                                'cand_salary','cand_salary_min','cand_salary_max')
                                ->where('cand_id',$value['id'])->first();
        }

        foreach($tab_finale as $item){
            array_push($ville, $item->cand_town);
        }

        $ville = array_unique($ville);

        return view('recruteur.candidats.candidats',['candidat'=>$tab_finale,'metier'=>$metier
        ,'ville'=>$ville, 'token'=>$token]);

        /* $data = Candidate::All(); */
        /* foreach($t as $value){
            $data[]=Candidate::where('cand_id',$value['id'])->get();
        } */



        /*

        foreach($data as $item){
            array_push($salaire,$item->cand_salary);
            array_push($ville, $item->cand_town);
        }

        array_unique($salaire);
        array_unique($ville); */


        /* return view('recruteur.candidats.candidats',['candidat'=>$data,'metier'=>$metier,
                'salaire'=>$salaire,'ville'=>$ville]); */
    }

    /* Rechercher un candidat */

    public function SearchCandidate(){
        $val_searchs = $this->request->searchs;

        $tab_search = [];

        if($this->request->job){
            $tab_search = Candidate::select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                            'cand_descrip','cand_country','cand_town','cand_city','cand_job','cand_job_tasks',
                            'cand_job_time','cand_job_place','cand_school_level','cand_diploma','cand_experience',
                            'cand_salary','cand_salary_min','cand_salary_max')
                            ->where(
                                'cand_job','like','%'. $this->request->job.'%')
                            ->get();

            if($this->request->salaire){
                $tab_search = Candidate::select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                                'cand_descrip','cand_country','cand_town','cand_city','cand_job','cand_job_tasks',
                                'cand_job_time','cand_job_place','cand_school_level','cand_diploma','cand_experience',
                                'cand_salary','cand_salary_min','cand_salary_max')
                                ->where([
                                    ['cand_job', 'like', '%'. $this->request->job.'%'],
                                ])
                                ->where(function ($query) {
                                    $query->where([
                                        ['cand_salary_min', '<=', $this->request->salaire],
                                        ['cand_salary_max', '>=', $this->request->salaire]
                                    ])
                                          ->orWhere('cand_salary_max', '<', $this->request->salaire);
                                })
                                ->get();
                //return $tab_search;
            }
            if($this->request->ville){
                $tab_search = Candidate::select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                                'cand_descrip','cand_country','cand_town','cand_city','cand_job','cand_job_tasks',
                                'cand_job_time','cand_job_place','cand_school_level','cand_diploma','cand_experience',
                                'cand_salary','cand_salary_min','cand_salary_max')
                                ->where([
                                    ['cand_job', 'like', '%'. $this->request->job.'%'],
                                    ['cand_town', '=', $this->request->ville],
                                ])
                                ->get();
            }

            if($this->request->salaire && $this->request->ville){
                $tab_search = Candidate::select('cand_code','cand_photo','cand_gender','cand_name','cand_birthday',
                                        'cand_descrip','cand_country','cand_town','cand_city','cand_job','cand_job_tasks',
                                        'cand_job_time','cand_job_place','cand_school_level','cand_diploma','cand_experience',
                                        'cand_salary','cand_salary_min','cand_salary_max')
                                        ->where([
                                            ['cand_job', 'like', '%'. $this->request->job.'%'],
                                            ['cand_town', '=', $this->request->ville]
                                        ])
                                        ->where(function ($query) {
                                            $query->where([
                                                ['cand_salary_min', '<=', $this->request->salaire],
                                                ['cand_salary_max', '>=', $this->request->salaire]
                                            ])
                                                  ->orWhere('cand_salary_max', '<', $this->request->salaire);
                                        })
                                        ->get();
                    }
        }


       return redirect('employer/read/candidate')->with('tab_search',$tab_search);
    }

    /* Voir plus */

    public function SeeMore($code){

        $candidat = Candidate::where('cand_code',$code)->first();

        return view('recruteur.candidats.seemore',['cand'=>$candidat]);
    }

}
