<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700&amp;subset=latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('landingAssets/css/ideaboxNews.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landingAssets/css/jquery.mCustomScrollbar.min.css') }}" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landingAssets/css/style5.css') }}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>



</head>
<style>
    body {
        font-family: Ubuntu, Arial, Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 0;
        margin: 0;
    }

    .container {
        width: 30%;
        height: auto;
        margin: 100px auto 0 auto;
    }

    header {
        width: 100%;
        min-height: 100px;
        padding: 20px;
        background: url(trash/bgnoise_lg.png);
        text-align: center;
        border-bottom: solid 2px #333;
        box-sizing: border-box;
    }

    header h1 {
        font-weight: normal;
        font-size: 36px;
        padding: 0;
        margin: 0;
    }

    header h3 {
        padding: 0;
        margin: 0;
    }

    header .examples {
        width: 100%;
        height: auto;
        padding: 20px 0;
    }

    header .examples a {
        display: inline-block;
        padding: 10px 20px;
        background: #333;
        text-decoration: none;
        color: #FFF;
    }

    header .examples a.active {
        background: #C00;
    }

    .example_img {
        width: 100%;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
        background: #333;
        margin-top: 50px;
    }

    .example_img img {
        display: inline-block;
        width: 100%;
    }
</style>
</head>
<body>
@yield('content')


<script src="{{asset('landingAssets/js/jQuery.js') }}"></script>
<script src="{{asset('landingAssets/js/jquery.mCustomScrollbar.min.js') }}"></script>
<script src="{{ asset('landingAssets/js/ideaboxNews.js') }}"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>

<script type="text/javascript">

    $(document).ready(function (e) {
        $(".ideaboxNews").ideaboxNews({
            maxwidth: '350px',
            position: 'rightfixed',
            openspeed: 'fast'
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });

    $("a[href^='#']").click(function(e) {
  	e.preventDefault();

  	var position = $($(this).attr("href")).offset().top;

  	$("body, html").animate({
  		scrollTop: position
  	},1000);
  });

</script>
</body>

</html>
