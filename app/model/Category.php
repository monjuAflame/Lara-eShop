<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use softDeletes;
    protected $fillable = ['category_name','description','image','is_active'];

    protected $dates =  ['deleted_at'];

    public static function image($fileName,$category){
    	
    	if (request()->hasFile($fileName)) {

    		

    		$file = request()->file($fileName);
    		$extention = $file->getClientOriginalExtension();
    		$filename = time().'.'.$extention;
    		$file->move('images/categories/',$filename);
    		$category->image = $filename;
    		
    	}
    }

    public function products(){
        return $this->hasMany("App\Model\Product");
    }

    
    


    
}
