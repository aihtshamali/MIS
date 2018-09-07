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

  <section class="content col-md-12">
        <?php $var = 1; $c = count($agendas)?>
        <div class="box yewali_1 box-default">
            <div  class="box-header with-border">
                <ul class="list-group" id="isme">
                    @foreach ($agendas as $agenda)
                        <li class="list-group-item col-md-12" id="field">
                            <div class="form-group row">
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
                                            2017-18/
                                        </div>
                                        <div class="col-md-6"style="padding:0 !important">
                                            <input disabled value="{{$agenda->adp_no}}"class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="name_of_scheme">Name Of the Scheme</label>
                                    <input disabled value="{{$agenda->scheme_name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                </div>

                                <div class="col-md-2">
                                    <label >Sector</label>
                                    <input disabled value="{{$agenda->HrSector->name}}" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"style="text-align:center;">
                                </div>

                                <div class="col-md-2">
                                    <label for="estimated_cost">Estimated Cost</label>
                                    <input disabled value="{{$agenda->estimated_cost}}" class="form-control" id="estimated_cost" name="estimated_cost[]" type="number" step = "0.01" style="text-align:center;">
                                </div>
                                <div class="col-md-2">
                                    <label for="adp_allocation">ADP Allocation</label>
                                    <input disabled value="{{$agenda->adp_allocation}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="number" step = "0.01"style="text-align:center;">
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
  </section>

  <section class="content">
          <?php $var = 1; $c = count($agendas)?>
          
          @foreach ($agendas as $agenda)
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

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Start Time</label>
                                        <input disabled value="{{$agenda->start_timeofagenda}}" class="form-control" id="adp_allocation" name="adp_allocation[]" type="text"style="text-align:center;">
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual Start Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="my_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual End Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="my_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label >Decision</label>
                                        <select  name="section2_decision" class="form-control select2" style="text-align: center !important" id="">
                                            <option value="Approved">Approved</option>     
                                            <option value="Deffered">Deffered</option>                              
                                            <option value="Rejected">Rejected</option>                              
                                            <option value="Get Clearance">Cost Clearance</option>                              
                                            <option value="Withdrawn">Withdrawn</option>                              
                                        </select>
                                    </div>

                                    <div>
                                        <label >Comments</label>
                                        <textarea rows="4" value="" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"></textarea>
                                    </div>

                                    <div  id="<?php echo $var?>" style="margin-top:20px">
                                        
                                            @if($var <= $c)
                                        <button class="btn btn-success add-more pull-right"  type="button">Next</button>
                                        @endif
                                        @if($var != 2)
                                            <button class="btn btn-info pull-left remove-more"  type="submit">Previous</button>
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
                                            <input type='text' id="my_time"  name="my_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group" id="datepick" style="margin-top:10px">
                                        <label for="">Actual End Time</label>
                                        <div class='input-group col-sm-12 date get_time' id='my_time' style="padding: 0 !important">
                                            <input type='text' id="my_time"  name="my_time[]" class="form-control" />
                                            <span class="input-group-addon ">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label >Decision</label>
                                        <select  name="section2_decision" class="form-control select2" style="text-align: center !important" id="">
                                            <option value="Approved">Approved</option>     
                                            <option value="Deffered">Deffered</option>                              
                                            <option value="Rejected">Rejected</option>                              
                                            <option value="Get Clearance">Cost Clearance</option>                              
                                            <option value="Withdrawn">Withdrawn</option>                              
                                        </select>
                                    </div>

                                    <div>
                                        <label >Comments</label>
                                        <textarea rows="4" value="" class="form-control" id="name_of_scheme" name="name_of_scheme[]" type="text"></textarea>
                                    </div>
                                   
                                    <div id="<?php echo $var?>" style="margin-top:20px">
                                        @if($var <= $c)
                                        <button class="btn btn-success add-more pull-right"  type="button">Next</button>
                                        @endif
                                        @if($var != 2)
                                            <button class="btn btn-info pull-left remove-more"  type="submit">Previous</button>
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

    $('.add-more').on('click',function(){
        var id = $(this).parent().attr('id');        
        $('#section_'+(id-1)).hide();
        $('#section_'+id).show('slow');
    });
    $('.remove-more').on('click',function(){
        var id = $(this).parent().attr('id');        
        $('#section_'+(id-1)).hide();
        $('#section_'+(id-2)).show('slow');
        
    });
    
</script>
          
@endsection