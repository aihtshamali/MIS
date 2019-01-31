<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('monitoringDashboard/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('monitoringDashboard/customestyle.css')}}">
  <link rel="icon" href="{{asset('dgme.png')}}" type="image/x-icon"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  @yield('styleTags')
</head>
<body>
@yield('content')
<script src="{{asset('monitoringDashboard/jquery.min.js')}}"></script>
<script src="{{asset('monitoringDashboard/bootstrap.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function()
  {
      var status = $(document.getElementById('status'));
      console.log();
      var temp= parseInt(status.text().split('%')[0]);
      if (temp<= 25) {
        status.addClass('red');
      }
      else if (temp <= 50 && temp >=25) {
        status.addClass('yel');
      }
      else if (temp<= 75 && temp>= 50) {
        status.addClass('blue');
      }
      else if (temp<= 99 && temp>= 75) {
        status.addClass('green');
      }
      else if (temp== 100) {
        status.addClass('complete');
      }
})
</script>
@yield('script')
</body>
</html>
