<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/frontEnd/bootstrap-4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/fontawesome/css/all.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('public/frontEnd/owlCarousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontEnd/owlCarousel/owl.theme.default.min.css')}}"> --}}
	   <!-- Toastr Css -->
	<link rel="stylesheet" href="{{asset('public/backEnd/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontEnd/style.css')}}">
	{{-- <link rel="stylesheet" href="{{asset('public/frontEnd/reponsive.css')}}"> --}}
	<style>
		body {
			margin: 0 !important;
			color: #6a6f8c !important;
			/* background: #c8c8c8 !important; */
			background: url('{{asset("public/frontEnd/images/login.jpg")}}') no-repeat;
			background-size: cover;
			font: 600 16px/18px 'Open Sans', sans-serif !important
		}

		.login-box {
			width: 100%;
			margin: auto;
			max-width: 525px;
			min-height: 670px;
			position: relative;
			background: url('public/frontEnd/images/loginImg.jpg') no-repeat center;
			box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
		}

		.login-snip {
			width: 100%;
			height: 100%;
			position: absolute;
			padding: 90px 70px 50px 70px;
			background: rgba(0, 77, 77, .9)
		}

		.login-snip .login,
		.login-snip .sign-up-form {
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			position: absolute;
			transform: rotateY(180deg);
			backface-visibility: hidden;
			transition: all .4s linear
		}

		.login-snip .sign-in,
		.login-snip .sign-up,
		.login-space .group .check {
			display: none
		}

		.login-snip .tab,
		.login-space .group .label,
		.login-space .group .button {
			text-transform: uppercase
		}

		.login-snip .tab {
			font-size: 22px;
			margin-right: 15px;
			padding-bottom: 5px;
			margin: 0 15px 10px 0;
			display: inline-block;
			border-bottom: 2px solid transparent
		}

		.login-snip .sign-in:checked+.tab,
		.login-snip .sign-up:checked+.tab {
			color: #fff;
			border-color: #1161ee
		}

		.login-space {
			min-height: 345px;
			position: relative;
			perspective: 1000px;
			transform-style: preserve-3d
		}

		.login-space .group {
			margin-bottom: 15px
		}

		.login-space .group .label,
		.login-space .group .input,
		.login-space .group .button {
			width: 100%;
			color: #fff;
			display: block
		}

		.login-space .group .input,
		.login-space .group .button {
			border: none;
			padding: 15px 20px;
			border-radius: 25px;
			background: rgba(255, 255, 255, .1)
		}

		.login-space .group input[data-type="password"] {
			text-security: circle;
			-webkit-text-security: circle
		}

		.login-space .group .label {
			color: #aaa;
			font-size: 12px
		}

		.login-space .group .button {
			background: #1161ee
		}

		.login-space .group label .icon {
			width: 15px;
			height: 15px;
			border-radius: 2px;
			position: relative;
			display: inline-block;
			background: rgba(255, 255, 255, .1)
		}

		.login-space .group label .icon:before,
		.login-space .group label .icon:after {
			content: '';
			width: 10px;
			height: 2px;
			background: #fff;
			position: absolute;
			transition: all .2s ease-in-out 0s
		}

		.login-space .group label .icon:before {
			left: 3px;
			width: 5px;
			bottom: 6px;
			transform: scale(0) rotate(0)
		}

		.login-space .group label .icon:after {
			top: 6px;
			right: 0;
			transform: scale(0) rotate(0)
		}

		.login-space .group .check:checked+label {
			color: #fff
		}

		.login-space .group .check:checked+label .icon {
			background: #1161ee
		}

		.login-space .group .check:checked+label .icon:before {
			transform: scale(1) rotate(45deg)
		}

		.login-space .group .check:checked+label .icon:after {
			transform: scale(1) rotate(-45deg)
		}

		.login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
			transform: rotate(0)
		}

		.login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
			transform: rotate(0)
		}

		*,
		:after,
		:before {
			box-sizing: border-box
		}

		.clearfix:after,
		.clearfix:before {
			content: '';
			display: table
		}

		.clearfix:after {
			clear: both;
			display: block
		}

		a {
			color: inherit;
			text-decoration: none
		}

		.hr {
			height: 2px;
			margin: 60px 0 50px 0;
			background: rgba(255, 255, 255, .2)
		}

		.foot {
			text-align: center
		}

		.card {
			width: 500px;
			left: 100px
		}

		::placeholder {
			color: #b3b3b3
		}
		.box_back_home{
			position: fixed;
			z-index: 99999;
			height: 60px;
			width: 60px;
			top:40%;
			left: 10%;
			background: orange;
			text-align: center;
			line-height: 60px;
			border-radius: 50%;
			border: solid 2px #fff;
			transition:  all 0.6s;
		}
		@media screen and (max-width:768px){
			.box_back_home{
				left: 1% !important;
			}
			.box_controll {
    position: fixed;
    top: 84%;
    left: 12%;
    z-index: 99999999;
}
		}
	</style>
    <title>@yield('titleWeb')</title>
</head>

<body>
	@yield('content')
</body>
<script src="{{asset('public/frontEnd/Js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('public/frontEnd/Js/popper.min.js')}}"></script>
  <!-- Toastr SCRIPTS -->
  <script src="{{asset('public/backEnd/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('public/frontEnd/bootstrap-4.4.1/js/bootstrap.min.js')}}"></script>
{{-- <script src="{{asset('public/frontEnd/fontawesome/js/all.js')}}"></script>
<script src="{{asset('public/frontEnd/owlCarousel/owl.carousel.js')}}"></script> --}}
{{-- <script src="{{asset('public/frontEnd/Js/myJs.js')}}"></script> --}}
<script>
	setInterval(function(){
		$('.box_back_home').css('top','42%');
	 }, 2600);
	 setInterval(function(){
		$('.box_back_home').css('top','40%');
	 }, 3800);
</script>
@if (Session::has('success'))
    <script>
        Command: toastr["success"]("{{Session::get('success')}}")
    </script>
@endif
@if (Session::has('error'))
    <script>
        Command: toastr["error"]("{{Session::get('error')}}")
    </script>
@endif
@error('name')
	<script>
		Command: toastr["error"]("{{$message}}")
	</script>
@enderror
@error('email')
	<script>
		Command: toastr["error"]("{{$message}}")
	</script>
@enderror
@error('password')
	<script>
		Command: toastr["error"]("{{$message}}")
	</script>
@enderror
@error('rePassword')
	<script>
		Command: toastr["error"]("{{$message}}")
	</script>
@enderror
<script>
    toastr.options = 
{
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
</script>


</html>