

@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
  <section class="content">
        {{-- row 1 --}}
  <div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"> <b>View Sectors</b></h3>
        </div>
        <div class="box-body">
        
          <div class="table-responsive" style=" height:600px;
          overflow-y:auto;
          width: 100%;">
              <table class="table table-hover table-striped">
                <tbody>
                      <tr >
                        <th>Sector Name</th>
                        <th>Sub-Sector Name</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($sub_sectors as $sub_sector)
                      @if($sub_sector->status == 1)
                      <tr>
                        <td>
                            {{$sub_sector->sector->name}}
                        </td>
                        <td>
                            {{$sub_sector->name}}
                        </td>
                        <form action="{{route('sub_sector.destroy',$sub_sector->id)}}" method="POST">
                          <td>
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="submit" class="btn btn-danger pull-right" value="Delete">
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
</div>
@endsection
