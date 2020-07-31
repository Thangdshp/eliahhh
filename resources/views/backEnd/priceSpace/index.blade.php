@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Price Space Admin')
@section('title_form','Price Space')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Price Space</strong></h3>
        <div class="card-tools">
            <a href="{{route('priceSpace.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Price Space</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Price Space</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($priceSpaces as $priceSpace)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$priceSpace->start_price}} - {{$priceSpace->end_price}}</td>
                    <td>{{$priceSpace->created_at}}</td>
                    <td>
                        <form action="" method="POST">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('priceSpace.edit',$priceSpace->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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