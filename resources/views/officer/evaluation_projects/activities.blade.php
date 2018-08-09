@extends('layouts.uppernav')

@section('styletag')
  <style media="screen">
    a{
      color: unset;
    }
    a:hover{
      color: unset !important;
      cursor: pointer !important;
    }
    .progressbar {
        counter-reset: step;
    }
    .progressbar li:hover{
      color: green;
    }
    .progressbar li {
        list-style-type: none;
        width: 25%;
        float: left;
        font-size: 12px;
        position: relative;
        text-align: center;
        text-transform: uppercase;
        color: #7d7d7d;
    }
    .progressbar li:before {
        width: 30px;
        height: 30px;
        content: counter(step);
        counter-increment: step;
        line-height: 30px;
        border: 2px solid #7d7d7d;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        border-radius: 50%;
        background-color: white;
    }
    .progressbar li:after {
        width: 100%;
        height: 2px;
        content: '';
        position: absolute;
        background-color: #7d7d7d;
        top: 15px;
        left: -50%;
        z-index: -1;
    }
    .progressbar li:first-child:after {
        content: none;
    }
    .progressbar li.active {
        color: green;
    }
    .progressbar li.active:before {
        border-color: #55b776;
    }
    .progressbar li.active + li:after {
        background-color: #55b776;
    }
    .bs-example{
        margin: 200px 150px 0;
    }
    .popover-title .close{
        position: relative;
        bottom: 3px;
    }

  </style>
@endsection
@section('content')

