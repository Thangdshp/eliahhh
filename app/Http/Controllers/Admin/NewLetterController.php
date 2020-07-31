<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewLetter;
use Mail;
class NewLetterController extends Controller
{
    public function index(){
        return view('backEnd.newLetter.index',['newLetters'=>NewLetter::all()]);
    }
    public function delete($id){
        $newLetter=NewLetter::find($id);
        if ($newLetter->delete()) {
            return redirect()->route('newLetter.index')->with('success','Delete success record to database');   
        }
        return redirect()->route('newLetter.index')->with('error','Delete not success record to database!');
    }
    public function getSendEmail(){
        return view('backEnd.newLetter.sendEmail');
    }
    public function sendEmail(Request $req){
        $this->validate($req,[
            'title'=>'required',
            'content'=>'required'
        ],[
            'title.required'=>'Title not empty !',
            'content.required'=>'Content not empty !'
        ]);
        if (count(NewLetter::all())>0) {
            $newL=NewLetter::all();
            foreach ($newL as $value) {
                Mail::send('email/emailAllCustomer', array('content'=>$req->content), function($message) use($value,$req){
                    $message->to($value->email, 'Visitor')->subject($req->title);
                });
            }
            return redirect()->route('newLetter.index')->with('success','Send email success record to database');   
        }
        return redirect()->route('newLetter.index')->with('success','Send email not success record to database');   

    }
}
