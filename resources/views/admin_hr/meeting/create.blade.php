@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>

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

#second_specialmeetings,#second_regularmeetings{
  margin-top: 25px;
  background-color:lightblue;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  display:none;
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
                      <select id="type_of_meetings" name="type_of_meeting" class="form-control select2" style="width: 100%;">
                        <option >Select Meeting Type</option>
                        <option value="1">Special Meeting</option>
                        <option value="2">Regular Meeting</option>
                      </select>
                    </div>
                    <div id="second_specialmeetings" class="form-group">
                        <label>Special Meeting <span id="d" style="background-color:ivory;color:red;"></span></label>
                        
                      </div>
                      <div id="second_regularmeetings" class="form-group">
                        <label>Regular Meeting</label>
                        
                      </div>
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
    var d = new Date();
    document.getElementById("d").innerHTML = d.toLocaleDateString("en-US");
    </script>
<script>
    
        
        $(document).on('change', '#type_of_meetings', function() {
            var opt = $(this).find(':selected').text();
            if(opt == "Special Meeting"){
              $("#second_specialmeetings").show('slow');
              $("#second_regularmeetings").hide('slow');
          
          
            }
            else if(opt == "Regular Meeting"){
              $("#second_regularmeetings").show('slow');
              $("#second_specialmeetings").hide('slow');
          
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