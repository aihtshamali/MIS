@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">


          @foreach ($sectors as $sector)
            @if($sector->status == 1)
              <div class="col-md-6 col-sm-6 col-xs-12">

        <div class="info-box" style="margin-top:20px">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-number">Sector &rarr; {{$sector->name}}</span>
            <form action="{{route('sector.destroy',$sector->id)}}" method="POST">
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
