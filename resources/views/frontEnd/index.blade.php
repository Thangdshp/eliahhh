@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Eliah")
@section('content')
<section id="banner" class="owl-carousel owl-theme">
    @if (count($slideshows)>0)
    @foreach ($slideshows as $slideshow)
        <div class="buh-item cover" style="background-image: url('storage/app/{{$slideshow->url_img}}')">
            <div class="container wp-container">
                <div class="col-sm-12 col-lg-7" style="padding:0">
                    <span class="owl-slide-animated">{{$slideshow->titleSmall}}</span>
                    <h1 class="owl-slide-animated">{{$slideshow->title}}</h1>
                <a href="{{$slideshow->link}}" class="btn owl-slide-animated">Buy Now</a>
                </div>
            </div>
        </div>
    @endforeach
    @else 
    <div class="buh-item cover" style="background-image: url('{{asset('public/frontEnd/images/banner.jpg')}}')">
        <div class="container wp-container">
            <div class="col-sm-12 col-lg-7" style="padding:0">
                <span class="owl-slide-animated">We make best makeup</span>
                <h1 class="owl-slide-animated">Beauty salon</h1>
                <a href="" class="btn owl-slide-animated">Appointment</a>
            </div>
        </div>
    </div>
    <div class="buh-item cover" style="background-image: url('{{asset('public/frontEnd/images/banner.jpg')}}')">
        <div class="container wp-container">
            <div class="col-sm-12 col-lg-7" style="padding:0">
                <span class="owl-slide-animated">We make best makeup</span>
                <h1 class="owl-slide-animated">Beauty salon</h1>
                <a href="" class="btn owl-slide-animated">Appointment</a>
            </div>
        </div>
    </div>
    @endif
    
</section>
<section class="about-home">
    <div class="container wp-container">
        <div class="row">
            <div class="col-12 col-lg-6 text-right d-none d-lg-block">
                {{-- <div class="img-home-about">
                    <img src="{{asset('public/frontEnd/images/home/about-home.png')}}" alt="">
            </div> --}}
            <div class="box-img-home-about">
                <div class="box-igabout-first">
                    <img src="{{asset('public/frontEnd/images/home/img1.png')}}" alt="">
                </div>
                <div class="box-igabout-second">
                    <img src="{{asset('public/frontEnd/images/home/img2.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 text-left">
            <div class="content-home-about">
                <p>About <span>Eliah</span></p>
                <h1>When You Look good, you feel good</h1>
                <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
                <p class="text-cha">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe nulla, magnam
                    delectus velit
                    dolorum optio aperiam cumque libero soluta quas harum est alias doloremque nobis deserunt
                    commodi cum perferendis repellat!</p>
                <a href="{{route('errorPage')}}" class="btn-cha">Appointment</a>
            </div>
        </div>
    </div>
    </div>
    <div class="wp-ah position-relative">
        <div class="wp-container container">
            <div class="list-serive-home">
                <div>
                    <ul>
                        <li><a href="{{route('errorPage')}}"><span>01.</span>Body treatment</a></li>
                        <li><a href="{{route('errorPage')}}"><span>02.</span>Professinal makeup</a></li>
                        <li><a href="{{route('errorPage')}}"><span>03.</span>Maincure & pedicure</a></li>
                        <li><a href="{{route('errorPage')}}"><span>04.</span>Hair cut & Coloring</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="avtar-video" data-toggle="modal" data-target="#exampleModalvideo">
            <img src="{{asset('public/frontEnd/images/home/about.png')}}" alt="">
            <span><i class="fas fa-play"></i></span>
        </div>
    </div>
