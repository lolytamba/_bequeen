<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $fillable = [
        'name','itemType','itemName','price','color','user_id'
    ];

}
