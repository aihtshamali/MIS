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
i{
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

  <form class="form-horizontal" id="projectForm" action="{{route('projects.update',$project->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
<input name="_method" type="hidden" value="PUT">

  <section id="section2">

  <div class="modal-body row">
  <div class="col-md-6">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Project Details</h3>
            </div>

    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Type of Evaluation</label>
        <div class="col-sm-8">
        <select id="evaluation_type" name="evaluation_type" class="form-control select2" style="width: 100%;" >
          <option value="">Select Evaluation Type</option>
          @foreach ($evaluation_types as $evaluation_type)
            @if($evaluation_type->status == 1)
              <option value="{{$evaluation_type->id}}">{{$evaluation_type->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Name of Project</label>
      <div class="col-sm-8">
        <input id="title" autocomplete="off" type="text" name="title" class="form-control" placeholder="Title" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Project #</label>
      <div class="col-sm-8">
        <input id="project_no" type="text" name="project_no" value="{{$project_no}}"  class="form-control"  >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>GS #</label>
      <div class="col-sm-3">
        <input type="number" disabled class="form-control" value="{{$current_year}}">
      </div>
      <label class="col-sm-1" style="font-size:20px">-</label>
      <div class="col-sm-4">
        <input type="number" id="ADP" name="ADP" class="form-control" placeholder="GS #" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Sector</label>
      <div class="col-sm-8">
        <select id="sectors" name="sectors[]" class="form-control select2" multiple="multiple" data-placeholder="Sectors"  style="width: 100%;">
          @foreach ($sectors as $sector)
            @if($sector->status == 1)
              <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Sub Sector</label>
      <div class="col-sm-8">
        <select id="sub_sectors" name="sub-sectors[]" class="form-control select2"  multiple="multiple" data-placeholder="Sub Sectors"  style="width: 100%;">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Departments</label>
      <div class="col-sm-8">
        <select id="departments" name="departments[]"  class="form-control select2" multiple="multiple" data-placeholder="Departments"  style="width: 100%;">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Select Sponsoring Department</label>
      <div class="col-sm-8">
        <select id="sponsoring_departments"  name="sponsoring_departments[]" class="form-control select2" multiple="multiple" data-placeholder="Sponsoring Department"  style="width: 100%;">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Select Executing Department</label>
      <div class="col-sm-8">
        <select id="executing_departments"  name="executing_departments[]" class="form-control select2" multiple="multiple" data-placeholder="Executing Department"  style="width: 100%;">
          @foreach ($executing_departments as $executing_department)
            @if($executing_department->status == 1)
              <option value="{{$executing_department->id}}">{{$executing_department->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Select Assingning Forum</label>
      <div class="col-sm-8">
        <select id="assigning_forums"  name="assigning_forum" class="form-control select2"  style="width: 100%;">
          <option value="">Select Assigning Forum</option>
          @foreach ($assigning_forums as $assigning_forum)
            @if($assigning_forum->status == 1)
              <option value="{{$assigning_forum->id}}">{{$assigning_forum->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Select Approving Forum</label>
      <div class="col-sm-8">
        <select id="approving_forums"  name="approving_forum" class="form-control select2"  style="width: 100%;">
          <option value="">Select Approving Forum</option>
          @foreach ($approving_forums as $approving_forum)
            @if($approving_forum->status == 1)
              <option value="{{$approving_forum->id}}">{{$approving_forum->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Currency</label>
      <div class="col-sm-8">
        <select class="form-control"  name="currency" id="currency">
          <option data-symbol="$" data-placeholder="0.00">$ USD</option>
          <option data-symbol="Rs" data-placeholder="0.00" selected>Rs PKR</option>
          <option data-symbol="€" data-placeholder="0.00">€ EUR</option>
          <option data-symbol="£" data-placeholder="0.00">£ GBP</option>
          <option data-symbol="¥" data-placeholder="0">¥ JPY</option>
          <option data-symbol="$" data-placeholder="0.00">$ CAD</option>
        </select>
      </div>
    </div>
    <section style="background-color:lightgray;padding:8px">
    <div class="form-group">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Original Approved Cost in Millions</label>
      <div class="col-sm-8">
        <input type="number"  id="original_cost" step="0.01" name="original_cost" class="form-control" placeholder="Cost">
      </div>
    </div>
    <div class="form-group" id="field">
      <span class="firstspan">
      <label class="col-sm-4 control-label"></i>Revised Approved Cost in Millions</label>
      <div class="col-sm-8">
      <input autocomplete="off" name="revised_approved_costs[]" id="field1" type="number" step="0.01" class="form-control input" data-items="8">
      <button id="b1" class="btn btn-success add-more pull-right" style="    position: relative;
      top: -34px;" type="button">+</button>
      </div>
      </span>
    </div>
  </section>

  <section style="background-color:lightgray;padding:8px;margin-top:10px;">
    <div class="form-group" id="datepick" style="margin-top:10px">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Planned Start Date</label>
      <div class='input-group col-sm-8 date' id='planned_start_my_date' >
           <input type='text' id="planned_start_date"  name="planned_start_date" class="form-control" />
           <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
           </span>
       </div>
    </div>
    <div class="form-group" id="datepick">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Planned End Date</label>
      <div class='input-group col-sm-8 date' id='planned_end_my_date' >
           <input type='text'  id="planned_end_date" name="planned_end_date" class="form-control" />
           <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
           </span>
       </div>
    </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Planned Gestation Period</label>
    <div class="col-sm-8">
    <input name="gestation_period"  id="planned_gestation_period" type="text" class="form-control input" disabled>
    </div>
    </span>
  </div>
</section>

<section style="background-color:lightgray;padding:8px;margin-top:10px;" id="field_second">
  <div class="form-group" id="datepick" style="margin-top:10px">
    <label class="datepick col-sm-4 control-label">Revised Start Date</label>
    <div class='input-group col-sm-8 date' id='revised_start_my_date' >
         <input type='text' id="revised_start_date" name="revised_start_date" class="form-control" />
         <span class="input-group-addon">
             <span class="glyphicon glyphicon-calendar"></span>
         </span>
     </div>
  </div>
  <span class="secondspan"></span>
  <div class="form-group" >
    <label class="col-sm-4 control-label"></i>Revised EndDate</label>
    <div class="input-group col-sm-8 date" id="revised_end_my_date">
    <input name="revised_end_dates[]" id="date0" class="form-control" >
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>
    <button id="b1" class="btn btn-success add-more_second pull-right" style="
    top: -34px;" type="button">+</button>
    </div>
  </div>
<div class="form-group">
  <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Revised Gestation Period</label>
  <div class="col-sm-8">
  <input id="revised_gestation_period" name="revised_gestation_period" type="text" class="form-control input"  disabled>
  </div>
  </span>
</div>
</section>


    <div class="form-group" style="margin-top:10px">
      <label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Select District</label>
      <div class="col-sm-8">
        <select id="districts" name="districts[]"  multiple="multiple" class="form-control select2" data-placeholder="Select District" style="width: 100%;">
          {{-- <option value=""></option> --}}
          @foreach ($districts as $district)
            @if($district->status == 1)
              <option value="{{$district->id}}">{{$district->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group" style="margin-top:10px">
      <label class="col-sm-4 control-label">Upload Attachments</label>
      <div class="col-sm-8">
      <input type="file" class="pull-right" name="attachments">
    </div>
    </div>
  </div>
  <input type="button" id="btn-confirm" class="btn btn-success pull-right" style="margin-top:10px" value="Confirm Changes">

</div>
</div>

<div class="col-md-6" >
<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Project Detailed Summary</h3>
          </div>
  <div class="form-horizontal">
  <div class="box-body">
    <div class="form-group">
      <label id="label_fixed_summary_evaluation_type" class="col-sm-6 control-label">Evaluation Type</label>
      <div id="fixed_summary_evaluation_type" class="col-sm-6">
        <label>{{$project->EvaluationType->name}}</label>
      </div>
    </div>
  <div class="form-group">
    <label id="label_fixed__summary_title" class="col-sm-6 control-label">Title</label>
    <div id="fixed_summary_title" class="col-sm-6">
      <label>{{$project->title}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_project_no" class="col-sm-6 control-label pull-left">Project #</label>
    <div id="fixed_summary_project_no" class="col-sm-6">
      <label>{{$project_no}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_ADP"  class="col-sm-6 control-label">GS #</label>
    <div id="fixed_summary_ADP" class="col-sm-6">
      <label>2018-{{$project->ADP}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_sectors"  class="col-sm-6 control-label">Sectors</label>
    <div id="fixed_summary_sectors" class="col-sm-6">
      @foreach ($project->AssignedDepartments as $assignDpt )
          <label>{{$assignDpt->Department->SubSector->Sector->name}}</label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_sub_sectors"  class="col-sm-6 control-label">Sub Sectors</label>
    <div id="fixed_summary_sub_sectors" class="col-sm-6">
      @foreach ($project->AssignedDepartments as $assignDpt )
          <label>{{$assignDpt->Department->SubSector->name}}</label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_sponsoring_departments"  class="col-sm-6 control-label">Sponsoring Departments</label>
    <div id="fixed_summary_sponsoring_departments" class="col-sm-6">
      @foreach ($project->AssignedDepartments as $assignDpt )
          <label>{{$assignDpt->Department->name}}</label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_executing_departments"  class="col-sm-6 control-label">Executing Departments</label>
    <div id="fixed_summary_executing_departments" class="col-sm-6">
      @foreach ($project->AssignedExecutingAgencies as $ed)
        <label>{{$ed->ExecutingAgency->name}}</label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_assigning_forums"  class="col-sm-6 control-label">Assigning Forums</label>
    <div id="fixed_summary_assigning_forums" class="col-sm-6">
        <label>{{$project->ProjectDetail->AssigningForum->name}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_approving_forums"  class="col-sm-6 control-label">Approving Forums</label>
    <div id="fixed_summary_approving_forums" class="col-sm-6">
      <label>{{$project->ProjectDetail->ApprovingForum->name}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_currency" class="col-sm-6 control-label">Currency</label>
    <div id="fixed_summary_currency" class="col-sm-6">
      <label>{{$project->ProjectDetail->currency}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_original_cost"  class="col-sm-6 control-label">Original Approved Cost in Millions</label>
    <div id="fixed_summary_original_cost" class="col-sm-6">
      <label>{{$project->ProjectDetail->orignal_cost}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_field1"  class="col-sm-6 control-label">Revised Approved Cost in Millions</label>
    <div id="fixed_summary_field1" class="col-sm-6">
      @foreach ($project->RevisedApprovedCost as $rac)
        <label>{{$rac->cost}} / </label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_planned_start_date"  class="col-sm-6 control-label">Planned Start Date</label>
    <div id="fixed_summary_planned_start_date" class="col-sm-6">
      <label>{{{$project->ProjectDetail->planned_start_date}}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed__summary_planned_end_date" class="col-sm-6 control-label">Planned End Date</label>
    <div id="fixed_summary_planned_end_date" class="col-sm-6">
      <label>{{{$project->ProjectDetail->planned_end_date}}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_revised_start_date"  class="col-sm-6 control-label">Revised Start Date</label>
    <div id="fixed_summary_revised_start_date" class="col-sm-6">
      <label>{{{$project->ProjectDetail->revised_start_date}}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_revised_end_date"  class="col-sm-6 control-label">Revised End Date</label>
    <div id="fixed_summary_revised_end_date" class="col-sm-6">
    </div>@foreach ($project->RevisedEndDate as $red)
      <label>{{$red->end_date}} / </label>
    @endforeach
  </div>
  <div class="form-group">
    <label id="label_fixed_summary_districts"  class="col-sm-6 control-label">Districts</label>
    <div id="fixed_summary_districts" class="col-sm-6">
    @foreach ($project->AssignedDistricts as $district)
      <label>{{$district->District->name}} / </label>
    @endforeach
  </div>

</div>
<div class="form-group">
  <label id="label_fixed_summary_attachments"  class="col-sm-6 control-label">Project Attachment</label>
  <div id="fixed_summary_attachment" class="col-sm-6">
        <label><a href="{{asset('/uploads/projects/'.$project->ProjectDetail->project_attachements)}}" download>Project File(Click to Download)</a>
        </label>
  </div>
</div>
</div>
</div>
</div>
</section>
</form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="left:unset !important">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Save Changes</h4>
      </div>
      <div class="modal-body">
<<<<<<< HEAD
        <p>Are you Sure?</p>
=======
        <p>Are you sure?</p>
>>>>>>> 0a928a843470fd7fa443ec965b2c9c8f482c3fb3
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="confirmedbtn" data-dismiss="modal">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
@endsection
@section('scripttags')
  {{-- <script type="text/javascript" src="{{asset('bower_components/jquery/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  {{-- <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}
<script>
$('#confirmedbtn').click(function(){
  $('#projectForm').submit();
});

$('#btn-confirm').on('click',function(){
  $('#myModal').modal({
    show:true
  });
});
$('div').on('dp.change',function(){
  var class_value = $(this).find('input').attr('id');
  var opt = $("#"+class_value).val();
  if(class_value == "date0"){
    class_value = "revised_end_date";
  }else if(class_value == "planned_end_date"){
    var first_val = $("#planned_start_date").val();
    if(first_val != ""){
      var second_value = $(this).find('input').val();
      var first = first_val.split('/');
      var second = second_value.split('/');
      var year = second[2]-first[2];
      var month = Math.abs(second[1]-first[1]);
      var days = Math.abs(second[0]-first[0]);
      $("#planned_gestation_period").val(year + " Years "+month+" Months "+days+" Days");
      $('#summary_gestation_period').empty();
      $('#summary_gestation_period').append("<label>"+year + " Years "+month+" Months "+days+" Days" + "</label>");
      $('#label_summary_gestation_period').show('slow');
    }
  }
  if(opt == ""){
    $("#label_summary_" + class_value).hide("slow");
  }
  else{
    $("#label_summary_" + class_value).show("slow");
  }
  $("#summary_"+class_value).empty();
  $("#summary_"+class_value).append("<label class=\"control-label\">"+opt+"</label>");

  if(class_value == "revised_end_date"){
    var revised_start = $("#revised_start_date").val();
        if(revised_start != ""){
          var revised_second_value = opt;
          var first = revised_start.split('/');
          var second = revised_second_value.split('/');
          var year = second[2]-first[2];
          var month = Math.abs(second[1]-first[1]);
          var days = Math.abs(second[0]-first[0]);
          $("#revised_gestation_period").val(year + " Years "+month+" Months "+days+" Days");


        }
        else{
          var revised_start = $("#planned_start_date").val();
                var revised_second_value = opt;
                var first = revised_start.split('/');
                var second = revised_second_value.split('/');
                var year = second[2]-first[2];
                var month = Math.abs(second[1]-first[1]);
                var days = Math.abs(second[0]-first[0]);
                $("#revised_gestation_period").val(year + " Years "+month+" Months "+days+" Days");
        }
        $('#summary_revised_gestation_period').empty();
        $('#summary_revised_gestation_period').append("<label>"+year + " Years "+month+" Months "+days+" Days" + "</label>");
        $('#label_summary_revised_gestation_period').show('slow');

  }

});

$('input').on('change',function(){
  var class_value = $(this).attr("id");
  var opt = $(this).val();
  if(opt == ""){
    $("#label_summary_" + class_value).hide("slow");
  }
  else{
    $("#label_summary_" + class_value).show("slow");
  }
  $("#summary_"+class_value).empty();
  $("#summary_"+class_value).append("<label class=\"control-label\">"+opt+"</label>");
});


$('select').on('change',function(e){
  var class_value = $(this).attr("id");
  var opt = $(this).val();
  var values = "";
  if(opt == ""){
    $("#label_summary_" + class_value).hide("slow");
  }
  else{
    $("#label_summary_" + class_value).show("slow");
  }
  $("#summary_"+class_value).empty();
  values = $(this).find(':selected').text();
  $("#summary_"+class_value).append("<label class=\"control-label\">"+values+"</label>");
});

$('input').on('input',function(){
  var class_value = $(this).attr("id");
  var opt = $(this).val();
  if(opt == ""){
    $("#label_summary_" + class_value).hide("slow");
  }
  else{
    $("#label_summary_" + class_value).show("slow");
  }
  $("#summary_"+class_value).empty();
  if(class_value == "ADP"){
    $("#summary_"+class_value).append("<label class=\"control-label\">"+{{$current_year}}+"-</label>");
  }
  $("#summary_"+class_value).append("<label class=\"control-label\">"+opt+"</label>");
});

$(function () {
  //Initialize Select2 Elements
  $('.select2').select2();
  // $("#section2").hide();
  $('#planned_start_my_date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
  });
  $('#planned_end_my_date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
  });
  $('#revised_start_my_date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
  });
  $('#revised_end_my_date').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
  });
});

$(document).on('change', '#sectors', function() {
  var opt = $(this).val()
  // console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onsectorselect', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      console.log(response);
      $("#sub_sectors").empty();
      $.each(response, function () {
          $('#sub_sectors').append("<option value=\""+this.id+"\">"+this.name+"</option>");
      });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});
$(document).on('change', '#sub_sectors', function() {
  var opt = $(this).val()
  // console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onsubsectorselect', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      $("#sponsoring_departments").empty();
      $("#departments").empty();
      $.each(response[0], function () {
          $('#sponsoring_departments').append("<option value=\""+this.id+"\">"+this.name+"</option>");
      });
      $.each(response[1], function () {
        $.each(this,function () {
          $('#departments').append("<option value=\""+this.id+"\">"+this.name+"</option>");
        });
      });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});



$(document).ready(function(){
  var next = 1;
  $(".add-more").click(function(e){
      e.preventDefault();
      var addto = "#field" + next;
      var addRemove = "#field" + (next);
      next = next + 1;
      var newIn = '<div class="added'+(next-1)+'" ><label class="col-sm-4 control-label">Revised Approved Cost '+(next-1)+' in Millions</label><div class="col-sm-8"><input name="revised_approved_costs[]" autocomplete="off" class="input form-control" id="field'+ next +'" value="'+$('input#field1').val()+'" type="number" step="0.01"> ';
    //   var newInput = $(newIn);
      var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me pull-right" style="    position: relative;top: -34px;" >-</button></div> ';
    //   var removeButton = $(removeBtn);
      $("span.firstspan").before(newIn +removeBtn);
    //   $("#field").append(removeButton);
    $('#field1').val('');

      $("#field").attr('data-source',$(addto).attr('data-source'));
    //   console.log(("#field" + next));
    //   $("#count").val(next);
          $('.remove-me').click(function(e){
              e.preventDefault();
              var fieldNum = this.id.charAt(this.id.length-1);
              var fieldID = "#field" + fieldNum;
              console.log(fieldID);

              $('.added'+fieldNum).remove();
            //   $(fieldID).remove();
          });
  });
});

$(document).ready(function(){
  var next = 0;
  $(".add-more_second").click(function(e){
    e.preventDefault();
    next = next + 1;
      var newIn = '<div class="form-group" id="'+next+'"><label class="col-sm-4 control-label"><i class="fa fa-asterisk text-danger"></i>Revised EndDate '+next+'</label><div class="input-group col-sm-8 date" id="revised_end_my_date"><input name="revised_end_dates[]" id="date"'+next+' value="'+$("#date0").val()+'" class="form-control" ><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
      var removeBtn = '<button id="remove' + next + '" class="btn btn-danger remove-me pull-right" style="top: -34px;" >-</button></div></span></div>';
    $("span.secondspan").before(newIn +removeBtn);
    $('#date0').val('');
        $('.remove-me').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#" + fieldNum;
            $(fieldID).remove();
        });
})
});

$(document).on('change', '#type_of_project', function() {
  var opt = $(this).find(':selected').text();
  if(opt == "Evaluation"){
    $("#second").show('slow');
    $("#monitoring_second").hide();
    $("#monitoring_fourth").hide();
    $('#table1').hide("slow");


  }
  else if(opt == "Monitoring"){
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
    $("#project").empty();
    $.each(response, function () {
        $('#project').append("<option value=\""+this.id+"\">"+this.ADP +" &rarr; " +this.title+"</option>");
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
});


</script>
@endsection
