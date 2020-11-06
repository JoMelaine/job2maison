<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Candidate extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cand_code',
        'cand_photo',
        'cand_gender',
        'cand_name',
        'cand_birthday',
        'cand_birthplace',
        'cand_phone1',
        'cand_phone2',
        'cand_email',
        'cand_pwd',
        'cand_descrip',
        'cand_wapp',
        'cand_country',
        'cand_town',
        'cand_city',
        'cand_address',
        'cand_job',
        'cand_job_tasks',
        'cand_job_time',
        'cand_job_place',
        'cand_school_level',
        'cand_diploma',
        'cand_experience',
        'cand_salary',
        'cand_salary_min',
        'cand_salary_max',
        'cand_contract_type',
        'cand_tutor_name',
        'cand_tutor_phone1',
        'cand_tutor_address',
        'cand_active_contracts',
        'cand_active_subscrip',
        'cand_created_date',
        'cand_created_hour',
        'cand_status',
        'created_at',
        'updated_at'
    ];


    protected $casts = [
        'cand_birthday' => 'date:d/m/Y',
        'cand_active_contracts' =>'array',
        'cand_contract_type'=>'array'
    ];


}


