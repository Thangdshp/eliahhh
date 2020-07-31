@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Payment Admin')
@section('title_form','Payment')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Payment</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('payment.update',$payment->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$payment->id}}">
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name payment..." name="name" value="{{$payment->name}}">
                    </div>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status" value="0" id='payment_status'
                                    @if ($payment->payment_status==0)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="payment_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="payment_status" value="1" id='payment_status2'
                                @if ($payment->payment_status==0)
                                    checked
                                @endif                            
                                >
                                <label class="form-check-label" for="payment_status2">Show</label>
                            </div>
                      </div>
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