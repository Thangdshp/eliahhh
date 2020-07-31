@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','User')
@section('title_form','User')
@section('content')
<form role="form" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-7">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
          <div class="card-body">
            <div class="form-group">
              @error('name')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
              <label for="">Name</label>
              @enderror
              <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name..." name="name" value="{{old('name')}}" tabindex="1">
          </div>
          <div class="form-group">
              @error('email')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
              <label for="">Email</label>
              @enderror
              <input type="email" class="form-control @error('email') is-invalid  @enderror " placeholder="Enter email..." name="email" value="{{old('email')}}" tabindex="2">
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  @error('password')
                      <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @else
                  <label for="">Password</label>
                  @enderror
                  <input type="password" class="form-control @error('password') is-invalid  @enderror " placeholder="Enter password..." name="password" value="{{old('password')}}" tabindex="3">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  @error('Ag_password')
                      <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @else
                  <label for="">Enter the password</label>
                  @enderror
                  <input type="password" class="form-control @error('Ag_password') is-invalid  @enderror " placeholder="Enter password..." name="Ag_password" value="{{old('Ag_password')}}" tabindex="4">
                </div>
              </div>
            </div>
            <div class="form-group">
              @error('phone')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
              <label for="">Phone number</label>
              @enderror
              <input type="tel" class="form-control @error('phone') is-invalid  @enderror " placeholder="Enter phone..." name="phone" value="{{old('phone')}}" tabindex="5">
            </div>
            <div class="form-group">
              @error('address')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
              <label for="">Address</label>
              @enderror
              <input type="text" class="form-control @error('address') is-invalid  @enderror " placeholder="Enter address..." name="address" value="{{old('address')}}" tabindex="5">
            </div>
            <div class="form-group">
              @error('birth_day')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
              @else
              <label for="">Birth day</label>
              @enderror
              <input type="date" class="form-control @error('birth_day') is-invalid  @enderror " placeholder="Enter birth day..." name="birth_day" value="{{old('birth_day')}}" tabindex="6">
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="user_status" checked value="1" id="a1">
                <label class="form-check-label" for="a1">Enable</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="user_status" value="0" id=a2>
                <label class="form-check-label" for="a2">Disable</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <button type="submit" class="btn btn-primary" id="submit1">Submit</button>
          </div>
        {{-- </form> --}}
      </div>
    </div>
    <div class="col-md-5">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Upload avatar user</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div id="upload_img">
          <div class="row">
            <br>	
            <div class="avatar-upload">
              <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
                <label for="imageUpload" style="color: black;background: cadetblue;text-align: center;line-height: 34px;"><i class="fas fa-pen"></i></label>
              </div>
              <div class="avatar-preview" style="border: 6px solid #e0dfdf;">
                <div id="imagePreview" style="background-image: url();">
                </div>
              </div>
            </div>
            <div class="col-md-12 text-center">
              @error('image')
               <button type="button" class="btn btn-danger mt-3"><i class="far fa-times-circle"></i>{{$message}}</button>
               <br>
              @enderror
            </div>
            <div class="col-md-12 text-center">
              <div class="showImage">			
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
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