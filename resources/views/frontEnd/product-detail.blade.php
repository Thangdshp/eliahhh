@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Product-detail")
@section('titlePage','Product')
@section('content')
<section id="product-detail">
    <div class="wp-container container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-choosed">
                    <img src="storage/app/{{$imgDetail->url_img}}" alt="" class="set-img-choosed">
                </div>
                <div id="img-choose">
                    <div class="owl-carousel owl-theme">
                        @foreach ($productDetailAll as $productItem)
                            @foreach ($productItem->productDetailImage as $img)
                                <div class="item-imgs">
                                    <img src="storage/app/{{$img->url_img}}" alt="" class="item-img-choose">
                                </div>
                            @endforeach
                        @endforeach                       
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="title-modal-product border-bottom">
                    <div class="label-tmp">
                        {{$productDetail->product->feature->name}}
                    </div>
                     <h4>{{$productDetail->product->name}}</h4>
                    <div class="infor-basic">
                        <div class="tct-rank d-inline-block">
                            <ul class="d-flex">
                                @for ($i = 1; $i <= 5; $i++)
                                   @if ($avgRank>=$i)
                                        <li><i class="fas fa-star"></i></li>
                                   @else
                                        <li><i class="far fa-star"></i></li>
                                   @endif
                                   
                                @endfor
                                
                            </ul>
                        </div>
                        <span>/</span>
                        <div class="number-reviews">
                            @if($numComment!=0) {{$numComment}} @else 0 @endif reviews
                        </div>
                        <span>/</span>
                        @if (Auth::check())
                            <a  class="create-review" style="cursor: pointer" data-toggle="modal" data-target="#form">
                                Write a review
                            </a>
                        @else
                        <a href="{{Route('customer.login')}}">Log in and buy to review</a>
                        @endif
                    </div>
                    <div class="price-product-tmp">
                        $<span id="price_product_detail">{{number_format($productDetail->price_sale,2)}}</span>
                    </div>
                </div>
            <input type="hidden" value="{{$productDetail->id}}" id="id_product_buy">
                <div class="content-modal-product">
                    <ul>
                        <li><span>Brand:</span>{{$productDetail->product->brand->name}}</li>
                        <li><span>Product code:</span>PM {{$productDetail->id}}</li>
                    </ul>
                    <div class="color-modal-product">
                        <span>Color:</span>
                        @if ($productDetail->color_id!=null)
                            <div class="collect-color d-inline-block float-left">
                                @foreach ($productDetailAll as $productColor)
                                
                                <label for="check{{$productColor->id}}" class="box-color boxClick  @if($productColor->color_id==$productDetail->color_id) box-hover-choose     @else box-color-opa  @endif " style="background-color: {{$productColor->color->color_code}}; margin-bottom:0px !important; cursor: pointer;" onclick="clickColor(this)"></label>
                                <input type="radio" name="color" value="{{$productColor->id}}" id="check{{$productColor->id}}" class="d-none color_product"  @if($productColor->color_id==$productDetail->color_id) checked @endif>
                                @endforeach
                                
                            </div>
                        @else
                        <div class="collect-color d-inline-block float-left">
                           <span>No color</span>
                            
                        </div>
                        @endif
                    </div>
                    <div class="tool-list-product d-flex border-bottom">
                        <div class="qty-block">
                            <div class="qty_inc_dec dec">
                                <i class="fas fa-minus"></i>
                            </div>
                            <div class="qty">
                                <input type="text" name="qty"  value="1" title="" class="input-text" id="number-quan" />
                            </div>
                            <div class="qty_inc_dec add">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <ul class="content-list">
                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn-cart-adds">
                                <div class="btn-carts" id="btn_buy_product">
                                    <span><i class="fas fa-shopping-bag"></i></span>
                                    <p> Add To Cart</p>
                                </div>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="View Product" onclick="clickShow({{$productDetail->id}})"><span><i
                                        class="fas fa-eye"></i></span></li>
                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart" onclick="clickWhishlist({{$productDetail->id}})"><span><i
                                        class="fas fa-heart"></i></span></li>

                        </ul>
                    </div>
                    <div class="content-product-details">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                            </li>
                           @if ($numComment!=0)
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Reviews (  @if($numComment!=0) {{$numComment}} @else 0 @endif)</a>
                                </li>
                           @endif

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab"><span class="text_format">
                                {!! $productDetail->product->description !!}</span>
                                <span class="d-inline-block btn btn-success mt-2"  onclick="showDesciption({{$productDetail->id}})">More</span>
                            </div>
                          @if ($numComment!=0) 
                                
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div id="owl-text">
                                        <div class="otm owl-carousel owl-theme">
                                            @foreach ($comments as $comment)
                                                @if ($comment->comment_status==1)
                                                    <div class="owlt-content">
                                                        <div class="header-owltc d-flex justify-content-between">
                                                            <div class="header-owltc-title d-flex justify-content-between">
                                                                <span><img src="{{asset('public/frontEnd/images/dauphay.png')}}"
                                                                        alt=""></span>
                                                                <div>
                                                                    <p>{{$comment->user->name}}</p>
                                                                    <span>{{$comment->user->address}}</span>
                                                                </div>
            
                                                            </div>
                                                            <div>
                                                                <div class="tct-rank d-inline-block">
                                                                    <ul class="d-flex">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($comment->user->getRank($productDetail->id)>=$i)
                                                                                <li><i class="fas fa-star"></i></li>
                                                                            @else
                                                                                <li><i class="far fa-star"></i></li>
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <p class="text-otm">{{$comment->content}}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="controller-owlt d-flex">
                                            <div class="btn-left btn-colt">
                                                <i class="fas fa-angle-left"></i>
                                                <span>PRev</span>
                                            </div>
                                            <div class="btn-right btn-colt">
                                                <span>next</span>
                                                <i class="fas fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @if (Auth::check())
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    {{-- <div class="text-right cross"> <i class="fa fa-times mr-2"></i> </div> --}}
                    <div class="card-body text-center"> <img src=" https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                        <div class="comment-box text-center">
                            <h4>Add a review</h4>
                            <div class="rating"> 
                                <input type="radio" name="rating" value="5" id="rati5" class="rating_item"><label for="rati5">☆</label> 
                                <input type="radio" name="rating" value="4" id="rati4" class="rating_item"><label for="rati4">☆</label> 
                                <input type="radio" name="rating" value="3" id="rati3" class="rating_item"><label for="rati3">☆</label> 
                                <input type="radio" name="rating" value="2" id="rati2" class="rating_item"><label for="rati2">☆</label> 
                                <input type="radio" name="rating" value="1" id="rati1" class="rating_item"><label for="rati1">☆</label> 
                            </div>
                            <div class="comment-area"> <textarea class="form-control" placeholder="what is your view?" rows="4" id="content_reivew_post"></textarea> </div>
                            <div class="text-center mt-4" onclick="submitReview({{$productDetail->id}})"> <button class="btn btn-success send px-5">Send message <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   @endif
