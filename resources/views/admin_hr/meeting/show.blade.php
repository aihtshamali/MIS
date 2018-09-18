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
    Meeting No {{$agendas[0]->HrMeetingPDWP->id}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
      <table class="table table-borderd">
          <tr>
              <th>
                  Agenda Item
              </th>
              <th>
                  ADP No
              </th>
              <th>
                  Name of Scheme
              </th>
              <th>
                  Estimated Cost
              </th>
              <th>
                  ADP Allocation
                </th>
                <th>
                  Attachments
                </th>
                <th>
                    MOM's
                </th>
                  
          </tr>
          <?php $var = 1?>
          @foreach ($agendas as $agenda)
              <tr>
                  <td>
                    <?php echo $var++?>
                  </td>
                  <td>
                    @if($agenda->adp_no)
                    {{$agenda->adp_no}}
                    @else
                    No ADP
                    @endif
                  </td>
                
                  <td>
                    {{$agenda->scheme_name}}
                  </td>
                  <td>
                    {{$agenda->estimated_cost}}
                  </td>
                  <td>
                    {{$agenda->adp_allocation}}
                  </td>
                  <td>
                    {{-- <input type="file" name="attachments" class="form-control"> --}}
                    {{-- {{dd($agenda->HrMeetingPDWP)}} --}}
                  <a href="{{asset('storage/uploads/projects/project_agendas/'.$agenda->HrAttachment->attachments)}}" download>{{$agenda->HrAttachment->attachments}}</a>
                  </td>
                  <td>
                      <a class="btn btn-success pull-left" href="hassan:" style="margin-bottom:5px;">Scan Document</a>
                      <div>
                          <input type="file" id="attachmentt" class="pull-left" name="section2_attachments[]" value="">
                      </div>
                      {{-- <a class="btn btn-success pull-left" id="testread">Test</a> --}}

                  </td>
              </tr>
          @endforeach
      </table>
      <div class="col-md-7">
          <button id="finish_btn" class="btn btn-info pull-right"  type="submit">Save Changes</button>
      </div>
  </section>
</div>
@endsection
@section('scripttags')
<script>
</script>
          
@endsection