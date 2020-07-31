@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Order Admin')
@section('title_form','Order')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>
          List of orders in progress</strong></h3>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th class="text-left">Stt</th>
              <th>Paymment</th>
              <th>Sum Price</th>
              <th>Status</th>
              <th>Date of purchase</th>
              <th>Tool</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr class="text-center">
                <td class="text-left">{{$loop->index+1}}</td>
              <td>{{$order->payment->name}}</td>
                <td>{{$order->sum}} $</td>
                <td>
                  @if ($order->order_status==0)
                    Processing
                  @elseif($order->order_status==1)
                    Accept
                  @elseif($order->order_status==2)
                    Successful 
                  @else
                    Refuse
                  @endif
                </td>
              <td>{{$order->created_at}}</td>
                <td>
                  <form action="" method="POST">                           
                    {{-- <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> --}}
                    <a href="{{route('order.edit',$order->id)}}" class="btn btn-success"><i class="fas fa-search-plus"></i></a>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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