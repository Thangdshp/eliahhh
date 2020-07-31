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
            <span class="d-inline-block ml-1">{{number_format($cart->total_price,2)}}</span>
        </span>
    </div>
    <div class="select-button">
        <a href="{{route('cart')}}" class="btn btn-dark btn-lg">View cart</a>
        <a href="{{route('checkout')}}" class="btn btn-danger btn-lg"> Check out</a>
    </div>
</div>