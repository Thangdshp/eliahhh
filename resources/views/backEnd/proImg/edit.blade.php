@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Image Admin')
@section('title_form','Image')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Image</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('productDetailImages.update',$productDetailImage->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                               @error('image')
                                <label for="">{{$message}}</label>
                               @else
                                <label for="">Image</label>
                               @enderror
                                <div class="form-group">
                                     <input type='file' id="file-input" name="image" class="d-none"/>
                                     <div id='img_contain'>
                                       <img id="image-preview" align='middle' class="imgPreview" src="storage/app/{{$productDetailImage->url_img}}" alt="your image" style="width:250px!important" title=''/>
                                     </div>
                                </div>
                                <button class="btn btn-danger" type="button" id="btn_upload"><i class="fas fa-upload"></i></button>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="row">
                                   <div class="col-md-12">
                                        <label for="">Position</label>
                                        <div class="form-group">
                                            <select class="form-control" id="category_idInput"  name="position">
                                                @for ($i = 0; $i < count(($productDetailImage->ProductDetail)->productDetailImage); $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                        <label for="">Status</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="pdi_status" value="1" id="po" @if ($productDetailImage->pdi_status==1)
                                                  checked
                                              @endif>
                                              <label class="form-check-label" for="po">Show</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="pdi_status"  value="0" id="bo" @if ($productDetailImage->pdi_status==0)
                                              checked
                                          @endif>
                                              <label class="form-check-label" for="bo" >Hiden</label>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $("#btn_upload").click(function(){
            $('#file-input').click();
        })
         function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function() {
        readURL(this);
        });
    </script>
@endsection