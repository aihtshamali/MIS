@extends('layouts.uppernav')

@section('content')
<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
        Review Report 
       
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
                <h3 class="box-title" >Project Report</h3
              </div>
              <div class="box-body">
               <div class="row" >
                    <div class="table-responsive">
                            <form action="{{route('review_form')}}" method="POST">
                          
                          <table class="table table-hover ">
                              <tr>
                                  <th style="text-align:center;">Project Details</th>
                                  <th style="text-align:center;">Project Details</th>

                              </tr>
                              <tr>
                                  <td><b>Project Type</b></td>
                                  <td><b>Project Name</b></td>
                              </tr>
                          </table>
                            </form>
                    </div>
                        
                                              
                                                                        
                                 
                             
                            
                        </table>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2" ></div>
       </div>
   
    
    </section>    
</div>
@endsection