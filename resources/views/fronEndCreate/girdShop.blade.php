@if ($productDetails!=null)
@foreach ($productDetails as $productDetail)
    <div class="col-lg-4 col-md-6 box-cslp active-block">
        <div class="thumbnail position-relative">
            <div class="img-thum position-relative set-img-shop">
                @if (count($productDetail->getImgProductDetail())>0)
                <img src="{{asset('storage/app')}}/{{($productDetail->getImgProductDetail())[0]->url_img}}" alt="error img">
                @else 
                <img src="" alt="not img db">
                @endif
                
                <ul class="content-it align-items-center">
                    <li data-toggle="tooltip" data-placement="top" title="Add To Cart"><span><i
                                class="fas fa-shopping-bag"></i></span></li>
                    <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                class="fas fa-eye" data-toggle="modal"
                                data-target="#modal-product"></i></span></li>
                    <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
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
                    <a href="{{route('product-detail')}}"> {{$productDetail->product->name}}</a>
                </div>
                <div class="price-ct clearfix">
                    @if ($productDetail->price_sale==null)
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
                @if ($productDetail->price_sale!=null)
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