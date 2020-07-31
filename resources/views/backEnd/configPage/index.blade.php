@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Config Admin')
@section('title_form','Config')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Config</strong></h3>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th >STT</th>
              <th >Name</th>
              <th>Status</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($configPages as $configPage)
                  <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$configPage->name}}</td>
                    <td>
                      @if ($configPage->status==0)
                          Hiden
                      @else
                          Show
                      @endif
                    </td>
                    <td>
                      @if ($configPage->name=='Info')
                          <a href="{{route('configPage.editInfo',$configPage->id)}}" class="btn btn-success">Edit</a>
                      @else 
                          <a href="{{route('configPage.editEffect',$configPage->id)}}" class="btn btn-success">Edit</a>
                      @endif
                      <a href="{{route('configPage.delete',$configPage->id)}}" class="ml-2 btn btn-danger">Delete</a>
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
{{-- Đệ quy  --}}
<?php 
function selectDb(){

}
?>
