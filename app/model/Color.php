<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Color extends Model
{
    use softDeletes;
    protected $fillable = ['color_name','description'];

    protected $dates =  ['deleted_at'];
}
