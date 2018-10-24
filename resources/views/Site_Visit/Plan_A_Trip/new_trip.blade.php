@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
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
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Schedule Trip</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label>Type of Trip</label>
                    <select name="type" id="type" class="form-control" style="width: 100%;">
                      <option selected="selected">Select Type</option>
                      <option value="Local">Local</option>
                      <option value="Outstation">Outstation</option>
                    </select>
                  </div>


                <div id="local" style="display:none">
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

                <div class="" id="out" style="display: none">

                    <div class="form-group"  id='pr'>
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
                  <div class="form-group">
                      <label>
                          <input type="radio" name="r1" id="r1"class="minimal" checked>Round Trip
                      </label>
                      <label>
                          <input type="radio" name="r1" id="r2" class="minimal">Multi City
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

                    </div>
                </div>
                <div>
                  <button style="display: none; width:50%;margin-left:25%" type="button" class="btn btn-block btn-primary addcity">Add Another City</button>
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
          <div class="col-md-3"></div>
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