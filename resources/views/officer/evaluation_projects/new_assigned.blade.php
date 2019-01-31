@extends('layouts.uppernav')

@section('content')


<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
         Assigned Evaluations Projects
         @if($officer->count())
         <span class="label label-danger">{{$officer->count()}}</span>
         @endif
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

        </ol>
    </section>

    {{-- <!-- Main content --> --}}
    <section class="content">
      {{-- row 1 --}}

      <div class="row">
        <div class="col-md-12 col-xs-12" ></div>
        <div class="col-md-12 col-xs-12" >
            <div class="box box-warning">

              <div class="box-header with-border">
                <h3 class="box-title"></h3>

                {{--  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>

                </div>  --}}
              </div>
              <div class="box-body">
               <div class="row" >
                <div class="col-md-12 col-xs-12">

                    <div class="table-responsive">


                      <table class="table table-hover table-striped">
                        <thead >
                            <th style="text-align:center;" >Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Assigned By</th>
                            <th style="text-align:center;">Assigning Date</th>
                            <th style="text-align:center;">Re-Assigned</th>
                            <th style="text-align:center;">Priority</th>
                            <th style="text-align:center;">Score</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody style="text-align:center;">

                            @foreach($officer as $o)
                            <tr>
                            <td> {{$o->project->project_no}} </td>
                            <td>{{$o->project->title}}  </td>
                            @if(($o->getassignedperson($o->assigned_by))->hasRole("directorevaluation"))
                            <td><span style="background-color:#E8971E; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @elseif(($o->getassignedperson($o->assigned_by))->hasRole("directormonitoring"))
                            <td><span style="background-color:#7906A1; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @elseif(($o->getassignedperson($o->assigned_by))->hasRole("manager"))
                            <td><span style="background-color:#B20013; padding:5px; margin:px; color:white; font-weight:bold">{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</span></td>
                            @endif
                            <td>{{date('d M Y',strtotime($o->assigned_date))}}</td>
                            @if(isset($o->AssignedProjectTeamLog[0]->id))
                            @php 
                              $project='';
                            @endphp
                            <td>
                            @foreach($o->AssignedProjectTeamLog as $team_log)
                              @if($project!=$team_log->assigned_project_id)
                                {{date('d M Y, H:i:s',strtotime($team_log->created_at))}},
                                @php $project=$team_log->assigned_project_id; @endphp
                              @endif
                            @endforeach
                            </td>
                            @else
                            <td>Nil</td>
                            @endif
                            <td>
                              {{ $o->project->ProjectDetail->AssigningForum->name }}
                            </td>
                            <td>{{ round($o->project->score,2,PHP_ROUND_HALF_UP) }}</td>
                              <input type="hidden" name="id" value="{{$o->id}}">
                              <td><a href="{{route('review_form',$o->project_id)}}"><button class="btn btn-success">Review</button></a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                    </div>

                      </div>
               </div>
              </div>
          </div>
        </div>
        <div class="col-md-2 col-xs-2" ></div>
       </div>


    </section>
</div>
@endsection
