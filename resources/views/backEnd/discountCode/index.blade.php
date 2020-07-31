@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Discount Admin')
@section('title_form','Discount')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Discount</strong></h3>
        <div class="card-tools">
            <a href="{{route('discountCode.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Discount</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>Discount Code</th>
              <th>Ratio</th>
              <th>Quantity</th>
              <th>Price Start</th>
              <th>Ceiling Price</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($discountCodes as $discountCode)
            <tr class="text-center">
              <td>{{$discountCode->code_sale}}</td>
              <td>-{{$discountCode->ratio}}%</td>
              <td>{{$discountCode->quantity}}</td>
              <td>{{$discountCode->priceStart}}$</td>
              <td>{{$discountCode->ceilingPrice}}$</td>
              <td>{{$discountCode->date_start}}</td>        
              <td>{{$discountCode->date_end}}</td>
              <td>
                  <form action="{{route('discountCode.destroy',$discountCode->id)}}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                      <a href="{{route('discountCode.edit',$discountCode->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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