@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Service Admin')
@section('title_form','Service')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Service</strong></h3>
        <div class="card-tools">
            <a href="{{route('service.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Service</a>
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
              @foreach ($services as $service)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$service->title}}</td>
                    <td>
                        @if ($service->status==1)
                            Show
                        @else
                            Hide
                        @endif
                    </td>
                    <td>{{$service->created_at}}</td>
                    <td>
                      <form action="{{route('service.destroy',$service->id)}}" method="POST">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('service.edit',$service->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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