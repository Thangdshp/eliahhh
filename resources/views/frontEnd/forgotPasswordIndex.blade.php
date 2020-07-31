@extends('layouts/frontEnd/layoutLogin')
@section('titleWeb',"Forgot Password")
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 mx-auto p-0">
				<div class="mt-5">
					<div class="login-box" style="min-height: 480px !important;">
						<div class="login-snip text-center"> 
                            <label for="">Forgot Password</label>
							<div class="login-space mt-4">
								<form method="POST" action="{{route('resetPasswordPost')}}">
									@csrf
									<div class="group"><input id="user" type="email" name="email" class="input" placeholder="Enter your email"> </div>
									<div class="group"> <input type="submit" class="button" value="Reset Password"> </div>
									<div class="hr"></div>
								<div class="foot"> <a href="{{route('customer.login')}}">Login?</a> </div>
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