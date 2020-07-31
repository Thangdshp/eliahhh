@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Send Email Admin')
@section('title_form','Email')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>Send Email All</strong></h3>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
          <form action="{{route('newLetter.post')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      @error('content')
                      <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                          <label for="">Title Email</label>
                      @enderror
                      <input type="text" class="form-control" placeholder="Enter ..." name="title">
                    </div>          
                </div>
              </div>
              @error('content')
              <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
                  <label for="">Content</label>
              @enderror
             
                  <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid  @enderror "></textarea>
                  <br>
                  <br>

              <button type="submit" class="btn btn-success">Send</button>
          </form>
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