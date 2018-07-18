@extends('layouts.uppernav')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding:10px">
  <div class="row" style="padding:30px">
    <div class="col-md-7">

  <strong><p>Project No &#58; {{$projects->proj_no}}</p></strong>
  <strong><p>Project Title &#58; {{$projects->title}}</p></strong>
  <p>Starting Date &#58; {{$projects->starting_date}}</p>
  <p>Ending Date &#58; {{$projects->ending_date}}</p>
  <p>Planned Start Date &#58; {{$projects->planned_start_date}}</p>
  <p>Spnosor Agency Name &#58; {{$projects->SponsorAgency->sponsor_agency_name}}</p>
  <p>Executing Agency Name &#58; {{$projects->ExecutingAgency->name}}</p>
  <p>Project Created By &#58; {{$projects->getUser($projects->created_by)->name}}</p>
  <p>Totol Cost &#58; {{$projects->total_cost}}</p>
  <p>Country &#58; {{$projects->country}}</p>
  <p>City &#58; {{$projects->city}}</p>
</div>


<div class="col-md-3">

  @if($projects->status == 0)
    <p>Assigned Date &#58; Not Assigned</p>
  @else
    <p>Assigned Date &#58; {{$projects->assigned_date}}</p>
  @endif
  <div class="box-footer box-comments">

    @foreach ($remarks as $remark)
        <div class="box-comment">
          <!-- User image -->
          <img class="img-circle img-sm" src="{{$remark->user->profilepic}}" alt="User Image">
          <div class="comment-text">
                <span class="username">
                  {{$remark->user->name}}
                  <span class="text-muted pull-right"></span>
                </span><!-- /.username -->
                  {{$remark->remarks}}
          </div>
          <!-- /.comment-text -->
        </div>
      @endforeach
        
        </div>
  </div>
  </div>

</div>

@endsection
