@extends('layouts.uppernav')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <h2>Edit Project Details</h2>
        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
            0%
          </div>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">  
        {{ csrf_field() }}
        <center style="font-size:10px"><b>Form Submition Progress<b></center>

        <section id="formslide"class="form1 col-md-12">

        <div class="form-group">
          <label for="">Project Name</label>
          <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$project->title}}">
        </div>
        <div class="form-group">
            <label for="">Project Type</label>
            <select name="project_type" id="" class="form-control" >
              <option value=""> {{$project->EvaluationType->name}}</option>
              <option value="1">Monitoring</option>
              <option value="2">Evaluation</option>
            </select>
        </div>
        <div class="form-group">
          <label for="">Starting Date</label>
          <input type="date" class="form-control" name="starting_date" value="{{$projectdetails->planned_start_date}}">
        </div>
        <div class="form-group">
          <label for="">Ending Date</label>
          <input type="date" class="form-control" name="ending_date" value="{{$projectdetails->planned_end_date}}">
        </div>
        <div class="form-group">
          <label for="">Sponsoring Agency</label>
          <select name="sponsor_agency_id" id="" class="form-control">
            <option value="">{{$sponsoring_departments[0]->name}}</option>
            @foreach ($sponsoring_departments as $sp)
              <option value="{{$sp->id}}">{{$sp->name}}</option>
            @endforeach
            {{-- <option value="">C &amp; W Department</option> --}}
            {{-- <option value="">City District Government</option> --}}
          </select>
        </div>
        <div class="form-group">
            <label for="">Executing Agency</label>
            <select name="executing_agency_id" id="" class="form-control">
              <option value="">{{$sp->name}}</option>
              @foreach ($executing_departments as $sp)
                <option value="{{$sp->id}}">{{$sp->name}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="">Planned Start Date</label>
          <input type="date" class="form-control" name="planned_start_date" value="">
        </div>
        <div class="">
          <input id="nextbutton" type="button" class="btn btn-success btn-md pull-right" name="" class="next1" value="Next">
        </div>
      </section>

        <section id="formslide2" class="form2 col-md-12" style="display:none">
        <div class="form-group">
          <label for="">Revenue Cost in Million Rs</label>
          <input type="number" step="0.01" class="form-control" name="revenue_cost" value="0.0">
        </div>
        <div class="form-group">
          <label for="">Capital Cost in Million Rs</label>
          <input type="number" step="0.01" class="form-control" name="capital_cost" value="0.0">
        </div>
        <div class="form-group">
          <label for="">Total Cost in Million Rs</label>
          <input type="number" step="0.01" class="form-control" name="total_cost" value="" disabled>
        </div>
        <div class="form-group">
          <label for="">Country</label>
          <input type="text" class="form-control" name="country" value="">
        </div>
        <div class="form-group">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="">
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" value="">
        </div>
        <div class="form-group">
          <label for="">SNE Cost</label>
          <input type="number" step="0.01" class="form-control" name="SNE_cost" value="">
        </div>
        <div class="form-group">
          <label for="">Total SNE Staff</label>
          <input type="number" class="form-control" name="SNE_staff" value="">
        </div>
        <div class="form-group">
          <label for="">SNE Both</label>
          <input type="checkbox" class="pull-right" name="SNE_both" value="1">
        </div>
        <div class="form-group">
          <label for="">Upload Attachments</label>
          <input type="file" class="pull-right" name="attachments">
        </div>
        <div class="pull-left">
          <input type="button" id="backbutton" class="btn btn-info btn-md pull-right" name="" class="" value="Back">
        </div>
        <div class="">
          <input type="submit" class="btn btn-success btn-md pull-right" name="submit" class="" value="Submit">
        </div>
      </section>
    </form>
      </div>
  </div>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  
  
</footer>
@endsection
@section('scripttags')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $('input[name="revenue_cost"] , input[name="capital_cost"]').on('change',function(){
    var tvalue=(parseFloat($('input[name="revenue_cost"]').val())+parseFloat($('input[name="capital_cost"]').val()));
    $('input[name="total_cost"]').val(tvalue)
  });
$("#nextbutton" ).on('click',function() {
  // $("#formslide").attr('class','col-md-6');
  // $("#formslide2").attr('class','col-md-6');
  $( "#formslide" ).hide();
  $( "#formslide2" ).show("slide", { direction: "right" }, 2000);
  $(".progress-bar").attr('style','width:50%');
  $(".progress-bar").text('50%');
  $(".progress-bar").attr('class','progress-bar progress-bar-striped progress-bar-success active');
  // $("progress-bar").attr('class','width:100%');
  // $("#formslide2").attr('class','col-md-12');
});
$("#backbutton" ).on('click',function() {
  console.log("entered");
  // $("#formslide").attr('class','col-md-6');
  // $("#formslide2").attr('class','col-md-6');
  $( "#formslide2" ).hide();
  $( "#formslide" ).show("slide", { direction: "left" }, 2000);
  $(".progress-bar").attr('style','width:0%');
  $(".progress-bar").text('0%');
  $(".progress-bar").attr('class','progress-bar progress-bar-striped progress-bar-success active');
  // $("progress-bar").attr('class','width:100%');
  // $("#formslide2").attr('class','col-md-12');
});
</script>
@endsection
