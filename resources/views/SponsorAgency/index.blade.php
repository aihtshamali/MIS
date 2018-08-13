@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
        @foreach($SponsorAgency as $sp)
        <div class="col-md-6 col-sm-6 col-xs-12">

        <div class="info-box" style="margin-top:20px">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-number">{{$sp->name}}</span>
            <form action="{{route('SponsorAgency.destroy',$sp->id)}}" method="POST">
                {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">
              <input type="submit" class="btn btn-danger pull-right" value="Delete">
            </form>
          </div>
          <br>
          <!-- /.info-box-content -->
          <div class="pull-right">
            <span class="info-box-number">{{$sp->created_at}}</span>
          </div>
        </div>
        <!-- /.info-box -->
      </div>
      @endforeach

      <!-- /.col -->
</div>


@endsection
