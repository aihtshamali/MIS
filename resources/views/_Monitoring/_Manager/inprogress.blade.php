@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card z-depth-5">
        <div class="card-header"> <h4><b>Inprogress Monitoring Projects</b></h4></div>
        <div class="card-block">
                <div class="card-block">
                        <div class="dt-responsive table-responsive">
                                <table id="simpletable"
                                class="table table-bordered table-stripped nowrap">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Sector</th>
                                <th>Progress</th>
                                {{-- <th>Action</th> --}}

                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($projects as $project)
                                <tr>
                                    <td>{{$project->Project->title}}</td>
                                    <td>@foreach ($project->Project->AssignedSubSectors as $subsector)
                                      {{$subsector->SubSector->Sector->name}}
                                    @endforeach</td>

                                    <td>
                                      <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> 35%</div>
                                        </div>
                                      </td>
                                    {{-- <td>
                                    <a href="{{route('monitoring_inprogressSingle')}}" class="btn btn-md  btn-info"> Conduct Monitoring</a>
                                    </td> --}}
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
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
@endsection
