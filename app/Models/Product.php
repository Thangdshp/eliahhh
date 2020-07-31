<?php

namespace App\Models;

use App\Models\ProductDetail;
use App\Models\ProductDetailImage;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable=['name','slug','category_id','brand_id','active_new','product_status','description','feature_id'];

    public function storeRecord(){
        // Get data from form
        $reqProduct=[
            'name'=>request()->name,
            'category_id'=>request()->category_id,
            'brand_id'=>request()->brand_id,
            'product_status'=>request()->product_status,
            'active_new'=>(request()->active_new==1)?1:0,
            'feature_id'=>request()->feature_id,
            'slug'=>Str::slug(request()->name, '-'),
            'description'=>request()->description
        ];
        // dd($reqProduct);
        // create product
        $product=Product::create($reqProduct);
        // get id product
        $idProduct=$product->id;
        // End 
        
        for ($i=0; $i <count(request()->quantity); $i++) { 
            $reqProductDeatl=[
                'product_id'=>$idProduct,
                'color_id'=>(request()->color_id)[$i],
                'quantity'=>(request()->quantity)[$i],
                'price'=>(request()->price)[$i],
                'price_sale'=>((request()->price_sale)[$i]==null)?(request()->price)[$i]:(request()->price_sale)[$i],
                'active_home'=>0,
                'product_detail_status'=>(request()->product_detail_status)[$i]
            ];
            // hander create product deatal
            // create product
            $productDetail=ProductDetail::create($reqProductDeatl);
            if (!$productDetail) {
               return false;
            }
            // get id product
             $idProductDetail=$productDetail->id;
            // End
            $files=request()->imgae;
            // Save img
            foreach ($files[$i] as  $file) {
                if ($file!=null){
                    $url_img= $file->store('product');
                    $reqImg=[
                        'url_img'=>$url_img,
                        'pdi_status'=>1,
                        'position'=>0,
                        'product_detail_id'=>$idProductDetail
                    ];
                    if (!ProductDetailImage::create($reqImg)) {
                        return false;
                     }
                }
            }
        }
        return true;
    }
    public function updateRecord(){
         // Get data from form
         $reqProduct=[
            'name'=>request()->name,
            'category_id'=>request()->category_id,
            'brand_id'=>request()->brand_id,
            'product_status'=>request()->product_status,
            'active_new'=>(request()->active_new==1)?1:0,
            'feature_id'=>request()->feature_id,
            'slug'=>Str::slug(request()->name, '-'),
            'description'=>request()->description
        ];
        return $this->update($reqProduct);
    }
    public function scopeActive($query){
        return $query->where('product_status', '=', 1);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function feature(){
        return $this->belongsTo(Feature::class);
    }
    public function productDetail(){
        return $this->hasMany(ProductDetail::class);
    }
    
}
