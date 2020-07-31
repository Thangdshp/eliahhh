<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PriceSpace extends Model
{
    // Declare INFO BASIC 
    protected $table='price_space';
    protected $fillable=['start_price','end_price','position'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'start_price'=>request()->start_price,
            'end_price'=>request()->end_price,
            'position'=>0
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'start_price'=>request()->start_price,
            'end_price'=>request()->end_price,
            'position'=>0
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }

}
