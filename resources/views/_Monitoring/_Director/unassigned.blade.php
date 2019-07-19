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
                    <label class="label label-danger">{{$projects->count()}}</label>
                </div></h4>
            </div>
            @foreach ($projects as $project)
            <div class="card-block">
            <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  {{$project->Project->project_no}}  - {{$project->Project->title}}
                                </a>
                            <form action="{{route('Monitoring_assignToconsultant')}}" method="GET">
                                {{ csrf_field() }}
                                <input type="hidden" name="project_id" value="{{$project->project_id}}">
                                <input type="hidden" name="priority" value="{{$priority}}">
                                <button  type="submit" class=" assignButton btn btn-sm btn-info btn-outline-info" style="margin-bottom: 5px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Assign Project</button>
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
                                            <li><b>GS #:</b> <span class="pull-right">{{$project->Project->ADP}}</span></li>
                                            <li><b>Cost: </b> <span class="pull-right">{{$project->Project->ProjectDetail->orignal_cost}}</span></li>
                                            <li><b>Sector: </b> <span class="pull-right">
                                              @foreach ($project->Project->AssignedSubSectors as $subsector)
                                                {{$subsector->SubSector->Sector->name}},
                                              @endforeach
                                            </span></li>

                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li><b>District: </b>
                                              <span class="pull-right">
                                               @foreach ($project->Project->AssignedDistricts as $district)
                                                 {{$district->District->name}},
                                               @endforeach
                                             </span>
                                           </li>
                                            <li><b>Assigning Forum: </b>
                                              <span class="pull-right">
                                                 {{$project->Project->ProjectDetail->AssigningForum->name}}
                                             </span>

                                            </li>
                                            <li><b>Last Monitring Date (if any): </b></li>
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
          @endforeach

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
