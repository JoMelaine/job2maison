<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Subscription extends Model
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'subscrip_code',
    	'subscrip_key',
    	'subscrip_pack_code',
    	'subscrip_user_code',
    	'subscrip_created_date',
    	'subscrip_created_hour',
    	'subscrip_amount',
    	'subscrip_date_start',
    	'subscrip_date_end',
    	'subscrip_days',
    	'subscrip_pai_code',
    	'subscrip_pai_mode',
    	'subscrip_status',
    	'created_at',
    	'updated_at'
    ];

}
