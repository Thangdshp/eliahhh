<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigPage extends Model
{
    protected $table='config_page';
    protected $fillable=['name','content','address','phone','email','openTime','status'];
    public function addInfor(){
        $arr=[
            'name'=>'Info',
           'address'=>request()->address, 
           'phone'=>request()->phone, 
           'email'=>request()->email, 
           'openTime'=>request()->openTime,
           'status'=>1
        ];
        return $this->create($arr);
    }
    public function addEvent(){
        $arr=[
            'name'=>request()->name,
            'content'=>request()->content,
            'status'=>1
        ];
        return $this->create($arr);
    }
    public function updateInfor(){
        $arr=[
            'address'=>request()->address, 
            'phone'=>request()->phone, 
            'email'=>request()->email, 
            'openTime'=>request()->openTime,
            'status'=>request()->status
        ];
         return $this->update($arr);
    }
    public function updateEvent(){
        $arr=[
            'name'=>request()->name,
            'content'=>request()->content,
            'status'=>request()->status
        ];
         return $this->update($arr);
    }
}
