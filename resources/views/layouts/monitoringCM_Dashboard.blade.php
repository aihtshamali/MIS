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
  <div class="col-md-12 border-bottom header inline-flex">
    <div class="col-md-1">
      <a href="{{route('monitoringDashboard')}}">
        <img class="w_46p" id="logo" src="{{ asset('dgme.png')}}" alt="DGME Logo" />
      </a>
    </div>
    <div class="col-md-10">
      <h2 class="text-center">Directorate General Monitoring & Evaluation / Monitoring Dashboard</h2>
    </div>
  </div>
  <div class="col-md-12" style="margin-bottom:6%;">
  </div>
@yield('content')
<script src="{{asset('monitoringDashboard/jquery.min.js')}}"></script>
<script src="{{asset('monitoringDashboard/bootstrap.min.js')}}"></script>
@yield('script')
</body>
</html>
