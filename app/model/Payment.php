<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Payment extends Model
{
    use softDeletes;
    protected $fillable = [

    	'amount',
    	'postal_code',
    	'currency',
    	'payment_method',
    	'receipt_email',
    	'receipt_url',
    	'status'
    ];

    protected $primaryId = 'id';
    protected $dates =  ['deleted_at'];
    public $incrementing =  false;

    public function order(){

       return $this->hasMany(Order::class);
        
    }

}
