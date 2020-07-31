@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Product Admin')
@section('title_form','Product')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Product Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
                <form role="form" method="POST" action="{{route('productDetail.update',$productDetail->id)}}" enctype="multipart/form-data" id="updateProductDetail">
                @csrf
                @method('PUT')
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-12" id="formRecord">
                            <div class="row">
                                {{-- <input type="hidden" name="id" value="{{$productDetail->id}}" id="id_Pro"> --}}
                                <div class="col-md-2">
                                    @error('color_id')
                                    <label for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                    @else 
                                        <label for="">Color</label>
                                    @enderror
                                    <select class="form-control" name="color_id" id="color_id_0Input">
                                       @if ($productDetail->color_id!=null)
                                            <option value="{{$productDetail->color_id}}" style="background: {{$productDetail->color->color_code}} ">{{$productDetail->color->name}}</option>
                                       @endif
                                        @if (count(($productDetail->product)->productDetail)==1)
                                            <option value="">----Choose Color----</option>
                                        @endif
                                        @foreach ($colors as $color)
                                            @if ($productDetail->color_id!=null)
                                                @if ($check_ids!=null)
                                                    @if ($productDetail->color_id != $color->id && !in_array($color->id,$check_ids))
                                                        <option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option>
                                                    @endif
                                                @else
                                                    @if ($productDetail->color_id != $color->id)
                                                        <option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option>
                                                    @endif
                                                @endif
                                            @else 
                                                <option style="background: {{$color->color_code}} " value="{{$color->id}}">{{$color->name}}</option>
                                            @endif                                          
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    @error('quantity')
                                    <label for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                    @else 
                                        <label for="">Quantity</label>
                                    @enderror  
                                    <div class="form-group">
                                        <input class="form-control" type="text"  name="quantity" id="quantity_0Input"  min="0" placeholder="Enter quantity  ..." value="{{$productDetail->quantity}}">
                                    </div>                        
                                </div>
                                <div class="col-md-2">                             
                                    @error('price')
                                    <label  for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                    @else 
                                        <label for="">Price</label>
                                    @enderror
                                    <div class="form-group">
                                        <input class="form-control" type="text"  id="price_0Input" name="price" placeholder="Enter price..." value="{{$productDetail->price}}">
                                    </div>                        
                                </div>
                                <div class="col-md-2">
                                    @error('price_sale')
                                    <label for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                    @else 
                                        <label for="">Price Sale</label>
                                    @enderror
                                    <div class="form-group">
                                        <input class="form-control" type="text"  id="price_sale_0Input" name="price_sale" placeholder="Enter price sale..." value="{{$productDetail->price_sale}}">
                                    </div>                        
                                </div>
                                <div class="col-md-2">      
                                    <label for="checkok">Show</label>
                                    <label for=""> | </label>
                                    <label for="checker">Hiden</label> 
                                    <label for=""> | </label>
                                    <label for="homeAc">Active Home</label> 

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" checked name="product_detail_status" value="1" checked id="checkok" onclick="checkAtive(this.id)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="product_detail_status" value="0" id="checker" onclick="checkAtive(this.id)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="active_home" value="1" @if($productDetail->active_home==1) checked  @endif id="homeAc">
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
                                {{-- <div class="col-md-1">                               
                                    <label for="">Tool</label>             
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger" onclick="deleteRec(this.name)" name="formRecord"><i class="fas fa-trash"></i></button>
                                    </div>                        
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-left">
                            <h5 class="text-bold">List Old Images</h5>          
                            <div class="text-left">
                               @foreach ($productDetail->productDetailImage as $item)           
                                    <img src="storage/app/{{$item->url_img}}" alt="" class="imgPreview mr-2">
                               @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2" id="content_list_new" style="display: none">
                        <div class="col-md-12 text-left">
                            <h5 class="text-bold" >List New Images</h5>          
                            <div class="text-left">
                               <div class="showImage0">

                               </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Method of updating photos</label>             
                            <select class="form-control" name="hander_img" id="selectHander">
                                <option value="0">Don't update photos</option>
                                <option value="1">Update new photos and don't delete old photos</option>
                                <option value="2">Update new photos and delete old photos</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
@section('script_cus')
    <script>
        $("#imageUpload").change(function(){
            $("#content_list_new").css('display','block');
            $("#selectHander").val("1");
        });
    </script>
@endsection
{{-- Đệ quy  --}}