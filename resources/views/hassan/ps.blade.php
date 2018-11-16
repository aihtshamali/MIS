@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
  <style>
    .pt-3-half {
        padding-top: 1.4rem;
    }
  </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                PS Dashboard
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
    
            </ol>
        </section>

        <section class="content col-md-12">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">abc</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group" id='bd'>
                            <label>Name</label>
                            <input type="text" class="form-control" id="purpose" placeholder="Enter purpose for the trip">
                        </div>
                        <div class="form-group">
                            <label>Sector</label>
                            <select name="reason" id="reason" class="form-control select2" multiple="multiple" style="width: 100%;">
                                <option >Select sector</option>
                                <option value="Monitoring" selected="selected">Civil</option>
                                <option value="Evaluation" selected="selected">Health</option>
                                <option value="Meeting">IC</option>
                                <option value="Other" >Other</option>
                            </select>
                        </div>

                        <div class="datess">
                            <label class="control-label">Contract Start Date</label>
                            <div class="form-group" id="datepick" >
                                <div class='input-group col-sm-12 date' id='my_date_awaein' style="padding:0 !important" >
                                    <input type='text' id="my_date" required name="my_date" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="datess">
                            <label class="control-label">Contract End Date</label>
                            <div class="form-group" id="datepick" >
                                <div class='input-group col-sm-12 date' id='my_date_awein' style="padding:0 !important" >
                                    <input type='text' id="my_date2" required name="my_date2" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id='bd'>
                            <label>Amount</label>
                            <input type="text" class="form-control" id="purpose" placeholder="Enter purpose for the trip">
                        </div>

                        <div class="form-group" id='bd'>
                            <label>Document</label>
                            <input type="text" class="form-control" id="purpose" placeholder="Enter purpose for the trip">
                        </div>

                    </div>
                </div>
            
            </div>
            
            <div class="col-md-3"></div>
        </section>
    </div>
@endsection
@section('scripttags')

    
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
    //   $('#my_date').datetimepicker({
    //                   viewMode: 'days',
    //                   format: 'DD-MM-YYYY'
    //     });
    //     $('#my_date1').datetimepicker({
    //                   viewMode: 'days',
    //                   format: 'DD-MM-YYYY'
    //     });
    //     $('#my_date2').datetimepicker({
    //                   viewMode: 'days',
    //                   format: 'DD-MM-YYYY'
    //     });
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
