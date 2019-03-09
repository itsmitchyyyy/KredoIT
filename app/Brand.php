<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brandName'];

    public function item(){
        return $this->belongsTo('App\Item');
    }
}
