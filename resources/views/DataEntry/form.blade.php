@extends('layouts.uppernav')
@section('styletag')
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


  </style>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="modal-body row">
  <div class="col-md-6">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Project Details</h3>
            </div>
  <form class="form-horizontal" action="{{route('project.store')}}" method="POST">
    {{csrf_field()}}
    <div class="box-body">
    <div class="form-group">
      <label class="col-sm-4 control-label">Name of Project</label>
      <div class="col-sm-8">
        <input id="title" type="text" name="title" class="form-control" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Project #</label>
      <div class="col-sm-8">
        <input id="project_no" type="text" name="project_no" value="{{$project_no}}"  class="form-control" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">ADP #</label>
      <div class="col-sm-8">
        <input type="text" id="ADP" name="ADP" class="form-control" placeholder="ADP or GS #">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Sector</label>
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
      <label class="col-sm-4 control-label">Sub Sector</label>
      <div class="col-sm-8">
        <select id="sub_sectors" name="sub-sectors[]" class="form-control select2" multiple="multiple" data-placeholder="Sub Sectors"  style="width: 100%;">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Select Sponsoring Department</label>
      <div class="col-sm-8">
        <select id="sponsoring_departments" name="sponsoring_departments[]" class="form-control select2" multiple="multiple" data-placeholder="Sponsoring Department"  style="width: 100%;">
          @foreach ($sponsoring_departments as $sponsoring_department)
            @if($sponsoring_department->status == 1)
              <option value="{{$sponsoring_department->id}}">{{$sponsoring_department->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Select Executing Department</label>
      <div class="col-sm-8">
        <select id="executing_departments" name="executing_departments[]" class="form-control select2" multiple="multiple" data-placeholder="Executing Department"  style="width: 100%;">
          @foreach ($executing_departments as $executing_department)
            @if($executing_department->status == 1)
              <option value="{{$executing_department->id}}">{{$executing_department->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Select Assingning Forum</label>
      <div class="col-sm-8">
        <select id="assigning_forums" name="assigning_forum" class="form-control select2"  style="width: 100%;">
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
      <label class="col-sm-4 control-label">Currency</label>
      <div class="col-sm-8">
        <select class="form-control" name="currency" id="currency">
          <option value="Rupees">Rupees</option>
          <option value="Dollars">Dollars</option>
        </select>
      </div>
    </div>
    <section style="background-color:lightgray;padding:8px">
    <div class="form-group">
      <label class="col-sm-4 control-label">Original Cost in Millions</label>
      <div class="col-sm-8">
        <input type="number" id="original_cost" name="original_cost" class="form-control" placeholder="Cost">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Approved Cost in Millions</label>
      <div class="col-sm-8">
        <input type="number" id="approved_cost" name="approved_cost" class="form-control" placeholder="Cost">
      </div>
    </div>
    <div class="form-group" id="field">
      <span class="firstspan">
      <label class="col-sm-4 control-label">Revised Approved Cost in Millions</label>
      <div class="col-sm-8">
      <input autocomplete="off" name="revised_approved_costs[]" id="field1" type="text" class="form-control input"value="" data-items="8">
      <button id="b1" class="btn btn-success add-more pull-right" style="    position: relative;
      top: -34px;" type="button">+</button>
      </div>
      </span>
    </div>
  </section>

  <section style="background-color:lightgray;padding:8px;margin-top:10px;">
    <div class="form-group" id="datepick" style="margin-top:10px">
      <label class="datepick col-sm-4 control-label">Planned Start Date</label>
      <div class="col-sm-8">
        <input type="text" id="planned_start_date" name="planned_start_date" class="form-control" placeholder="Start Date">
      </div>
    </div>
    <div class="form-group" id="datepick">
      <label class="col-sm-4 control-label">Planned End Date</label>
      <div class="col-sm-8">
        <input type="text" id="planned_end_date" name="planned_end_date" class="form-control" placeholder="End Date">
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Planned Gestation Period</label>
    <div class="col-sm-8">
    <input name="gestation_period" type="text" class="form-control input" value="" disabled>
    </div>
    </span>
  </div>
</section>

<section style="background-color:lightgray;padding:8px;margin-top:10px;">
  <div class="form-group" id="datepick" style="margin-top:10px">
    <label class="datepick col-sm-4 control-label">Revised Start Date</label>
    <div class="col-sm-8">
      <input type="text" id="revised_start_date" name="revised_start_date" class="form-control" placeholder="Revised Start Date">
    </div>
  </div>
  <div class="form-group" id="field_second">
    <span class="secondspan">
    <label class="col-sm-4 control-label">Revised End Date</label>
    <div class="col-sm-8">
    <input autocomplete="off" name="revised_end_dates[]" id="field_second1" type="date" class="form-control input"value="" data-items="8">
    <button id="b1" class="btn btn-success add-more_second pull-right" style="    position: relative;
    top: -34px;" type="button">+</button>
    </div>
    </span>
  </div>
<div class="form-group">
  <label class="col-sm-4 control-label">Revised Gestation Period</label>
  <div class="col-sm-8">
  <input name="revised_gestation_period" type="text" class="form-control input" value="" disabled>
  </div>
  </span>
</div>
</section>


    <div class="form-group" style="margin-top:10px">
      <label class="col-sm-4 control-label">Select District</label>
      <div class="col-sm-8">
        <select id="districts" name="district" class="form-control select2"  style="width: 100%;">
          <option value="">Select District</option>
          @foreach ($districts as $district)
            @if($district->status == 1)
              <option value="{{$district->id}}">{{$district->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <input type="submit" class="btn btn-success pull-right" style="margin-top:10px" value="ADD Project">
</form>
</div>
</div>

<div class="col-md-6" >
<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Project Detailed Summary</h3>
          </div>
  <form class="form-horizontal" action="{{route('project.store')}}" method="POST">
    {{csrf_field()}}
  <div class="box-body">
  <div class="form-group">
    <label id="label_summary_title" style="display:none;" class="col-sm-6 control-label">Title</label>
    <div id="summary_title" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_project_no" class="col-sm-6 control-label pull-left">Project #</label>
    <div id="summary_project_no" class="col-sm-6">
      <label>{{$project_no}}</label>
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_ADP" style="display:none;" class="col-sm-6 control-label">ADP #</label>
    <div id="summary_ADP" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_sectors" style="display:none;" class="col-sm-6 control-label">Sectors</label>
    <div id="summary_sectors" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_sub_sectors" style="display:none;" class="col-sm-6 control-label">Sub Sectors</label>
    <div id="summary_sub_sectors" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_sponsoring_department" style="display:none;" class="col-sm-6 control-label">Sponsoring Departments</label>
    <div id="summary_sponsoring_department" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_executing_department" style="display:none;" class="col-sm-6 control-label">Executing Departments</label>
    <div id="summary_executing_department" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_assingning_forums" style="display:none;" class="col-sm-6 control-label">Assigning Forums</label>
    <div id="summary_assingning_forums" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_currency" style="display:none;" class="col-sm-6 control-label">Currency</label>
    <div id="summary_currency" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_original_cost" style="display:none;" class="col-sm-6 control-label">Original Cost in Millions</label>
    <div id="summary_original_cost" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_approved_cost" style="display:none;" class="col-sm-6 control-label">Approved Cost in Millions</label>
    <div id="summary_approved_cost" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_planned_start_date" style="display:none;" class="col-sm-6 control-label">Planned Start Date</label>
    <div id="summary_planned_start_date" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_planned_end_date" style="display:none;" class="col-sm-6 control-label">Planned End Date</label>
    <div id="summary_planned_end_date" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_revised_start_date" style="display:none;" class="col-sm-6 control-label">Revised Start Date</label>
    <div id="summary_revised_start_date" class="col-sm-6">
    </div>
  </div>
  <div class="form-group">
    <label id="label_summary_districts" style="display:none;" class="col-sm-6 control-label">Districts</label>
    <div id="summary_districts" class="col-sm-6">
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('scripttags')

  <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script>
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
  $( "#planned_start_date" ).datepicker();
  $( "#revised_start_date" ).datepicker();
  $( "#planned_end_date" ).datepicker();
  // $('#example1').DataTable()
})
$('#title').on('input',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_title").hide();
    }
    else{
      $("#label_summary_title").show();
    }
    $("#summary_title").empty();
    $("#summary_title").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#ADP').on('input',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_ADP").hide();
    }
    else{
      $("#label_summary_ADP").show();
    }
    $("#summary_ADP").empty();
    $("#summary_ADP").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#currency').on('change',function(e){
    var opt = $(this).val();
    console.log(opt);
    $("#label_summary_currency").show();
    $("#summary_currency").empty();
    $("#summary_currency").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#original_cost').on('input',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_original_cost").hide();
    }
    else{
      $("#label_summary_original_cost").show();
    }
    $("#summary_original_cost").empty();
    $("#summary_original_cost").append("<label class=\"control-label\">"+opt+" Million"+"</label>");
});

