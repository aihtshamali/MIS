@extends('layouts.uppernav')
@section('styletags')
  <style>
   .officer, .manager{
    display:none;
  }

  </style>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
      PROJECT EVALUATION MANAGEMENT SYSTEM

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
      <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    {{--  sekect consulatants  --}}
    {{-- {{dd($project_id)}} --}}
    <form method="POST" action="{{route('store_from_director')}}">
      {{ csrf_field() }}

      <input type="hidden" name="project_id" value="{{$project_id}}">
      <input type="hidden" name="priority" value="{{$priority}}">
    <div class="row">
      <div class="col-md-12">
        {{--  Chart 1  --}}
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Assign To : </h3>
            <span style="margin-left:20px;"></span>

            <b><input type="radio" name="assign_to" value="officer"> Officer</b>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="officer">
              <select class="form-control select2" multiple="multiple" data-placeholder="Select an Officer"
                      style="width: 100%;" name="officer_id[]">
                  @foreach ($officers as $officer)
                    @php
                      $head='';
                    @endphp
                    @if($officer->sector->name!=$head)
                    <optgroup label = "{{$officer->sector->name}}">
                    @endif
                      <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}}</option>
                    @if($officer->sector->name!=$head && $head!='')
                    </optgroup>
                        @php
                        $head=$officer->sector->name;
                        @endphp
                    @endif

                  @endforeach
              </select>
            </div>


          </div>
        </div>
      </div>
    </div>
        {{--choose team lead    --}}
    <div class="row TeamLead" style="display:none">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Select Team Lead</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <th>Officer Name</th>
                        <th>Pick Team Leader</th>
                      </thead>
                      <tbody class="team_lead">

                      </tbody>
                    </table>
                </div>
          </div>
        </div>
      </div>
    </div>
    {{--  button  --}}
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6"></div>
      <div class="col-md-5"></div>
      <div class="col-md-7">
        <div class="box-tools pull-right">
            <button type="submit" class="btn btn-success" > Make Assignment
            </button>
        </div>
      </div>
    </div>
  </form>
  </section>

@endsection
@section('scripttags')
<script>
$(document).ready(function() {
  $('input[name="assign_to"]').on('change',function(){
    if($(this).val()=='manager'){
      $('div.officer').hide('top');
      $('div.manager').show('left');
    }
    else if($(this).val()=='officer'){
      $('div.officer').show('left');
      $('div.manager').hide('top');
    }
  });
  $('select[name="officer_id[]"]').on('change',function(){
    $('tbody.team_lead').find('tr').remove();
    if($(this).val().length>1){
      $( "select[name='officer_id[]'] option:selected" ).each(function(e) {
      $('tbody.team_lead').append('<tr><td><label class="">'+$(this).text()+'</a></td><td><input name="team_lead" value="'+$(this).val()+'" type="radio"></td></tr>');
    });
      $('.TeamLead').show('left');
    }
    else{
      $('.TeamLead').hide('right');
    }
  });
});
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
});
</script>
@endsection
