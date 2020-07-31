@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Payment Admin')
@section('title_form','Payment')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Payment</strong></h3>
        <div class="card-tools">
            <a href="{{route('payment.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Payment</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Name</th>
              <th>Status</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($Payments as $Payment)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$Payment->name}}</td>
                    <td>
                        @if ($Payment->payment_status==1)
                            Show
                        @else
                            Hide
                        @endif
                    </td>
                    <td>{{$Payment->created_at}}</td>
                    <td>
                      <form action="{{route('payment.destroy',$Payment->id)}}" method="POST">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('payment.edit',$Payment->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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