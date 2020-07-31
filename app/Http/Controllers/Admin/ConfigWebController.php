<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConfigPage;

class ConfigWebController extends Controller
{
    public function index(){
        $configPages=ConfigPage::all();
        return view('backEnd.configPage.index',compact('configPages'));
    }
    public function addI(Request $req){
        return view('backEnd.configPage.info');
    }
    public function inforPost(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'openTime'=>'required',
        ]);
        $configPage= new ConfigPage();   
        if ($configPage->addInfor()) {
            return redirect()->route('configPage.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }
    public function editEffect($id){
        $configPage= ConfigPage::find($id);
        return view('backEnd.configPage.editEffect',compact('configPage'));
    }
    public function updateInfo(Request $req,$id){
        $this->validate($req,[
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'openTime'=>'required',
        ]);
        $configPage= ConfigPage::find($id);
        if ($configPage->updateInfor()) {
            return redirect()->route('configPage.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database !');

    }
  
    public function addE(Request $req){
        return view('backEnd.configPage.effect');
    }
    public function effectPost(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'content'=>'required',
        ]);
        $configPage= new ConfigPage();   
        if ($configPage->addEvent()) {
            return redirect()->route('configPage.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }
    public function editInfo($id){
        $configPage= ConfigPage::find($id);
        return view('backEnd.configPage.editInfo',compact('configPage'));
    }
    public function updateEffect(Request $req,$id){
        $this->validate($req,[
            'name'=>'required',
            'content'=>'required',
        ]);
        $configPage= ConfigPage::find($id);
        if ($configPage->updateEvent()) {
            return redirect()->route('configPage.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database !');

    }
    public function delete($id){
        $configPage= ConfigPage::find($id);
        if ($configPage->delete()) {
            return redirect()->route('configPage.index')->with('success','Delete success record to database');
        }
        return redirect()->back()->with('error','Delete not success record to database !');
    }
}
