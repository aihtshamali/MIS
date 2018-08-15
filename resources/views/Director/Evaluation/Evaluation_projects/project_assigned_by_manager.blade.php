@extends('layouts.uppernav')
@section('styletags')
  <style media="screen">
    .header-content{
      padding:10px;
    }
    table.projects th , td{
      text-align: center !important;
    }
    .veryHigh{
      height: 100%;
    }
    .parent {
      overflow: hidden;
      position: relative;
      width: 100%;
    }
    .priority{
      /* background: #fff; */
   opacity: .4;
   color:black;
   font-weight: bold;
    }
    .child-right {
      background:green;
      height: 100%;
      width: 50%;
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
@endsection
@section('content')
<div class="content-wrapper">

  <!-- SELECT2 EXAMPLE -->
<div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container">
          <div class="row">
            <div class="col-md-12">
                @include('inc.msgs')
              <div class="form-group">
                <label>Un-Assigned Projects</label>

                <table class="table table-responsive table-bordered projects">
                  <thead>
                    <th>Project No.</th>
                    <th>Project Name</th>
                    <th>Assigned By</th>
                    <th>Priority</th>
                    <th>Project Type</th>

                    <th colspan="1" >Project Priority</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    {{-- {{dd($projects)}}/ --}}
                  @foreach($projects as $project)

                        <tr>
                            <form class="" action="{{route('create_from_director')}}" method="GET">
                                {{ csrf_field() }}
                          <td>{{$project->Project->project_no}}</td>
                          <td><a href="{{route('projects.show',$project->project_id)}}">{{$project->Project->title}}</a></td>
                          <td>{{$project->AssignedBy($project->assigned_by)->first_name}}</td>
                          @if($project->priority == 3)
                          <td>High Priority</td>
                          @elseif($project->priority == 2)
                          <td>Normal Priority</td>
                          @else
                          <td>Low Priority</td>
                          @endif
                          <td>{{$project->Project->ProjectType->name}}</td>
                            <input type="hidden" name="inheritPriority" value="{{$project->priority}}">
                          <td>
                            <input type="hidden" name="priority" value="">
                            <input type="hidden" name="project_id" value="{{$project->project_id}}">
                            <button type="button" class="btn btn-md priority" style="background-color:red; ">High Priority</button>
                            <button type="button"  class="btn btn-md priority"style="background-color:green; ">Normal Priority</button>
                            <button type="button" class="btn btn-md priority" style="background-color:yellow; ">Low Priority</button>

                          </td>
                          <td><input type="submit" name="submit" value="Assign" class="btn btn-info"></td>
                        </form>
                        </tr>
                  @endforeach
                </tbody>
                </table>


              </div>
            <!-- /.col -->
          </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
          <!-- /.container -->
          </div>
      </form>
        </div>
</div>
</div>
@endsection
@section('scripttags')
<script>
    $('.priority').on('click',function(){
      $('.priority').css('opacity','0.4');
      $('input[name="priority"]').val($(this).text().toLowerCase().replace(' ','_'));
      $(this).css('opacity','unset').css('color','black');
    });
</script>
@endsection
