@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
  <style>
    .display_none{display:none;}
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    {{-- header --}}
    <section class="content-header">
        <h1>
         Plan A Trip
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
        </ol>
    </section>
    
    {{-- body --}}
    <section class="content col-md-12">
          <div class="col-md-2"></div>
          <div class="col-md-8">
              <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Schedule Trip</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label>Type of Trip</label>
                    <select name="type" id="type" class="form-control" style="width: 100%;">
                      <option selected="selected" hidden>Select Type</option>
                      <option value="Local">Local</option>
                      <option value="Outstation">Outstation</option>
                    </select>
                  </div>


                <div id="local" style="display:none">
                  
                    <label>
                        <input type="radio" name="rrx1" id="sinpr" class="minimal" checked='checked'>Single project
                    </label>
                    <label>
                        <input type="radio" name="rrx1" id="mulpr" class="minimal">Multi project
                    </label>
                    <div id="addclonemulprhere">
                    <div id="clonemulpr">
                        <div class="form-group">
                          <label>Purpose</label>
                          <select name="reason" id="reason" class="form-control" style="width: 100%;">
                            <option selected="selected">Select Reason For Visit</option>
                            <option value="Monitoring">Monitoring</option>
                            <option value="Evaluation">Evaluation</option>
                            <option value="Meeting">Meeting</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                        <div class="form-group" id='bd' style="display: none">
                          <label>Brief Description</label>
                          <input type="text" class="form-control" id="purpose" placeholder="Enter purpose for the trip">
                        </div>

                        {{-- <div class="form-group" id='pr' style="display: none">
                          <label>Project Title</label>
                          <input type="text" class="form-control" id="project" placeholder="Enter Project Name">
                        </div> --}}

                        <div class="form-group"  id='pr' style="display: none">
                            <div class="col-md-12">
                                <label for="ex2">ADP No.</label>
                            </div>
                            <div class="col-md-12" id="adpdiv" style="padding:0 !important">
                                <div class="col-md-3 style="padding:0 !important">
                                    <select class="form-control  select2" name="financial_year" id="financial_year" style="width:100% !important;">
                                          <option value="0">Select Financial Year </option>
                                        @for($i = 2 ; $i <= 30 ; $i++)
                                          @if($i == 9)
                                            <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                                          @elseif($i > 9)
                                            <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                                          @else
                                            <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                                          @endif
                                        @endfor
                                  </select>
                              {{-- <input class="form-control" type="text"style="text-align:center;" name="financial_year" value="2017-2018"> --}}
                              </div>
                              <div style="width:1%;float:left;padding-right:3.5%;">
                                  <span style="font-size:25px;float:left;">/</span>
                              </div>
                            <div class="col-md-3" style="padding:0 !important;">
                                <select class="form-control" name="adp_no[]" id="adp" style="float:left;">
                                    <option value="" selected>Select GS #</option>
                                    
                                  </select>
                              {{-- <input class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;"> --}}
                            </div>
                            <div class="col-md-5">
                                {{-- <label>Project Title</label> --}}
                                <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                                    <option>User's</option>
                                    <option>Projects</option>
                                    <option>Will</option>
                                    <option>Be</option>
                                    <option>Shown</option>
                                    <option>Here</option>
                                </select>
                            </div>
                            </div>

                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12 display_none" style="margin-top:3%;" id="addprbtn">
                        <button style="width: 50%; margin-left: 25%;" type="button" class="btn btn-block btn-primary">Add Another Project</button>
                    </div>

                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" id="purpose" value="Lahore" placeholder="Enter purpose for the trip">
                  </div>

                  <div class="datess">
                    <label class="control-label">Date</label>
                    <div class="form-group" id="datepick" >
                      <div class='input-group col-sm-12 date' id='my_date_awaein' style="padding:0 !important" >
                          <input type='text' id="my_date" required name="my_date" class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="datepick" style="margin-top:10px">
                    <label for="">Expected Time of Departure</label>
                    <select  name="my_time[]" class="form-control" style="text-align: center !important" id="">
                        <option value="">Select Time</option>
                        @for ($i = 1; $i < 12; $i++)
                          @for($j = 0; $j <= 45; $j+=30)
                            @if($j == 0)
                            <option value="{{$i . ' : ' . $j.'0' .' AM'}}"> {{$i . " : " . $j .'0'}} AM</option>
                            @else
                            <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                            @endif
                          @endfor
                        @endfor
                        <option value="12 : 00 PM">12 : 00 PM</option>
                        {{-- <option value="12 : 15 PM">12 : 15 PM</option> --}}
                        <option value="12 : 30 PM">12 : 30 PM</option>
                        {{-- <option value="12 : 45 PM">12 : 45 PM</option> --}}
                        @for ($i = 1; $i <= 11; $i++)
                          @for($j = 0; $j <= 45; $j+=30)
                            @if($j == 0)
                            <option value="{{$i . ' : ' . $j.'0' . ' PM' }}"> {{$i . " : " . $j .'0'}} PM</option>
                            @else
                            <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                            @endif
                          @endfor
                        @endfor
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Members</label>
                      <select id="members" name="members[]" class="form-control select2" multiple="multiple" data-placeholder="Members" style="width: 100%;">
                          <option>Hassan Ali</option>
                          <option>Aymun Saif</option>
                          <option>Aihtsham Ali</option>
                          <option>Anas Majeed</option>
                      </select>
                  </div>
                  <button type="button" class="btn btn-block btn-primary">Send Request</button>

                </div>

                <div class="" id="out" style="">

                  <div class="form-group">
                      <label>
                          <input type="radio" name="r12" id="r1"class="minimal" checked='checked'>Round Trip
                      </label>
                      <label>
                          <input type="radio" name="r12" id="r2" class="minimal">Multi City
                      </label>
                  </div>
                  <div id="addhere">
                      <div id="clonethis">
                        <div>
                            <label>Location</label>
                        </div>
  
                        <div class="form-group col-md-12" style="padding:0 !important">
                            <div class="form-group col-md-6" id='from'>
                              <label>From</label>
                              <input type="text" class="form-control" id="project" placeholder="Enter Location">
                            </div>
                            <div class="form-group col-md-6" id='to'>
                              <label>To</label>
                              <input type="text" class="form-control" id="project" placeholder="Enter Location">
                            </div>
                        </div>
  
                        {{-- <div>
                            <label>Date</label>
                        </div> --}}
  
                        <div class="form-group">
                          <label>Date range:</label>
          
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation">
                          </div>
                          <!-- /.input group -->
                        </div>
  
                        {{-- <div class="form-group col-md-12" style="padding:0 !important">
                            <div class="form-group col-md-6">
                                <label class="control-label">From</label>
                                <div class="form-group" id="datepick" >
                                  <div class='input-group col-sm-12 date' id='my_date_awaein' style="padding:0 !important" >
                                      <input type='text' id="my_date1" required name="my_date" class="form-control" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </div>
  
                            <div class="form-group col-md-6">
                                <label class="control-label">To</label>
                                <div class="form-group" id="datepick" >
                                  <div class='input-group col-sm-12 date' id='my_date_awaein' style="padding:0 !important" >
                                      <input type='text' id="my_date2" required name="my_date" class="form-control" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </div>
                        </div> --}}
  
                        <div class="form-group" id="datepick" style="margin-top:10px">
                          <label for="">Expected Time of Departure</label>
                          <select  name="my_time[]" class="form-control" style="text-align: center !important" id="">
                              <option value="">Select Time</option>
                              @for ($i = 1; $i < 12; $i++)
                                @for($j = 0; $j <= 45; $j+=30)
                                  @if($j == 0)
                                  <option value="{{$i . ' : ' . $j.'0' .' AM'}}"> {{$i . " : " . $j .'0'}} AM</option>
                                  @else
                                  <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                  @endif
                                @endfor
                              @endfor
                              <option value="12 : 00 PM">12 : 00 PM</option>
                              {{-- <option value="12 : 15 PM">12 : 15 PM</option> --}}
                              <option value="12 : 30 PM">12 : 30 PM</option>
                              {{-- <option value="12 : 45 PM">12 : 45 PM</option> --}}
                              @for ($i = 1; $i <= 11; $i++)
                                @for($j = 0; $j <= 45; $j+=30)
                                  @if($j == 0)
                                  <option value="{{$i . ' : ' . $j.'0' . ' PM' }}"> {{$i . " : " . $j .'0'}} PM</option>
                                  @else
                                  <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                  @endif
                                @endfor
                              @endfor
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Members</label>
                              <select id="members" name="members[]" class="form-control select2" multiple="multiple" data-placeholder="Members" style="width: 100%;">
                                  <option>Hassan Ali</option>
                                  <option>Aymun Saif</option>
                                  <option>Aihtsham Ali</option>
                                  <option>Anas Majeed</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div>
                    <button style="display: none; width:50%;margin-left:25%" type="button" class="btn btn-block btn-primary addcity">Add Another City</button>
                  </div>  
                </div>
                  <div class="form-group">
                      <label>
                          <input type="radio" name="r1" id="rr1" class="minimal" checked='checked'>Single Project
                      </label>
                      <label>
                          <input type="radio" name="r1" id="rr2" class="minimal">Multi Project
                      </label>
                  </div>
                  <div class="outproject">
                    outproject
                    <div class="form-group "  id='pr'>
                      <label>Project Title</label>
                        <select id="pt" name="pt[]" class="form-control select2" data-placeholder="pt" style="width: 100%;">
                            <option>User's</option>
                            <option>Projects</option>
                            <option>Will</option>
                            <option>Be</option>
                            <option>Shown</option>
                            <option>Here</option>
                        </select>
                    </div>
                    <div class="form-group" id="pr" style="">
                        <div class="col-md-12">
                            <label for="ex2">ADP No.</label>
                        </div>
                        <div class="col-md-12" id="adpdiv" style="padding:0 !important">
                            <div class="col-md-3 style=" padding:0 !important;>
                                <select class="form-control select2 select2-hidden-accessible" name="financial_year" id="financial_year" style="width:100% !important;" tabindex="-1" aria-hidden="true">
                                      <option value="0">Select Financial Year </option>
                                      <option value="2002-03">2002-03</option>
                                      <option value="2003-04">2003-04</option>
                                      <option value="2004-05">2004-05</option>
                                      <option value="2005-06">2005-06</option>
                                      <option value="2006-07">2006-07</option>
                                      <option value="2007-08">2007-08</option>
                                      <option value="2008-09">2008-09</option>
                                      <option value="2009-10">2009-10</option>
                                      <option value="2010-11">2010-11</option>
                                      <option value="2011-12">2011-12</option>
                                      <option value="2012-13">2012-13</option>
                                      <option value="2013-14">2013-14</option>
                                      <option value="2014-15">2014-15</option>
                                      <option value="2015-16">2015-16</option>
                                      <option value="2016-17">2016-17</option>
                                      <option value="2017-18">2017-18</option>
                                      <option value="2018-19">2018-19</option>
                                      <option value="2019-20">2019-20</option>
                                      <option value="2020-21">2020-21</option>
                                      <option value="2021-22">2021-22</option>
                                      <option value="2022-23">2022-23</option>
                                      <option value="2023-24">2023-24</option>
                                      <option value="2024-25">2024-25</option>
                                      <option value="2025-26">2025-26</option>
                                      <option value="2026-27">2026-27</option>
                                      <option value="2027-28">2027-28</option>
                                      <option value="2028-29">2028-29</option>
                                      <option value="2029-30">2029-30</option>
                                      <option value="2030-31">2030-31</option>
                          </select>
                          {{-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-financial_year-container"><span class="select2-selection__rendered" id="select2-financial_year-container" title="Select Financial Year ">Select Financial Year </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}

                          </div>
                          <div style="width:1%;float:left;padding-right:3.5%;">
                              <span style="font-size:25px;float:left;">/</span>
                          </div>
                        <div class="col-md-3" style="padding:0 !important;">
                            <select class="form-control" name="adp_no[]" id="adp" style="float:left;">
                                <option value="" selected="">Select GS #</option>
                                
                              </select>
                          
                        </div>
                        <div class="col-md-5">
                            
                            <select id="pt" name="pt[]" class="form-control select2 select2-hidden-accessible" data-placeholder="pt" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>User's</option>
                                <option>Projects</option>
                                <option>Will</option>
                                <option>Be</option>
                                <option>Shown</option>
                                <option>Here</option>
                            {{-- </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-pt-container"><span class="select2-selection__rendered" id="select2-pt-container" title="User's">User's</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                        </div>
                        </div>
                        <button style="width:50%;margin-left:25%" type="button" class="btn btn-block btn-primary addproj">Add Another Project</button>
                    </div>
                    
                  </div>

                  <div id='isme'>
                    <div id='isko'>

                      <button type="button" class="btn btn-block btn-primary">Send Request</button>

                  {{-- <div class="form-group">
                    <label>Date and time range:</label>
    
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservationtime">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div> --}}
                      {{-- <div class="form-group">
                            <label>Date range button:</label>
            
                            <div class="input-group">
                              <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                <span>October 22, 2018 - October 8, 2018</span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                          </div>
                <div class="form-group">
                    <label>Date range button:</label>

                    <div class="input-group">
                        <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                            <span>
                                <i class="fa fa-calendar"></i> Date range picker
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </button>
                    </div>
                </div> --}}
            </div>
          </div>
        </div>
    </section>
            
</div>


@endsection
@section('scripttags')
<script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript" src="{!! asset('js/AdminLTE/daterangepicker.js') !!}"></script>
  {{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}

<script>
  var temp
  $(document).ready(function(){
    temp = $('#isko').clone()
  })

$(document).on('click','.addproj',function(){
    console.log(temp);
    
    temp.appendTo('#isme').show('slow');
  })
  
  $(document).on('change','#mulpr',function(){
    $('#addprbtn').show('')
  })
  $(document).on('change','#sinpr',function(){
    $('#addprbtn').hide()
    var temp = $('#clonemulpr').clone()
    $('#addclonemulprhere').children().remove() 
    temp.appendTo('#addclonemulprhere');
  })
  $(document).on('click','#addprbtn',function(){
    $('#clonemulpr').clone().appendTo('#addclonemulprhere').show('slow');
  })
  $(document).on('change','#r1',function(){
    $('.addcity').hide()
  })
  $(document).on('change','#r2',function(){
    $('.addcity').show('slow')
  })

  $('.addcity').on('click',function(){
    $('#clonethis').clone().appendTo('#addhere').show('slow');
  })
$('#my_date').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $('#my_date1').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $('#my_date2').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
  });
  $(document).on('change','#type',function(){
    if ($(this).val() == "Local"){
      $('#out').hide()
      $('#local').show('slow')
    }
    else if($(this).val() == "Outstation"){
      $('#local').hide()
      $('#out').show('slow')
    }
    else{
      $('#local').hide()
      $('#out').hide()
    }
  })

  $(document).on('change','#reason',function(){
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $('#pr').hide()
      $('#bd').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $('#bd').hide()
      $('#pr').show('slow')
    }
    else{
      $('#bd').hide()
      $('#pr').hide()
    }

  })


        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()
      
          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
          //Date range as a button
          $('#daterange-btn').daterangepicker(
            {
              ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate  : moment()
            },
            function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )
      
          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })
      
          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
          })
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
          })
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
          })
      
          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()
      
          //Timepicker
          $('.timepicker').timepicker({
            showInputs: false
          })
        })
    </script>
@endsection