<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $Brand)
    {
        return view('backEnd.brand.index',[
            'brands'=>$Brand->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, Brand $Brand)
    {
        if ($Brand->storeRecord()) {
            if ($request->redirect==1) {
                return redirect()->route('brand.index')->with('success','Add success record to database');
            }
            return redirect()->route('brand.create')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backEnd.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        if ($brand->updateRecord()) {
            return redirect()->route('brand.index')->with('success','Update success record to database');          
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (count($brand->product)==0) {
            if ($brand->delete()) {
                return redirect()->route('brand.index')->with('success','Delete success record to database');   
            }
        }
        return redirect()->route('brand.index')->with('error','Delete not success record to database!');
    }
}
