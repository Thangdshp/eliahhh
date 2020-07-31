<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProgress()
    {
        return view('backEnd.order.index',[
            'orders'=>Order::where('order_status','=',0)->get()
        ]);
    }
    public function indexAccept()
    {

        return view('backEnd.order.index',[
            'orders'=>Order::where('order_status','=',1)->get()
        ]);
    }
    public function indexSuccessful()
    {

        return view('backEnd.order.index',[
            'orders'=>Order::where('order_status','=',2)->get()
        ]);
    }
    public function indexRefuse()
    {

        return view('backEnd.order.index',[
            'orders'=>Order::where('order_status','=',3)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order,$id)
    {   
        $order=Order::find($id);
        $user=$order->user;
        $allOrderOfUser=Order::where('user_id','=',$user->id);
        $numberOrderUser=count($allOrderOfUser->get());
        $numSuccess=count($allOrderOfUser->where('order_status','=',2)->get());
        $succ=$allOrderOfUser->where('order_status','=',2)->get();
        $numFail=count($allOrderOfUser->where('order_status','=',3)->get());
        $sum=0;
        foreach ($succ as $value) {
            $sum+=$value->sum;
        }
        $statusF=$order->order_status;
        if ($order->order_status==0){
            $status='Processing';
        }
                   
                //   elseif($order->order_status==1)
                //     Accept
                //   elseif($order->order_status==2)
                //     Successful 
                //   else
                //     Refuse
        
        return view('backEnd.order.edit',[
            'ord'=>$order,
            'orders'=> $order->orderDetail,
            'user'=> $user,
            'numberOrderUser'=>$numberOrderUser,
            'numSuccess'=>$numSuccess,
            'numFail'=>$numFail,
            'sum'=>$sum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $order=Order::find($id);
        $order->update([
            'order_status'=>request()->order_status,
        ]);
        return redirect()->route('order.indexProgress')->with('success','Update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
