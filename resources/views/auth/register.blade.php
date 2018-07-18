@extends('layouts.auth')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-0 p-b-20">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}
					<span style="text-align: center ; text-decoration-color: lightslategray" class="p-b-7">
						<div style="text-align: center ">
								<img href= "#" src="logo.jpg"  alt="AVATAR">
						</div>
                    </span>
                    <div class="row">
                   <div class="col-md-6">
                    <div class="wrap-input100 validate-input m-t-30 m-b-35" data-validate = "Enter First Name">
						<input class="input100" type="text" id="name" name="name" value="{{ old('name') }}">
						<span class="focus-input100" data-placeholder="First Name"></span>
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
                   </div>
                    <div class="col-md-6">
                        <div class="wrap-input100 validate-input m-t-30 m-b-35" data-validate = "Enter Last Name">
                        <input class="input100" type="text" name="Lastname" value="{{old('Lastname')}}">
                            <span class="focus-input100" data-placeholder="Last Name"></span>
                            @if ($errors->has('Lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Lastname') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                   </div>
                    <div class="wrap-input100 validate-input m-b-30" data-validate="Enter Email">
						<input class="input100" id="email" type="email" name="email" value="{{ old('email') }}">
						<span class="focus-input100" data-placeholder="Email Here"></span>
						@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
					</div>
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter password">
						<input class="input100" id="password" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                         @endif
                    </div>
                    <div class="wrap-input100 validate-input m-b-20" data-validate="Confirm password">
						<input class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
                    </div>
                    <div>  <ul class="login-more p-t-5 m-b-10">

                        <span class="txt1">
							<input type="checkbox" > I Accept the
                        </span>
                        <b><a href="#" class="txt2">Terms of Use  </a></b>
                        <span class="txt1">
                            &amp;
                        </span>
                        <b><a href="#" class="txt2"> Privacy Policy. </a></b>
                    </ul>
                    </div>
					<div class="container-login100-form-btn ">
						<button class="login100-form-btn"  >
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
