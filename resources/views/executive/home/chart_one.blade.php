@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
    #chartdiv {
  width		: 100%;
  height		: 80%;
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
  height:5%;
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
  .dark-grey{
    font-size: 0px;
    background-color:#5c5c5c;
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
  .card-footer{
  height:15%;

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
            Evaluation Total Projects

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
                        <label for=""></label>
                        </div>
                        <div id="chartdiv"></div>
                        <div class="card-footer" >
                          <div style="padding:5px;display:inline-block;">
                            <span class="lightblue">-</span>
                            <label style="vertical-align:-webkit-baseline-middle;">{{$total_projects}} Total Projects</label>
                        </div>
                        <div style="padding:5px; display:inline-block;">
                            <span class="dark-grey">-</span>
                            <label style="vertical-align:-webkit-baseline-middle;">{{$total_assigned_projects}} Total Un-Assigned Projects</label>
                        </div>
                        <div style="padding:5px; display:inline-block;">
                                <span class="darkblue">-</span>
                                <label style="vertical-align:-webkit-baseline-middle;">{{$inprogress_projects}} Total InProgress Projects</label>
                            </div>
                        <div style="padding:5px; display:inline-block;">
                                <span class="purple">-</span>
                                <label style="vertical-align:-webkit-baseline-middle;">{{$completed_projects}} Completed Projects</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <!-- Modal -->
        <div class="modal fade in" id="myModal" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider": [ {
      "Type": "Total\nProjects \n ({{$total_projects}})",
      "Number of Projects": total_projects/total_projects*100 ,
      "color": "#0D8ECF",

    }, {
      "Type": "UnAssigned\nProjects \n ({{$total_assigned_projects}})",
      "Number of Projects": Math.round(total_assigned_projects/total_projects*100),
      "color": "#333"
    }, {
      "Type": "Inprogress\nProjects \n({{$inprogress_projects}})",
      "Number of Projects": Math.round(inprogress_projects/total_projects*100),
      "color": "#2A0CD0"
    }, {
      "Type": "Completed\nProjects \n ({{$completed_projects}})",
      "Number of Projects": Math.round(completed_projects/total_projects*100),
      "color": "#8A0CCF"
    } ],
    "valueAxes": [ {
      "gridColor": "#FFFFFF",
      "gridAlpha": 0.2,
      "dashLength": 0
    } ],
    "gridAboveGraphs": true,
    "startDuration": 1,
    "graphs": [ {
      "balloonText": "[[category]]: <b>[[value]] %</b>",
      "fillAlphas": 0.8,
      "lineAlpha": 0.2,
      "type": "column",
      "labelText": "[[value]] %",
      "fillColorsField": "color",
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
    //   "labelRotation":30,
      // "ignoreAxisWidth": true,
      "autoWrap": false
    },
    "export": {
      "enabled": true
    }
  } );
</script>
<script type="text/javascript">
$(document).on('click','g',function(){
  var data=$(this).attr('aria-label');
  $('#myModal').modal('show');
  // console.log(data);
  $('.modal-body>p').append(data);
});
</script>
@endsection
