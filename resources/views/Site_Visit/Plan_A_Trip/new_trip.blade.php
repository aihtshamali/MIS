@extends('_Monitoring.layouts.upperNavigationSiteVisit')
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
   
@endsection
<style>
        /* .select2-container--default .select2-selection--multiple .select2-selection__choice{
                background-color: #01a9ac !important;
                padding:1% !important;
            }
            .select2-container--default.select2-container--focus .select2-selection--multiple{
                border: solid #01a9ac 1px !important;
            }
            .select2-container--default .select2-selection--multiple{
                padding: 0px !important;
                border: 1px solid #1918180f;
            } */
            form{
                background:none !important;
                border: none !important;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice{
                background-color: #2dcee3 !important;
                padding: 3px!important;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                background-color: white !important;
                color: black !important ;
                padding: 1px !important;
                
            }
            .select2-container--default .select2-selection--single
            {
                overflow: hidden !important;
                text-overflow: ellipsis !important;
                display: -webkit-box !important;
                line-height: 16px !important;     /* fallback */
                /* max-height: 32px;      fallback */
                -webkit-line-clamp: 2 !important; /* number of lines to show */
                -webkit-box-orient: vertical !important;
            }
            .select2-container .select2-selection--single .select2-selection__rendered {
                display:inline !important;
            }
            .select2-container--default .select2-selection--multiple {
                background-color: white !important;
                border: 1px solid #2dcee3 !important;
                border-radius: 4px !important;
                cursor: text !important;
                padding:5px !important;
            }
            .w3-animate-left{position:relative;animation:animateleft 0.4s}@keyframes animateleft{from{left:-900px;opacity:0} to{left:0;opacity:1}}
            .divider{
                border: 1px solid lightgrey;
            }
            .daterangepicker td.in-range {
            background-color: #357ebd !important;
            }
            .select2-container .select2-selection--single .select2-selection__rendered{white-space: pre-wrap !important;}
            .select2-selection--single{height: auto !important;}
            .select2-container{width: 100% !important;}
        </style>
@section('content')
@include('inc.msgs')
<form action="{{route('trip.store')}}" id= "tripform" method="POST"  class="col-md-12 form-control">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <label for=""><h4><b>Schedule Your Visit</b></h4></label>
                </div>
                    <div class="card-block triptype">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label><b>Trip Type</b></label>
                                <select name="triptype_id" id="triptype_id" class="triptype_id form-control form-control-primary">
                                    <option value="" selected disabled>Select Trip Type</option>
                                    @foreach ($triptypes as $triptype)
                                    <option value="{{$triptype->id}}">{{$triptype->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>     
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card LocalBlock" id="LocalBlock" style ="display:none;" >
                <div class="card-header"></div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                                {{-- <div class="" style="margin-bottom: 12px;"></div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-2">
                            <label><b>Trip Type :</b></label>
                        </div>
                        <div class="col-md-2">
                        <p>Local</p>
                        </div>
                        <div class="col-md-2 ">
                            <label><b>Purpose :</b></label>
                        </div>
                        <div class="col-md-3">
                                <input type="hidden" class="purposetypeid" name="purposetypeid" value="{{$purposetypes[0]->id}}">
                                <p class="purposetype" > {{$purposetypes[0]->name}} </p>
                        </div>
                    </div>
                    <div class="">
                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Location</span></b></label>
                                <select name="local_location" class=" local_location form-control"  style="width: 100%;">
                                    <option value="{{$citylahore->id}}"  selected>{{$citylahore->name}}</option>
                                    </select>
                                {{-- <input type="text" value="{{$citylahore->name}}" class="local_location form-control" name="local_location" id="local_location" disabled/> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Date</span></b></label>
                                <input class="form-control" type="text" name="local_date" placeholder="Select your date" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Members</span></b></label> 
                                <select id="" name="local_members[]" class="local_members form-control officerSelect" multiple="multiple" data-placeholder="Select Members" style="width: 100%;">
                                @foreach ($officers as $officer)
                                @if(Auth::id()==$officer->id)
                                <option value="{{$officer->id}}" disabled>{{$officer->first_name}} {{$officer->last_name}}</option> 
                                @else
                                <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="localPurposeBlock" id="localPurposeBlock" name="localPurposeBlock">
                        </div> 
                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-2 offset-md-5" >
                                <label><b style="color:white;">+</b></label><br>
                                <button class="btn btn-sm btn-warning" type="button" style="margin:5px;" id="addlocalpurpose">Add Purpose <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card OutstationBlock" id="OutstationBlock" style="display:none;" >
                <div class="card-header"></div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                                {{-- <div class="" style="margin-bottom: 12px;"></div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-2">
                            <label><b>Trip Type :</b></label>
                        </div>
                        <div class="col-md-2">
                        <p>Outstation</p>
                        </div>
                        <div class="col-md-2 ">
                            <label><b>Purpose :</b></label>
                        </div>
                        <div class="col-md-3">
                                <input type="hidden" class="purposetypeidoutstation" name="purposetypeidoutstationid" value="{{$purposetypes[0]->id}}">
                                <p class="purposetypeoutstation" > {{$purposetypes[0]->name}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-2"> <label><b>Visit City Type</b></label></div>
                            <div class="col-md-3 form-radio">
                                <div class="radio radio-outline radio-inline">
                                    <label>
                                        <input type="radio" class="roundCityOut" name="citytype" id="roundCityOut" value="{{$subcitytypes[0]->id}}">
                                        <i class="helper"></i>{{$subcitytypes[0]->name}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 form-radio">
                                <div class="radio radio-outline radio-inline">
                                    <label>
                                        <input type="radio" class="mulCityOut" name="citytype" id="mulCityOut" value="{{$subcitytypes[1]->id}}">
                                        <i class="helper"></i>{{$subcitytypes[1]->name}}
                                    </label>
                                </div>
                            </div>
                    </div>

                    <div class="roundtrip" style="display:none;">
                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-4 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">From Location</span></b></label>
                                {{-- <input type="text" value="Lahore" class="outstation_roundtriplocationfrom form-control" name="outstation_roundtriplocationfrom" id="outstation_locationfrom" disabled/> --}}
                                <select name="outstation_roundtriplocationfrom"  class=" outstation_roundtriplocationfrom form-control"  style="height: 1.9rem !important; padding: 1px !important; width: 100%;">
                                        <option value="{{$citylahore->id}}"  selected>{{$citylahore->name}}</option>
                                        </select>
                            </div>
                            <div class="col-md-4 " style="background:#a6b5d01f; padding:5px;">
                            <label><b><span style="font-size:15px;">To Location</span></b></label><br>
                            <select name="outstation_roundtriplocationto" class=" outstation_roundtriplocationto officerSelect form-control" style="width: 100%;">
                                @foreach ($cities as $city)
                                <option value={{$city->id}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Date</span></b></label>
                                <input type="text" name="daterange" class="form-control daterangeForOutstation" data-placeholder="Select Date">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Members</span></b></label> 
                                <select id="" name="roundtrip_members[]" class="roundtrip_members form-control officerSelect" multiple="multiple"
                                data-placeholder="Select Members" style="width: 100%;">
                                @foreach ($officers as $officer)
                                @if(Auth::id()==$officer->id)
                                <option value="{{$officer->id}}" disabled>{{$officer->first_name}} {{$officer->last_name}}</option> 
                                @else
                                <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        
                        <div class="roundtripPurposeBlock"  style="margin-top:15px;"id="roundtripPurposeBlock">
                        </div> 
                        <div class="row" style="margin-top:10px;">
                                <div class="col-md-3 offset-md-5" >
                                    <label><b style="color:white;">+</b></label><br>
                                    <button class="btn btn-sm btn-warning" type="button" style="margin:5px;" id="addroundtrippurpose">Add Purpose <i class="fa fa-plus"></i></button>
                                </div>
                        </div>
                       
                    </div>

                    <div class="multicity" style="display:none;">
                        <div class="row" style="margin-top:15px;">
                                <div class="col-md-4 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                    <label><b><span style="font-size:15px;">From Location</span></b></label>
                                    <select name="outstation_multicitylocationfrom"  class=" outstation_multicitylocationfrom form-control"  id="outstation_multicitylocationfrom"   style="width: 100%;">
                                    <option value="{{$citylahore->id}}"  selected>{{$citylahore->name}}</option>
                                    </select>
                                </div>
                                <div class="col-md-4" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">To Location</span></b></label><br>
                                <select name="outstation_multicitylocationto[]" class=" outstation_multicitylocationto officerSelect form-control" multiple="multiple" style="width: 100%;">
                                    @foreach ($cities as $city)
                                    <option value={{$city->id}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                                </div>     
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Date</span></b></label>
                                <input type="text" name="outstation_multicitydate" class="outstation_multicitydate form-control daterangeForOutstation" data-placeholder="Select Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2" style="background:#a6b5d01f; padding:5px;">
                                <label><b><span style="font-size:15px;">Members</span></b></label> 
                                <select id="" name="multicity_members[]" class="multicity_members form-control officerSelect" multiple="multiple"
                                data-placeholder="Select Members" style="width: 100%;">
                                @foreach ($officers as $officer)
                                @if(Auth::id()==$officer->id)
                                <option value="{{$officer->id}}" disabled>{{$officer->first_name}} {{$officer->last_name}}</option> 
                                @else
                                <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="multicityPurposeBlock" id="multicityPurposeBlock">
                        </div> 
                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-3 offset-md-5" >
                                <label><b style="color:white;">+</b></label><br>
                                <button class="btn btn-sm btn-warning addmulticitypurpose" type="button" style="margin:5px;" id="addmulticitypurpose">Add Purpose <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                     
                      
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <div class="row  savebutton" style="display:none;">
        <div class="col-md-12">
            <div class="card">   
            <div class="card-footer">
                <div class="col-md-3 offset-md-5" >
                    <button class="btn btn-md btn-success" type="submit" style="margin:5px;" id="savLocalForm"><b>Save & Submit</b></button>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
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


 $(function () {
          //Initialize Select2 Elements
          $(".nt_select").select2();
        //   $(".js-multiple").select2();
          $('.officerSelect').select2();
          $('.daterangeForOutstation').daterangepicker();
          $('.daterangeForOutstation').val('');
    });

    $(function() {
    $('input[name="local_date"]').datepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});

 $(document).ready(function(){
    $("#triptype_id").on('change',function(){
        if($(this).val()=='1')
        {
           
            $('#OutstationBlock').hide(1000);
            $('#LocalBlock').show(1000);
            $('.savebutton').show(1000);
            
        }
        else if($(this).val()=='2'){
           
            $('#LocalBlock').hide(1000);
            $('#OutstationBlock').show(1000);
            $('.savebutton').show(1000);
        }

    });
   
 });
    
 var getDates = function(startDate, endDate) 
        {
            // console.log(startDate);
            // console.log(endDate);
            var dates = [],
            currentDate = startDate,
            addDays = function(days) 
            {
                var date = new Date(this.valueOf());
                date.setDate(date.getDate() + days);
                return date;
            };
        while (currentDate <= endDate) {
            dates.push(currentDate);
            currentDate = addDays.call(currentDate, 1);
        }
        return dates;
        };

 $(document).on('change','.visitreason',function(){
        //  console.log($(this).val())
        if ($(this).val() == '3' || $(this).val() == '4')
        {
            $(this).parent().parent().find("#projectnameForLocal").hide();
            $(this).parent().parent().find("#description").show('slow');
        }
        else if ($(this).val() == '1' || $(this).val() == '2')
        {
            $(this).parent().parent().find("#description").hide();
            $(this).parent().parent().find("#projectnameForLocal").show('slow');
         }
  });


   $(document).on('change','#RoundtripVisitReason',function(){
        //  console.log($(this).val())
        if ($(this).val() == '3' || $(this).val() == '4')
        {
            $(this).parent().parent().find("#projectnameForRoundtrip").hide();
            $(this).parent().parent().find("#Roundtripdescription").show('slow');
        }
        else if ($(this).val() == '1' || $(this).val() == '2')
        {
            $(this).parent().parent().find("#Roundtripdescription").hide();
            $(this).parent().parent().find("#projectnameForRoundtrip").show('slow');
         }
  });

  $(document).on('change','#multicityVisitReason',function(){
        //  console.log($(this).val())
        if ($(this).val() == '3' || $(this).val() == '4')
        {
            $(this).parent().parent().find("#projectnameFormulticity").hide();
            $(this).parent().parent().find("#multicity_description").show('slow');
        }
        else if ($(this).val() == '1' || $(this).val() == '2')
        {
            $(this).parent().parent().find("#multicity_description").hide();
            $(this).parent().parent().find("#projectnameFormulticity").show('slow');
         }
  });
  var roundpurposecounter=0;
  $('button#addroundtrippurpose').click(function(e){

        var outstationRpurposemembers ='';

        var selectedMembers = $('.roundtrip_members :selected');
        // console.log(selectedMembers);
        selectedMembers.each(function () {
        var $this = $(this);
        if ($this.length) {
            var selectedText = $this.text();
            var selectedValue = $this.val();
            outstationRpurposemembers +='<option value="'+selectedValue+'" >'+selectedText+'</option>';
        }});
       // Appending Selected Dates 
       var selecteddate='';   
            var startDate = $('input[name="daterange"]').data('daterangepicker').startDate._d;
            var endDate = $('input[name="daterange"]').data('daterangepicker').endDate._d;
            // console.log(startDate);
            
            var dates = getDates(startDate, endDate);          

            // console.log(dates);
            
            dates.forEach(function(date)
            {
                var m = moment(date).format("MM-DD-YYYY")
            selecteddate+='<option selected="selected">'+m+'</option>';
            // console.log(selecteddate);
            });

      var addRoundTripPurpose=` <div>
                                    <div class="row" style="margin-top:15px;">  
                                        <div class="col-md-3 offset-md-2">
                                            <label><b>Select Visit Purpose</b></label>
                                            <select id="RoundtripVisitReason" name="RoundtripVisitReason[]" class="form-control form-control-info visitreason">
                                                <option selected="selected" hidden>Select Here</option>
                                                @foreach ($visitreasons as $visitreason)
                                                <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="projectnameForRoundtrip" style="display:none;">
                                            <label for=""><b>Project Name</b></label>
                                            <select name="projectnameForRoundtrip[]"  class="form-control officerSelect clearfix" style="width:100% !important;">
                                                <option value="" hidden>Choose Your Project</option>
                                                @foreach ($projects as $pro)
                                                <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class='col-md-6 ' id='Roundtripdescription' style="display: none;">
                                            <label><b>Description</b></label>
                                            <input type="text" name="Roundtrip_description[]" class="form-control form-control-info" placeholder="Enter Description Here...." />
                                        </div>
                                    </div>
                                    <div class="row"  style="margin-top:15px;">
                                        <div class="col-md-3 offset-md-2">
                                            <label><b>Start Date</b></label>
                                            <select id="selectedSDateroundtrip" name="selectedSDateroundtrip[]" class="form-control form-control-info selectedSDateroundtrip">
                                            `+selecteddate+`
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label><b>End Date</b></label>
                                            <select id="selectedEDateroundtrip" name="selectedEDateroundtrip[]" class="form-control form-control-info selectedEDateroundtrip">
                                            `+selecteddate+`
                                            </select>
                                        </div>  
                                        <div class="col-md-3">
                                            <label for=""><b>Departure Time</b></label>
                                            <select name="departureTimeforRoundtrip[]" class="form-control form-control-info" id="departureTimeforRoundtrip">
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
                                    <div class="row"  style="margin-top:15px;">                                      
                                        <div class="col-md-5 offset-md-2">
                                            <label><b>Members</b></label>
                                            <select id="members" name="roundtrip_members_`+roundpurposecounter+`[]" class="form-control officerSelect" multiple="multiple"
                                                data-placeholder="Select Members" style="width: 100%;">
                                               `+outstationRpurposemembers+`
                                            </select>
                                        </div>  
                                        <div class="col-md-1">
                                                <label><span style="color:white;">delete</span></label>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="removeRTPurpose(this)" id="removeroundtripPurpose" name="removeRoundtripPurpose[]"><span style="font-size: ">-</span></button>
                                        </div> 
                                    </div> 
                                    <input type="hidden" value="`+(roundpurposecounter+1)+`" name="purposecount"  
                                </div>`;
                    roundpurposecounter++;
                    
                    $('.roundtripPurposeBlock').append(addRoundTripPurpose);
                     $('.officerSelect').select2();

  });
  var multicitypurposecounter=0;
  $('button#addmulticitypurpose').click(function(e)
    {
        var outstationMpurposemembers ='';

        var selectedMembers = $('.multicity_members :selected');
        // console.log(selectedMembers);
        selectedMembers.each(function () {
        var $this = $(this);
        if ($this.length) {
            var selectedText = $this.text();
            var selectedValue = $this.val();
            outstationMpurposemembers +='<option value="'+selectedValue+'" >'+selectedText+'</option>';
        }});
        //   Appending Selected Cities
        var multicitypurposelocations ='';

        var selectedCities = $('.outstation_multicitylocationto :selected');
        selectedCities.each(function () {
        var $this = $(this);
        if ($this.length) {
            var selectedText = $this.text();
            var selectedValue = $this.val();
            multicitypurposelocations+='<option value="'+selectedValue+'" >'+selectedText+'</option>';
        }});

        // Appending Selected Dates 
        var selecteddate='';   
        var startDate = $('input[name="outstation_multicitydate"]').data('daterangepicker').startDate._d;
        var endDate = $('input[name="outstation_multicitydate"]').data('daterangepicker').endDate._d;
        // console.log(startDate);
        
        var dates = getDates(startDate, endDate);          

        // console.log(dates);
        
        dates.forEach(function(date)
        {
            var m = moment(date).format("MM-DD-YYYY")
        selecteddate+='<option selected="selected">'+m+'</option>';
        // console.log(selecteddate);
        });

        // Appending Purpose String
            var addmulticityPurpose = `<div>
                                        <div class="row" style="margin-top:15px;">
                                            <div class="col-md-3 offset-md-2">
                                                <label><b>Select Visit Purpose</b><span style="color:red; font-size:12px; font-weight:bold;">*</span></label>
                                                <select id="multicityVisitReason" name="multicityVisitReason[]" class="form-control form-control-info multicityVisitReason" required>
                                                    <option disable selected>Select Here</option>
                                                    @foreach ($visitreasons as $visitreason)
                                                    <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6" id="projectnameFormulticity" style="display:none;">
                                                <label for=""><b>Project Name</b></label>
                                                <select name="projectnameFormulticity[]"  class="form-control officerSelect clearfix" style="width:100% !important;">
                                                    <option value="" hidden >Choose Your Project</option>
                                                    @foreach ($projects as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class='col-md-6 ' id='multicity_description' style="display: none;">
                                                <label><b>Description</b></label>
                                                <input type="text" name="multicity_description[]" class="form-control form-control-info" placeholder="Enter Description Here...." />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:15px;">
                                            <div class="col-md-3 offset-md-2">
                                                <label><b>Start Date</b></label>
                                                <select id="selectedSDate" name="selectedSDatemulticity[]" class="form-control form-control-danger selectedSDate">
                                                `+selecteddate+`
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label><b>End Date</b></label>
                                                <select id="selectedEDate" name="selectedEDatemulticity[]" class="form-control form-control-danger selectedSDate">
                                                `+selecteddate+`
                                                </select>
                                            </div> 
                                            <div class="col-md-3">
                                                <label for=""><b>Departure Time</b></label>
                                                <select name="departureTimeformulticity[]" class="form-control" id="departureTimeformulticity">
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
                                        <div class="row" style="margin-top:15px;">
                                            <div class="col-md-3 offset-md-2">
                                                <label><b>Members</b></label>
                                                <select id="members" name="multicity_members_`+multicitypurposecounter+`[]" class="form-control officerSelect" multiple="multiple"
                                                    data-placeholder="Select Members" style="width: 100%;">
                                                    `+outstationMpurposemembers+`
                                                </select>
                                            </div>   
                                           
                                            <div class="col-md-3">
                                                <label><b>Location</b></label>
                                                <select id="" name="multicity_location[]" class="form-control  multicity_location " 
                                                    data-placeholder="Select Members" style="width: 100%;">
                                                `+multicitypurposelocations+`
                                                </select>
                                            </div>   
                                            <div class="col-md-1">
                                                <label><span style="color:white;">delete</span></label>
                                                <button type="button" class="btn btn-sm btn-danger"  id="removemulticityPurpose" name="removemulticityPurpose[]" onclick="rmulticityPurpose(this)"><span style="font-size: ">-</span></button>
                                            </div> 
                                            <input type="hidden" value="`+(multicitypurposecounter+1)+`" name="purposecount"  
                                        </div>
                                    </div>`;
                multicitypurposecounter++;
            
            $('.multicityPurposeBlock').append(addmulticityPurpose);
            $('.officerSelect').select2();
    });

  var localcounter=0;

  $('button#addlocalpurpose').click(function(e){

        var localpurposemembers ='';

        var selectedMembers = $('.local_members :selected');
        console.log(selectedMembers);
        selectedMembers.each(function () {
        var $this = $(this);
        if ($this.length) {
            var selectedText = $this.text();
            var selectedValue = $this.val();
            localpurposemembers+='<option value="'+selectedValue+'" >'+selectedText+'</option>';
        }});

    var addLocalPurpose =` <div>
                       <div class="row" style="margin-top:15px;">
                        <div class="col-md-2 offset-md-2">
                            <label><b>Visit Purpose</b></label>
                            <select id="LocalVisitReason" name="LocalVisitReason[]" class="form-control form-control-info visitreason">
                                <option selected="selected" hidden>Choose Your Purpose</option>
                                @foreach ($visitreasons as $visitreason)
                                <option value="{{$visitreason->id}}">{{$visitreason->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6" id="projectnameForLocal" style="display:none;">
                            <label for=""><b>Project Name</b></label>
                            <select name="projectnameForLocal[]"  class="form-control officerSelect clearfix" style="width:100% !important;">
                                <option value="" hidden>Choose Your Project</option>
                                
                                @foreach ($projects as $pro)
                                <option value="{{$pro->id}}">{{$pro->Project->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='col-md-6 ' id='description' style="display: none;">
                            <label><b>Description</b></label>
                            <input type="text" name="local_description[]" class="form-control form-control-info" placeholder="Enter Description Here...." />
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-2 offset-md-2">
                            <label for=""><b>Departure Time</b></label>
                            <select name="departureTimeforlocal[]" class="form-control form-control-info" id="departureTimeforlocal">
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
                        <div class="col-md-2">
                            <label><b>Members</b></label>
                            <select id="members" name="local_members_`+localcounter+`[]" class="form-control officerSelect" multiple="multiple"
                                data-placeholder="Select Members" style="width: 100%;">
                            `+localpurposemembers+`
                            </select>
                        </div>
                        <div class="col-md-1">
                                <label><span style="color:white;">delete</span></label>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removePurpose(this)" id="removeLocalPurpose" name="removeLocalPurpose[]"><span style="font-size: ">-</span></button>
                        </div>
                        <input type="hidden" value="`+(localcounter+1)+`" name="purposecount"   
                     </div>
                    </div>`;

                localcounter++;
                $('.localPurposeBlock').append(addLocalPurpose);
                $('.officerSelect').select2();
    });
function removePurpose(e)
{   
    localcounter--;
    if(localcounter==1)
        {
            $('.purposetypeid').val("{{$purposetypes[0]->id}}");
            $('.purposetype').text("{{$purposetypes[0]->name}}");
        }
    $(e).parent().parent().parent().remove();
}
function removeRTPurpose(e)
{   
    roundpurposecounter--;
    if(roundpurposecounter==1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[0]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[0]->name}}");
        }
    $(e).parent().parent().parent().remove();
}

function rmulticityPurpose(e)
{ 
    multicitypurposecounter--;
    if(multicitypurposecounter==1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[0]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[0]->name}}");
        }
    $(e).parent().parent().parent().remove();
}

$('#addlocalpurpose').click(function(){
    if(localcounter==1)
        {
        $('.purposetypeid').val("{{$purposetypes[0]->id}}");
        $('.purposetype').text("{{$purposetypes[0]->name}}");
        }
    else if(localcounter>1)
    {
        $('.purposetypeid').val("{{$purposetypes[1]->id}}");
        $('.purposetype').text("{{$purposetypes[1]->name}}");
    }
   
});

$('#addroundtrippurpose').click(function(){
    if(roundpurposecounter==1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[0]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[0]->name}}");
        }
        else if(roundpurposecounter>1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[1]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[1]->name}}");
        }
   
   
});

$('#addmulticitypurpose').click(function(){
    if(multicitypurposecounter==1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[0]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[0]->name}}");
        }
        else if(multicitypurposecounter>1)
        {
            $('.purposetypeidoutstation').val("{{$purposetypes[1]->id}}");
            $('.purposetypeoutstation').text("{{$purposetypes[1]->name}}");
        }
});
    
    // $(".roundCityOut").click(function(){
    //     $(".mulCityOut").css({"background-color": "#404E67"});
    // });

    // $(".mulCityOut").click(function(){
    //     $(".roundCityOut").css({"background-color": "#404E67"});
    // });

    $(".roundCityOut").click(function()
        {
            $(".multicity").hide(1000);
            $(".roundtrip").show(1000);
        });

    $(".mulCityOut").click(function()
        {
            $(".roundtrip").hide(1000);
            $(".multicity").show(1000);
        });
</script>
@endsection
