<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slideshow extends Model
{
    protected $table='slideshow';
    protected $fillable=['url_img','titleSmall','title','link','position','slideshow_status'];
    public function storeRecord(){
        $arr=[
            'titleSmall'=>request()->titleSmall,
            'title'=>request()->title,
            'link'=>request()->link,
            'position'=>request()->position,
            'slideshow_status'=>request()->slideshow_status
        ];
        $file=request()->url_img;
        $nameImg=$file->store('slideshow');
        $arr['url_img']= $nameImg;
        return $this->create($arr);
    }
    public function updateRecord(){
        $arr=[
            'titleSmall'=>request()->titleSmall,
            'title'=>request()->title,
            'link'=>request()->link,
            'position'=>request()->position,
            'slideshow_status'=>request()->slideshow_status
        ];
        $file=request()->url_img;
        if ( $file!=null) {
            $nameImg=$file->store('slideshow');
            $arr['url_img']= $nameImg;
            Storage::delete($this->url_img);
        }
        return $this->update($arr);
    }
}
