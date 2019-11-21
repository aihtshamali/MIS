@extends('layouts.uppernav')
@section('styletag')
  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/charts/export.css')}}" type="text/css" media="all" />
<style>
    #chartdiv {
  width		: 100%;
  height		: 80%;
  font-size	: 15px;
  }
  .card{
  /* width:250px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  -moz-box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  box-shadow: 11px 15px 42px 3px rgba(0,0,0,0.38);
  }
  .card-header{
  height:5%;
  text-align: center;
  }
  .total_bar{
    font-size: 0px;
    background-color: #333;
    padding: 9px;
    margin: 2px;
    color:#0D8ECF;
  }
  .unassigned_bar{
    font-size: 0px;
    background-color:#5982ff;
    padding: 9px;
    margin: 2px;
    color:#0D52D1;
  }
  .inprogress_bar{
    font-size: 0px;
    background-color:#ffbf59;
    padding: 9px;
    margin: 2px;
    color:#2A0CD0;
  }
  .completed_bar{
    color:#70dc70;
    font-size: 0px;
    background-color:#70dc70;
    padding: 9px;
    margin: 2px;

  }
  .stopped_bar{
    color:#ff4f5a;
    font-size: 0px;
    background-color:#ff4f5a;
    padding: 9px;
    margin: 2px;
  }
  .card-footer{
  height:15%;

  }
  a{
  color: black;
  }

  .card:hover{
  /* width:357px; */
  background:white;
  margin: 0px;
  border-radius: 5px;
  height: 100%;
  -webkit-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  -moz-box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  box-shadow: 11px 15px 42px 19px rgba(169,200,217,1);
  }
  .inprogress{
    background:#ffbf59;
    padding: 8px;
    /* vertical-align: middle; */
  }
  .stopped{
    background: #ff4f5a;
        padding: 8px;
  }
  .completed{
    background: #70dc70;
        padding: 8px;
  }
  .notAssigned{
    background: #5982ff;
        padding: 8px;
        color:white;
  }
   .table.dataTable td, .table.dataTable th {
         
    font-size: 14px !important;
    vertical-align: middle !important;
    /* text-align: center !important; */
    }
     .highlight{
       background:#eccd93; 
       /* margin-top:5%; */
       padding-top : 3px;
        padding-bottom : 3px;
         padding-right : 10px;
          padding-left : 10px;

    }
</style>

