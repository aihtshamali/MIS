@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('_monitoring/css/pages/data-table/css/buttons.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}" />
<style media="screen">
    .pcoded .pcoded-navbar .pcoded-item{width: 100% !important;}
        .header-content{
          padding:10px;
        }
        table.projects th , td{
          text-align: center !important;
        }
        .veryHigh{
          height: 100%;
        }
        .parent {
          overflow: hidden;
          position: relative;
          width: 100%;
        }
        .priority{
          /* background: #fff; */
       opacity: .4;
       color:black;
       font-weight: bold;
        }
        .child-right {
          background:green;
          height: 100%;
          width: 50%;
          position: absolute;
          right: 0;
          top: 0;
        }
.table.dataTable td, .table.dataTable th {
         text-align:LEFT !important;
    font-size: 12px !important;
          }
           .highlight_sector{
       background:lightblue; 
       padding : 3px;

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
                <div class="card-block">
                        <div class="dt-responsive table-responsive">
                                 <table id="example1" data-page-length="100" 
                                class="table table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Project #</th>
                                <th>Project Name</th>
                                <th>Assigned To</th>
                                <th>Departments</th>
                                <th>Cost</th>
                                 <th>Project Score</th>
                               <th>Assigning Forum</th>
                                <th>Project Type</th>
                                {{-- <th>Action</th> --}}

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->Project->project_no}}</td>
                                    <td style="width:25% !important ;">{{$project->Project->title}}</td>
                                    <td  style="width:17% !important ;">
                                        @foreach ($project->AssignedProjectTeam as $team)
                                        @if ($team->team_lead==1)
                                            <span style="font-weight:bold;color:blue">{{$team->User->first_name}}  {{$team->User->last_name}} -</span>
                                        @else
                                            <span class="">{{$team->User->first_name}} {{$team->User->last_name}}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                      <span class="highlight_sector">
                                            @foreach ($project->Project->AssignedSubSectors as $item)
                                          <b>{{$item->SubSector->sector->name}}</b>
                                          @endforeach
                                       </span>
                                      <hr>
                                      <ul>
                                        @foreach ($project->Project->AssignedSubSectors as $item)
                                            <li>{{$item->SubSector->name}}</li> 
                                        @endforeach
                                      </ul>
                                    </td>
                                    <td>
                                      {{round($project->Project->ProjectDetail->orignal_cost,3,PHP_ROUND_HALF_UP) }} Millions
                                    </td>
                                    <td>{{round($project->Project->score,3,PHP_ROUND_HALF_UP) }}</td>
                                    <td>{{ $project->Project->ProjectDetail->AssigningForum->name }}</td>
                                     <td>{{$project->Project->ProjectType->name}}</td>
                                </tr>
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
                            @php
                            $planned_progress = round(calculatePlannedProgress($project->MProjectProgress->last()->id),2);
                            $financial_progress = round(calculateMFinancialProgress($project->MProjectProgress->last()->id),2);
                            $physical_progress_against_total_cost = round(calculateTotalMPhysicalProgress($project->MProjectProgress->last()->id),2);
                            $physical_progress_against_total_release_date = round(calculateMPhysicalProgress($project->MProjectProgress->last()->id),2);
                            @endphp
                            <span class="pdz_six" id="PlannedProg">{{$planned_progress}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Financial Progress:</span>
                            <span class="pdz_six" id="financialprog">{{$financial_progress}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p for="" name="f_progress" id="f_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Over-All Progress:</span>
                            <span class="pdz_six" id="">{{$physical_progress_against_total_cost}}%</span>
                          </p>
                        </div>
                        <div class="col-md-3 ln_ht12">
                          <p for="" name="phy_progress" id="phy_progress" class="primarybold mb_1"><span class="float-left fontf_sh">Physical Progress: </span>
                            <span class="pdz_six" id="Physicalprog">{{$physical_progress_against_total_release_date}}%</span>
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
<script src="{{asset('_monitoring/js/datatables.net/js/jszip.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/pdfmake.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>

<script>
 $('#example1').DataTable( {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );
</script>

@endsection
