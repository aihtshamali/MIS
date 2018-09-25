@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv5 {
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
  .lightblue{
    font-size: 0px;
    background-color: #0D8ECF;
    padding: 9px;
    margin: 2px;
    color:#0D8ECF;
  }
  .blue{
    font-size: 0px;
    background-color:#0D52D1;
    padding: 9px;
    margin: 2px;
    color:#0D52D1;
  }
  .darkblue{
    font-size: 0px;
    background-color:#2A0CD0;
    padding: 9px;
    margin: 2px;
    color:#2A0CD0;
  }
  .purple{
    color:#8A0CCF;
    font-size: 0px;
    background-color:#8A0CCF;
    padding: 9px;
    margin: 2px;

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
          Officer's Progress on Current/Inprogress Projects
          <small>Global Progress</small>
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
                        <div id="chartdiv5"></div>
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
  var st = [];
  $i = 0;

  officers.forEach(element => {
  st.push ({ 
    "Name": element.first_name,
    "Progress": assigned_current_projects[$i]
  });
  $i++;
  });

  var chart = AmCharts.makeChart("chartdiv5", {
  "type": "serial",
  "theme": "none",
  "dataProvider": st,
  "categoryField": "Name",

  "rotate": true,
  "startDuration": 1,
  "categoryAxis": {
  "gridPosition": "start",
  "autoWrap": true,
  "position": "left"
  },
  "trendLines": [],
  "graphs": [
  {
  "balloonText": "Progress:[[value]]",
  "fillAlphas": 0.8,
  "id": "AmGraph-1",
  "lineAlpha": 0.2,
  "title": "Progress",
  "type": "column",
  "valueField": "Progress"
  }
  ],
  "guides": [],
  "valueAxes": [
  {
  "id": "ValueAxis-1",
  "position": "bottom",
  "axisAlpha": 0
  }
  ],
  "allLabels": [],
  "balloon": {},
  "titles": [],
  "export": {
  "enabled": true
  }

  });
    </script>
@endsection