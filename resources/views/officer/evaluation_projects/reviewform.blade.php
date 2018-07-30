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
                                                        {{$project_data[0]->project_attachements}}
                                                        </div>
                                                <div class="col-md-4">
                                                </div>
                                               
                                                <div class="col-md-4">
                                                <b>Project Type :</b>
                                                {{$project_data[0]->EvaluationType->name}}
                                                </div>
                                        </div>
                                <hr/>
                                        <div class="row" >
                                                       
                                                <div class="col-md-4">
                                                <b>Project ID :</b>
                                                {{$project_data[0]->project_id}}
                                                {{$project_data[0]->project_no}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>GS NO :</b>
                                                {{$project_data[0]->ADP}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>Project Name :</b>
                                                {{$project_data[0]->title}}
                                                </div>
                                                
                                             
                                                
                                        </div>
                                        <hr/>

                                        <div class="row" >
                                                
                                                <div class="col-md-4">
                                                <b>Sector :</b>
                                                
                                                </div>
                                                <div class="col-md-4">
                                                <b>Sub-Sectors:</b>
                                                
                                                </div>
                                                <div class="col-md-4">
                                                <b>Department :</b>
                                        
                                                </div>
                                                
                                        </div>
                                        <hr/>
                                        
                                        <div class="row" >
                                        
                                                <div class="col-md-4">
                                                <b>Sponsoring Agency(s) :</b>
                                                {{$project_data[0]->getSponsoringAgency($project_data[0]->sponsoring_agency_id)->name}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>Executing Agency(s):</b>
                                                {{$project_data[0]->getExecutingAgency($project_data[0]->executing_agency_id)->name}}
                                                </div>
                                                <div class="col-md-4">
                                                <b>District(s) : </b>
                                                {{$projectdetails_data[0]->getDistrict($projectdetails_data[0]->district_id)->name}}
                                                </div>
                                
                                        </div>
                                        <hr/>
                                        <div class="row" >
                                                
                                                <div class="col-md-4">
                                                <b>Approving Forum :</b>
                                                {{$projectdetails_data[0]->getAssigningForum($projectdetails_data[0]->assigning_forum_id)->name}}
                                                </div>
                                                <div class="col-md-4"></div>
                                                
                                                <div class="col-md-4">
                                                <b>Assigning Forum :</b>
                                                {{$projectdetails_data[0]->getAssigningForum($projectdetails_data[0]->assigning_forum_id)->name}}
                                                </div>
                                                
                                        </div>
                                        <hr/>
                                        <div class="row" >
                                                <div style="text-align: center;"><h3><b>COST</b></h3></div> </br>                 
                                                <div class="col-md-4"><b>Original Cost : </b> {{$projectdetails_data[0]->orignal_cost}} -/{{$projectdetails_data[0]->currency}} </div>
                                                <div class="col-md-4"> <b>Original Approved : </b>{{$projectdetails_data[0]->approved_cost}} -/{{$projectdetails_data[0]->currency}}</div>
                                                <div class="col-md-4">   <b>Revised Original : </b>{{$projectdetails_data[0]->approved_cost}} -/{{$projectdetails_data[0]->currency}}    </div>          
                                        </div>
                                        <hr/>
                                        <div class="row" >
                                                <div style="text-align: center;"><h3><b>TIME</b></h3></div> </br>                 
                                                <div class="col-md-4"><b>Planned Start Date : </b>{{$projectdetails_data[0]->planned_start_date}} </div>
                                                <div class="col-md-4"> <b>Planned End Date : </b>{{$projectdetails_data[0]->planned_end_date}}</div>
                                                <div class="col-md-4"> <b>Gestation period : </b> </div>        </br>  
                                                <hr/>
                                                <div class="col-md-4"><b>Revised Start Date : </b>{{$projectdetails_data[0]->revised_start_date}} </div>
                                                <div class="col-md-4"> <b>Revised End Date : </b></div>
                                                <div class="col-md-4"> <b>Revised Gestation period : </b> </div>
                                        </div>
                                        <hr/>

                                        <div class="row"> 
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                      
                                        <input type="hidden" name="id" value=" {{$project_data[0]->id}}">
                                       
                                      
                                        <a href="{{route('projects.edit',$project_data[0]->project_id)}}"
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