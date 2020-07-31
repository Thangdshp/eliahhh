@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Brand Admin')
@section('title_form','Brand')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Color</strong></h3>
        <div class="card-tools">
            <a href="{{route('color.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Color</a>
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
              <th>Color</th>
              <th>Status</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($colors as $color)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$color->name}}</td>
                    <td align='center'>
                      <span class="color_show" style="background:{{$color->color_code}}"></span>
                    </td>
                    <td>
                        @if ($color->color_status==1)
                            Show
                        @else
                            Hide
                        @endif
                    </td>
                    <td>{{$color->created_at}}</td>
                    <td>
                      <form action="{{route('color.destroy',$color->id)}}" method="POST">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('color.edit',$color->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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