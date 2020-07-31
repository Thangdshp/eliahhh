<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\PriceSpace;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    protected $table='product_detail';
    protected $fillable=['product_id','color_id','quantity','price','active_home','price_sale','product_detail_status'];

    public function storeRecord(){
        // get id product
        $idProduct=request()->id;
        // End 
        // dd((request()->active));
      
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
            dd($reqProductDeatl);
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
        $arr=[
            'color_id'=>request()->color_id,
            'quantity'=>request()->quantity,
            'price'=>request()->price,
            'price_sale'=>(request()->price_sale==null)?request()->price:request()->price_sale,
            'active_home'=>(request()->active_home==1)?1:0,
            'product_detail_status'=>request()->product_detail_status
        ];
       if (request()->active_home==1) {
            $AllProductDetails=ProductDetail::where('product_id','=',($this->product)->id)->get();
            foreach ($AllProductDetails as  $AllProductDetail) {
                $AllProductDetail->update([
                    'active_home'=>0
                ]);
            }
       }
        // dd($arr);
        $check=request()->hander_img;
        if ($check==0) {
            return $this->update($arr);
        }
        if($check==1){
            $files=request()->imgae[0];
            $idProductDetail=$this->id;
            foreach ($files as  $file) {
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
            return $this->update($arr);
        }
        if ($check==2) {
            $files=request()->imgae[0];
            $idProductDetail=$this->id;
            foreach ($this->productDetailImage as  $image) {
                (ProductDetailImage::find($image->id))->delete();
            }
            foreach ($files as  $file) {
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
            return $this->update($arr);
        }
    }
    public function getIdProductDetail(){
        $arrId=null;
        if($this->color_id!=null){
            $datas=ProductDetail::where('product_id','=',$this->product->id)->get();
            foreach ($datas as $key => $data) {
                if($data->color_id!=$this->color_id){
                     $arrId[$key]=$data->color_id;
                }
            }
        }       
       return $arrId;
    }
    public function getAllProductHome(){
        return ProductDetail::where('active_home',1)->get();
    }
    public function getIdColor($id){
        $arrId=null;
        $datas=ProductDetail::where('product_id','=',$id)->get();
        if(count($datas)!=0){
            foreach ($datas as $key => $data) {              
                $arrId[$key]=$data->color_id;        
            }
        }
       if (count($arrId)==1 && $arrId[0]==null) {
            return $arrId=null;
       }
        return $arrId;
    }
    public function getImgProductDetail(){
        return $this->productDetailImage()->where('position','=','0')->get();
    }
    public function productDetailImage(){
        return $this->hasMany(ProductDetailImage::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getProductByQuery($searchCategory,$searchFeature,$searchPrice,$nameProduct,$orderBy){
        $category= new Category();
        $feature= new Feature();
        $product= new Product();
        $idCate=null;
        $idFeature=null;
        $idProduct=null;
        $productDetail=null;
        $condition=[
            ['product_status','=',1]
        ];
        $conditions= Array();
        if (count($category->getCategoryBySlug($searchCategory))>0) {
            $idCate=$category->getCategoryBySlug($searchCategory)[0]->id;
            array_push($condition,['category_id','=',$idCate]);
        };
        if (count($feature->getFeatureByName($searchFeature))>0) {
            $idFeature=$feature->getFeatureByName($searchFeature)[0]->id;
            array_push($condition,['feature_id','=',$idFeature]);
        }
        if ($nameProduct!='null') {
            $namePr='%'.$nameProduct.'%';
            array_push($condition,['name','like',$namePr]);
        }
        if ($orderBy!='null') {
            if ($orderBy==1) {
                $sort='desc';
            }else{
                $sort='asc';
            }
            $datas= DB::table('product')->select('id')->where($condition)->orderBy('name',$sort)->get();
        }else{
            $datas= DB::table('product')->select('id')->where($condition)->get();
        }
        if (count($datas)>0) {
            $idProduct= Array();
            foreach ($datas as $data) {
                $idProduct[]=$data->id;
            }
            $ids_ordered = implode(',', $idProduct);
            if ($searchPrice!='null') {
                $priceOrder=PriceSpace::find($searchPrice);
                $productDetail=ProductDetail::whereIn('product_id',$idProduct)->orderByRaw("FIELD(product_id, $ids_ordered)")->WhereBetween('price_sale',[$priceOrder->start_price,$priceOrder->end_price])->paginate(9);
                
            }else{
                $productDetail=ProductDetail::whereIn('product_id',$idProduct)->orderByRaw("FIELD(product_id, $ids_ordered)")->paginate(9);
            }
                     
        }  
        return $productDetail;
    }
    public function rank(){
        return $this->hasMany(Rank::class);
    }
}
