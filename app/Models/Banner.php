<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $table='banner';
    protected $fillable=['page','position','images'];
    public function storeRecord(){
        $arr=[
            'page'=>request()->page
        ];
        $imageTopF=request()->imageTop;
        $arrImg=Array();
        if ($imageTopF!=null) {
            $arrImg[]= $imageTopF->store('banner');
            $netJSON = json_encode($arrImg);
            $arr['images']=$netJSON;
            $arr['position']=0;
        }
        Banner::create($arr);
        $netJSON='';
        $imageBottomS=request()->imageBottom;
        $arrImg=Array();
        foreach ($imageBottomS as $imageBottom) {
            $nameUrl=$imageBottom->store('banner');
            $arrImg[]=$nameUrl;
        }
        $netJSON = json_encode($arrImg);
        $arr['images']=$netJSON;
        $arr['position']=1;
       return Banner::create($arr);
    }
    public function updateRecord(){
        if (request()->check>1) {
            $imageBottomS=request()->imageBottom;
            foreach ($imageBottomS as $imageBottom) {
                $nameUrl=$imageBottom->store('banner');
                $arrImg[]=$nameUrl;
            }
            foreach (json_decode($this->images) as  $img) {
                Storage::delete($img);
            } 
            $netJSON = json_encode($arrImg);
            return $this->update([
                'images'=>$netJSON
            ]);

        }else{
            $imageTopF=request()->image;
            foreach (json_decode($this->images) as  $img) {
                Storage::delete($img);
            } 
            if ($imageTopF!=null) {
                $arrImg[]= $imageTopF->store('banner');
                $netJSON = json_encode($arrImg);
                return $this->update([
                    'images'=>$netJSON
                ]);
            }

        }
    }
    public function getBannerRouteTop($name){
        $bannerImg= Banner::where('page','=',$name)->where('position','=',0)->get();
        return  $bannerImg;
    } 
    public function getBannerRouteBottom($name){
        $bannerImg= Banner::where('page','=',$name)->where('position','=',1)->get();
        // dd( $bannerImg);
        return  $bannerImg;
    }  
}
