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
#chartdiv9 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv10 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv11 {
	width		: 100%;
	height		: 90%;
	font-size	: 5px;
}
#chartdiv12 {
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
          <label for="">Evaluation Total Projects</label>
          </div>
          <div id="chartdiv"></div>
          </div>
          </a>

          {{-- chart2 --}}
          <a href="{{route('chart_two')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Assigned Projects</label>
          </div>
          <div id="chartdiv2"></div>
          </div>
          </a>

          {{-- chart 3 --}}
          <a href="{{route('chart_three')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Inprogress Projects</label>
          </div>
          <div id="chartdiv3"></div>
          </div>
          </a>

          {{-- chart4 --}}
          <a href="{{route('chart_four')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Completed Projects</label>
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
          {{-- chart 5 --}}
          <a href="{{route('chart_five')}}">
          <div class="card col-md-2" >
          <div class="card-header">
          <label for="">Officer's Progress on Current Projects</label>
          </div>
          <div id="chartdiv5"></div>
          </div>
          </a>

          {{-- chart 6--}}
          <a href="{{route('chart_six')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Activities Progress w.r.t Projects</label>
          </div>
          <div id="chartdiv6"></div>
          </div>
          </a>

          {{-- chart 7 --}}
          <a href="{{route('chart_seven')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">SubSector Wise Progress of Projects</label>
          </div>
          <div id="chartdiv7"></div>
          </div>
          </a>

          {{-- chart 9 --}}
          <a href="{{route('chart_nine')}}">
          <div class="card col-md-2">
          <div class="card-header">
          <label for="">Time Against Activities</label>
          </div>
          <div id="chartdiv9"></div>
          </div>
          </a>
          <div class="col-md-1"></div>
          </div>
        <!-- /.row -->
      </div>

      {{-- row 3 --}}
      <div class="row">
          <div class="col-md-12">
          <div class="col-md-1" style="width:10%;"></div>

          {{-- chart 8 --}}
          <a href="{{route('chart_eight')}}">
            <div class="card col-md-4" style="width:36%;">
            <div class="card-header">
            <label for="">Sector Wise Progress</label>
            </div>
            <div id="chartdiv8"></div>
            </div>
            </a>
            <a href="{{route('chart_ten')}}">
              <div class="card col-md-2">
              <div class="card-header">
              <label for=""> Minimum and Maximum time on each Activity</label>
              </div>
              <div id="chartdiv10"></div>
              </div>
            </a>
            <a href="{{ route('GlobalProgressWiseChart') }}">
                <div class="card col-md-2">
                <div class="card-header">
                <label for=""> Total Project's Progress</label>
                </div>
                <div id="chartdiv11"></div>
                </div>
            </a>
          <div class="col-md-1" style="width:10%;"></div>
          </div>
      </div>
      {{-- row 4 --}}
      <div class="row">
          <div class="col-md-12">
          <div class="col-md-1" style="width:10%;"></div>

          {{-- chart 12 --}}
          <a href="{{route('SneWiseChart')}}">
            <div class="card col-md-2" style="width:36%;">
	            <div class="card-header">
	            	<label for="">SNE Wise Projects</label>
	            </div>
	            <div id="chartdiv12"></div>
            </div>
          </a>
          <div class="col-md-1" style="width:10%;"></div>
          </div>
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

