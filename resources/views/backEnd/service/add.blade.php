@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Service Admin')
@section('title_form','Service')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Service</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('title')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Title</label>
                        @enderror
                        <input type="text" class="form-control @error('title') is-invalid  @enderror " placeholder="Enter title..." name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        @error('img1')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Image 1</label>
                        @enderror
                      <input type="file"  class="form-control" name="img1">
                    </div>
                    <div class="form-group">
                        @error('img2')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Image 2</label>
                        @enderror
                      <input type="file"  class="form-control" name="img2">
                    </div>
                    <div class="form-group">
                        @error('content')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Content</label>
                        @enderror
                        <textarea class="form-control @error('name') is-invalid  @enderror" rows="3" placeholder="Enter ..." name="content" id="content"></textarea>
                    </div>
                    <div id="checkListC">
                        <div class="form-group">
                            @error('checkList[0]')
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else 
                            <label for="">Check List</label>
                            @enderror
                           <div class="row">
                               <div class="col-md-10">
                                <input type="text" class="form-control @error('checkList[0]') is-invalid  @enderror " placeholder="Enter check list..." name="checkList[]" value="{{old('checkList[0]')}}" required>
                               </div>
                           </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addElemetService()">Add Check List</button>
                    <br>
                    <br>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0" id='feature_status'>
                                    <label class="form-check-label" for="feature_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="status" value="1" id='feature_status2'>
                                <label class="form-check-label" for="feature_status2">Show</label>
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
@section('script_cus')
    <script>
        function addElemetService(){
            html='  <div class="form-group">@error("checkList[]")<label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>@else <label for="">Check List</label> @enderror <div class="row"><div class="col-md-10"><input type="text" class="form-control @error("checkList[]") is-invalid  @enderror " placeholder="Enter check list..." name="checkList[]" value="{{old("checkList[]")}}" required></div><div class="col-md-2"><button type="button" class="btn btn-danger" onclick="deletElementSe(this)">Delete</button></div></div></div>';
            $('#checkListC').append(html);
        }
        function deletElementSe(a){
            $(a).parents('.form-group').remove();
        }
    </script>
@endsection