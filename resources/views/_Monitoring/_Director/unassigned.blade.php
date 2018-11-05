@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/simple-line-icons/css/simple-line-icons.css')}}"/>
<!-- Select 2 css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/multiselect/css/multi-select.css')}}" />
<style>

        .openpage{
          border: 1px solid lavender;
         
        }
        .openpage:hover{
          background: lavender;
        }
        
        </style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4><i class="icon-book-open m-r-5"></i>  NEW UNASSIGNED MONITORING PROJECTS <div class="label-main">
                    <label class="label label-danger">0</label>
                </div></h4>
            </div>
            <div class="card-block">
            {{-- <form class="form" action="#" method="get">
                <div class="row form-group">
                    <div class="col-md-5 offset-md-1">
                    <label >Select Project</label>
                    <select class="js-example-basic-multiple js-placeholder-multiple col-md-6  form-control"  multiple="multiple" name="project_id">
                        <option selected="selected" value="" >Select A Project</option>
                        @foreach($projects as $project)
                        <option value="{{ $project->Project->id }}">{{ $project->Project->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 ">
                        <label>Select Sector</label>
                        <select class="form-control select2" name="sector_id" style="width: 100%;">
                            <option selected="selected" value="" >Select A Sector</option>
                            @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 offset-md-3">
                    <label>Select Sector</label>
                    <select class="form-control select2" name="sector_id" style="width: 100%;">
                        <option selected="selected" value="" >Select A Sector</option>
                        @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </form>      --}}
            <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> 
                                    TITLE OF PROJECT 1  
                                </a>        
                            <form action="{{route('Monitoring_assignToconsultant')}}">
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
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
@section('js_scripts')
<script src="{{asset('_monitoring/css/pages/accordion/accordion.js')}}"></script>

<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
@endsection