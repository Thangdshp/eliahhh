<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Auth;

class Blog extends Model
{
    protected $table='blog';
    protected $fillable=['category_blog_id','user_id','content_small','title_blog','content','url_img','slug','blog_status'];

    public function storeRecord(){
        $idUser=Auth::user()->id;
        $arr=[
            'category_blog_id'=>request()->category_blog_id,
            'user_id'=>$idUser,
            'title_blog'=>request()->title_blog,
            'content'=>request()->content,
            'content_small'=>request()->content_small,
            'slug'=>Str::slug(request()->title_blog, '-'),
            'blog_status'=>request()->blog_status
        ];
        $file=request()->img;
        if ($file!=null) {
            $nameImg=$file->store('blog');
            $arr['url_img']=$nameImg;
        }
        return $this->create($arr);
    }
    public function updateRecord(){
        $arr=[
            'category_blog_id'=>request()->category_blog_id,
            'title_blog'=>request()->title_blog,
            'content'=>request()->content,
            'content_small'=>request()->content_small,
            'slug'=>Str::slug(request()->title_blog, '-'),
            'blog_status'=>request()->blog_status
        ];
        $file=request()->img;
        if ($file!=null) {
            $nameImg=$file->store('blog');
            $arr['url_img']=$nameImg;
        }
        return $this->update($arr);
    }
    public function categoryBlog(){
        return $this->belongsTo(CategoryBlog::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
