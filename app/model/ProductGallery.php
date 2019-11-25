<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductGallery extends Model
{
    use softDeletes;

    protected $fillable = ['product_id','gallery_image'];

    protected $dates =  ['deleted_at'];

    public static function imageGallery($fileName,$product_id){
        
        if (request()->hasFile($fileName)) {

            foreach(request()->$fileName as $file) {
                $filename = rand().'.'.$file->getClientOriginalExtension();
                
                $newFile = new ProductGallery();
                $newFile->product_id = $product_id;
                $newFile->gallery_image = $filename;
                if ($newFile->save()) {
                    $file->move('images/galleries', $filename);
                }
            }
        }
    }

    public static function updateImageGallery($fileName,$product_id){
        
        if (request()->hasFile($fileName)) {

            foreach(request()->$fileName as $file) {
                $filename = rand().'.'.$file->getClientOriginalExtension();
                
                $newFile = new ProductGallery();
                $newFile->product_id = $product_id;
                $newFile->gallery_image = $filename;
                if ($newFile->save()) {
                    $file->move('images/galleries', $filename);
                }
            }
        }
    }
}
