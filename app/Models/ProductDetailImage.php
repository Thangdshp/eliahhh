<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetailImage extends Model
{
    protected $table='product_detail_img';
    protected $fillable=['url_img','pdi_status','position','product_detail_id'];
    public function ProductDetail(){
        return $this->belongsTo(ProductDetail::class);
    }
    public function updateRecord(){
        $arr=[
          'position'=>request()->position,
          'pdi_status'=>request()->pdi_status
        ];
        $file=request()->image;
        if ($file!=null) {
            $url_img= $file->store('product');
            $arr['url_img']=$url_img;

        }
        return $this->update($arr);       
    }
}