@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <b>Evaluation Total Projects</b>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{route('Exec_pems_tab')}}"><i class="fa fa-backward" ></i>Back</a></li>
        </ol>
    </section>

    <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card col-md-12" >
                        <div id="chartdiv"></div>
                        <div class="card-footer" >
                            <div style="padding:5px;display:inline-block;">
                              <span class="total_bar">-</span>
                              <label style="vertical-align:-webkit-baseline-middle;">{{count($total_projects)}} Total Projects</label>
                            </div>
                          <div style="padding:5px; display:inline-block;">
                              <span class="unassigned_bar">-</span>
                              <label style="vertical-align:-webkit-baseline-middle;">{{$total_unassigned_projects}} Total Un-Assigned Projects</label>
                          </div>
                          <div style="padding:5px; display:inline-block;">
                                  <span class="inprogress_bar">-</span>
                                  <label style="vertical-align:-webkit-baseline-middle;">{{$inprogress_projects}} Total InProgress Projects</label>
                              </div>
                          <div style="padding:5px; display:inline-block;">
                                  <span class="completed_bar">-</span>
                                  <label style="vertical-align:-webkit-baseline-middle;">{{$completed_projects}} Completed Projects</label>
                              </div>
                              <div style="padding:5px; display:inline-block;">
                                  <span class="stopped_bar">-</span>
                                  <label style="vertical-align:-webkit-baseline-middle;">{{$stopped_projects}} Stopped Projects</label>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <!-- Modal -->
        <div class="modal fade in" id="myModal" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title"><b>TOTAL EVALUATION PROJECTS</b>
                    <button class="btn btn-sm btn-primary" style="color:white;font-weight:bold font-size:20px;">@if(isset($total_projects)){{$total_projects->count()}}@endif</button>
                  </h4>

              </div>
              <div class="modal-body">
                    <table id="chart1" data-page-length="100" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>SR #</th>
                        <th>Project No</th>
                        <th>GS #</th>
                        <th>Name</th>
                        <th>Sector</th>
                        <th>Cost</th>
                        <th>SNE</th>
                        <th >Officer</th>
                        <th >Status</th>
                      </tr>
                      </thead>
                      <tbody id="tbody">
                        @php
                          $counter = 1;
                        @endphp
                        @foreach ($total_projects as $total_project)
                          <tr>
                            <td>{{$counter++ }}</td>
                            <td>{{$total_project->project_no}}</td>
                            <td>{{$total_project->financial_year}} <br> ({{$total_project->ADP}})</td>
                            <td style="text-align:LEFT !important;width:25% !important; ">{{$total_project->title}}</td>
                            <td style="text-align:LEFT !important;width:17% !important; ">
                                <span><b>{{$total_project->AssignedSubSectors[0]->SubSector->sector->name}}</b></span><br>
                              @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }} <br>
                              @endforeach
                              
                            <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}} <br> Millions</td>
                            </td>
                            <td>{{$total_project->ProjectDetail->sne}}</td>
                            <td style="text-align:LEFT !important; ">
                              @if($total_project->AssignedProject)
                                @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                  @if ($team->team_lead==1) 
                                  <span style="color:red;">
                                <b> {{$team->user->first_name}} {{$team->user->last_name}}</b><br>
                                  </span>
                                @else
                                  {{$team->user->first_name}} {{$team->user->last_name}}
                                    <br>
                                  @endif
                                @endforeach
                                @else
                                <span class="notAssigned"> Not Assigned</span>
                                @endif
                            </td>
                            <td>
                                @if($total_project->AssignedProject)
                                  @if ($total_project->AssignedProject->complete == 0 && $total_project->AssignedProject->stopped == 0)
                                    <span class="inprogress">
                                      InProgress
                                    </span>  
                                    @elseif($total_project->AssignedProject->stopped == 1)
                                        <span class="stopped">
                                          Stopped</span> 
                                    @elseif($total_project->AssignedProject->complete == 1 && $total_project->AssignedProject->stopped == 0)
                                      <span class="completed">
                                        Completed</span>
                                      @endif
                                  @else
                                    <span class="notAssigned">
                                    Not Assigned 
                                    </span>
                                    @endif
                                </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade in" id="myModal1" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
               <h4 class="modal-title"><b>TOTAL EVALUATION UNASSIGNED PROJECTS</b>
                    <button class="btn btn-sm btn-primary" style="color:white;font-weight:bold font-size:20px;">@if(isset($total_unassigned_projects)){{$total_unassigned_projects}}@endif</button>
                  </h4>
              </div>
              <div class="modal-body">
                    <table id="chart2" data-page-length="100" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                        <th>SR #</th>
                          <th>Project No</th>
                          <th>GS #</th>
                          <th>Name</th>
                          <th>Sector</th>
                          <th>Cost</th>
                          <th>SNE</th>
                          <th >Officer</th>
                          <th >Status</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @php
                          $counter = 1;
                        @endphp
                        @foreach ($actual_total_assigned_projects as $total_project)
                          <tr>
                            <td>{{$counter++ }}</td>
                            <td>{{$total_project->project_no}}</td>
                            <td>{{$total_project->financial_year}} <br> ({{$total_project->ADP}})</td>
                            <td style="text-align:LEFT !important;width:25% !important; ">{{$total_project->title}}</td>
                            <td>
                                <span><b>{{$total_project->AssignedSubSectors[0]->SubSector->sector->name}}</b></span><br>
                              @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }} <br>
                              @endforeach
                              
                            <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}} <br> Millions</td>
                            </td>
                            <td>{{$total_project->ProjectDetail->sne}}</td>
                            <td style="text-align:LEFT !important; ">
                              @if($total_project->AssignedProject)
                                @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                  @if ($team->team_lead==1) 
                                  <span style="color:red;">
                                <b> {{$team->user->first_name}} {{$team->user->last_name}}</b><br>
                                  </span>
                                @else
                                  {{$team->user->first_name}} {{$team->user->last_name}}
                                    <br>
                                  @endif
                                @endforeach
                                @else
                                <span class="notAssigned"> Not Assigned</span>
                                @endif
                            </td>
                            <td>
                               <span class="notAssigned"> Not Assigned</span>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade in" id="myModal2" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><b>TOTAL EVALUATION INPROGRESS PROJECTS</b>
                    <button class="btn btn-sm btn-primary" style="color:white;font-weight:bold font-size:20px;">@if(isset($inprogress_projects)){{$inprogress_projects}}@endif</button>
                
                </h4>
              </div>
              <div class="modal-body">
                    <table id="chart3" data-page-length="100" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>SR #</th>
                        <th>Project No</th>
                        <th>GS #</th>
                        <th>Name</th>
                        <th>Sector</th>
                        <th>Cost</th>
                        <th>SNE</th>
                        <th>Officer</th>
                        <th>Progress</th>
                        <th >Duration</th>
                      </tr>
                      </thead>
                      <tbody id="tbody">
                        @php
                          $counter = 1;
                        @endphp
                        @foreach ($total_projects as $total_project)
                          @if($total_project->AssignedProject && $total_project->AssignedProject->complete == 0 && $total_project->AssignedProject->stopped == 0)
                          <tr>
                            <td>{{$counter++ }}</td>
                            <td >{{$total_project->project_no}}</td>
                            <td >{{$total_project->financial_year}} <br> ({{$total_project->ADP}})</td>
                            <td style="text-align:LEFT !important;width:20% !important; ">{{$total_project->title}}</td>
                            <td style="text-align:LEFT !important;width:17% !important; ">
                                <span><b>{{$total_project->AssignedSubSectors[0]->SubSector->sector->name}}</b></span><br>
                              @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }} <br>
                              @endforeach
                              
                            <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}} <br> Millions</td>
                            </td>
                            <td>{{$total_project->ProjectDetail->sne}}</td>
                            <td style="text-align:LEFT !important; ">
                              @if($total_project->AssignedProject)
                                @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                  @if ($team->team_lead==1) 
                                  <span style="color:red;">
                                <b> {{$team->user->first_name}} {{$team->user->last_name}}</b><br>
                                  </span>
                                @else
                                  {{$team->user->first_name}} {{$team->user->last_name}}
                                    <br>
                                  @endif
                                @endforeach
                                @else
                                <span class="notAssigned"> Not Assigned</span>
                                @endif
                            </td>
                            <td>
                              @if($total_project->AssignedProject->progress <= 0)
                              <span class="stopped">
                                {{round($total_project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                              </span>
                              @elseif($total_project->AssignedProject->progress > 0 && $total_project->AssignedProject->progress <= 80)
                              <span class="inprogress">
                                {{round($total_project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                              </span>
                              @else
                               <span class="completed">
                                {{round($total_project->AssignedProject->progress,2,PHP_ROUND_HALF_UP)}}%
                              </span>
                              @endif 
                              
                            </td>
                            <td style="width:15% !important;">
                                <b>Start Date :</b> 
                                {{date('d-M-y',strtotime($total_project->AssignedProject->assigned_date))}} 
                                <br>
                                <b>Last Modified :</b> 
                                {{date('d-M-y',strtotime($total_project->AssignedProject->updated_at))}}
                              <br>
                             
                           <span class="highlight" >
                              @php
                            $first_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->assigned_date)));
                            $current_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->updated_at)));
                            $difference = $current_date->diff($first_date);
                            echo $difference->format('%m months %d days');
                            @endphp
                           </span>
                              {{-- @php
                              $first_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->assigned_date)));
                              $current_date = new DateTime(date('Y-m-d'));
                              $difference = $current_date->diff($first_date);
                              echo $difference->format('%m months %d days');
                              @endphp --}}
                            </td>
                          </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade in" id="myModal3" style="display: block; padding-right: 17px;display:none">
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title"><b>TOTAL EVALUATION COMPLETED PROJECTS</b>
                    <button class="btn btn-sm btn-primary" style="color:white;font-weight:bold font-size:20px;">@if(isset($completed_projects)){{$completed_projects}}@endif</button>

                  </h4>
              </div>
              <div class="modal-body">
                  <table id="chart4" data-page-length="100" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SR #</th>
                      <th>Project No</th>
                      <th>GS #</th>
                      <th>Name</th>
                      <th>Sector</th>
                      <th>Cost</th>
                      <th>SNE</th>
                      <th>Officer</th>
                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                      @php
                        $counter = 1;
                      @endphp
                      @foreach ($total_projects as $total_project)
                      {{-- {{dump($total_project)}} --}}
                        @if($total_project->AssignedProject && $total_project->AssignedProject->complete == 1)
                        <tr>
                          <td>{{  $counter++ }}</td>
                         <td style="width:10% !important;">{{$total_project->project_no}}</td>
                            <td>{{$total_project->financial_year}} <br> ({{$total_project->ADP}})</td>
                            <td style="text-align:LEFT !important;width:20% !important; ">{{$total_project->title}}</td>
                            <td style="text-align:LEFT !important;width:17% !important; ">
                                <span><b>{{$total_project->AssignedSubSectors[0]->SubSector->sector->name}}</b></span><br>
                              @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }} <br>
                              @endforeach
                              
                            <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}} <br> Millions</td>
                            </td>
                            <td>{{$total_project->ProjectDetail->sne}}</td>
                            <td style="text-align:LEFT !important; ">
                              @if($total_project->AssignedProject)
                                @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                  @if ($team->team_lead==1) 
                                  <span style="color:red;">
                                <b> {{$team->user->first_name}} {{$team->user->last_name}}</b><br>
                                  </span>
                                @else
                                  {{$team->user->first_name}} {{$team->user->last_name}}
                                    <br>
                                  @endif
                                @endforeach
                                @else
                                <span class="notAssigned"> Not Assigned</span>
                                @endif
                            </td>
                          <td style="width:15% !important;">
                            <b>Start Date :</b> {{date('d-M-y',strtotime($total_project->AssignedProject->assigned_date))}} <br>
                            <b>End Date :</b> {{date('d-M-y',strtotime($total_project->AssignedProject->completion_date))}} <br>
                           <span class="highlight">
                              @php
                            $first_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->assigned_date)));
                            $current_date = new DateTime(date('Y-m-d',strtotime($total_project->AssignedProject->completion_date)));
                            $difference = $current_date->diff($first_date);
                            echo $difference->format('%m months %d days');
                            @endphp
                           </span>
                          </td>
                        </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade in" id="myModal4" style="display: block; padding-right: 17px;display:none">
            <div class="modal-dialog" style="width:90%">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title"><b>TOTAL EVALUATION STOPPED PROJECTS</b>
                    <button class="btn btn-sm btn-primary" style="color:white;font-weight:bold font-size:20px;">@if(isset($stopped_projects)){{$stopped_projects}}@endif</button>

                  </h4>
                </div>
                <div class="modal-body">
                    <table id="chart5" data-page-length="100" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>SR #</th>
                        <th>Project No</th>
                        <th>GS #</th>
                        <th>Name</th>
                        <th>Sector</th>
                        <th>Cost</th>
                        <th>SNE</th>
                        <th>Officers</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody id="tbody">
                        @php
                          $counter = 1;
                        @endphp
                        @foreach ($total_projects as $total_project)
                        @if($total_project->AssignedProject && $total_project->AssignedProject->stopped == true)
                          <tr>
                             <td>{{  $counter++ }}</td>
                            <td style="width:10% !important;">{{$total_project->project_no}}</td>
                            <td>{{$total_project->financial_year}} <br> ({{$total_project->ADP}})</td>
                            <td style="text-align:LEFT !important;width:20% !important; ">{{$total_project->title}}</td>
                            <td style="text-align:LEFT !important;width:17% !important; ">
                                <span><b>{{$total_project->AssignedSubSectors[0]->SubSector->sector->name}}</b></span><br>
                              @foreach ($total_project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }} <br>
                              @endforeach
                              
                            <td>{{round($total_project->ProjectDetail->orignal_cost,2,PHP_ROUND_HALF_UP)}} <br> Millions</td>
                            </td>
                            <td>{{$total_project->ProjectDetail->sne}}</td>
                            
                            <td style="text-align:LEFT !important; ">
                              @if($total_project->AssignedProject)
                                @foreach ($total_project->AssignedProject->AssignedProjectTeam as $team)
                                  @if ($team->team_lead==1) 
                                  <span style="color:red;">
                                <b> {{$team->user->first_name}} {{$team->user->last_name}}</b><br>
                                  </span>
                                @else
                                  {{$team->user->first_name}} {{$team->user->last_name}}
                                    <br>
                                  @endif
                                @endforeach
                                @else
                                <span class="notAssigned"> Not Assigned</span>
                                @endif
                            </td>
                            <td >
                                @if($total_project->AssignedProject)
                                @if($total_project->AssignedProject->stopped!=null && $total_project->AssignedProject->stopped =1)
                                <span class="stopped">
                                   <b> Stopped</b>
                                  </span> 
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    </section>

