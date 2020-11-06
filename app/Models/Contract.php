<?php

namespace App\model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Contract extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cont_code',
        'cont_type',
        'cont_cand_code',
        'cont_employ_code',
        'cont_employ_name',
        'cont_employ_address',
        'cont_employ_phone1',
        'cont_employ_phone2',
        'cont_employ_email',
        'cont_job_name',
        'cont_job_tasks',
        'cont_job_salary',
        'cont_job_place',
        'cont_date_start',
        'cont_date_end',
        'cont_created_date',
        'cont_status',
        'created_at',
        'updated_at'
    ];


}


