@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Payment Admin')
@section('title_form','Payment')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Payment</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('payment.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name payment..." name="name" value="{{old('name')}}">
                    </div>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status" value="0" id='payment_status'>
                                    <label class="form-check-label" for="payment_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="payment_status" value="1" id='payment_status2'>
                                <label class="form-check-label" for="payment_status2">Show</label>
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