<div class="content-wrapper">
    {{-- <!-- Content Header (Page header) --> --}}
    <section class="content-header">
        <h1>
        In-Progress Evaluation Activities
         {{-- <span class="label label-danger">{{$project_id}}</span> --}}
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

        </ol>
    </section>

    {{-- <!-- Main content --> --}}
    <section class="content">
      {{-- row 1 --}}

      <div class="row">

        <div class="col-md-12 col-xs-6" >
            <div class="box box-warning">

              <div class="box-header with-border">

                <p>
                   Project Number : <b> {{$project_data[0]->project->project_no}} </b></br>
                </p>
                <p >
                   Project Name :<b> {{$project_data[0]->project->title}}  </b></br>
                </p>

                <p>
                   Project Members :<b> {{$project_data[0]->user->first_name}} </b></br>
                </p>


                <div class="box-tools pull-right">
                {{-- <button  href="#" type="button" class="btn btn-xs btn-primary"> EDIT</button> --}}
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>

                </div>
                 <hr/>
                <b>
                        GLOBAL PROGRESS
                </b>

                <div class="progress">

                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                        10% Complete
                        </div>
                      </div>
              </div>
              <div class="box-body">
               <div class="row" >
                <div class="col-md-12 col-xs-6">


                    <div class="table-responsive">
                <form action="#" method="POST">
                        {{csrf_field()}}
                      <table class="table table-hover table-striped">
                            <b>ACTIVITY CHART</b>
                        <thead >
                            <th style="text-align:center;" >No.</th>
                            <th style="text-align:center;">Activity Name</th>
                            <th style="text-align:center;">Activity Progress</th>
                            <th style="text-align:center;">Remarks</th>
                        </thead>
                        <tbody style="text-align:center;">

                            @foreach($activities as $activity)
                            <tr>
                            <td> {{$activity->ProjectActivity->id}} </td>
                            <td> {{$activity->ProjectActivity->name}} </td>
                            <td>
                              <div>
                                <ul class="progressbar">
                                @if($activity->progress >= 25.0)
                                <a   rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}})'>Save</button>">
                                  <input type="hidden" class="{{$activity->id}}" name="percent" value="25,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li class="active">25%</li>
                                  </input>
                                </a>
                              @else
                                <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},25)'>Save</button>">
                                  <input type="hidden" class="25_{{$activity->id}}" name="percent" value="25,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li>25%</li>
                                  </input>
                                </a>
                              @endif
                              @if ($activity->progress >= 50.0)
                                <a  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}})'>Save</button>">
                                  <input type="hidden" class="{{$activity->id}}" name="percent" value="50,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li class="active">50%</li>
                                  </input>
                                </a>
                              @else
                                <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},50)'>Save</button>">
                                  <input type="hidden" class="50_{{$activity->id}}" name="percent" value="50,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li>50%</li>
                                  </input>
                                </a>
                              @endif
                              @if ($activity->progress >= 75.0)
                                <a   rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}})'>Save</button>">
                                  <input type="hidden" class="{{$activity->id}}" name="percent" value="75,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li class="active">75%</li>
                                  </input>
                                </a>
                              @else
                                <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},75)'>Save</button>">
                                  <input type="hidden" class="75_{{$activity->id}}" name="percent" value="75,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li>75%</li>
                                  </input>
                                </a>
                              @endif
                              @if ($activity->progress >= 100.0)
                                <a  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}})'>Save</button>">
                                  <input type="hidden" class="{{$activity->id}}" name="percent" value="100,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li class="active">100%</li>
                                  </input>
                                </a>
                              @else
                                <a class="btn"  rel='popover' data-placement='bottom' data-original-title='Confirm' data-html="true" data-content="<button type='button' class='btn btn-success' onClick='saveData({{$activity->id}},100)'>Save</button>">
                                  <input type="hidden" class="100_{{$activity->id}}" name="percent" value="100,{{$project_data[0]->project->id}},{{$activity->id}}">
                                    <li>100%</li>
                                  </input>
                                </a>
                              @endif
                              </ul>
                            </div>
                              {{-- <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                                {{$activity->weightage}}% Complete
                                </div>
                                </div> --}}
                            </td>
                            <td>

                            <a href="#commentModal"  class="btn btn-primary commentModal"  data-toggle="modal" data-id="{{$activity->id}}">Problematic?</a>

                        </td>


                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="form-group">
                      <select name="attachment_activity" id="" class="select2 form-control" style="display:inline">
                          <option value="">Select Activity For Attachments</option>
                          @foreach($activities as $activity){
                            <option value="{{$activity->id}}">{{$activity->name}}</option>
                          @endforeach
                      </select>
                      <input type="file" name="activity_attachments">
                    </div>

                      <input type="hidden" name="id" style="display:inline;float:right" value="{{$project_data[0]->project_id}}">
                      <button type="button" class="btn btn-success pull-right" >Submit
                      </button>
                </form>

                    </div>

                      </div>

               </div>
              </div>
          </div>
        </div>

       </div>


    </section>

</div>

// Modal Box


<div class="modal" data-keyboard="false" data-backdrop="static" id ="commentModal" tabindex="=-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="{{route('Problematicremarks.store')}}" method="POST">
             {{csrf_field()}}
            <div class="modal-body">

                    <div class="form-group">
                        <input  type=hidden name="activity_id" value="">
                        <input type=hidden name="project_id" value="{{$project_id}}">

                        <label for="inputcomments"> Write Here</label>
                        <input class="form-control" placeholder="Your Comments" type="text" id="inputcomments">

                    </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"> Submit</button>

            </div>
        </form>
        </div>

    </div>

</div>

@endsection

@section('scripttags')
<script>
$(".commentModal").on("click", function () {
    var myBookId = $(this).data('id');
    $('input[name="activity_id"]').val( myBookId );
});

function saveData(id,number){
  console.log(number);
  console.log($('.'+number+'_'+id).val());
  opt = $('.'+number+'_'+id).val();
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/officer/save_percentage', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      // console.log(response);
      location.reload();
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
}

$('#btn-confirm').on('click',function(){
  $('#myModal').modal({
    show:true
  });
});

$(document).ready(function(){

    $('.btn').popover();

    $('.btn').on('click', function (e) {
        $('.btn').not(this).popover('hide');
    });


});
// $('.popoverbtn').popover();
//
// $('.popoverbtn').on('click',function(e){
//   var d=$(this).data('value');
// console.log(d);
// $('.popoverbtn').not(this).popover('hide');
//
// $('.popoverbtn').popover({
//        placement : 'bottom',
//        html : true,
//        live : true,
//        title : ' Confirmation Tab<a href="#" class="close" data-dismiss="alert">&times;</a>',
//        content : '<div class="media"><form action="{{route('Problematicremarks.store')}}" method="POST">\
//         {{csrf_field()}}\
//        <div class="modal-body">\
//                <div class="form-group">\
//                    <input  type=hidden name="activity_id" value="">\
//                    <input type=hidden name="project_id" value="{{$project_id}}">\
//                    <label for="inputcomments"> Write Here</label>\
//                    <input class="form-control" placeholder="Your Comments" type="text" id="inputcomments">\
//                </div></div>\
//        <div class="modal-footer">\
//            <button class="btn btn-primary"> Submit</button>\
//        </div></form></div>'
//    });
//  });
   // $(document).on("click", ".popover .close" , function(){
   //     $(this).parents(".popover").popover('hide');
   // });

</script>
@endsection
