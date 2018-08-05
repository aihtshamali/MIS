@extends('layouts.uppernav')

@section('content')

<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
        In-Progress Evaluation Activities
         {{-- <span class="label label-danger">{{$project_id}}</span> --}}
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
                   Project Number : <b> {{$project_data[0]->project_no}} </b></br>
                </p>
                <p >
                   Project Name :<b> {{$project_data[0]->project->title}}  </b></br>
                </p>

                <p>
                   Project Members :<b> {{$project_data[0]->user->first_name}} </b></br>
                </p>


                <div class="box-tools pull-right">
                {{-- <button  href="#" type="button" class="btn btn-xs btn-primary"> EDIT</button> --}}
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>

                </div>
                 <hr/>
                <b>
                        GLOBAL PROGRESS
                </b>

                <div class="progress">

                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                        0% Complete
                        </div>
                      </div>
              </div>
              <div class="box-body">
               <div class="row" >
                <div class="col-md-12 col-xs-6">


                    <div class="table-responsive">
                <form action="#" method="POST">
                        {{csrf_field()}}
                      <table class="table table-hover table-striped">
                            <b>ACTIVITY CHART</b>
                        <thead >
                            <th style="text-align:center;" >No.</th>
                            <th style="text-align:center;">Activity Name</th>

                            <th style="text-align:center;">Activity Progress</th>
                            <th style="text-align:center;">Remarks</th>
                        </thead>
                        <tbody style="text-align:center;">
                            @foreach($activities as $activity)
                            <tr>
                            <td> {{$activity->id}} </td>
                            <td> {{$activity->name}} </td>
                            <td>

                              <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                {{$activity->weightage}}% Complete
                                </div>
                                </div>
                            </td>
                            <td>

                            <a href="#commentModal"  class="btn btn-primary commentModal"  data-toggle="modal" data-id="{{$activity->id}}">Problematic?</a>

                        </td>


                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <input type="hidden" name="id" value="{{$project_data[0]->project_id}}">
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

// Modal Box


<div class="modal" data-keyboard="false" data-backdrop="static" id ="commentModal" tabindex="=-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="{{route('Problematicremarks.store')}}" method="POST">
             {{csrf_field()}}
            <div class="modal-body">

                    <div class="form-group">
                        <input  type=hidden name="activity_id" value="">
                        <input type=hidden name="project_id" value="{{$project_id}}">

                        <label for="inputcomments"> Write Here</label>
                        <input class="form-control" placeholder="Your Comments" type="text" id="inputcomments">

                    </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"> Submit</button>

            </div>
        </form>
        </div>

    </div>

</div>

@endsection

@section('scripttags')
<script>
$(".commentModal").on("click", function () {
    var myBookId = $(this).data('id');
    $('input[name="activity_id"]').val( myBookId );
});
</script>
@endsection
