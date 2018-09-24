@extends('layouts.uppernav')
@section('styletag')
<style>
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
#chartdiv4 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}

#chartdiv5 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv6 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv7 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv8 {
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

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EVALUATION MANAGEMENT SYSTEM
        <small>Global Progress</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-12">
          <div class="col-md-1" style="width:10%;"></div>   
          {{-- chart1 --}}
          <a href="{{route('chart_one')}}">
          <div class="card col-md-2" >
          <div class="card-header">
          <label for="">Histogram of Projects</label>
          </div> 
          <div id="chartdiv"></div>
          </div>
          </a>

          {{-- chart2 --}}
          <a href="{{route('chart_two')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Assigned Projects</label>
          </div> 
          <div id="chartdiv2"></div>
          </div>
          </a>

          {{-- chart 3 --}}
          <a href="{{route('chart_three')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Inprogress Projects</label>
          </div> 
          <div id="chartdiv3"></div>
          </div>
          </a>

          {{-- chart4 --}}
          <a href="{{route('chart_four')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Completed Projects</label>
          </div> 
          <div id="chartdiv4"></div>
          </div>
          </a>
          <div class="col-md-1"></div>
          </div>
        <!-- /.row -->
      </div>
      
      {{-- row 2 --}}

      <div class="row">
          <div class="col-md-12">
          <div class="col-md-1" style="width:10%;"></div>   
          {{-- chart1 --}}
          <a href="{{route('chart_five')}}">
          <div class="card col-md-2" >
          <div class="card-header">
          <label for="">Officer's Progress on Current Projects</label>
          </div> 
          <div id="chartdiv5"></div>
          </div>
          </a>

          {{-- chart2 --}}
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Assigned Projects</label>
          </div> 
          <div id="chartdiv6"></div>
          </div>

          {{-- chart 3 --}}
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Inprogress Projects</label>
          </div> 
          <div id="chartdiv7"></div>
          </div>

          {{-- chart4 --}}
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Histogram of Completed Projects</label>
          </div> 
          <div id="chartdiv8"></div>
          </div>
          <div class="col-md-1"></div>
          </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
{{-- <script>
  $('#chart1-expand').on('click',function(){
    if($("#chart1-expand > i").hasClass('fa-angle-double-right')){
    $('#chart1').hide();
    $('#chart1').addClass('col-md-12');
    $('#chart1').removeClass('col-md-6');
    $('#chart1').show('slow');
    $("#chart1-expand > i").removeClass('fa fa-angle-double-right');
    $("#chart1-expand > i").addClass('fa fa-angle-double-left');
  }
  else{
    $('#chart1').hide();
    $('#chart1').addClass('col-md-6');
    $('#chart1').removeClass('col-md-12');
    $('#chart1').show('slow');
    $("#chart1-expand > i").removeClass('fa fa-angle-double-left');
    $("#chart1-expand > i").addClass('fa fa-angle-double-right');
  }
    });
</script> --}}
{{-- row1 --}}
<script>
    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider": [ {
      "Type": "Total\nProjects",
      "Number of Projects": total_projects
    }, {
      "Type": "Assigned\nProjects",
      "Number of Projects": total_assigned_projects 
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
<script>
    var st = [];
    $i = 0;
    officers.forEach(element => {
      st.push ({ 
        "Name":element.first_name,
        "Number of Projects": assigned_projects[$i]
      });
      $i++;
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
<script>
   var st = [];
    $i = 0;
    officers.forEach(element => {
      st.push ({ 
        "Name":element.first_name,
        "Number of Projects": assigned_inprogress_projects[$i]
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
<script>
  var st = [];
   $i = 0;
   officers.forEach(element => {
     st.push ({ 
       "Name":element.first_name,
       "Number of Projects": assigned_completed_projects[$i]
     });
     $i++;
   });
   var chart = AmCharts.makeChart( "chartdiv4", {
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

{{-- row 2 --}}
{{-- <script>
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
    "dataProvider":st,
    "categoryField": "Name",
    "rotate": true,
    "startDuration": 1,
    "categoryAxis": {
      "gridPosition": "start",
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
</script> --}}
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