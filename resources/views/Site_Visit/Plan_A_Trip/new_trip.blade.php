@extends('_Monitoring.layouts.upperNavigation')
@section('styleTags')
 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/multiselect/css/multi-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/pages/advance-elements/css/bootstrap-datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/datedropper.min.css')}}" />

<style>
    .bg-w{background-color: #fff !important;}
    /* .form-control {margin: 1% !important;} */
    .form-control {border:none !important;margin-bottom:2%;color:#353333 !important;color: #353333 !important;border: 1px solid #d9d5d536 !important}
    .form-radio {display: -webkit-inline-box !important;}
    .inlinebox {display: inline-box !important;display: -webkit-inline-box !important; padding-left: 0 !important; padding-right: 0 !important}
    .noborder{border:none !important;}
    .displaynone{display: none;}
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: #01a9ac !important;
        padding:1% !important;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple{
        border: solid #01a9ac 1px !important;
    }
    .select2-container--default .select2-selection--multiple{
        padding: 0px !important;
        border: 1px solid #1918180f;
    }
    .btn-primary:hover, .sweet-alert button.confirm:hover, .wizard>.actions a:hover{
        background-color: #01a9ac !important;
    border-color: #01a9ac !important;
    }
    .nodisplay{display: none;}
    .bg{background-color: #e0e0e0}
    .datepicker, .datepicker-dropdown, .dropdown-menu, .datepicker-orient-left, .datepicker-orient-top{z-index: 9999 !important;}
    .day {
    color: #000;
    padding-left: 10px;
    font-size: 14px;
}
</style>
@endsection
@section('content')
    <form action="" class="offset-md-2 col-md-8 form-control form-control-default">
            <select name="select" class="form-control form-control-default">
                <option value="Local" class="" selected>Local</option>
                <option value="Outstation" class="">Outstation</option>
            </select>
            <div class="local">
                    <div class="col-md-12">
                            <div class="form-radio">
                                    <div class="radio radio-outline radio-inline" >
                                        <label>
                                            <input type="radio" class="sinpurpose" name="radio" checked="checked">
                                            <i class="helper"></i>Single purpose
                                        </label>
                                    </div>
                                    <div class="radio radio-outline radio-inline">
                                        <label>
                                            <input type="radio" class="mulpurpose" name="radio">
                                            <i class="helper"></i>Multi purpose
                                        </label>
                                    </div>
                            </div>
                        </div>
                    <div id="clonethisproposal_1">
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-4">
                                <select id="reason_1" name="select" class="form-control form-control-default reason">
                                    <option selected="selected" hidden>Select Reason For Visit</option>
                                    <option value="Monitoring">Monitoring</option>
                                    <option value="Evaluation">Evaluation</option>
                                    <option value="Meeting">Meeting</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class='form-control nodisplay col-md-8 row' id='brief'>
                                <input style="width:100%" placeholder="Enter a brief description for visit" type="text" />
                            </div>
                            
                            <div id='gsrow' class="col-md-8 row nodisplay">
                                <div class="col-md-3">
                                    {{-- <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>Year</option>
                                    </select> --}}
                                    <select class="form-control  select2" name="financial_year" id="financial_year" style="width:100% !important;">
                                            <option value="0" hidden>Select Financial Year </option>
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
                                </div>
                                <h2 class="col-md-1">/</h2>
                                <div class="col-md-3">
                                    <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>GS#</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>project</option>
                                        <option value="opt1" selected>project</option>
                                    </select>
                                </div>
                            </div>

                            
                        </div>
                        <label for="">Location</label>
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-12" style="padding-left:0">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected hidden>Lahore</option>
                                </select>
                            </div>
                            {{-- <div class="col-md-6" style="padding-left:0">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected hidden>To</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-6" style="padding-left:0">
                                <label for="">Date</label>
                                {{-- <input class="form-control" type="datetime-local"> --}}
                                {{-- <div class="input-group date" id="datetimepicker10">
                                    <input type="text" class="form-control" >
                                    <span class="input-group-addon ">
                                    <span class="icofont icofont-ui-calendar"></span>
                                    </span>
                                </div> --}}
                                <div class="input-group date input-group-date-custom">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon ">
                                    <i class="icofont icofont-clock-time"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-left:0">
                                <label for="">Time</label>
                                {{-- <input class="form-control" type="time"> --}}
                                <select  name="my_time[]" class="form-control" style="text-align: center !important" id="">
                                    <option value="" hidden>Expected Time of Departure</option>
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
                        <div class="form-group" id='thishit'>
                            <label>Members</label>
                            <select id="members" name="members[]" class="form-control js-multiple js-placeholder-multiple" multiple="multiple" data-placeholder="Select Members" style="width: 100%;">
                                <option>Hassan Ali</option>
                                <option>Aymun Saif</option>
                                <option>Aihtsham Ali</option>
                                <option>Anas Majeed</option>
                            </select>
                        </div>
                    </div>
                    <div class="addclonehere"></div>
                    <div class="form-group">
                        <div class="nodisplay addnewproposal btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-plus"></i>Add purpose</div>
                    </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Submit</button>
                        </div>

            </div>
            <div class="outstation nodisplay">
                <div class="col-md-12">
                    <div class="form-radio">
                            <div class="radio radio-outline radio-inline">
                                <label>
                                    <input type="radio" class="sinpurposeout" name="radioout" checked="checked">
                                    <i class="helper"></i>single purpose
                                </label>
                            </div>
                            <div class="radio radio-outline radio-inline">
                                <label>
                                    <input type="radio" class="mulpurposeout" name="radioout">
                                    <i class="helper"></i>Multi purpose
                                </label>
                            </div>
                    </div>
                </div>
                <div class="sinpurpose ">

                </div>
            </div>
    </form>
@endsection
@section('js_scripts')
<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
{{-- <script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script> --}}
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('_monitoring/js/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/custom-picker.js')}}"></script>
<script>
    var cl = `
        <div class="form-group" id='thishit'>
            <label>Members</label>
            <select id="members" name="members[]" class="form-control js-multiple js-placeholder-multiple" multiple="multiple" data-placeholder="Select Members" style="width: 100%;">
                <option>Hassan Ali</option>
                <option>Aymun Saif</option>
                <option>Aihtsham Ali</option>
                <option>Anas Majeed</option>
            </select>
        </div>
    `
    var purpose_id = 1
     $(document).on('change','.reason',function(){
         console.log($(this).parent().parent().find('#gsrow'))
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $(this).parent().parent().find('#gsrow').hide()
      $(this).parent().parent().find('#brief').attr('style','display:flex !important').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $(this).parent().parent().find('#brief').hide()
      $(this).parent().parent().find('#gsrow').attr('style','display:flex !important').show('slow')
    }
  })

    $(document).on('click','.addnewproposal',function(){
        var clone = $('#clonethisproposal_1').clone().attr('id','clonethisproposal_'+ ++purpose_id)
        if(purpose_id % 2 == 0)
            clone.addClass('bg')
        // clone.children().find('#gsrow_'+(purpose_id-1)).attr('id','gsrow_'+purpose_id)
        // clone.children().find('#brief_'+(purpose_id-1)).attr('id','brief_'+purpose_id)
        clone.children().find('#reason_'+(purpose_id-1)).attr('id','reason_'+purpose_id)
        clone.appendTo('.addclonehere').show('slow');
        clone.find("#thishit").remove()
        clone.append(cl);
        $(".js-multiple").select2();
        clone.find('.date').datepicker()
    });
  $(document).ready(function(){
    $(".js-multiple").select2();
    $(".sinpurpose").click(function(){
        $(".addnewproposal").hide();
        });
    $(".mulpurpose").click(function(){ 
        $(".addnewproposal").show();
        });
    $(".sinpurposeout").click(function(){
        $(".addnewproposalout").hide();
        });
    $(".mulpurposeout").click(function(){
        $(".addnewproposalout").show();
        });
    });
    $(document).on('change','#type',function(){
    if ($(this).val() == "Local"){
      $('.outstation').hide()
      $('.local').show('slow')
    }
    else if($(this).val() == "Outstation"){
      $('local').hide()
      $('.outstation').show('slow')
    }
    else{
      $('.local').hide()
      $('.outstation').hide()
    }
  });
    
</script>


@endsection