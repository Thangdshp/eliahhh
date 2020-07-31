@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Product Admin')
@section('title_form','Product Detail Add')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Product Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST"  enctype="multipart/form-data" id="addProduct_detail">
                @csrf
                <div class="card-body">
                    <h3>{{$product->name}}</h3>
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="row justify-content-end">            
                        <button  type="button" class="btn btn-success" id="addFormRecord"><i class="fas fa-plus mr-1"></i> Add a record</button>
                    </div>
                   <div class="row" id="addRecord">
                        <div class="col-md-12" id="formRecord">
                            <div class="row">
                                <div class="col-md-2">
                                    <label id="color_id_0"> <span class="titleRoot" style="display: inline-block">Color</span> <span class="titleError" style="display: none"></span></label>  
                                    <select class="form-control" name="color_id[]" id="color_id_0Input">
                                        @if ($check!=null)
                                            @foreach ($colors as $color)
                                                @if (!in_array($color->id,$check))
                                                    <option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">----Choose Color----</option>
                                            @foreach ($colors as $color)
                                                <option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option>                                       
                                            @endforeach
                                        @endif                                     
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label id="quantity_0"> <span class="titleRoot" style="display: inline-block">Quantity</span> <span class="titleError" style="display: none"></span></label>                
                                    <div class="form-group">
                                        <input class="form-control" type="text"  name="quantity[]" id="quantity_0Input" value="1" min="0" placeholder="Enter quantity  ...">
                                    </div>                        
                                </div>
                                <div class="col-md-2">                             
                                    <label id="price_0"> <span class="titleRoot" style="display: inline-block">Price</span> <span class="titleError" style="display: none"></span></label>                                      
                                    <div class="form-group">
                                        <input class="form-control" type="text"  id="price_0Input" name="price[]" placeholder="Enter price...">
                                    </div>                        
                                </div>
                                <div class="col-md-2">
                                    <label id="price_sale_0"> <span class="titleRoot" style="display: inline-block">Price_sale</span> <span class="titleError" style="display: none"></span></label>           
                                    <div class="form-group">
                                        <input class="form-control" type="text"  id="price_sale_0Input" name="price_sale[]" placeholder="Enter price sale...">
                                    </div>                        
                                </div>
                                <div class="col-md-2">      
                                    <label for="checkok">Show</label>
                                    <label for=""> | </label>
                                    <label for="checker">Hiden</label> 

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" checked name="product_detail_status[]" value="1" checked id="checkok" onclick="checkAtive(this.id)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="product_detail_status[]" value="0" id="checker" onclick="checkAtive(this.id)">
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                   
                                </div>
                                <div class="col-md-1">                               
                                   <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="label_upload_0">Upload</label>             
                                            <div class="form-group">
                                                <label type="button" class="btn btn-danger attachmentBtn imgae_0_input" name="0"><i class="fas fa-upload"></i></label>
                                                <input type="file" name="imgae[0][]" id="imageUpload" class="attachment0" style="display: none" multiple>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="showImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Show Images</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="showImage0">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="col-md-6">
                                            <label for="">Show</label>             
                                            <div class="form-group wp-box-show_0 not-allowed">
                                                <label type="button" class="btn btn-success disabled_show_img btn-show-img_0" data-target="#showImg" data-toggle="modal"><i class="fas fa-images"></i></label>
                                            </div> 
                                        </div>   
                                    </div>                       
                                </div>
                                <div class="col-md-1">                               
                                    <label for="">Tool</label>             
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger" onclick="deleteRec(this.name)" name="formRecord"><i class="fas fa-trash"></i></button>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <span  class="btn btn-danger"><span id="quantity_reco">1</span> :product records</span>
                    </div>
                   
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
    @section('alert')
        <script>
          Command: toastr["success"]("{{Session::get('success')}}")
        </script>
    @endsection
@endif
@if (Session::has('error'))
    @section('alert')
        <script>
          Command: toastr["error"]("{{Session::get('error')}}")
        </script>
    @endsection
@endif
{{-- Đệ quy  --}}
<?php   
function showCategories($categories, $parent_id = null, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent == $parent_id)
        {
            echo '<option value=" '.$item->id.'">'.'&ensp;'.$char.$item->name.'</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, '&ensp;'.$char.'|--');
        }
    }
}

