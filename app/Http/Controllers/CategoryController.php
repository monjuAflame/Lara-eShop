<?php

namespace App\Http\Controllers;

use App\model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->description   = $request->description;
        $category->is_active     = 1;
        $category->image('image',$category);
        if ($category->save()) {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->category_name = $request->category_name;
        $category->description   = $request->description;
        $category->is_active     = $request->is_active;
        $category->image('image',$category);
        
        if ($category->save()) {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        // dump(request()->id);
        if ($category->destroy(request()->id)) {
           return redirect()->route('categories.index');
        }
        
            
        
    }
}
