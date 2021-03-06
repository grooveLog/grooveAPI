<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Goal extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'universal_goal_id', 'completed_at', 'personal_description', 'progress', 'reward', 'goal_date_from', 'goal_date_to', 'status',
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

    public function universalGoal()
    {
        return $this->belongsTo('App\UniversalGoal');
    }

    // for the goal_vision pivot table
    public function visions()
    {
        return $this->belongsToMany('App\Vision')->select(array('vision_id'));
            //->withPivot('vision_id');
    }

}