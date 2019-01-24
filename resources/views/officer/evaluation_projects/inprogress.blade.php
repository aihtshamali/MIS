@extends('layouts.uppernav')

@section('content')


<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
        In-Progress Evaluations Projects
         <span class="label label-danger">{{$officer->count()}}</span>
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
        <!-- <div class="col-md-1 col-xs-2" ></div> -->
        <div class="col-md-10" >
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
               <div class="row" >
                <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                        <thead >
                            <th style="text-align:center;" >Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Assigned By</th>
                            <th style="text-align:center;">Project Priority</th>
                            <th style="text-align:center;">Project Score</th>
                            <th style="text-align:center;">Assigned Duration</th>
                            <th style="text-align:center;">SNE</th>
                            <th style="text-align:center;">Global Progress</th>
                            <th style="text-align:center;">Actions</th>

                        </thead>
                        <tbody style="text-align:center; font-size:16px;">
                          {{-- {{dd($officer)}} --}}
                          @foreach($officer as $o)
                          <tr>

                            <td> {{$o->project->project_no}} </td>
                            <td><a href="{{route('evaluation_activities',$o->project_id)}}">{{$o->project->title}}</a> </td>
                            <td>{{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</td>
                            <td>
                              {{ $o->project->ProjectDetail->AssigningForum->name }}
                            </td>
                            <td>
                              {{ round($o->project->score,2,PHP_ROUND_HALF_UP) }}
                            </td>
                            <td>
                              @php
                                $interval = date_diff(date_create(date('Y-m-d h:i:s',strtotime($o->created_at))), date_create(date('Y-m-d h:i:s')))->format('%m Month %d Day %h Hours');
                                // $duration=$interval->format();
                              @endphp
                              {{-- {{$assigned->created_at}} --}}
                              {{$interval}}
                            </td>
                            <td>
                              @if ($o->project->ProjectDetail->sne)
                                {{ $o->project->ProjectDetail->sne }}
                              @else
                                <span style="color:red">Not Added</span>
                              @endif
                            </td>
                            <td>

                                <div class="progress">
                                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $o->progress; ?>% ">
                                    {{round($o->progress, 0, PHP_ROUND_HALF_UP) }}% Complete
                                    </div>

                                  </div>
                            </td>
                            <td>
                              <a href="{{route('projects.edit',$o->project_id)}}" class="btn btn-primary" style="margin-bottom:3px;">Review Project</a></br>
                            </td>

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
        <div class="col-md-1 col-xs-2" ></div>
       </div>


    </section>
</div>
@endsection
