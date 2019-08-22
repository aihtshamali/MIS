@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<style media="screen">
  .pcoded .pcoded-navbar .pcoded-item {
    width: 100% !important;
  }

  .header-content {
    padding: 10px;
  }

  table.projects tr {
    transition: all 900ms ease;
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

  .nodisplay {
    display: none;
  }
</style>
@section('content')
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
                  <td>{{$project->Project->title}}</td>
                  <td>
                    @foreach ($project->AssignedProjectTeam as $team)
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
                    @if(isset($project->MProjectProgress) && count($project->MProjectProgress))
                    <form action="{{route('CharimanProjectAssignToDC')}}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="project_id" value="{{$project->Project->id}}">
                      <input type="submit" class="btn btn-info btn-sm" value="Assign to Executive">
                    </form>
                    <button class="assignExecBtn btn btn-primary btn-sm" style="margin-top:9%">+</button>
                    @endif
                  </td>
                </tr>
                @if(isset($project->MProjectProgress) && count($project->MProjectProgress))
                <tr class="nodisplay assignExecDiv" style="background-color:aliceblue">
                  <td colspan="7">
                    <div class="bg-w border_top bg-w" style="padding:0% 0% 0.5% 1% !important;">
                      <div class="col-md-12">
                        <center>
                          <b class="primarybold mb_1 font-18">
                            <span>Project Title</span> <span class=""> :</span>
                            <span class="black">{{$project->Project->title}}</span>
                          </b>
                        </center>
                      </div>
                      <div class="col-md-12 ln_ht12">
                        <b for="project_cost" class=""><span>Districts: </span></b><span>
                          @foreach ($project->Project->AssignedDistricts as $district)
                          {{$district->District->name}},
                          @endforeach
                        </span>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-3">
                          <p for="GS_no" class=" mb_1"><span class="fontf_sh">GS #: </span><span>{{$project->Project->ADP}}</span></p>
                        </div>
                        <div class="col-md-3">
                          <p for="gestation Period" class=" mb_1 ">
                            <span title="Gestation Period" class="fontf_sh">Sub-Sectors: </span>
                            <span>
                              @foreach ($project->Project->AssignedSubSectors as $sub_sector)
                              {{$sub_sector->SubSector->name}}
                              @endforeach
                            </span>
                          </p>
                        </div>
                        <div class="col-md-3 ln_ht12">
                          <p for="project_cost" class=" mb_1 "><span class="fontf_sh">Original Approve Cost:</span>
                            <span>{{round($project->Project->ProjectDetail->orignal_cost,3)}}<small>Million PKR</small></span></p>
                        </div>

                        <div class="col-md-3 ln_ht12">
                          <p for="Location" class=" mb_1 "><span class="fontf_sh">Utilized Cost:</span>
                            @if($project->MProjectProgress->last()->MProjectCost)
                            {{round($project->MProjectProgress->last()->MProjectCost->utilization_against_releases,3)}}
                            @else
                            0
                            @endif
                            <small>Million PKR</small>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="planned_start_date" class=" mb_1 "><span class="fontf_sh">Planned Start Date: </span>
                            <span>
                              @php
                              $originalDate=$project->Project->ProjectDetail->planned_start_date;
                              $date = date("d-M-Y", strtotime($originalDate));
                              // echo $date;
                              @endphp
                              {{$date}}
                            </span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="planned_end_date" class=" mb_1"><span class="fontf_sh">Planned End Date: </span>
                            <span>
                              @php
                              $originalDate=$project->Project->ProjectDetail->planned_end_date;
                              $date = date("d-M-Y", strtotime($originalDate));
                              // echo $date;
                              @endphp
                              {{$date}}
                            </span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="actual_start_date" class=" mb_1"><span class="fontf_sh">Actual Start Date: </span>
                            <span>
                              @if(isset($project->MProjectProgress->last()->MProjectDate))
                              @php
                              $originalDate=$project->MProjectProgress->last()->MProjectDate->actual_start_date;
                              $date = date("d-M-Y", strtotime($originalDate));
                              // echo $date;
                              @endphp
                              {{$date}}

                              @endif
                            </span>
                          </p>
                        </div>

                        <div class="col-md-3 ln_ht12">
                          <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Planned Progress %: </span>
                            <span class="pdz_six" id="PlannedProg">{{round(calculatePlannedProgress($project->MProjectProgress->last()->id),2)}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Financial Progress:</span>
                            <span class="pdz_six" id="financialprog">{{round(calculateMFinancialProgress($project->MProjectProgress->last()->id),2)}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">All Progress:</span>
                            <span class="pdz_six" id="">{{round(calculateTotalMPhysicalProgress($project->MProjectProgress->last()->id),2)}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3 ln_ht12">
                          <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Physical Progress: </span>
                            <span class="pdz_six" id="Physicalprog">{{round(calculateMPhysicalProgress($project->MProjectProgress->last()->id),2)}}%</span>
                            <br /><small>(against Total Releases To Date)</small>
                          </p>
                        </div>
                      </div>
                  </td>
                </tr>
                @endif
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
<script>
  $(document).ready(function() {
    $('.assignExecBtn').click(function() {
      console.log('add')
      $(this).parent().parent().next().toggle(1000);
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