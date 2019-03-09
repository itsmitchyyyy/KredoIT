<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $fillable = ['modelName'];

    public function item(){
        return $this->belongsTo('App\Item');
    }
}
