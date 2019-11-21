@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv6 {
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
         <b> Projects Progres Against Activites
          </b>
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
                        <div id="chartdiv6"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="modal fade in" id="Modal" style="display: block; padding-right: 17px;display:none">
              <div class="modal-dialog" style="width:90%">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 ><b class="modal-title"></b> </h4>
                  </div>
                  <div class="modal-body">
                                 <table id="chart1" data-page-length="100" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                      <th>SR #</th>
                                      <th>Project No</th>
                                      <th>GS #</th>
                                      <th>Name</th>
                                      <th>Cost</th>
                                    <th>Assigned Date</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr v-for="(row,index) in d">
                                          <td>@{{index+1}}</td>
                                        <td>@{{row.project_no }}</td>
                                          <td style="width:120px">@{{row.financial_year}}( @{{row.ADP}} )</td>
                                          <td>@{{row.title }}</td>
                                          <td>@{{(Number(row.orignal_cost).toFixed(2))}} Million</td>
                                          <td>@{{row.assigned_date}}</td>
                                                                        
                                        </tr>
                                    </tbody>
                                  </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
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
$('#chart1').DataTable( {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );
</script>
<script type="text/javascript">
  // $('#example').DataTable();
  var VueModal = new Vue({
  
    el:"#Modal",
    data : {
      title : "Projects",
      name: "",
      field: "",
      d:[],
    },
    methods:{
      rows: function(event)
      {
          this.name = event.item.category;
          $('.modal-title').text(this.name);
          this.d=projects_against_activities[event.index].projects;
          $('#Modal').modal('show');
      }
    }
  
  });
</script>
<script>
    var st = [];
     $i = 0;
     activities.forEach(element => {
      //  console.log(projects_activities_progress[$i][0].eachActivitycount);

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
       "title":"Number of Projects",
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
       "title":"Activities",
        "autoGridCount": false,
        "equalSpacing": true,
        "gridCount": 1000,
       "gridPosition": "middle",
       "gridAlpha": 0,
       "tickPosition": "middle",
       "tickLength": 5,
    //    "labelRotation":30,
       // "ignoreAxisWidth": true,
       "autoWrap": true
     },
     "export": {
       "enabled": true
     }

   } );
   chart.addListener('clickGraphItem',VueModal.rows);
  </script>
@endsection
