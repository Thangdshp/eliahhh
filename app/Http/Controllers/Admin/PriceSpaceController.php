<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceSpace;
use Illuminate\Http\Request;
use App\Http\Requests\PriceSpaceRequest;

class PriceSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PriceSpace $PriceSpace)
    {
        return view('backEnd.priceSpace.index',[
            'priceSpaces'=>$PriceSpace->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PriceSpace $PriceSpace)
    {
        return view('backEnd.priceSpace.add',[
            'priceSpaces'=>$PriceSpace->getData()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceSpaceRequest $request,PriceSpace $PriceSpace)
    {
        if ($PriceSpace->storeRecord()) {
            if ($request->redirect==1) {
                return redirect()->route('priceSpace.index')->with('success','Add success record to database');
            }
            return redirect()->route('priceSpace.create')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceSpace  $priceSpace
     * @return \Illuminate\Http\Response
     */
    public function show(PriceSpace $priceSpace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceSpace  $priceSpace
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceSpace $priceSpace)
    {
        $priceSpaces =PriceSpace::all();
        return view('backEnd.priceSpace.edit',compact('priceSpace','priceSpaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceSpace  $priceSpace
     * @return \Illuminate\Http\Response
     */
    public function update(PriceSpaceRequest $request, PriceSpace $priceSpace)
    {
        if ($priceSpace->updateRecord()) {
            return redirect()->route('priceSpace.index')->with('success','Update success record to database');          
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceSpace  $priceSpace
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceSpace $priceSpace)
    {
        //
    }
}
