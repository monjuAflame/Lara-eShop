<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use softDeletes;
    protected $fillable = ['category_id','product_code','product_name','qty',
							'price','is_active','description','image'];

    protected $dates =  ['deleted_at'];

    public static function image($fileName,$category){
    	
    	if (request()->hasFile($fileName)) {

    		$file = request()->file($fileName);
    		$extention = $file->getClientOriginalExtension();
    		$filename = time().'.'.$extention;
    		$file->move('images/products/',$filename);
    		$category->image = $filename;
    	}
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function favorite()
    {

        $cid = auth()->guard('customer')->user()!=null ? auth()->guard('customer')->user()->id : null;
        return $this->belongsTo(CustomerProductFavorite::class,'id','product_id')->where('customer_id',$cid);

    }

    public function like()
    {

       return $this->favorite()->selectRaw('product_id,count(*) as count')->groupBy('product_id');

    }

    



     
}
