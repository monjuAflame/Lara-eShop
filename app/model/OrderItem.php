<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class OrderItem extends Model
{
    use softDeletes;

    protected $fillable = [

    	'order_id',
    	'product_id',
    	'color_id',
    	'qty',
    	'price',
    	'amount'


    ];

    protected $primaryKey = 'id';

    protected $dates =  ['deleted_at'];

    public function order(){

       return $this->belongsTo(Order::class);
     
    }

    public function product(){

        return $this->belongsTo(Product::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

}
