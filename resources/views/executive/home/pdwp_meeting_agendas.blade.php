@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>

#outerbox{
  /* width: 50%; */
  text-align: center;
  /* position:fixed; */
  /* left: 30%; */
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

input{
    text-align: center;
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

.mycolor{
    background-color: lightgrey;
}

li div{
    text-align: center;
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

  <section class="col-md-12 initial">
        <?php $var = 1; $c = count($agendas)?>
        <div class="box yewali_1 box-default">
            <div  class="box-header with-border">
                <ul class="list-group" id="isme">
                        <?php $color = 0?>
                    @foreach ($agendas as $agenda)
                      @if($agenda->agenda_type_id == 2 || $agenda->agenda_type_id == 1)
                        @if($color === 0)
                            <?php $color++ ?>
                            <li class="list-group-item col-md-12" id="field" style="border-bottom: 2px solid gray ">
                        @elseif($color === 1)
                            <?php $color-- ?>
                            <li class="list-group-item col-md-12 mycolor" id="field" style="border-bottom: 2px solid gray ">
                        @endif
                            <div class="form-group row">
                            <div class="form-group row" style="display:flex;justify-content:center;">

                                <div class="col-md-1">
                                    <label>Agenda</label>
                                    <input type="text" disabled class="form-control" value="{{$var++}}">
                                </div>

                                <div class="col-md-2">
                                    <label>Type</label>
                                    <input type="text" disabled class="form-control" value="{{$agenda->AgendaType->name}}">
                                </div>

                                <div class="col-md-2">
                                    <div class="row">
                                            <label for="ex2">ADP No.</label>
                                    </div>
                                    <div class="row" style="padding:0 !important">
                                        <div class="col-md-6"style="padding:0 !important">
                                           <div style="font-size:18px;"> 2017-18/ </div>
                                        </div>
                                        <div class="col-md-6"style="padding:0 !important">
                                            <input disabled value="{{$agenda->adp_no}}"class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="name_of_scheme">Name Of the Scheme</label>
                                    <input disabled value="{{$agenda->scheme_name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                </div>
                            </div>
                            <div class="form-group row"style="display:flex;justify-content:center;">

                                <div class="col-md-4">
                                    <label >Sector</label>
                                    <input disabled value="{{$agenda->HrSector->name}}" class="form-control" id="name_of_scheme" name="sector[]" type="text"style="text-align:center;">
                                </div>

                                <div class="col-md-3">
                                    <label for="estimated_cost">Estimated Cost</label>
                                    <input disabled value="{{$agenda->estimated_cost}}" class="form-control" id="estimated_cost" name="estimated_cost[]" type="number" step = "0.01" style="text-align:center;">
                                </div>
                                <div class="col-md-2">
                                    <label for="adp_allocation">ADP Allocation</label>
                                    <input disabled value="{{$agenda->adp_allocation}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="number" step = "0.01"style="text-align:center;">
                                </div>
                                <div class="col-md-2">
                                    <label for="adp_allocation">Start Time</label>
                                    <input disabled value="{{$agenda->start_timeofagenda}}" class="form-control" id="adp_allocation" name="start_timeofagenda[]" type="text" style="text-align:center;">
                                </div>
                            </div>


                            </div>
                        </li>
                @else
                        @if($color === 0)
                            <?php $color++ ?>
                            <li class="list-group-item col-md-12" id="field" style="border-bottom: 2px solid gray ">
                        @elseif($color === 1)
                            <?php $color-- ?>
                            <li class="list-group-item col-md-12 mycolor" id="field" style="border-bottom: 2px solid gray ">
                        @endif
                        <div class="form-group row">
                        <div class="form-group row"style="display:flex;justify-content:center;">

                            <div class="col-md-1">
                                <label>Agenda</label>
                                <input type="text" disabled class="form-control" value="{{$var++}}">
                            </div>

                            <div class="col-md-2">
                                <label>Type</label>
                                <input type="text" disabled class="form-control" value="{{$agenda->AgendaType->name}}">
                            </div>

                            {{-- <div class="col-md-2">
                                <div class="row">
                                        <label for="ex2">ADP No.</label>
                                </div>
                                <div class="row" style="padding:0 !important">
                                    <div class="col-md-6"style="padding:0 !important">
                                       <div style="font-size:18px;"> 2017-18/ </div>
                                    </div>
                                    <div class="col-md-6"style="padding:0 !important">
                                        <input disabled value="{{$agenda->adp_no}}"class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-8">
                                <label for="name_of_scheme">Topic Name</label>
                                <input disabled value="{{$agenda->scheme_name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                            </div>
                        </div>
                        <div class="form-group row"style="display:flex;justify-content:center;">

                            <div class="col-md-4">
                                <label >Sector</label>
                                <input disabled value="{{$agenda->HrSector->name}}" class="form-control" id="name_of_scheme" name="sector[]" type="text"style="text-align:center;">
                            </div>

                            {{-- <div class="col-md-3">
                                <label for="estimated_cost">Estimated Cost</label>
                                <input disabled value="{{$agenda->estimated_cost}}" class="form-control" id="estimated_cost" name="estimated_cost[]" type="number" step = "0.01" style="text-align:center;">
                            </div>
                            <div class="col-md-2">
                                <label for="adp_allocation">ADP Allocation</label>
                                <input disabled value="{{$agenda->adp_allocation}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="number" step = "0.01"style="text-align:center;">
                            </div> --}}
                            <div class="col-md-2">
                                <label for="adp_allocation">Start Time</label>
                                <input disabled value="{{$agenda->start_timeofagenda}}" class="form-control" id="adp_allocation" name="start_timeofagenda[]" type="text"style="text-align:center;">
                            </div>
                        </div>


                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>

            </div>
            <button  class="btn btn-success pull-right conduct"  type="button">Conduct the meeting</button>
            {{-- <button  class="btn btn-success pull-left add-agenda"  type="button">Add New Agenda</button> --}}
        </div>

        {{-- <section id="section_agenda" class="content col-md-12" style="display:none;">
            <div id="outerbox" class="box yewali_1 box-default">
                <div  class="box-header with-border">
                    <div class="form-group row" style="margin-left:20px;margin-right:20px" id="main">
                        <div>
                            <label for="">Agenda Type</label>
                            <select class="form-control required select2 " name="agenda_type" id="agenda_type">
                                <option value="0">Select Agenda Type</option>
                                @foreach ($agenda_types as $agenda_type)
                                    <option value="{{$agenda_type->id}}">{{$agenda_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <section id="first_section1" style="display:none">
                            <div>
                                <label for="ex1">Agenda item</label>
                            <input disabled class="form-control" value="" style="text-align:center;" name="agenda_item[]" id="ex1" type="number">
                            </div>
                            <div>
                                <label for="">Agenda Status</label>
                                <select class="form-control required select2 " name="agenda_status[]" id="agenda_status">
                                    <option value="0">Select Agenda Status</option>
                                    @foreach ($agenda_statuses as $agenda_status)
                                        <option value="{{$agenda_status->id}}">{{$agenda_status->projecttypename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="ex2">ADP No.</label>
                            </div>
                            <div class="col-md-12" id="adpdiv" style="padding:0 !important">
                                <div class="checkbox col-md-3" style="padding-left:0;padding-right:0;">
                                    <label><input id="nonadp" type="checkbox" value="">Non ADP</label>
                                </div>
                                <div class="col-md-4" style="padding:0 !important">
                                    <select class="form-control  select2" name="financial_year" id="financial_year">
                                            <option value="0">Select Financial Year </option>
                                        @for($i = 2 ; $i <= 30 ; $i++)
                                            @if($i == 9)
                                            <option value="200{{$i}}-{{$i+1}}">200{{$i}}-{{$i+1}}</option>
                                            @elseif($i > 9)
                                            <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
                                            @else
                                            <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
                                            @endif
                                        @endfor
                                    </select>
                            </div>
                            <div class="col-md-1">
                                <label for="" style="font-size:25px">/</label>
                            </div>
                            <div class="col-md-4" style="padding:0 !important">
                                <select class="form-control  select2 " name="adp_no[]" id="adp">
                                    <option value="0">Select GS #</option>
                                    <php $counting = 0?>
                                    @foreach ($adp as $a)
                                        <option value="{{$a->gs_no}},<php echo $counting?>">{{$a->gs_no}}</option>
                                        <php $counting += 1?>
                                    @endforeach
                                    </select>
                            </div>
                            <div>
                                <label for="name_of_scheme">Name Of the Scheme</label>
                                <input class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                            </div>
                            <div>
                                <label >Sector</label>
                                <select  name="sector[]" class="form-control select2" style="text-align: center !important" id="sector_val">
                                    <option value="">Select Sector</option>
                                    @foreach ($sectors as $sector)
                                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="estimated_cost">Estimated Cost</label>
                                <input class="form-control" id="estimated_cost" name="estimated_cost[]" type="number" step = "0.01" style="text-align:center;">
                            </div>
                            <div>
                                <label for="adp_allocation">ADP Allocation</label>
                                <input class="form-control" id="adp_allocation" name="adp_allocation[]" type="number" step = "0.01"style="text-align:center;">
                            </div>
                            <div class="form-group" id="datepick" style="margin-top:10px">
                                <label for="">Time</label>
                                <select  name="my_time[]" class="form-control select2" style="text-align: center !important" id="">
                                    <option value="">Select Time</option>
                                    @for ($i = 9; $i < 12; $i++)
                                    @for($j = 0; $j <= 45; $j+=15)
                                        @if($j == 0)
                                        <option value="{{$i . ' : ' . $j.'0' .' AM'}}"> {{$i . " : " . $j .'0'}} AM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j . ' AM'}}"> {{$i . " : " . $j }} AM </option>
                                        @endif
                                    @endfor
                                    @endfor
                                    <option value="12 : 00 PM">12 : 00 PM</option>
                                    <option value="12 : 15 PM">12 : 15 PM</option>
                                    <option value="12 : 30 PM">12 : 30 PM</option>
                                    <option value="12 : 45 PM">12 : 45 PM</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                    @for($j = 0; $j <= 45; $j+=15)
                                        @if($j == 0)
                                        <option value="{{$i . ' : ' . $j.'0' . ' PM' }}"> {{$i . " : " . $j .'0'}} PM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j .' PM' }}"> {{$i . " : " . $j }} PM </option>
                                        @endif
                                    @endfor
                                    @endfor

                                </select>
                            </div>
                            <div>
                                <input type="file" id="attachment" class="pull-left" name="attachments[]" value="">
                            </div>
                        </section>
                        <section id="second_section1" style="display:none">
                            <div>
                                <label for="ex1">Agenda item</label>
                            <input disabled class="form-control" value="" style="text-align:center;" name="agenda_item[]" id="ex1" type="number">
                            </div>
                            <div>
                            <div>
                                <label for="">Agenda Status</label>
                                <select class="form-control required select2 " name="section2_agenda_status[]" id="agenda_status">
                                <option value="0">Select Agenda Status</option>
                                @foreach ($agenda_statuses as $agenda_status)
                                    <option value="{{$agenda_status->id}}">{{$agenda_status->projecttypename}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label >Sector</label>
                            <select  name="section2_sector[]" class="form-control select2" style="text-align: center !important" id="">
                                <option value="">Select Sector</option>
                                @foreach ($sectors as $sector)
                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div>
                            <label >Topic</label>
                            <input class="form-control" name="topic[]" id="topic" type="text"style="text-align:center;">
                            </div>
                            <div class="form-group" style="margin-top:10px">
                                <label for="">Time</label>
                                <select  name="section2_my_time[]" class="form-control select2" style="text-align: center !important" id="">
                                    <option value="">Select Time</option>
                                    @for ($i = 9; $i < 12; $i++)
                                    @for($j = 0; $j <= 45; $j+=15)
                                        @if($j == 0)
                                        <option value="{{$i . ' : ' . $j.'0' . ' AM' }}"> {{$i . " : " . $j .'0'}} AM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j . ' AM' }}"> {{$i . " : " . $j }} AM </option>
                                        @endif
                                    @endfor
                                    @endfor
                                    <option value="12 : 00 PM">12 : 00 PM</option>
                                    <option value="12 : 15 PM">12 : 15 PM</option>
                                    <option value="12 : 30 PM">12 : 30 PM</option>
                                    <option value="12 : 45 PM">12 : 45 PM</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                    @for($j = 0; $j <= 45; $j+=15)
                                        @if($j == 0)
                                        <option value="{{$i . ' : ' . $j.'0' . ' PM' }}"> {{$i . " : " . $j .'0'}} PM</option>
                                        @else
                                        <option value="{{$i . ' : ' . $j . ' PM'}}"> {{$i . " : " . $j }} PM </option>
                                        @endif
                                    @endfor
                                    @endfor

                                </select>
                            </div>
                            <div>
                                <input type="file" id="attachment" class="pull-left" name="section2_attachments[]" value="">
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section> --}}

  </section>

  <section class="">
          <?php $var = 1; $c = count($agendas)?>
          <form class="" action="{{route('store_agenda_comments')}}" method="post">
            {{ csrf_field() }}
          @foreach ($agendas as $agenda)
            <input type="hidden" name="hr_meeting_id" value="{{$meeting->id}}">
          @if($agenda->agenda_type_id == 2 || $agenda->agenda_type_id == 1)
            <section id="section_<?php echo $var?>" class="content col-md-12" style="display:none;">
                <div id="outerbox" class="box yewali_1 box-default">
                    <div  class="box-header with-border">
                        <ul class="list-group" id="isme">
                            <li class="list-group-item " id="field">
                                <div class="form-group row" style="margin-left:20px;margin-right:20px" id="main">

                                    <div>
                                        <label for="">Agenda Item</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $var++?>">
                                    </div>

                                    <div>
                                        <label for="">Agenda Type</label>
                                        <input type="text" disabled class="form-control" value="{{$agenda->AgendaType->name}}">
                                    </div>


                                    <div class="col-md-12">
                                        <label for="ex2">ADP No.</label>
                                    </div>
                                    <div class="col-md-12" style="padding:0 !important">
                                        <div class="col-md-5" style="padding:0 !important">
                                            <input disabled class="form-control" type="text"style="text-align:center;" name="financial_year" value="{{$agenda->financial_year}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" style="font-size:25px">/</label>
                                        </div>
                                        <div class="col-md-5" style="padding:0 !important">
                                            <input disabled value="{{$agenda->adp_no}}"class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="name_of_scheme">Name Of the Scheme</label>
                                        <input disabled value="{{$agenda->scheme_name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                    </div>

                                    <div>
                                        <label >Sector</label>
                                        <input disabled value="{{$agenda->HrSector->name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                    </div>

                                    <div>
                                        <label for="estimated_cost">Estimated Cost</label>
                                        <input disabled value="{{$agenda->estimated_cost}}" class="form-control" id="estimated_cost" name="estimated_cost[]" type="number" step = "0.01" style="text-align:center;">
                                    </div>
                                    <div>
                                        <label for="adp_allocation">ADP Allocation</label>
                                        <input disabled value="{{$agenda->adp_allocation}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="number" step = "0.01"style="text-align:center;">
                                    </div>
                                    <input type="hidden" name="agenda_id[]" value="{{$agenda->id}}">
                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Start Time</label>
                                        <input disabled value="{{$agenda->start_timeofagenda}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="text"style="text-align:center;">
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual Start Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="actual_start_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual End Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="actual_end_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    {{-- <div>
                                        <label >Decision</label>
                                        <select  name="agenda_decision[]" class="form-control select2" style="text-align: center !important" id="">
                                          <option value="">Select Decision</option>
                                            @foreach ($hr_decisions as $decision)
                                              <option value="{{$decision->id}}">{{$decision->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <div>
                                        <label >Comments</label>
                                        <textarea rows="4" value="" class="form-control" id="name_of_scheme" name="agenda_comments[]"></textarea>
                                    </div>

                                    <div  id="<?php echo $var?>" style="margin-top:20px">

                                        @if($var <= $c)
                                            <button class="btn btn-success add-more pull-right"  type="button">Next</button>
                                        @endif
                                        @if($var > $c)
                                            <button class="btn btn-success end pull-right"  type="submit">Finish</button>
                                        @endif
                                        @if($var > 2)
                                            <button class="btn btn-info pull-left remove-more"  type="button">Previous</button>
                                        @endif
                                        @if($var <= 2)
                                            <button class="btn btn-info pull-left back-more"  type="button">Back to Summary</button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            @else
            <section id="section_<?php echo $var?>" class="content col-md-12" style="display:none;">
                <div id="outerbox" class="box yewali_1 box-default">
                    <div  class="box-header with-border">
                        <ul class="list-group" id="isme">
                            <li class="list-group-item " id="field">
                                <div class="form-group row" style="margin-left:20px;margin-right:20px" id="main">
                                    <div>
                                        <label for="">Agenda Item</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $var++?>">
                                    </div>
                                    <div>
                                        <label for="">Agenda Type</label>
                                        <input type="text" disabled class="form-control" value="{{$agenda->AgendaType->name}}">
                                    </div>

                                    <div>
                                        <label for="">ADP #</label>
                                        <input disabled type="text" disabled class="form-control" value="None">
                                    </div>

                                    <div>
                                        <label for="name_of_scheme">Topic</label>
                                        <input disabled value="{{$agenda->scheme_name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                    </div>

                                    <div>
                                        <label >Sector</label>
                                        <input disabled value="{{$agenda->HrSector->name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Start Time</label>
                                        <input disabled value="{{$agenda->start_timeofagenda}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="text" style="text-align:center;">
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual Start Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important" >
                                            <input type='text' id="my_time"  name="actual_start_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual End Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="actual_end_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    {{-- <div>
                                        <label >Decision</label>
                                        <select  name="agenda_decision[]" class="form-control select2" style="text-align: center !important" id="">
                                          <option value="">Select Decision</option>
                                          @foreach ($hr_decisions as $decision)
                                            <option value="{{$decision->id}}">{{$decision->name}}</option>
                                          @endforeach
                                        </select>
                                    </div> --}}

                                    <div>
                                        <label >Comments</label>
                                        <textarea rows="4" value="" class="form-control" id="" name="agenda_comments[]"></textarea>
                                    </div>

                                    <div id="<?php echo $var?>" style="margin-top:20px">
                                        @if($var <= $c)
                                            <button class="btn btn-success add-more pull-right"  type="button">Next</button>
                                        @endif
                                        @if($var > $c)
                                            <button class="btn btn-success end pull-right"  type="submit">Finish</button>
                                        @endif
                                        @if($var > 2)
                                            <button class="btn btn-info pull-left remove-more"  type="button">Previous</button>
                                        @endif
                                        @if($var <= 2)
                                            <button class="btn btn-info pull-left back-more"  type="button">Back to Summary</button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            @endif
          @endforeach
        </form>

  </section>

</div>
@endsection
@section('scripttags')

<script>
    $('.get_time').on('click',function(){
        var dt = new Date();
      //  var time = dt.getHours() + ":" + dt.getMinutes() + " as" + dt.getTime().toString();

        var time = dt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })

        $(this).find('input').val(time);
        console.log('some shit');

    });

    // $(document).ready(function(){
    //     // $('section').hide();
    //     $('#section_1').show();
    //     console.log('workis');

    // });
    $('.conduct').on('click',function(){
        $('.initial').hide();
        $('#section_1').show('slow');
    });

    $('.add-agenda').on('click',function(){
        $('#section_agenda').show('slow');
    });

    $('.add-more').on('click',function(){
        var id = $(this).parent().attr('id');
        $('#section_'+(id-1)).hide();
        $('#section_'+id).show('slow');
    });

    $('.end').on('click',function(){

    });

    $('.remove-more').on('click',function(){
        var id = $(this).parent().attr('id');
        $('#section_'+(id-1)).hide();
        $('#section_'+(id-2)).show('slow');
    });

    $('.back-more').on('click',function(){
        var id = $(this).parent().attr('id');
        $('#section_'+(id-1)).hide();
        $('.initial').show('slow');
    });
</script>

@endsection
