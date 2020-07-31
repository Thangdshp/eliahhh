<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use Session;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Color $Color)
    {
        return view('backEnd.color.index',[
            'colors'=>$Color->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.color.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request,Color $Color)
    {
        if ($Color->storeRecord()) {
            if ($request->redirect==1) {
                return redirect()->route('color.index')->with('success','Add success record to database');
            }
            return redirect()->route('color.create')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('backEnd.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, Color $color)
    {
        if ($color->updateRecord()) {
            return redirect()->route('color.index')->with('success','Update success record to database');          
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if (count($color->productDetail)==0) {
            if ($color->delete()) {
                return redirect()->route('color.index')->with('success','Delete success record to database');   
            }
        }
        return redirect()->route('color.index')->with('error','Delete not success record to database!');
    }
}
