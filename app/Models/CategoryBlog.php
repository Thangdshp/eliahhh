<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CategoryBlog extends Model
{
    // Declare INFO BASIC 
    protected $table='category_blog';
    protected $fillable=['name','slug','category_blog_status'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'name'=>request()->name,
            'category_blog_status'=>request()->category_blog_status,
            'slug'=>Str::slug(request()->name, '-')
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'category_blog_status'=>request()->category_blog_status,
            'slug'=>Str::slug(request()->name, '-')
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }
    public function blog(){
        return $this->hasMany(Blog::class);
    }

}
