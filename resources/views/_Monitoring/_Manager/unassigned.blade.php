@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/simple-line-icons/css/simple-line-icons.css')}}"/>
@section('styleTags')
<style>
.openpage{
  border: 1px solid lavender;
 
}
.openpage:hover{
  background: lavender;
 
}
</style>
@endsection
@section('content') 
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-6 ">
        <div class="card">
            {{-- card header --}}
            <div class="card-header">
                <h5><i class="icon-book-open m-r-5"></i> NEW UN-ASSIGNED MONITORING PROJECTS</h5>
            </div>
            {{-- card body --}}
            <div class="card-block">
                <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    TITLE OF PROJECT 1  
                                </a>        
                                <button class="btn btn-sm btn-warning btn-outline-warning" style=" margin-top: -30px; margin-bottom: 10px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Assign Project</button> 
                                </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            {{-- <a href="{{route('monitoring_inprogressSingle')}}"> --}}
                                <div class="accordion-content accordion-desc openpage" >
                                    <div class="row" style="margin-top: 10px;
                                    margin-bottom: -10px;">
                                        <div class="col-md-6" >
                                            <ol>
                                                <li>GS #</li>
                                                <li>Cost</li>
                                                <li>Sector</li>
                                            </ol>
                                        </div>
                                        <div class="col-md-6">
                                            <ol>
                                                <li>District</li>
                                                <li>Assigning Forum</li>
                                                <li>Last Monitring Date (if any)</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                {{-- </a> --}}
                            </div>
                        </div>
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingTwo">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapseTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    TITLE OF PROJECT 2
                                </a>
                                <button class="btn btn-sm btn-warning btn-outline-warning" style=" margin-top: -30px; margin-bottom: 10px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Assign Project</button> 
                            </h3>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                {{-- <a href="{{route('monitoring_inprogressSingle')}}"> --}}
                                    <div class="accordion-content accordion-desc openpage" >
                                        <div class="row" style="margin-top: 10px;
                                        margin-bottom: -10px;">
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>GS #</li>
                                                    <li>Cost</li>
                                                    <li>Sector</li>
                                                </ol>
                                            </div>
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>Priority</li>
                                                    <li>Assigned By</li>
                                                    <li>Last Monitring Date (if any)</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </a> --}}
                            </div>
                        </div>
                        <div class="accordion-panel">
                            <div class=" accordion-heading" role="tab" id="headingThree">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapseThree"
                                    aria-expanded="false"
                                    aria-controls="collapseThree">
                                    TITLE OF PROJECT 2
                                </a>
                                <button class="btn btn-sm btn-warning btn-outline-warning" style=" margin-top: -30px; margin-bottom: 10px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Assign Project</button> 
                            </h3>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    {{-- <a href="{{route('monitoring_inprogressSingle')}}"> --}}
                                    <div class="accordion-content accordion-desc openpage" >
                                        <div class="row" style="margin-top: 10px;
                                        margin-bottom: -10px;">
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>GS #</li>
                                                    <li>Cost</li>
                                                    <li>Sector</li>
                                                </ol>
                                            </div>
                                            <div class="col-md-6">
                                                <ol>
                                                    <li>Priority</li>
                                                    <li>Assigned By</li>
                                                    <li>Last Monitring Date (if any)</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            {{-- card footer --}}
            <div class="card-footer text-center">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section("js_scripts")
<script src="{{asset('_monitoring/css/pages/accordion/accordion.js')}}"></script>
@endsection