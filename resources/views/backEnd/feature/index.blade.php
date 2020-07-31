@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Feature Admin')
@section('title_form','Feature')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Feature</strong></h3>
        <div class="card-tools">
            <a href="{{route('feature.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Feature</a>
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
              @foreach ($features as $feature)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$feature->name}}</td>
                    <td>
                        @if ($feature->feature_status==1)
                            Show
                        @else
                            Hide
                        @endif
                    </td>
                    <td>{{$feature->created_at}}</td>
                    <td>
                      <form action="{{route('feature.destroy',$feature->id)}}" method="POST">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('feature.edit',$feature->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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