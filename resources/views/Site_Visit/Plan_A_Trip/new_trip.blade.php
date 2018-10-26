@extends('_Monitoring.layouts.upperNavigation')
@section('styleTags')
 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/multiselect/css/multi-select.css')}}" />
<style>
    .bg-w{background-color: #fff !important;}
    /* .form-control {margin: 1% !important;} */
    .form-control {border:none !important;margin-bottom:2%;color:#353333 !important;color: #353333 !important;border: 1px solid #d9d5d536 !important}
    .form-radio {display: -webkit-inline-box !important;}
    .inlinebox {display: inline-box !important;display: -webkit-inline-box !important;}
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
    label{cursor: pointer !important;}
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
                                    <div class="radio radio-outline radio-inline">
                                        <label>
                                            <input type="radio" class="sinpurpose" name="radio" checked="checked">
                                            <i class="helper"></i>single purpose
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
                    <div id="clonethisproposal">
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-4">
                                <select id="reason" name="select" class="form-control form-control-default">
                                    <option selected="selected" hidden>Select Reason For Visit</option>
                                    <option value="Monitoring">Monitoring</option>
                                    <option value="Evaluation">Evaluation</option>
                                    <option value="Meeting">Meeting</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div id='gsrow' class="col-md-8 row">
                                <div class="col-md-3">
                                    <select name="select" class="form-control form-control-default">
                                        <option value="opt1" selected>Year</option>
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

                            <div class='form-control nodisplay' id='brief' >
                                <input type="text" />
                            </div>

                        </div>
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-6">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected hidden>From</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected hidden>To</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-6">
                                <input class="form-control" type="datetime-local">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="time">
                            </div>
                        </div>
                        <div class="form-group">
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
            {{-- start outstation --}}
            <div class="outstation">
                <div class="col-md-12">
                    <div class="form-radio">
                        <div class="radio radio-outline radio-inline">
                            <label>
                                <input type="radio" class="" name="radioout" checked="checked">
                                <i class="helper"></i>single purpose
                            </label>
                        </div>
                        <div class="radio radio-outline radio-inline">
                            <label>
                                <input type="radio" class="" name="radioout">
                                <i class="helper"></i>Multi purpose
                            </label>
                        </div>
                    </div>
                </div>
                <div class="sinpurposeout">
                  <div class="col-md-12">
                      <div class="form-radio">
                          <div class="radio radio-outline radio-inline">
                              <label>
                                  <input type="radio" class="" name="radiocityout" checked="checked">
                                  <i class="helper"></i>round trip
                              </label>
                          </div>
                          <div class="radio radio-outline radio-inline">
                              <label>
                                  <input type="radio" class="" name="radiocityout">
                                  <i class="helper"></i>Multi city
                              </label>
                          </div>
                      </div>
                  </div>
                  {{-- start roundtrip --}}
                  <div class="col-md-12 inlinebox">
                      <div class="col-md-4">
                          <select id="reasonroundtrip" name="select" class="form-control form-control-default">
                              <option selected="selected" hidden>Select Reason For Visit</option>
                              <option value="Monitoring">Monitoring</option>
                              <option value="Evaluation">Evaluation</option>
                              <option value="Meeting">Meeting</option>
                              <option value="Other">Other</option>
                          </select>
                      </div>

                      <div id='gsrow' class="col-md-8 row">
                          <div class="col-md-3">
                              <select name="select" class="form-control form-control-default">
                                  <option value="opt1" selected>Year</option>
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

                      <div class='form-control nodisplay' id='brief' >
                          <input type="text" />
                      </div>

                  </div>
                  {{-- end roundtrip --}}
                </div>
                <div class="mulpurposeout ">

                </div>
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
<script>

     $(document).on('change','#reason',function(){
    if ($(this).val() == "Other" || $(this).val() == "Meeting"){
      $('#gsrow').hide()
      $('#brief').show('slow')
    }
    else if ($(this).val() == "Monitoring" || $(this).val() == "Evaluation"){
      $('#brief').hide()
      $('#gsrow').show('slow')
    }
  })

    $(function () {
          //Initialize Select2 Elements
          $(".js-multiple").select2();
    });
    $(document).on('click','.addnewproposal',function(){
    $('#clonethisproposal').clone().appendTo('.addclonehere').show('slow');
  });
  $(document).ready(function(){
    $(".sinpurpose").click(function(){
        $(".addnewproposal").hide();
        });
    $(".mulpurpose").click(function(){
        $(".addnewproposal").show();
        });
    });
    $(document).ready(function(){
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
