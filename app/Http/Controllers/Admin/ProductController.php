<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Feature;
use Illuminate\Http\Request;
use  App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product,Color $color)
    {
        return view('backEnd.product.index',[
            'products'=>$product->all(),
            'color'=>$color->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category,Brand $brand,Color $color,Feature $feature)
    {
        return view('backEnd.product.add',[
            'categoies'=>$category->all(),
            'brands'=>$brand->all(),
            'colors'=>$color->all(),
            'features'=>$feature->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request,Product $product)
    {
      if ($product->storeRecord()) {
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Category $category,Brand $brand,Color $color,Feature $feature)
    {
        return view('backEnd.product.edit',[
            'product'=>$product,
            'categoies'=>$category->all(),
            'brands'=>$brand->all(),
            'colors'=>$color->all(),
            'features'=>$feature->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($product->updateRecord()) {
            return redirect()->route('product.index')->with('success','Update success record to database');          
        }
        return redirect()->back()->with('error','Update not success record to database !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (count($product->productDetail)==0) {
            if ($product->delete()) {            
                return redirect()->route('product.index')->with(['success'=>'Delete success record to database']);          
            }
            return redirect()->back()->with(['error'=>'Delete not success record to database!']);
        }
        return redirect()->back()->with(['error'=>'Cannot be deleted because there are child records!']);
    }
}
