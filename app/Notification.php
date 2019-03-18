<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
        'user_id',
        'description',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
