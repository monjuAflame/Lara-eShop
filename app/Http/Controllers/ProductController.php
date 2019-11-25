<?php

namespace App\Http\Controllers;

use App\model\Product;
use App\model\Category;
use App\model\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            return response($this->viewImage(request()->product_id));
        }

        $products = Product::with(['category'])->orderBy('id','desc')->get();
        return view('products.index',compact('products'));
    }

    public function viewImage($product_id){
        $imageGalleries = ProductGallery::where('product_id',$product_id)->get();
        return view('products.viewimage',compact('imageGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name','id');
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id    = $request->category_id;
        $product->product_name   = $request->product_name;
        $product->product_code   = $request->product_code;
        $product->qty            = $request->qty;
        $product->price          = $request->price;
        $product->description    = $request->description;
        $product->image('image',$product);
        if ($product->save()) {
            
            ProductGallery::imageGallery('imageGalleries', $product->id);

        }
        return redirect()->route('products.index')->with('successMessage', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('category_name','id');
        $imageGalleries = ProductGallery::where('product_id',$product->id)->get();
        return view('products.edit',compact('categories','product','imageGalleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
            
        
        $product->category_id    = $request->category_id;
        $product->product_name   = $request->product_name;
        $product->product_code   = $request->product_code;
        $product->qty            = $request->qty;
        $product->price          = $request->price;
        $product->description    = $request->description;
        $product->image('image',$product);
        if ($product->save()) {
            
            ProductGallery::updateImageGallery('imageGalleries', $product->id);

        }
        return redirect()->route('products.index')->with('successMessage', 'Product Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->destroy(request()->id)) {

            ProductGallery::where('product_id',request()->id)->delete();

            return redirect()->route('products.index')->with('dangerMessage', 'Product Deleted Successfully!');
        }
    }
}
