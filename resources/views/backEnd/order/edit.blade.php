@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Order Detail Admin')
@section('title_form','Order Detail')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Infomation Customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name :</th>
                    <th>{{ $user->name}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Number Phone</td>
                    <td>
                        {{ $user->phone}}
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Email</td>
                    <td>
                        {{ $user->email}}
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Address</td>
                    <td>
                        {{ $user->address}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Infomation Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Quantity purchased :</th>
                    <th>{{ $numberOrderUser}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Success Quantity</td>
                    <td>
                        {{ $numSuccess}}
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Fail Quantity</td>
                    <td>
                        {{ $numFail}}
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Sum Price</td>
                    <td>
                        {{ $sum }} $
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-2 mb-5">
        <h3>Set Status Order</h3>
       <form action="{{route('order.update',$ord->id)}}}" class="d-flex justify-content-between" method="POST">
        @csrf
            <div class="form-group">
               
                <select class="form-control" name="order_status">
                    <option value="0"  @if ($ord->order_status==0) selected @endif>Processing</option>
                    <option value="1"  @if ($ord->order_status==1) selected @endif>Accept</option>
                    <option value="2"  @if ($ord->order_status==2) selected @endif>Successful</option>
                    <option value="3"  @if ($ord->order_status==3) selected @endif>Refuse</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        
       </form>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-3" class="text-center">
        <h3>Status Order Now</h3>
        <button class="btn btn-success">
        @if ($ord->order_status==0)
        Processing
        @elseif($ord->order_status==1)
        Accept
        @elseif($ord->order_status==2)
        Successful 
        @else
        Refuse
        @endif</button>
    </div>
    <div class="col-md-12">
        <table class="table text-nowrap" id="myTable">
            <thead>
            <tr class="text-left">
                <th class="text-left">Stt</th>
                <th class="text-left">Image</th>
                <th>Name</th>
                <th>Color</th>
                <th>Sum Price</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $value)
                <tr>
                <td>{{$loop->index+1}}</td>
                <td><img src="storage/app/{{($value->getProductDetail($value->product_detail_id))->productDetailImage[0]->url_img}}" alt="" style="width:100px; object-fit: cover"></td>
                <td>{{($value->getProductDetail($value->product_detail_id))->product->name}}</td>
                <td>
                    @if (($value->getProductDetail($value->product_detail_id))->color!=null)
                    {{($value->getProductDetail($value->product_detail_id))->color->name}}
                    @else
                    No color
                    @endif
                </td>
                <td>{{$value->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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