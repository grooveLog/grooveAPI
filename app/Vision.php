<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Vision extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'vision_timescales', 'universal_vision_id', 'personal_description', 'probability', 'passion', 'status', 'completed_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function universalVision()
    {
        return $this->belongsTo('App\UniversalVision');
    }

    // for the goal_vision pivot table
    public function goals()
    {
        return $this->belongsToMany('App\Goal');
    }

}
