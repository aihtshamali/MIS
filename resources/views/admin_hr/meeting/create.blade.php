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
    <div style="clear:both;max-height:100%;max-width:28%;position: absolute;top: 11.5%;left: 5%;">
      <iframe id="viewer" frameborder="0" scrolling="no" style="width: 100%;height: 100%;"></iframe>
    {{-- <input type="button" value="Preview" onclick="PreviewImage();" /> --}}

    </div>

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
                  <select id="type_of_meetings" required name="type_of_meeting" class="form-control select2" style="width: 100%;margin-bottom:10px;">
                    <option >Select Meeting Type</option>
                    @foreach ($meeting_types as $meeting_type)
                      <option value="{{$meeting_type->id}}">{{$meeting_type->meeting_name}}</option>
                    @endforeach
                  </select>
                  <div id="meeting">
                    <label for="ex1">Meeting Number</label>
                    <input class="form-control" name="meeting_no" id="ex1" type="text">
                  </div>
                  <div class="datess" style="display:none;">
                    <label class="control-label">Date</label>
                    <div class="form-group" id="datepick" style="margin-top:10px">
                      <div class='input-group col-sm-12 date' id='my_date_awaein' >
                          <input type='text' id="my_date" required name="my_date" class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div>
                      <input  style="margin-bottom:10px;" type="file" id="meeting_attachment" class="pull-left" name="meeting_attachment" value="">

                  </div>
                  <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)" >Scan Document</a>
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
                      {{-- Insertion Point --}}
                  </div>

                  <div style="margin-top:20px">
                      <button id="finish_btn" class="btn btn-info pull-right"  type="submit">Finish</button>
                  </div>
            {{-- <button id="b9" class="btn btn-success pull-left" type="button">Scan Documents</button> --}}

               </li>
            </ul>
        </div>
      </div>
    </section>
  </form>

</div>
@endsection
@section('scripttags')
  {{-- <script src="{{asset('bower_components/jquery/dist/scanner.js')}}"></script> --}}

{{-- <script type="text/javascript" src="{{asset('bower_components/jquery/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  {{-- <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{asset('js/AdminLTE/bootstrap-datepicker.min.js')}}"></script> --}}
<script>
  var count1 = 1
    // var d = new Date();
    // document.getElementById("d").innerHTML = d.toLocaleDateString("en-US");
    var section1 = `<section id="first_section" style="display:none;">
                      <div>
                        <label for="ex1">Agenda item</label>
                      <input class="form-control" value="'count1++'" style="text-align:center;" name="agenda_item[]" id="ex1" type="number">
                      </div>
                      <div>
                          <label for="">Agenda Status</label>
                          <select class="form-control required select2 " name="agenda_status[]" id="agenda_status">
                            <option value="">Select Agenda Status</option>
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
                        {{-- <input class="form-control" type="text"style="text-align:center;" name="financial_year" value="2017-2018"> --}}
                      </div>
                      <div class="col-md-1">
                        <label for="" style="font-size:25px">/</label>
                      </div>
                      <div class="col-md-4" style="padding:0 !important">
                          <select class="form-control  select2 " name="adp_no[]" id="adp">
                              <option value="" selected>Select GS #</option>
                              <?php $counting = 0?>
                              @foreach ($adp as $a)
                                  <option value="{{$a->gs_no}},<?php echo $counting?>">{{$a->gs_no}}</option>
                                  <?php $counting += 1?>
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
                      <div class="myAttachment">
                        <input type="file" id="attachment" onchange='PreviewImage(this)' class="pull-left" name="attachments[]" value="">
                      </div>
                      <div class="col-md-12" style="margin-top:20px;">
                          <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)">Single Scan</a>
                          <a class="btn btn-success pull-left" href="hassanduplex:" onclick="stop(this)">Duplex Scan</a>
                          <button id="previous" class="btn btn-success" type="button">Previous</button>
                          <button id="b3" class="btn btn-success add-more"  type="button">Next</button>
                      </div>
                    </section>`;
    var section2 = `<section id="second_section" style="display:none;">
                        <div>
                            <label for="ex1">Agenda item</label>
                          <input class="form-control" value="" style="text-align:center;" name="agenda_item[]" id="ex1" type="number">
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
                        <div class="myAttachment">
                          <input type="file" id="attachmentt" onchange='PreviewImage(this)' class="pull-left" name="section2_attachments[]" >
                      </div>
                      <div class="col-md-12" style="margin-top:20px;">
                          <a class="btn btn-success pull-left" href="hassan:"  onclick="stop(this)" >Single Scan</a>
                          <a class="btn btn-success pull-left" href="hassanduplex:"  onclick="stop(this)">Duplex Scan</a>
                          <button id="previous" class="btn btn-success" type="button">Previous</button>
                          <button id="b3" class="btn btn-success add-more"  type="button">Next</button>
                      </div>
                    </section>`;
          function stop(e){
            $(e).attr('disabled',true)
            setTimeout(()=>{
              $(e).attr('disabled',false)
            // console.log('or are we here????')
            },10000)
          }
          function PreviewImage(e) {
                pdffile=$(e)[0].files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                $('#viewer').attr('src',pdffile_url);
              }
              $("document").ready(function(){

              $("#attachmentt").change(function() {
                console.log('asdn sanfjsdnvjkndvndsnkjx sjkx ds');
              });
              });
              $(document).on('change','#attachmentt',function(){
                console.log('asdn sanfjsdnvjkndvndsnkjx sjkx ds');

                PreviewImage();
              })
  var next = 1;
  var items = []
  var attachments = []
  var pre = 0;
  var temp;
  var current;
  $(document).ready(function(){
    $("#financial_year").val('2019-20');
  });
