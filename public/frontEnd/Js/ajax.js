function addCart(id,quantity=1){
    $.ajax({
        url:'cart/add/'+id,
        type:'GET',
        dataType:'JSON',
        data:{quantity:quantity},
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
                showCartHover();
            }
        }
    });
}  
function clickShowCart(){
    $.ajax({
        url:'cart/show',
        type:'GET',
        dataType:'HTML',
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
            }
        }
    });
}
function addWishList(id){
    $.ajax({
        url:'wishlist/add/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
            }
        }
    });
}  
function removeWishList(id){
    $.ajax({
        url:'wishlist/remove/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
            }
        }
    });
}
function clearWishList(){
    $.ajax({
        url:'wishlist/clear/',
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
                $('#content_wishlist').remove();
            }
        }
    });
}

function showProduct(id){
    $modal='#modal_product_'+id;
    $.ajax({
        url:'product/show/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                // console.log(data.html);
                $('#show_product_content').empty();
                $('#show_product_content').html(data.html);
                $($modal).modal('show');
            }
        }
    });
}
function showCartHover(){
    $.ajax({
        url:'cart/show',
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                $('#cart-hovers').empty();
                $('#cart-hovers').html(data.html);
                $('#total_full').empty();
                $('#total_full').text(data.total);
                $('#quantity_full').empty();
                $('#quantity_full').text(data.quantity);
                $('#quantity_full2').empty();
                $('#quantity_full2').text(data.quantity);

            }
        }
    });
}
function showDesciption(id){
    $modal='#description_content_'+id;
    $.ajax({
        url:'product-detail/description/id/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                $('#show_product_content').empty();
                $('#show_product_content').html(data.html);
                $($modal).modal('show');

            }
        }
    });
}
function showOrder_cus(id){
    $.ajax({
        url:'list_order_history/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                $('.content-time').empty();
                $('.content-time').html(data.html);
            }
        }
    });
}
function clickWhishlist(id){
    addWishList(id);
    idHtml='#item_wishlis_'+id;
    $(idHtml).remove();
}
function clickAddCartfrom_WishList(id,idWishlist){
    $.ajax({
        url:'wishlist/remove/'+idWishlist,
        type:'GET',
        dataType:'JSON'
    });
    addCart(id);
    idHtml='#item_wishlis_'+idWishlist;
    $(idHtml).remove();
    checkWishList();
    showCartHover();
}
function getPriceDetail(id){
    $.ajax({
        url:'product-detail-get-price/'+id,
        type:'GET',
        dataType:'JSON',
        success: function(data) {
            if(data!=null){
                $('#price_product_detail').text(data.price);
                $('.set-img-choosed').attr('src',data.img);
            }
        }
    });
}
$(document).ready(function(){
    $('.emailLetter').on('submit', function(event){
        event.preventDefault();
        console.log("ds");
        email=$('#newEmailP').val();
        $.ajax({
            url:'newLetterGet/'+email,
            type:'GET',
            dataType:'JSON',
            success: function(data) {
                if(data!=null){
                    Command: toastr[data.title](data.message_alert);
                }
            }
        });
    });
});
function checkWishList(){
   
    if($('.item_wis').length==0){
        html='<tr><td>No product..</td></tr>';
        $('#nextShop_wishlist').css('display','inline-block');
        $('#content_wishlist').append(html);
    }
   
}
// ---review 
function postReview(idPro,rate,content){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:'review/post',
        type:'POST',
        dataType:'JSON',
        data: {
            "idProductDetail": idPro,
            'rate':rate,
            'content':content
        },
        success: function(data) {
            if(data!=null){
                Command: toastr[data.title](data.message_alert);
                $('#form').modal('hide');
            }
        }
    });
}