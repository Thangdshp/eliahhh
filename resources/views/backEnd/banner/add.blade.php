@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Banner Admin')
@section('title_form','Banner')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Banner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('page')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Route page</label>
                        @enderror
                        <input type="text" class="form-control @error('page') is-invalid  @enderror " placeholder="Enter route  page..." name="page" value="{{old('page')}}">
                    </div>
                    
                    @error('imageTop')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                        <label for="">Image->Top</label>
                    @enderror
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input topu" id="customFile" name="imageTop">
                        <label class="custom-file-label test" for="customFile">Choose file</label>
                    </div>
                    @error('imageBottom')
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                    @else
                    <label for="">Image->Bottom</label>
                    

                    @enderror        
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input topb" id="customFile2" name="imageBottom[]" multiple>
                        <label class="custom-file-label uil" for="customFile2">Choose file</label>
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