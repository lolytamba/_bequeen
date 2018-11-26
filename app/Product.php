<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'name','type','paket','bookDate','arrivalDate'
    ];

    public function user(){
        return $this->belongsToMany('App\User','product_user','product_id','user_id');
    }
}

