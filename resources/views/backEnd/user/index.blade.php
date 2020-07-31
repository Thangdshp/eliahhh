@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','User')
@section('title_form','User')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List User</strong></h3>
        <div class="card-tools">
            <a href="{{route('user.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Price Space</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th>STT</th>
              <th>Avatar</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Level</th>
              <th>Status</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                @if ($user->level!=3)
                  <tr class="text-center">
                    <td>{{$loop->index+1}}</td>
                    <td>
                      <img src="storage/app/{{$user->avatar}}" alt="No image" class="imgPreview"> 
                    
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                      @if ($user->level==1)
                        Admin
                      @elseif($user->level==2)
                        Customer
                      @else
                      Root Admin
                      @endif
                    </td>
                    <td>
                      @if ($user->user_status==1)
                        Enable
                        <br>
                      <form action="{{route('user.updateStatus')}}" method="POST" id='submit_status_{{$user->id}}'>
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="id_auth" value="{{Auth::user()->id}}">
                        <label class="switch">
                          <input type="checkbox" checked onclick="updateStatus('submit_status_{{$user->id}}')">
                          <span class="slider"></span>
                        </label>
                      </form>
                      @else
                        Disable
                        <br>
                        <form action="{{route('user.updateStatus')}}" method="POST" id='submit_status_{{$user->id}}'>
                          @csrf
                          <input type="hidden" name="id" value="{{$user->id}}">
                          <input type="hidden" name="id_auth" value="{{Auth::user()->id}}">
                          <label class="switch">
                            <input type="checkbox" onclick="updateStatus('submit_status_{{$user->id}}')">
                            <span class="slider"></span>
                          </label>
                        </form>
                      @endif
                    </td> 
                    <td>
                    <form action="{{route('user.destroy',$user->id)}}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </td>
                  </tr>
                @endif
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