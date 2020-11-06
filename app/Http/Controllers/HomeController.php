<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Candidate;

class HomeController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Job::All();

        $token = 0;



        $ville = Candidate::select('cand_town')->get();

        $tab_ville = [];

        $cand = Candidate::select('cand_photo','cand_name','cand_town','cand_city','cand_job')->get();

        foreach($ville as $item){
            array_push($tab_ville, $item->cand_town);
        }

        $tab_ville = array_unique($tab_ville);

        return view('home',['data'=>$data,'ville'=>$tab_ville, 'cand'=>$cand,'token'=>$token]);
    }


    public function Search(){

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


       return redirect('/')->with('tab_search',$tab_search)
                            ->with('villes',$this->request->villes)
                            ->with('salaire',$this->request->salaire)
                            ->with('job',$this->request->job);
    }
}
