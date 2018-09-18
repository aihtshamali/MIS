@extends('layouts.uppernav')
@section('styletag')
<style>
.box-body { background-color: #30303d; color: #fff; }
#chartdiv {
  width: 100%;
  height: 500px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
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
        <div class="col-md-6"  id="chart1">
          {{--  Chart 1  --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Status of Activities</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button id="chart1-expand" type="button" class="btn btn-box-tool" ><i class="fa fa-angle-double-right"></i></button>
              </div>
            </div>
            <div class="box-body" >
                <div id="chartdiv"></div>
              {{-- <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div> --}}
            </div>
            <!-- /.box-body -->
          </div>

        </div>

        <!-- /.col (LEFT) -->

        <div class="col-md-6">
         {{--  Chart 4 --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Recieved Incomplete Projects</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          

         {{--  Chart 5--}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Problematic and System Generated Projects </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

        {{--  Chart 6--}}
          <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Average MIN &amp; MAX Time For Activities </h3>
    
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fas fa-arrows-alt-h"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
@section('scripttags')
<script src="{{asset('js/charts/amcharts.js')}}"></script>
<script src="{{asset('js/charts/serial.js')}}"></script>
<script src="{{asset('js/charts/export.min.js')}}"></script>
<script src="{{asset('js/charts/dark.js')}}"></script>
<script>
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
</script>
<script>
  var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "dark",
  "marginRight": 70,
  "dataProvider": [{
    "country": "USA",
    "visits": 3025,
    "color": "#FF0F00"
  }, {
    "country": "China",
    "visits": 1882,
    "color": "#FF6600"
  }, {
    "country": "Japan",
    "visits": 1809,
    "color": "#FF9E01"
  }, {
    "country": "Germany",
    "visits": 1322,
    "color": "#FCD202"
  }, {
    "country": "UK",
    "visits": 1122,
    "color": "#F8FF01"
  }, {
    "country": "France",
    "visits": 1114,
    "color": "#B0DE09"
  }, {
    "country": "India",
    "visits": 984,
    "color": "#04D215"
  }, {
    "country": "Spain",
    "visits": 711,
    "color": "#0D8ECF"
  }, {
    "country": "Netherlands",
    "visits": 665,
    "color": "#0D52D1"
  }, {
    "country": "Russia",
    "visits": 580,
    "color": "#2A0CD0"
  }, {
    "country": "South Korea",
    "visits": 443,
    "color": "#8A0CCF"
  }, {
    "country": "Canada",
    "visits": 441,
    "color": "#CD0D74"
  }],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Visitors from country"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});
</script>
@endsection