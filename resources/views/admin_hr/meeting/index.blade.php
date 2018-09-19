@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>

#outerbox{
  width: 50%;
  text-align: center;
  /* position:fixed; */
  left: 30%;
  /* top: 30%; */
  /* margin-top: 30%; */
  /* top:30%; */
}
#inner_items{
  left: 25%;
}

#second_specialmeetings,#second_regularmeetings{
  margin-top: 25px;
  background-color:lightblue;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  display:none;
}

#section1{

}

#meeting{
  display: none;
}

#outerboxx{
  position: inherit;
  width: 100%;
}

.list-group-item{
  border: none;
}
  </style>
@endsection

@section('content')
<div class="content-wrapper">


  <section class="content-header">
    <h1>
    All Meetings
    </h1>
    <a class="btn btn-success pull-right" href="hassan:" style="margin-bottom:5px;">Scan Document</a>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
      <table class="table table-borderd">
          <tr>
              <th>
                  Meeting ID
              </th>
              <th>
                  Meeting No
              </th>
              <th>
                  Meeting Type
              </th>
              <th>
                  Date
              </th>
              <th>
                Attachment
            </th>
            <th>
              Attach MOMs
            </th>
          </tr>
          @foreach ($meetings as $meeting)
              <tr>
                  <td>
                      {{$meeting->id}}
                  </td>
                  <td>
                    <a href="{{route('admin.show',$meeting->id)}}">
                    @if($meeting->meeting_no)
                      {{$meeting->meeting_no}}
                      @else
                      No Meeting No
                      @endif
                    </a>
                  </td>

                  <td>
                      {{$meeting->HrMeetingType->meeting_name}}
                  </td>
                  <td>
                      {{$meeting->scheduled_date}}
                  </td>
                  <td>
                  <a href="{{asset('storage/uploads/projects/pdwp_meeting/'.$meeting->attachment)}}" download>{{$meeting->attachment}}</a>

                  </td>
                  <td>
                    @if (isset($meeting->HrMom->attachment))
                      <a href="{{asset('/storage/uploads/projects/meetings_mom/'.$meeting->HrMom->attachment)}}"> download{{$meeting->HrMom->attachment}}</a>
                    @else
                      <div>
                        <form class="attach_moms_form" action="{{route('save_moms')}}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="meeting_id" value={{$meeting->id}}>
                          <input type="file" id="attachmentt" class="attach_moms pull-left" name="attach_moms">
                          <input type="submit" class="btn btn-success"  name="Submit" value="Attach">
                        </form>
                      </div>
                    @endif
                      {{-- <a class="btn btn-success pull-left" id="testread">Test</a> --}}

                  </td>
              </tr>
          @endforeach
      </table>
  </section>
</div>
@endsection
@section('scripttags')
@endsection
