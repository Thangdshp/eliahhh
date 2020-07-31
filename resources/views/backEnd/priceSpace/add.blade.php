@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Price Space Admin')
@section('title_form','Price Space')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Price Space</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('priceSpace.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    @error('start_price')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                    @enderror
                    <input type="text" class="form-control @error('start_price') is-invalid  @enderror " placeholder="Enter start price..." name="start_price" value="{{old('start_price')}}">
                </div>
               <div class="form-group">
                    @error('end_price')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                    @enderror
                    <input type="text" class="form-control @error('end_price') is-invalid  @enderror " placeholder="Enter end price..." name="end_price" value="{{old('end_price')}}">
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
<div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><strong>List Price Space</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Price Space</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($priceSpaces as $priceSpace)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$priceSpace->start_price}} - {{$priceSpace->end_price}}</td>
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