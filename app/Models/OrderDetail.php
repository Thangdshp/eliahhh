<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDetail;
use App\Models\Order;

class OrderDetail extends Model
{
    protected $table='order_detail';
    protected $fillable=['product_detail_id','order_id','sum','quantity'];
    public function getProductDetail($id){
        return ProductDetail::find($id);
    }
    public function checkOrder($idUser,$idProduct){
        $orders=Order::select('id')->where('user_id','=',$idUser)->where('order_status','=',2)->get();
        $arr= Array();
        foreach($orders as $order){
            $arr[]=$order->id;
        }
        // where('product_detail_id','=',$idProduct)
        $orderDetail=OrderDetail::whereIn('order_id',$arr)->where('product_detail_id','=',$idProduct)->count();
        if($orderDetail==0){
            return false;
        }else{
            return true;
        }
    }
}