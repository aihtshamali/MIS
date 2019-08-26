@extends('_Monitoring.layouts.upperNavigation')
@section('title')
Monitoring | Assigned To Chairman
@endsection
@section('styleTags')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection
@section('content')
<style>
    .hovsky:hover {
        color: #19a7ba !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card z-depth-5">
            <div class="card-header">
                <h4><b>Inprogress Monitoring Projects</b></h4>
            </div>
            <div class="card-block">
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-bordered table-stripped nowrap">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Sector</th>
                                    <th>Assigned To</th>
                                    <th>Planned Start Date</th>
                                    <th>Planned End Date</th>
                                    <th>Physical Progress</th>
                                    <th>Financial Progress</th>
                                    <th>Summary</th>
                                    {{-- <th>Action</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    @if(isset($project->Project->AssignedProject->AssignedProjectTeam))
                                    <td><a style="font-size:15px;" href="{{route('monitoringDashboard',['project_id'=>$project->Project->id])}}">{{$project->Project->title}}</a></td>
                                    <td>
                                        @foreach ($project->Project->AssignedSubSectors as $subsector)
                                        {{$subsector->SubSector->Sector->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($project->Project->AssignedProject->AssignedProjectTeam as $team)
                                        @if ($team->team_lead==1)
                                        <span style="font-weight:bold;color:blue">{{$team->User->first_name}} {{$team->User->last_name}} -</span>
                                        @else
                                        <span class="">{{$team->User->first_name}} {{$team->User->last_name}}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{date('d-M-Y',strtotime($project->Project->ProjectDetail->planned_start_date))}}
                                    </td>
                                    <td>
                                        {{date('d-M-Y',strtotime($project->Project->ProjectDetail->planned_end_date))}}
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width:
                                      @if($project->Project->AssignedProject!==NULL && $project->Project->AssignedProject->MProjectProgress->last()!==NULL){{round(calculateMPhysicalProgress($project->Project->AssignedProject->MProjectProgress->last()->id,3))}}@else{{0}}@endif%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($project->Project->AssignedProject!==NULL && $project->Project->AssignedProject->MProjectProgress->last()!==NULL) {{round(calculateMPhysicalProgress($project->Project->AssignedProject->MProjectProgress->last()->id,3))}} @else 0 @endif%</div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width:
                                            @if($project->Project->AssignedProject!==NULL && $project->Project->AssignedProject->MProjectProgress->last()!==NULL){{round(calculateMFinancialProgress($project->Project->AssignedProject->MProjectProgress->last()->id,3))}}@else{{0}}@endif%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@if($project->Project->AssignedProject!==NULL && $project->Project->AssignedProject->MProjectProgress->last()!==NULL) {{round(calculateMFinancialProgress($project->Project->AssignedProject->MProjectProgress->last()->id,3))}} @else 0 @endif%</div>
                                        </div>
                                    </td>

                                    <td>
                                        @if(count($project->Project->AssignedProject->MProjectProgress))
                                        <a href="{{route('generate_monitoring_report',['project_id'=>$project->Project->AssignedProject->id])}}" target="_blank" class="hovsky" style="color: #4f5c5f9e; font-size:36px !important;">
                                            <center><i class="fas fa-address-card"></i></center>
                                        </a>
                                        @else
                                        <p> --
                                        </p>
                                        @endif
                                    </td>
                                    {{-- <td>
                                    <a href="{{route('monitoring_inprogressSingle')}}" class="btn btn-md btn-info"> Conduct Monitoring</a>
                                    </td> --}}
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
@section('js_scripts')
<script>
    $(document).ready(function() {
        $('#simpletable').DataTable({
            "order": [
                [4, "desc"]
            ]
        });
    });
</script>
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
@endsection