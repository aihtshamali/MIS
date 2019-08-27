@extends('_Monitoring.layouts.upperNavigation')
@section('title')
Monitoring | Assigned To Executive
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

  td a {
    color: #01a9ac !important;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card z-depth-5">
      <div class="card-header">
        <h4><b>Chairman - Monitoring Projects (Assigned by DPM)</b></h4>
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
                  <th>Assign</th>

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
                    <a class="hovsky float-right" style="color: #4f5c5f9e; font-size:36px !important;">
                      <!-- <center><i class="fas fa-address-card"></i></center> -->
                      <button class="assignExecBtn btn btn-primary btn-sm" style="margin-top:9%">+</button>
                    </a>
                  </td>
                  @endif
                </tr>
                <tr class="nodisplay assignExecDiv" style="background-color:aliceblue">
                  <td colspan="8">
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
                            <span class="black"></span>
                          </b>
                        </center>
                      </div>
                      <div class="col-md-12 ln_ht12 text-center">
                        <b for="project_cost" class=""><span>Districts: </span></b><span>

                        </span>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-3">
                          <p for="GS_no" class=" mb_1"><span class="fontf_sh">GS #: </span><span></span></p>
                        </div>
                        <div class="col-md-3">
                          <p for="gestation Period" class=" mb_1 ">
                            <span title="Gestation Period" class="fontf_sh">Sub-Sectors: </span>
                            <span>

                            </span>
                          </p>
                        </div>
                        <div class="col-md-3 ln_ht12">
                          <p for="project_cost" class=" mb_1 "><span class="fontf_sh">Original Approve Cost:</span>
                            <span><small>Million PKR</small></span></p>
                        </div>

                        <div class="col-md-3 ln_ht12">
                          <p for="Location" class=" mb_1 "><span class="fontf_sh">Utilized Cost:</span>

                            <small>Million PKR</small>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="planned_start_date" class=" mb_1 "><span class="fontf_sh">Planned Start Date: </span>
                            <span>

                            </span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="planned_end_date" class=" mb_1"><span class="fontf_sh">Planned End Date: </span>
                            <span>

                            </span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="actual_start_date" class=" mb_1"><span class="fontf_sh">Actual Start Date: </span>
                            <span>

                            </span>
                          </p>
                        </div>

                        <div class="col-md-3 ln_ht12">
                          <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Planned Progress %: </span>

                            <span class="pdz_six" id="PlannedProg"></span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Financial Progress:</span>
                            <span class="pdz_six" id="financialprog">{</span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Over-All Progress:</span>
                            <span class="pdz_six" id="">{</span>
                          </p>
                        </div>
                        <div class="col-md-3 ln_ht12">
                          <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Physical Progress: </span>
                            <span class="pdz_six" id="Physicalprog">{</span>
                            <br /><small>(against Total Releases To Date)</small>
                          </p>
                        </div>
                      </div>
                  </td>

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
<script>
  $(document).ready(function() {
    $('.assignExecBtn').click(function() {

      $(this).parent().parent().parent().next().toggle("slow");
      if ($(this).text() == '+') {
        $(this).removeClass('btn-primary').addClass('btn-danger')
        $(this).text('-');
      } else {
        $(this).text('+');
        $(this).removeClass('btn-danger').addClass('btn-primary')
      }
    });
  });
</script>
@endsection