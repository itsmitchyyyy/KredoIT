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
        'request_return_date',
        'request_approver_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Item');
    }
}
