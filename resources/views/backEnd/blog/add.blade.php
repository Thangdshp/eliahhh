@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Blog Admin')
@section('title_form','Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Blog</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                @error('category_blog_id')
                                    <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else
                                    <label for="">Category Blog</label>
                                @enderror                  
                                <select class="form-control" name="category_blog_id">
                                    <option value="">----Choose Category Blog</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                            </select>            
                            </div>
                       </div>
                       <div class="col-md-6">
                            @error('img')
                                <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else
                                <label for="">Avarta Blog</label>
                            @enderror
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input topu" id="customFile" name="img">
                                <label class="custom-file-label test" for="customFile">Choose file</label>
                            </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @error('title_blog')
                                    <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else
                                    <label for="">Title Blog</label>
                                @enderror
                                <input type="text" class="form-control " placeholder="Enter Title..." name="title_blog" value="{{old('title_blog')}}">
                            </div>     
                            <div class="form-group">
                                @error('content_small')
                                    <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else
                                    <label for="">Content Small</label>
                                @enderror
                                <input type="text" class="form-control " placeholder="Enter content small..." name="content_small" value="{{old('content_small')}}">
                            </div>              
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="blog_status" checked value="1" id="check1">
                                <label class="form-check-label" for="check1">Show</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="blog_status" value="0" id="check2">
                                <label class="form-check-label" for="check2">Hiden</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @error('content')
                            <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else
                                <label for="">Content</label>
                            @enderror
                           
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid  @enderror "></textarea>
                              
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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input.topu").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".test").addClass("selected").html(fileName);
        });
        $(".custom-file-input.topb").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".uil").addClass("selected").html(fileName);
        });
    </script>
@endsection