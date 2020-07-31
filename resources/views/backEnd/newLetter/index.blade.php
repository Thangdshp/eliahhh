@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','List Email Admin')
@section('title_form','Email')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Email | Number: {{count($newLetters)}}</strong></h3>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Name</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($newLetters as $newLetter)
                <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$newLetter->email}}</td>
                    <td>
                        <form method="POST" action="{{route('newLetter.delete',$newLetter->id)}}" >
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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