@extends('layouts.uppernav')
@section('styletag')
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
<link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" /> -->
<style>
    h4:hover {
        color: #f0ad4e !important;
        -webkit-transition: all 600ms ease;
        transition: all 600ms ease;
        border-bottom: 1px solid;
    }

    h4 {
        -webkit-transition: all 600ms ease;
        transition: all 600ms ease;
        width: fit-content;
        margin-left: 3%;
        float: left;
        width: fit-content;
        border-bottom: 1px solid transparent;
    }

    h4:hover span {
        border-top: 4px solid #f0ad4e !important;
        -webkit-transition: all 600ms ease;
        transition: all 600ms ease
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        padding: 6px 0px !important;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        margin-top: -7px !important;
    }

    .content-wrapper {
        background-color: #e7ecef !important
    }

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

    table {
        width: 100% !important;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        font-size: 16px !important;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
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
            <li><a href="#"><i class="fa fa-backward"></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

        </ol>
    </section>

    <section class="content">
        <div>
            <label>Search Schemes</label>
            <select name="agenda_name" class="form-control select2 searchAgenda" style="text-align: center !important" id="agenda_name">
                <option value="">Enter Scheme Name to Search...</option>
                @foreach ($agendas as $agenda)
                <option value="{{$agenda->HrMeetingPDWP->id}}">{{$agenda->scheme_name}} / <b>{{$agenda->financial_year}}</b></option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 row" style="cursor:pointer;display:inline;">
            @foreach ($data as $key => $value)
            <h4 class="{{ $key }}">Meetings Data {{ $key }} <span class="caret"></span></h4>
            @endforeach
        </div>
        @foreach ($data as $key => $value)
        {{-- {{dd($key)}} --}}
        <div id="{{ $key }}" style="display:none">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                {{-- {{dd($value)}} --}}
                @foreach ($value as $v)
                {{-- @foreach ($vs as $v) --}}
                <tr class="item">
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
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // });
    $('.select2').select2();
    $('.searchAgenda').on('change', function() {
        console.log($(this).val());
        location = "/hr/admin/" + $(this).val();
    });
    $(document).on('click', 'div > h4', function() {
        $('h4').attr('style', 'color:black');
        $('.caret').attr('style', 'color:black');
        $('.display').hide();
        $('.display').removeClass('display');
        $('#' + $(this).attr('class')).toggle().addClass("display")
        $('.' + $(this).attr('class')).attr('style', 'color:#f0ad4e');
        $('.' + $(this > span).attr('class')).attr('style', 'border-top:4px solid #f0ad4e');
    });
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection 