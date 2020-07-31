@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Slideshow Admin')
@section('title_form','Slideshow')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Slideshow</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('slideshow.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('titleSmall')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Title Small</label>
                        @enderror
                        <input type="text" class="form-control @error('titleSmall') is-invalid  @enderror " placeholder="Enter  titleSmall..." name="titleSmall" value="{{old('titleSmall')}}">
                    </div>
                    <div class="form-group">
                        @error('title')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Title</label>
                        @enderror
                        <input type="text" class="form-control @error('title') is-invalid  @enderror " placeholder="Enter title..." name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        @error('link')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Link</label>
                        @enderror
                        <input type="text" class="form-control @error('link') is-invalid  @enderror " placeholder="Enter link..." name="link" value="{{old('link')}}">
                    </div>
                    <div class="form-group">
                        @error('position')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Priority</label>
                        @enderror
                        <input type="text" class="form-control @error('position') is-invalid  @enderror " placeholder="Enter position..." name="position" value="{{old('position')}}">
                    </div>  
                    @error('url_img')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                        <label for="">Image</label>
                    @enderror
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input topu" id="customFile" name="url_img">
                        <label class="custom-file-label test" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="slideshow_status" checked value="1">
                          <label class="form-check-label">Show</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="slideshow_status" value="0">
                          <label class="form-check-label">Hiden</label>
                        </div>
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
@section('script_cus')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input.topu").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".test").addClass("selected").html(fileName);
        });
        $(".custom-file-input.topb").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".uil").addClass("selected").html(fileName);
        });
    </script>
@endsection