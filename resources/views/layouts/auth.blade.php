<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" style="width:50%" href="logo.jpg"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" href="{{ asset('authCss/bootstrap.min.css')}}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('authCss/font-awesome.min.css')}}"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('authCss/material-design-iconic-font.min.css')}}"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('authCss/animate.css')}}"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('authCss/hamburgers.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('authCss/animsition.min.css')}}">
	<!--===============================================================================================-->

		<link rel="stylesheet" type="text/css" href="{{asset('authCss/select2.min.css')}}">
	<!--===============================================================================================-->

		<link rel="stylesheet" type="text/css" href="{{asset('authCss/daterangepicker.css')}}">
	<!--===============================================================================================-->

		<link rel="stylesheet" type="text/css" href="{{asset('authCss/util.css')}}">
			<link rel="stylesheet" type="text/css" href="{{asset('authCss/main.css')}}">
	<!--===============================================================================================-->
    </head>
<body>
@yield('content')

</body>
</html>
