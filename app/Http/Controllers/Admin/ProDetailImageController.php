<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetailImage;
use Illuminate\Http\Request;
use App\Http\Requests\ImgProRequest;

class ProDetailImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDetailImage  $productDetailImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetailImage $productDetailImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetailImage  $productDetailImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetailImage $productDetailImage)
    {
        return view('backEnd.proImg.edit',[
            'productDetailImage'=>$productDetailImage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetailImage  $productDetailImage
     * @return \Illuminate\Http\Response
     */
    public function update(ImgProRequest $request, ProductDetailImage $productDetailImage)
    {
        if ($productDetailImage->updateRecord()){
            $modals='#modalProduct_'.($productDetailImage->productDetail->product->id);
            $modal_show='#modalImg_'.($productDetailImage->productDetail->product->id);
            return redirect()->route('product.index')->with(['success'=>'Update success record to database','modals'=>$modals,'modal_show'=>$modal_show]);          
        }
        return redirect()->back()->with(['error'=>'Update not success record to database!','modals'=>$modal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDetailImage  $productDetailImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetailImage $productDetailImage)
    { 
        $modals='#modalProduct_'.($productDetailImage->productDetail->product->id);
        $modal_show='#modalImg_'.($productDetailImage->productDetail->product->id);
        if ($productDetailImage->delete()) {
            return redirect()->route('product.index')->with(['success'=>'Delete success record to database','modals'=>$modals,'modal_show'=>$modal_show]);
        }
        return redirect()->route('product.index')->with(['error'=>'Delete not success record to database!','modals'=>$modals,'modal_show'=>$modal_show]);
    }
}
