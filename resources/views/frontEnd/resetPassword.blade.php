@extends('layouts/frontEnd/layoutLogin')
@section('titleWeb',"Reset Password")
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 mx-auto p-0">
				<div class="mt-5">
					<div class="login-box" style="min-height: 480px !important;">
						<div class="login-snip text-center"> 
                            <label for="">New Password</label>
							<div class="login-space mt-4">
								<form method="POST" action="{{route('updateReset')}}">
                                    @csrf
									<input type="hidden" name="token" value="{{$token}}">
									@error('password')
										<label for="" style="color: #dc5c5c">{{$message}}</label>
									@enderror
									<div class="group">
										<input id="user" type="password" name="password" class="input" placeholder="Enter your password">
									 </div>
									 @error('Re_password')
									 <label for="" style="color: #dc5c5c">{{$message}}</label>
								 	@enderror
                                    <div class="group">
										<input id="user" type="password" name="Re_password" class="input" placeholder="Enter your password"> 
									</div>
									<div class="group">
										 <input type="submit" class="button" value="Reset Password"> 
									</div>
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