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
    {{-- <a class="btn btn-success pull-right" href="hassan:" style="margin-bottom:5px;">Scan Document</a> --}}
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
      <div>
          <label >Search Schemes</label>
          <select  name="agenda_name" class="form-control select2 searchAgenda" style="text-align: center !important" id="agenda_name">
              <option value="">Enter Scheme Name to Search...</option>
              @foreach ($agendas as $agenda)
          <option value="{{$agenda->HrMeetingPDWP->id}}">{{$agenda->scheme_name}} / {{$agenda->financial_year}}</option>
              @endforeach
          </select>
      </div>
      @foreach ($data as $key => $value)
        <div style="cursor:pointer">
          <h2 class="{{ $key }}">Meetings Data {{ $key }} <span class="caret"></span></h2>
        </div>
        <div id="{{ $key }}" style="display:none">
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
              Action
            </th>

          </tr>
        @foreach ($value as $v)
            {{-- @foreach ($vs as $v) --}}
              <tr>
                <td>
                  {{$v->id}}
                </td>
                <td>
                  <a href="{{route('admin.show',$v->id)}}">
                    @if($v->meeting_no)
                      {{$v->meeting_no}}
                    @else
                      No Meeting No
                    @endif
                  </a>
                </td>

                <td>
                  {{$v->HrMeetingType->meeting_name}}
                </td>
                <td>
                  {{$v->scheduled_date}}
                </td>
                <td>
                  <a href="{{asset('storage/uploads/projects/pdwp_meeting/'.$v->attachment)}}" download>{{$v->attachment}}</a>

                </td>
                <td>
                  <a href="{{ route('admin.edit',$v->id) }} " class="btn btn-success">EDIT</a>
                </td>

              </tr>
            {{-- @endforeach --}}
        @endforeach
      </table>
    </div>
      @endforeach
  </section>
</div>
@endsection
@section('scripttags')
<script>
    $('.select2').select2();
    $('.searchAgenda').on('change',function(){
        console.log($(this).val());
        location="/hr/admin/"+$(this).val();
    });
  $(document).on('click','div > h2',function(){
    $('#'+$(this).attr('class')).toggle('slow');
  });
</script>
@endsection
