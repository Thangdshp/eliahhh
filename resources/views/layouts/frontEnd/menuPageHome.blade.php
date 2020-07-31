<nav id="menu-other" class="menuFix">
    <div class="container wp-container">
        <div class="row">
            <div class="col-lg-3 col-md-3 text-left">
                <a href="{{route('index')}}" class="logo-nav-black">
                    <img src="{{asset('public/frontEnd/images/logoweb2.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-5 col-md-5 text-center">
                <ul class="menu d-inline-flex menu-black">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('service')}}">Service</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 text-right">
                <ul class="list-icon-nav d-inline-flex list-icon-nav-black">
                    <li data-toggle="modal" data-target="#exampleModal">
                        <img src="{{asset('public/frontEnd/images/search-black.png')}}" alt="">
                    </li>
                    <li>
                    <a href="{{route('wishlist')}}"><img src="{{asset('public/frontEnd/images/heart-black.png')}}" alt=""></a>
                    </li>
                    <li class="position-relative cart-icon cart-icon-black">
                        <img src="{{asset('public/frontEnd/images/cart-black.png')}}" alt="">
                        <span id='quantity_full'>{{$cart->total_quantity}}</span>
                        <div class="d-none">

                        </div>
                    </li>
                    <li>
                    <span class="text-white" id="total_full">Cart :$ {{number_format($cart->total_price,2)}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>