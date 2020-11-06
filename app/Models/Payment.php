<?php

namespace App\model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Payment extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pai_code',
        'pai_employ_code',
        'pai_phone',
        'pai_created_date',
        'pai_created_hour',
        'pai_operator',
        'pai_status',
        'pai_detail',
        'created_at',
        'updated_at'
    ];


}
