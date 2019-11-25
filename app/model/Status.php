<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Status extends Model
{
    use softDeletes;
    protected $fillable = ['status','class'];

    protected $dates =  ['deleted_at'];


    public function order(){

       return $this->hasMany(Order::class);
        
    }
}
