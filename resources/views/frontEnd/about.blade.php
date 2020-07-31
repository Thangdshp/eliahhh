@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"About")
@section('titlePage','About')
@section('content')
<section class="about-home">
    <div class="container wp-container">
        <div class="row">
            <div class="col-12 col-lg-6 text-right">
                <div class="d-block d-lg-none img-reps">
                    <img src="{{asset('public/frontEnd/images/home-about2.jpg')}}" alt="">
            </div>
            <div class="box-img-home-about  d-none d-lg-block">
                <div class="box-igabout-first">
                    <img src="{{asset('public/frontEnd/images/home-about2.jpg')}}" alt="">
                </div>
                <div class="box-igabout-second">
                    <img src="{{asset('public/frontEnd/images/home-about.jpg')}}" alt="">
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
            <div class="list-serive-home about-page-list">
                <div>
                    <ul>
                        <li>
                            <div class="year-title">
                                2006
                            </div>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </li>
                        <li>
                            <div class="year-title">
                                2010
                            </div>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </li>
                        <li>
                            <div class="year-title">
                                2014
                            </div>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </li>
                        <li>
                            <div class="year-title">
                                2020
                            </div>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="avtar-video" data-toggle="modal" data-target="#exampleModalvideo">
            <img src="{{asset('public/frontEnd/images/img-movi.jpg')}}" alt="">
            <span><i class="fas fa-play"></i></span>
        </div>
    </div>
</section>
<div class="say-people wp-box" style="background:#fff">
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
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                        <div class="col-md-3"><img src="{{asset('public/frontEnd/images/face/home-face-1.png')}}"
                                alt=""></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div id="owl-text">
                        <div class="otm owl-carousel owl-theme">
                            <div class="owlt-content">
                                <div class="header-owltc d-flex justify-content-between">
                                    <div class="header-owltc-title d-flex justify-content-between">
                                        <span><img src="{{asset('public/frontEnd/images/dauphay.png')}}" alt=""></span>
                                        <div>
                                            <p>Alexander Ball</p>
                                            <span>New York</span>
                                        </div>

                                    </div>
                                    <div>
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
                                </div>
                                <p class="text-otm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum
                                    quae magnam eos
                                    neque
                                    natus odio, cupiditate incidunt odit dignissimos ad quos autem temporibus quidem
                                    quas.
                                    Atque a repellendus quaerat pariatur.</p>
                            </div>
                            <div class="owlt-content">
                                <div class="header-owltc d-flex justify-content-between">
                                    <div class="header-owltc-title d-flex justify-content-between">
                                        <span><img src="{{asset('public/frontEnd/images/dauphay.png')}}" alt=""></span>
                                        <div>
                                            <p>Alexander Ball</p>
                                            <span>London</span>
                                        </div>

                                    </div>
                                    <div>
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
                                </div>
                                <p class="text-otm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum
                                    quae magnam eos
                                    neque
                                    natus odio, cupiditate incidunt odit dignissimos ad quos autem temporibus quidem
                                    quas.
                                    Atque a repellendus quaerat pariatur.</p>
                            </div>
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
<div class="d-block d-lg-none text-center mb-5">
    <a href="" class="btn btn-danger">All NEW ITEMS</a>
</div>
<section class="logo-brand-footer">
    <div class="logob-f d-none d-md-block">
        <div class="wp-container container position-relative">
            <div class="owl-carousel owl-theme">
                <img src="{{asset('public/frontEnd/images/logo-banrd/logo1.png')}}" alt="" class="logob-f-img">
                <img src="{{asset('public/frontEnd/images/logo-banrd/logo2.png')}}" alt="" class="logob-f-img">
                <img src="{{asset('public/frontEnd/images/logo-banrd/logo3.png')}}" alt="" class="logob-f-img">
                <img src="{{asset('public/frontEnd/images/logo-banrd/logo4.png')}}" alt="" class="logob-f-img">
            </div>
            <div class="btn-controller-left-lf position-absolute d-none d-lg-block">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="btn-controller-right-lf position-absolute d-none d-lg-block">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class="box-new-about-item">

        <h2>New items are released weekly.</h2>
        <a href="{{route('errorPage')}}">All new items</a>

    </div>
    <div class="list-sale">
        <div class="wp-container container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="box-list-sale">
                        <div class="box-img-sale">
                            <img src="{{asset('public/frontEnd/images/oto.png')}}" alt="">
                        </div>
                        <div class="content-list-sale">
                            <h3>Free Shipping</h3>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="box-list-sale">
                        <div class="box-img-sale">
                            <img src="{{asset('public/frontEnd/images/qua.png')}}" alt="">
                        </div>
                        <div class="content-list-sale">
                            <h3>Free Shipping</h3>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="box-list-sale">
                        <div class="box-img-sale">
                            <img src="{{asset('public/frontEnd/images/taighe.png')}}" alt="">
                        </div>
                        <div class="content-list-sale">
                            <h3>Free Shipping</h3>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="box-list-sale">
                        <div class="box-img-sale">
                            <img src="{{asset('public/frontEnd/images/the.png')}}" alt="">
                        </div>
                        <div class="content-list-sale">
                            <h3>Free Shipping</h3>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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