@extends('layouts.uppernav')
@section('styletag')

<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
#chartdiv3 {
  width		: 100%;
  height	: 80%;
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
    background-color: #ff8533;
    padding: 9px;
    margin: 2px;
    color:#ff8533;
  }
  .yellow{
    font-size: 0px;
    background-color:#fddd33;
    padding: 9px;
    margin: 2px;
    color:#fddd33;
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
  .card-footer{
  height:15%;
  }
</style>

@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        InProgress Projects

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
                        <div id="chartdiv3"></div>

                        <div class="col-md-1"></div>
                        <div class="card-footer" >
                          <div style="padding:5px;display:inline-block;">
                            <span class="lightblue">-</span>
                            <label style="vertical-align:-webkit-baseline-middle;">Total Assigned Projects</label>
                        </div>
                        <div style="padding:5px;display:inline-block;">
                          <span class="yellow">-</span>
                          <label style="vertical-align:-webkit-baseline-middle;">In Progress/Acknowledged Projects</label>
                      </div>
                        </div>
                      </div>
                    </div>
            </div>

            <div class="modal fade in" id="Modal" style="display: block; padding-right: 17px;display:none">
              <div class="modal-dialog" style="width:90%">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">@{{title}}</h4>
                  </div>
                  <div class="modal-body">
                              <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">@{{title}}</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>SR #</th>
                                      <th>Project No</th>
                                      <th>GS #</th>
                                      <th>Name</th>
                                      <th>Sector</th>
                                      <th>Cost</th>
                                      <th>Status</th>
                                      <th>Officer</th>
                                      <th>Progress</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr v-for="row in d">
                                          <td>@{{ row.project_no }}</td>
                                          <td>Empty</td>
                                          <td style="width:120px">Nothingf</td>
                                          <td>Nothin</td>
                                          <td>
                                          Nothin
                                          </td>
                                          <td>Nothing</td>
                                          <td>Nothing</td>

                                          <td>Nothing
                                          </td>
                                          <td>Nothing
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
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
<script type="text/javascript">

// $(document).on('click','g.amcharts-graph-column',function(){
//   var data=$(this).attr('aria-label').split(' ');
//   console.log(data);
//     // $('#Modal'+data).modal('show');
// });




var modal = new Vue({

  el:"#Modal",
  data : {
    title : "Projects",
    name: "",
    field: "",
    d:[],
  },
  methods:{
    rows: function(event){
      this.name = event['item'].category;
      this.field = event['target'].valueField;
      if(this.field == "Total Projects"){
        actual_total_assigned_projects.forEach(element =>{
          element.forEach(ele=>{
            this.d.push({project_no:ele.project_no})
          });
        });
      }
      $('#Modal').modal('show');

    }
  }

});

// $(document).on('click','g.amcharts-graph-column',function(){
//   // var data=$(this).attr('aria-label').replace(/[\s+,\.+]/g, '');
//   console.log($(this).attr('aria-label'));
//     // $('#Modal'+data).modal('show');
// });
</script>
<script>
        // var st = [];
        //  $i = 0;
        //  officers.forEach(element => {
        //    st.push ({
        //      "Name":element.first_name + " " + element.last_name,
        //      "InProgress Projects": assigned_inprogress_projects[$i],
        //      "Total Projects": total_assigned_projects[$i]
        //    });
        //    $i++;
        //  });
       //   var chart = AmCharts.makeChart( "chartdiv", {
       //   "type": "serial",
       //   "theme": "light",
       //   "dataProvider":st,
       //   "valueAxes": [ {
       //     "title" : "Project Numbers",
       //     "gridColor": "#FFFFFF",
       //     "gridAlpha": 0.2,
       //     "dashLength": 0
       //   } ],
       //   "gridAboveGraphs": true,
       //   "startDuration": 1,
       //   "graphs": [ {
       //     "balloonText": "[[category]]: <b>[[value]]</b>",
       //     "fillAlphas": 0.8,
       //     "lineAlpha": 0.2,
       //     "type": "column",
       //     "labelText": "[[value]]",
       //     "valueField": "Total Projects"
       //   },
       //   {
       //     "balloonText": "[[category]]: <b>[[value]]</b>",
       //     "fillAlphas": 0.8,
       //     "lineAlpha": 0.2,
       //     "type": "column",
       //     "labelText": "[[value]]",
       //     "valueField": "InProgress Projects"
       //   }
       //  ],
       //   "chartCursor": {
       //     "categoryBalloonEnabled": false,
       //     "cursorAlpha": 0,
       //     "zoomable": false
       //   },
       //   "categoryField": "Name",
       //   "categoryAxis": {
       //     "title":"Officers",
       //      "autoGridCount": false,
       //      "equalSpacing": true,
       //      "gridCount": 1000,
       //     "gridPosition": "middle",
       //     "gridAlpha": 0,
       //     "tickPosition": "middle",
       //     "tickLength": 5,
       //     "labelRotation":30,
       //     // "ignoreAxisWidth": true,
       //     "autoWrap": true
       //   },
       //   "export": {
       //     "enabled": true
       //   }
       //
       // } );
     </script>

     <script type="text/javascript">
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
              "title":"Officers",
              "gridPosition": "start",
              "position": "bottom",
              "tickLength": 5,
              "labelRotation":30
            },
            "trendLines": [],
            "graphs": [
              {
                "balloonText": "Total:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-1",
                "lineAlpha": 0.2,
                "title": "Total Projects",
                "type": "column",
                "labelText": "[[value]]",
                "valueField": "Total Projects"
              },
              {
                "balloonText": "In Progress:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-2",
                "lineAlpha": 0.2,
                "title": "InProgress Projects",
                "type": "column",
                "labelText": "[[value]]",
                "valueField": "InProgress Projects"
              }
            ],
            "guides": [],
            "valueAxes": [
              {
                "title":"Number of Projects",
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

            chart.addListener('clickGraphItem',modal.rows);


     </script>
@endsection
