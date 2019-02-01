@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card z-depth-5">
        <div class="card-header"> <h4><b>Inprogress Monitoring Projects</b></h4></div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Material tab card start -->
                <div class="card">
                    <div class="card-block">
                        <!-- Row start -->
                        <div class="row m-b-30">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab" style="font-size: 17px;font-weight: 600;">New Monitoring</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" style="font-size: 17px;font-weight: 600;">Ongoing monitoring</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages6" role="tab" style="font-size: 17px;font-weight: 600;">Previous Monitoring</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content card-block">
                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                      @include('inc/inprogress/new')
                                    </div>
                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                      @include('inc/inprogress/ongoing')
                                    </div>
                                    <div class="tab-pane" id="messages6" role="tabpanel">
                                      @include('inc/inprogress/previos')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>
                                      @foreach ($project->AssignedSubSectors as $sub_sectors)
                                        {{ $sub_sectors->SubSector->name }}
                                      @endforeach
                                    </td>
                                    <td>{{ $project->AssignedProject->User->first_name}} {{ $project->AssignedProject->User->last_name }}</td>
                                    <td>{{ $project->ProjectDetail->AssigningForum->name }}</td>
                                    <td><div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: {{ $project->AssignedProject->progress }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> {{$project->AssignedProject->progress}}%</div>
                                        </div></td>
                                    <td>
                                    <a href="{{route('monitoring_inprogressSingle',['project_id'=>$project->id])}}" class="btn btn-md  btn-info"> Conduct Monitoring</a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Material tab card end -->
            </div>
        </div>
        <!-- <div class="card-footer"></div> -->
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
