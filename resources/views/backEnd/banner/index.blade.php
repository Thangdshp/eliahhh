@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Banner Admin')
@section('title_form','Banner')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Banner</strong></h3>
        <div class="card-tools">
            <a href="{{route('banner.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Banner</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Page</th>
              <th>Image</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($banners as $banner)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$banner->page}}</td>
                    <td><button class="btn btn-danger" onclick="clickGetImgBanner({{$banner->id}})">Show Image</button></td>
                    <td>{{$banner->created_at}}</td>
                    <td>
                        <form method="POST" action="{{route('banner.destroy',$banner->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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