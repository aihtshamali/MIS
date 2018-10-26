@extends('_Monitoring.layouts.upperNavigation')
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/style.css')}}"/>
<link rel="stylesheet" href="{{ asset('_monitoring/css/icon/icofont/css/icofont.css')}}"/>
 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/multiselect/css/multi-select.css')}}" />
@section('styleTags')
<style>
.officer, .director{
    display:none;
  }

  </style>
@endsection
@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="card z-depth-5">
            <div class="card-header"><h5>Project Assignment To Consultant </h5></div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-2">
                       <label for=""><b>Assign To :</b> </label>
                    </div>
                    <div class="col-md-4 form-radio">    
                        <div class="radio radiofill radio-primary radio-inline">
                            <label>
                                <input type="radio"  name="assign_to" value="director" checked="checked">
                                <i class="helper"></i>Directors
                            </label>
                        </div>
                        <div class="radio radiofill radio-primary radio-inline">
                            <label>
                                <input type="radio" name="assign_to" value="officer" checked="checked">
                                <i class="helper"></i>Officers
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row officer" >
                    <div class="col-md-6">
                        <select name="officer_id[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12" multiple="multiple" data-placeholder="Select..">
                                @foreach ($officers as $officer)
                                <option value="{{$officer->id}}" style="font-weight:bold">{{$officer->first_name}} {{$officer->last_name}}  - <span style="font-weight:bolder">{{$officer->sector->name}} </span></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row director" >
                        <div class="col-md-6">
                            <select name="director_id[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12" multiple="multiple" data-placeholder="Select..">
                                    @foreach ($directors as $director)
                                    <option value="{{$director->id}}" style="font-weight:bold">{{$director->first_name}} {{$director->last_name}}  - <span style="font-weight:bolder">{{$officer->sector->name}} </span></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row TeamLead" style="display:none; margin-top:8px;">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header"><h5>Project Assignment To a Team </h5></div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">
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
                                    <div class="card-footer"></div>
                                </div>
                            </div>
                        </div>

            </div>
            <div class="card-footer">
                    <button  type="submit" class=" assignButton btn btn-sm btn-warning btn-outline-warning" style=" margin-top: -30px; margin-bottom: 10px; margin-left: 60%;color:#fe9365"><i class="icofont icofont-info-square"></i>Make Assignment</button>

            </div>
        </div>
    </div>
</div>


@endsection
@section('js_scripts')
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
<script src="{{asset('_monitoring/js/switchery/js/switchery.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/swithces.js')}}"></script>
<script src="{{asset('_monitoring/css/js/script.js')}}"></script>
<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>
<script>
$(document).ready(function() {
  $('input[name="assign_to"]').on('change',function(){
      console.log($(this));
      
    if($(this).val()=='director'){
      $('div.officer').hide('top');
      $('div.director').show('left');
    }
    else if($(this).val()=='officer'){
      $('div.officer').show('left');
      $('div.director').hide('top');
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
</script>
{{-- <div class="radio radiofill radio-primary radio-inline">
        <label>
            <input type="radio"  name="assign_to" value="director" checked="checked">
            <i class="helper"></i>Directors
        </label>
    </div> --}}
@endsection