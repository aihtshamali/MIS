@extends('layouts.uppernav')

@section('content')
<style>
        {{--  .popup {
            display: inline-block;
        {{--  }  --}}
        .popup .popuptext {
            visibility: hidden;
            background-color: inherit;
            color:black;
            position:relative;
            
        }
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }  
        .popclose .showclose {
            visibility: hidden;
           
        }  
        
</style>

<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
        In-Progress Evaluation Activities 
         <span class="label label-danger">4</span>
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
      
        <div class="col-md-12 col-xs-6" >
            <div class="box box-warning">

              <div class="box-header with-border">
               
                <p>
                   Project Number : <b> {{$project_data[0]->project_id}} </b></br>
                </p>
                <p > 
                   Project Name :<b> {{$project_data[0]->getProject($project_data[0]->project_id)->title}}  </b></br>
                </p>
               
                <p>  
                   Project Members :<b> {{$project_data[0]->getUser($project_data[0]->user_id)->first_name}} </b></br>  
                </p>
  

                <div class="box-tools pull-right">
                <button  href="#" type="button" class="btn btn-xs btn-primary"> EDIT</button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  
                </div>
                 <hr/>
                <b>
                        GLOBAL PROGRESS
                </b>
                
                <div class="progress">
                  
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:5%">
                        5% Complete 
                        </div>
                      </div>
              </div>
              <div class="box-body">
               <div class="row" >
                <div class="col-md-12 col-xs-6">
               
               
                    <div class="table-responsive">
                <form action="{{route('activitiesSubmit')}}" method="POST">
                        {{csrf_field()}}
                      <table class="table table-hover table-striped">
                            <b>ACTIVITY CHART</b>
                        <thead >
                            <th style="text-align:center;" >No.</th>
                            <th style="text-align:center;">Activity Name</th>
                            <th style="text-align:center;">Activity Attachments</th>
                            <th style="text-align:center;">Activity Progress</th>
                            <th style="text-align:center;">Problematic?</th>
                        </thead>
                        <tbody style="text-align:center;">
                            @foreach($activities as $activity)
                            <tr>
                            <td> {{$activity->id}} </td>
                            <td> {{$activity->name}} </td>
                            <td><input type="file" name="img"  multiple> 
                            </td>
                            <td>
                            
                              <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:15%">
                                {{$activity->weightage}}% Complete
                                </div>
                                </div>
                            </td>
                            <td><a href="#" onclick="pop()">Comment Here</a> 
                            
                            </td>   
                            
                           
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <input type="hidden" name="id" value="{{$project_data[0]->id}}">
                      <button type="submit" class="btn btn-success pull-right" >Submit
                      </button>
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
<script> 
    /*        {{--  <div class="popup">
                                            <span class="popuptext" id="myPopup">
                                            Enter Comments: <input type="text" />
                                            <button type="submit" onclick="popclose()" id="closepop" class=" btn btn-xs btn-success">submit</button> 
                                            </span>
                                        </div>    --}}*/
    function pop() {
            var popup = document.getElementById('myPopup');
            popup.classList.toggle('show');
        }
        function popclose() {
            var popclose = document.getElementById('closepop'); 
          
        }
</script>
@endsection