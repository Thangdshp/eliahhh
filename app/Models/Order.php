<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\CartHelper;

class Order extends Model
{
    // Declare INFO BASIC 
    protected $table='order';
    protected $fillable=['user_id','payment_id','sum','order_status'];

    // Store record to db
    public function storeRecord(){
        $cart= new CartHelper();
        $arr=[
            'user_id'=>request()->id,
            'payment_id'=>request()->payment,
            'sum'=>($cart->total_price-$cart->priceDiscount),
            'order_status'=>0
        ];
        
        return $this->create($arr);
    }
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
