<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
     // Declare INFO BASIC 
     protected $table='category';
     protected $fillable=['name','slug','category_status','parent'];
 
     // Store record to db
     public function storeRecord(){
         $arr=[
            'name'=>request()->name,
            'category_status'=>request()->category_status,
            'slug'=>Str::slug(request()->name, '-'),
            'parent'=>request()->parent
         ];
        //  dd($arr);
         return $this->create($arr);
     }
     // Update record to db
     public function updateRecord(){
         $arr=[
            'name'=>request()->name,
            'category_status'=>request()->category_status,
            'slug'=>Str::slug(request()->name, '-'),
            'parent'=>request()->parent
         ];
         return $this->update($arr);
     }
     // Get data from db
    public function getData(){
        return $this->all();
    }
    public function parentCate(){
        return $this->belongsTo(Category::class,'parent','id');
    }
    public function child(){
        return $this->hasMany(Category::class,'parent','id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function scopeActive($query){    
        return $query->where('category_status', '=', 1);  
    }
    public function getCategoryBySlug($slug){
        return (Category::where('slug','=',$slug)->get());
    }
    public function getAllProducById($id){
        return Product::where('category_id','=',$id)->get();
    }
    public function countSlug($slug){
        return count(Category::where('slug', '=', $slug)->paginate(12));
    }
 
}
