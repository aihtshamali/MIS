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
                  {{$project_data->project->ProjectDetail->project_attachements}}
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
                  @foreach ($project_data->project->AssignedSubSectors as $sbsect)
                  {{$sbsect->SubSector->Sector->name}}
                  @endforeach
                </div>
                <div class="col-md-4">
                  <b>Sub-Sectors:</b>
                  @foreach ($project_data->project->AssignedSubSectors as $sbsect)
                  {{$sbsect->SubSector->name}}
                  @endforeach

                </div>
                {{-- <div class="col-md-4">
                  <b>Department :</b>
                  @foreach ($project_data->project->AssignedDepartments as $dpt)
                  {{$dpt->Department->name}}
                  @endforeach
                </div> --}}

              </div>
              <hr/>

              <div class="row" >
                {{-- {{dd($project_data->AssignedProject)}} --}}
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
                <div class="col-md-4"></div>
                <div class="col-md-4">


                  @foreach ($project_data->project->RevisedApprovedCost as $cost)
                    <b>    <b>Revised Original: </b> </b>{{$cost->cost}} -/{{$project_data->project->ProjectDetail->currency}} </br>
                  @endforeach

                </div>
              </div>
              <hr/>
              <div class="row" >
                <div style="text-align: center;"><h3><b>TIME</b></h3></div> </br>
                <div class="col-md-4" id="planned_start_date"><b>Planned Start Date : </b><label>{{$project_data->project->ProjectDetail->planned_start_date}}</label></div>
                <div class="col-md-4" id="planned_end_date"> <b>Planned End Date : </b><label>{{$project_data->project->ProjectDetail->planned_end_date}}</label></div>
                <div class="col-md-4" id="gestation_period"> <b>Gestation period : </b> </div>        </br>
                <hr/>
                <div class="col-md-4" id="revised_start_date"><b>Revised Start Date : </b><label >{{$project_data->project->ProjectDetail->revised_start_date}}</label> </div>
                <div class="col-md-4">
                  @foreach ($project_data->project->RevisedEndDate as $endDate)
                    <b>Revised End Date : </b>{{$endDate->end_date}}
                  @endforeach
                </div>
                <div class="col-md-4" id="revised_gestation_period"> <b>Revised Gestation period : </b> <span class="revised"></span> </div>
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
                    <form class="" action="{{route('review_forms')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="assigned_project_id" value="{{$project_data->id}}">
                      <button type="submit" class="btn btn-success pull-right"> Reviewed</button>
                    </form>
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
@section('scripttags')
  <script type="text/javascript">

  $(function () {
    var first_val = $('#planned_start_date').find('label').text();
    var second_value = $('#planned_end_date').find('label').text();
    var first = first_val.split('-');
    var second = second_value.split('-');
    var year = Math.abs(second[0]-first[0]);
    var month = Math.abs(second[1]-first[1]);
    var days = Math.abs(second[2]-first[2]);
    $('#gestation_period').append('<b>  '+year + ' Years '+month+' Months '+days+' Days</b>');

    var revised_start = $("#revised_start_date").find('label').text();
        if(revised_start != ""){
          var first = revised_start.split('-');
          var year = Math.abs(second[0]-first[0]);
          var month = Math.abs(second[1]-first[1]);
          var days = Math.abs(second[2]-first[2]);
          $("#revised_gestation_period").append('<b>  '+year + ' Years '+month+' Months '+days+' Days</b>');
        }

  });
</script>
@endsection
