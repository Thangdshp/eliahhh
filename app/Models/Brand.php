<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    // Declare INFO BASIC 
    protected $table='brand';
    protected $fillable=['name','slug','brand_status'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'name'=>request()->name,
            'brand_status'=>request()->brand_status,
            'slug'=>Str::slug(request()->name, '-')
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'brand_status'=>request()->brand_status,
            'slug'=>Str::slug(request()->name, '-')
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }
    public function product(){
        return $this->hasMany(Product::class);
    }

}
