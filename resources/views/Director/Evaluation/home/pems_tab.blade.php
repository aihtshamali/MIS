@extends('layouts.uppernav')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       EVALUATION MANAGEMENT SYSTEM
        <small>Global Progress</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
        <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          {{--  Chart 1  --}}
          <div class="box box-warning">
              <div class="box-header with-border ">
              <h3 class="box-title">Total Projects Assigned To Officers</h3>

              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
              </div>
              </div>
              @php
              $i=0;  
              $count=1; 
              @endphp
              <div class="box-body">
              <table class="table table-bordered table-stripped">
              <thead>
              <tr>
              <th>Sr.#</th>
              <th>Name Of Officer</th>
              <th># of Projects</th>
              <th>Action</th>
              </tr>
              </thead>
              @foreach ($officers as $officer)
              <tbody>
              <td>@php
              echo $count++;
              @endphp</td>
              <td>
              {{$officer->first_name}} {{$officer->last_name}}
              </td>
              <td>
              {{$assigned_projects[$i]}}
              </td>
              <td> <button type="button"  class=" seelist btn btn-warning" data-id="{{$officer->id}}" data-name="{{$officer->first_name}} {{$officer->last_name}}">
              See Project List
              </button></td>
              @php
              $i++;   
              @endphp

              @endforeach
              </table>
              </div>
              </tbody>
              <div class="modal fade" id="mymodal">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b></b></h4>
              </div>
              <div class="modal-body">
              <ol>

              </ol>
              </div>
              </div>
              <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            <!-- /.box-body -->
          </div>  
          <div class="box box-warning">
              <div class="box-header with-border collapsed-box">
              <h3 class="box-title">Officers Completed Projects </h3>

              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
              </div>
              </div>
              @php
              $i=0;  
              $count=1; 
              @endphp
              <div class="box-body">
              <table class="table table-bordered table-stripped">
              <thead>
              <tr>
              <th>Sr.#</th>
              <th>Name Of Officer</th>
              <th># of Projects</th>
              <th>Action</th>
              </tr>
              </thead>
              @foreach ($officers as $officer)
              <tbody>
              <td>@php
              echo $count++;
              @endphp</td>
              <td>
              {{$officer->first_name}} {{$officer->last_name}}
              </td>
              <td>
              {{$assigned_completed_projects[$i]}}
              </td>
              <td> <button type="button"  class=" seelist2 btn btn-warning" data-id="{{$officer->id}}" data-name="{{$officer->first_name}} {{$officer->last_name}}">
              See Project List
              </button></td>
              @php
              $i++;   
              @endphp

              @endforeach
              </table>
              </div>
              </tbody>
              <div class="modal fade" id="mymodalcompleted">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b></b></h4>
              </div>
              <div class="modal-body">
              <ol>

              </ol>
              </div>
              </div>
              <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            <!-- /.box-body -->
          </div>  
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
@section('scripttags')
<script>
 
 $('.seelist').click(function(){
   
    $("#mymodal").modal({
    backdrop: 'static',
    keyboard: false
   });
   var id=$(this).data('id');
   var name=$(this).data('name')
   $('.modal-body > ol').children().remove();
   $('.modal-title > b ').text('');
   $('.modal-title >b').append(name)

   $.ajax
   ({
    method: 'POST', // Type of response and matches what we said in the route
    url: 'getAssignedProjects',
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : id
      }, // a JSON object to send back
        async: false,
        success: function(data){
          data.forEach(element => {

            $('.modal-body > ol').append('<li>'+element.title+'</li><hr>')
          });
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });

  });

  $('.seelist2').click(function(){
   
   $("#mymodalcompleted").modal({
   backdrop: 'static',
   keyboard: false
  }); 
  var id=$(this).data('id');
  var name=$(this).data('name');
  
  $('.modal-body > ol').children().remove();
  $('.modal-title > b ').text('');
  $('.modal-title >b').append(name)

  $.ajax
  ({
   method: 'POST', // Type of response and matches what we said in the route
   url: 'getCompletedProjects',
   data: {
     "_token": "{{ csrf_token() }}",
     'data' : id
     }, // a JSON object to send back
       async: false,
       success: function(data){
         data.forEach(element => {
           $('.modal-body > ol').append('<li>'+element.title+'</li><hr>')
         });
       },
       error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
       console.log(JSON.stringify(jqXHR));
       console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
       }
   });

 });
</script>
@endsection