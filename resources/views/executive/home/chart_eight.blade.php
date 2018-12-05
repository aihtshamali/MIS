@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv8 {
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
        Sector Wise Projects

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
                        <div id="chartdiv8"></div>
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
          sectors.forEach(element => {
            st.push ({
              "Name":element.name,
              "Total Projects":totalprojects_wrt_sectors[$i][0].eachtotalproject,
              "Assigned Projects": assignedprojects_wrt_sectors[$i][0].eachproject,
              "Inprogress Projects": inprogressprojects_wrt_sectors[$i][0].eachinprogressproject,
              "Completed Projects": completedprojects_wrt_sectors[$i][0].eachcompletedproject

            });
            $i++;
          });
          console.log(st);

       var chart = AmCharts.makeChart("chartdiv8", {
         "type": "serial",
         "theme": "light",
         "legend": {
         "horizontalGap": 10,
         "maxColumns": 1,

         "position": "right",
         "useGraphSettings": true,
             "markerSize": 10
         },
         "dataProvider": st,
         "valueAxes": [{
           "title":"Projects",
             "stackType": "regular",
             "axisAlpha": 0.5,
             "gridAlpha": 0
         }],
         "graphs": [ {
             "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
             "fillAlphas": 0.8,
             "columnWidth":0.6,
             "labelText": "[[value]]",
             "lineAlpha": 0.3,
             "title": "Total Projects",
             "type": "column",
             "color": "#000000",
             "valueField": "Total Projects"
         },{
             "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
             "fillAlphas": 0.8,
             "labelText": "[[value]]",
             "lineAlpha": 0.3,
             "columnWidth":0.6,
             "title": "Assigned Projects",
             "type": "column",
                 "color": "#000000",
             "valueField": "Assigned Projects"
         }
         ,{
             "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
             "fillAlphas": 0.8,
             "labelText": "[[value]]",
             "lineAlpha": 0.3,
             "columnWidth":0.6,
             "title": "Inprogress Projects",
             "type": "column",
                 "color": "#000000",
             "valueField": "Inprogress Projects"
         },{
             "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
             "fillAlphas": 0.8,
             "labelText": "[[value]]",
             "lineAlpha": 0.3,
             "columnWidth":0.6,
             "title": "Completed Projects",
             "type": "column",
                 "color": "#000000",
             "valueField": "Completed Projects"
         }],
         "rotate": true,
         "categoryField": "Name",
         "categoryAxis": {
           "title":"Sectors",
            "autoGridCount": false,
      "equalSpacing": true,
      "gridCount": 1000,
             "gridPosition": "start",
             "axisAlpha": 0,
             "gridAlpha": 0,
             "position": "left"
         },
         "export": {
             "enabled": true
          }
     });
     </script>
@endsection