</section>
<div class="product-related-product">
    <div class="beaty-product wp-box">
        <div class="bp-title text-center">
            <h1>Beauty Products</h1>
            <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
        </div>
        <div class="owl-bp">
            <div class="wp-container container">
                <div class="owl-carousel owl-theme">
                    @foreach ($products as $productI)
                        @foreach ($productI->productDetail as $productItem)
                            <div class="thumbnail position-relative">
                                <div class="img-thum position-relative set-img-shop">
                                    @if (count($productItem->getImgProductDetail())>0)
                                    <img src="{{asset('storage/app')}}/{{($productItem->getImgProductDetail())[0]->url_img}}" alt="error img">
                                    @else 
                                    <img src="/storage/app/public/fontEnd/imgBlack.jpg" alt="not img db">
                                    @endif
                                    
                                    <ul class="content-it align-items-center">
                                        <li data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addCart({{$productItem->id}})"><span><i
                                                    class="fas fa-shopping-bag"></i></span></li>
                                        <li data-toggle="tooltip" data-placement="top" title="View Product" onclick="clickShow({{$productItem->id}})"><span><i
                                                    class="fas fa-eye"></i></span></li>
                                        <li data-toggle="tooltip" data-placement="top" title="Add To Heart" onclick="clickWhishlist({{$productItem->id}})"><span><i
                                                    class="fas fa-heart"></i></span></li>

                                    </ul>
                                </div>
                                <div class="content-thum">
                                    <div class="top-ct d-flex justify-content-between">
                                        <div class="tct-left d-inline-block">
                                            {{$productItem->product->brand->name}}
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
                                        <a href="{{route('product-detail',[$productItem->product->slug,$productItem->id])}}"> {{$productItem->product->name}}</a>
                                    </div>
                                    <div class="price-ct clearfix">
                                        @if ($productItem->price_sale==null || $productItem->price_sale==$productItem->price)
                                        {{number_format($productItem->price,2)}} $
                                        @else
                                        {{number_format($productItem->price_sale,2)}}  $ 
                                        <span>{{number_format($productItem->price,2)}}  $ </span>
                                        @endif
                                        @if ($productItem->color_id!=null)
                                            <div class="collect-color d-inline-block float-right">
                                                <span class="box-color" style="background-color: {{$productItem->color->color_code}}"></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="lable-thumbail">
                                    @if ($productItem->price_sale!=null && $productItem->price_sale!=$productItem->price)
                                        <span class="label-thum bg-red">
                                            -{{number_format(((100-(($productItem->price_sale)/($productItem->price))*100)), 0)}}%
                                        </span>
                                    @endif
                                    @if ($productItem->product->active_new==1)
                                        <span class="label-thum bg-blue">
                                            New
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach                 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection