@extends('layouts.uppernav')
@section('styletag')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
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
/* #exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
} */
</style>
@endsection

@section('content')
<div class="content-wrapper">


    {{-- <section class="content-header">
        <h1>
            Meetings to be conducted
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-backward"></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

        </ol>
    </section> --}}

    <section class="content">
            <div class="container"><h1> Meetings to be conducted </h1></div>
            <div id="exTab1" class="container">	
            <ul  class="nav nav-pills" >
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
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($value as $v)
                                                <tr>
                                                    <td>
                                                        {{$v->id}} / {{ $key }}
                                                    </td>
                                                    <td>
                                                       
                                                        <a href="{{route('List_Agendas',['meeting_no'=>$v->id])}}" target="_blank">
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
                                                    {{-- <td>
                                                        <a href="{{ route('admin.edit',$v->id) }} " class="btn btn-success">EDIT</a>
                                                    </td> --}}
                                
                                                </tr>
                                                {{-- @endforeach --}}
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
    // $('.searchAgenda').on('change', function() {
    //     console.log($(this).val());
    //     location = "/hr/admin/" + $(this).val();
    // });
    // $(document).on('click', 'div > h4', function() {
    //     $('h4').css({"width": "20%", "float": "left"});
    //     $('.caret').attr('style', 'color:black');
    //     $('.display').hide();
    //     $('.display').removeClass('display');
    //     $('#' + $(this).attr('class')).toggle().addClass("display")
    //     $('.' + $(this).attr('class')).attr('style', 'color:#f0ad4e');
    //     $('.' + $(this > span).attr('class')).attr('style', 'border-top:4px solid #f0ad4e');
    // });
    $(document).on('click','.clickable',function(){
        id = $(this).attr('href');
        $('.tab-content.clearfix > .tab-pane').each(function(index,value){
            $(value).removeClass('active');            
        });
        $(id).addClass('active');
    });
</script>
@endsection 