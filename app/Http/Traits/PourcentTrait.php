<?php

namespace App\Http\Traits;

use App\Models\Candidate;

trait PourcentTrait
{
    public function Pourcent_cand(){
        $data = Candidate::All();
        $tab_pourcent = [];
        $val_pourcent = 0;

        foreach($data as $key=>$item){

            $val_pourcent = 0;

            if($item->cand_photo){ $val_pourcent += 10; }
            if($item->cand_job){ $val_pourcent += 10; }
            if($item->cand_salary){ $val_pourcent += 10; }

            if($item->cand_gender){ $val_pourcent += 5; }
            if($item->cand_birthday){ $val_pourcent += 5; }
            if($item->cand_phone1){ $val_pourcent += 5; }
            if($item->cand_descrip){  $val_pourcent += 5; }
            if($item->cand_wapp){ $val_pourcent += 5; }
            if($item->cand_country){ $val_pourcent += 5; }
            if($item->cand_town){ $val_pourcent += 5;  }
            if($item->cand_job_time){  $val_pourcent += 5;  }
            if($item->cand_job_place){ $val_pourcent += 5; }

            if($item->cand_birthplace){ $val_pourcent += 3; }
            if($item->cand_phone2){ $val_pourcent += 2; }
            if($item->cand_city){ $val_pourcent += 3; }
            if($item->cand_address){  $val_pourcent += 2; }
            if($item->cand_job_tasks){ $val_pourcent += 3;  }
            if($item->cand_school_level){ $val_pourcent += 2; }
            if($item->cand_diploma){ $val_pourcent += 3; }
            if($item->cand_tutor_name){ $val_pourcent += 2; }
            if($item->cand_tutor_phone1){ $val_pourcent += 3; }
            if($item->cand_tutor_address){ $val_pourcent += 2; }

            $tab_pourcent[] =[
                'id'=>$item->cand_id,
                'pourcentage'=>$val_pourcent
            ];
        }

        $columns = array_column($tab_pourcent, 'pourcentage');
        array_multisort($columns, SORT_DESC, $tab_pourcent);

        return $tab_pourcent;
    }
}
