<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/bootstrap-4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/owlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/owlCarousel/owl.theme.default.min.css')}}">
     {{-- Datatables Css --}}
    <link rel="stylesheet" href="public/backEnd/plugins/datatables/datatables.min.css">
       <!-- Toastr Css -->
    <link rel="stylesheet" href="{{asset('public/backEnd/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/floaty/floaty.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/reponsive.css')}}">
    <title>@yield('titleWeb')</title>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="Yz7T4cQY"></script>
<body @if (Route::is('cart'))  onload="checkNullProduct()" @endif>

@if (Route::is('index'))
    <header>
        <div class="container wp-container clearfix" style="overflow: initial">
            <div class="top-header float-left">
                <ul class="th-left d-inline-flex">
                    <li><a href="" style="padding-left: 0"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                </ul>
                <div class="th-center d-inline-block">
                    <p>Free shipping on international orders of $120+</p>
                </div>
                <ul class="th-right d-inline-flex">
                    <li>
                        <div class="thr-root-click format-money">
                            <span class="thr-text">USD</span>
                            {{-- <i class="fas fa-angle-down"></i> --}}
                        </div>
                        {{-- <ul class="thr-active">
                            <li><a href="">VNĐ</a></li>
                        </ul> --}}
                    </li>
                    <li>
                        <div class="thr-root-click lang">
                            <span class="thr-text">ENG</span>
                            {{-- <i class="fas fa-angle-down"></i> --}}
                        </div>
                        {{-- <ul class="thr-active">
                            <li><a href="">VN</a></li>
                        </ul> --}}
                    </li>
                    <li style="padding-right: 0px" id="clickSg">
                        <div class="thr-root-click">
                            <a class="thr-text" style="text-decoration: none; color:#e9e9e9">
                                @if (!Auth::check())
                                    Sign in
                                @else 
                                    Exit
                                @endif                            
                            </a>
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <ul class="thr-active">
                            @if (!Auth::check())
                            <li><a href="{{route('customer.login')}}" class="thr-text">Login</a></li>
                            @else
                            <li><a href="{{route('customer.logout')}}" class="thr-text">LogOut</a></li>
                            @endif     
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <nav class="menuFix">
        <div class="container wp-container">
            <a href="{{route('index')}}" class="logo-nav">
                <img src="{{asset('public/frontEnd/images/logoweb.png')}}" alt="">
            </a>
            <form action="" class="search-header form-inline" method="get" id="search22">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="What do you need?" id="search22Input">
                    <div class="input-group-append">
                        <button class="btn" type="submit">
                            <i class="fa fa-search text-white"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="menu d-inline-flex">
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('service')}}">Service</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('blog')}}">Blog</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
            <ul class="list-icon-nav d-inline-flex">
                <li data-toggle="modal" data-target="#exampleModal">
                    <img src="{{asset('public/frontEnd/images/search-icon.png')}}" alt="">
                    <div class="search-icon d-none">
                        <form action="">
                            <input type="text" name="search">
                        </form>
                    </div>
                </li>
                <li>
                    <a href="{{asset(route('wishlist'))}}"><img src="{{asset('public/frontEnd/images/heart-icon.png')}}"
                            alt=""></a>
                </li>
                <li class="position-relative cart-icon" onclick="clickShowCart()">

                    <img src="{{asset('public/frontEnd/images/icon-cart.png')}}" alt="">
                    <span id='quantity_full'>{{$cart->total_quantity}}</span>

                </li>
                <li>
                    <span id="total_full">Cart :$ {{number_format($cart->total_price,2)}}</span>
                </li>
            </ul>
            <div class="icon-menu-mobi justify-content-between">
                <a href="{{route('cart')}} " class="position-relative text-black">
                    <i class="fas fa-shopping-bag"></i>
                    <span id="quantity_full">0</span>
                </a>
                <div class="icon-bar">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

        </div>
    </nav>
    @else
    <div class="menu-roots">
        <header>
            <div class="container wp-container clearfix">
                <div class="top-header float-left">
                    <ul class="th-left d-inline-flex">
                        <li><a href="" style="padding-left: 0"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    </ul>
                    <div class="th-center d-inline-block">
                        <p>Free shipping on international orders of $120+</p>
                    </div>
                    <ul class="th-right d-inline-flex">
                        <li>
                            <div class="thr-root-click format-money">
                                <span class="thr-text">USD</span>
                                <i class="fas fa-angle-down"></i>
                            </div>
                            {{-- <ul class="thr-active">
                                <li><a href="">VNĐ</a></li>
                            </ul> --}}
                        </li>
                        <li>
                            {{-- <div class="thr-root-click lang">
                                <span class="thr-text">ENG</span>
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <ul class="thr-active">
                                <li><a href="">VN</a></li>
                            </ul> --}}
                        </li>
                        <li style="padding-right: 0px">
                            <div class="thr-root-click">
                                <a href="#" class="thr-text" style="text-decoration: none; color:#e9e9e9">Sign in</a>
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <ul class="thr-active">
                                <li><a href="" class="thr-text">Login</a></li>
                                <li><a href="" class="thr-text">Registration</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <nav class="menuFix">
            <div class="container wp-container">
                <a href="" class="logo-nav">
                    <img src="{{asset('public/frontEnd/images/logoweb.png')}}" alt="">
                </a>
                <form action="" class="search-header form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="What do you need?">
                        <div class="input-group-append">
                            <button class="btn" type="button">
                                <i class="fa fa-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="menu d-inline-flex">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('service')}}">Service</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                    @if (Auth::check())
                    <li><a href="{{route('customer.logout')}}">Logout</a></li>
                    @else 
                    <li><a href="{{route('customer.login')}}">Login</a></li>
                    @endif
                </ul>
                <ul class="list-icon-nav d-inline-flex">
                    <li data-toggle="modal" data-target="#exampleModal">
                        <img src="{{asset('public/frontEnd/images/search-icon.png')}}" alt="">
                        <div class="search-icon d-none">
                            <form action="">
                                <input type="text" name="search">
                            </form>
                        </div>
                    </li>
                    <li>
                        <img src="{{asset('public/frontEnd/images/heart-icon.png')}}" alt="">
                        <div class="heart-icon d-none">
                            âfafa
                        </div>
                    </li>
                    <li class="position-relative cart-icon" onclick="clickShowCart()">
                        <img src="{{asset('public/frontEnd/images/icon-cart.png')}}" alt="">
                        <span >{{$cart->total_quantity}}</span>
                        <div class="d-none">

                        </div>
                    </li>
                    <li>
                        <span >Cart :$ {{number_format($cart->total_price,2)}}</span>
                    </li>
                </ul>
                <div class="icon-menu-mobi justify-content-between">
                <a href="{{route('cart')}}" class="position-relative text-black">
                        <i class="fas fa-shopping-bag"></i>
                        <span id="quantity_full2">{{$cart->total_quantity}}</span>
                    </a>
                    <div class="icon-bar">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>

            </div>
        </nav>
    </div>
    @include('layouts.frontEnd.menuPageHome')
