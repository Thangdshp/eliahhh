<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rank;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Rules\checkPasswordUpdate;
use Auth;

class CustomerController extends Controller
{
    public function index(){
        $status=0;
        $condition=[
            ['user_id','=', Auth::user()->id],
            ['order_status','=',$status]
        ];
        return view('frontEnd/about-user',[
            'orders'=>Order::where($condition)->get()
        ]);
    }
    public function listHistory($status=0){
        $condition=[
            ['user_id','=', Auth::user()->id],
            ['order_status','=',$status]
        ];
        $orders=Order::where($condition)->get();
        $view = view("fronEndCreate.tableOrderHistory",compact('orders'))->render();
        return response()->json(['html'=>$view]);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'email'=>'required|email|unique:user,email,'.$request->id,
            'name'=>'required',
            'phone'=>'required|regex:/[0-9]{9}/',
            'address'=>'required',
            'birth_day'=>'date|before:today',
            'repPassword'=>'same:newPassword',
            'oldPassword'=> new checkPasswordUpdate()
        ],[
            'name.required'=>'The name not empty!',
            'email.required'=>'The email not empty!',
            'email.unique'=>'The email already exist!',
            'email.email'=>'The email must email!',
            'birth_day.date'=>'The date of birth must datetime!',
            'birth_day.before'=>'The date of birth must before today',
            'address.required'=>'The address not empty!',
            'phone.required'=>'The phone not empty!',
            'phone.regex'=>'The phone Invalid format (0->9 and has 9 number)!',
            'repPassword.same'=>'The Confirm New Password mismatched!'
        ]);
        $user=User::find($id);
        if($user->updateRecord()==1){
            return redirect()->back()->with('success','Update success record to database');
        }elseif($user->updateRecord()==3)
        {
            return redirect()->back()->with('error','Old password is wrong!');
        }      
        return redirect()->back()->with('error','Update not success record to database!');
    }
    public function delete($id){
        $order= Order::find($id);
        if ($order->order_status==0) {
            foreach ($order->orderDetail as  $value) {
                $value->delete();
            }
            $order->delete();
        }
        return redirect()->back();
    }
    public function postReview(Request $request){
        $rank= new Rank();
        $commmet= new Comment();
        $idUser=Auth::user()->id;
        $idProduct=$request->idProductDetail;
        $orderDetai= new OrderDetail();
        if ($orderDetai->checkOrder($idUser,$idProduct)) {
            $rank->storeRecord();
            $commmet->storeRecord();
            return response()->json([
                'message_alert' => 'You evaluate the product successfully',
                'title'=>'success'
            ]);   
        }else{
            return response()->json([
                'message_alert' => 'You need to purchase goods to evaluate',
                'title'=>'error'
            ]); 
        }
      

    }
}
