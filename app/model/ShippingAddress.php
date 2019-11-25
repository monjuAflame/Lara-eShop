<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ShippingAddress extends Model
{
    use softDeletes;

    protected $fillable = [

    	'order_id',
    	'customer_id',
    	'name',
    	'email',
    	'phone',
    	'city',
    	'district',
    	'commune',
    	'village',
    	'postcode',
    	'is_active'


    ];

    protected $primaryKey = 'id';

    protected $dates =  ['deleted_at'];
}
