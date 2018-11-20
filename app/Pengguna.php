<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['firstName', 'lastName', 'phone', 'email', 'password','jenis'];
}


