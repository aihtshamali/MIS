@extends('layouts.uppernav')
@section('styletag')
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

#second,#monitoring_second{
  display: none;
}#third{
  display: none;
}
#fourth,#monitoring_fourth{
  display: none;
}
#table1{
  display: none;
}


  </style>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- SELECT2 EXAMPLE -->
      <div id="outerbox" class="box box-default">
        <div  class="box-header with-border">
          <h3 class="box-title">Select Project Type</h3>

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
                <label>Type of Projects</label>
                <select id="type_of_project" class="form-control select2" style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  <option>Select Project Type</option>
                  @foreach ($project_types as $project_type)
                    @if($project_type->status == 1)
                      <option>{{$project_type->name}}</option>
                    @endif
                  @endforeach

                </select>
              </div>

              <div id="second" class="form-group">
                <label>Phase of Evaluation</label>
                <select id="phase_of_evaluation" class="form-control select2" style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  <option>Select Evaluation Type</option>
                  <option>New Evaluation</option>
                  <option>RE Evaluation</option>
                </select>
              </div>
              <div id="monitoring_second" class="form-group">
                <label>Phase of Monitoring</label>
                <select id="phase_of_monitoring" class="form-control select2" style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  <option>Select Monitoring Type</option>
                  <option>New Monitoring</option>
                  <option>RE Monitoring</option>
                </select>
              </div>

              <div id="third" class="form-group">
                <label>Type of Evaluation</label>
                <select id="type_of_evaluation" class="form-control select2" style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  <option>Select Evaluation Type</option>
                  @foreach ($evaluation_types as $evaluation_type)
                    @if($evaluation_type->status == 1)
                      <option>{{$evaluation_type->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>

              <div id="fourth" class="form-group">
                <label>Search ADP or GS #</label>
                <select class="form-control select2" name="ADP" placeholder="ADP or GS #"  style="width: 100%;">
                <option value="">Select Project</option>
                  @foreach ($projects as $project)
                    <option value="{{$project->ADP}}">{{$project->ADP}} &rarr; {{$project->title}}</option>
                  @endforeach
                </select>
                <label >Select a Sub-Sector</label>
                <select id="sub-sectors" class="form-control select2" multiple="multiple"  style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  @foreach ($sub_sectors as $sub_sector)
                    @if($sub_sector->status == 1)
                      <option value="{{$sub_sector->id}}">{{$sub_sector->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div id="monitoring_fourth" class="form-group">
                <label>Search ADP or GS #</label>
                <select  class="form-control select2" name="ADP" placeholder="ADP or GS #"  style="width: 100%;">
                <option value="">Select Project</option>
                  @foreach ($projects as $project)
                    <option value="{{$project->ADP}}">{{$project->ADP}} &rarr; {{$project->title}}</option>
                  @endforeach
                </select>
                <label >Select a Sub-Sector</label>
                <select id="sub-sectors" class="form-control select2" multiple="multiple"   style="width: 100%;">
                  {{-- <option selected="selected">Alabama</option> --}}
                  @foreach ($sub_sectors as $sub_sector)
                    @if($sub_sector->status == 1)
                      <option value="{{$sub_sector->id}}">{{$sub_sector->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>

              <div id="table1"class="form-group">
                <label >Select a Project</label>
                <form action="{{route('project.store')}}" method="POST">
                  {{csrf_field()}}
                <select id="projects" class="form-control select2"  style="width: 100%;">
                </select>
                <input type="submit" class="btn btn-success pull-right" style="margin-top:5%;" value="ADD Project">
                </form>
              </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ADP OR GS #</th>
                  <th>Project Name</th>
                </tr>
                </thead>
                <tbody> --}}
                  {{-- @foreach ($projects as $project)
                    <tr>
                      <td>{{$project->ADP}}</td>
                      <td><a href="#">{{$project->title}}</a></td>
                    </tr>
                  @endforeach --}}
              {{-- </tbody>
            </table> --}}

              <!-- /.form-group -->
              {{-- <div class="form-group">
                <label>Disabled</label>
                <select class="form-control select2" disabled="disabled" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div> --}}
              <!-- /.form-group -->
              {{-- <div class="form-group">
                <label>Disabled Result</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option disabled="disabled">California (disabled)</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div> --}}
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</div>
@endsection
@section('scripttags')

  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // $('#example1').DataTable()
  })
  $(document).on('change', '#type_of_project', function() {
    // console.log($(this).val()); // the selected options’s value
    var opt = $(this).val();
    // if you want to do stuff based on the OPTION element:
    // var opt = $(this).find('option:selected')[0];
    // use switch or if/else etc.
    if(opt == "Evaluation"){
      $("#second").show('slow');
      $("#monitoring_second").hide();
      $("#monitoring_fourth").hide();
      $('#table1').hide("slow");


    }
    else if(opt == "Monitoring"){
      $("#monitoring_second").show('slow');
      $("#second").hide();
      $("#third").hide();
      $("#fourth").hide();
      $('#table1').hide("slow");

    }
});
$(document).on('change', '#phase_of_evaluation', function() {
  // console.log($(this).val()); // the selected options’s value
  var opt = $(this).val();
  // if you want to do stuff based on the OPTION element:
  // var opt = $(this).find('option:selected')[0];
  // use switch or if/else etc.
  if(opt == "New Evaluation"){
    $("#third").show('slow');
    $("#fourth").hide();
    $('#table1').hide("slow");

  }
  else if (opt == "RE Evaluation") {
    $("#monitoring_fourth").hide();
    $("#fourth").show('slow');
    $("#third").hide();
  }
});
$(document).on('change', '#phase_of_monitoring', function() {
  // console.log($(this).val()); // the selected options’s value
  var opt = $(this).val();
  // if you want to do stuff based on the OPTION element:
  // var opt = $(this).find('option:selected')[0];
  // use switch or if/else etc.
  if(opt == "New Monitoring"){
    $("#monitoring_fourth").hide();
    $('#table1').hide("slow");

  }
  else if (opt == "RE Monitoring") {
    $("#monitoring_fourth").show("slow");
    $("#fourth").hide();
    $("#third").hide();
  }
});
type_of_evaluation

$(document).on('change', '#sub-sectors', function() {
  var opt = $(this).val()
  // console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onchangefunction', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      $("#projects").empty();
      $.each(response, function () {
          $('#projects').append("<option value=\""+this.id+"\">"+this.ADP +" &rarr; " +this.title+"</option>");
      });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
  if(opt == ""){
    $('#table1').hide("slow");

  }else
  $('#table1').show("slow");
  // $.each(result, function () {
  //       console.log(this.id);
  //       console.log(this.title);
  //   });
//   for(var i = 0; i < result.length; i++) {
//   $('#projects').append("<option value=result[i]>result[i]</option>");
// }
});

$(document).on('change', '#type_of_evaluation', function() {
  var type_of_evaluation = $(this).val()
  var type_of_project = $("#type_of_project").val()
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onnewprojectselect', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : type_of_evaluation,
      "type_of_project" : type_of_project
    }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      window.location = '/project/form';
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});
  </script>
@endsection
