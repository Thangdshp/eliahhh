@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Eliah")
@section('titlePage','Checkout')
@section('content')
<div class="wp-container container" id="t_checkout">
    <form action="{{route('cart.createOrder')}}" method="POST">
        @csrf
    <div class="row">
        <div class="checkoutleft col-lg-8">
            <div class="checkoutcnt">
                <h4>Contact information</h4>
            </div>
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="t_checkout_info">
                <div class="form-group">
                      @error('phone')
                        <label for="inputError" style="color:red !important;" ><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Phone</label>
                      @enderror
                    <input type="text" class="form-control" id="exampleInputEmail12" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone number " name="phone">
                </div>
            </div>
            <div class="t_allcntcl">
                <h4>Shipping address</h4>
                <div class="row">
                    <div class="t_checkout_firstname col-md-12">
                        <div class="form-group">
                            @error('name')
                                <label style="color:red !important;" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else
                                <label for="">Name <span>*</span></label>
                            @enderror
                            <input type="text" class="form-control" id="exampleInputEmail12" name="name" value="{{Auth::user()->name}}" placeholder="Enter Country " >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="t_checkout_address">
                            <div class="form-group">
                                @error('address')
                                <label style="color:red !important;" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                              @else
                                <label for="" >Address <span>*</span></label>
                              @enderror
                                
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" value="{{Auth::user()->address}}" name="address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkoutright col-lg-4 ">
            <h4>Your order</h4>
            <hr>
            <p class="t_crcnt">
                <h6>Product</h6>
               @foreach ($cart->items as $key=>$product)
                <div class="t_crp1">
                     <div class="t_pdleft"><span>{{$product['quantity']}}x</span>
                        <p>{{$product['name']}}</p>
                    </div>
                    <div class="t_pdprice"><span>$ {{$product['quantity']*$product['price']}}</span></div>
                </div>
               @endforeach
            </p>
            <hr>
            <p class="t_crtotal">
                <div class="t_crsub">
                    <h6>Subtotal</h6><span>$ {{$cart->total_price}}</span>
                </div>
                @if ($cart->priceDiscount!=0)
                <span class="d-flex justify-content-between"><span></span><span style="padding-top:2px;">- $ {{$cart->priceDiscount}}</span></span>
                @endif
                <br>
                <div class="t_crtl">
                    <h6>Total</h6><span style="padding-top:2px;">$ {{$cart->total_price-$cart->priceDiscount}}</span>
                </div>
            </p>
            <hr>
            <div class="t_crcb">
                <ul>
                    <?php $i=0; ?>
                    @foreach ($payments as $payment)
                     <li style="padding-bottom:10px"><input type="radio" name="payment" value="{{$payment->id}}" id="nextt_{{$payment->id}}" <?php 
                     if ($i==0) {
                        echo 'checked';
                     }
                     
                     ?>> <label for="nextt_{{$payment->id}}">{{$payment->name}}</label></li>
                     <?php $i=9; ?>
                    @endforeach
                    

                </ul>
            </div>
            <button type="submit">PLACE ODER</button>
        </div>
    </div>
</form>

</div>
@endsection