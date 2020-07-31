@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Brand Admin')
@section('title_form','Brand')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Brand</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('brand.update',$brand->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name brand..." name="name" value="{{$brand->name}}">
                    </div>
                   <div class="row">
                       <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="brand_status" value="0" id='brand_status' 
                                    @if ($brand->brand_status==0)
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="brand_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  name="brand_status" value="1"  
                                @if ($brand->brand_status==1)
                                checked
                                @endif id='brand_status2' >
                                <label class="form-check-label" for="brand_status2">Show</label>
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