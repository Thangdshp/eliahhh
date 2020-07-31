<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\Service;

class ServiceCustomerController extends Controller
{
    public function sendEmail(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required'
        ],[
            'name.required'=>'The name not empty!',
            'phone.required'=>'The phone not empty!'
        ]);
        $service=Service::find(request()->service);
        Mail::send('email/emailSerive', array('name'=>request()->name,'phone'=>request()->phone, 'service'=>$service->title), function($message){
	        $message->to('eliahdev2001@gmail.com', 'Eliah')->subject('Advisory Service');
        });
        return redirect()->back()->with('success','Send request success advisory service !');
        
    }
}