$(document).on('click','.add-more',function(e){

      if(pre == 0)
      {
        console.log('if')
        $('#field').find('section').hide();
        $('#agenda_type').prop('disabled', false);
        items.push($('#agenda_type').val());
        attachments.push($('#attachment').val());
        $('#main').children().last().hide('slow');
        next = next+1;
        $('#agenda_type').val(0);
        $('html,body').animate({scrollTop:0},0);
      }
      else{
        pre = pre - 1;
        current.hide();
        current = current.next();
        pdffile=current.children('.myAttachment').children()[0].files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').attr('src',pdffile_url);
        current.show('slow');
        if(pre == 0)
        {
          $('#agenda_type').val(temp);
          $('#agenda_type').prop('disabled', false);
        }
        else
          $('#agenda_type').val(items[next-1 -pre])
         console.log('pre',pre);
      }
  });

  $(document).on('click','#previous',function(e){
    pre = pre + 1;
    current.hide();
    current = current.prev();
    // console.log(current.prev());
    // TODO
    // console.log(current);
    console.log(current.children('.myAttachment').children()[0].files[0]);
      pdffile=current.children('.myAttachment').children()[0].files[0];
      pdffile_url=URL.createObjectURL(pdffile);
      $('#viewer').attr('src',pdffile_url);
    $('#agenda_type').val(items[next-1 -pre])
    $('#agenda_type').prop('disabled', true);
    current.show('slow');
  });

   $('#agenda_type').on('change',function(){

     if(pre == 0){
      if($(this).val() == 2 || $(this).val() == 1){
        if($('#main').children().last().attr('id') != 'first_section'+next)
        {
          if($('#main').children().last().attr('id') == 'second_section'+next){
            $('#main').children().last().remove()
          }
          var item = $(section1).attr('id','first_section'+next)
          item.find("#financial_year").val('2019-20');
          $('#main').append(item).children().last().show('slow');
          temp = $('#agenda_type').val()
        }
      }
      else{
        if($('#main').children().last().attr('id') != 'second_section'+next){

          if($('#main').children().last().attr('id') == 'first_section'+next){
            $('#main').children().last().remove()
          }
          var item = $(section2).attr('id','second_section'+next)
          item.find("#financial_year").val('2019-20');
          $('#main').append(item).children().last().show('slow');
          temp = $('#agenda_type').val()
        }
      }
      current = $('#main').children().last();
     }
     else{

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
      $('.datess').show('slow');


    });

    $('#next').on('click',function(){
      if ($("input:invalid").length) {
        alert('Enter Date');
      }
      else{
      $('#section1').hide('slow');
      $('#section2').show('slow');
      $('.yewali_'+next).find("#ex1").val(""+next);
      }
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

          $(document).on('change','#nonadp',function(){
            // console.log($('#nonadp').is(':checked'),$('#nonadp'));

            if(current.find('#nonadp').is(':checked') == true)
              {
                current.find('#adpdiv *').prop('disabled',true);
                console.log('test');
              }
            else
              current.find('#adpdiv *').prop('disabled',false);
            current.find('#nonadp').prop('disabled',false);
          });


          $(document).on('change','#adp',function(){
            var arr = $(this).val().split(',')
            console.log(projects[arr[1]]);

            if($('#agenda_type').val() == 1 || $('#agenda_type').val() == 2 ){
              console.log(next,pre);

              $("#first_section"+(next-pre)+" > div > input#name_of_scheme").val(projects[arr[1]].name_of_scheme);
              // $("#first_section"+next+" > div > #sector_val")(projects[arr[1]].sector);
              $("#first_section"+(next-pre)+" > div > #sector_val").val($("#first_section"+(next-pre)+" > div > #sector_val option").filter(function () { return $(this).html() == projects[arr[1]].sector; }).val());
              $("#first_section"+(next-pre)+" > div > #estimated_cost").val(projects[arr[1]].total_cost);
              // $("#first_section"+(next-pre)+" > div > #agenda_status").val(projects[arr[1]].type_of_project);
              // console.log(arr[2]);
              if(projects[arr[1]].type_of_project == "NEW SCHEMES")
                {$("#first_section"+(next-pre)+" > div > #agenda_status").val(1);}
              else
                {$("#first_section"+(next-pre)+" > div > #agenda_status").val(2);}
            }
          });

$(document).on('click','.scan',function(){
  console.log('works');

  $.ajax({
  method: 'POST', // Type of response and matches what we said in the route
  url: '/printerfunction', // This is the url we gave in the route
  data: {
    "_token": "{{ csrf_token() }}",
    'data' : 'nothing'}, // a JSON object to send back
  success: function(response){ // What to do if we succeed
    console.log(response,'yahi hai');

  },
  error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
      console.log(JSON.stringify(jqXHR));
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
  }
  })
  //
  // console.log('nope');

});

  $(document).on('click','#THE-REAPER',function(){
    console.log('Reaper called',$(this));
    $("#attachmentt").click();
  });

  $(document).on('change','#financial_year',function(){
    axios.post('{{route("fetch_financial_year")}}',{
        financial_year:$(this).val()
        })
        .then((response) => {
          projects = response.data;
          counter = 0;
          $('#adp').empty();
          $('#adp').append('<option value="" selected>Select GS #</option>');
          $.each(projects,function(key,element){
            $('#adp').append('<option value='+element.gs_no+','+counter+'>'+element.gs_no+'</option>');
            counter++;
          });
        })
        .catch(function (error) {
          console.log(error);
        });
      });

  // $(document).on('click','.testexe',function(){
  //   window.open("hassan:");
  //   console.log('bad me')
  // });
</script>
@endsection
