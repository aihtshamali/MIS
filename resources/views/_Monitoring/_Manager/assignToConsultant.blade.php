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
        <form id="assigntoConsultantForm" action="#" >
        <div class="card ">
            <div class="card-header"><h5 style="text-align:center;">Project Assignment To Consultant </h5></div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-2 offset-md-3">
                       <label for=""><b>Assign To :</b> </label>
                    </div>
                    <div class="col-md-4 form-radio">    
                        <div class="radio radiofill radio-primary radio-inline">
                            <label>
                                <input type="radio"  name="assign_to" value="director" >
                                <i class="helper"></i>Directors
                            </label>
                        </div>
                        <div class="radio radiofill radio-primary radio-inline">
                            <label>
                                <input type="radio" name="assign_to" value="officer" >
                                <i class="helper"></i>Officers
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row officer">
                   
                    <div class="col-md-6 form-group offset-md-3">
                        <select name="officer_id[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12 form-control" multiple="multiple" data-placeholder="Select..">
                                @foreach ($officers as $officer)
                                <option value="{{$officer->id}}" style="font-weight:bold">{{$officer->first_name}} {{$officer->last_name}}  - <span style="font-weight:bolder">{{$officer->sector->name}} </span></option>
                            @endforeach
                        </select>
                    </div>
                   
                </div>
               
                <div class="row director">  
                        <div class="col-md-6 form-group offset-md-3">
                            <select name="director_id[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12 form-control" multiple="multiple" data-placeholder="Select..">
                                    @foreach ($directors as $director)
                                    <option value="{{$director->id}}" style="font-weight:bold">{{$director->first_name}} {{$director->last_name}}  - <span style="font-weight:bolder">{{$officer->sector->name}} </span></option>
                                @endforeach
                            </select>
                        </div>
                     
                </div>

                <div class="row TeamLead" style="display:none; margin-top:20px;">
                    <div class="col-md-12">
                        <div class="card " >
                            <div class="card-header"><h5>Choose Team </h5></div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead >
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
                    </div>
                </div>

            </div>
            <div class="card-footer">
                    <button  type="submit" class=" assignButton btn btn-sm btn-warning " style=" margin-top: -30px; margin-bottom: 10px; margin-left: 60%;"><i class="icofont icofont-info-square"></i>Make Assignment</button>

            </div>
        </form>
        </div>
    </div>
</div>


@endsection
@section('js_scripts')
{{-- <script src="../../../../cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script> --}}
{{-- <script src="{{asset('_monitoring/js/switchery/js/switchery.min.js')}}"></script> --}}
{{-- <script src="{{asset('_monitoring/css/pages/advance-elements/swithces.js')}}"></script> --}}
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
    if($(this).val().length>1)
    {
      $( "select[name='officer_id[]'] option:selected" ).each(function(e) {                                                                                                   
      $('tbody.team_lead').append('<tr><td style="padding:2px;text-align:center;"><label class="">'+$(this).text()+'</a></td><td><div class="checkbox-fade fade-in-success m-0"><label> <input type="checkbox"  value="'+$(this).val()+'" name="team_lead" id="no" ><span class="cr"><i class="cr-icon icofont icofont-ui-check txt-success"></i></span></label></div></td></tr>');
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