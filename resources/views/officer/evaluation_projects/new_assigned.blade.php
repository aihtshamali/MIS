@extends('layouts.uppernav')

@section('content')


<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
         New Assigned Evaluations Projects 
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
        <div class="col-md-2 col-xs-2" ></div>
        <div class="col-md-8 col-xs-4" >
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
                <div class="col-md-12 col-xs-6">
              
                    <div class="table-responsive">
                        <form action="{{route('assignProjectAcknowledged')}}" method="POST">
                      
                      <table class="table table-hover table-striped">
                        <thead >
                            <th style="text-align:center;" >Project Number</th>
                            <th style="text-align:center;">Project Name</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody style="text-align:center;">
                            {{csrf_field()}}
                          @foreach($officer as $o)
                            <tr>
                            <td> {{$o->project_id}} </td>
                            <td>{{$o->getProject($o->project_id)->title}}  </td> 
                              <input type="hidden" name="id" value="{{$o->id}}">
                              <td><button type="submit" class="btn btn-xs btn-success"> Acknowledge</button></td>   
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </form>
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