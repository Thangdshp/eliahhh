<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.blog.index',[
            'blogs'=>Blog::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.blog.add',[
            'categories'=>CategoryBlog::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request,Blog $blog)
    {
        if ($blog->storeRecord()) {
            return redirect()->route('blog.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backEnd.blog.edit',[
            'categories'=>CategoryBlog::all(),
            'blog'=>$blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if ($blog->updateRecord()) {
            return redirect()->route('blog.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $idUserNow=Auth::user()->id;
       if ($idUserNow==$blog->user_id) {
            if ($blog->delete()) {
                return redirect()->route('blog.index')->with('success','Delete success record to database');
            }
       }
        return redirect()->back()->with('error','Delete not success record to database !');
    }
}
