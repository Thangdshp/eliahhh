<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Payment;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckOutController extends Controller
{
    public function index(){
        $Cart= new CartHelper();
        if (count($Cart->items)==0) {
            return redirect()->route('cart')->with('error','Cart not product!');
        }
        return view('frontEnd/Checkout',[
            'cart'=>$Cart,
            'payments'=>Payment::all()
        ]);
    }
    public function createOrder(Request $request,Order $order,OrderDetail $orderDetail){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required|regex:/[0-9]{9}/',
            'address'=>'required'
        ],[
            'name.required'=>'The name not empty!',
            'address.required'=>'The address not empty!',
            'phone.required'=>'The phone not empty!',
            'phone.regex'=>'The phone Invalid format (0->9 and has 9 number)!',
        ]);
        $id=$request->id;
        $user=User::find($id);
        $arr=[
           'name'=>request()->name,
           'phone'=>request()->phone, 
           'address'=>request()->address
        ];
        $Cart= new CartHelper();
        if ($user->update($arr)) {
            $order_item=$order->storeRecord();
            $idOrder=$order_item->id;
           foreach ($Cart->items as $key => $product) {
               $productDetail=OrderDetail::find($key);
            //    $reQuantity=$productDetail->quantity-$product['quantity'];
            //    if ($reQuantity>=0) {
            //         $productDetail->update([
            //             'quantity'=>$reQuantity
            //         ]);
            //    }
                $arrDetail=[
                    'product_detail_id'=>$key,
                    'order_id'=>$idOrder,
                    'sum'=>$product['quantity']*$product['price'],
                    'quantity'=>$product['quantity']
                ];
                $orderDetail->create($arrDetail);
           }
           $Cart->clear();
           return redirect()->route('shop')->with('success','You order success!');
        }
    }
}
