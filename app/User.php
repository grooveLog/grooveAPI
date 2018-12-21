<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_id', 'authentication_method', 'email', 'username', 'firstname', 'lastname', 'birthday', 'gender', 'personal_summary', 'locale', 'image', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function visions()
    {
        return $this->hasMany('App\Vision');
    }

    public function goals()
    {
        return $this->hasMany('App\Goal');
    }

    public function grooves()
    {
        return $this->hasMany('App\Groove');
    }
}
