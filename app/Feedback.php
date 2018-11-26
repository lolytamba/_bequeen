<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use  SoftDeletes;

    public $table = 'feedbacks';

    protected $fillable = [
        'name','email', 'service','message'
    ];
    
}