</div>
@endsection
@section('scripttags')
{{-- <script src="{{asset('js/AdminLTE/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/dataTables.bootstrap.min.js')}}"></script> --}}
<script src="{{asset('js/charts/amcharts.js')}}"></script>
<script src="{{asset('js/charts/serial.js')}}"></script>
<script src="{{asset('js/charts/fabric.min.js')}}"></script>
<script src="{{asset('js/charts/FileSaver.min.js')}}"></script>
<script src="{{asset('js/charts/jszip.min.js')}}"></script>
<script src="{{asset('js/charts/pdfmake.min.js')}}"></script>
<script src="{{asset('js/charts/export.min.js')}}"></script>
<script src="{{asset('js/charts/dark.js')}}"></script>
<script src="{{asset('js/charts/black.js')}}"></script>
<script src="{{asset('js/charts/chalk.js')}}"></script>
<script src="{{asset('js/charts/light.js')}}"></script>
<script src="{{asset('js/charts/patterns.js')}}"></script>

<script>
$('#chart1,#chart2,#chart3,#chart4,#chart5').DataTable( {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    } );


    var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider": [ {
      "Type": "Total\nProjects\n({{count($total_projects)}})",
      "Number of Projects": total_projects/total_projects*100 ,
      "color": "#333",

    }, {
      "Type": "UnAssigned\nProjects\n({{$total_unassigned_projects}})",
      "Number of Projects": (total_unassigned_projects/total_projects*100).toFixed(2) < 1 && (total_unassigned_projects/total_projects*100).toFixed(2) > 0 ? 1 : (total_unassigned_projects/total_projects*100).toFixed(2),
      "color": "#5982ff"
    }, {
      "Type": "Inprogress\nProjects\n({{$inprogress_projects}})",
      "Number of Projects": (inprogress_projects/total_projects*100).toFixed(2) < 1 && (inprogress_projects/total_projects*100).toFixed(2) > 0 ? 1 : (inprogress_projects/total_projects*100).toFixed(2),
      "color": "#ffbf59"
    }, {
      "Type": "Completed\nProjects\n({{$completed_projects}})",
      "Number of Projects": (completed_projects/total_projects*100).toFixed(2) < 1 && (completed_projects/total_projects*100).toFixed(2) > 0 ? 1 : (completed_projects/total_projects*100).toFixed(2),
      "color": "#70dc70"
    },
    {
      "Type": "Stopped\nProjects\n({{$stopped_projects}})",
      "Number of Projects": (stopped_projects/total_projects*100).toFixed(2) < 1 && (stopped_projects/total_projects*100).toFixed(2) > 0 ? 1 : (stopped_projects/total_projects*100).toFixed(2),
      "color": "#ff4f5a"
    } 
     ],
    "valueAxes": [ {
      "title" : "Percentage",
      "gridColor": "#FFFFFF",
      "gridAlpha": 0.2,
      "dashLength": 0
    } ],
    "gridAboveGraphs": true,
    "startDuration": 1,
    "graphs": [ {
      "balloonText": "[[category]]: <b>[[value]] %</b>",
      "fillAlphas": 0.8,
      "lineAlpha": 0.2,
      "type": "column",
      "labelText": "[[value]] % , [[category]]",
      "fillColorsField": "color",
      "valueField": "Number of Projects"
    } ],
    "chartCursor": {
      "categoryBalloonEnabled": false,
      "cursorAlpha": 0,
      "zoomable": false
    },
    "categoryField": "Type",
    "categoryAxis": {
      "title" : "Project Categories",
      "gridPosition": "middle",
      "gridAlpha": 0,
      "tickPosition": "middle",
      "tickLength": 5,
    //   "labelRotation":30,
      // "ignoreAxisWidth": true,
      "autoWrap": false
    },
    "export": {
      "enabled": true
    }
  } );
</script>
<script type="text/javascript">
$(document).on('click','g',function(){
  var data=$(this).attr('aria-label').split('\n')[0];  
  if(data === " Total")
    $('#myModal').modal('show');
  else if(data === " UnAssigned")
    $('#myModal1').modal('show');
  else if(data === " Inprogress")
    $('#myModal2').modal('show');
  else if(data === " Completed")
    $('#myModal3').modal('show');
    else if(data === " Stopped")
    $('#myModal4').modal('show');

});
</script>
@endsection
