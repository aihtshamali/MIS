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
    <form method="POST" action="{{route('assignproject.store')}}">
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
            <b> <input type="radio" name="assign_to" value="manager"> Manager</b>
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
                      <option value="{{$officer->id}}">{{$officer->first_name}}</option>
                    @if($officer->sector->name!=$head && $head!='')
                    </optgroup>
                        @php
                        $head=$officer->sector->name;
                        @endphp
                    @endif

                  @endforeach
              </select>
            </div>
            <div class="manager">
              <select class="form-control select2" multiple="multiple" data-placeholder="Select Manager"
                      style="width: 100%;" name="manager_id[]">
                  @foreach ($managers as $manager)
                    @php
                      $head='';
                    @endphp
                    @if($manager->sector->name!=$head)
                    <optgroup label = "{{$manager->sector->name}}">
                    @endif
                      <option value="{{$manager->id}}">{{$manager->first_name}}</option>
                    @if($manager->sector->name!=$head && $head!='')
                    </optgroup>
                        @php
                        $head=$manager->sector->name;
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
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Select Team Lead</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <th>Officer Name</th>
                        <th>Designation</th>
                        <th>Pick Team Leader</th>
                      </thead>
                      <tbody>
                      <tr>
                        <td ><a href="#">Aymun Saif</a></td>
                        <td ><a href="#">Software Consultant</a></td>
                        <td><input type="checkbox"></td>
                      </tr>
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
      <div class="col-md-6">
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
      $('div.officer').hide();
      $('div.manager').show();
    }
    else if($(this).val()=='officer'){
      $('div.officer').show();
      $('div.manager').hide();
    }
  });
});
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
});
</script>
@endsection