<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'employee_fname',
        'employee_lname',
        'employee_mname',
        'employee_address',
        'employee_phone',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    
}
