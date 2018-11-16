@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | New Trip
@endsection
@section('styleTags')
 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/component.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/multiselect/css/multi-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/pages/advance-elements/css/bootstrap-datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/daterangepicker.css')}}" />
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/pages/notification/notification.css')}}">
<!-- Animate.css -->
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/animate.css')}}">
 {{-- <link rel="stylesheet" href="{{ asset('_monitoring/css/css/sweetalert.css')}}" /> --}}
    
    {{-- <link rel="stylesheet" href="{{ asset('_monitoring/css/css/datedropper.min.css')}}" /> --}}
    <style>
        .bg-w{background-color: #fff !important;}
        .daterangepicker td.in-range {
            background-color: #357ebd;
            }
        /* label{padding-left: 7px !important;} */
        /* .form-control {margin: 1% !important;} */
        .form-control {border:none !important;margin-bottom:2%;border: 1px solid #d9d5d563 !important}
        .form-radio {display: -webkit-inline-box !important;}
        form{box-shadow:0px 0px 45px 2px #7777774d;}
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
        .bg{background-color: #f6f7fb;padding: 1% 0.5%;border-radius: 0px 0px 5px 5px;}
        .datepicker, .datepicker-dropdown, .dropdown-menu, .datepicker-orient-left, .datepicker-orient-top{z-index: 9999 !important;}
        .day {
        color: #000;
        padding-left: 10px;
        font-size: 14px;
        }
        input[type="text"] {
        border: none;
        width: 100% !important;
        }
        #brief, #briefround{width:83% !important;}
        .nopaddinglef{padding-left: 0px !important;}
        .nopaddingright{padding-right: 0px !important;}
        .border{border: 1px solid #d9d5d563 !important;}
        .form-control, button, select {border-radius: 5px !important;}
        .form-control, select, input[type="text"] {color: #777777eb !important;}
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */color: #777777eb;}
        ::-moz-placeholder { /* Firefox 19+ */
            color: #777777eb;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #777777eb;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #777777eb;
        }
        .nopadlefright{padding-left:0px !important; padding-right: 0px !important;}
        .w3-animate-top{position:relative;animation:animatetop 0.4s}@keyframes animatetop{from{top:-900px;opacity:0} to{top:0;opacity:1}}
        .w3-animate-left{position:relative;animation:animateleft 0.4s}@keyframes animateleft{from{left:-900px;opacity:0} to{left:0;opacity:1}}
        .w3-animate-right{position:relative;animation:animateright 0.4s}@keyframes animateright{from{right:-900px;opacity:0} to{right:0;opacity:1}}
        .w3-animate-bottom{position:relative;animation:animatebottom 0.4s}@keyframes animatebottom{from{bottom:-300px;opacity:0} to{bottom:0;opacity:1}}
        /* .select2-container--default .select2-selection--single .select2-selection__rendered{background-color:transparent !important;border: none !important;} */
        /* .select2-container--default .select2-selection--single{border: none !important;padding: 2.5% !important;} */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
        background-color: transparent !important;
        color: #777777eb !important;
        padding: 0px 1.5% !important;
        }
        select span{padding: 1% !important;}
        /* .select2-container--default .select2-selection--single{border: 1px solid transparent !important;}
        .select2-container{padding: 0.5% !important;}
        .select2-container--default .select2-selection--multiple .select2-selection__rendered{padding: 1% !important;}
        .col-md-12{border-radius: 5px !important;}
        .select2-container{border-radius: 5px;} */
        /* .select2-container--default .select2-selection--multiple{border: none !important;} */
        .dlt_btn{display: none;width: fit-content;float: right;font-size: 20px;color: #777;padding: 0px 13px 0px 9px !important;line-height: 30px;font-weight: 900;letter-spacing: -4px;border: 1px solid transparent;border-radius: 50%;}
        .dlt_btn:hover {color: #e65a5a;transition: all 900ms ease;border: 1px solid #e65a5a;border-radius: 50%;}
        .dlt_btnout{width: fit-content;float: right;font-size: 20px;color: #777;margin:5px;padding: 0px 13px 0px 9px !important;line-height: 30px;font-weight: 900;letter-spacing: -4px;border: 1px solid transparent;border-radius: 50%;}
        .dlt_btnout:hover {color: #e65a5a;transition: all 900ms ease;border: 1px solid #e65a5a;border-radius: 50%;}
        .pointer{cursor: pointer;}
        .btn{border-radius: 5px !important;}
        .select2-container--default .select2-selection--single{border: 1px solid #f0efef !important;}
        .select2-container{width: 100% !important;}
        .select2-container .select2-selection--single{height: 38px !important;}
        .page-body{margin:auto;width:70% !important;}
  </style>
@endsection
@section('content')
@include('inc.msgs')
    <h4><b>Schedule New Visit</b></h4><br>
    <label for=""><b>Trip Type</b> </label>
    <select name="triptype_id" id="type" class="triptype_id form-control form-control-default">
        <option value="" selected disabled>Select Trip Type</option>
        @foreach ($triptypes as $triptype)
        <option value="{{$triptype->id}}">{{$triptype->name}}</option>
        @endforeach
    </select>
    <div class="col-md-12 purposetypelocal" style=" display:none; padding-left: 0px !important;">
            <div class="col-md-3">
                <label for=""><b>Purpose Type</b> </label>
            </div>
            <div class="form-radio col-md-8">
                @foreach ($purposetypes as $purposetype)

                <div class="radio radio-outline radio-inline">
                    <label>
                        <input type="radio" class="purposetype" name="purposetypeforLocal" id="purposetypevalforlocal" value="{{$purposetype->id}}">
                        <i class="helper"></i>{{$purposetype->name}}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="local">
    <form action="{{route('trip.store')}}" id= "formlocal_1" name="formforlocal" method="POST"  class="col-md-12 form-control form-control-default">
            {{ csrf_field() }}
            <div id="clonethisproposal_1" class="w3-animate-top">
                <div class="col-md-12 inlinebox">
                    <div class="col-md-3 nopaddinglef">
                        <select id="visit_reasonForLocal" name="visit_reasonForLocal" class="form-control form-control-default reason">
                            <option selected="selected" disabled hidden>Select Here</option>
                            @foreach ($visitreasons as $visitreason)
                            <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id='gsrow' class="col-md-9 row nodisplay w3-animate-left nopadlefright">
                        <div class="col-md-2 nopadlefright">
                            <select class="form-control  select2" name="financial_yearForLocal" id="financial_yearForLocal" style="width:100% !important;margin-left:7%;">
                                <option value="" disabled selected>Pick Year</option>
                                    @for($i = 2 ; $i <= 30 ; $i++) @if($i==9) <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                                    @elseif($i > 9)
                                    <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                                    @else
                                    <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                                    @endif
                                    @endfor
                            </select>
                        </div>

                        <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                        <div class="col-md-2 nopadlefright">
                            <select name="gs_noForLocal" class="form-control form-control-default">
                                    <option value="" disabled selected>Gs #</option>
                                    @foreach ($projects as $pro)
                                <option value="{{$pro->id}}">{{$pro->Project->ADP}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 nopaddingright" style="width:41.5% !important; ">
                            <select name="project_nameForLocal" class="form-control  yeselect form-control-default">
                                <option value="" disabled selected>Project Name</option>
                                @foreach ($projects as $pro)
                            <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class='form-control col-md-9 nodisplay w3-animate-left' id='brief'>
                        <input type="text" name="local_description" placeholder="Enter Description Here...." />
                    </div>

                </div>
                <label for=""><b>Location</b></label>
                <div class="col-md-12 inlinebox nopaddingright">
                    <div class="col-md-12 nopadlefright" style="">
                        <select name="local_loc" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 inlinebox" style="margin-top:10px">
                    <div class="col-md-6" style="padding-left:0">
                        <label for=""><b>Date</b></label>
                        <div class="input-group date multiple-select">
                            <input type="text" name="local_date" class="form-control">
                            <span class="input-group-addon ">
                                  <i class="icofont icofont-clock-time"></i>
                            </span>
                        </div>
                    </div>
                    <div class="nopaddingright col-md-6" style="padding-left:0">
                        <label for=""><b>Time</b></label>
                        <select name="expectd_TimeForlocal" class="form-control" style="text-align: center !important" id="">
                            <option value="" hidden disabled>Expected Time of Departure</option>
                            @for ($i = 1; $i < 12; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' .' AM'}}">
                                {{$i . " : " . $j .'0'}} AM</option>
                                @else
                                <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                @endif
                                @endfor
                                @endfor
                                <option value="12 : 00 PM">12 : 00 PM</option>
                                <option value="12 : 30 PM">12 : 30 PM</option>
                                @for ($i = 1; $i <= 11; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' . ' PM' }}">
                                {{$i . " : " . $j .'0'}} PM</option>
                                @else
                                <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                @endif
                                @endfor
                                @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group" id='local_members'>
                    <label><b>Members</b></label>
                    <select id="members" name="local_members[]" class="form-control officerSelect" multiple="multiple"
                        data-placeholder="Select Members" style="width: 100%;">
                        @foreach ($officers as $officer)
                        <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group localpurpose" onclick="">
                <div class="nodisplay addnewproposal btn-block w3-animate-bottom btn btn-inverse btn-outline-inverse" disabled ><i
                        class="icofont icofont-plus"></i>Add purpose</div>
            </div>

            <div class="form-group notifications">
                    <button class="btn btn-success btn-outline-success btn-block submitlocal waves-effect"  type="submit" data-type="inverse" data-from="top" data-align="right" >Save and Submit</button>
                {{-- <button class="btn submitlocal btn-success waves-effect" type="submit" data-type="inverse" data-animation-in="animated fadeInDown" data-animation-out="animated fadeOutDown">Save & Submit</button> --}}
                {{-- <button class="btn submitlocal alert-confirm btn-success btn-block"  type="submit"><i class="icofont icofont-user-alt-3"></i>Save & Submit</button> --}}
                {{-- <button class="btn btn-success btn-block"><i class="icofont icofont-user-alt-3"></i>Submit</button> --}}
            </div>
    </form>
</div>
    <div class="outstation nodisplay">
        <div class="col-md-12">
            <div class="form-radio">
            @foreach ($purposetypes as $purposetype)
            <div class="radio radio-outline radio-inline">
            <label>
            <input type="radio" class="purposetypeForOutstation" name="purposetypeForOutstation" value="{{$purposetype->id}}">
            <i class="helper"></i>{{$purposetype->name}}
            </label>
            </div>
            @endforeach
            </div>
        </div>
        <div class="sinpuroundposeout">
            <div class="col-md-12">
                <div class="form-radio">
                @foreach ($subcitytypes as $subcitytype)
                <div class="radio radio-outline radio-inline">
                <label>
                <input type="radio" class="subcitytypeForOutstation" name="subcitytypeForOutstation" value="{{$subcitytype->id}}">
                <i class="helper"></i>{{$subcitytype->name}}
                </label>
                </div>
                @endforeach

                </div>
            </div>
        </div>
        <div id="newFormforOutstation">
            <form action="{{route('trip.store')}}" id= "form_1" name="formforoutstation" method="POST"  class="col-md-12 form-control form-control-default">
                {{ csrf_field() }}
                <div id="roundtripp_1">
                    <div class="col-md-12 inlinebox">
                        <div class="col-md-3 nopadlefright">
                        <select id="outstationVisitReason" name="outstationVisitReason" class="form-control form-control-default reasonroundtrip">
                        <option selected="selected" hidden>Select Here</option>
                        @foreach ($visitreasons as $visitreason)
                        <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                        @endforeach
                        </select>
                        </div>

                        <div id='gsrowround' class="nodisplay col-md-10 row w3-animate-left nopaddingright">
                        <div class="col-md-2 no nopaddingright">
                        <select class="form-control yeselect  select2" name="financial_yearForOutstation" id="financial_yearForOutstation" style="width:100% !important;margin-left:7%;">
                            <option value="" disabled selected>Pick Year</option>
                                @for($i = 2 ; $i <= 30 ; $i++) @if($i==9) <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                                @elseif($i > 9)
                                <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                                @else
                                <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                                @endif
                                @endfor
                        </select>
                        </div>
                        <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                        <div class="col-md-2">
                            <select name="gs_noForOutstation" class="form-control yeselect form-control-default">
                                <option value="" disabled selected>Gs #</option>
                                @foreach ($projects as $pro)
                            <option value="{{$pro->id}}">{{$pro->Project->ADP}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="col-md-4 nopaddingright" style="width:41.5% !important;">
                            <select name="project_nameForOutstation" class="form-control  yeselect form-control-default">
                                <option value="" disabled selected>Project Name</option>
                                @foreach ($projects as $pro)
                            <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                @endforeach

                            </select>
                        </div>
                        </div>

                        <div class='form-control col-md-8 offset-md-1 nodisplay w3-animate-left' id='briefround'>
                        <input type="text" name="outstation_description" placeholder="Enter Description Here..." />
                        </div>
                    </div>

                    <div id='multicitycloneadd'>
                        <div class="col-md-12 inlinebox" style="margin-top:10px" >
                            <div class="col-md-6 nopaddinglef">
                                    <label for=""><b>From Location</b></label>
                                <select name="outstation_Fromloc_1" class="form-control yeselect">
                                    <option value="" selected disabled>Select Location</option>
                                    @foreach ($cities as $city)
                                    <option value={{$city->id}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 nopaddingright">
                                    <label for=""><b>To Location</b></label>
                                <select name="outstation_Toloc_1" class="form-control yeselect">
                                    <option value="" selected disabled>Select Location</option>
                                    @foreach ($cities as $city)
                                    <option value={{$city->id}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 inlinebox nopaddinglef" style="margin-top:10px">
                            <div class="col-md-12 nopaddinglef">
                                <label for=""><b>Date</b></label><br />
                                <input type="text" name="daterange_1" class="form-control daterangeForOutstation" value="" placeholder="Select Date">

                            </div>
                        </div>
                        <div class="col-md-12 inlinebox" style="margin-top:10px">
                            <div class="nopaddingright col-md-12" style="padding-left:0">
                                <label for=""><b>Expected Time of Departure</b></label>
                                <select name="expectd_TimeForOutstation_1" class="form-control" style="text-align: center !important" id="">
                                    <option value="" Selected disabled>Choose Time</option>
                                    @for ($i = 1; $i < 12; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' .' AM'}}">
                                        {{$i . " : " . $j .'0'}} AM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                        @endif
                                        @endfor
                                        @endfor
                                        <option value="12 : 00 PM">12 : 00 PM</option>
                                        <option value="12 : 30 PM">12 : 30 PM</option>
                                        @for ($i = 1; $i <= 11; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' . ' PM' }}">
                                        {{$i . " : " . $j .'0'}} PM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                        @endif
                                        @endfor
                                        @endfor
                                    </select>
                            </div>
                        </div>

                        <div class="form-group" id='outstation_members'>
                            <label><b>Members</b></label>
                            <select id="outstation_members" name="outstation_members_1[]" class="form-control officerSelect" multiple="multiple"
                                data-placeholder="Select Members" style="width: 100%;">
                                @foreach ($officers as $officer)
                                <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="counterForCity" value="1"/>

                    </div>

                    <input type="hidden" name="counterforloopofOutstation" value="1"/>

                    <div class="addroundclonehere">
                    </div>
                    <button  onclick="addCity(this)" style="margin-bottom: 25px;"  type="button"  class="nodisplay btn btn-info btn-outline-info addnewmulcityout btn-block"><i class="icofont icofont-plus"></i>Add New Location
                    </button>
                </div>

                <div id="addmultiprhere">
                </div>

                <div class="form-group purposeClass" onclick="">
                    <div class="addnewproposoutcity nodisplay btn btn-inverse btn-outline-inverse btn-block" disabled>
                        <i class="icofont icofont-plus"></i>Add New Purpose
                    </div>
                </div>
                <div class="form-group notifications">
                <button class="btn btn-success btn-outline-success btn-block submit waves-effect"  type="submit" data-type="inverse" data-from="top" data-align="right" >Save and Submit</button>
                {{-- <button class="btn submit btn-success btn-block"  type="submit"><i class="icofont icofont-user-alt-3"></i>Save & Submit</button> --}}
                </div>
        </form>
    </div>
</div>
@endsection
@section('js_scripts')
<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->

<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/custom-picker.js')}}"></script>
<script  src="{{asset('_monitoring/css/js/bootstrap-growl.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/notification/notification.js')}}"></script>

<script>
    var counter=2;
    var purposeCountforloop=2;

    var counter_outstation=1;
    var counterforloopofOutstation=1;

    var city_counter=2;

    var Formnum=2;
    var Formnum_local=2;

    var purpose_id = 1;
    var purpose_id2 = 1;
    var purpose_id2_local = 1;
    var city_id2 = 1;
    var roundpurposal = 1;
    var append_id=2

    function addPurpose(e){
        ++counter_outstation;
        ++counterforloopofOutstation;

        var multiPurposeforOutstation =`
                <form action="{{route('trip.store')}}" id= "form_`+Formnum+`" name="formforoutstation" method="POST"  class="col-md-12 form-control form-control-default">
            {{ csrf_field() }}
            <div id="roundtripp_1">
                <div class="col-md-12 inlinebox">
                    <div class="col-md-3 nopadlefright">
                    <select id="outstationVisitReason" name="outstationVisitReason" class="form-control form-control-default reasonroundtrip">
                    <option selected="selected" hidden>Select Here</option>
                    @foreach ($visitreasons as $visitreason)
                    <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                    @endforeach
                    </select>
                    </div>

                <div id='gsrowround' class="nodisplay col-md-10 row w3-animate-left nopaddingright">
                <div class="col-md-2 no nopaddingright">
                <select class="form-control yeselect  select2" name="financial_yearForOutstation" id="financial_yearForOutstation" style="width:100% !important;margin-left:7%;">
                    <option value="" disabled selected>Pick Year</option>
                        @for($i = 2 ; $i <= 30 ; $i++) @if($i==9) <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                        @elseif($i > 9)
                        <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                        @else
                        <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                        @endif
                        @endfor
                </select>
                </div>
                <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                <div class="col-md-2">
                    <select name="gs_noForOutstation" class="form-control yeselect form-control-default">
                        <option value="" disabled selected>Gs #</option>
                        @foreach ($projects as $pro)
                    <option value="{{$pro->id}}">{{$pro->Project->ADP}}</option>
                        @endforeach
                </select>
                </div>
                <div class="col-md-4 nopaddingright" style="width:41.5% !important;">
                    <select name="project_nameForOutstation" class="form-control  yeselect form-control-default">
                        <option value="" disabled selected>Project Name</option>
                        @foreach ($projects as $pro)
                    <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                        @endforeach

                    </select>
                </div>
                </div>

                <div class='form-control col-md-8 offset-md-1 nodisplay w3-animate-left' id='briefround'>
                <input type="text" name="outstation_description" placeholder="Enter Description Here..." />
                </div>
            </div>

            <div id='multicitycloneadd'>
                <div class="col-md-12 inlinebox" style="margin-top:10px" >
                    <div class="col-md-6 nopaddinglef">
                            <label for=""><b>From Location</b></label>
                        <select name="outstation_Fromloc_1" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 nopaddingright">
                            <label for=""><b>To Location</b></label>
                        <select name="outstation_Toloc_1" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 inlinebox nopaddinglef" style="margin-top:10px">
                    <div class="col-md-12 nopaddinglef">
                        <label for=""><b>Date</b></label><br />
                        <input type="text" name="daterange_1" class="form-control daterangeForOutstation" value="" placeholder="Select Date">

                    </div>
                </div>
                <div class="col-md-12 inlinebox" style="margin-top:10px">
                    <div class="nopaddingright col-md-12" style="padding-left:0">
                        <label for=""><b>Expected Time of Departure</b></label>
                        <select name="expectd_TimeForOutstation_1" class="form-control" style="text-align: center !important" id="">
                            <option value="" Selected disabled>Choose Time</option>
                            @for ($i = 1; $i < 12; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' .' AM'}}">
                                {{$i . " : " . $j .'0'}} AM</option>
                                @else
                                <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                @endif
                                @endfor
                                @endfor
                                <option value="12 : 00 PM">12 : 00 PM</option>
                                <option value="12 : 30 PM">12 : 30 PM</option>
                                @for ($i = 1; $i <= 11; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' . ' PM' }}">
                                {{$i . " : " . $j .'0'}} PM</option>
                                @else
                                <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                @endif
                                @endfor
                                @endfor
                            </select>
                    </div>
                </div>

                <div class="form-group" id='outstation_members'>
                    <label><b>Members</b></label>
                    <select id="outstation_members" name="outstation_members_1[]" class="form-control officerSelect" multiple="multiple"
                        data-placeholder="Select Members" style="width: 100%;">
                        @foreach ($officers as $officer)
                        <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="counterForCity" value="1"/>

            </div>

            <input type="hidden" name="counterforloopofOutstation" value="1"/>

            <div class="addroundclonehere">
            </div>
            <button  onclick="addCity(this)" style="margin-bottom: 25px;" type="button" class="nodisplay btn btn-info btn-outline-info addnewmulcityout btn-block"><i class="icofont icofont-plus"></i>Add New Location
            </button>
            </div>

            <div id="addmultiprhere">
            </div>

            <div class="form-group purposeClass" onclick="">
                <div class="addnewproposoutcity nodisplay btn btn-inverse btn-outline-inverse btn-block">
                    <i class="icofont icofont-plus"></i>Add New Purpose
                </div>
            </div>
            <div class="form-group notifications">
                <button class="btn btn-success btn-outline-success btn-block submit waves-effect"  type="submit" data-type="inverse" data-from="top" data-align="right" >Save and Submit</button>
                {{-- <button class="btn submit btn-success btn-block"  type="submit"><i class="icofont icofont-user-alt-3"></i>Save & Submit</button> --}}
                </div>
                </form>
            `;

        Formnum++;
        $(this).find(".purposeClass").attr("onclick","");
        var obj=$('#newFormforOutstation').append(multiPurposeforOutstation);
            // console.log(obj);

        var ob=$(multiPurposeforOutstation);

            if($('.subcitytypeForOutstation:checked').val()=='2')
            {
                obj.find('.addnewmulcityout').removeClass('nodisplay');
            }
            $('.daterangeForOutstation').daterangepicker();
        $(".officerSelect").select2();
        $(".yeselect").select2();

    }
    function addPurposeloc(f){
        var MultiPurposeOfLocal=`<form action="{{route('trip.store')}}" id= "formlocal_`+Formnum_local+`" name="formforlocal" method="POST"  class="col-md-12 form-control form-control-default">
            {{ csrf_field() }}
            <div id="clonethisproposal_1" class="w3-animate-top">
                <div class="col-md-12 inlinebox">
                    <div class="col-md-3 nopaddinglef">
                        <select id="visit_reasonForLocal" name="visit_reasonForLocal" class="form-control form-control-default reason">
                            <option selected="selected" disabled hidden>Select Here</option>
                            @foreach ($visitreasons as $visitreason)
                            <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id='gsrow' class="col-md-9 row nodisplay w3-animate-left nopadlefright">
                        <div class="col-md-2 nopadlefright">
                            <select class="form-control  select2" name="financial_yearForLocal" id="financial_yearForLocal" style="width:100% !important;margin-left:7%;">
                                <option value="" disabled selected>Pick Year</option>
                                    @for($i = 2 ; $i <= 30 ; $i++) @if($i==9) <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                                    @elseif($i > 9)
                                    <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                                    @else
                                    <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                                    @endif
                                    @endfor
                            </select>
                        </div>

                        <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                        <div class="col-md-2 nopadlefright">
                            <select name="gs_noForLocal" class="form-control form-control-default">
                                    <option value="" disabled selected>Gs #</option>
                                    @foreach ($projects as $pro)
                                <option value="{{$pro->id}}">{{$pro->Project->ADP}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 nopaddingright" style="width:41.5% !important; ">
                            <select name="project_nameForLocal" class="form-control  yeselect form-control-default">
                                <option value="" disabled selected>Project Name</option>
                                @foreach ($projects as $pro)
                            <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class='form-control col-md-9 nodisplay w3-animate-left' id='brief'>
                        <input type="text" name="local_description" placeholder="Enter Description Here...." />
                    </div>

                </div>
                <label for=""><b>Location</b></label>
                <div class="col-md-12 inlinebox nopaddingright">
                    <div class="col-md-12 nopadlefright" style="">
                        <select name="local_loc" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 inlinebox" style="margin-top:10px">
                    <div class="col-md-6" style="padding-left:0">
                        <label for=""><b>Date</b></label>
                            <input type="date" name="local_date" class="form-control border" placeholder="Select Date">
                    </div>
                    <div class="nopaddingright col-md-6" style="padding-left:0">
                        <label for=""><b>Time</b></label>
                        <select name="expectd_TimeForlocal" class="form-control" style="text-align: center !important" id="">
                            <option value="" hidden disabled>Expected Time of Departure</option>
                            @for ($i = 1; $i < 12; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' .' AM'}}">
                                {{$i . " : " . $j .'0'}} AM</option>
                                @else
                                <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                @endif
                                @endfor
                                @endfor
                                <option value="12 : 00 PM">12 : 00 PM</option>
                                <option value="12 : 30 PM">12 : 30 PM</option>
                                @for ($i = 1; $i <= 11; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' . ' PM' }}">
                                {{$i . " : " . $j .'0'}} PM</option>
                                @else
                                <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                @endif
                                @endfor
                                @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group" id='local_members'>
                    <label><b>Members</b></label>
                    <select id="members" name="local_members[]" class="form-control officerSelect" multiple="multiple"
                        data-placeholder="Select Members" style="width: 100%;">
                        @foreach ($officers as $officer)
                        <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group localpurpose" onclick="">
                <div class="nodisplay addnewproposal btn-block w3-animate-bottom btn btn-inverse btn-outline-inverse" disabled ><i
                        class="icofont icofont-plus"></i>Add purpose</div>
            </div>

            <div class="form-group notifications">
                <button class="btn btn-success btn-outline-success btn-block submitlocal waves-effect"  type="submit" data-type="inverse" data-from="top" data-align="right" >Save and Submit</button>
                {{-- <button class="btn submit btn-success btn-block"  type="submit"><i class="icofont icofont-user-alt-3"></i>Save & Submit</button> --}}
                </div>
    </form>`;
    Formnum_local++;
                  $(this).find(".localpurpose").attr("onclick","");
                    $('.local').append(MultiPurposeOfLocal);
                    // $(".daterange").datepicker();
                    $(".officerSelect").select2();
                    $(".yeselect").select2();
    }

    function addCity(e){
        var newCity =  `<div style="background:#b1edf54d; border-top:2px solid #17a2b8;">
                        <div class="dlt_btnout pointer">
                            ---
                        </div>
                <div class="col-md-12 inlinebox" style="margin-top:10px" >
                    <div class="col-md-6 nopaddinglef">
                            <label for=""><b>From Location</b></label>
                        <select name="outstation_Fromloc_`+city_counter+`" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 nopaddingright">
                            <label for=""><b>To Location</b></label>
                        <select name="outstation_Toloc_`+city_counter+`" class="form-control yeselect">
                            <option value="" selected disabled>Select Location</option>
                            @foreach ($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 inlinebox nopaddinglef" style="margin-top:10px">
                    <div class="col-md-12 nopaddinglef">
                        <label for=""><b>Date</b></label><br />
                        <div class="input-group date ">
                        <input type="text" class="form-control border daterangeForOutstation" name="daterange_`+city_counter+`" placeholder="Select Date">
                        <span class="input-group-addon ">
                        <i class="fa fa-calendar"></i>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 inlinebox" style="margin-top:10px">
                    <div class="nopaddingright col-md-12" style="padding-left:0">
                        <label for=""><b>Expected Time of Departure</b></label>
                        <select name="expectd_TimeForOutstation_`+city_counter+`" class="form-control" style="text-align: center !important" id="">
                            <option value="" Selected disabled>Choose Time</option>
                            @for ($i = 1; $i < 12; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' .' AM'}}">
                                {{$i . " : " . $j .'0'}} AM</option>
                                @else
                                <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                @endif
                                @endfor
                                @endfor
                                <option value="12 : 00 PM">12 : 00 PM</option>
                                <option value="12 : 30 PM">12 : 30 PM</option>
                                @for ($i = 1; $i <= 11; $i++) @for($j=0; $j <=45; $j+=30) @if($j==0) <option value="{{$i . ' : ' . $j.'0' . ' PM' }}">
                                {{$i . " : " . $j .'0'}} PM</option>
                                @else
                                <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                @endif
                                @endfor
                                @endfor
                            </select>
                    </div>
                </div>

                <div class="form-group" id='outstation_members'>
                    <label><b>Members</b></label>
                    <select id="outstation_members" name="outstation_members_`+city_counter+`[] " class="form-control officerSelect" multiple="multiple"
                        data-placeholder="Select Members" style="width: 100%;">
                        @foreach ($officers as $officer)
                        <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                        @endforeach
                    </select>
                </div>
            <input type="hidden" name="counterForCity" value="`+city_counter+`"/>
            </div>
           `;
           city_counter++;
            $(e).parent().find('.addroundclonehere').append(newCity);
            $(".officerSelect").select2();
            $('.daterangeForOutstation').daterangepicker();
            // $(".daterange").datepicker();
    }

     $(document).on('change','.reason',function(){
        //  console.log($(this).parent().parent().find('#gsrow'))
    if ($(this).val() == '3' || $(this).val() == '4'){
      $(this).parent().parent().find('#gsrow').hide()
      $(this).parent().parent().find('#brief').attr('style','display:flex !important').show('slow')
    }
    else if ($(this).val() == '1' || $(this).val() == '2'){
      $(this).parent().parent().find('#brief').hide()
      $(this).parent().parent().find('#gsrow').attr('style','display:contents !important').show('slow')
    }
  })

   $(document).on('change','.reasonroundtrip',function(){
         console.log($(this).val())
        if ($(this).val() == '3' || $(this).val() == '4'){
      $(this).parent().parent().find('#gsrowround').hide()
      $(this).parent().parent().find('#briefround').attr('style','display:flex !important').show('slow')
    }
    else if ($(this).val() == '1' || $(this).val() == '2'){
      $(this).parent().parent().find('#briefround').hide()
      $(this).parent().parent().find('#gsrowround').attr('style','display:contents !important').show('slow')
    }
  })
    $(function () {
          //Initialize Select2 Elements
          $('.yeselect').select2();
          $('.officerSelect').select2();
          $('.daterangeForOutstation').daterangepicker();
    });

    $(document).on("click", ".dlt_btn", function() {
      $(this).parent().remove()
        // $(this).closest(".box").remove();
    });
    $(document).on("click", ".dlt_btnout", function() {
      $(this).parent().remove();
        // $(this).closest(".box").remove();
    });
    // start append round
    $(document).on('click','.addnewroundproposal',function(){
        var clone = $('#roundtripp_1').clone().attr('id','roundtripp_'+ ++roundpurposal)
        if(roundpurposal % 2 == 0)
            clone.addClass('bg')
        // clone.children().find('#gsrow_'+(purpose_id-1)).attr('id','gsrow_'+purpose_id)
        // clone.children().find('#brief_'+(purpose_id-1)).attr('id','brief_'+purpose_id)
        clone.children().find('#roundtripp_'+(roundpurposal-1)).attr('id','roundtripp_'+roundpurposal)
        clone.appendTo('.addroundclonehere').show('slow');
        $('.date').datepicker();

    });
    // end append round
  $(document).ready(function(){

    $(".js-multiple").select2();

    $(".purposetype").click(function()
    {
        if($(this).val()=='1')
        {
            $(".addnewproposal").hide();
        }
        else if($(this).val()=='2')
        {
            $(".addnewproposal").show();
        }
    });
    $("#type").click(function(){
        if($(this).val()=='1')
        {
            $('.purposetypelocal').show();
        }
        else{
            $('.purposetypelocal').hide();
        }

    });
    $(".purposetypeForOutstation").click(function()
    {
        if($(this).val()=='1')
        {     $('.addnewproposoutcity').hide();

        }
        else if($(this).val()=='2')
        {
            $('.addnewproposoutcity').show();
            $(".dlt_btn").show();
        }
    });
    $(".subcitytypeForOutstation").click(function()
    {
        if($(this).val()=='1')
        {
             $('.addnewmulcityout').hide();

        }
        else if($(this).val()=='2')
        {
            $('.addnewmulcityout').show();
        }
    });

    $(".addnewproposoutcity").click(function(){
        $(".dlt_btnout").show();
        });
    });
    $(document).on('change','#type',function()
    {
    if ($('#type :selected').text() == "Local"){
      $('.outstation').hide()
      $('.local').show('slow')
    }
    else if($('#type :selected').text() == "Outstation"){
      $('.local').hide()
      $('.outstation').show('slow')
    }
    else{
      $('.local').hide()
      $('.outstation').hide()
    }
  });

    function disabledFields(objthis){
        city_counter=2;
        $(".purposeClass").attr("onclick","addPurpose(this)");
        $(".localpurpose").attr("onclick","addPurposeloc(this)");
        console.log($(objthis).find('select , input, .addnewmulcityout, .addnewproposal').attr('disabled',true));
    }

  $(document).on('submit','form',function(event){
      event.preventDefault();

      var triptype= $('.triptype_id').val();
      var outstationPur= $('.purposetypeForOutstation').val();
      var localpurpose=$('.purposetype').val();
      var subcity=$('.subcitytypeForOutstation').val();
      var formdata=$(this).serialize();
  $.ajax({
   headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   type: 'POST',
   url: $(this).attr('action'),
   data: formdata + "&purposetypeforLocal=" + localpurpose + "&triptype_id="+ triptype+"&purposetypeForOutstation=" + outstationPur +"&subcity="+ subcity,   // I WANT TO ADD EXTRA DATA + SERIALIZE DATA
   success: function(data){
      console.log(data);
    //   $('.tampil_vr').text(data);
    }
    // error: function()
    // {

    // }
    });
    disabledFields($(this));

});
</script>
@endsection
