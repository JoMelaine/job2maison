<?php

namespace App\Http\Traits;

use App\model\Employerlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Candidate;
use App\Models\Employerprovlink;


trait EmployerLinkTrait
{

    public function UpdatedEmpLink(){
        $data = Employerprovlink::All();
        $jrs =0;
        $today = date_create(date("Y-m-d H:i:s"));

        foreach($data as $item){
            $jrs =  date_diff($item->created_at, $today)->format("%R%a");
            if($jrs >= 2){
                Employerprovlink::where('provlinks_id',$item->provlinks_id)->delete();
            }
        }
    }
}
