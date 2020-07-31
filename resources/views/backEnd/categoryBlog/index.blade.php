@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Category Blog Admin')
@section('title_form','Category Blog')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Category Blog</strong></h3>
        <div class="card-tools">
            <a href="{{route('categoryBlog.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Category Blog</a>
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
              @foreach ($categoryBlogs as $categoryBlog)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$categoryBlog->name}}</td>
                    <td>
                        @if ($categoryBlog->category_blog_status==1)
                            Show
                        @else
                            Hide
                        @endif
                    </td>
                    <td>{{$categoryBlog->created_at}}</td>
                    <td>
                        <form action="" method="POST">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('categoryBlog.edit',$categoryBlog->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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