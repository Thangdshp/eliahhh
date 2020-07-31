<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('backEnd.user.index',[
            'users'=>$user->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request,User $user)
    {
       if ($user->storeRecord()){
          return redirect()->route('user.index')->with('success','Add success record to database');
       }
       return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backEnd.user.edit',compact($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($user->updateRecord()==1){
            return redirect()->route('user.profile')->with('success','Update success record to database');
        }elseif($user->updateRecord()==3)
        {
            return redirect()->back()->with('error','Old password is wrong!');
        }      
        return redirect()->back()->with('error','Update not success record to database!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id==Auth::user()->id) {
            return redirect()->back()->with('error','Delete not success record to database!');
        }
       if (Auth::user()->level==0) {
            if ($user->delete()) {
                return redirect()->back()->with('success','Delete success record to database');
            }
            return redirect()->back()->with('error','Delete not success record to database!');
       }
       return redirect()->back()->with('error','You do not have permission to delete!');
    }

    public function updateStatus(User $user){
        $userFind=$user->find(request()->id);
        if (Auth::user()->level!=0) {
            return redirect()->back()->with('error','Update not success record to database');
        }
        if ($userFind->id==Auth::user()->id) {
            return redirect()->back()->with('error','Update not success record to database');
        }
        if ($user->UpdateStatus()) {
            return redirect()->route('user.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database');
    }

    public function profile(User $user)
    {
        return view('backEnd.user.profile');
    }
    public function updateImage(Request $request,User $user)
    {
        if ($user->UpdateImage()) {
            return response()->json([
                'message_alert' => 'Update success image to database',
                'title'=>'success'
            ]);
        }
        return response()->json([
            'message_alert' => 'Update not success image to database',
            'title'=>'error'
        ]);
    }
}
