<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideshows=Slideshow::orderBy('position','ASC')->get();
        return view('backEnd.slideshow.index',compact('slideshows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.slideshow.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Slideshow $slideshow)
    {
        $this->validate($request,[
            'titleSmall'=>'required',
            'title'=>'required',
            'link'=>'required',
            'position'=>'required',
            'url_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:25048',
        ]);
        if ($slideshow->storeRecord()) {
            return redirect()->route('slideshow.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(Slideshow $slideshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Slideshow $slideshow)
    {
        return view('backEnd.slideshow.edit',compact('slideshow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slideshow $slideshow)
    {
        $this->validate($request,[
            'titleSmall'=>'required',
            'title'=>'required',
            'link'=>'required',
            'position'=>'required',
            'url_img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:25048',
        ]);
        if ($slideshow->updateRecord()) {
            return redirect()->route('slideshow.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slideshow $slideshow)
    {
        //
    }
}
