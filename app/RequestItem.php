<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'kredo_item_no',
        'request_item_serial_no',
        'request_date',
        'request_approver_id',
        'request_status'
    ];

    public function requests(){
        return $this->hasMany('App\PurchaseRequest', 'request_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Item');
    }

    public function approver(){
        return $this->belongsTo('App\User', 'request_approver_id');
    }
}
