@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv10 {
  width		: 100%;
  height	: 90%;
  font-size	: 15px;
  }
  .card{
  /* width:250px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  -moz-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  }
  .card-header{
  height:10%;
  text-align: center;
  }

  a{
  color: black;
  }

  .card:hover{
  /* width:357px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  -moz-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  }

</style>

@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Minimum and Maximum time on each Activity

        </h1>
        <ol class="breadcrumb">
        <li><a href="{{route('Exec_pems_tab')}}"><i class="fa fa-backward" ></i>Back</a></li>
          {{-- <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li> --}}
        </ol>
    </section>

    <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card col-md-12" >
                        <div class="card-header">
                        </div>
                        <div id="chartdiv10"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
    </section>

</div>
@endsection
@section('scripttags')
<script src="{{asset('js/charts/amcharts.js')}}"></script>
<script src="{{asset('js/charts/serial.js')}}"></script>
<script src="{{asset('js/charts/fabric.min.js')}}"></script>
<script src="{{asset('js/charts/FileSaver.min.js')}}"></script>
<script src="{{asset('js/charts/jszip.min.js')}}"></script>
<script src="{{asset('js/charts/pdfmake.min.js')}}"></script>
<script src="{{asset('js/charts/export.min.js')}}"></script>
<script src="{{asset('js/charts/dark.js')}}"></script>
<script src="{{asset('js/charts/black.js')}}"></script>
<script src="{{asset('js/charts/chalk.js')}}"></script>
<script src="{{asset('js/charts/light.js')}}"></script>
<script src="{{asset('js/charts/patterns.js')}}"></script>

<script>
        var st=[];
        $i = 0;
       activities.forEach(element => {
       st.push ({
        "Name":element.name,
  "Min Time": min_time_against_activities[$i],
  "Average Time": time_against_activities[$i],
  "Max Time": max_time_against_activities[$i]
       });
       $i++;
       });

       var chart = AmCharts.makeChart( "chartdiv10", {
       "type": "serial",
       "theme": "light",
       "dataProvider": st,
       "valueAxes": [ {
         "title":"Time",
         "gridColor": "#FFFFFF",
         "gridAlpha": 0.2,
         "dashLength": 0
       } ],
       "gridAboveGraphs": true,
       "startDuration": 1,
       "graphs": [ {
         "balloonText": "Min Time: [[value]] Days",
         "fillAlphas": 0.8,
         "lineAlpha": 0.2,
    "labelText": "[[value]]",
         "type": "column",
         "title":"Min Time",
         "valueField": "Min Time"
       } ,{
         "balloonText": "Average Time:[[value]] Days",
         "fillAlphas": 0.8,
          "labelText": "[[value]]",
         "lineAlpha": 0.2,
         "type": "column",
          "title":"Average Time",
         "valueField": "Average Time"
       } ,{
         "balloonText": "Max Time: [[value]] Days",
         "fillAlphas": 0.8,
         "lineAlpha": 0.2,
         "type": "column",
         "labelText": "[[value]]",
        "title":"Max Time",
         "valueField": "Max Time"
       } ],
       "chartCursor": {
         "categoryBalloonEnabled": false,
         "cursorAlpha": 0,
         "zoomable": false
       },
       "categoryField": "Name",
       "categoryAxis": {
         "title":"Activities",
        "autoGridCount": false,
        "equalSpacing": true,
        "gridCount": 1000,
         "gridPosition": "start",
         "gridAlpha": 0,
         "tickPosition": "middle",
         "tickLength": 20,
         "autoWrap": true
       },
       "export": {
         "enabled": true
       }

     } );
     </script>
@endsection
