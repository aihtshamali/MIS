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
    Add New PDWP Meeting 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <section class="content">
  <form class="form-horizontal" id="form_send" action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="agenda_type_items[]" id="agenda_type_items" value="">
      <section id="section1">
        <div id="outerbox" class="box box-default">
          <div  class="box-header with-border">
            <h3 class="box-title">Select Meeting Type</h3>
    
            {{-- <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div> --}}
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div id="inner_items" class="col-md-6">
                <div class="form-group">
                  <label>Type of Meeting</label>
                  <select id="type_of_meetings" name="type_of_meeting" class="form-control select2" style="width: 100%;">
                    <option >Select Meeting Type</option>
                    @foreach ($meeting_types as $meeting_type)
                      <option value="{{$meeting_type->id}}">{{$meeting_type->meeting_name}}</option>
                    @endforeach
                  </select>
                  <div id="meeting">
                  <label for="ex1">Meeting Number</label>
                  <input class="form-control" name="meeting_no" id="ex1" type="text">
                  </div>
                  <label class=" control-label">Date</label>
                  <div class="form-group" id="datepick" style="margin-top:10px">
                    <div class='input-group col-sm-12 date' id='my_date_awaein' >
                         <input type='text' id="my_date" required name="my_date" class="form-control" />
                         <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                     </div>
                  </div>
            <button id="next" class="btn btn-success" type="button">Next</button>


                </div>
              </div>
              
            </div>
          </div>
        </div>
    </section>

    <section id="section2" class="content col-md-12" style="display:none;">
      <div id="outerbox" class="box yewali_1 box-default">
        <div  class="box-header with-border">
            <ul class="list-group" id="isme">
              <li class="list-group-item " id="field">
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
                        <div class="col-md-12" style="padding:0 !important">
                            <div class="col-md-5" style="padding:0 !important">
                          <input class="form-control" type="text"style="text-align:center;" name="financial_year" value="2017-2018">
                        </div>
                        <div class="col-md-2">
                          <label for="" style="font-size:25px">/</label>
                        </div>
                        <div class="col-md-5" style="padding:0 !important">
                            <select class="form-control  select2 " name="adp_no[]" id="adp">
                                <option value="0">Select GS #</option>
                                @foreach ($adp as $a)
                                    <option value="{{$a->gs_no.','.$a->name_of_scheme.','.$a->type.','.$a->total_cost.','.$a->sector.','.$a->{'Allocation-2017-18'}.','.$a->est_cost_faid}}">{{$a->gs_no}}</option>
                                @endforeach
                              </select>
                          {{-- <input class="form-control" id="ex2" name="adp_no[]" type="text"style="text-align:center;"> --}}
                        </div>
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
                        </section>
                      </div>
                      
                        <div style="margin-top:20px">
                            {{-- <input type="file" id="attachment" class="pull-left" name="attachments" value=""> --}}
                            <button  class="btn btn-success pull-left"  type="button">Scan Document</button>
                            <button id="b3" class="btn btn-success add-more"  type="button">Next</button>
                            <button id="finish_btn" class="btn btn-info pull-right"  type="submit">Finish</button>
                        </div>
            {{-- <button id="b9" class="btn btn-success pull-left"  type="button">Scan Documents</button> --}}
            
          </li>
            </ul>
        </div>
      </div>
    </section>
  </form>

