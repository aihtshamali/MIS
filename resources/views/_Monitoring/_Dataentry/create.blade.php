@extends('_Monitoring.layouts.upperNavigation')
 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/sweetalert.css')}}" />
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/component.css')}}" />
 <link rel="stylesheet" href="{{ asset('_monitoring/css/css/select2.min.css')}}" />
 <!-- Multi Select css -->
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/pages/advance-elements/css/bootstrap-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{ asset('_monitoring/css/css/daterangepicker.css')}}" />




<style>
.data-card{
  background-color:#e0e8ff; !important
  border-radius: 5px;

}
.data-card2{
  background-color:#daf8c7; !important
  border-radius: 5px;

}
.data-card3{
  background-color:#fff3b8; !important
  border-radius: 5px;

}
</style>
@section('content')
<div class="row">
    <div class="col-md-6 ">
        <form action="{{route('projects.store')}}" name="dataentryForm" id="" method="POST">
          {{ csrf_field() }}
        <div class="card">

            <div class="card-header"> <h4><b>Add New Monitoring Project</b></h4></div>
            <div class="card-block">
                <div class="form-group row">
                    <div class="col-md-12">
                      <input type="hidden" name="type_of_project" value="{{$project_types->id}}">
                    <label ><b>Sub Project Type :</b></label>
                    <select class="form-control form-control-primary" name="phase_of_project" id="projecttype">
                        <option value="" selected disabled>Select Type</option>
                        @foreach ($sub_project_types as $sp)
                          <option value="{{$sp->id}}">{{$sp->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-12">
                            <b><label for="sectors">Project Title </label></b>
                            <input type="text" class="form-control form-txt-success" name="title" id="projectTitle" placeholder="Project Title">
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                          <b><label for="sectors">Project # </label></b>
                          <input id="project_no" type="text" name="project_no" disabled value="{{$project_no}}"  class="form-control" required >
                      </div>
                    </div>
                <div class="form-group row">
                        <div class="col-md-12">
                            <b><label for="sectors">SNE </label></b>
                            <select class="form-control form-control-warning" required name="sne" id="sne">
                                    <option value="" selected="selected" disabled>Select SNE</option>
                                    <option value="NO">NO</option>
                                    <option value="COST">COST</option>
                                    <option value="STAFF">STAFF</option>
                                    <option value="BOTH">BOTH</option>
                                  </select>
                        </div>
                    </div>
                <div class="form-group row">
                        <div class="col-md-6">
                        <label for=""><b>Financial Year</b></label>
                            <select class="form-control form-control-info" name="financial_year" id="financial_year">
                                    <option value="2017-18">2017-18</option>
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
                        </div>
                    <div class="col-md-6">
                        <label for=""><b>GS #</b></label>
                        <select class="form-control form-control-info" name="adp_no[]" id="gs_no">
                            <option value="" selected>Select GS #</option>
                            <?php $counting = 0?>
                            @foreach ($adp as $a)
                                <option value="{{$a->gs_no}},<?php echo $counting?>">{{$a->gs_no}}</option>
                                <?php $counting += 1?>
                            @endforeach
                            </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <b><label for="sectors">Sectors : </label></b>
                        <select  name="sectors[]" class="js-example-basic-multiple js-placeholder-multiple col-sm-12"  id ="projSectors" multiple="multiple">
                            @foreach ($sectors as $sector)
                                @if($sector->status == 1)
                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-12">
                            <b><label for="sectors">SubSectors : </label></b>
                            <select id="sub_sectors" name="sub_sectors[]" class="form-control js-example-basic-multiple" required multiple="multiple" id="Subsectors" data-placeholder="Sub Sectors"  style="width: 100%;">
                                </select>
                        </div>
                    </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label><b> Sponsoring Department :</b></label>
                        <select id="sponsoringdpt" required name="sponsoring_departments[]" class="form-control js-example-basic-multiple" multiple="multiple" data-placeholder="Sponsoring Department"  style="width: 100%;">
                        @foreach ($sponsoring_departments as $sponsoring_department)
                            <option value="{{$sponsoring_department->id}}">{{$sponsoring_department->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Executing Department</b></label>
                            <select id="executingdept" required name="executing_departments[]" class="form-control js-example-basic-multiple" multiple="multiple" data-placeholder="Executing Department"  style="width: 100%;">
                            @foreach ($executing_departments as $executing_department)
                                <option value="{{$executing_department->id}}">{{$executing_department->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Assigning Forum</b></label>
                            <select id="assigningForum" required name="assigning_forum" class="form-control js-example-basic-multiple"  multiple="multiple" data-placeholder="Assigning Forum" style="width: 100%;">
                            <option value="">Select Assigning Forum</option>
                            @foreach ($assigning_forums as $assigning_forum)
                                @if($assigning_forum->status == 1)
                                <option value="{{$assigning_forum->id}}">{{$assigning_forum->name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="display:none" id="assigning_forumSubListDiv">
                      <div class="col-sm-12">
                        <label><b>Select Assingning Forum SubList</b></label>
                        <select id="assigning_forumSubList" name="assigning_forumSubList" class="form-control select2"  style="width: 100%;">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Approving Forum</b></label>
                            <select id="approvingForum" required name="approving_forum" class="form-control form-control-primary js-example-basic-multiple"   multiple="multiple" data-placeholder="Approving Forum" style="width: 100%;">
                            <option value="">Select Approving Forum</option>
                            @foreach ($approving_forums as $approving_forum)
                                <option value="{{$approving_forum->id}}">{{$approving_forum->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Currency</b></label>
                            <select class="form-control form-control-warning" required name="currency" id="currrency">
                            <option data-symbol="$" data-placeholder="0.00">$ USD</option>
                            <option data-symbol="Rs" data-placeholder="0.00" selected>Rs PKR</option>
                            <option data-symbol="€" data-placeholder="0.00">€ EUR</option>
                            <option data-symbol="£" data-placeholder="0.00">£ GBP</option>
                            <option data-symbol="¥" data-placeholder="0">¥ JPY</option>
                            <option data-symbol="$" data-placeholder="0.00">$ CAD</option>
                            </select>
                        </div>
                    </div>
                   <section name="Mcost" id="Mcost">
                        <div class="form-group row" style="margin-bottom:-18px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block data-card" >
                                        <h5 style="margin-bottom:20px;"><b style="text-decoration-line: underline; "> Cost</b></h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                        <label><b >Original Approved Cost</b></label>
                                        <input type="number" required id="originalCost" step="0.001" name="original_cost" class="form-control form-control-round" placeholder="Cost">
                                    </div>
                                    </div>
                                    <div class="form-group row " id="revised_cost_id">
                                            <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label><b >Revised Approved Cost</b></label>
                                                    <input type="number" required  name="revised_approved_costs[]" id="field1" step="0.001" class="form-control form-control-round" placeholder="Cost">
                                                </div>
                                                <div class="col-md-2">
                                                    <button id="add-more" name="add-more[]" class="btn btn-success pull-right" style="position: relative;top: 26px;margin: -3px;" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                   </section>
                   <section name="Mdate" id="Mdate">
                        <div class="form-group row" style="margin-bottom:-18px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block data-card2" >
                                        <h5 style="margin-bottom:20px;"><b style="text-decoration-line: underline; ">Date</b></h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label><b >Planned Start Date</b></label>
                                                <input type='date' id="planned_start_date" required name="planned_start_date" onkeyup="" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label><b >Planned End Date</b></label>
                                                <input type='date' id="planned_end_date"  required name="planned_end_date" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label><b >Planned Gestation Period</b></label>
                                                <input type='text' id="gestation_period"  required name="gestation_period" class="form-control" />
                                            </div>
                                        </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add_reviseddate" class="btn btn-sm btn-warning" style="margin-bottom:18px;">Add Revised Date</button>
                        <div class="form-group row" id="revised_date_row">
                        </div>
                   </section>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Districts</b></label>
                        <select id="districts" required name="districts[]" class="form-control form-control-primary js-example-basic-multiple"   multiple="multiple" data-placeholder="Districts" style="width: 100%;">
                                <option value="">Select Districts</option>
                                @foreach ($districts as $district)
                                @if($district->status == 1)
                                  <option value="{{$district->id}}">{{$district->name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                   </div>
                   <div class="form-group row">
                        <div class="col-md-12">
                        <label><b>Upload Attachments</b></label>
                        <input type="file" class="pull-right" name="attachments">
                      </div>
                      </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success alert-confirm m-b-10" style=" margin-left: 80%;" >Add PC-1</button>
            </div>
        </div>
    </form>
    </div>

    {{-- summary --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> <h4><b>Summary</b></h4></div>
            <div class="card-block">
                <div class="form-group row">
                <div class="col-md-4">
                    <label><b>Project Type :</b></label>
                </div>
                <div class="col-md-6" id="summary_projecttype">
                </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Project Title:</b></label>
                    </div>
                    <div class="col-md-6" id="summary_projectTitle">

                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>SNE:</b></label>
                        </div>
                        <div class="col-md-6" id="summary_sne">

                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>GS # :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_gs_no">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Sector(s) :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_projSectors">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Subsector(s):</b></label>
                    </div>
                    <div class="col-md-6" id="summary_Subsectors">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Sponsoring Department(s) :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_sponsoringdpt">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Executing Department(s) :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_executingdept">

                    </div>
                </div>
                <div class="form-group row" >
                    <div class="col-md-4">
                         <label><b>Assigning Forum :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_assigningForum">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Approving Forum :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_approvingForum">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Currency :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_currrency">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Original Approved Cost :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_originalCost">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Revised Final Cost :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_revised_approved_costs">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Planned Start Date:</b></label>
                    </div>
                    <div class="col-md-6" id="summary_planned_start_date">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Planned End Date:</b></label>
                    </div>
                    <div class="col-md-6" id="summary_planned_end_date">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Planned Gestation Period :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_gestation_period">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Revised Start Date :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_revised_start_date">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Revised End Date :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_revised_end_date">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Revised Gestation Period :</b></label>
                    </div>
                    <div class="col-md-6" id="summary_gestation_period">

                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Districts :</b></label>
                        </div>
                        <div class="col-md-6" id="summary_districts">

                        </div>
                    </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
@section('js_scripts')
<script src="{{asset('_monitoring/js/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery.steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('_monitoring/js/jquery-validation/js/jquery.validate.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/form-validation/validate.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/forms-wizard-validation/form-wizard.js')}}"></script>
{{-- moment --}}
<script src="{{asset('_monitoring/js/moment/js/moment.js')}}"></script>

<!-- Select 2 js -->
<script src="{{asset('_monitoring/js/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script src="{{asset('_monitoring/js/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('_monitoring/js/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('_monitoring/css/js/jquery.quicksearch.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/select2-custom.js')}}"></script>

<script src="{{asset('_monitoring/css/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script src="{{asset('_monitoring/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('_monitoring/js/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/advance-elements/custom-picker.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="{{asset('_monitoring/js/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modalEffects.js')}}"></script>
<script src="{{asset('_monitoring/css/js/classie.js')}}"></script>
<script src="{{asset('_monitoring/css/js/modal.js')}}"></script>
<script>
$(document).ready(function(){
    $('button#add-more').click(function(e){
        var revised_Cost ='<div class="col-md-12"><div class="row"><div class="col-md-8">'
        +'<label><b >Revised Approved Cost</b></label>'
        +'<input type="number" required  name="revised_approved_costs[]" id="revised_approved_costs" step="0.001" class="form-control form-control-round" placeholder="Cost">'
        +'</div>'
        +'<div class="col-md-2">'
        +'<button id="remove" name="remove[]" class="btn btn-danger add-more pull-right" onclick="removefield(this)" style="position: relative;top: 26px;margin: -3px;" type="button">-</button>'
        +'</div></div></div>';
        $('#revised_cost_id').append(revised_Cost);

    });

    $('button#add_reviseddate').click(function(e){
        var revised_date ='<div class="col-md-12">'
                               +'<div class="card">'
                                 +' <div class="card-block data-card3" >'
                                   +'<h5 style="margin-bottom:20px;"><b style="text-decoration-line: underline; ">Revised Date</b></h5> '
                                   +'<div class="form-group row">'
                                    +'<div class="col-md-12">'
                                      +'<label><b >Revised Start Date</b></label> '
                                        +'<input type="date" id="revised_start_date" required name="revised_start_date[]" onkeyup="" class="form-control" /> '
                                      +'</div> </div>'
                                        +'<div class="form-group row">'
                                          +'<div class="col-md-12">'
                                            +'<label><b >Revised End Date</b></label>'
                                              +'<input type="date" id="revised_end_date" onchange="calculaterevisedInterval()"  required name="revised_end_dates[]" class="form-control" />'
                                           +'</div></div>'
                                        +'<div class="form-group row">'
                                          +'<div class="col-md-12">'
                                            +'<label><b >Revised Gestation Period</b></label>'
                                              +'<input type="text" id="revised_gestation_period" required name="revised_gestation_period[]" class="form-control" />'
                                           +'</div>'
                                        +'</div>'
                                        +'<button type="button" id="remove_reviseddate" onclick="remove_revisedDate(this)" name="remove_reviseddate[]" class="btn btn-sm btn-danger">Remove</button>'
                                   +'</div>'
                               +'</div>'
                            +'</div>';
        $('#revised_date_row').append(revised_date);

    });

    // planned gestation
    Date.getFormattedDateDiff = function(date1, date2) {
    var b = moment(date1),
        a = moment(date2),
        intervals = ['years','months','weeks','days'],
        out = [];

    for(var i=0; i<intervals.length; i++){
        var diff = a.diff(b, intervals[i]);
        b.add(diff, intervals[i]);
        out.push(diff + ' ' + intervals[i]);
    }
    return out.join(', ');
    };

    function calculateInterval() {
    var start = new Date($('#planned_start_date').val()),
        end   = new Date($('#planned_end_date').val());


        $('#gestation_period').val(Date.getFormattedDateDiff(start, end));
    }

    $('#planned_end_date').on('change',function(){
        calculateInterval();
    });



});
// revised gestation
Date.getFormattedDateDiff = function(date1, date2) {
    var b = moment(date1),
        a = moment(date2),
        intervals = ['years','months','weeks','days'],
        out = [];

    for(var i=0; i<intervals.length; i++){
        var diff = a.diff(b, intervals[i]);
        b.add(diff, intervals[i]);
        out.push(diff + ' ' + intervals[i]);
    }
    return out.join(', ');
    };

function calculaterevisedInterval() {
    var start = new Date($('#revised_start_date').val()),
        end   = new Date($('#revised_end_date').val());


        $('#revised_gestation_period').val(Date.getFormattedDateDiff(start, end));
    }

function removefield(e){
    $(e).parent().parent().remove();
    }
function remove_revisedDate(e)
    {

        $(e).parent().parent().remove();

    }
</script>
<script>
document.querySelector('.alert-confirm').onclick = function(){
		swal({
					title: "Are you sure?",
					text: "Your will not be able to recover this FILE!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, Submit it!",
					closeOnConfirm: false
				},
				function(){
					swal("Submitted!", "Your PC-1 has been Submitted.", "success");
				});
	};
</script>
<script>
$(document).on('change', '#assigningForum', function() {
  var opt = $(this).val()
  // console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onAssigningForumselect', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt
    }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      $("#assigning_forumSubList").empty();
      $.each(response, function () {

            $('#assigning_forumSubList').append("<option value=\""+this.id+"\">"+this.name+"</option>");

      });
      if(response.length>0 && !response.error)
        {
          $('div#assigning_forumSubListDiv').show();
        }
        else{
          $('div#assigning_forumSubListDiv').hide();
        }
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});
    $('select').on('change',function(e){
    var class_value = $(this).attr("id");
    var opt = $(this).val();
    var values = "";
    if(opt == ""){
        $("#summary_" + class_value).hide("slow");
    }
    else{
        $("#summary_" + class_value).show("slow");
    }
    $("#summary_"+class_value).empty();
    values = $(this).find(':selected').text();
    $("#summary_"+class_value).append("<label class=\"control-label\">"+values+"</label>");
    });

    $('input').on('change',function(){
    var class_value = $(this).attr("id");
    var opt = $(this).val();
    if(opt == ""){
        $("#summary_" + class_value).hide("slow");
    }
    else{
        $("#summary_" + class_value).show("slow");
    }
    $("#summary_"+class_value).empty();
    $("#summary_"+class_value).append("<label class=\"control-label\">"+opt+"</label>");

    $("#summary_"+class_value).empty();
    values = $(this).find(':selected').text();
    $("#summary_"+class_value).append("<label class=\"control-label\">"+values+"</label>");
    });

  $(document).on('change', '#projSectors', function() {
  var opt = $(this).val()
//   console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/onsectorselect', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      console.log(response);
      $("#sub_sectors").empty();
      $.each(response, function () {
          $('#sub_sectors').append("<option value=\""+this.id+"\">"+this.name+"</option>");
      });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});

$(document).on('change','#gs_no',function(){
   var arr = $(this).val().split(',')
   // console.log(projects[arr[1]].name_of_scheme);
   if($('#financial_year :selected').text() == projects[arr[1]].financial_year){
     $('#projectTitle').val(projects[arr[1]].name_of_scheme);
     $('#originalCost').val(projects[arr[1]].total_cost);
     $("#districts").val($("#districts option").filter(function () { return $(this).html() == projects[arr[1]].district; }).val());
   }
   else{
     $('#projectTitle').val('');
     $('#originalCost').val('');
     $("#districts").val('').trigger('change');
   }
});
</script>
@endsection
