<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id',
        'itemNo',
        'itemName',
        'dateBought',
        'quantity',
        'model_id',
        'brand_id',
        'category_id',
        'status'
    ];

    public function models(){
        return $this->hasMany('App\ItemModel', 'id', 'model_id');
    }

    public function categories(){
        return $this->hasMany('App\Category', 'id', 'category_id');
    }

    public function brand(){
        return $this->hasMany('App\Brand', 'id', 'brand_id');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
