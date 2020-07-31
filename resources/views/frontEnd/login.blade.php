@extends('layouts/frontEnd/layoutLogin')
@section('titleWeb',"Login")
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 mx-auto p-0">
				<div class="mt-5">
					<div class="login-box">
						<div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
							<div class="login-space">
								<form class="login" method="POST" action="{{route('customer.login_post')}}">
									@csrf
									<div class="group"> <label for="user" class="label">Email</label> <input id="user" type="email" name="email" class="input" placeholder="Enter your email"> </div>
									<div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" name="password" class="input" data-type="password" placeholder="Enter your password"> </div>
									<div class="group"> <input id="check" type="checkbox" class="check" checked value="1"> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
									<div class="group"> <input type="submit" class="button" value="Sign In"> </div>
									<div class="hr"></div>
								<div class="foot"> <a href="{{route('forgotPassword.index')}}">Forgot Password?</a> </div>
								</form>
								<form class="sign-up-form" method="POST" action="{{route('customer.registration')}}">
									@csrf
									<div class="group"> <label for="user" class="label">Name</label> <input id="user" type="text" name="name" class="input" placeholder="Create your Username"> </div>
									<div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" name="password" class="input" data-type="password" placeholder="Create your password"> </div>
									<div class="group"> <label for="pass" class="label">Repeat Password</label> <input id="pass" type="password" name="rePassword" class="input" placeholder="Repeat your password"> </div>
									<div class="group"> <label for="pass" class="label">Email Address</label> <input id="pass" name="email" type="email" class="input" placeholder="Enter your email address"> </div>
									<div class="group"> <input type="submit" class="button" value="Sign Up"> </div>
									<div class="hr"></div>
									<div class="foot"> <label for="tab-1">Already Member?</label> </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="{{route('index')}}" class="box_back_home">
			Home
	</a>
@endsection