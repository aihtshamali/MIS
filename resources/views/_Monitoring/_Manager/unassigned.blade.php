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
                            <form action="{{route('assign_To_consultant')}}">
                                <button  type="submit" class=" assignButton btn btn-sm btn-info btn-outline-info" style=" margin-top: -30px; margin-bottom: 5px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Assign Project</button>
                                </form>    
                            </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="margin-top:-20px;">
                            {{-- <a href="{{route('monitoring_inprogressSingle')}}"> --}}
                                <div class="accordion-content accordion-desc openpage" >
                                    <div class="row" style="margin-top: 10px;
                                    margin-bottom: -18px;">
                                        <div class="col-md-4" >
                                            <ul>
                                                <li>GS #</li>
                                                <li>Cost</li>
                                                <li>Sector</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul>
                                                <li>District</li>
                                                <li>Assigning Forum</li>
                                                <li>Last Monitring Date (if any)</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul>
                                                <li>SNE</li>
                                               
                                            </ul>
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
