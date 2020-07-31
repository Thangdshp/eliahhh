<div class="modal fade" id="modal_product_{{$productDetail->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pd-55px">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $i=0; ?>
                                @foreach ($imgDetails as $imgDetail)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" <?php if($i==0){ echo ' class="active" '; } ?>></li>
                                     <?php $i=9; ?>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <?php $i=0; ?>
                               @foreach ($imgDetails as $imgDetail)
                                    <div class="carousel-item <?php if($i==0){ echo ' active'; } ?> ">
                                        <img class="d-block set-img"
                                        src="storage/app/{{$imgDetail->url_img}}"
                                        alt="First slide" style="height: 500px; width:500px; object-fit: cover">
                                    </div>
                                    <?php $i=9; ?>
                               @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="title-modal-product border-bottom">
                            <div class="label-tmp">
                                {{$product->feature->name}}
                            </div>
                            <h4>{{$product->name}}</h4>
                            <div class="infor-basic">
                                <div class="tct-rank d-inline-block">
                                    <ul class="d-flex">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                </div>
                                <span>/</span>
                                <div class="number-reviews">
                                    03 reviews
                                </div>
                            </div>
                            <div class="price-product-tmp">
                                $<span>{{number_format($productDetail->price_sale,2)}}</span>
                            </div>
                        </div>
                        <div class="content-modal-product">
                            <ul>
                                <li><span>Brand:</span>{{$product->brand->name}}</li>
                                <li><span>Product code:</span>PM {{$product->id}}</li>
                            </ul>
                            <div class="color-modal-product">
                                <span>Color:</span>
                                @if ($productDetail->color!=null)
                                    <div class="collect-color d-inline-block float-left">
                                        <span class="box-color" style="background-color: {{$productDetail->color->color_code}}"></span>
                                    </div>
                                @else
                                <div class="collect-color d-inline-block float-left">
                                    <span>No color</span>
                                </div>
                                @endif
                              
                            </div>
                            <div class="tool-list-product">
                                <ul class="content-list">
                                    <li data-toggle="tooltip" data-placement="top" title="Add To Cart"
                                        class="btn-cart-adds" onclick="addCart({{$productDetail->id}})">
                                        <div class="btn-carts">
                                            <span><i class="fas fa-shopping-bag"></i></span>
                                            <p> Add To Cart</p>
                                        </div>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                                class="fas fa-heart"></i></span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>