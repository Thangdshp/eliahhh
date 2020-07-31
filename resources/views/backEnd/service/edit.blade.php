@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Service Admin')
@section('title_form','Service')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Service</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('service.update',$service->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$service->id}}">
                <div class="card-body">
                    <div class="form-group">
                        @error('title')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Title</label>
                        @enderror
                        <input type="text" class="form-control @error('title') is-invalid  @enderror " placeholder="Enter title..." name="title" value="{{$service->title}}">
                    </div>
                    <div class="form-group">
                        @error('img1')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Image 1</label>
                        @enderror
                      <input type="file"  class="form-control" name="img1">
                    </div>
                <img src="storage/app/{{json_decode($service->imgs)[0]}}" alt="Error" class="imgPreview">
                    <div class="form-group">
                        @error('img2')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Image 2</label>
                        @enderror
                      <input type="file"  class="form-control" name="img2">
                    </div>
                    <img src="storage/app/{{json_decode($service->imgs)[1]}}" alt="Error" class="imgPreview">
                    <div class="form-group">
                        @error('content')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Content</label>
                        @enderror
                        <textarea class="form-control @error('name') is-invalid  @enderror" rows="3" placeholder="Enter ..." name="content" id="content">{{$service->content}}</textarea>
                    </div>
                    <div id="checkListC">
                       @foreach (json_decode($service->checkList) as $item)
                            <div class="form-group checkE">         
                                <label for="">Check List</label>
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('checkList[0]') is-invalid  @enderror " placeholder="Enter check list..." name="checkList[]" value="{{$item}}" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger" onclick="deletElementSe(this)">Delete</button>
                                    </div>
                            </div>
                            </div>
                       @endforeach
                    </div>
                    <button type="button" class="btn btn-success" onclick="addElemetService()">Add Check List</button>
                    <br>
                    <br>
                    <div class="form-group">
                        @error('position')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                        <label for="">Position</label>
                        @enderror
                        <input type="text" class="form-control @error('position') is-invalid  @enderror " placeholder="Enter position..." name="position" value="{{$service->position}}" required>
                    </div>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0" id='feature_status' @if ($service->status==0)
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="feature_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  name="status" value="1" id='feature_status2' @if ($service->status==1)
                                checked
                            @endif>
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
            html='  <div class="form-group checkE">@error("checkList[]")<label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>@else <label for="">Check List</label> @enderror <div class="row"><div class="col-md-10"><input type="text" class="form-control @error("checkList[]") is-invalid  @enderror " placeholder="Enter check list..." name="checkList[]" value="{{old("checkList[]")}}" required></div><div class="col-md-2"><button type="button" class="btn btn-danger" onclick="deletElementSe(this)">Delete</button></div></div></div>';
            $('#checkListC').append(html);
        }
        function deletElementSe(a){
            if ($('.checkE').length>1) {
                $(a).parents('.form-group').remove();
            }
           
        }
    </script>
@endsection