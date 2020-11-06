<?php

namespace App\model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Publication extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pub_code',
        'pub_type',
        'pub_user_code',
        'pub_user_email',
        'pub_user_phone',
        'pub_sub_code',
        'pub_job_name',
        'pub_job_gender',
        'pub_job_ages',
        'pub_job_tasks',
        'pub_job_salary',
        'pub_job_time',
        'pub_job_place',
        'pub_job_contract',
        'pub_job_availability',
        'pub_date_start',
        'pub_date_end',
        'pub_created_date',
        'pub_created_hour',
        'pub_updated_date',
        'pub_updated_hour',
        'pub_views',
        'pub_status',
        'created_at',
        'updated_at'
    ];


}


