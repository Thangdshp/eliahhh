@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Slideshow Admin')
@section('title_form','Slideshow')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Slideshow</strong></h3>
        <div class="card-tools">
            <a href="{{route('slideshow.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Slideshow</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>Image</th>    
              <th>Title Small</th>
              <th>Title</th>                  
              <th>Link</th>
              <th>Priority</th>
              <th>Status</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($slideshows as $slideshow)
                <tr class="text-center">
                    <td>
                    <img src="storage/app/{{$slideshow->url_img}}" alt="" class="imgPreview">
                    </td>
                    <td>{{$slideshow->titleSmall}}</td>
                    <td>{{$slideshow->title}}</td>  
                    <td>{{$slideshow->link}}</td>
                    <td>{{$slideshow->position}}</td>
                    <td>
                      @if ($slideshow->slideshow_status==0)
                          Hiden
                      @endif
                        Show
                    </td>
                    <td>
                        <form method="POST" action="{{route('slideshow.destroy',$slideshow->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('slideshow.edit',$slideshow->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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