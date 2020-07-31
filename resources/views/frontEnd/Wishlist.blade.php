@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Wishlist")
@section('titlePage','Wishlist')
@section('content')
<div class="wp-box">
    <div class="wp-container container">
        <div class="row">
            <div class="t_cartmain col-md-12">
                <div class="table-responsive">
                    <table class="table t_viewtable cols-6">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="content_wishlist">
                            @if (count($wishs)!=0)
                                @foreach ($wishs as $wish)
                                    <tr id="item_wishlis_{{$wish->id}}" class="item_wis">
                                        <td scope="row" data-label="Product" class="t_cartimg">
                                            <img style="width:100px;height: 100px;object-fit: cover;"
                                        src="storage/app/{{$wish->getImg[0]->url_img}}" alt="">
                                        </td>
                                        <td>
                                            <p>{{$wish->productDetail->product->brand->name}}</p>
                                            <h6>{{$wish->productDetail->product->name}}</h6>
                                        </td>
                                        <td data-label="Unit Price"> 
                                            <h6>${{number_format($wish->productDetail->price_sale,2)}}</h6>
                                        </td>
                                        <td data-label="Stock">
                                            <p>In stock</p>
                                        </td>
                                        <td>
                                            <button  class="t_buttonaddcart" onclick="clickAddCartfrom_WishList({{$wish->productDetail->id}},{{$wish->id}})">ADD TO CART</button>
                                        </td>
                                        <td>
                                            <a style="cursor: pointer">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach   
                            @else 
                                <tr>
                                    <td>No product..</td>
                                </tr>
                            @endif
                                                
                        </tbody>
                    </table>
                   
                        <a href="{{route('shop')}}" class="btn btn-success"  id="nextShop_wishlist" @if (count($wishs)==0) style="display: inline-block" @else style="display: none"  @endif >Shop</a>     
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection