@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Services")
@section('titlePage','Services')
@section('content')
<style>
    #banner-footer{
        display: none !important;
    }
</style>
<section class="container wp-box">
    @for ($i = 0; $i < count($serviceshows); $i++)
    @if ($serviceshows[$i]!=null)
        <div class="row">
            <div class="col-lg-6">
                <div class="service img-service">
                    <div class="first-img img">
                    <img src="storage/app/{{json_decode($serviceshows[$i]->imgs)[0]}}" alt="">
                    </div>
                    <div class="second-img img">
                        <img src="storage/app/{{json_decode($serviceshows[$i]->imgs)[1]}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service content-service">
                    <div class="num-service">
                        <span>{{$i+1}}.</span>
                        <img src="{{asset('public/frontEnd/images/song2.png')}}" alt="">
                    </div>
                    <div class="title-list-service">
                        {{$serviceshows[$i]->title}}
                    </div>
                    <p>
                        {!!$serviceshows[$i]->content!!}
                    </p>
                    <ul>
                        @foreach (json_decode($serviceshows[$i]->checkList) as $item)
                            <li><span><i class="fas fa-check"></i></span>{{$item}}</li>
                        @endforeach
                    </ul>
                    {{-- <div class="text-left">
                        <a href="{{route('errorPage')}}" class="btn-more-service">Read More</a>
                    </div> --}}
                </div>
            </div>
        </div>
    @endif
       
        @if ($serviceshows[$i+1]!=null)
            <?php $i=$i+1; ?>
            @if ($i<count($serviceshows)-1)
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="service content-service text-right service-reverse">
                            <div class="num-service">
                                <img src="{{asset('public/frontEnd/images/song2.png')}}" alt="">
                                <span>{{$i+1}}</span>
                            </div>
                            <div class="title-list-service">
                                Body treatment
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique officia pariatur aperiam asperiores porro laborum? At quaerat omnis perspiciatis, ullam obcaecati quisquam sapiente facilis nulla, iure rerum ratione porro illo!</p>
                            <ul>
                                @foreach (json_decode($serviceshows[$i]->checkList) as $item)
                                <li>{{$item}}<span><i class="fas fa-check"></i></span></li>
                                @endforeach
                            </ul>
                            {{-- <div class="float-right">
                                <a href="{{route('errorPage')}}" class="btn-more-service">Read More</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="service img-service text-left service-reverse">
                            <div class="first-img img">
                                @if ($serviceshows[$i+1]!=null)
                                    <img src="storage/app/{{json_decode($serviceshows[$i+1]->imgs)[0]}}" alt="">
                                @else
                                    <img src="storage/app/" alt="errro">
                                @endif
                            
                            </div>
                            <div class="second-img img">
                                @if ($serviceshows[$i+1]!=null)
                                    <img src="storage/app/{{json_decode($serviceshows[$i+1]->imgs)[1]}}" alt="">
                                @else
                                    <img src="storage/app/" alt="errro">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else 
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="service content-service text-right service-reverse">
                        <div class="num-service">
                            <img src="{{asset('public/frontEnd/images/song2.png')}}" alt="">
                            <span>{{$i+1}}</span>
                        </div>
                        <div class="title-list-service">
                            Body treatment
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique officia pariatur aperiam asperiores porro laborum? At quaerat omnis perspiciatis, ullam obcaecati quisquam sapiente facilis nulla, iure rerum ratione porro illo!</p>
                        <ul>
                            @foreach (json_decode($serviceshows[$i]->checkList) as $item)
                            <li>{{$item}}<span><i class="fas fa-check"></i></span></li>
                            @endforeach
                        </ul>
                        {{-- <div class="float-right">
                            <a href="{{route('errorPage')}}" class="btn-more-service">Read More</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="service img-service text-left service-reverse">
                        <div class="first-img img">
                        
                                <img src="storage/app/{{json_decode($serviceshows[$i]->imgs)[0]}}" alt="">
                           
                        
                        </div>
                        <div class="second-img img">
                          
                                <img src="storage/app/{{json_decode($serviceshows[$i]->imgs)[1]}}" alt="">
                        
                      
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif
    @endfor
    {{$serviceshows->links()}}
</section>

<div class="wp-box cover"
    style="background-image: url('{{asset('public/frontEnd/images/home/banner-footer.jpg')}}')">
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
@endsection