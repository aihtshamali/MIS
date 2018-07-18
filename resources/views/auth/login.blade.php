@extends('layouts.auth')
@section('content')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-20">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
					</span>
					<span style="text-align: center ; text-decoration-color: lightslategray" class="p-b-7">
						<div style="text-align: center ">
								<img src="logo.jpg"  alt="AVATAR">
						</div>

					</span>

					<div class="wrap-input100 validate-input m-t-40 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" id="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100" data-placeholder="Email"></span>
                        @if ($errors->has('email'))
                             <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input m-b-15" data-validate="Enter password">
						<input class="input100" id="password" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn"  >
							Login
						</button>
					</div>

					<ul class="login-more p-t-50 m-b-8">

							<span class="txt1">
								Forgot
							</span>
							<b>
							<a href="#" class="txt2">

									Username  /  Password?

							</a>
							</b>
							<b>
								<a href="/register" class="txt2" style=" float : right; margin-left: 20px;">
									 Sign up
								</a>
							</b>

					</ul>
				</form>
			</div>
		</div>
	</div>

@endsection
