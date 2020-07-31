<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Feature;
use App\Models\Rank;
use App\Models\Banner;
use App\Models\Comment;
use App\Models\PriceSpace;


class ShopController extends Controller
{
    
    public function index($searchCategory="null",$searchFeature="null",$searchPrice="null",$nameProduct="null",$orderBy="null"){

        $productDetail= new ProductDetail();
        $productDes=$productDetail->getProductByQuery($searchCategory,$searchFeature,$searchPrice,$nameProduct,$orderBy);
        if ($productDes!=null) {
           if (count( $productDes)==0) {
            $productDes=null;
           }
        }
        return view('frontEnd/shop',[
            'categories'=>Category::all(),
            'features'=>Feature::all(),
            'priceSpaces'=>PriceSpace::all(),
            'productDetails'=>$productDes,
            'searchFeature'=>$searchFeature,
            'searchPrice'=>$searchPrice,
            'searchCategory'=>$searchCategory,
            'searchOrder'=>$orderBy,
            'nameProduct'=>$nameProduct
        ]);
    }
    public function showProductDetail($lug,$id){
        $productDetail=ProductDetail::find($id); 
        $productDetailAll=$productDetail->product->productDetail;
        $products=$productDetail->product->category->product;
        $imgDetail=($productDetail->productDetailImage)[0];
        $avg=Rank::where('product_detail_id', $id)->avg('rank');
        if ($avg!=null) {
            $avgRank=round($avg);
        }else{
            $avgRank=4;
        }
        $numComment=Comment::where('product_id','=',$productDetail->product->id)->count();
        if ($numComment!=0) {
            $comments=Comment::where('product_id','=',$productDetail->product->id)->get();
        }else{
            $comments=null;
        }

        return view('frontEnd/product-detail',[
            'productDetail'=>$productDetail,
            'productDetailAll'=>$productDetailAll,
            'imgDetail'=>$imgDetail,
            'products'=>$products,
            'avgRank'=>$avgRank,
            'comments'=>$comments,
            'numComment'=>$numComment
        ]);
    }
    public function showDescription($id){
        $productDetail=ProductDetail::find($id);
        $view = view("fronEndCreate.modalDescription",compact('productDetail'))->render();
        return response()->json(['html'=>$view]);
    }
    public function show($id){
        $productDetail= ProductDetail::find($id);
        $product=$productDetail->product;
        $imgDetails=$productDetail->productDetailImage;
        $view = view("fronEndCreate.modalShowProduct",compact('productDetail','product','imgDetails'))->render();
        return response()->json(['html'=>$view]);

    }
    public function getPrice($id){
        $productDetail=ProductDetail::find($id);
        $price=number_format($productDetail->price_sale,2);
        $img='storage/app/';
        $img.=($productDetail->productDetailImage)[0]->url_img;
        return response()->json(['price'=>$price,'img'=>$img]);
    }
}
