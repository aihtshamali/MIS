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
                                                        {{$project->ProjectDetail->project_attachements}}
                                                        </div>
                                                <div class="col-md-4">
                                                </div>

                                                @if (isset($project->EvaluationType->name))
                                                <div class="col-md-4">
                                                <b>Project Type :</b>
                                                  {{$project->EvaluationType->name}}
                                                </div>
                                              @endif
                                        </div>
                                <hr/>
                                        <div class="row" >

                                                <div class="col-md-4">
                                                  <b>Project ID :</b>
                                                {{$project->id}}
                                                <br>
                                                <b>Project No :</b>
                                                {{$project->project_no}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>GS NO :</b>
                                                {{$project->ADP}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>Project Name :</b>
                                                {{$project->title}}
                                                </div>



                                        </div>
                                        <hr/>

                                        <div class="row" >

                                                <div class="col-md-4">
                                                <b>Sector :</b>
                                                @foreach ($project->AssignedSubSectors as $subsct)
                                                  {{$subsct->SubSector->Sector->name}}
                                                @endforeach
                                                </div>
                                                <div class="col-md-4">
                                                <b>Sub-Sectors:</b>
                                                @foreach ($project->AssignedSubSectors as $subsct)
                                                  {{$subsct->SubSector->name}}
                                                @endforeach
                                                </div>
                                                {{-- <div class="col-md-4">
                                                <b>Department :</b>
                                                @foreach ($project->AssignedDepartments as $department)
                                                  {{$department->Department->name}}
                                                @endforeach
                                                </div> --}}

                                        </div>
                                        <hr/>

                                        <div class="row" >

                                                <div class="col-md-4">
                                                <b>Sponsoring Agency(s) :</b>
                                                @foreach ($project->AssignedSponsoringAgencies as $SponsoringAgency)
                                                  {{$SponsoringAgency->SponsoringAgency->name}}
                                                @endforeach
                                                </div>
                                                <div class="col-md-4">
                                                <b>Executing Agency(s):</b>
                                                @foreach ($project->AssignedExecutingAgencies as $ExecutingAgency)
                                                  {{$ExecutingAgency->ExecutingAgency->name}}
                                                @endforeach
                                                </div>
                                                <div class="col-md-4">
                                                <b>District(s) : </b>

                                                @foreach ($project->AssignedDistricts as $AssignedDistrict)
                                                  {{$AssignedDistrict->District->name}}
                                                @endforeach

                                                </div>

                                        </div>
                                        <hr/>
                                        <div class="row" >

                                                <div class="col-md-4">
                                                <b>Approving Forum :</b>
                                                {{$project->ProjectDetail->ApprovingForum->name}}
                                                {{-- {{$project->ProjectDetail->getApprovingForum($project->ProjectDetail->approving_forum_id)->name}} --}}
                                                </div>
                                                <div class="col-md-4"></div>

                                                <div class="col-md-4">
                                                <b>Assigning Forum :</b>
                                                {{$project->ProjectDetail->AssigningForum->name}}
                                                {{-- {{$project->ProjectDetail->getAssigningForum($project->ProjectDetail->assigning_forum_id)->name}} --}}
                                                </div>

                                        </div>
                                        <hr/>
                                        <div class="row" >
                                                <div style="text-align: center;"><h3><b>COST</b></h3></div> </br>
                                                <div class="col-md-4"> <b>Original Approved Cost(Million): </b>{{$project->ProjectDetail->orignal_cost}} -/{{$project->ProjectDetail->currency}}</div>
                                                <div class="col-md-4">   <b>Revised Original Cost(Million) : </b>
                                                  @foreach ($project->RevisedApprovedCost as $revised_cost)
                                                    {{$revised_cost->cost}}
                                                    @if(last($project->RevisedApprovedCost->toArray())['id'] != $revised_cost->id)
                                                      ,
                                                    @endif
                                                  @endforeach
                                                -/{{$project->ProjectDetail->currency}}    </div>
                                        </div>
                                        <hr/>
                                        <div class="row" >
                                                <div style="text-align: center;"><h3><b>TIME</b></h3></div> </br>
                                                <div class="col-md-4" id="planned_start_date"><b>Planned Start Date : </b><label>{{$project->ProjectDetail->planned_start_date}}</label> </div>
                                                <div class="col-md-4" id="planned_end_date"> <b>Planned End Date : </b><label>{{$project->ProjectDetail->planned_end_date}}</label></div>
                                                <div class="col-md-4" id="gestation_period"> <b>Gestation period : </b> </div>        </br>
                                                <hr/>
                                                <div class="col-md-4" id="revised_start_date"><b>Revised Start Date : </b><label>{{$project->ProjectDetail->revised_start_date}}</label></div>
                                                <div class="col-md-4"> <b>Revised End Date : </b>
                                                  @foreach ($project->RevisedEndDate as $revised_date)
                                                    {{$revised_date->end_date}}
                                                    @if(last($project->RevisedEndDate->toArray())['id'] != $revised_date->id)
                                                      ,
                                                    @endif
                                                  @endforeach</div>
                                                <div class="col-md-4" id="revised_gestation_period"> <b>Revised Gestation period : </b> </div>
                                        </div>
                                        <hr/>

                                        <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">


                                        @if(Auth::user()->hasRole('officer'))
                                          <a href="{{route('projects.edit',$project->id)}}"
                                           style="width:38%;margin-right:5px;" class="btn  btn-primary pull-right">Edit</a>

                                          </div>
                                          {{-- <form class="" action="{{route('review_forms')}}" method="post">
                                          <input type="hidden" name="id" value=" {{$project->id}}">
                                          <div class="col-md-1">
                                            <button type="submit" class="btn btn-success pull-right"> Reviewed</button>
                                          </div>
                                        </form> --}}
                                        @endif
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
    var year = second[0]-first[0];
    var month = Math.abs(second[1]-first[1]);
    var days = Math.abs(second[2]-first[2]);
    $('#gestation_period').append('<b>  '+year + ' Years '+month+' Months '+days+' Days</b>');

    var revised_start = $("#revised_start_date").find('label').text();
        if(revised_start != ""){
          var first = revised_start.split('-');
          var year = second[0]-first[0];
          var month = Math.abs(second[1]-first[1]);
          var days = Math.abs(second[2]-first[2]);
          $("#revised_gestation_period").append('<b>  '+year + ' Years '+month+' Months '+days+' Days</b>');
        }

  });
</script>
@endsection
