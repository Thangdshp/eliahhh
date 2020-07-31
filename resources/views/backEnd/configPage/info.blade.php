@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Config Admin')
@section('title_form','Config')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Config</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('configPage.inforPost')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Name</label>
                        @enderror
                        <input type="text" class="form-control" placeholder="Enter address" name="name" value="Info" disabled>
                    </div>
                    <div class="form-group">
                        @error('address')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Address</label>
                        @enderror
                        <input type="text" class="form-control @error('address') is-invalid  @enderror " placeholder="Enter address" name="address" value="{{old('address')}}">
                    </div>
                    <div class="form-group">
                        @error('phone')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Phone</label>
                        @enderror
                        <input type="text" class="form-control @error('phone') is-invalid  @enderror " placeholder="Enter phone..." name="phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        @error('email')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Email</label>
                        @enderror
                        <input type="email" class="form-control @error('email') is-invalid  @enderror " placeholder="Enter email..." name="email" value="{{old('email')}}">
                    </div>
              
                    <div class="form-group">
                        @error('openTime')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Opentime</label>
                        @enderror
                        <input type="text" class="form-control @error('openTime') is-invalid  @enderror " placeholder="Enter openTime..." name="openTime" value="{{old('openTime')}}">
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