{{-- row1 --}}
<script>
    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider": [ {
      "Type": "Total\nProjects",
      "Number of Projects": total_projects
    }, {
      "Type": "UnAssigned\nProjects",
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
		 "Name":element.first_name + " " + element.last_name,
		 "InProgress Projects": assigned_inprogress_projects[$i],
		 "Total Projects": total_assigned_projects[$i]
	 });
	 $i++;
 });
			var chart = AmCharts.makeChart("chartdiv3", {
			 "type": "serial",
					"theme": "none",
			 "categoryField": "Name",
			 "rotate": false,
			 "startDuration": 1,
			 "categoryAxis": {
				 "gridPosition": "middle",
				     "gridAlpha": 0,
				     "tickPosition": "middle",
				     "tickLength": 5,
				     "labelRotation":30,
				     // "ignoreAxisWidth": true,
				     "autoWrap": true
			 },
			 "trendLines": [],
			 "graphs": [
				 {
					 "balloonText": "Total:[[value]]",
					 "fillAlphas": 0.8,
					 "id": "AmGraph-1",
					 "lineAlpha": 0.2,
					 "type": "column",
					 "labelText": "[[value]]",
					 "valueField": "Total Projects"
				 },
				 {
					 "balloonText": "In Progress:[[value]]",
					 "fillAlphas": 0.8,
					 "id": "AmGraph-2",
					 "lineAlpha": 0.2,
					 "type": "column",
					 "labelText": "[[value]]",
					 "valueField": "InProgress Projects"
				 }
			 ],
			 "guides": [],
			 "valueAxes": [
				 {
					 "id": "ValueAxis-1",
					 "position": "left",
					 "axisAlpha": 0
				 }
			 ],
			 "allLabels": [],
			 "balloon": {},
			 "titles": [],
			 "dataProvider": st,
				 "export": {
					 "enabled": true
					}

			 });
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
     var chart = AmCharts.makeChart( "chartdiv6", {
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
   } );
   </script>
<script>
    var st = [];
     $i = 0;
     sub_Sectors.forEach(element => {
      //  console.log(projects_activities_progress[$i][0].eachActivitycount);

       st.push ({
         "Name":element.name,
         "Number of projects": projects_wrt_sectors[$i][0].eachSectorcount
       });
       $i++;
     });
     var chart = AmCharts.makeChart( "chartdiv7", {
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
       "balloonText": "Number of projects:[[value]]",
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
  activities.forEach(element => {
  st.push ({
  "Name":element.name,
  "Time": time_against_activities[$i]
  });
  $i++;
  });
  var chart = AmCharts.makeChart("chartdiv9", {
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
  "balloonText": "Time:[[value]]",
  "fillAlphas": 0.8,
  "lineAlpha": 0.2,
  "type": "column",
  "labelText": "[[value]]",
  "valueField": "Time"
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

{{-- row3 --}}
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
    "stackType": "regular",
    "axisAlpha": 0.5,
    "gridAlpha": 0
    }],
    "graphs": [ {
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
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
    "title": "Assigned Projects",
    "type": "column",
    "color": "#000000",
    "valueField": "Assigned Projects"
    },{
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Inprogress Projects",
    "type": "column",
    "color": "#000000",
    "valueField": "Inprogress Projects"
    },{
    "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
    "fillAlphas": 0.8,
    "labelText": "[[value]]",
    "lineAlpha": 0.3,
    "title": "Completed Projects",
    "type": "column",
    "color": "#000000",
    "valueField": "Completed Projects"
    }],
    "rotate": true,
    "categoryField": "Name",
    "categoryAxis": {
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
<script>
  var st = [];
   $i = 0;
  activities.forEach(element => {
  st.push ({
  "Name":element.name,
  // "Min Time": min_time_against_activities[$i],
  "Average Time": time_against_activities[$i]
  // "Max Time": max_time_against_activities[$i]
  });
  $i++;
  });

  var chart = AmCharts.makeChart( "chartdiv10", {
  "type": "serial",
  "theme": "light",
  "dataProvider": st,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [{
    "balloonText": "Average Time:[[value]] days",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "labelText": "[[value]]",
		"title":"Average Time",
    "valueField": "Average Time"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "Name",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20,
    "labelRotation":30
  },
  "export": {
    "enabled": true
  }

} );

</script>
<script type="text/javascript">
var st = [];
	$i = 0;
	// $count=0;
	projectsprogress.forEach(element => {
		st.push ({
			"Name":projectsprogressranges[$i],
			"Number of Projects": projectsprogress[$i]
		});
		$i++;
	});
	var chart = AmCharts.makeChart( "chartdiv11", {
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
<script type="text/javascript">
var st = [];
	$i = 0;
	// $count=0;
	Sneprojects.forEach(element => {
		st.push ({
			"Name":categories[$i],
			"Number of Projects": Sneprojects[$i]
		});
		$i++;
	});
	var chart = AmCharts.makeChart( "chartdiv12", {
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
$(function() {
			 $('.lazy').lazy();
	 });
</script>
@endsection
