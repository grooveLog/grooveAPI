<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Groove extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'universal_groove_id',
        'personal_description',
        'privacy',
        'commitment',
        'volume_amount',
        'volume_measurement',
        'frequency_prefix',
        'frequency_number',
        'frequency_period',
        'status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
         'completed_at'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function universalGroove()
    {
        return $this->belongsTo('App\UniversalGroove');
    }

}