@endif

    @if (!Route::is('index'))
        <section class="banner-page2 text-center" @if (count($bannerW->getBannerRouteTop(Route::currentRouteName()))>0)
            style="background-image: url('storage/app/{{json_decode(($bannerW->getBannerRouteTop(Route::currentRouteName()))[0]->images)[0]}}')"     
        @else
            style="background-image: url('{{asset('public/frontEnd/images/home/banner-footer.jpg')}}');"
        @endif>
        <h1>@yield('titlePage')</h1>
        <p><a href="{{route('index')}}">Home</a>/ <span>@yield('titlePage')</span> </p>
        </section>
    @endif
    @yield('content')
  @if (!Route::is('index'))
  <section id="banner-footer">
      @if (count($bannerW->getBannerRouteBottom(Route::currentRouteName()))>0)
           @foreach (json_decode((($bannerW->getBannerRouteBottom(Route::currentRouteName())))[0]->images) as  $imgV)
            <div class="banner-footer-sp cover"style="background-image: url('storage/app/{{$imgV}}')"> 
            </div>
           @endforeach
      @else
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      <div class="banner-footer-sp cover"style="background-image: url('{{asset('public/frontEnd/images/footer-banner01.png')}}')"> 
      </div>
      @endif
   
    </section>
  @endif
    <footer>
        <div class="container wp-container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <a href="" class="logo-footer">
                            <img src="{{asset('public/frontEnd/images/logoweb.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-12 col-lg-7">
                        <form method="get" id="search" class="ng-pristine ng-valid emailLetter">
                            <div class="input-group">
                                <label for="email">Subscribe Newletter</label>
                                <input type="email" class="form-control" placeholder="Your Email" id="newEmailP" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit" >
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-3">
                        <ul class="float-right d-flex icon-footer">
                            <li>
                                <a href=""><img src="{{asset('public/frontEnd/images/fb-footer.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{{asset('public/frontEnd/images/twiter-footer.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{{asset('public/frontEnd/images/intagram-footer.png')}}"
                                        alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{{asset('public/frontEnd/images/youtube-footer.png')}}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-content">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="fc-left">
                            <h2 class="ft-title">Contact info</h2>
                            <ul class="fcl-content">
                                <li>
                                    <span>Address:</span>
                                    @if ($configInfor!=null)
                                        <p>{{$configInfor->address}}</p>
                                    @endif
                                    
                                </li>
                                <li>
                                    <span>Phone:</span>
                                     @if ($configInfor!=null)
                                        <p>{{$configInfor->phone}}</p>
                                    @endif
                                </li>
                                <li>
                                    <span>Email:</span>
                                    @if ($configInfor!=null)
                                        <p>{{$configInfor->email}}</p>
                                    @endif
                                </li>
                                <li>
                                    <span>Opentime:</span>
                                    @if ($configInfor!=null)
                                        <p>{{$configInfor->openTime}}</p>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 col-md-6">
                        <h2 class="ft-title">Account</h2>
                        <ul class="fc-centerRight fc-link flex-column">
                            <li>
                            <a href="{{route('profile.customer')}}"> My account</a>
                            </li>
                            <li>
                                <a href="{{route('wishlist')}}"> Wishlist</a>
                            </li>
                            <li>
                                <a href="{{route('cart')}}"> Cart</a>
                            </li>
                            <li>
                                <a href="{{route('shop')}}"> Shop</a>
                            </li>
                            <li>
                                <a href="{{route('checkout')}}"> Checkout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-2 col-md-6">
                        <h2 class="ft-title">Infomation</h2>
                        <ul class="fc-centerRight fc-link flex-column">
                            <li>
                                <a href="">About us</a>
                            </li>
                            <li>
                                <a href="">Careers</a>
                            </li>
                            <li>
                                <a href="">Delivery Inforamtion</a>
                            </li>
                            <li>
                                <a href="">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="">Terms & Condition</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="ft-right">
                            <h2 class="ft-title">Payment methods</h2>
                            <ul class="fc-centerRight fc-link flex-column">
                                <li>
                                    <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit gravida</P>
                                </li>
                                <li>
                                    <ul class="card-link d-inline-flex">
                                        <li>
                                            <a href=""><img src="{{asset('public/frontEnd/images/pay.png')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('public/frontEnd/images/vina.png')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('public/frontEnd/images/mater.png')}}"
                                                    alt=""></a>
                                        </li>
                                        <li>
                                            <a href=""><img src="{{asset('public/frontEnd/images/cirrus.png')}}"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container wp-container d-flex justify-content-between">
                <p class="cr-left">© Copyright 2020 Beauty</p>
                <ul class="cr-link d-inline-flex">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Site Map</a></li>
                </ul>
            </div>
        </div>
    </footer>
    {{-- Menu mobi  --}}
    <div class="mobile-nav">
        <div class="icon-close">
            <i class="fas fa-times"></i>
        </div>
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('service')}}">Service</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('shop')}}">Shop</a></li>
            <li><a href="{{route('blog')}}">Blog</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            @if (Auth::check())
            <li><a href="{{route('customer.logout')}}">Logout</a></li>
            @else 
            <li><a href="{{route('customer.login')}}">Login</a></li>
            @endif
           
            
        </ul>
    </div>
    {{-- End menu mobi  --}}

    {{-- cart  --}}
    <div class="box-cart-home clearfix">
        <div class="cart-hover draw-border " id="cart-hovers" >
            <table class="select-items">
                @if (count($cart->items)!=0)
                    <tbody style="overflow: scroll; height: 620px; display:block;" id="content_Cart_hover">
                        @foreach ($cart->items as $product)
                            <tr>
                                <td class="si-img">
                                    <img style="width:100px;height: 100px;object-fit: cover;"
                                        src="storage/app/{{$product['img']}}" alt="">
                                </td>
                                <td class="si-content">
                                    <div class="si-product">
                                        <h6>{{$product['name']}}</h6>
                                        <p>${{$product['price']}}</p>
                                        <p>Quatity: {{$product['quantity']}}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach                 
                    </tbody>
                @else
                    <tbody>
                        <tr>No product</tr>
                    </tbody>
                @endif
            </table>
            <div class="under-cart">
                <div class="select-total">
                    <span>Total:</span>
                    <span>
                        <i class="fas fa-dollar-sign"></i>
                    <span class="d-inline-block ml-1">${{$cart->total_price}}</span>
                    </span>
                </div>
                <div class="select-button">
                    <a href="{{route('cart')}}" class="btn btn-dark btn-lg">View cart</a>
                    <a href="{{route('checkout')}}" class="btn btn-danger btn-lg"> Check out</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End cart  --}}
    {{-- -------search  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="get" class="text-center" id="formSearchProducts">
                        <div class="form-group">
                            <label for="seach12" style="font-weight:bold; font-size:18px">Search Product</label>
                            <input type="text" class="form-control" id="seach12" placeholder="Nhập tên sản phẩm ?">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end search  --}}
    {{-- --modal-product --}}
    <!-- The Modal -->
    {{-- <div class="modal fade" id="modal-product">
        <div class="modal-dialog modal-xl">
            <div class="modal-content pd-55px">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block set-img"
                                            src="{{asset('public/frontEnd/images/product/demo-shop.png')}}"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block set-img"
                                            src="{{asset('public/frontEnd/images/product/demo-shop.png')}}"
                                            alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block set-img"
                                            src="{{asset('public/frontEnd/images/product/demo-shop.png')}}"
                                            alt="Third slide">
                                    </div>
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
                                    Cheek & Coutour
                                </div>
                                <h4>Velvet Melon High Intensity</h4>
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
                                    $<span>34.00</span>
                                </div>
                            </div>
                            <div class="content-modal-product">
                                <ul>
                                    <li><span>Brand:</span>Korea</li>
                                    <li><span>Product code:</span>PM 001</li>
                                </ul>
                                <div class="color-modal-product">
                                    <span>Color:</span>
                                    <div class="collect-color d-inline-block float-left">
                                        <span class="box-color" style="background-color: black"></span>
                                        <span class="box-color" style="background-color: rgb(31, 218, 87)"></span>
                                        <span class="box-color" style="background-color: red"></span>
                                    </div>
                                </div>
                                <div class="tool-list-product">
                                    <ul class="content-list">
                                        <li data-toggle="tooltip" data-placement="top" title="Add To Cart"
                                            class="btn-cart-adds">
                                            <div class="btn-carts">
                                                <span><i class="fas fa-shopping-bag"></i></span>
                                                <p> Add To Cart</p>
                                            </div>
                                        </li>
                                        <li data-toggle="tooltip" data-placement="top" title="View Product"><span><i
                                                    class="fas fa-eye"></i></span></li>
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
    </div> --}}
    <div id="show_product_content">
        
    </div>

    {{-- end-modal product  --}}
  
 @if (Auth::check())
      {{-- CON LOANG QUOANG  --}}

