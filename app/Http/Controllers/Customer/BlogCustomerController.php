<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CategoryBlog;

class BlogCustomerController extends Controller
{
    public function index($slug=null){
        if ($slug!=null) {
            $checkCate=CategoryBlog::where('slug','=',$slug)->count();
            if ($checkCate>0) {
                $idCate=(CategoryBlog::where('slug','=',$slug)->first())->id;
                $blogs=Blog::where('blog_status','=',1)->where('category_blog_id','=',$idCate)->orderBy('created_at','DESC')->paginate(6);
            }else{
                $blogs=null;
            }
            
        }else{
            $blogs=Blog::where('blog_status','=',1)->orderBy('created_at','DESC')->paginate(6);
        }
       
        return view('frontEnd/blog',[
            'blogs'=>$blogs,
            'blogFirst'=>Blog::where('blog_status','=',1)->orderBy('created_at','DESC')->first(),
            'blogOlds'=>Blog::where('blog_status','=',1)->orderBy('created_at','ASC')->limit(6)->get(),
            'categories'=>CategoryBlog::all()
        ]);
    }
    public function blogDetail($id){
        $blog=Blog::find($id);
        return view('frontEnd/blog-detail',[
            'blog'=>$blog,
            'blogOlds'=>Blog::where('blog_status','=',1)->orderBy('created_at','ASC')->limit(6)->get(),
            'categories'=>CategoryBlog::all()
        ]);
    }
}
