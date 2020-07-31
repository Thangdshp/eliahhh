@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"Shop")
@section('titlePage','Cart')
@section('content')
<div class="wp-box">
    <div class="wp-container container">
        <div class="row">
            <div class="t_cartmain col-md-12">
                <div class="overflow-x:auto">
                    <table class="table t_viewtable cols-6">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="content_cart_table">
                            
                           @foreach ($cart->items as $key=>$product)
                            <tr id="item_product_cart_{{$key}}" class="item_cart">
                                    <td scope="row" data-label="Product" class="t_cartimg">
                                        <img style="width:100px;height: 100px;object-fit: cover;"
                                        src="storage/app/{{$product['img']}}" alt="">
                                    </td>
                                    <td data-label="">
                                        <p>{{$product['brand']}}</p>
                                        <h6>{{$product['name']}}</h6>
                                    </td >
                                    <td data-label="Price">
                                        <h6>$<span id="price_item_{{$key}}">{{$product['price']}}</span></h6>
                                    </td>
                                    <td data-label="Quantity">
                                        <div class="t_cartqty">
                                            <div class="qty-block">
                                                <div class="qty_inc_dec" onclick="quantityNumber(0,'inputQuantity_{{$key}}',{{$key}})">
                                                    <i class="fas fa-minus"></i>
                                                </div>
                                                <div class="qty">
                                                    <input type="text" style="width:65px;" name="{{$key}}" min='0' value="{{$product['quantity']}}" title=""
                                                        class="input-text inputQuantity" id="inputQuantity_{{$key}}" onchange="checkNumQuantity({{$key}})"/>
                                                </div>
                                                <div class="qty_inc_dec" onclick="quantityNumber(1,'inputQuantity_{{$key}}',{{$key}})">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Total">
                                        <h6>$ <span id="total_item_{{$key}}" class="total_class_item"> {{$product['quantity']*$product['price']}}</span></h6>
                                    </td>
                                    <td>
                                        <a  style="cursor: pointer" onclick="removeCart({{$key}},'item_product_cart_{{$key}}')">
                                            <i class="far fa-times-circle" style="cursor: pointer;"></i>
                                        </a>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="t_cartactive">
                        <div class="row">
                            <div class="t_continue col-md-7">
                                <a href="{{route('shop')}}">
                                    <i class="fas fa-reply"></i>
                                    <h6>Continue shopping</h6>
                                </a>
                            </div>
                            <div class="t_active col-md-5">
                                <div class="t_clearcart">
                                    <a onclick="clearCart()" style="cursor: pointer">
                                        <i class="far fa-trash-alt"></i>
                                        <h6>Clear shopping cart</h6>
                                    </a>
                                </div>
                                <div class="t_updatecart">
                                    <a href="{{route('cart')}}">
                                        <i class="fas fa-spinner"></i>
                                        <h6>Update cart</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="t_carttotal">
                        <div class="row">
                            <div class=" col-md-8 p-3">
                                <div class="t_couponcode">
                                    <div class="t_coupontext">
                                        <p>Enter coupon code. It will be applied at checkout.</p>
                                    </div>
                                    <div class="couponform">
                                        <div>
                                            <div class="input-group mb-3" id="t_formcode">
                                                <input type="text" class="form-control" placeholder="Your code here"
                                                    aria-label="Recipient's username" aria-describedby="basic-addon2" id="code_discount_content">
                                                <div class="input-group-append">
                                                    <button type="button" id="apply_code_dis">APPLY</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class=" col-md-4 p-3">
                                <div class=" t_total">
                                    <h4>Cart Total</h4>
                                    <div class="t_st"><h6>Subtotal</h6><Span style="color:#111" id="total_sub">${{$cart->total_price}}</Span></div>
                                    <div class="t_st mb-1" id="t_discount" @if ($cart->priceDiscount==0)
                                    style="display: none;"
                                    @endif><h6>Discount</h6><span style="color: black">-$<span style="color:#111" id="total_discount">{{$cart->priceDiscount}}</span></span></div>
                                    <div class="t_tt"><h6>Total</h6><Span>$<span id="total_sum">{{$cart->total_price-$cart->priceDiscount}}</span></Span></div>
                                    <button><a href="{{route('checkout')}}" style="display: block; color:inherit">PROCEED TO CHECKOUT</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_cus')
    <script>
         function checkCode(nameCode){        
            $.ajax({
                url:'cart/checkCode/'+nameCode,
                type:'GET',
                dataType:'JSON',
                success: function(data) {
                    if(data.status==1){
                        $('#code_discount_content').removeClass('is-invalid');
                        Command: toastr[data.title](data.message_alert);
                        $('#t_discount').css('display','flex');
                        $('#total_discount').text(data.total_sale);
                        $('#total_sum').text((data.total)-(data.total_sale));

                    }
                    if (data.status==0) {
                        $('#code_discount_content').removeClass('is-invalid');
                        $('#code_discount_content').addClass('is-invalid');
                        Command: toastr[data.title](data.message_alert);
                    }
                }
            });
        }
        function removeCart(id,idHtml){        
            $.ajax({
                url:'cart/remove/'+id,
                type:'GET',
                dataType:'JSON',
                success: function(data) {
                    if(data!=null){
                        $idHtmlF='#'+idHtml;
                        $($idHtmlF).remove();
                        total_cart();
                        checkNullProduct();
                        Command: toastr[data.title](data.message_alert);
                    }
                }
            });
        }
        function clearCart(){        
            $.ajax({
                url:'cart/clear',
                type:'GET',
                dataType:'JSON',
                success: function(data) {
                    if(data!=null){
                        $('#content_cart_table').empty();
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        total_cart();
                        checkNullProduct();
                        Command: toastr[data.title](data.message_alert);
                    }
                }
            });
        }
        function quantityCart(id,quantity){
            $.ajax({
                url:'cart/update/id/'+id+'/quantity/'+quantity,
                type:'GET',
                dataType:'JSON'

            });
        }
    </script>
    <script>
        function quantityNumber(check,idHtml,index){
                idHtmlf='#'+idHtml;
                quantityRoot=$(idHtmlf).val();
                if (check==0) {
                    if (quantityRoot>0) {
                        quantityRoot--;
                        $(idHtmlf).val(quantityRoot);
                    }
                }
                if (check==1) {
                    quantityRoot++;
                    $(idHtmlf).val(quantityRoot);
                }
            total_item(index);
            quantityCart(index,quantityRoot);
        }
        function checkNumQuantity(index){
          
            idQuantity='#inputQuantity_'+index;
            // text=$(idQuantity).val();
            // alert(isInteger(parseFloat($(idQuantity).val())));
            if (parseFloat($(idQuantity).val())<0) {               
                $(idQuantity).val(1);
                quantityCart(index,1);
            }else{
                quantityCart(index,parseFloat($(idQuantity).val()));
            }
            total_item(index);
        }
        function total_item(index){
            idPrice='#price_item_'+index;
            idQuantity='#inputQuantity_'+index;
            idTotalItem='#total_item_'+index;
            toatl=parseFloat($(idPrice).text())*parseFloat($(idQuantity).val());
            $(idTotalItem).empty();
            $(idTotalItem).text(toatl);
            total_cart();
        }
        function total_cart(){
            total=0;
            $('.total_class_item').each(function (index, element) {
               total+= parseFloat($(element).text());          
            });
            totalF='$'+total;
            $('#total_sub').empty();
            $('#total_sub').text(totalF);
            $('#total_sum').empty();
            $('#total_sum').text(total-parseFloat($('#total_discount').text()));           
        }
        function checkNullProduct(){
            if ($('#content_cart_table').find('.item_cart').length==0) {
                $('#total_sub').empty();
                $('#total_sub').text(0);
                $('#total_sum').empty();
                $('#total_sum').text(0);   
                html='<tr>';
                html+='<td class="text-left">No Product </td>';
                html+='</tr>';
                $('#content_cart_table').append(html);
            }
            showCartHover();
        }
      
    </script>
    <script>
        $(document).ready(function () {
            $('#apply_code_dis').click(function(){
                value=$('#code_discount_content').val();
                if (value) {
                    checkCode(value);
                }else{
                    $('#code_discount_content').removeClass('is-invalid');
                    $('#code_discount_content').addClass('is-invalid');
                   
                }
            });
        });
    </script>
@endsection