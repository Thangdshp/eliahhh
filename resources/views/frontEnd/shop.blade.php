@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Shop")
@section('titlePage','Shop')
@section('content')
<section class="wp-box">
    <div class="wp-container container">
        <div class="row">
            <div class="col-lg-3 sidebarLeft">
                <div class="box-sl">
                    <div class="title-boxsl">
                        <h3>Categories</h3>
                        <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
                    </div>
                    <ul class="content-boxsl">
                        <li><a href="{{route('shop')}}">All</a></li>
                       @foreach ($categories as $category)
                            <li><a href="{{route('shop',[$category->slug,$searchFeature,$searchPrice,$nameProduct,$searchOrder])}}">{{$category->name}}</a></li>
                       @endforeach
                    </ul>
                </div>
                <div class="box-sl">
                    <div class="title-boxsl">
                        <h3>Refine Search</h3>
                        <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
                    </div>
                    <p>Feature</p>
                    <ul class="content-boxsl">
                        <li class="d-none">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="customCheck_159" name="example1"
                                    checked>
                                <label class="custom-control-label" for="customCheck_159">Dry skin</label>
                            </div>
                        </li>
                        @foreach ($features as $feature)
                            <li>
                                <a href="{{route('shop',[$searchCategory,$feature->name,$searchPrice,$nameProduct,$searchOrder])}}">
                                    {{$feature->name}}
                                </a>
                            </li>
                        @endforeach                 
                    </ul>
                </div>
                <div class="box-sl">
                    <div class="title-boxsl">
                        <h3>Price</h3>
                        <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
                    </div>
                    <ul class="content-boxsl">
                        <li class="d-none">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="customCheck_151" name="example11"
                                    checked>
                                <label class="custom-control-label" for="customCheck_151">$0.00 - $25.00</label>
                            </div>
                        </li>
                        @foreach ($priceSpaces as $priceSpace)
                            <li>
                                <a href="{{route('shop',[$searchCategory,$searchFeature,$priceSpace->id,$nameProduct,$searchOrder])}}">
                                    ${{number_format($priceSpace->start_price,2)}} - ${{number_format($priceSpace->end_price,2)}}
                                </a>
                            </li>
                        @endforeach                   
                    </ul>
                </div>
                <div class="box-sl">
                    <div class="set-img">
                        <img src="{{asset('public/frontEnd/images/sale75.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="header-list-shop">
                    <div class="icon-change-layout d-inline-block ">
                        <div class="icl-th d-inline-block icl-activer">
                            <i class="fas fa-th"></i>
                        </div>
                        <div class="icl-bar d-inline-block" id="list_product_shows">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                    <div class="btn-filter">
                        <span><i class="fas fa-filter"></i></span>
                        Filter
                    </div>
                    <form class="fiters-hls">
                        <select name="" id="select-hls" class="custom-select">
                            <option value="null" @if ($searchOrder=='null')
                            selected
                            @endif>Deflault Sorting</option>
                            <option value="1" @if ($searchOrder=='1')
                            selected
                            @endif>Z-A</option>
                            <option value="0" @if ($searchOrder=='0')
                            selected
                            @endif>A-Z</option>
                        </select>
                    </form>
                </div>
                <div class="row content-shop-list-product" id="content_show_product">
                    {{-- box product  --}}
                   @if ($productDetails!=null)
                    
                            @foreach ($productDetails as $productDetail)
                                <div class="col-lg-4 col-md-6 box-cslp active-block">
                                    <div class="thumbnail position-relative">
                                        <div class="img-thum position-relative set-img-shop">
                                            @if (count($productDetail->getImgProductDetail())>0)
                                            <img src="{{asset('storage/app')}}/{{($productDetail->getImgProductDetail())[0]->url_img}}" alt="error img">
                                            @else 
                                            <img src="/storage/app/public/fontEnd/imgBlack.jpg" alt="not img db">
                                            @endif
                                            
                                            <ul class="content-it align-items-center">
                                                <li data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addCart({{$productDetail->id}})"><span><i
                                                            class="fas fa-shopping-bag"></i></span></li>
                                                <li data-toggle="tooltip" data-placement="top" title="View Product" onclick="clickShow({{$productDetail->id}})"><span><i
                                                            class="fas fa-eye"></i></span></li>
                                                <li data-toggle="tooltip" data-placement="top" title="Add To Heart" onclick="clickWhishlist({{$productDetail->id}})"><span><i
                                                            class="fas fa-heart"></i></span></li>

                                            </ul>
                                        </div>
                                        <div class="content-thum">
                                            <div class="top-ct d-flex justify-content-between">
                                                <div class="tct-left d-inline-block">
                                                    {{$productDetail->product->brand->name}}
                                                </div>
                                                <div class="tct-rank d-inline-block">
                                                    <ul class="d-flex">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="title-ct">
                                                <a href="{{route('product-detail',[$productDetail->product->slug,$productDetail->id])}}"> {{$productDetail->product->name}}</a>
                                            </div>
                                            <div class="price-ct clearfix">
                                                @if ($productDetail->price_sale==null || $productDetail->price_sale==$productDetail->price)
                                                {{number_format($productDetail->price,2)}} $
                                                @else
                                                {{number_format($productDetail->price_sale,2)}}  $ 
                                                <span>{{number_format($productDetail->price,2)}}  $ </span>
                                                @endif
                                                @if ($productDetail->color_id!=null)
                                                    <div class="collect-color d-inline-block float-right">
                                                        <span class="box-color" style="background-color: {{$productDetail->color->color_code}}"></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="lable-thumbail">
                                            @if ($productDetail->price_sale!=null && $productDetail->price_sale!=$productDetail->price)
                                                <span class="label-thum bg-red">
                                                    -{{number_format(((100-(($productDetail->price_sale)/($productDetail->price))*100)), 0)}}%
                                                </span>
                                            @endif
                                            @if ($productDetail->product->active_new==1)
                                                <span class="label-thum bg-blue">
                                                    New
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @else 
                    <h2>No products...</h2>
                   @endif
                    {{-- end box product --}}

                    {{-- List product  --}}
                   @if ($productDetails!=null)
                        @foreach ($productDetails as $productDetail)
                            <div class="col-md-12 list-cslp">
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <a href="{{route('product-detail',[$productDetail->product->slug,$productDetail->id])}}" class="img-list-cslp position-relative">
                                            @if (count($productDetail->getImgProductDetail())>0)
                                            <img src="{{asset('storage/app')}}/{{($productDetail->getImgProductDetail())[0]->url_img}}" alt="error img">
                                            @else 
                                            <img src="" alt="not img db">
                                            @endif
                                        </a>
                                        <div class="lable-thumbail">
                                            @if ($productDetail->price_sale!=null && $productDetail->price_sale!=$productDetail->price)
                                                <span class="label-thum bg-red">
                                                    -{{number_format(((100-(($productDetail->price_sale)/($productDetail->price))*100)), 0)}}%
                                                </span>
                                            @endif
                                            @if ($productDetail->product->active_new==1)
                                                <span class="label-thum bg-blue">
                                                    New
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content-thum border-bottom">
                                            <div class="top-ct d-flex justify-content-between">
                                                <div class="tct-left d-inline-block">
                                                    {{$productDetail->product->brand->name}}
                                                </div>
                                                <div class="tct-rank d-inline-block">
                                                    <ul class="d-flex">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="title-ct">
                                                <a href="{{route('product-detail',[$productDetail->product->slug,$productDetail->id])}}"> {{$productDetail->product->name}}</a>
                                            </div>
                                            <div class="price-ct clearfix">
                                                @if ($productDetail->price_sale==null || $productDetail->price_sale!=$productDetail->price)
                                                {{number_format($productDetail->price,2)}} $
                                                @else
                                                {{number_format($productDetail->price_sale,2)}}  $ 
                                                <span>{{number_format($productDetail->price,2)}}  $ </span>
                                                @endif
                                                @if ($productDetail->color_id!=null)
                                                    <div class="collect-color d-inline-block float-right">
                                                        <span class="box-color" style="background-color: {{$productDetail->color->color_code}}"></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="list-cslp-content pt-2">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident rem ut.
                                                Sit voluptatibus cupiditate eos.</p>
                                            <div class="tool-list-product">
                                                <ul class="content-list">
                                                    <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds" onclick="addCart({{$productDetail->id}})">
                                                        <div class="btn-carts">
                                                            <span><i class="fas fa-shopping-bag"></i></span>
                                                            <p> Add To Cart</p>
                                                        </div>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                                class="fas fa-eye" data-toggle="modal"
                                                                data-target="#modal-product"></i></span></li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                                class="fas fa-heart"></i></span></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    {{-- @else 
                    <h2>No Product..</h2> --}}
                   @endif
                    {{-- <div class="col-md-12 list-cslp">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <a href="" class="img-list-cslp position-relative">
                                    <img src="{{asset('public/frontEnd/images/product/demo-pro.jpg')}}" alt="">
                                </a>
                                <div class="lable-thumbail">
                                    <span class="label-thum bg-red">
                                        -35%
                                    </span>
                                    <span class="label-thum bg-blue">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="content-thum border-bottom">
                                    <div class="top-ct d-flex justify-content-between">
                                        <div class="tct-left d-inline-block">
                                            Eyes
                                        </div>
                                        <div class="tct-rank d-inline-block">
                                            <ul class="d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="title-ct">
                                        <a href="">The expect mascaraa</a>
                                    </div>
                                    <div class="price-ct">
                                        $21.00 <span>$49.00</span>
                                        <div class="collect-color d-inline-block float-right">
                                            <span class="box-color" style="background-color: black"></span>
                                            <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                            <span class="box-color" style="background-color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-cslp-content pt-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident rem ut.
                                        Sit voluptatibus cupiditate eos.</p>
                                    <div class="tool-list-product">
                                        <ul class="content-list">
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds">
                                                <div class="btn-carts">
                                                    <span><i class="fas fa-shopping-bag"></i></span>
                                                    <p> Add To Cart</p>
                                                </div>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                        class="fas fa-eye" data-toggle="modal"
                                                        data-target="#modal-product"></i></span></li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                        class="fas fa-heart"></i></span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 list-cslp">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <a href="" class="img-list-cslp position-relative">
                                    <img src="{{asset('public/frontEnd/images/product/demo-pro5.jpg')}}" alt="">
                                </a>
                                <div class="lable-thumbail">
                                    <span class="label-thum bg-red">
                                        -35%
                                    </span>
                                    <span class="label-thum bg-blue">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="content-thum border-bottom">
                                    <div class="top-ct d-flex justify-content-between">
                                        <div class="tct-left d-inline-block">
                                            Eyes
                                        </div>
                                        <div class="tct-rank d-inline-block">
                                            <ul class="d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="title-ct">
                                        <a href="">The expect mascaraa</a>
                                    </div>
                                    <div class="price-ct">
                                        $21.00 <span>$49.00</span>
                                        <div class="collect-color d-inline-block float-right">
                                            <span class="box-color" style="background-color: black"></span>
                                            <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                            <span class="box-color" style="background-color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-cslp-content pt-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident rem ut.
                                        Sit voluptatibus cupiditate eos.</p>
                                    <div class="tool-list-product">
                                        <ul class="content-list">
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds">
                                                <div class="btn-carts">
                                                    <span><i class="fas fa-shopping-bag"></i></span>
                                                    <p> Add To Cart</p>
                                                </div>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                        class="fas fa-eye" data-toggle="modal"
                                                        data-target="#modal-product"></i></span></li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                        class="fas fa-heart"></i></span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 list-cslp">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <a href="" class="img-list-cslp position-relative">
                                    <img src="{{asset('public/frontEnd/images/product/demo-pro2.jpg')}}" alt="">
                                </a>
                                <div class="lable-thumbail">
                                    <span class="label-thum bg-red">
                                        -35%
                                    </span>
                                    <span class="label-thum bg-blue">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="content-thum border-bottom">
                                    <div class="top-ct d-flex justify-content-between">
                                        <div class="tct-left d-inline-block">
                                            Eyes
                                        </div>
                                        <div class="tct-rank d-inline-block">
                                            <ul class="d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="title-ct">
                                        <a href="">The expect mascaraa</a>
                                    </div>
                                    <div class="price-ct">
                                        $21.00 <span>$49.00</span>
                                        <div class="collect-color d-inline-block float-right">
                                            <span class="box-color" style="background-color: black"></span>
                                            <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                            <span class="box-color" style="background-color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-cslp-content pt-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident rem ut.
                                        Sit voluptatibus cupiditate eos.</p>
                                    <div class="tool-list-product">
                                        <ul class="content-list">
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds">
                                                <div class="btn-carts">
                                                    <span><i class="fas fa-shopping-bag"></i></span>
                                                    <p> Add To Cart</p>
                                                </div>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                        class="fas fa-eye" data-toggle="modal"
                                                        data-target="#modal-product"></i></span></li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                        class="fas fa-heart"></i></span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 list-cslp">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <a href="" class="img-list-cslp position-relative">
                                    <img src="{{asset('public/frontEnd/images/product/demo-pro3.jpg')}}" alt="">
                                </a>
                                <div class="lable-thumbail">
                                    <span class="label-thum bg-red">
                                        -35%
                                    </span>
                                    <span class="label-thum bg-blue">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="content-thum border-bottom">
                                    <div class="top-ct d-flex justify-content-between">
                                        <div class="tct-left d-inline-block">
                                            Eyes
                                        </div>
                                        <div class="tct-rank d-inline-block">
                                            <ul class="d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="title-ct">
                                        <a href="">The expect mascaraa</a>
                                    </div>
                                    <div class="price-ct">
                                        $21.00 <span>$49.00</span>
                                        <div class="collect-color d-inline-block float-right">
                                            <span class="box-color" style="background-color: black"></span>
                                            <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                            <span class="box-color" style="background-color: red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-cslp-content pt-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum provident rem ut.
                                        Sit voluptatibus cupiditate eos.</p>
                                    <div class="tool-list-product">
                                        <ul class="content-list">
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds">
                                                <div class="btn-carts">
                                                    <span><i class="fas fa-shopping-bag"></i></span>
                                                    <p> Add To Cart</p>
                                                </div>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                        class="fas fa-eye" data-toggle="modal"
                                                        data-target="#modal-product"></i></span></li>
                                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                        class="fas fa-heart"></i></span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                        {{-- End list product  --}}
                </div>
                @if ($productDetails!=null)
                    {{-- {{$productDetails->links()}} --}}
                    <div class="pagination_default">
                        {{-- <div class="content-pagination">
                            <a class="pag d-none"><i class="fas fa-angle-left"></i></a>
                            <a href="" class="pag pag-active">1</a>
                            <a href="" class="pag">2</a>
                            <a href="" class="pag">3</a>
                            <a href="" class="pag">3</a>
                            <a class="pag"><i class="fas fa-angle-right"></i></a>
                        </div> --}}
                        {{$productDetails->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="filter-mobi">
    <form class="content-filter-mobi" id="fillterProductMobi">
        <div class="text-center">
            <h3 class="text-center">Fillter Product</h3>
            <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
        </div>
        <div class="form-group">
            <label for="cateM">Categories</label>
            <select class="form-control" id="cateM">
                    <option value="null">Select Categories</option>
                @foreach ($categories as $category)
                <option value="{{$category->slug}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="featureM">Refine Search</label>
            <select class="form-control" id="featureM">
                <option value="null">Select Refine Search</option>
                @foreach ($features as $feature)
                <option value="{{$feature->name}}">{{$feature->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="priceM">Price</label>
            <select class="form-control" id="priceM">
                <option value="null">Select Price</option>
                @foreach ($priceSpaces as $priceSpace)
                <option value="{{$priceSpace->id}}"> ${{number_format($priceSpace->start_price,2)}} - ${{number_format($priceSpace->end_price,2)}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn-cfm bcfm-exit">Exit</button>
            <button type="button" class="btn-cfm" onclick="clickMobiFillter()">Apply</button>
        </div>
    </form>
</div>
@endsection
@section('script_cus')
    <script>
        $(document).ready(function(){
           $('.fillter_shop').each(function (index, element) {
                event.preventDefault();
                console.log(element);     
           });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#select-hls').change(function(event)
            {
                $orderBy= $('#select-hls').val();
                window.location.href  = "shop/{{$searchCategory}}/{{$searchFeature}}/{{$searchPrice}}/{{$nameProduct}}/"+$orderBy;
            });
        });
    </script>
    @if (Route::is('shop'))
    <script>
        $("#formSearchProducts").submit(function(event) {

            //prevent Default functionality
            event.preventDefault();
            searchName= $('#seach12').val();
            window.location.href  = "shop/{{$searchCategory}}/{{$searchFeature}}/{{$searchPrice}}/"+searchName+"/{{$searchOrder}}";

        });
    </script>
   
@endif
@endsection