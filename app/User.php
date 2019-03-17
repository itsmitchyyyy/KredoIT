<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type', 'email', 'password', 'user_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee(){
        return $this->hasOne('App\Employee', 'user_id', 'id');
    }

    public function items(){
        return $this->hasMany('App\Item', 'user_id', 'id');
    }

    public function requests(){
        return $this->hasMany('App\RequestItem', 'user_id', 'id');
    }

    public function userFullName() {
        return $this->employee->employee_fname.' '.$this->employee->employee_lname;
    }
}
