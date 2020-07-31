<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountRequest;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.discountCode.index',[
            'discountCodes'=>DiscountCode::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backEnd.discountCode.add',[
            'discountCodes'=>DiscountCode::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request ,DiscountCode $discountCode)
    {
        if ($discountCode->storeRecord()) {
            return redirect()->route('discountCode.index')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscountCode  $discountCode
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountCode $discountCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiscountCode  $discountCode
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountCode $discountCode)
    {
        $dateStart=date('Y-m-d',strtotime($discountCode->date_start));
        $dateEnd=date('Y-m-d',strtotime($discountCode->date_end));
        return view('backEnd.discountCode.edit',[
            'discount'=>$discountCode,
            'dateStart'=>$dateStart,
            'dateEnd'=>$dateEnd,
            'discountCodes'=>DiscountCode::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiscountCode  $discountCode
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, DiscountCode $discountCode)
    {
        if ($discountCode->updateRecord()) {
            return redirect()->route('discountCode.index')->with('success','Update success record to database');
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscountCode  $discountCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountCode $discountCode)
    {
        if ($discountCode->delete()) {
            return redirect()->route('discountCode.index')->with('success','Delete success record to database');
        }
        return redirect()->back()->with('error','Delete not success record to database !');
    }
}
