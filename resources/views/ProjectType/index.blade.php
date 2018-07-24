@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">


          @foreach ($project_types as $project_type)
            @if($project_type->status == 1)
              <div class="col-md-6 col-sm-6 col-xs-12">

        <div class="info-box" style="margin-top:20px">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-number">ProjectType &rarr; {{$project_type->name}}</span>
            <form action="{{route('project_type.destroy',$project_type->id)}}" method="POST">
                {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">
              <input type="submit" class="btn btn-danger pull-right" value="Delete">
          </form>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      @endif
    @endforeach


      <!-- /.col -->
</div>


@endsection
