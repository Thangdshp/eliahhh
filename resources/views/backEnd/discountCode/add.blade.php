@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Discount Admin')
@section('title_form','Discount')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Discount</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('discountCode.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                  @error('dateStart')
                    <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @else
                    <label for="">Date Start</label>
                  @enderror
                  <div class="input-group">
                    <input type="date" class="form-control" name="dateStart" value="{{old('dateStart')}}">
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      @error('code_sale')
                        <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Code</label>
                      @enderror
                      <div class="input-group">
                      <input type="text" class="form-control" name="code_sale" placeholder="Enter code ,For example : eliah_Sale..." value="{{old('code_sale')}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      @error('quantity')
                        <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Quantity</label>
                      @enderror
                      <div class="input-group">
                        <input type="number" class="form-control" name="quantity" value="10" placeholder="Enter quantity..." value="{{old('quantity')}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      @error('ra')
                        <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Ratio</label>
                      @enderror
                      <div class="input-group">
                        <input type="number" class="form-control" name="ratio" value="1" placeholder="Enter ratio..." value="{{old('ratio')}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('priceStart')
                        <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Price start</label>
                      @enderror
                      <div class="input-group">
                        <input type="number" class="form-control" name="priceStart" value="10" placeholder="Enter price start..." value="{{old('priceStart')}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('ceilingPrice')
                        <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Ceiling price</label>
                      @enderror
                      <div class="input-group">
                        <input type="number" class="form-control" name="ceilingPrice" value="10" placeholder="Enter ceiling price..." value="{{old('ceilingPrice')}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  @error('dateEnd')
                    <label style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @else
                    <label for="">Date End</label>
                  @enderror
                  <div class="input-group">
                    <input type="date" class="form-control" name="dateEnd" value="{{old('dateEnd')}}">
                  </div>
                  <!-- /.input group -->
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