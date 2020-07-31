@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Banner Admin')
@section('title_form','Banner')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Banner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('banner.update',$banner->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$banner->id}}">
                    <input type="hidden" name="check" value="{{$check}}">                 
                    <div class="form-group">
                        <label for="">Image old</label>
                        <br>
                        @foreach (json_decode($banner->images) as $item)
                            <img src="storage/app/{{$item}}" alt="" class="imgPreview">
                        @endforeach           
                    </div>
                    @if ($check>1)
                        @error('imageBottom')
                            <label for="">{{$message}}</label>
                        @else
                            <label for="">Replace the image</label>
                        @enderror
                    @else 
                        @error('image')
                            <label for="">{{$message}}</label>
                        @else
                            <label for="">Replace the image</label>
                        @enderror
                    @endif    
                    @if ($check>1)
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input topb" id="customFile2" name="imageBottom[]" multiple>
                            <label class="custom-file-label uil" for="customFile2">Choose file</label>
                        </div>
                    @else 
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input topb" id="customFile2" name="image">
                            <label class="custom-file-label uil" for="customFile2">Choose file</label>
                        </div>
                    @endif      
                                 
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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input.topb").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".uil").addClass("selected").html(fileName);
        });
    </script>
@endsection