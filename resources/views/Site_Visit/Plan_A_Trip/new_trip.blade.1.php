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
</style>
@endsection
@section('content')
    <form action="" class="offset-md-2 col-md-8 form-control form-control-default">
            <select name="select" class="form-control form-control-default">
                <option value="opt2">outstation</option>
                <option value="opt1">local</option>
            </select>
            <div class="local">
                    <div class="col-md-12">
                            <div class="form-radio">
                                    <div class="radio radio-outline radio-inline">
                                        <label>
                                            <input type="radio" name="radio" checked="checked">
                                            <i class="helper"></i>single purposal
                                        </label>
                                    </div>
                                    <div class="radio radio-outline radio-inline">
                                        <label>
                                            <input type="radio" name="radio">
                                            <i class="helper"></i>Multi purposal
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12 inlinebox">
                            <div class="col-md-4">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected>purpose</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected>GS#</option>
                                </select>
                            </div>
                            <h2>/</h2>
                            <div class="col-md-2">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected>there</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="select" class="form-control form-control-default">
                                    <option value="opt1" selected>project</option>
                                    <option value="opt1" selected>project</option>
                                </select>
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
                                <select id="members" name="members[]" class="form-control js-multiple js-placeholder-multiple" multiple="multiple" data-placeholder="Members" style="width: 100%;">
                                    <option>Hassan Ali</option>
                                    <option>Aymun Saif</option>
                                    <option>Aihtsham Ali</option>
                                    <option>Anas Majeed</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <button class="btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Submit</button>
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
<script>
    $(function () {
          //Initialize Select2 Elements
          $(".js-multiple").select2();
    });
</script>
@endsection