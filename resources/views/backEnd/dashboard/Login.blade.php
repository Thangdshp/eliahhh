<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <base href="{{asset('')}}">
  <title>@yield('title_page')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/backEnd/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/backEnd/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="public/backEnd/dist/font/css.css" rel="stylesheet">
   <!-- Toastr Css -->
  <link rel="stylesheet" href="public/backEnd/plugins/toastr/toastr.min.css">
  {{-- Datatables Css --}}
  <link rel="stylesheet" href="public/backEnd/plugins/datatables/datatables.min.css">
  {{-- Style me Css --}}
  <link rel="stylesheet" href="public/backEnd/style.css">
</head>
  <body class="login-page">
    
    <div class="login-box">
        <div class="login-logo">
         <b>Admin</b>Eliah
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
      
            <form action="{{route('admin.postLogin')}}" method="post">
              @csrf
              <div class="form-group mb-3">
                @error('email')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                @enderror
                <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="Email" name="email" value="{{old('email')}}">
              </div>
              <div class="form-group mb-3">
                @error('password')
                  <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                @enderror
                <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" name="password">
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <!-- /.social-auth-links -->
      
            <p class="mb-1">
            <a href="{{route('forgotPassword.index')}}">I forgot my password</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
    </div>
    
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
  <!-- REQUIRED SCRIPTS -->
  
  <!-- jQuery -->
  <script src="public/backEnd/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="public/backEnd/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="public/backEnd/dist/js/adminlte.js"></script>
  
  <!-- OPTIONAL SCRIPTS -->
  <script src="public/backEnd/plugins/chart.js/Chart.min.js"></script>
  <!-- DataTable SCRIPTS -->
  <script src="public/backEnd/plugins/datatables/datatables.min.js"></script>
  <!-- Toastr SCRIPTS -->
  <script src="public/backEnd/plugins/toastr/toastr.min.js"></script>
  <script>$('#myTable').DataTable();</script>
  <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
   @yield('alert')
  </body>
</html>
