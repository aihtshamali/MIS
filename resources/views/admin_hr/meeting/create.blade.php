@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>
#column{
  text-align: center;
}
div>label{
  text-align: left !important;
}
div>span>label{
  text-align: left !important;
}
i.fa-asterisk{
  font-size: 6px !important;
vertical-align: super;
}
#outerbox{
  width: 50%;
  text-align: center;
  /* position:fixed; */
  left: 30%;
  /* top: 30%; */
  /* margin-top: 30%; */
  /* top:30%; */
}
#inner_items{
  left: 25%;
}

#second,#monitoring_second{
  display:none;
}#third{
  display: none;
}
#fourth,#monitoring_fourth{
  display: none;
}
#table1{
  display: none;
}
#section2{
  display: none;
}
  </style>
@endsection

@section('content')
<div class="content-wrapper">


  <section class="content-header">
    <h1>
    Add New PDWP Meeting 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
        <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
          <section id="section1">
            <div id="outerbox" class="box box-default">
              <div  class="box-header with-border">
                <h3 class="box-title">Select Meeting Type</h3>
        
                {{-- <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div> --}}
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div id="inner_items" class="col-md-6">
                    <div class="form-group">
                      <label>Type of Meeting</label>
                      <select id="type_of_project" name="type_of_project" class="form-control select2" style="width: 100%;">
                        <option >Select Meeting Type</option>
                        <option value="1">Special Meeting</option>
                        <option value="2">Regular Meeting</option>
                        {{-- @foreach ($project_types as $project_type)
                          @if($project_type->status == 1)
                            <option value="{{$project_type->id}}">{{$project_type->name}}</option>
                          @endif
                        @endforeach --}}
        
                      </select>
                    </div>
                  </div>
                    <div id="second" class="form-group">
                      <label>Phase of Evaluation</label>
                      <select id="phase_of_evaluation" name="phase_of_evaluation" class="form-control select2" style="width: 100%;">
                        <option>Select Evaluation Type</option>
                        {{-- @foreach ($sub_project_types as $sub_project_type)
                          <option value="{{$sub_project_type->id}}">{{$sub_project_type->name}}</option>
                        @endforeach --}}
                      </select>
                    </div>
                    <div id="monitoring_second" class="form-group">
                      <label>Phase of Monitoring</label>
                      <select id="phase_of_monitoring" name="phase_of_monitoring" class="form-control select2" style="width: 100%;">
                        <option>Select Monitoring Type</option>
                        {{-- @foreach ($sub_project_types as $sub_project_type)
                          <option value="{{$sub_project_type->id}}">{{$sub_project_type->name}}</option>
                        @endforeach --}}
                      </select>
                    </div>
                </div>
              </div>
            </div>
        
        
  </section>
</div>
@endsection
@section('scripttags')
  {{-- <script type="text/javascript" src="{{asset('bower_components/jquery/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  {{-- <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}
<script>
        $(document).on('change', '#type_of_project', function() {
            var opt = $(this).find(':selected').text();
            if(opt == "Special Meeting"){
              $("#second").show('slow');
              $("#monitoring_second").hide();
              $("#monitoring_fourth").hide();
              $('#table1').hide("slow");
          
          
            }
            else if(opt == "Regular Meeting"){
              $("#monitoring_second").show('slow');
              $("#second").hide();
              $("#fourth").hide();
              $('#table1').hide("slow");
          
            }
          });
          $(document).on('change', '#phase_of_evaluation', function() {
          var opt = $(this).find(':selected').text();
          if(opt == "New Evaluation"){
            $("#fourth").hide();
            $('#table1').hide("slow");
            $("#section1").hide('slow');
            $("#section2").show('slow');
          }
          else if (opt == "RE Evaluation") {
            $("#monitoring_fourth").hide();
            $("#fourth").show('slow');
          }
          });
          
          $(document).on('change', '#phase_of_monitoring', function() {
          var opt = $(this).find(':selected').text();
          if(opt == "New Monitoring"){
            $("#monitoring_fourth").hide();
            $('#table1').hide("slow");
            $("#section1").hide('slow');
            $("#section2").show('slow');
          }
          else if (opt == "RE Monitoring") {
            $("#monitoring_fourth").show("slow");
            $("#fourth").hide();
          }
          });
          
</script>
@endsection