</section>
{{-- -------------------- --}}
<div class="beaty-product wp-box">
    <div class="bp-title text-center">
        <h1>Beauty Products</h1>
        <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
    </div>
    <div class="owl-bp">
        <div class="wp-container container">
            <div class="owl-carousel owl-theme">
                @foreach ($products as $product)
                    <div class="thumbnail position-relative">
                        <div class="img-thum position-relative">
                            <img src="{{asset('storage/app')}}/{{($product->getImgProductDetail())[0]->url_img}}" alt="">
                            <ul class="content-it align-items-center">
                                <li data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addCart({{$product->id}})"><span><i
                                            class="fas fa-shopping-bag"></i></span></li>
                                <li data-toggle="tooltip" data-placement="top" title="View Product" onclick="clickShow({{$product->id}})"><span><i
                                            class="fas fa-eye" ></i></span>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                            class="fas fa-heart"></i></span></li>

                            </ul>
                        </div>
                        <div class="content-thum">
                            <div class="top-ct d-flex justify-content-between">
                                <div class="tct-left d-inline-block">
                                    {{$product->product->brand->name}}
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
                                <a href="">{{$product->product->name}}</a>
                            </div>
                            <div class="price-ct clearfix">
                                @if ($product->price_sale==null || $product->price_sale==$product->price)
                                    {{number_format($product->price,2)}} $
                                @else
                                {{number_format($product->price_sale,2)}}  $ 
                                <span>{{number_format($product->price,2)}}  $ </span>
                                @endif
                                @if ($product->color_id!=null)
                                    <div class="collect-color d-inline-block float-right">
                                        <span class="box-color" style="background-color: {{$product->color->color_code}}"></span>
                                    </div>
                                @endif
                            </div>              
                        </div>
                        <div class="lable-thumbail">
                            @if ($product->price_sale!=null && $product->price_sale!=$product->price)
                                <span class="label-thum bg-red">
                                    -{{number_format(((100-(($product->price_sale)/($product->price))*100)), 0)}}%
                                </span>
                            @endif
                            @if ($product->product->active_new==1)
                                <span class="label-thum bg-blue">
                                    New
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            
                {{-- <div class="thumbnail position-relative">
                    <div class="img-thum position-relative">
                        <img src="{{asset('public/frontEnd/images/product/demo-pro7.jpg')}}" alt="">
                        <ul class="content-it align-items-center">
                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart"><span><i
                                        class="fas fa-shopping-bag"></i></span></li>
                            <li data-toggle="tooltip modal" data-placement="top" title="View Product"><span><i
                                        class="fas fa-eye" data-toggle="modal" data-target="#modal-product"></i></span>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                        class="fas fa-heart"></i></span></li>

                        </ul>
                    </div>
                    <div class="content-thum">
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
                        </div>
                    </div>
                    <div class="lable-thumbail">
                        <span class="label-thum bg-red">
                            -35%
                        </span>
                        <span class="label-thum bg-blue">
                            New
                        </span>
                    </div>
                </div>
                <div class="thumbnail position-relative">
                    <div class="img-thum position-relative">
                        <img src="{{asset('public/frontEnd/images/product/demo-pro6.jpg')}}" alt="">
                        <ul class="content-it align-items-center">
                            <li data-toggle="tooltip" data-placement="top" title="Add To Cart"><span><i
                                        class="fas fa-shopping-bag"></i></span></li>
                            <li data-toggle="tooltip modal" data-placement="top" title="View Product"><span><i
                                        class="fas fa-eye" data-toggle="modal" data-target="#modal-product"></i></span>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="Add To Heart"><span><i
                                        class="fas fa-heart"></i></span></li>

                        </ul>
                    </div>
                    <div class="content-thum">
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
                            <a href=""> The expect mascaraa</a>
                        </div>
                        <div class="price-ct clearfix">
                            $21.00 <span>$49.00</span>
                            <div class="collect-color d-inline-block float-right">
                                <span class="box-color" style="background-color: black"></span>
                                <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                <span class="box-color" style="background-color: red"></span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="text-center">
    <a href="{{route('shop')}}" class="more-product">View all products</a>
    </div>
</div>
{{-- End beaty-product  --}}
<div class="say-people wp-box">
    <div class="wp-container container">
        <div class="bp-title text-center">
            <p class="font-weight-bold text-uppercase">Testiminial</p>
            <h1>What People Say ?</h1>
            <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
        </div>
        <div class="content-sp">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="row">
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/avatarH/1.png')}}" alt=""
                                class="fixImg"></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/avatarH/2.png')}}" alt=""
                            class="fixImg"></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/avatarH/3.png')}}" alt=""
                            class="fixImg"></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/avatarH/4.png')}}" alt=""
                            class="fixImg"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3"><img src="public/frontEnd/images/avatarH/5.png" alt=""
                            class="fixImg"></div>
                    <div class="col-md-3"><img src="public/frontEnd/images/avatarH/6.png" alt=""
                            class="fixImg"></div>
                    <div class="col-md-3"><img src="public/frontEnd/images/avatarH/7.png" alt=""
                            class="fixImg"></div>
                    <div class="col-md-3"><img src="public/frontEnd/images/avatarH/8.png" alt=""
                            class="fixImg"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div id="owl-text">
                        <div class="otm owl-carousel owl-theme">
                            @if (count($comments)>0)
                                @foreach ($comments as $comment)
                                    <div class="owlt-content">
                                        <div class="header-owltc d-flex justify-content-between">
                                            <div class="header-owltc-title d-flex justify-content-between">
                                                <span><img src="{{asset('public/frontEnd/images/dauphay.png')}}" alt=""></span>
                                                <div>
                                                    <p>{{$comment->user->name}}</p>
                                                    <span>{{$comment->user->address}}</span>
                                                </div>
        
                                            </div>
                                            <div>
                                                <div class="tct-rank d-inline-block">
                                                    <ul class="d-flex">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-otm">{{$comment->content}}</p>
                                    </div>
                                @endforeach
                            @endif
                            
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
            </div>
        </div>
    </div>
</div>
<div class="wp-box">
    <div class="container wp-conatainer">
        <div class="bp-title text-center">
            <h1>Professional team</h1>
            <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
        </div>
        <div class="row">
            <div class="col-lg-4 col-12 mb-2 col-md-6">
                <div class="thumbnail box-shadow box-team-pfnal">
                    <div class="img-thum">
                        <img src="public/frontEnd/images/avatarH/ava1.png" alt=""
                            >
                    </div>
                    <div class="content-thum text-center team-pfnal">
                        <h4>Danielle Welling</h4>
                        <span>Nail master</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, quae!</p>
                        <ul class="th-left d-inline-flex text-center reset-margin">
                            <li><a href="" class="text-black" style="padding-left: 0;"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-2 col-md-6">
                <div class="thumbnail box-shadow box-team-pfnal">
                    <div class="img-thum">
                        <img src="public/frontEnd/images/avatarH/ava2.png" alt="">
                    </div>
                    <div class="content-thum text-center team-pfnal">
                        <h4>Danielle Welling</h4>
                        <span>Nail master</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, quae!</p>
                        <ul class="th-left d-inline-flex text-center reset-margin">
                            <li><a href="" class="text-black" style="padding-left: 0;"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-2 col-md-6">
                <div class="thumbnail box-shadow box-team-pfnal">
                    <div class="img-thum">
                        <img src="public/frontEnd/images/avatarH/ava3.png" alt="">
                    </div>
                    <div class="content-thum text-center team-pfnal">
                        <h4>Danielle Welling</h4>
                        <span>Nail master</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, quae!</p>
                        <ul class="th-left d-inline-flex text-center reset-margin">
                            <li><a href="" class="text-black" style="padding-left: 0;"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="" class="text-black"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wp-box cover" style="background-image: url('{{asset('public/frontEnd/images/home/banner-footer.jpg')}}')">
    <div class="container wp-container text-center">
        <div class="form-service">
            <div class="bp-title text-center">
                <h1>Advisory Service</h1>
                <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
            </div>
            <form action="{{route('sendService')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter phone" name='phone'>
                </div>
                <div class="form-group">
                    <select class="form-control" name="service">
                        @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-default">Appoitment</button>
            </form>
        </div>
    </div>
</div>

{{-- Video modal  --}}
<div class="modal fade" id="exampleModalvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalvideo"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <video width="100%" height="auto" controls>
                    <source src="{{asset('public/frontEnd/images/video/video.mov')}}" type="video/mp4">
                </video>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- End video modal  --}}

@endsection