</div>
@endsection
@section('scripttags')
  {{-- <script type="text/javascript" src="{{asset('bower_components/jquery/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  {{-- <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}
<script>
    var d = new Date();
    document.getElementById("d").innerHTML = d.toLocaleDateString("en-US");
    </script>
<script>

  var next = 1;
  var items = []
  var attachments = []
$(document).on('click','.add-more',function(e){
      // console.log("jeer");
      
      
      items.push($('#agenda_type').val());
      attachments.push($('#attachment').val());

      $('#field').find('#first_section'+next).hide();
      $('#field').find('#second_section'+next).hide();
      next = next+1;
      $('#field').find('#first_section'+(next-1)).clone().attr('id','first_section'+next).find("input:text").val("").end().appendTo("#main");
      $('#field').find('#second_section'+(next-1)).clone().attr('id','second_section'+next).find("input:text").val("").end().appendTo("#main");
      $('#agenda_type').val(0)
      // $('.yewali_'+next).clone().addClass('yewali_'+(next +1)).removeClass('yewali_' + next)
      // .find("input:text").val("").end()
      // .appendTo('#section2').hide();
      // $('.yewali_'+next).hide();
      // next = next + 1;
      // console.log(next);
      
      // $('.yewali_'+next).show('slow');
      // $('.yewali_'+next).find("#ex1").val(""+next);
  });

   $('#agenda_type').on('change',function(){
      // console.log();
      
      // console.log('Here');
      // console.log(items);
      
      if($(this).val() == 2 || $(this).val() == 1){
        $('#field').find('#second_section'+next).hide();
        $('#field').find('#first_section'+next).show('slow');
        $('#field').find('#first_section'+next).find("#ex1").val(next);
        // $('#second_section').hide();
        // $('.yewali_'+next).find('#first_section').show('slow');
      }
      else{
        $('#field').find('#first_section'+next).hide();
        $('#field').find('#second_section'+next).show('slow');
        $('#field').find('#second_section'+next).find("#ex1").val(next);
        // $('.yewali_'+next).find('#first_section').hide();
        // $('.yewali_'+next).find('#second_section').show('slow');
      }

    });
        
    $('#type_of_meetings').on('change',function(){
      // console.log();
      if($(this).val() == 2){
      $('#meeting').show('slow');
      }
      else{
      $('#meeting').hide();

      }

    });

    $('#next').on('click',function(){
      $('#section1').hide('slow');
      $('#section2').show('slow');
      $('.yewali_'+next).find("#ex1").val(""+next);
      
    });

    $('#my_date').datetimepicker({
                viewMode: 'years',
                format: 'DD-MM-YYYY'
  });
  $('#my_time').datetimepicker({
                viewMode: 'months',
                format: "HH:MM"
  });
  $('#section2_my_time').datetimepicker({
                viewMode: 'months',
                format: "HH:MM"
  });

  $('#finish_btn').on('click',function(e){
    e.preventDefault();
    items.push($('#agenda_type').val());
      attachments.push($('#attachment').val());
      console.log(items);
      
    $("#agenda_type_items").val(items);
    // $("#attachment").val(attachments);
    $("#form_send").submit();
  });
    
        $(document).on('change', '#type_of_meetings', function() {
            var opt = $(this).find(':selected').text();
            if(opt == "Special Meeting"){
              $("#second_specialmeetings").show('slow');
              $("#second_regularmeetings").hide('slow');
          
          
            }
            else if(opt == "Regular Meeting"){
              $("#second_regularmeetings").show('slow');
              $("#second_specialmeetings").hide('slow');
          
            }
          });
          $(document).on('change', '#phase_of_evaluation', function() {
          var opt = $(this).find(':selected').text();
          if(opt == "New Evaluation"){
            $("#fourth").hide();
            $('#table1').hide("slow");
            $("#section1").hide('slow');
            $("#section2").show('slow');
          }
          else if (opt == "RE Evaluation") {
            $("#monitoring_fourth").hide();
            $("#fourth").show('slow');
          }
          });
          
          $(document).on('change', '#phase_of_monitoring', function() {
          var opt = $(this).find(':selected').text();
          if(opt == "New Monitoring"){
            $("#monitoring_fourth").hide();
            $('#table1').hide("slow");
            $("#section1").hide('slow');
            $("#section2").show('slow');
          }
          else if (opt == "RE Monitoring") {
            $("#monitoring_fourth").show("slow");
            $("#fourth").hide();
          }
          });
          
          $(document).on('change','#adp',function(){
            var arr = $(this).val().split(',')
            console.log(arr);

            if($('#agenda_type').val() == 1 || $('#agenda_type').val() == 2 ){
              
              $("#first_section"+next+" > div > input#name_of_scheme").val(arr[1]);
              $("#first_section"+next+" > div > #sector_val").val(arr[5]);
              $("#first_section"+next+" > div > #estimated_cost").val(arr[7]);
              console.log(arr[2]);
              if(arr[3] == "NEW SCHEMES")
                {$("#first_section"+next+" > div > #agenda_status").val(0);}
              else
                {$("#first_section"+next+" > div > #agenda_status").val(1);}



            }
            else{
              $("#second_section"+next+" > div > #topic").val(arr[1]);
            }
          });


</script>
@endsection