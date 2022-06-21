<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category\Category;
use Illuminate\Support\str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->where('is_delete',0)->get();   
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'description' => 'required'
            ]);

        $category = Category::where("name", $request->name)->first();

        if($category){
            $category->is_delete = 0;
            $category->save();
        }else{
            $category = new Category();
            $category->name          = $request->name;
            $category->slug           = Str::slug($request->name);
            $category->description    = $request->description;
            $category->save();
        }
        

        //write success message
        $request->session()->flash('create', ' Category added Successfully');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
            'name' => 'required',
            'description' => 'required'
            ]);
            
        $existingCategory = Category::where("name", $request->name)->first();

        if($existingCategory){
            $existingCategory->is_delete = 0;
            $existingCategory->save();
            $category->is_delete = 1;
            $category->save();
        }
        else{
            $category->name          = $request->name;
            $category->slug           = Str::slug($request->name);
            $category->description    = $request->description;
            $category->save();
        }
        

        //write success message
        $request->session()->flash('update', ' Category updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $request->validate([
            'is_delete' => 'required',
        ]);
        $category->is_delete = $request->is_delete;
        $category->save();
        //write success message
        $request->session()->flash('delete', ' Category deleted Successfully');
        return back();
    }
}
