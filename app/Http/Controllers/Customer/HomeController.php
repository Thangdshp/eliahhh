<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginCustomerRequest;
use App\Models\ProductDetail;
use App\Models\Slideshow;
use App\Models\User;
use App\Models\Comment;
use App\Models\Service;
use App\Helper\CartHelper;
use Mail;
use App\Models\NewLetter;

class HomeController extends Controller
{
    public function index(ProductDetail $productDetail){
        $service= new Service();
        $slideshows=Slideshow::where('slideshow_status','=',1)->orderBy('position')->get();
        $comment=Comment::where('comment_status','=',1)->orderBy('created_at','DESC')->limit(6)->get();
        return view('frontEnd/index',[
            'products'=>$productDetail->getAllProductHome(),
            'slideshows'=>$slideshows,
            'comments'=>$comment,
            'services'=>$service->getAllData()
        ]);
    }
    public function contact(){
        return view('frontEnd/Contact');
    }
    public function service(){
        $service= new Service();
        // dd($service->getAllDataShow());
        return view('frontEnd/services',[
            'services'=>$service->getAllData(),
            'serviceshows'=>$service->getAllDataShow()
        ]);
    }
    public function postContact(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'email'=>'required|email',
            'content'=>'required'
        ]);
        $input = $req->all();
        Mail::send('email/emailContact', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['content']), function($message){
	        $message->to('eliahdev2001@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });
        return response()->json([
            'title'=>'success',
            'message_alert'=>'Successfully sent contact information'
        ]);
    }
    public function login(){
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('frontEnd/login');
    }
    public function login_post(LoginCustomerRequest $request){
        $remember=($request->remember==1)?true:false;
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials,$remember)) {
            return redirect()->route('index')->with('success','Logged in successfully');
        }
        return redirect()->back()->with('error','Email or password is incorrect');
    }
    public function logout(){
        $cart= new CartHelper();
        Auth::logout();
        $cart->clear();
        return redirect()->route('index');
    }
    public function registration(Request $req ){
        $this->validate($req,[
            'name'=>'required',
            'email'=>'email|required|unique:user,email',
            'password'=>'required|min:6',
            'rePassword'=>'same:password'
        ]);
        $arr=[
            'name'=>Request()->name,
            'email'=>Request()->email,
            'password'=>Hash::make(request()->password),
            'level'=>2,
            'user_status'=>1
        ];
        User::create($arr);
        return redirect()->back()->with('success','Create success !');
    }
    public function newLetter($email){
        $newLetter= new NewLetter();
        $newLetter->storeRecord($email);
        return response()->json([
            'title'=>'success',
            'message_alert'=>'Email registration successful'
        ]);
    }
}
