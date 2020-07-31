@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','User')
@section('title_form','User')
@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <form class="card card-primary card-outline" method="POST"  enctype="multipart/form-data" id="upload_form">
      @csrf
      <input type="hidden" name="id" value="{{Auth::user()->id}}">
      <div class="card-body box-profile">
        <div class="text-center">
          <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
              <label for="imageUpload"><i class="fas fa-pen"></i></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreview" style="background-image: url(@if (Auth::user()->avatar!=null)storage/app/{{Auth::user()->avatar}}@else{{$avatar}}@endif);">
              </div>
            </div>
          </div>
        </div>

        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

        <p class="text-muted text-center"> 
          @if (Auth::user()->level==1)
          ( Admin )
        @else
          ( Root Admin )
        @endif
      </p>
        {{-- <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Followers</b> <a class="float-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="float-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="float-right">13,287</a>
          </li>
        </ul> --}}

        <button type="submit" class="btn btn-primary btn-block"><b>Update Avatar</b></button>
      </div>
      <!-- /.card-body -->
    </form>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">About Me</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

        <p class="text-muted">{{Auth::user()->address}}</p>

        <hr>

        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

        <p class="text-muted">
          <span class="tag tag-danger">UI Design</span>
          <span class="tag tag-success">Coding</span>
          <span class="tag tag-info">Javascript</span>
          <span class="tag tag-warning">PHP</span>
          <span class="tag tag-primary">Node.js</span>
        </p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
          <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <div class="timeline timeline-inverse">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-danger">
                  10 Feb. 2014
                </span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-primary"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> 12:05</span>

                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-info"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                  <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                  </h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-warning"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-success">
                  3 Jan. 2014
                </span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-camera bg-purple"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="far fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane active" id="settings">
            <form class="form-horizontal" method="POST" action="{{route('user.update',Auth::user()->id)}}">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{Auth::user()->id}}">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  @error('name')
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @enderror
                  <input type="text" class="form-control @error('name') is-invalid  @enderror" id="inputName" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  @error('email')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @enderror
                  <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="inputEmail" placeholder="Email" name="email" value="{{Auth::user()->email}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail1" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                  @error('phone')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @enderror
                  <input type="tel" class="form-control @error('phone') is-invalid  @enderror" id="inputEmail1" placeholder="Phone Number" name="phone" value="{{Auth::user()->phone}}">
                </div>
              </div>
               <div class="form-group">
                @error('address')
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                @else
                <label for="">Address</label>
                @enderror
                <input type="text" class="form-control @error('address') is-invalid  @enderror " placeholder="Enter address..." name="address" value="{{Auth::user()->address}}" tabindex="5">
              </div>
              <div class="form-group">
                @error('birth_day')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                @else
                  <label for="">Birth day</label>
                @enderror
                <input type="date" class="form-control @error('birth_day') is-invalid  @enderror " placeholder="Enter birth day..." name="birth_day" value="{{Auth::user()->birth_day}}" tabindex="6">
              </div>
              <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                  @error('oldPassword')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @enderror
                  <input type="password" class="form-control @error('oldPassword') is-invalid  @enderror" id="inputName2" placeholder="Old Password" name="oldPassword">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName3" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputName3" placeholder="New Password" name="newPassword">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName4" class="col-sm-2 col-form-label">Confirm New Password</label>
                <div class="col-sm-10">
                  @error('repPassword')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                  @enderror
                  <input type="password" class="form-control @error('repPassword') is-invalid  @enderror" id="inputName4" placeholder="Confirm New Password" name="repPassword">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
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