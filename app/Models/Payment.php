<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    // Declare INFO BASIC 
    protected $table='payment';
    protected $fillable=['name','payment_status'];

    // Store record to db
    public function storeRecord(){
        $arr=[
            'name'=>request()->name,
            'payment_status'=>request()->payment_status
        ];
        return $this->create($arr);
    }
    // Update record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'payment_status'=>request()->payment_status
        ];
        return $this->update($arr);
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }

}
