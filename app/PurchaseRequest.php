<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    //
    protected $fillable = [
        'user_id',
        'request_id',
        'item_request_status'
    ];

    public function requests(){
        return $this->belongsTo('App\RequestItem', 'request_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
