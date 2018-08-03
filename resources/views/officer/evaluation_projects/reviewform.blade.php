@extends('layouts.uppernav')

@section('content')
  <div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
      <h1>Review Report </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('new_evaluation')}}"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
      </ol>
    </section>

    {{-- <!-- Main content --> --}}
    <section class="content">
      {{-- row 1 --}}
      <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-md-12 col-xs-8" >
          <div class="box box-warning ">

            <div class="box-body">
              <div class="row" >
                <div class="col-md-4 ">
                  <b>Project Document :</b>
                  {{$project_data->project_attachements}}
                </div>
                <div class="col-md-4">
                </div>

                <div class="col-md-4">
                  <b>Project Type :</b>
                  {{$project_data->project->EvaluationType->name}}
                </div>
              </div>
              <hr/>
              <div class="row" >

                <div class="col-md-4">
                  <b>Project ID :</b>
                  {{$project_data->project->project_id}}
                  {{$project_data->project->project_no}}
                </div>
                <div class="col-md-4">
                  <b>GS NO :</b>
                  {{$project_data->project->ADP}}
                </div>
                <div class="col-md-4">
                  <b>Project Name :</b>
                  {{$project_data->project->title}}
                </div>
              </div>
              <hr/>

              <div class="row" >

                <div class="col-md-4">
                  <b>Sector :</b>
                  @foreach ($project_data->project->AssignedDepartments as $dpt)
                  {{$dpt->Department->SubSector->Sector->name}}
                  @endforeach
                </div>
                <div class="col-md-4">
                  <b>Sub-Sectors:</b>
                  @foreach ($project_data->project->AssignedDepartments as $dpt)
                  {{$dpt->Department->SubSector->name}}
                  @endforeach

                </div>
                <div class="col-md-4">
                  <b>Department :</b>
                  @foreach ($project_data->project->AssignedDepartments as $dpt)
                  {{$dpt->Department->name}}
                  @endforeach
                </div>

              </div>
              <hr/>

              <div class="row" >
                {{-- {{dd($project_data->projectAssigned)}} --}}
                <div class="col-md-4">
                  <b>Sponsoring Agency(s) :</b>
                  @foreach ($project_data->project->AssignedSponsoringAgencies as $sa)
                    {{$sa->SponsoringAgency->name}}
                  @endforeach
                </div>
                <div class="col-md-4">
                  <b>Executing Agency(s):</b>
                  @foreach($project_data->project->AssignedExecutingAgencies as $ea)
                  {{$ea->ExecutingAgency->name}}
                @endforeach
                </div>
                <div class="col-md-4">
                  <b>District(s) : </b>
                  @foreach($project_data->project->AssignedDistricts as $ad)
                    {{$ad->District->name}}
                  @endforeach
                </div>

              </div>
              <hr/>
              <div class="row" >

                <div class="col-md-4">
                  <b>Approving Forum :</b>
                    {{$project_data->project->ProjectDetail->ApprovingForum->name}}

                </div>
                <div class="col-md-4"></div>

                <div class="col-md-4">
                  <b>Assigning Forum :</b>
                  {{$project_data->project->ProjectDetail->AssigningForum->name}}

                </div>

              </div>
              <hr/>
              <div class="row" >
                <div style="text-align: center;"><h3><b>COST</b></h3></div> </br>
                <div class="col-md-4"><b>Original Approved Cost : </b> {{$project_data->project->ProjectDetail->orignal_cost}} -/{{$project_data->project->ProjectDetail->currency}} </div>

                <div class="col-md-4">

                  @foreach ($project_data->project->RevisedApprovedCost as $cost)
                    <b>Revised Original  : </b>{{$cost->cost}} -/{{$project_data->project->ProjectDetail->currency}}
                  @endforeach
                </div>
              </div>
              <hr/>
              <div class="row" >
                <div style="text-align: center;"><h3><b>TIME</b></h3></div> </br>
                <div class="col-md-4"><b>Planned Start Date : </b>{{$project_data->project->ProjectDetail->planned_start_date}} </div>
                <div class="col-md-4"> <b>Planned End Date : </b>{{$project_data->project->ProjectDetail->planned_end_date}}</div>
                <div class="col-md-4"> <b>Gestation period : </b> </div>        </br>
                <hr/>
                <div class="col-md-4"><b>Revised Start Date : </b>{{$project_data->project->ProjectDetail->revised_start_date}} </div>
                <div class="col-md-4">
                  @foreach ($project_data->project->RevisedEndDate as $endDate)
                    <b>Revised End Date : </b>{{$endDate->end_date}}
                  @endforeach
                </div>
                <div class="col-md-4"> <b>Revised Gestation period : </b> <span class="revised"></span> </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-3">
                  <input type="hidden" name="id" value=" {{$project_data->project_id}}">

                  <a href="{{route('projects.edit',$project_data->project_id)}}"
                    style="width:38%;margin-right:5px;" class="btn  btn-primary pull-right">Edit</a>

                  </div>
                  <div class="col-md-1">
                    <button type="Reviewed" class="btn btn-success pull-right"> Reviewed</button>
                  </div>
                </div>


              </div>

            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
@endsection
