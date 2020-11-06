<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Employer extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employ_code',
        'employ_photo',
        'employ_pwd',
        'employ_gender',
        'employ_name',
        'employ_phone1',
        'employ_phone2',
        'employ_email',
        'employ_wapp',
        'employ_country',
        'employ_town',
        'employ_city',
        'employ_address',
        'employ_marital_status',
        'employ_job',
        'employ_job_place',
        'employ_created_date',
        'employ_created_hour',
        'employ_updated_date',
        'employ_updated_hour',
        'employ_status',
        'employ_active_subscrip',
        'created_at',
        'updated_at'
    ];



}


