@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Blog Admin')
@section('title_form','Blog')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Blog</strong></h3>
        <div class="card-tools">
            <a href="{{route('blog.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Blog</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($blogs as $blog)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$blog->title_blog}}</td>
                    <td>{{$blog->categoryBlog->name}}</td>
                    <td>
                        @if ($blog->blog_status==0)
                            Hiden
                        @else
                            Show
                        @endif
                    </td>
                    <td>{{$blog->created_at}}</td>
                    <td>
                        <form method="POST" action="{{route('blog.destroy',$blog->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
    <div id="show_banner_content"></div>
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
      function clickGetImgBanner(id){
        modal='#modal'+id;
        $.ajax({
          url:'admin/getImgBanner/'+id,               
          type:'GET',
          dataType:'JSON',
          success: function(data) {
              if(data!=null){
                $('#show_banner_content').empty();
                $('#show_banner_content').html(data.html);
                $(modal).modal('show');
              }
          }
        });
      }
  </script>
@endsection