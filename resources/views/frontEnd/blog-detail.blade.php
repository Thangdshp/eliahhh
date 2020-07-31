@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Blog-Detail")
@section('titlePage','Blog Detail')
@section('content')
<section id="blog-detail" class="wp-box">
    <div class="wp-container container">
        <div class="row">
            <div class="col-lg-4 order-2 order-lg-1">
                <div class="left-blog">
                    {{-- <form class="search-blog" method="get">
                        <input type="text" placeholder="Enter keyword..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form> --}}
                    <div class="flow-me-blog border-bottom">
                        <h3 class="title-left-blog">Follow me</h3>
                        <ul class="reset-margin">
                            <li><a href="" class="text-black"><span><i class="fab fa-facebook-f"></i></span></a></li>
                            <li><a href="" class="text-black"><span><i class="fab fa-twitter"></i></span></a></li>
                            <li><a href="" class="text-black"><span><i class="fab fa-instagram"></i></span></a></li>
                            <li><a href="" class="text-black"><span><i class="fab fa-youtube"></i></span></a></li>
                        </ul>
                    </div>
                    <div class="category-blog border-bottom">
                        <h3 class="title-left-blog">Category</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="">
                                        <div class="title-cate-blog">
                                            {{$category->name}}
                                        </div>
                                        <div class="number-cate-blog">
                                            {{count($category->blog)}}
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="popular-post border-bottom">
                        <h3 class="title-left-blog">Old post</h3>
                        <div class="row">
                            @foreach ($blogOlds as $blogOld)
                                <div class="col-12 col-md-6 col-lg-12">
                                    <a href="{{route('blog-detail',$blogOld->id)}}" class="item-cpps">
                                        <div class="img-cpp">
                                            <img src="storage/app/{{$blogOld->url_img}}" alt="">
                                        </div>
                                        <div class="content-item-cpp">
                                            <h4>{{$blogOld->title_blog}}</h4>
                                            <p>13 Now 2020</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="new-letter">
                            <h3 class="title-left-blog">Newsletter</h3>
                            <p>Subscribe to our newsletter a nd get our newest updates right on your</p>
                            <form action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Email....">
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="">I agree to the terms &
                                        conditions
                                    </label>
                                </div>
                                <div class="form-check-inline mt-3">
                                    <button type="submit" class="btn-custom-black">Subscribe</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-1 order-lg-2">
                <div class="right-blog">
                    <div class="row">
                        <div class="col-6 mb-3 col-md-3">
                            <div class="btn-filter">
                                <span><i class="fas fa-filter"></i></span>
                                Filter
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="box-content-post-blog">
                                <div class="content-post-right-blogs">
                                    <div class="text-thumb-cpr"> <span>05 <br> Feb</span></div>
                                    <div class="cpr-blog-top">
                                        <div class="right-cpr-blog-top">
                                            <div class="author-post-top">
                                                <span>by</span>
                                                {{$blog->user->name}}
                                                <span>/</span>
                                                <span class="active-post">{{$blog->categoryBlog->name}}</span>
                                            </div>
                                            <h3 class="title-post-right">
                                                {{$blog->title_blog}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-text-blog-detail">
                    <div class="content_blog_nd" style="overflow: hidden">
                        {!! $blog->content !!}
                    </div>
                    <div class="tag-share mt-5">
                        <div class="btn-share">
                            <span>Share</span>
                            <ul>
                                <li><a href="" class="text-black"><span><i class="fab fa-facebook-f"></i></span></a>
                                </li>
                                <li><a href="" class="text-black"><span><i class="fab fa-twitter"></i></span></a></li>
                                <li><a href="" class="text-black"><span><i class="fab fa-instagram"></i></span></a></li>
                                <li><a href="" class="text-black"><span><i class="fab fa-youtube"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <form action="" class="form-blog-detail">
                        <h3>Leave a comment</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          
                            <textarea class="form-control" rows="5" id="comment" >comment:</textarea>
                        </div>
                        <div class="button-fld">
                            <button type="submit">Submit commit</button>
                        </div>
                    </form> --}}
                    <div class="fb-comments" data-href="http://localhost/Eliah_Pro/blog-detail" data-numposts="5" data-width=""></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="filter-mobi">
    <form class="content-filter-mobi">
        <div class="text-center">
            <h3 class="text-center">Fillter Post</h3>
            <img src="{{asset('public/frontEnd/images/song.png')}}" alt="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Categories</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Select Categories</option>
                <option>Spa</option>
                <option>Beauty</option>
                <option>Make up</option>
                <option>Skincare</option>
                <option>Body care</option>
                <option>Tools</option>
            </select>
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn-cfm bcfm-exit">Exit</button>
            <button type="sumbit" class="btn-cfm">Apply</button>
        </div>
    </form>
</div>
@endsection