<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Route;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::orderBy('page', 'desc')->get();
        return view('backEnd.banner.index',[
            'banners'=>$banner
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Banner $banner)
    {
        $this->validate($request,[
            'page'=>'required|unique:banner,page',
            'imageBottom'=>'required',
            'imageTop'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:25048',
            'imageBottom.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:25048',
        ]);
        if ($banner->storeRecord()) {
            return redirect()->route('banner.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $check=count(json_decode($banner->images));
        return view('backEnd.banner.edit',compact('banner','check'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request,[
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:25048',
            'imageBottom.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:25048',
        ]);
        if ($banner->updateRecord()) {
            return redirect()->route('banner.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
      
        if ($banner->delete()) {
            foreach (json_decode($banner->images) as  $img) {
                Storage::delete($img);
            }
            return redirect()->route('banner.index')->with('success','Delete success record to database');
        }
        return redirect()->back()->with('error','Delete not success record to database !');

    }
    public function getImg($id){
        $bannerF=Banner::find($id);
        $view = view("backEndCreate.modalShowImgBanner",compact('bannerF'))->render();
        return response()->json(['html'=>$view]);
    }
}
