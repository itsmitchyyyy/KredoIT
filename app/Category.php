<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['categoryName'];
    
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
