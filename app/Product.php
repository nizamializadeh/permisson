<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'desc', 'price','activity','user_id',
    ];
    public function images(){
        return $this->hasMany('App\Image', 'product_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
