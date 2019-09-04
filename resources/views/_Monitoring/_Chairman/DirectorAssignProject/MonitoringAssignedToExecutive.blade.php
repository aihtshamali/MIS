@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<style media="screen">
    .pcoded .pcoded-navbar .pcoded-item {
        width: 100% !important;
    }

    td a {
        color: #01a9ac !important;
    }

    .header-content {
        padding: 10px;
    }

    table.projects th,
    td {
        text-align: center !important;
    }

    .veryHigh {
        height: 100%;
    }

    .parent {
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .priority {
        /* background: #fff; */
        opacity: .4;
        color: black;
        font-weight: bold;
    }

    .child-right {
        background: green;
        height: 100%;
        width: 50%;
        position: absolute;
        right: 0;
        top: 0;
    }
    .form-group>.col-md-3,
    .bg-w>.col-md-12 {
        border-bottom: 1px solid #77777738 !important;
        padding: 0.5% !important;
    }

    .nodisplay {
        display: none;
    }
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card z-depth-5">
            <div class="card-header">
                <h4><b>Monitoring Projects Assigned to Executive</b></h4>
            </div>
            <div class="card-block">
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="example" class="table table-striped table-bordered table-stripped nowrap">
                            <thead>
                                <tr>
                                    <th>Project #</th>
                                    <th>Project Name</th>
                                    <th>Assigned To</th>
                                    <th>Project Score</th>
                                    <th>Assigning Forum</th>
                                    <th>Project Type</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->Project->project_no}}</td>
                                    <td>{{$project->MChairmanProject->project_name}}</td>
                                    <td>
                                        @foreach ($project->Project->AssignedProject->AssignedProjectTeam as $team)
                                        @if ($team->team_lead==1)
                                        <span style="font-weight:bold;color:blue">{{$team->User->first_name}} {{$team->User->last_name}} -</span>
                                        @else
                                        <span class="">{{$team->User->first_name}} {{$team->User->last_name}}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{round($project->Project->score,3,PHP_ROUND_HALF_UP) }}</td>
                                    <td>{{ $project->Project->ProjectDetail->AssigningForum->name }}</td>
                                    <td>{{$project->Project->ProjectType->name}}</td>
                                    <td>
                                        <a class="hovsky float-right" style="color: #4f5c5f9e; font-size:36px !important;">
                                            @php
                                            $projecttitle = $project->MChairmanProject->project_name;
                                            $Districts= '';
                                            foreach ($project->MChairmanProject->AssignedDistricts as $district)
                                            $Districts=$Districts.$district->District->name.', ';
                                            $GS = $project->MChairmanProject->gs_num;
                                            $Sub_Sectors = '';
                                            foreach ($project->MChairmanProject->AssignedSubSectors as $sub_sector)
                                            $Sub_Sectors=$Sub_Sectors.$sub_sector->SubSector->name;
                                            $Original_Approve_Cost = round($project->Project->ProjectDetail->orignal_cost,3);
                                            $Utilized_Cost = 0;
                                            if($project->MChairmanProject->final_utilized_cost)
                                            $Utilized_Cost =round($project->MChairmanProject->final_utilized_cost,3);
                                            $Planned_Start_Date = $project->MChairmanProject->planned_start_date;
                                            $dateplnstrt = date("d-M-Y", strtotime($Planned_Start_Date));
                                            $Planned_End_Date = $project->MChairmanProject->planned_end_date;
                                            $dateplnend = date("d-M-Y", strtotime($Planned_End_Date));
                                            $Actual_Start_Date = 'NA';
                                            if($project->MChairmanProject->actual_start_date)
                                                $Actual_Start_Date=$project->MChairmanProject->actual_start_date;
                                            $dateactulstrt = date("d-M-Y", strtotime($Actual_Start_Date));
                                            $Planned_Progress = round($project->MChairmanProject->physical_progress_planned,2);
                                            $financial_progress = $project->MChairmanProject->financial_progress_against_pc1_cost;
                                            $physical_progress_against_total_cost = round($project->MChairmanProject->physical_progress_actual,2);
                                            $physical_progress_against_total_release_date = round(calculateMPhysicalProgress($project->Project->AssignedProject->MProjectProgress->last()->id),2);
                                            $Overall_Progress = $physical_progress_against_total_cost;
                                            $Physical_Progress = $physical_progress_against_total_release_date;
                                            @endphp
                                            <!-- <center><i class="fas fa-address-card"></i></center> -->
                                        <button class="assignExecBtn btn btn-primary btn-sm" data-toggle="modal" data-financialprogress="{{$financial_progress}}" data-projecttitle="{{$projecttitle}}" data-Districts="{{$Districts}}" data-GS="{{$GS}}" data-Sub_Sectors="{{$Sub_Sectors}}" data-Original_Approve_Cost="{{$Original_Approve_Cost}}" data-Utilized_Cost="{{$Utilized_Cost}}" data-dateplnstrt="{{$dateplnstrt}}" data-dateplnend="{{$dateplnend}}" data-dateactulstrt="{{$dateactulstrt}}" data-Planned_Progress="{{$Planned_Progress}}" data-physical_progress_against_total_release_date="{{$physical_progress_against_total_release_date}}" data-OverAll_Progress="{{$Overall_Progress}}" data-Physical_Progress="{{$Physical_Progress}}" data-target="#myModal" style="margin-top:9%">+</button>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog col-md-11">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Project Summary</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="bg-w border_top bg-w text-left" style="padding:0% 0% 0.5% 1% !important;">
                                            <style scoped>
                                                .form-group {
                                                    margin-bottom: 0rem !important;
                                                    border: none !important;
                                                    background-color: transparent !important;
                                                }

                                                .form-group {
                                                    padding: 0.05rem 0.75rem !important;
                                                }

                                                .col,
                                                .col-1,
                                                .col-10,
                                                .col-11,
                                                .col-12,
                                                .col-2,
                                                .col-3,
                                                .col-4,
                                                .col-5,
                                                .col-6,
                                                .col-7,
                                                .col-8,
                                                .col-9,
                                                .col-auto,
                                                .col-lg,
                                                .col-lg-1,
                                                .col-lg-10,
                                                .col-lg-11,
                                                .col-lg-12,
                                                .col-lg-2,
                                                .col-lg-3,
                                                .col-lg-4,
                                                .col-lg-5,
                                                .col-lg-6,
                                                .col-lg-7,
                                                .col-lg-8,
                                                .col-lg-9,
                                                .col-lg-auto,
                                                .col-md,
                                                .col-md-1,
                                                .col-md-10,
                                                .col-md-11,
                                                .col-md-12,
                                                .col-md-2,
                                                .col-md-3,
                                                .col-md-4,
                                                .col-md-5,
                                                .col-md-6,
                                                .col-md-7,
                                                .col-md-8,
                                                .col-md-9,
                                                .col-md-auto,
                                                .col-sm,
                                                .col-sm-1,
                                                .col-sm-10,
                                                .col-sm-11,
                                                .col-sm-12,
                                                .col-sm-2,
                                                .col-sm-3,
                                                .col-sm-4,
                                                .col-sm-5,
                                                .col-sm-6,
                                                .col-sm-7,
                                                .col-sm-8,
                                                .col-sm-9,
                                                .col-sm-auto,
                                                .col-xl,
                                                .col-xl-1,
                                                .col-xl-10,
                                                .col-xl-11,
                                                .col-xl-12,
                                                .col-xl-2,
                                                .col-xl-3,
                                                .col-xl-4,
                                                .col-xl-5,
                                                .col-xl-6,
                                                .col-xl-7,
                                                .col-xl-8,
                                                .col-xl-9,
                                                .col-xl-auto {
                                                    padding-left: 0px !important;
                                                    padding-right: 0px !important;
                                                }

                                                label {
                                                    margin-bottom: 0rem !important;
                                                    border: none !important;
                                                    background-color: transparent !important;
                                                    padding: 0rem 0.3rem !important;
                                                    /* font-size: 12px !important; */
                                                    font-size: inherit;
                                                }

                                                .font-18 {
                                                    font-size: 18px !important;
                                                }

                                                .fontf_sh {
                                                    font-size: 14px !important;
                                                    font-weight: 600 !important;
                                                }

                                                /* .progress-bar{color: #000 !important;} */
                                                .progress-bar-success {
                                                    background-color: #007b1b;
                                                }

                                                .progress {
                                                    background: #6967674f !important;
                                                }

                                                .pdz_six {
                                                    padding: 0% 6% !important;
                                                }

                                                .topsummaryinput {
                                                    font-size: 14px !important;
                                                    padding: 0px !important;
                                                    font-weight: 600 !important;
                                                    border: none !important;
                                                    color: #1e2d52 !important;
                                                    max-width: 115px !important
                                                }

                                                @media only screen and (max-width: 1024px) {
                                                    .topSummary {
                                                        margin-top: -4% !important;
                                                        z-index: 999;
                                                        margin-left: -4% !important;
                                                    }
                                                }
                                            </style>
                                            <div class="col-md-12 text-center">
                                                <center>
                                                    <b class="primarybold mb_1 font-18">
                                                        <span>Project Title</span> <span class=""> :</span>
                                                        <span class="black" id="modal-projecttitle"></span>
                                                    </b>
                                                </center>
                                            </div>
                                            <div class="col-md-12 ln_ht12 text-center">
                                                <b for="project_cost" class="">Districts: </b>
                                                <span class="black" id="modal-districts"></span>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <p for="GS_no" class=" mb_1"><span class="fontf_sh">GS #: </span><span id="modal-gs"></span></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="gestation Period" class=" mb_1 ">
                                                        <span title="Gestation Period" class="fontf_sh">Sub-Sectors: </span>
                                                        <span id="modal-sub_sectors"></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 ln_ht12">
                                                    <p for="project_cost" class=" mb_1 "><span class="fontf_sh">Original Approve Cost:</span>
                                                        <span id="modal-original_approve_cost"><small>Million</small></span></p>
                                                </div>

                                                <div class="col-md-3 ln_ht12">
                                                    <p for="Location" class=" mb_1 "><span class="fontf_sh">Utilized Cost:</span>

                                                        <span id="modal-utilized_cost">Million</span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="planned_start_date" class=" mb_1 "><span class="fontf_sh">Planned Start Date: </span>
                                                        <span id="modal-dateplnstrt">

                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="planned_end_date" class=" mb_1"><span class="fontf_sh">Planned End Date: </span>
                                                        <span id="modal-dateplnend">

                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="actual_start_date" class=" mb_1"><span class="fontf_sh">Actual Start Date: </span>
                                                        <span id="modal-dateactulstrt">

                                                        </span>
                                                    </p>
                                                </div>

                                                <div class="col-md-3 ln_ht12">
                                                    <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Planned Progress %: </span>

                                                        <span class="pdz_six" id="modal-planned_progress"></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Financial Progress %:</span>
                                                        <span class="pdz_six" id="modal-financialprogress"></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Over-All Progress %:</span>
                                                        <span class="pdz_six" id="modal-overall_progress"></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 ln_ht12">
                                                    <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Physical Progress %: </span>
                                                        <span class="pdz_six" id="modal-physical_progress"></span>
                                                        <br /><small>(against Total Releases To Date)</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
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
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
<!-- <script>
    $(document).ready(function() {
        $('.assignExecBtn').click(function() {

            $(this).parent().parent().next().toggle("slow");
            if ($(this).text() == '+') {
                $(this).removeClass('btn-primary').addClass('btn-danger')
                $(this).text('-');
            } else {
                $(this).text('+');
                $(this).removeClass('btn-danger').addClass('btn-primary')
            }
        });
    });
</script> -->
<script>
    var ATTRIBUTES = ['projecttitle', 'districts','financialprogress',
     'gs', 'sub_sectors', 'original_approve_cost', 'utilized_cost', 'dateplnstrt', 'dateplnend', 'dateactulstrt', 'planned_progress', 'physical_progress_against_total_release_date', 'overall_progress', 'physical_progress'];
    $('[data-toggle="modal"]').on('click', function(e) {
        // convert target (e.g. the button) to jquery object
        var $target = $(e.target);
        // modal targeted by the button
        var modalSelector = $target.data('target');
        // iterate over each possible data-* attribute
        ATTRIBUTES.forEach(function(attributeName) {
            // retrieve the dom element corresponding to current attribute
            var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
            var dataValue = $target.data(attributeName);
            console.log(attributeName + ': ',
                dataValue)
            // if the attribute value is empty, $target.data() will return undefined.
            // In JS boolean expressions return operands and are not coerced into
            // booleans. That way is dataValue is undefined, the left part of the following
            // Boolean expression evaluate to false and the empty string will be returned
            $modalAttribute.text(dataValue || '');
        });
    });
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection