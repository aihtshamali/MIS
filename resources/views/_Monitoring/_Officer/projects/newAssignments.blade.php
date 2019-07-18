@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/simple-line-icons/css/simple-line-icons.css')}}"/>
<style>
.openpage{
  border: 1px solid lavender;
}
.openpage:hover{
  background: lavender;
}
.New_Assignments a{color : #FE8A7D !important;}
.Monitoring_Projects{color : #FE8A7D !important;}
</style>
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Global Progress</h5>
            </div>
            <div class="card-block">
                {{-- <p>Use class for stipped <code> progress-bar-striped</code></p> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> 35%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-6 ">
        <div class="card">
            {{-- card header --}}
            <div class="card-header">
                <h5><i class="icon-book-open m-r-5"></i> MONITORING PROJECTS</h5>
            </div>
            {{-- card body --}}
            <div class="card-block">
                <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                      @php
                        $i=1;
                      @endphp
                      @foreach ($projects as $project)
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="heading_{{$i}}">
                                <h3 class="card-title accordion-title">
                                  <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$i}}" aria-expanded="true" aria-controls="collapse_{{$i}}">
                                      {{$project->project_no}} - {{$project->title}}
                                  </a>
                                </h3>
                            </div>

                            <div id="collapse_{{$i}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_{{$i}}">
                            <a href="{{route('monitoring_inprogressSingle',['project_id'=>$project->id])}}">
                                <div class="accordion-content accordion-desc openpage" >
                                    <div class="row" style="margin-top: 10px;
                                    margin-bottom: -10px;">
                                        <div class="col-md-6" >
                                            <ol>
                                                <li><b>GS #:</b> <span>{{$project->ProjectDetail->adp}}</span></li>
                                                <li><b>Cost:</b> <span>{{$project->ProjectDetail->orignal_cost}}</span></li>
                                                <li><b>Sector</b> <span>
                                                  @foreach ($project->AssignedSubSectors as $value)
                                                    {{$value->SubSector->Sector->name}},
                                                  @endforeach
                                                </span></li>
                                            </ol>
                                        </div>
                                        <div class="col-md-6">
                                            <ol>
                                                <li>Priority </li>
                                                <li>Assigned By</li>
                                                <li>Last Monitring Date (if any)</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        @php
                          $i++;
                        @endphp
                      @endforeach
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
