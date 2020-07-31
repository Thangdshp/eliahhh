<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('frontEnd.forgotPasswordIndex');
    }
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user==null) {
            return redirect()->back()->with('error','Email not exits!');
        }
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ],[
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
        return redirect()->route('customer.login')->with('success','We have e-mailed your password reset link!');
    }
    public function resetIndex(Request $request, $token){
        return view('frontEnd.resetPassword',[
            'token'=> $token
        ]);
    }

    public function reset(Request $request)
    {
        $this->validate($request,[
            'password'=>'required',
            'Re_password'=>'same:password'
        ],[
            'password.required'=>'Password not empty!',
            'Re_password.same'=>'Password incorrect!'
        ]);
        $token= request()->token;
        $passwordReset = PasswordReset::where('token', $token)->first();
        if ($passwordReset==null) {
            return redirect()->route('customer.login')->with('error','Request reset password not exits!');
        }
        if (!Carbon::parse($passwordReset->updated_at)->addMinutes(5)->isPast()) {
            $passwordReset->delete();
        }else{
            return redirect()->route('customer.login')->with('error','The link has expired!');
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $passArr=[
            'password'=>Hash::make(request()->password)
        ];
        $updatePasswordUser = $user->update($passArr);
        $passwordReset->delete();
        return redirect()->route('customer.login')->with('success','Oke!');
    }
}
