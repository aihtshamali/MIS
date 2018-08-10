@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="col-md-3"> </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"> <b>View Assigning Forums</b></h3>
        </div>
        <div class="box-body">
        
          <div class="table-responsive" style=" height:auto;
          overflow-y:auto;
          width: 100%;">
              <table class="table table-hover table-striped">
                <tbody>
                      <tr >
                        <th>Approving Forum Name</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($assign_forums as $assign_forum)
                      @if($assign_forum->status == 1)
                      <tr>
                        <td>{{$assign_forum->name}}</td>
                        <form action="{{route('approving_forum.destroy',$assign_forum->id)}}" method="POST">
                           <td>
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger" value="Delete">
                          </td>
                        </form>
                      </tr>
                      @endif
                   @endforeach
                </tbody>
              </table>
            </div>

        </div>
        <!-- /.info-box -->
    </div>
    </div>
    <div class="col-md-3"> </div>
</div>
@endsection