<div class="box_controll">
    <div class="sticky-ball">
        <div class="fas fa2 o"><i class="far fa-circle k"></i></div>  
        <a href="{{route('index')}}" class="tog ball1 display"><i class="fas fa-home view"></i></a>  
        <a href="{{route('customer.logout')}}" class="tog ball2 display"><i class="fas fa-sign-in-alt view"></i></a>
        <a href="{{route('cart')}}" class="tog ball3 display"><i class="fas fa-shopping-cart view"></i></a>  
        <a href="{{route('profile.customer')}}" class="tog ball4 display"><i class="fas fa-user view"></i></a>    
        {{-- <a href="" class="tog ball4 display"><i class="fas fa-sign-out-alt view"></i></a>   --}}
        <a href="#top" class="tog ball5 display"><i class="fas fa-angle-double-up view"></i></a>        
    </div>
</div>

 @endif
 
</body>
<script src="{{asset('public/frontEnd/Js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('public/frontEnd/Js/popper.min.js')}}"></script>
<script src="{{asset('public/frontEnd/bootstrap-4.4.1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontEnd/owlCarousel/owl.carousel.js')}}"></script>
{{-- --binh luan fb  --}}
<!-- DataTable SCRIPTS -->
<script src="public/backEnd/plugins/datatables/datatables.min.js"></script>
{{-- Js Goi cua datatable --}}
<script>$('#myTable').DataTable();</script>
  <!-- Toastr SCRIPTS -->
