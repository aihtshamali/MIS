@extends('layouts.uppernav')

@section('content')


<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
       Complete Evaluation Projects

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
        <!-- <div class="col-md-2" ></div> -->
        <div class="col-md-8" >
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
                            <th style="text-align:center;">Progress</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody style="text-align:center;">
                            @foreach($officer as $o)
                            <tr >
                            <td> {{$o->Project->project_no}} </td>
                            <td><a href="{{route('evaluation_activities',$o->project_id)}}">{{$o->Project->title}}</a> </td>
                            <td>
                              @if($o->progress > 95)
                              <label class="label label-success"> Completed {{$o->progress}}%</label>
                              @endif
                              @if($o->progress<50)
                              <label class="label label-danger"> Not Completed {{$o->progress}}%</label>
                              @endif
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
        <!-- <div class="col-md-2 col-xs-2" ></div> -->
       </div>


    </section>
</div>
@endsection
