@extends('layouts.uppernav')
@section('styletag')
<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>
    .text_center{text-align:center !important;font-size: 20px;line-height: 12px;word-spacing: 1px;}
    .clr_yel{color:#f39c12 !important;font-weight: bolder;font-style: italic;}
    th,td{text-align:center;}

    /* Charts  */
    #chartdiv {
    	width		: 100%;
    	height		: 90%;
    	font-size	: 5px;
    }
    #chartdiv2 {
    	width		: 100%;
    	height		: 90%;
    	font-size	: 5px;
    }
    #chartdiv3 {
    	width		: 100%;
    	height		: 90%;
    	font-size	: 5px;
    }
  .card{
      /* width:250px; */
      background:white;
      margin: 15px;
      border-radius: 5px;
      height: 200px;
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
      margin: 15px;
      border-radius: 5px;
      height: 200px;
     -webkit-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
    -moz-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
    box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
    }

  </style>
  <link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />

@endsection
@section('content')
<div class="content-wrapper">
    <section class="well " style="text-align:center">
        <h3>Welcome {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}} to your Dashboard </h3>
    </section>
    @role('officer')


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Global Score Ranking</h3>
            <div class="box-body">
                <div class="progress" style="height:30px;text-align:center">
                    <div class="progress-bar" style="width:{{ $current_score }}%;height:30px" role="progressbar" aria-valuenow="{{ $current_score }}" aria-valuemin="0" aria-valuemax="{{ $max_score }}">
                            <p style="margin-top:5px">{{ $current_score }}</p>
                    </div>
                </div>
            </div>
            <p class="text_center">Your Rank is <span class="clr_yel">{{ $rank }}</span> out of <span class="clr_yel">{{ count($person) }}</span> Evaluators</p>
            <p class="text_center">Your Relative Score is <span class="clr_yel">{{ $current_score }}</span> out of <span class="clr_yel">{{ $max_score }}</span></p>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="{{route('officer_chart_one')}}">
          <div class="card col-md-2">
            <div class="card-header">
              <label for="">Evaluation Total Projects</label>
            </div>
          <div id="chartdiv" style="overflow: visible; text-align: left;">

          </div>
        </div>
        </a>
        {{-- Chart two --}}
        <a href="{{route('officer_chart_two')}}">
          <div class="card col-md-2">
            <div class="card-header">
              <label for="">Projects Progress</label>
            </div>
            <div id="chartdiv2" style="overflow: visible; text-align: left;">

            </div>
          </div>
        </a>
        {{-- chart 3--}}
        <a href="{{route('officer_chart_three')}}">
          <div class="card col-md-2">
            <div class="card-header">
              <label for="">Activities Progress w.r.t Projects</label>
            </div>
            <div id="chartdiv3">

            </div>
          </div>
        </a>
      </div>
    </div>
    @endrole
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


  {{-- row1 --}}
  <script>
      var chart = AmCharts.makeChart( "chartdiv", {
      "type": "serial",
      "theme": "light",
      "dataProvider": [ {
        "Type": "Total\nProjects",
        "Number of Projects": total_projects
      }, {
        "Type": "Inprogress\nProjects",
        "Number of Projects": inprogress_projects
      }, {
        "Type": "Completed\nProjects",
        "Number of Projects": completed_projects
      } ],
      "valueAxes": [ {
        "gridColor": "#FFFFFF",
        "gridAlpha": 0.2,
        "dashLength": 0
      } ],
      "gridAboveGraphs": true,
      "startDuration": 1,
      "graphs": [ {
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.8,
        "lineAlpha": 0.2,
        "type": "column",
        "labelText": "[[value]]",
        "valueField": "Number of Projects"
      } ],
      "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
      },
      "categoryField": "Type",
      "categoryAxis": {
        "gridPosition": "middle",
        "gridAlpha": 0,
        "tickPosition": "middle",
        "tickLength": 5,
        "labelRotation":30,
        // "ignoreAxisWidth": true,
        "autoWrap": true
      },
      "export": {
        "enabled": true
      }

    } );
  </script>
  <script type="text/javascript">
  var st = [];
  	var i = 0;
  	// $count=0;
  	projectsprogress.forEach(element => {
  		st.push ({
  			"Name":projectsprogressranges[i],
  			"Number of Projects": projectsprogress[i]
  		});
  		i++;
  	});
  	var chart = AmCharts.makeChart( "chartdiv2", {
  	"type": "serial",
  	"theme": "light",
  	"dataProvider":st,
  	"valueAxes": [ {
  		"gridColor": "#FFFFFF",
  		"gridAlpha": 0.2,
  		"dashLength": 0
  	} ],
  	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
  		"balloonText": "[[category]]: <b>[[value]]</b>",
  		"fillAlphas": 0.8,
  		"lineAlpha": 0.2,
  		"type": "column",
  		"labelText": "[[value]]",
  		"valueField": "Number of Projects"
  	} ],
  	"chartCursor": {
  		"categoryBalloonEnabled": false,
  		"cursorAlpha": 0,
  		"zoomable": false
  	},
  	"categoryField": "Name",
  	"categoryAxis": {
  		"autoGridCount": false,
  		"equalSpacing": true,
  		"gridCount": 1000,
  		"gridPosition": "middle",
  		"gridAlpha": 0,
  		"tickPosition": "middle",
  		"tickLength": 5,
  		"labelRotation":30,
  		// "ignoreAxisWidth": true,
  		"autoWrap": true
  	},
  	"export": {
  		"enabled": true
  	}

  } );

  </script>
{{-- Chart Three --}}
  <script>
  var st = [];
   $i = 0;
   activities.forEach(element => {
     st.push ({
       "Name":element.name,
       "Number of projects": projects_activities_progress[$i],

     });
     $i++;
   });
  var chart = AmCharts.makeChart( "chartdiv3", {
    "type": "serial",
    "theme": "light",
    "dataProvider":st,
    "valueAxes": [ {
      "gridColor": "#FFFFFF",
      "gridAlpha": 0.2,
      "dashLength": 0
    } ],
    "gridAboveGraphs": true,
    "startDuration": 1,
    "graphs": [ {
      "balloonText": "Number Of projects:[[value]]",
      "fillAlphas": 0.8,
      "lineAlpha": 0.2,
      "type": "column",
      "labelText": "[[value]]",
      "valueField": "Number of projects"
    } ],
    "chartCursor": {
      "categoryBalloonEnabled": false,
      "cursorAlpha": 0,
      "zoomable": false
    },
    "categoryField": "Name",
    "categoryAxis": {

    "gridPosition": "middle",
    "gridAlpha": 0,
    "tickPosition": "middle",
    "tickLength": 5,
    "labelRotation":30,
    // "ignoreAxisWidth": true,
   //  "autoWrap": true
   },
   "export": {
     "enabled": true
   }
 });
</script>

@endsection
