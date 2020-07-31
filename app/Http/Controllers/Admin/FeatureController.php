<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Requests\FeatureRequest;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feature $Feature)
    {
        return view('backEnd.feature.index',[
            'features'=>$Feature->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.feature.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request,Feature $Feature)
    {
        if ($Feature->storeRecord()) {
            if ($request->redirect==1) {
                return redirect()->route('feature.index')->with('success','Add success record to database');
            }
            return redirect()->route('feature.create')->with('success','Add success record to database');
        }
        return redirect()->back()->with('error','Add not success record to database !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('backEnd.feature.edit',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, Feature $feature)
    {
        if ($feature->updateRecord()) {
            return redirect()->route('feature.index')->with('success','Update success record to database');          
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        if (count($feature->product)==0) {
            if ($feature->delete()) {
                return redirect()->route('feature.index')->with('success','Delete success record to database');   
            }
        }
        return redirect()->route('feature.index')->with('error','Delete not success record to database!');
    }
}