<script src="{{asset('public/backEnd/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('public/frontEnd/Js/myJs.js')}}"></script>
@if (Session::has('success'))
    <script>
        Command: toastr["success"]("{{Session::get('success')}}")
    </script>
@endif
@if (Session::has('error'))
    <script>
        Command: toastr["error"]("{{Session::get('error')}}")
    </script>
@endif
<script>
    toastr.options = 
{
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
</script>
@yield('script_cus')
<script src="{{asset('public/frontEnd/Js/ajax.js')}}"></script>
@if ($configEffect!=null)
    <script>
        {!!$configEffect->content!!}
    </script>
     <script type="text/javascript">
        $.snowfall.start({
            content: '<i class="fas fa-snowflake"></i>',
            size: {
                min: 20,
                max: 50
            }
        });
    </script>
@endif
@if (!Route::is('shop'))
    <script>
        $("#formSearchProducts").submit(function(event) {

            //prevent Default functionality
            event.preventDefault();
            searchName= $('#seach12').val();
            window.location.href  = "shop/null/null/null/"+searchName+"/null";

        });
    </script>
    <script>
        $("#search22").submit(function(event) {

            //prevent Default functionality
            event.preventDefault();
            searchName= $('#search22Input').val();
            window.location.href  = "shop/null/null/null/"+searchName+"/null";

        });
    </script>
     {{-- <script>
        $("#search22").submit(function(event) {

            //prevent Default functionality
            event.preventDefault();
            searchName= $('#search22Input').val();
            window.location.href  = "shop/null/null/null/"+searchName+"/null";

        });
    </script> --}}
@endif
<script>
   function clickShow(id){
    showProduct(id);
   }
</script>


</html>