?>
@section('script_cus')
    <script>
        check={{$numRecord}};
        sessionStorage.clear();
        $(document).ready(function(){
            $("#addFormRecord").click(function(){
                $('#quantity_reco').empty();
                if (sessionStorage.clickcounts) {
                    sessionStorage.clickcounts = Number(sessionStorage.clickcounts)+1;
                } else {    
                    sessionStorage.clickcounts = 1;
                }
                numC=$("#addRecord .col-md-12").length;
                
                if (check> numC) {
                    html='<div class="col-md-12 mt-3" id="formRecord_'+sessionStorage.clickcounts+'">';
                    html+=' <div class="row">';
                    // htm
                    html+='<div class="col-md-2"><label id="color_id_'+sessionStorage.clickcounts+'"> <span class="titleRoot" style="display: inline-block">Color</span> <span class="titleError" style="display: none"></span></label> <select class="form-control" name="color_id[]" id="color_id_'+sessionStorage.clickcounts+'Input">@if ($check!=null)@foreach ($colors as $color) @if (!in_array($color->id,$check))<option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option> @endif @endforeach @else <option value="">----Choose Color----</option> @foreach ($colors as $color)<option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option> @endforeach @endif </select></div>';
                    html+='<div class="col-md-2"><label id="quantity_'+sessionStorage.clickcounts+'"> <span class="titleRoot" style="display: inline-block">Quantity</span> <span class="titleError" style="display: none"></span></label> <div class="form-group"><input class="form-control" type="text"  name="quantity[]" id="quantity_'+sessionStorage.clickcounts+'Input" value="1" min="0" placeholder="Enter quantity  ..."></div></div>';
                    html+='<div class="col-md-2"><label id="price_'+sessionStorage.clickcounts+'"> <span class="titleRoot" style="display: inline-block">Price</span> <span class="titleError" style="display: none"></span></label><div class="form-group"><input class="form-control"  id="price_'+sessionStorage.clickcounts+'Input" type="text"  name="price[]" placeholder="Enter price..."></div> </div>';
                    html+='<div class="col-md-2"> <label id="price_sale_'+sessionStorage.clickcounts+'"> <span class="titleRoot" style="display: inline-block">Price_sale</span> <span class="titleError" style="display: none"></span></label> <div class="form-group"><input class="form-control" type="text" id="price_sale_'+sessionStorage.clickcounts+'Input" name="price_sale[]" placeholder="Enter price sale..."></div>  </div>';
                    html+='<div class="col-md-2"><label for="checkok_'+sessionStorage.clickcounts+'">Show</label><label for=""> | </label><label for="checker_'+sessionStorage.clickcounts+'">Hiden</label><div class="row"><div class="col-md-3"><div class="form-group"><div class="form-check"><input class="form-check-input" type="checkbox" checked name="product_detail_status[]" value="1" checked id="checkok_'+sessionStorage.clickcounts+'" onclick="checkAtive(this.id)"></div></div></div><div class="col-md-3"><div class="form-group"><div class="form-check"><input class="form-check-input" type="checkbox" name="product_detail_status[]" value="0" id="checker_'+sessionStorage.clickcounts+'" onclick="checkAtive(this.id)"></div></div></div></div></div>';
                    html+='<div class="col-md-1"><div class="modal fade" id="showImg'+sessionStorage.clickcounts+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Show Images</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="showImage'+sessionStorage.clickcounts+'"></div></div></div></div></div> <div class="row"><div class="col-6"><label class="label_upload_'+sessionStorage.clickcounts+'">Upload</label> <div class="form-group"><label type="button" class="btn btn-danger attachmentBtn imgae_'+sessionStorage.clickcounts+'_input" name="'+sessionStorage.clickcounts+'"><i class="fas fa-upload"></i></label><input type="file" name="imgae['+sessionStorage.clickcounts+'][]" id="imageUpload'+sessionStorage.clickcounts+'" class="attachment'+sessionStorage.clickcounts+'" style="display: none" multiple></div> </div><div class="col-6"><label for="">Show</label> <div class="form-group wp-box-show_'+sessionStorage.clickcounts+' not-allowed"><label type="button" class="btn btn-success disabled_show_img btn-show-img_'+sessionStorage.clickcounts+'" data-target="#showImg'+sessionStorage.clickcounts+'" data-toggle="modal"><i class="fas fa-images"></i></label></div> </div></div></div>';
                    html+='<div class="col-md-1"><label for="">Tool</label><div class="form-group"><button type="button" class="btn btn-danger" onclick="deleteRec(this.name)" name="formRecord_'+sessionStorage.clickcounts+'"><i class="fas fa-trash"></i></button></div></div>';
                    html+='</div>';
                    html+='</div>';
                    $("#addRecord").append(html);
                    $('#quantity_reco').text(numC);
                }else{
                    numC=$("#addRecord .col-md-12").length;
                    $('#quantity_reco').text(numC);
                    Command: toastr["error"]("Number of records maxed")
                }
                
               
            });
        });
    </script>
    <script>
        // Ajax day data  len controller
        $(document).ready(function(){
            $('#addProduct_detail').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                url:"admin/productDetail",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {       
                    
                    if(data!=null){
                        Command: toastr[data.title](data.message_alert)
                    }
                    if(data!=null){
                        window.location.href  = "admin/product";s
                    }
                },
                error: function(error) {
                    objects=error.responseJSON.errors;
                    console.log(objects);
                    $("input").removeClass("is-invalid");
                    $("select").removeClass("is-invalid");
                    $("label").removeClass("btn_error label_error");
                    $(".titleRoot").css('display','inline-block');
                    $(".titleRoot").css('color','black');
                    $(".titleError").css('display','none');
                    for(var key in objects) {
                    // Thay the ten index trong mang co . giong class  co dinh dang _ 
                    keyId = key.replace(".", "_");
                    // Xu li xau lay id lable 
                    keyIds='#'+keyId;
                    keyIdShowTitleR=keyIds+' .titleRoot';
                    keyIdShowTitleE=keyIds+' .titleError';
                    // Thay the ten index trong mang co . giong class  co dinh dang _ 
                    keyIdsInput=keyIds+'Input';
                    $(keyIdsInput).removeClass('is-invalid')
                    $(keyIdsInput).addClass('is-invalid');
                    keyName=key.slice(0,key.indexOf("."));
                    $(keyIds).css('color','red');
                    $(keyIds).css('font-size','15px');
                    $(keyIdShowTitleE).html(objects[key][0].replace(key,keyName));
                    $(keyIdShowTitleE).css('display','inline-block');
                    $(keyIdShowTitleR).css('display','none');
                    // alert error imgae
                    if(key.indexOf("imgae")!=-1){
                    if(key.length>5){
                        cls_error_ig='.'+(key.slice(0,key.lastIndexOf("."))).replace('.','_')+'_input';
                        label='.label_upload_'+$(cls_error_ig).attr("name");
                        console.log(label);
                        $(label).addClass("label_error");
                        $(cls_error_ig).addClass('btn_error');
                    }else{
                        console.log(key);
                    }
                        Command: toastr['error'](objects[key][0]);
                    }
                    }
                }
                })
            });
        });
        // End ajax dat data len controller 
    </script>
@endsection