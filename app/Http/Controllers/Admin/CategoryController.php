<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $Category)
    {   
        $categories=$Category->orderBy('name','ASC')->get();
        return view('backEnd.category.index',[
            'categoies'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $Category)
    {
        $categories=$Category->orderBy('name','ASC')->get();
        return view('backEnd.category.add',[
            'categoies'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request,Category $Category)
    {
        if ($Category->storeRecord()) {
            if ($request->redirect==1) {
                return redirect()->route('category.index')->with('success','Add success record to database');
            }
            return redirect()->route('category.create')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('backEnd.category.edit',[
            'categoies'=>$categories,
            'cate'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($category->updateRecord()) {         
            return redirect()->route('category.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (count($category->product)==0 && count($category->child)==0) {
            if ($category->delete()) {
                return redirect()->route('category.index')->with('success','Delete success record to database');   
            }
        }
        return redirect()->route('category.index')->with('error','Delete not success record to database!');
    }
}
