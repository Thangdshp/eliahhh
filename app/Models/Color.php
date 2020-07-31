<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Color extends Model
{
    // Declare INFO BASIC 
    protected $table='color';
    protected $fillable=['name','color_code','color_status'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'name'=>request()->name,
            'color_code'=>request()->color_code,
            'color_status'=>request()->color_status
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'color_code'=>request()->color_code,
            'color_status'=>request()->color_status
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }
    public function productDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

}
