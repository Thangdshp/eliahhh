<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='service';
    protected $fillable=[
        'title','content','checkList','status','position','imgs'
    ];
    public function storeRecord(){
        $checkLists=request()->checkList;
        $checkL=Array();
        foreach ($checkLists as $key=>$checkList) {
           $checkL[$key]=$checkList;
        }
        $img1=request()->img1;
        $img2=request()->img2;
        $arrImg=Array();
        $arrImg[0]=$img1->store('service');
        $arrImg[1]=$img2->store('service');
       
        $imgs = json_encode($arrImg);

        $arr=[
            'title'=>request()->title,
            'content'=>request()->content,
            'checkList'=>json_encode($checkL),
            'status'=>request()->status,
            'position'=>0,
            'imgs'=>$imgs
        ];
        return $this->create($arr);
    }
    public function updateRecord(){
        $checkLists=request()->checkList;
        $checkL=Array();
        foreach ($checkLists as $key=>$checkList) {
           $checkL[$key]=$checkList;
        }
        $img1=request()->img1;
        $img2=request()->img2;
        $arr=[
            'title'=>request()->title,
            'content'=>request()->content,
            'checkList'=>json_encode($checkL),
            'status'=>request()->status,
            'position'=>request()->position
        ];
        if ($img1!=null || $img2!=null) {
            $arrImg=Array();
            $arrImg[0]=$img1->store('service');
            $arrImg[1]=$img2->store('service');
            $imgs = json_encode($arrImg);
            $arr['imgs']= $imgs;
        }
       
      
        
        return $this->update($arr);
    }
    public function getAllData(){
        $data=Service::where('status','=',1)->orderBy('position','ASC')->get();
        return  $data;
    }
    public function getAllDataShow(){
        $data=Service::where('status','=',1)->orderBy('position','ASC')->paginate(4);
        return  $data;
    }
}
