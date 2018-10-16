@extends('layouts.uppernav')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    NEW ASSIGNED MONITORING PROJECTS <button class="btn btn-danger" style="color:white;font-weight:bold font-size:20px;"></button>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
    </ol>
  </section>

  {{-- content body --}}

  <section class="content">
        {{-- row 1 --}}
  
        <div class="row">
          <div class="col-md-12 col-xs-12" ></div>
          <div class="col-md-12 col-xs-12" >
              <div class="box box-warning">
  
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
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
                              <th style="text-align:center;">Priority</th>
                              <th style="text-align:center;">Action</th>
                          </thead>
                          <tbody style="text-align:center;">
  
                              {{-- @foreach($officer as $o) --}}
                              <tr>
                              <td>
                                dummy
                                {{-- {{$o->project->project_no}} --}}
                               </td>
                              <td>
                                dummy
                                {{-- {{$o->project->title}}   --}}
                              </td>
  
                              <td>
                                dummy
                                {{-- {{$o->getassignedperson($o->assigned_by)->first_name}} {{$o->getassignedperson($o->assigned_by)->last_name}}</td> --}}
                              <td>
                                dummy
                                {{-- @if ($o->priority==3)
                                  High
                                @elseif ($o->priority==2)
                                  Normal
                                @else
                                  Low
                                @endif --}}
                              </td>
                                {{-- <input type="hidden" name="id" value="{{$o->id}}">  --}}
                            <td><a href="{{route('Monitoring_inprogressAssignments')}}"><button class="btn btn-success">Review</button></a> </td>
                              </tr>
                              {{-- @endforeach --}}
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
  