<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\ProductDetail;
use App\Models\DiscountCode;

class CartController extends Controller
{
    public function add(CartHelper $cart,$id,$quantity=1){
        $product = ProductDetail::find($id);
        if(isset(request()->quantity)){
            $cart->add($product,request()->quantity);
            
        }else{
            $cart->add($product);
        }
      
        return response()->json([
            'message_alert' => 'Add success product to cart',
            'title'=>'success'
        ]);
    }
    public function update(CartHelper $cart,$id,$quantity){
        $cart->update($id,$quantity);
    }
    public function index(CartHelper $cart){
        // session(['cart'=>'']);
        // dd( $cart);
        return view('frontEnd/Cart',[
            'cart'=>$cart
        ]);
       
    }
    public function remove(CartHelper $cart,$id){
        $cart->remove($id);
        return response()->json([
            'message_alert' => 'Remove success one product from cart',
            'title'=>'success'
        ]);
    }
    public function clear(CartHelper $cart){
        $cart->clear();
        return response()->json([
            'message_alert' => 'Clear success all product from cart',
            'title'=>'success'
        ]);
    }
    public function show(CartHelper $cart){
        $total= number_format($cart->total_price,2);
        $total_string='Cart :$ '.' '.$total;
        $quantity=$cart->total_quantity;
        $view = view("fronEndCreate.cart_hover",compact('cart'))->render();
        return response()->json(['html'=>$view,'total'=>$total_string,'quantity'=>$quantity]);
    }
    public function checkCode(DiscountCode $discountCode,$nameCode){
        $Cart= new CartHelper(); 
        $dis=$discountCode->checkCodeDiscount($nameCode);
        if ($dis['status']== 'true') {
            $total_sale=$Cart->setDiscount($dis['discount']);
            if ($total_sale['status']=='true') {
                return response()->json([
                    'status' => 1,
                    'total_sale'=>$total_sale['priceRatio'],
                    'total'=>$Cart->total_price,
                    'message_alert' => 'Use discount success',
                    'title'=>'success'
                ]);
            }
            return response()->json([
                'status' => 0,
                'message_alert' => 'Your total money is low with discount code',
                'title'=>'error'
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message_alert' => 'Discount not empty!',
                'title'=>'error'
            ]);
        }
       
    }
}
