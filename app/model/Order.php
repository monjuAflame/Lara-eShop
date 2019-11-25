<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;



class Order extends Model
{
    use softDeletes;

    protected $fillable = [

    	'customer_id',
    	'user_id',
    	'deliver_id',
    	'payment',
    	'status_id',
    	'coupon_id',
    	'transaction_date'


    ];


    protected $dates =  ['deleted_at'];

    public function payment(){

       return $this->belongsTo(Payment::class);
        
    }

    public function status(){

       return $this->belongsTo(Status::class);
        
    }

    public function oItem(){

       return $this->hasMany(OrderItem::class);
        
    }

    public function customer(){

       $id = auth()->guard('customer')->user()->id;
       return $this->belongsTo("App\Customer")->where('id',$id);
        
    }
}
