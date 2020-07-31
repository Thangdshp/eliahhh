<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Wishlist extends Model
{
    protected $table='favourite';
    protected $fillable=['user_id','product_detail_id'];
    public function getData(){
        $id=Auth::user()->id;
        return Wishlist::where('user_id','=',$id)->get();
    }
    public function storeRecord($id){
        $wishlistItem=Wishlist::where([
            ['user_id','=',Auth::user()->id],
            ['product_detail_id','=',$id]
        ])->get();
        if(count($wishlistItem)==0){
            return $this->create([
                'user_id'=>Auth::user()->id,
                'product_detail_id'=>$id
            ]);
        }
        return false;
       
    } 
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
    public function getImg(){
        return $this->hasMany(ProductDetailImage::class,'product_detail_id','product_detail_id');
    }
    
}