$('#approved_cost').on('input',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_approved_cost").hide();
    }
    else{
      $("#label_summary_approved_cost").show();
    }
    $("#summary_approved_cost").empty();
    $("#summary_approved_cost").append("<label class=\"control-label\">"+opt+" Million"+"</label>");
});

$('#planned_start_date').on('change',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_planned_start_date").hide();
    }
    else{
      $("#label_summary_planned_start_date").show();
    }
    $("#summary_planned_start_date").empty();
    $("#summary_planned_start_date").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#planned_end_date').on('change',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_planned_end_date").hide();
    }
    else{
      $("#label_summary_planned_end_date").show();
    }
    $("#summary_planned_end_date").empty();
    $("#summary_planned_end_date").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#revised_start_date').on('change',function(e){
    var opt = $(this).val();
    if(opt == ""){
      $("#label_summary_revised_start_date").hide();
    }
    else{
      $("#label_summary_revised_start_date").show();
    }
    $("#summary_revised_start_date").empty();
    $("#summary_revised_start_date").append("<label class=\"control-label\">"+opt+"</label>");
});

$('#districts').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_districts").hide();
    }
    else{
      $("#label_summary_districts").show();
    }
    $("#summary_districts").empty();
    values = $(this).find(':selected').text();
    $("#summary_districts").append("<label class=\"control-label\">"+values+"</label>");
});
$('#sponsoring_departments').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_sponsoring_department").hide();
    }
    else{
      $("#label_summary_sponsoring_department").show();
    }
    $("#summary_sponsoring_department").empty();
    values = $(this).find(':selected').text();
    $("#summary_sponsoring_department").append("<label class=\"control-label\">"+values+"</label>");
});
$('#executing_departments').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_executing_department").hide();
    }
    else{
      $("#label_summary_executing_department").show();
    }
    $("#summary_executing_department").empty();
    values = $(this).find(':selected').text();
    $("#summary_executing_department").append("<label class=\"control-label\">"+values+"</label>");
});
$('#assigning_forums').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_assingning_forums").hide();
    }
    else{
      $("#label_summary_assingning_forums").show();
    }
    $("#summary_assingning_forums").empty();
    values = $(this).find(':selected').text();
    $("#summary_assingning_forums").append("<label class=\"control-label\">"+values+"</label>");
});
$('#sectors').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_sectors").hide();
    }
    else{
      $("#label_summary_sectors").show();
    }
    $("#summary_sectors").empty();
    values = $(this).find(':selected').text();
    $("#summary_sectors").append("<label class=\"control-label\">"+values+"</label>");
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
$('#sub_sectors').on('change',function(e){
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
      $("#label_summary_sub_sectors").hide();
    }
    else{
      $("#label_summary_sub_sectors").show();
    }
    $("#summary_sub_sectors").empty();
    values = $(this).find(':selected').text();
    $("#summary_sub_sectors").append("<label class=\"control-label\">"+values+"</label>");
});
$(document).ready(function(){
  var next = 1;
  $(".add-more").click(function(e){
    //   console.log('adsf');

      e.preventDefault();
      var addto = "#field" + next;
      console.log(addto);
      var addRemove = "#field" + (next);
      next = next + 1;
      var newIn = '<div class="added'+(next-1)+'" ><label class="col-sm-4 control-label">Revised Approved Cost in Millions</label><div class="col-sm-8"><input name="revised_approved_costs[]" autocomplete="off" class="input form-control" id="field'+ next +'" value="'+$('input#field1').val()+'" type="text"> ';
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
  var next = 1;
  $(".add-more_second").click(function(e){
    //   console.log('adsf');

      e.preventDefault();
      var addto = "#field_second" + next;
      console.log(addto);
      var addRemove = "#field_second" + (next);
      next = next + 1;
      var newIn = '<div class="added'+(next-1)+'" ><label class="col-sm-4 control-label">Revised End Date</label><div class="col-sm-8"><input name="revised_end_dates[]" autocomplete="off" class="input form-control" id="field'+ next +'" value="'+$('input#field1').val()+'" type="date"> ';
    //   var newInput = $(newIn);
      var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me pull-right" style="    position: relative;top: -34px;" >-</button></div> ';
    //   var removeButton = $(removeBtn);
      $("span.secondspan").before(newIn +removeBtn);
    //   $("#field").append(removeButton);
    $('#field1').val('');

      $("#field_second").attr('data-source',$(addto).attr('data-source'));
    //   console.log(("#field" + next));
    //   $("#count").val(next);
          $('.remove-me').click(function(e){
              e.preventDefault();
              var fieldNum = this.id.charAt(this.id.length-1);
              var fieldID = "#field_second" + fieldNum;
              console.log(fieldID);

              $('.added'+fieldNum).remove();
            //   $(fieldID).remove();
          });
  });
});
</script>
@endsection
