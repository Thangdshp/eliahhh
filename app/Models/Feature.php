<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Feature extends Model
{
    // Declare INFO BASIC 
    protected $table='feature';
    protected $fillable=['name','feature_status'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'name'=>request()->name,
            'feature_status'=>request()->feature_status
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'feature_status'=>request()->feature_status
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function getFeatureByName($name){
        return (Feature::where('name','=',$name)->get());
    }

}
