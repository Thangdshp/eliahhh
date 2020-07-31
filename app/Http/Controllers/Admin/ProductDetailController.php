<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductDetailRequest;

class ProductDetailController extends Controller
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
    public function createCustom(Color $color,ProductDetail $ProductDetail,Product $product,$id)
    {
        // Lay so luong ban ghi con lai co the them
        $num=count($color->all())-count($product->find($id)->productDetail);
        if ($num==count($color->all())) {
            $check=null;
        }else{
            $check=$ProductDetail->getIdColor($id);
        }
      
        return view('backEnd.productDetail.add',[
            'colors'=>$color->all(),
            'numRecord'=>$num,
            'check'=>$check,
            'product'=>$product->find($id)
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDetailRequest $request,ProductDetail $ProductDetail)
    {
        if ($ProductDetail->storeRecord()) {
            return response()->json([
                'message_alert' => 'Update success image to database',
                'title'=>'success'
            ]);
        }
        return response()->json([
            'message_alert' => 'Update not success image to database!',
            'title'=>'error'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail,Color $color)
    {
        return view('backEnd.productDetail.edit',[
            'productDetail'=>$productDetail,
            'colors'=>$color->all(),
            'check_ids'=>$productDetail->getIdProductDetail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(ProductDetailRequest $request, ProductDetail $productDetail)
    {
        if ($productDetail->updateRecord()) {
            $modal='#modalProduct_'.($productDetail->product->id);
            return redirect()->route('product.index')->with(['success'=>'Update success record to database','modals'=>$modal]);          
        }
        return redirect()->back()->with(['error'=>'Update not success record to database!','modals'=>$modal]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $productDetail)
    {
        $modal='#modalProduct_'.($productDetail->product->id);
        if (count($productDetail->productDetailImage)==0) {
            if ($productDetail->delete()) {            
                return redirect()->route('product.index')->with(['success'=>'Delete success record to database','modals'=>$modal]);          
            }
            return redirect()->back()->with(['error'=>'Delete not success record to database!','modals'=>$modal]);
        }
        return redirect()->back()->with(['error'=>'Cannot be deleted because there are child records!','modals'=>$modal]);
    }
}
