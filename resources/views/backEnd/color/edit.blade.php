@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Color Admin')
@section('title_form','Color')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Color</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('color.update',$color->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$color->id}}">
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name color..." name="name" value="{{$color->name}}">
                    </div>
                    <div class="form-group">
                        @error('color_code')
                            <label class="col-form-label" for="inputError2"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <span class="color-picker">
                            <label for="colorPicker">
                                <input type="color" value="{{$color->color_code}}" id="colorPicker" name="color_code" class="form-control @error('color_code') is-invalid  @enderror ">
                            </label>
                        </span>                      
                    </div>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="color_status" value="0" id='color_status'
                                    @if ($color->color_status==0)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="color_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="color_status" value="1" id='color_status2'
                                @if ($color->color_status==0)
                                    checked
                                @endif                            
                                >
                                <label class="form-check-label" for="color_status2">Show</label>
                            </div>
                      </div>
                   </div>
                   </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked name="redirect" value="1" id="redirect">
                          <label class="form-check-label" for="redirect">Redirect to brand index</label>
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