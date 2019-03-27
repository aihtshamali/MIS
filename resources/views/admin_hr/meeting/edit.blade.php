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
      <a class="btn btn-success pull-left" href="hassan:" style="margin-top: -10px;">Single Scan</a>
      <a class="btn btn-success pull-left" href="hassanduplex:" style="margin-top: -10px;" >Duplex Scan</a>
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
                Financial Year
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
                  Action
                </th>
                <th>
                    Attach MOMs
                </th>
          </tr>
          <?php $var = 1?>
          @foreach ($agendas as $agenda)
            <form id="form" class="form" action="{{ route('admin.update',$agenda->id) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              <tr>
                  <td>
                    <input type="text" name="agenda_item" class="form-control" value="{{$agenda->agenda_item}}">
                  </td>
                  <td style="width:10%">
                    <select class="form-control  select2" name="financial_year" id="financial_year">
                        @for($i = 2 ; $i <= 30 ; $i++)
                          @if($i == 9)
                            <option value="200{{$i}}-{{$i+1}}" {{ "200".$i."-".($i+1) == $agenda->financial_year ? "selected":"" }}>200{{$i}}-{{$i+1}}</option>
                          @elseif($i > 9)
                            <option value="20{{$i}}-{{$i+1}}" {{ "20".$i."-".($i+1) == $agenda->financial_year ? "selected":"" }}>20{{$i}}-{{$i+1}}</option>
                          @else
                            <option value="200{{$i}}-0{{$i+1}}" {{ "200".$i."-0".($i+1) == $agenda->financial_year ? "selected":"" }}>200{{$i}}-0{{$i+1}}</option>
                          @endif
                        @endfor
                  </select>
                  </td>
                  <td>
                    @if($agenda->adp_no)
                      <input type="text" name="adp_no" class="form-control" value="{{$agenda->adp_no}}">
                    @else
                    No ADP
                    @endif
                  </td>

                  <td>
                    <input type="text" name="name_of_scheme" class="form-control" value="{{$agenda->scheme_name}}">
                  </td>
                  <td>
                    <input type="text" name="estimated_cost" class="form-control" value="{{$agenda->estimated_cost}}">
                  </td>
                  <td>
                    <input type="text" name="adp_allocation" class="form-control" value="{{$agenda->adp_allocation}}">
                  </td>
                  <td>
                    @if(isset($agenda->HrAttachment->attachments))
                      <a href="{{asset('storage/uploads/projects/project_agendas/'.$agenda->HrAttachment->attachments)}}" download>{{$agenda->HrAttachment->attachments}}</a>
                      <input type="file" name="hr_attachment" value="">
                      <input type="hidden" name="hr_attachment_name" value="{{$agenda->HrAttachment->attachments}}">
                    @endif
                  </td>
                  <td>
                      @if (isset($agenda->HrMomAttachment->attachment))
                        <a href="{{asset('/storage/uploads/projects/meetings_mom/'.$agenda->HrMomAttachment->attachment)}}" download> {{$agenda->HrMomAttachment->attachment}}</a>
                        @else
                        <div>
                            <input type="hidden" name="meeting_id" value={{$meeting->id}}>
                            <input type="hidden" name="hr_agenda_id" value={{$agenda->id}}>
                            <input type="file" id="attachmentt" class="attach_moms pull-left" name="attach_moms">
                        </div>
                      @endif
                    </td>
                  <td>
                    {{ csrf_field() }}
                    <button type="submit" name="button" class="btn btn-success">SAVE</button>
                  </td>
                </form>
              </tr>
          @endforeach
      </table>
      <div class="col-md-7">
        <button id="add_agenda" class="btn btn-info pull-right newadd">Add Agenda</button>
      </div>

      {{-- //NEW FORM --}}
      <form class="form-horizontal" id="form_send" action="{{route('agendax')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <input type="hidden" name="meeting_id" id="" value="{{$agendas[0]->HrMeetingPDWP->id}}">
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

      {{-- END NEW FORM --}}
  </section>
</div>
@endsection
@section('scripttags')
<script>

  var next = 1;
  var items = []
  var attachments = []
  var pre = 0;
  var temp;
  var current;

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

    $(document).on('click','.newadd',function(){
      $('#section2').show('slow')
    })


    $('#agenda_type').on('change',function(){

        if(pre == 0){
        if($(this).val() == 2 || $(this).val() == 1){
          if($('#main').children().last().attr('id') != 'first_section'+next)
          {
            if($('#main').children().last().attr('id') == 'second_section'+next){
              $('#main').children().last().remove()
            }
            var item = $(section1).attr('id','first_section'+next)
            item.find("#financial_year").val('2017-18');
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
            item.find("#financial_year").val('2017-18');
            $('#main').append(item).children().last().show('slow');
            temp = $('#agenda_type').val()
          }
        }
        current = $('#main').children().last();
        }
        else{

        }
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

    var section1 = `<section id="first_section" style="display:none;">
                      <div>
                        <label for="ex1">Agenda item</label>
                      <input class="form-control" value="" style="text-align:center;" name="agenda_item" id="ex1" type="number">
                      </div>
                      <div>
                          <label for="">Agenda Status</label>
                          <select class="form-control required select2 " name="agenda_status" id="agenda_status">
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
                          <select class="form-control  select2 " name="adp_no" id="adp">
                              <option value="" selected>Select GS #</option>
                              <?php $counting = 0?>
                              @foreach ($adp as $a)
                                  <option value="{{$a->gs_no}},<?php echo $counting?>">{{$a->gs_no}}</option>
                                  <?php $counting += 1?>
                              @endforeach
                            </select>
                        {{-- <input class="form-control" id="ex2" name="adp_no" type="text"style="text-align:center;"> --}}
                      </div>
                      </div>
                      <div>
                        <label for="name_of_scheme">Name Of the Scheme</label>
                        <input class="form-control" id="name_of_scheme" name="name_of_scheme" type="text"style="text-align:center;">
                      </div>
                      <div>
                          <label >Sector</label>
                          <select  name="sector" class="form-control select2" style="text-align: center !important" id="sector_val">
                              <option value="">Select Sector</option>
                              @foreach ($sectors as $sector)
                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div>
                        <label for="estimated_cost">Estimated Cost</label>
                        <input class="form-control" id="estimated_cost" name="estimated_cost" type="number" step = "0.01" style="text-align:center;">
                      </div>
                      <div>
                        <label for="adp_allocation">ADP Allocation</label>
                        <input class="form-control" id="adp_allocation" name="adp_allocation" type="number" step = "0.01"style="text-align:center;">
                      </div>
                      <div class="form-group" id="datepick" style="margin-top:10px">
                        <label for="">Time</label>
                        <select  name="my_time" class="form-control select2" style="text-align: center !important" id="">
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
                        <input type="file" id="attachment" onchange='PreviewImage(this)' class="pull-left" name="attachments" value="">
                      </div>
                      <div class="col-md-12" style="margin-top:20px;">
                          <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)">Single Scan</a>
                          <a class="btn btn-success pull-left" href="hassanduplex:" onclick="stop(this)">Duplex Scan</a>
                      </div>
                    </section>`;
    var section2 = `<section id="second_section" style="display:none;">
                        <div>
                            <label for="ex1">Agenda item</label>
                          <input class="form-control" value="" style="text-align:center;" name="agenda_item" id="ex1" type="number">
                          </div>
                        <div>
                        <div>
                            <label for="">Agenda Status</label>
                            <select class="form-control required select2 " name="section2_agenda_status" id="agenda_status">
                              <option value="0">Select Agenda Status</option>
                              @foreach ($agenda_statuses as $agenda_status)
                                  <option value="{{$agenda_status->id}}">{{$agenda_status->projecttypename}}</option>
                              @endforeach
                            </select>
                          </div>
                          <label >Sector</label>
                          <select  name="section2_sector" class="form-control select2" style="text-align: center !important" id="">
                              <option value="">Select Sector</option>
                              @foreach ($sectors as $sector)
                            <option value="{{$sector->id}}">{{$sector->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div>
                          <label >Topic</label>
                          <input class="form-control" name="topic" id="topic" type="text"style="text-align:center;">
                        </div>
                        <div class="form-group" style="margin-top:10px">
                            <label for="">Time</label>
                            <select  name="section2_my_time" class="form-control select2" style="text-align: center !important" id="">
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
                          <input type="file" id="attachmentt" onchange='PreviewImage(this)' class="pull-left" name="section2_attachments" >
                      </div>
                      <div class="col-md-12" style="margin-top:20px;">
                          <a class="btn btn-success pull-left" href="hassan:"  onclick="stop(this)" >Single Scan</a>
                          <a class="btn btn-success pull-left" href="hassanduplex:"  onclick="stop(this)">Duplex Scan</a>
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
              });




</script>
@endsection
