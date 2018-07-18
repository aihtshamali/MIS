@extends('layouts.uppernav')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <h2>Enter Project Details</h2>
        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">
            50%
          </div>
        </div>
        <center style="font-size:10px"><b>Form Submition Progress<b></center>

        <section id="formslide"class="form1 col-md-12">

        <div class="form-group">
          <label for="">Project Name</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Starting Date</label>
          <input type="date" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Ending Date</label>
          <input type="date" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Sponsoring Agency</label>
          <select name="" id="" class="form-control">
            <option value="">Select Sponsoring Agency</option>
            <option value="">C &amp; W Department</option>
            <option value="">City District Government</option>
          </select>
        </div>
        <div class="form-group">
            <label for="">Executing Agency</label>
            <select name="" id="" class="form-control">
              <option value="">Select Executing Agency</option>
              <option value="">C &amp; W Department</option>
              <option value="">City District Government</option>
            </select>
        </div>
        <div class="form-group">
          <label for="">Total Cost in Million Rs</label>
          <input type="number" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Capital Cost in Million Rs</label>
          <input type="number" class="form-control" name="" value="">
        </div>
        <div class="">
          <input id="nextbutton" type="button" class="btn btn-success btn-md pull-right" name="" class="next1" value="Next">
        </div>
      </section>

        <section id="formslide2" class="form2 col-md-12" style="display:none">

        <div class="form-group">
          <label for="">Project Title</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Starting Date</label>
          <input type="date" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Total Cost in Rs</label>
          <input type="number" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Project Title</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Project Title</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Project Title</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Project Title</label>
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="">
          <input type="button" class="btn btn-success btn-md pull-right" name="" class="next2" value="Next">
        </div>
      </section>
      </div>
  </div>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io/">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>
@endsection
@section('scripttags')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  console.log('re');
$("#nextbutton" ).on('click',function() {
  console.log("entered");
  // $("#formslide").attr('class','col-md-6');
  // $("#formslide2").attr('class','col-md-6');
  $( "#formslide" ).hide();
  $( "#formslide2" ).show("slide", { direction: "right" }, 2000);
  $(".progress-bar").attr('style','width:100%');
  $(".progress-bar").text('100%');
  $(".progress-bar").attr('class','progress-bar progress-bar-striped progress-bar-success active');
  // $("progress-bar").attr('class','width:100%');
  // $("#formslide2").attr('class','col-md-12');
});
</script>
@endsection
