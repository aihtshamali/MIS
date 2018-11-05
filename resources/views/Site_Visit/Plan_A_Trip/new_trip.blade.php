@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | New Trip
@endsection
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
    .select2-container--default .select2-selection--single{border: 1px solid transparent !important;}
    .select2-container{padding: 0.5% !important;}
    .select2-container--default .select2-selection--multiple .select2-selection__rendered{padding: 1% !important;}
    .col-md-12{border-radius: 5px !important;}
    .select2-container{border: 1px solid #77777714 !important; border-radius: 5px;}
    .select2-container--default .select2-selection--multiple{border: none !important;}
</style>
@endsection
@section('content')
    <form action="" class="offset-md-2 col-md-8 form-control form-control-default">
            <select name="select" id="type" class="form-control form-control-default">
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
                    <div id="clonethisproposal_1" class="w3-animate-top">
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-2 nopaddinglef">
                                <select id="reason_1" name="select" class="form-control form-control-default reason nopaddingright">
                                    <option selected="selected" hidden>Select Reason For Visit</option>
                                    <option value="Monitoring">Monitoring</option>
                                    <option value="Evaluation">Evaluation</option>
                                    <option value="Meeting">Meeting</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            {{-- <div class='form-control nodisplay col-md-8 row' id='brief'>
                                <input style="width:100%" placeholder="Enter a brief description for visit" type="text" />
                            </div> --}}

                            <div id='gsrow' class="col-md-10 row nodisplay w3-animate-left nopaddingright">
                                <div class="col-md-2 nopadlefright">
                                    {{-- <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>Year</option>
                                    </select> --}}
                                    <select class="form-control  select2" name="financial_year" id="financial_year" style="width:100% !important;margin-left:7%;">
                                        <option value="0" hidden>Select Year </option>
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
                                <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                                <div class="col-md-2 nopadlefright">
                                    <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>GS#</option>
                                    </select>
                                </div>
                                <div class="col-md-7 nopaddingright" style="width:41.5% !important;">
                                    <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>project</option>
                                        <option value="opt1" selected>project</option>
                                    </select>
                                </div>
                            </div>

                            <div class='form-control nodisplay w3-animate-left' id='brief' >
                                <input type="text" placeholder="Enter Description Here...."/>
                            </div>

                        </div>
                        <label for="">Location</label>
                        <div class="col-md-12 inlinebox border nopaddingright">
                            <div class="col-md-12 nopadlefright" style="">
                                <select name="select" class="form-control yeselect">
                                    <option value="opt1" selected hidden>Location</option>
                                      <option value="Ahmadpur East">Ahmadpur East</option>
                                      <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                      <option value=">Ali Khan Abad">Ali Khan Abad</option>
                                      <option value="Alipur">Alipur</option>
                                      <option value="Arifwala">Arifwala</option>
                                      <option value="Attock">Attock</option>
                                      <option value="Bhera">Bhera</option>
                                      <option value="Bhalwal">Bhalwal</option>
                                      <option value="Bahawalnagar">Bahawalnagar</option>
                                      <option value="Bahawalpur">Bahawalpur</option>
                                      <option value="Bhakkar">Bhakkar</option>
                                      <option value="Burewala">Burewala</option>
                                      <option value="Chillianwala">Chillianwala</option>
                                      <option value="Chakwal">Chakwal</option>
                                      <option value="Chichawatni">Chichawatni</option>
                                      <option value="Chiniot">Chiniot</option>
                                      <option value="Chishtian">Chishtian</option>
                                      <option value="Daska">Daska</option>
                                      <option value="Darya Khan">Darya Khan</option>
                                      <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                      <option value="Dhaular">Dhaular</option>
                                      <option value="Dina">Dina</option>
                                      <option value="Dinga">Dinga</option>
                                      <option value="Dipalpur">Dipalpur</option>
                                      <option value="Faisalabad">Faisalabad</option>
                                      <option value="Fateh Jang">Fateh Jang</option>
                                      <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                      <option value="Gojra">Gojra</option>
                                      <option value="Gujranwala">Gujranwala</option>
                                      <option value="Gujrat">Gujrat</option>
                                      <option value="Gujar Khan">Gujar Khan</option>
                                      <option value="Hafizabad">Hafizabad</option>
                                      <option value="Haroonabad">Haroonabad</option>
                                      <option value="Hasilpur">Hasilpur</option>
                                      <option value="Haveli Lakha">Haveli Lakha</option>
                                      <option value="Jalalpur Jattan">Jalalpur Jattan</option>
                                      <option value="Jampur">Jampur</option>
                                      <option value="Jaranwala">Jaranwala</option>
                                      <option value="Jhang">Jhang</option>
                                      <option value="Jhelum">Jhelum</option>
                                      <option value="Kalabagh">Kalabagh</option>
                                      <option value="Karor Lal Esan">Karor Lal Esan</option>
                                      <option value="Kasur">Kasur</option>
                                      <option value="Kamalia">Kamalia</option>
                                      <option value="KÄmoke">KÄmoke</option>
                                      <option value="Khanewal">Khanewal</option>
                                      <option value="Khanpur">Khanpur</option>
                                      <option value="Kharian">Kharian</option>
                                      <option value="Khushab">Khushab</option>
                                      <option value="Kot Adu">Kot Adu</option>
                                      <option value="Jauharabad">Jauharabad</option>
                                      <option value="Lahore" selected='selected'>Lahore</option>
                                      <option value="Lalamusa">Lalamusa</option>
                                      <option value="Layyah">Layyah</option>
                                      <option value="Liaquat Pur">Liaquat Pur</option>
                                      <option value="Lodhran">Lodhran</option>
                                      <option value="Malakwal">Malakwal</option>
                                      <option value="Mamoori">Mamoori</option>
                                      <option value="Mailsi">Mailsi</option>
                                      <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                      <option value="Mian Channu">Mian Channu</option>
                                      <option value="Mianwali">Mianwali</option>
                                      <option value="Multan">Multan</option>
                                      <option value="Murree">Murree</option>
                                      <option value="Muridke">Muridke</option>
                                      <option value="Mianwali Bangla">Mianwali Bangla</option>
                                      <option value="Muzaffargarh">Muzaffargarh</option>
                                      <option value="Narowal">Narowal</option>
                                      <option value="Okara">Okara</option>
                                      <option value="Renala K">Renala K</option>
                                      <option value="Pakpatta">Pakpatta</option>
                                      <option value="Pattoki">Pattoki</option>
                                      <option value="Pir Mahal">Pir Mahal</option>
                                      <option value="Qaimpur">Qaimpur</option>
                                      <option value="Qila Didar Singh">Qila Didar Singh</option>
                                      <option value="Rabwah">Rabwah</option>
                                      <option value="Raiwind">Raiwind</option>
                                      <option value="Rajanpur">Rajanpur</option>
                                      <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                      <option value="Rawalpindi">Rawalpindi</option>
                                      <option value="Sadiqabad">Sadiqabad</option>
                                      <option value="Safdarabad">Safdarabad</option>
                                      <option value="Sahiwal">Sahiwal</option>
                                      <option value="Sangla Hill">Sangla Hill</option>
                                      <option value="Sarai Alamgir">Sarai Alamgir</option>
                                      <option value="Sargodha">Sargodha</option>
                                      <option value="Shakargarh">Shakargarh</option>
                                      <option value="Sheikhupura">Sheikhupura</option>
                                      <option value="Sialkot">Sialkot</option>
                                      <option value="Sohawa">Sohawa</option>
                                      <option value="Soianwala">Soianwala</option>
                                      <option value="Siranwali">Siranwali</option>
                                      <option value="Talagang">Talagang</option>
                                      <option value="Taxila">Taxila</option>
                                      <option value="Toba Tek Singh">Toba Tek Singh</option>
                                      <option value="Vehari">Vehari</option>
                                      <option value="Wah Cantonment">Wah Cantonment</option>
                                      <option value="Wazirabad">Wazirabad</option>
                                </select>
                            </div>
                            {{-- <div class="col-md-6" style="padding-left:0">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected hidden>To</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="col-md-12 inlinebox" style="margin-top:10px">
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
                                    <input type="text" class="form-control border" placeholder="Select Date">
                                    <span class="input-group-addon ">
                                    <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="nopaddingright col-md-6" style="padding-left:0">
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
                        <div class="nodisplay addnewproposal btn btn-primary btn-outline-primary btn-block w3-animate-bottom"><i class="icofont icofont-plus"></i>Add purpose</div>
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
                                <input type="radio" class="multipurposeout" name="radioout">
                                <i class="helper"></i>Multi purpose
                            </label>
                        </div>
                    </div>
                </div>
                <div class="sinpuroundposeout">
                  <div class="col-md-12">
                      <div class="form-radio">
                          <div class="radio radio-outline radio-inline">
                              <label>
                                  <input type="radio" class="sinpurroundcityout" name="radiocityout" checked="checked">
                                  <i class="helper"></i>round trip
                              </label>
                          </div>
                          <div class="radio radio-outline radio-inline">
                              <label>
                                  <input type="radio" class="sinpurmulticityout" name="radiocityout">
                              <i class="helper"></i>Multi city
                            </label>
                          </div>
                      </div>
                  </div>
                  {{-- start roundtrip --}}
                  <div id="roundtripp_1">
                    <div class="col-md-12 inlinebox">
                      <div class="col-md-2 nopadlefright">
                          <select id="reasonroundtrip" name="select" class="form-control reasonroundtrip form-control-default">
                              <option selected="selected" hidden>Select Reason For Visit</option>
                              <option value="Monitoring">Monitoring</option>
                              <option value="Evaluation">Evaluation</option>
                              <option value="Meeting">Meeting</option>
                              <option value="Other">Other</option>
                          </select>
                      </div>

                      <div id='gsrowround' class="nodisplay col-md-10 row w3-animate-left nopaddingright">
                          <div class="col-md-2 no nopaddingright">
                              <select name="select" class="form-control form-control-default">
                                  <option value="opt1" selected>Year</option>
                              </select>
                          </div>
                          <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
                          <div class="col-md-2">
                              <select name="select" class="form-control form-control-default">
                                  <option value="opt1" selected>GS#</option>
                              </select>
                          </div>
                          <div class="col-md-7 nopaddingright" style="width:41.5% !important;">
                              <select name="select" class="form-control form-control-default">
                                  <option value="opt1" selected>project</option>
                                  <option value="opt1" selected>project</option>
                              </select>
                          </div>
                      </div>

                      <div class='form-control col-md-10 nodisplay w3-animate-left' id='briefround' >
                          <input type="text" placeholder="Enter Description Here..."/>
                      </div>
                </div>
                <div id='multicitycloneadd'>


                <label for="">Location</label>
                <div class="col-md-12 inlinebox">
                    <div class="col-md-6 nopaddinglef">
                        <select name="select" class="form-control form-control-default yeselect">
                                <option value="opt1" selected hidden>From</option>
                                <option value="Ahmadpur East">Ahmadpur East</option>
                                <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                <option value=">Ali Khan Abad">Ali Khan Abad</option>
                                <option value="Alipur">Alipur</option>
                                <option value="Arifwala">Arifwala</option>
                                <option value="Attock">Attock</option>
                                <option value="Bhera">Bhera</option>
                                <option value="Bhalwal">Bhalwal</option>
                                <option value="Bahawalnagar">Bahawalnagar</option>
                                <option value="Bahawalpur">Bahawalpur</option>
                                <option value="Bhakkar">Bhakkar</option>
                                <option value="Burewala">Burewala</option>
                                <option value="Chillianwala">Chillianwala</option>
                                <option value="Chakwal">Chakwal</option>
                                <option value="Chichawatni">Chichawatni</option>
                                <option value="Chiniot">Chiniot</option>
                                <option value="Chishtian">Chishtian</option>
                                <option value="Daska">Daska</option>
                                <option value="Darya Khan">Darya Khan</option>
                                <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                <option value="Dhaular">Dhaular</option>
                                <option value="Dina">Dina</option>
                                <option value="Dinga">Dinga</option>
                                <option value="Dipalpur">Dipalpur</option>
                                <option value="Faisalabad">Faisalabad</option>
                                <option value="Fateh Jang">Fateh Jang</option>
                                <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                <option value="Gojra">Gojra</option>
                                <option value="Gujranwala">Gujranwala</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Gujar Khan">Gujar Khan</option>
                                <option value="Hafizabad">Hafizabad</option>
                                <option value="Haroonabad">Haroonabad</option>
                                <option value="Hasilpur">Hasilpur</option>
                                <option value="Haveli Lakha">Haveli Lakha</option>
                                <option value="Jalalpur Jattan">Jalalpur Jattan</option>
                                <option value="Jampur">Jampur</option>
                                <option value="Jaranwala">Jaranwala</option>
                                <option value="Jhang">Jhang</option>
                                <option value="Jhelum">Jhelum</option>
                                <option value="Kalabagh">Kalabagh</option>
                                <option value="Karor Lal Esan">Karor Lal Esan</option>
                                <option value="Kasur">Kasur</option>
                                <option value="Kamalia">Kamalia</option>
                                <option value="KÄmoke">KÄmoke</option>
                                <option value="Khanewal">Khanewal</option>
                                <option value="Khanpur">Khanpur</option>
                                <option value="Kharian">Kharian</option>
                                <option value="Khushab">Khushab</option>
                                <option value="Kot Adu">Kot Adu</option>
                                <option value="Jauharabad">Jauharabad</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Lalamusa">Lalamusa</option>
                                <option value="Layyah">Layyah</option>
                                <option value="Liaquat Pur">Liaquat Pur</option>
                                <option value="Lodhran">Lodhran</option>
                                <option value="Malakwal">Malakwal</option>
                                <option value="Mamoori">Mamoori</option>
                                <option value="Mailsi">Mailsi</option>
                                <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                <option value="Mian Channu">Mian Channu</option>
                                <option value="Mianwali">Mianwali</option>
                                <option value="Multan">Multan</option>
                                <option value="Murree">Murree</option>
                                <option value="Muridke">Muridke</option>
                                <option value="Mianwali Bangla">Mianwali Bangla</option>
                                <option value="Muzaffargarh">Muzaffargarh</option>
                                <option value="Narowal">Narowal</option>
                                <option value="Okara">Okara</option>
                                <option value="Renala K">Renala K</option>
                                <option value="Pakpatta">Pakpatta</option>
                                <option value="Pattoki">Pattoki</option>
                                <option value="Pir Mahal">Pir Mahal</option>
                                <option value="Qaimpur">Qaimpur</option>
                                <option value="Qila Didar Singh">Qila Didar Singh</option>
                                <option value="Rabwah">Rabwah</option>
                                <option value="Raiwind">Raiwind</option>
                                <option value="Rajanpur">Rajanpur</option>
                                <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                <option value="Rawalpindi">Rawalpindi</option>
                                <option value="Sadiqabad">Sadiqabad</option>
                                <option value="Safdarabad">Safdarabad</option>
                                <option value="Sahiwal">Sahiwal</option>
                                <option value="Sangla Hill">Sangla Hill</option>
                                <option value="Sarai Alamgir">Sarai Alamgir</option>
                                <option value="Sargodha">Sargodha</option>
                                <option value="Shakargarh">Shakargarh</option>
                                <option value="Sheikhupura">Sheikhupura</option>
                                <option value="Sialkot">Sialkot</option>
                                <option value="Sohawa">Sohawa</option>
                                <option value="Soianwala">Soianwala</option>
                                <option value="Siranwali">Siranwali</option>
                                <option value="Talagang">Talagang</option>
                                <option value="Taxila">Taxila</option>
                                <option value="Toba Tek Singh">Toba Tek Singh</option>
                                <option value="Vehari">Vehari</option>
                                <option value="Wah Cantonment">Wah Cantonment</option>
                                <option value="Wazirabad">Wazirabad</option>
                        </select>
                    </div>
                    <div class="col-md-6 nopaddingright">
                        <select name="select" class="form-control form-control-default yeselect">
                                <option value="opt1" selected hidden>To</option>
                                <option value="Ahmadpur East">Ahmadpur East</option>
                                <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                <option value=">Ali Khan Abad">Ali Khan Abad</option>
                                <option value="Alipur">Alipur</option>
                                <option value="Arifwala">Arifwala</option>
                                <option value="Attock">Attock</option>
                                <option value="Bhera">Bhera</option>
                                <option value="Bhalwal">Bhalwal</option>
                                <option value="Bahawalnagar">Bahawalnagar</option>
                                <option value="Bahawalpur">Bahawalpur</option>
                                <option value="Bhakkar">Bhakkar</option>
                                <option value="Burewala">Burewala</option>
                                <option value="Chillianwala">Chillianwala</option>
                                <option value="Chakwal">Chakwal</option>
                                <option value="Chichawatni">Chichawatni</option>
                                <option value="Chiniot">Chiniot</option>
                                <option value="Chishtian">Chishtian</option>
                                <option value="Daska">Daska</option>
                                <option value="Darya Khan">Darya Khan</option>
                                <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                <option value="Dhaular">Dhaular</option>
                                <option value="Dina">Dina</option>
                                <option value="Dinga">Dinga</option>
                                <option value="Dipalpur">Dipalpur</option>
                                <option value="Faisalabad">Faisalabad</option>
                                <option value="Fateh Jang">Fateh Jang</option>
                                <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                <option value="Gojra">Gojra</option>
                                <option value="Gujranwala">Gujranwala</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Gujar Khan">Gujar Khan</option>
                                <option value="Hafizabad">Hafizabad</option>
                                <option value="Haroonabad">Haroonabad</option>
                                <option value="Hasilpur">Hasilpur</option>
                                <option value="Haveli Lakha">Haveli Lakha</option>
                                <option value="Jalalpur Jattan">Jalalpur Jattan</option>
                                <option value="Jampur">Jampur</option>
                                <option value="Jaranwala">Jaranwala</option>
                                <option value="Jhang">Jhang</option>
                                <option value="Jhelum">Jhelum</option>
                                <option value="Kalabagh">Kalabagh</option>
                                <option value="Karor Lal Esan">Karor Lal Esan</option>
                                <option value="Kasur">Kasur</option>
                                <option value="Kamalia">Kamalia</option>
                                <option value="KÄmoke">KÄmoke</option>
                                <option value="Khanewal">Khanewal</option>
                                <option value="Khanpur">Khanpur</option>
                                <option value="Kharian">Kharian</option>
                                <option value="Khushab">Khushab</option>
                                <option value="Kot Adu">Kot Adu</option>
                                <option value="Jauharabad">Jauharabad</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Lalamusa">Lalamusa</option>
                                <option value="Layyah">Layyah</option>
                                <option value="Liaquat Pur">Liaquat Pur</option>
                                <option value="Lodhran">Lodhran</option>
                                <option value="Malakwal">Malakwal</option>
                                <option value="Mamoori">Mamoori</option>
                                <option value="Mailsi">Mailsi</option>
                                <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                <option value="Mian Channu">Mian Channu</option>
                                <option value="Mianwali">Mianwali</option>
                                <option value="Multan">Multan</option>
                                <option value="Murree">Murree</option>
                                <option value="Muridke">Muridke</option>
                                <option value="Mianwali Bangla">Mianwali Bangla</option>
                                <option value="Muzaffargarh">Muzaffargarh</option>
                                <option value="Narowal">Narowal</option>
                                <option value="Okara">Okara</option>
                                <option value="Renala K">Renala K</option>
                                <option value="Pakpatta">Pakpatta</option>
                                <option value="Pattoki">Pattoki</option>
                                <option value="Pir Mahal">Pir Mahal</option>
                                <option value="Qaimpur">Qaimpur</option>
                                <option value="Qila Didar Singh">Qila Didar Singh</option>
                                <option value="Rabwah">Rabwah</option>
                                <option value="Raiwind">Raiwind</option>
                                <option value="Rajanpur">Rajanpur</option>
                                <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                <option value="Rawalpindi">Rawalpindi</option>
                                <option value="Sadiqabad">Sadiqabad</option>
                                <option value="Safdarabad">Safdarabad</option>
                                <option value="Sahiwal">Sahiwal</option>
                                <option value="Sangla Hill">Sangla Hill</option>
                                <option value="Sarai Alamgir">Sarai Alamgir</option>
                                <option value="Sargodha">Sargodha</option>
                                <option value="Shakargarh">Shakargarh</option>
                                <option value="Sheikhupura">Sheikhupura</option>
                                <option value="Sialkot">Sialkot</option>
                                <option value="Sohawa">Sohawa</option>
                                <option value="Soianwala">Soianwala</option>
                                <option value="Siranwali">Siranwali</option>
                                <option value="Talagang">Talagang</option>
                                <option value="Taxila">Taxila</option>
                                <option value="Toba Tek Singh">Toba Tek Singh</option>
                                <option value="Vehari">Vehari</option>
                                <option value="Wah Cantonment">Wah Cantonment</option>
                                <option value="Wazirabad">Wazirabad</option>
                        </select>
                    </div>
                </div>
                    {{-- <div class="col-md-6" style="padding-left:0">
                        <select name="select" class="form-control form-control-default">
                            <option value="opt1" selected hidden>To</option>
                        </select>
                    </div> --}}
                <div class="col-md-12 inlinebox" style="margin-top:10px">
                        {{-- <label for="">Date</label> --}}
                    <div class="col-md-6 nopaddinglef">
                            <label for="">Date</label><br/>
                        <div class="">
                        {{-- <input type="text" class="form-control border" placeholder="Select Date"> --}}
                        <input type="text" name="daterange" class="form-control" value="">
                        {{-- <span class="col-md-2">
                            <i class="fa fa-calendar"></i>
                        </span> --}}
                        </div>
                    </div>
                    <div class="col-md-6 nopaddingright">
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

                  <div class="addroundclonehere">

                  </div>
                  <div class="form-group" onclick="addCity(this)">
                      <div class="nodisplay addnewmulcityout btn btn-primary btn-outline-primary btn-block"  ><i class="icofont icofont-plus"></i>Add City</div>
                  </div>

                  {{-- end roundtrip --}}
                  {{-- start multiple cities --}}
                </div>

                  <div class="addmultiprhere">

                  </div>


                  <div class="form-group" onclick="addPurpose(this)">
                      <div class="addnewproposoutcity nodisplay btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-plus"></i>Add Purpose</div>
                  </div>
                  <div class="form-group">
                      <button class="btn btn-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Submit</button>
                  </div>
                  {{-- end multiple cities --}}
            </div>
            {{-- end outstation --}}
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
    var purpose_id = 1;
    var purpose_id2 = 1;
    var city_id2 = 1;
    var roundpurposal = 1;
    var append_id=2
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

    var prcl = `
    <div id="roundtripp_1" style="padding-top:3%;border-top:1px dotted #01a9ac;">
      <div class="col-md-12 inlinebox">
        <div class="col-md-2 nopadlefright">
            <select id="reasonroundtrip" name="select" class="form-control reasonroundtrip form-control-default">
                <option selected="selected" hidden>Select Reason For Visit</option>
                <option value="Monitoring">Monitoring</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Meeting">Meeting</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div id='gsrowround' class="nodisplay col-md-10 row w3-animate-left nopaddingright">
            <div class="col-md-2 no nopaddingright">
                <select name="select" class="form-control form-control-default">
                    <option value="opt1" selected>Year</option>
                </select>
            </div>
            <h2 class="col-md-1" style="padding-left:4% !important;">/</h2>
            <div class="col-md-2">
                <select name="select" class="form-control form-control-default">
                    <option value="opt1" selected>GS#</option>
                </select>
            </div>
            <div class="col-md-7 nopaddingright" style="width:41.5% !important;">
                <select name="select" class="form-control form-control-default">
                    <option value="opt1" selected>project</option>
                    <option value="opt1" selected>project</option>
                </select>
            </div>
        </div>

        <div class='form-control col-md-10 nodisplay w3-animate-left' id='briefround' >
            <input type="text" placeholder="Enter Description Here..."/>
        </div>
  </div>
  <div id='multicitycloneadd'>


  <label for="">Location</label>
  <div class="col-md-12 inlinebox">
      <div class="col-md-6 nopaddinglef">
          <select name="select" class="form-control form-control-default yeselect">
                  <option value="opt1" selected hidden>From</option>
                  <option value="Ahmadpur East">Ahmadpur East</option>
                  <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                  <option value=">Ali Khan Abad">Ali Khan Abad</option>
                  <option value="Alipur">Alipur</option>
                  <option value="Arifwala">Arifwala</option>
                  <option value="Attock">Attock</option>
                  <option value="Bhera">Bhera</option>
                  <option value="Bhalwal">Bhalwal</option>
                  <option value="Bahawalnagar">Bahawalnagar</option>
                  <option value="Bahawalpur">Bahawalpur</option>
                  <option value="Bhakkar">Bhakkar</option>
                  <option value="Burewala">Burewala</option>
                  <option value="Chillianwala">Chillianwala</option>
                  <option value="Chakwal">Chakwal</option>
                  <option value="Chichawatni">Chichawatni</option>
                  <option value="Chiniot">Chiniot</option>
                  <option value="Chishtian">Chishtian</option>
                  <option value="Daska">Daska</option>
                  <option value="Darya Khan">Darya Khan</option>
                  <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                  <option value="Dhaular">Dhaular</option>
                  <option value="Dina">Dina</option>
                  <option value="Dinga">Dinga</option>
                  <option value="Dipalpur">Dipalpur</option>
                  <option value="Faisalabad">Faisalabad</option>
                  <option value="Fateh Jang">Fateh Jang</option>
                  <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                  <option value="Gojra">Gojra</option>
                  <option value="Gujranwala">Gujranwala</option>
                  <option value="Gujrat">Gujrat</option>
                  <option value="Gujar Khan">Gujar Khan</option>
                  <option value="Hafizabad">Hafizabad</option>
                  <option value="Haroonabad">Haroonabad</option>
                  <option value="Hasilpur">Hasilpur</option>
                  <option value="Haveli Lakha">Haveli Lakha</option>
                  <option value="Jalalpur Jattan">Jalalpur Jattan</option>
                  <option value="Jampur">Jampur</option>
                  <option value="Jaranwala">Jaranwala</option>
                  <option value="Jhang">Jhang</option>
                  <option value="Jhelum">Jhelum</option>
                  <option value="Kalabagh">Kalabagh</option>
                  <option value="Karor Lal Esan">Karor Lal Esan</option>
                  <option value="Kasur">Kasur</option>
                  <option value="Kamalia">Kamalia</option>
                  <option value="KÄmoke">KÄmoke</option>
                  <option value="Khanewal">Khanewal</option>
                  <option value="Khanpur">Khanpur</option>
                  <option value="Kharian">Kharian</option>
                  <option value="Khushab">Khushab</option>
                  <option value="Kot Adu">Kot Adu</option>
                  <option value="Jauharabad">Jauharabad</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Lalamusa">Lalamusa</option>
                  <option value="Layyah">Layyah</option>
                  <option value="Liaquat Pur">Liaquat Pur</option>
                  <option value="Lodhran">Lodhran</option>
                  <option value="Malakwal">Malakwal</option>
                  <option value="Mamoori">Mamoori</option>
                  <option value="Mailsi">Mailsi</option>
                  <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                  <option value="Mian Channu">Mian Channu</option>
                  <option value="Mianwali">Mianwali</option>
                  <option value="Multan">Multan</option>
                  <option value="Murree">Murree</option>
                  <option value="Muridke">Muridke</option>
                  <option value="Mianwali Bangla">Mianwali Bangla</option>
                  <option value="Muzaffargarh">Muzaffargarh</option>
                  <option value="Narowal">Narowal</option>
                  <option value="Okara">Okara</option>
                  <option value="Renala K">Renala K</option>
                  <option value="Pakpatta">Pakpatta</option>
                  <option value="Pattoki">Pattoki</option>
                  <option value="Pir Mahal">Pir Mahal</option>
                  <option value="Qaimpur">Qaimpur</option>
                  <option value="Qila Didar Singh">Qila Didar Singh</option>
                  <option value="Rabwah">Rabwah</option>
                  <option value="Raiwind">Raiwind</option>
                  <option value="Rajanpur">Rajanpur</option>
                  <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                  <option value="Rawalpindi">Rawalpindi</option>
                  <option value="Sadiqabad">Sadiqabad</option>
                  <option value="Safdarabad">Safdarabad</option>
                  <option value="Sahiwal">Sahiwal</option>
                  <option value="Sangla Hill">Sangla Hill</option>
                  <option value="Sarai Alamgir">Sarai Alamgir</option>
                  <option value="Sargodha">Sargodha</option>
                  <option value="Shakargarh">Shakargarh</option>
                  <option value="Sheikhupura">Sheikhupura</option>
                  <option value="Sialkot">Sialkot</option>
                  <option value="Sohawa">Sohawa</option>
                  <option value="Soianwala">Soianwala</option>
                  <option value="Siranwali">Siranwali</option>
                  <option value="Talagang">Talagang</option>
                  <option value="Taxila">Taxila</option>
                  <option value="Toba Tek Singh">Toba Tek Singh</option>
                  <option value="Vehari">Vehari</option>
                  <option value="Wah Cantonment">Wah Cantonment</option>
                  <option value="Wazirabad">Wazirabad</option>
          </select>
      </div>
      <div class="col-md-6 nopaddingright">
          <select name="select" class="form-control form-control-default yeselect">
                  <option value="opt1" selected hidden>To</option>
                  <option value="Ahmadpur East">Ahmadpur East</option>
                  <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                  <option value=">Ali Khan Abad">Ali Khan Abad</option>
                  <option value="Alipur">Alipur</option>
                  <option value="Arifwala">Arifwala</option>
                  <option value="Attock">Attock</option>
                  <option value="Bhera">Bhera</option>
                  <option value="Bhalwal">Bhalwal</option>
                  <option value="Bahawalnagar">Bahawalnagar</option>
                  <option value="Bahawalpur">Bahawalpur</option>
                  <option value="Bhakkar">Bhakkar</option>
                  <option value="Burewala">Burewala</option>
                  <option value="Chillianwala">Chillianwala</option>
                  <option value="Chakwal">Chakwal</option>
                  <option value="Chichawatni">Chichawatni</option>
                  <option value="Chiniot">Chiniot</option>
                  <option value="Chishtian">Chishtian</option>
                  <option value="Daska">Daska</option>
                  <option value="Darya Khan">Darya Khan</option>
                  <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                  <option value="Dhaular">Dhaular</option>
                  <option value="Dina">Dina</option>
                  <option value="Dinga">Dinga</option>
                  <option value="Dipalpur">Dipalpur</option>
                  <option value="Faisalabad">Faisalabad</option>
                  <option value="Fateh Jang">Fateh Jang</option>
                  <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                  <option value="Gojra">Gojra</option>
                  <option value="Gujranwala">Gujranwala</option>
                  <option value="Gujrat">Gujrat</option>
                  <option value="Gujar Khan">Gujar Khan</option>
                  <option value="Hafizabad">Hafizabad</option>
                  <option value="Haroonabad">Haroonabad</option>
                  <option value="Hasilpur">Hasilpur</option>
                  <option value="Haveli Lakha">Haveli Lakha</option>
                  <option value="Jalalpur Jattan">Jalalpur Jattan</option>
                  <option value="Jampur">Jampur</option>
                  <option value="Jaranwala">Jaranwala</option>
                  <option value="Jhang">Jhang</option>
                  <option value="Jhelum">Jhelum</option>
                  <option value="Kalabagh">Kalabagh</option>
                  <option value="Karor Lal Esan">Karor Lal Esan</option>
                  <option value="Kasur">Kasur</option>
                  <option value="Kamalia">Kamalia</option>
                  <option value="KÄmoke">KÄmoke</option>
                  <option value="Khanewal">Khanewal</option>
                  <option value="Khanpur">Khanpur</option>
                  <option value="Kharian">Kharian</option>
                  <option value="Khushab">Khushab</option>
                  <option value="Kot Adu">Kot Adu</option>
                  <option value="Jauharabad">Jauharabad</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Lalamusa">Lalamusa</option>
                  <option value="Layyah">Layyah</option>
                  <option value="Liaquat Pur">Liaquat Pur</option>
                  <option value="Lodhran">Lodhran</option>
                  <option value="Malakwal">Malakwal</option>
                  <option value="Mamoori">Mamoori</option>
                  <option value="Mailsi">Mailsi</option>
                  <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                  <option value="Mian Channu">Mian Channu</option>
                  <option value="Mianwali">Mianwali</option>
                  <option value="Multan">Multan</option>
                  <option value="Murree">Murree</option>
                  <option value="Muridke">Muridke</option>
                  <option value="Mianwali Bangla">Mianwali Bangla</option>
                  <option value="Muzaffargarh">Muzaffargarh</option>
                  <option value="Narowal">Narowal</option>
                  <option value="Okara">Okara</option>
                  <option value="Renala K">Renala K</option>
                  <option value="Pakpatta">Pakpatta</option>
                  <option value="Pattoki">Pattoki</option>
                  <option value="Pir Mahal">Pir Mahal</option>
                  <option value="Qaimpur">Qaimpur</option>
                  <option value="Qila Didar Singh">Qila Didar Singh</option>
                  <option value="Rabwah">Rabwah</option>
                  <option value="Raiwind">Raiwind</option>
                  <option value="Rajanpur">Rajanpur</option>
                  <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                  <option value="Rawalpindi">Rawalpindi</option>
                  <option value="Sadiqabad">Sadiqabad</option>
                  <option value="Safdarabad">Safdarabad</option>
                  <option value="Sahiwal">Sahiwal</option>
                  <option value="Sangla Hill">Sangla Hill</option>
                  <option value="Sarai Alamgir">Sarai Alamgir</option>
                  <option value="Sargodha">Sargodha</option>
                  <option value="Shakargarh">Shakargarh</option>
                  <option value="Sheikhupura">Sheikhupura</option>
                  <option value="Sialkot">Sialkot</option>
                  <option value="Sohawa">Sohawa</option>
                  <option value="Soianwala">Soianwala</option>
                  <option value="Siranwali">Siranwali</option>
                  <option value="Talagang">Talagang</option>
                  <option value="Taxila">Taxila</option>
                  <option value="Toba Tek Singh">Toba Tek Singh</option>
                  <option value="Vehari">Vehari</option>
                  <option value="Wah Cantonment">Wah Cantonment</option>
                  <option value="Wazirabad">Wazirabad</option>
          </select>
      </div>
  </div>
      {{-- <div class="col-md-6" style="padding-left:0">
          <select name="select" class="form-control form-control-default">
              <option value="opt1" selected hidden>To</option>
          </select>
      </div> --}}
  <div class="col-md-12 inlinebox" style="margin-top:10px">
          {{-- <label for="">Date</label> --}}
      <div class="col-md-6 nopaddinglef">
              <label for="">Date</label><br/>
          <div class="">
          {{-- <input type="text" class="form-control border" placeholder="Select Date"> --}}
          <input type="text" name="daterange" class="form-control" value="">
          {{-- <span class="col-md-2">
              <i class="fa fa-calendar"></i>
          </span> --}}
          </div>
      </div>
      <div class="col-md-6 nopaddingright">
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

    <div class="addroundclonehere">

    </div>
    <div class="form-group" onclick="addCity(this)">
        <div class="nodisplay addnewmulcityout btn btn-primary btn-outline-primary btn-block"  ><i class="icofont icofont-plus"></i>Add City</div>
    </div>

    {{-- end roundtrip --}}
    {{-- start multiple cities --}}
  </div>
    `

    function addPurpose(e){
        console.log('jnsdknsknksnjd');
        var ob = $(prcl)
        var add = $(e).siblings('.addmultiprhere')
        if(purpose_id2++ % 2 == 1){
            ob.addClass('bg')
        }
        // console.log($('.sinpurmulticityout').prop('checked'));

        if($('.sinpurmulticityout').prop('checked')){
            ob.find('.addnewmulcityout').removeClass('nodisplay');
            console.log($(ob.find('.addnewmulcityout'),'chal raha hai'));
        }
        ob.appendTo(add)
        $(".js-multiple").select2();
        // clone.find('.date').datepicker()
    }

    function addCity(e){
        var add = $(e).siblings('.addroundclonehere')
        var clone = $('#multicitycloneadd').clone()
        if(city_id2++ % 2 == 1){
            clone.addClass('bg')
            console.log('testing')
          }
        clone.find("#thishit").remove()
        clone.append(cl);
        clone.appendTo(add)
        $(".js-multiple").select2();
        clone.find('.date').datepicker()
    }

    // $(document).on('click','.addnewmulcityout',(e)=>{

    // })

     $(document).on('change','.reason',function(){
         console.log($(this).parent().parent().find('#gsrow'))
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $(this).parent().parent().find('#gsrow').hide()
      $(this).parent().parent().find('#brief').attr('style','display:flex !important').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $(this).parent().parent().find('#brief').hide()
      $(this).parent().parent().find('#gsrow').attr('style','display:contents !important').show('slow')
    }
  })

   $(document).on('change','.reasonroundtrip',function(){
         console.log($(this).parent().parent().find('#gsrow'))
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $(this).parent().parent().find('#gsrowround').hide()
      $(this).parent().parent().find('#briefround').attr('style','display:flex !important').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $(this).parent().parent().find('#briefround').hide()
      $(this).parent().parent().find('#gsrowround').attr('style','display:contents !important').show('slow')
    }
  })

    $(function () {
          //Initialize Select2 Elements
          $('.yeselect').select2();
          $(".js-multiple").select2();
    });
    $(document).on('click','.addnewproposal',function(){
        var clone = $('#clonethisproposal_1').clone().attr('id','clonethisproposal_'+ ++purpose_id).css({'border-top': '1px solid #01a9ac', 'padding-top': '3%'})
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
    // start append round
    $(document).on('click','.addnewroundproposal',function(){
        var clone = $('#roundtripp_1').clone().attr('id','roundtripp_'+ ++roundpurposal)
        if(roundpurposal % 2 == 0)
            clone.addClass('bg')
        // clone.children().find('#gsrow_'+(purpose_id-1)).attr('id','gsrow_'+purpose_id)
        // clone.children().find('#brief_'+(purpose_id-1)).attr('id','brief_'+purpose_id)
        clone.children().find('#roundtripp_'+(roundpurposal-1)).attr('id','roundtripp_'+roundpurposal)
        clone.appendTo('.addroundclonehere').show('slow');
    });
    // end append round
  $(document).ready(function(){
    $(".js-multiple").select2();
    $(".sinpurpose").click(function(){
        $(".addnewproposal").hide();
        });
    $(".mulpurpose").click(function(){
        $(".addnewproposal").show();
        });
    });
    $(document).on('click','.multipurposeout',function(){
      $('.addnewproposoutcity').show();
    });
      $(document).on('click','.sinpurposeout',function(){
        $('.addnewproposoutcity').hide();
      });
      $(document).on('click','.sinpurmulticityout',function(){
        $('.addnewmulcityout').show();
      });
      $(document).on('click','.sinpurroundcityout',function(){
        $('.addnewmulcityout').hide();
      });
    $(document).on('change','#type',function(){
    if ($(this).val() == "Local"){
      $('.outstation').hide()
      $('.local').show('slow')
    }
    else if($(this).val() == "Outstation"){
      $('.local').hide()
      $('.outstation').show('slow')
    }
    else{
      $('.local').hide()
      $('.outstation').hide()
    }
  });

</script>
@endsection
