@extends('layouts.uppernav')
@section('styletag')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
<style>
    #outerbox {
        width: 50%;
        text-align: center;
        /* position:fixed; */
        left: 30%;
        /* top: 30%; */
        /* margin-top: 30%; */
        /* top:30%; */
    }

    #inner_items {
        left: 25%;
    }

    #second_specialmeetings,
    #second_regularmeetings {
        margin-top: 25px;
        background-color: lightblue;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        display: none;
    }

    #section1 {}

    #meeting {
        display: none;
    }

    #outerboxx {
        position: inherit;
        width: 100%;
    }

    .list-group-item {
        border: none;
    }
    .wd43p{width:37% !important;}
    .toggler{
        display:none;
    }
   
    .nav {padding:2% 0% !important;}

</style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
           
            <div id="exTab1" class="container box box-body box-primary">	
                    <h4> <b>MEETING TO BE CONDUCTED </b></h4>
            <ul  class="nav nav-pills" >
            {{-- {{dd($data)}} --}}
                    @foreach ($data as $key => $value)
                        <li class="" style="background:white;" >
                            <a  href="#{{ $key }}" data-toggle="tab"  class="clickable">Meetings Data {{ $key }} <span class="caret"></span></a>
                        </li>
                    @endforeach
            </ul>
            @foreach ($data as $key => $value)
            <div class="tab-content clearfix">
                <div id="{{ $key }}" class="tab-pane">
                    <table class="example1 col-md-12 table table-bordered" >
                        <thead>
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
                                <th class="wd43p"> Meeting Agenda(s)/Scheme(s)</th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Attachment
                                </th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value as $v)
                            <tr>
                                <td>
                                    {{$v->id}} / {{ $key }}
                                </td>
                                <td>
                                    
                                    <a href="{{route('admin.show',$v->id)}}" target="_blank">
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
                                    <ol  style="font-size:13px;">
                                    @foreach ($v->HrAgenda as $agenda)
                                        <li> {{$agenda->scheme_name}}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    @php
                                    $originalDate=$v->scheduled_date;
                                        $date = date("d-M-Y", strtotime($originalDate));
                                    //  echo $date;
                                    @endphp
                                    {{$date}}
                                </td>
                                <td>
                                    <a href="{{asset('storage/uploads/projects/pdwp_meeting/'.$v->attachment)}}" download>{{$v->attachment}}</a>
                                </td>
                                <td><a href="{{route('List_Agendas',['meeting_no'=>$v->id])}}" class="btn btn-md btn-success">Conduct Meeting</a></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                        
                    </table>
                    </div>
                                  
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
@section('scripttags')
<script>
    $('.select2').select2();
    
    $(document).on('click','.clickable',function(){
        id = $(this).attr('href');
        $('.tab-content.clearfix > .tab-pane').each(function(index,value){
            $(value).removeClass('active');            
        });
        $(id).addClass('active');
    });
</script>
@endsection 