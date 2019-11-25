<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CustomerProductFavorite extends Model
{
    use softDeletes;
    protected $fillable = ['product_id','customer_id'];
    protected $dates =  ['deleted_at'];


    public function product(){

    	return $this->belongsTo(Product::class);

    }






}
