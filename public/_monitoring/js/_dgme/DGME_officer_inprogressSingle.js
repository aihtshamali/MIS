"use strict";
$(document).ready(function()
{
$(".summaryNav").click(function(){
    $(".topSummary").hide('slow');
    $(".mainTabsAndNav").animate({ marginTop: '0px'},1000);
});
$(".conductNav").click(function(){
    $(".topSummary").show('slow');
    $(".mainTabsAndNav").animate({ marginTop: '6%'},1000);
});
$(".planNav").click(function(){
    $(".topSummary").show('slow');
    $(".mainTabsAndNav").animate({ marginTop: '6%'},1000);
});

$('input:checkbox').click(function() {
    $('input:checkbox').not(this).prop('checked', false);
});

function hideallmaintabs()
{
$('#summary').hide();
$('#p_monitoring').hide();
$('#c_monitoring').hide();
}

$('.summaryNav').on('click',function(){
hideallmaintabs();
// hideall();
$('.mainTabsAndNav').removeClass( "col-md-12" ).addClass( "col-md-9" );
$('#summary').show();
$('.p_details').show(1000);
});

$('.planNav').on('click',function(){
hideallmaintabs();
$('.p_details').hide();
$('.mainTabsAndNav').removeClass( "col-md-9" ).addClass( "col-md-12" );
$('#p_monitoring').show();

});
$('.kpis').on('click',function(){
$('#activities').hide();
$('#kpis').show();
});

$('.activities').on('click',function(){
$('#kpis').hide();
$('#activities').show();
});


$('.conductNav').on('click',function(){
hideallmaintabs();
$('.p_details').hide();
$('.mainTabsAndNav').removeClass( "col-md-8" ).addClass( "col-md-12" );
$('#c_monitoring').show();
});
function hideall()
{
 $('#financial').hide();
 $('#physical').hide();
 $('#quality_assesment').hide();
 $('#stakeholder').hide();
 $('#issues').hide();
 $('#risks').hide();
 $('#HSE').hide();
 $('#procuremnet').hide();
 $('#kpis').hide();
 $('#activities').hide();
 $('#kpis').hide();
 $('#activities').hide();
}
$('.financial').on('click',function(){
hideall();
$('#financial').show();
});
$('.physical').on('click',function(){
 hideall();
$('#physical').show();
});
$('.quality_assesment').on('click',function(){
hideall();
$('#quality_assesment').show();
});
$('.stakeholder').on('click',function(){
hideall();
$('#stakeholder').show();
});
$('.issues').on('click',function(){
hideall();
$('#issues').show();
});
$('.risks').on('click',function(){
hideall();
$('#risks').show();
});
$('.HSE').on('click',function(){
hideall();
$('#HSE').show();
});
$('.procuremnet').on('click',function(){
hideall();
$('#procurement').show();
});
});

// document.querySelector('.alert-success-msg').onclick = function(){
// swal("Good job!", "You submitted the project!", "success");
// };
$(function() {
    $('input[name="asd"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});

$(function() {
    $('input[name="ts"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});

$(function() {
$('input[name="cwd"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true
});

});


$('button#add-more').click(function(e){
var add_stakeholder= `<tr>
                    <td><input type="text" name="stakeholder_name" class="form-control" /></td>
                    <td><input type="text" name="stakeholder_designation" class="form-control" /> </td>
                    <td><select name="select"
                            class="form-control">
                        <option value="opt1" hidden>Select One Value Only</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                        <option value="opt4">Type 4</option>
                        <option value="opt5">Type 5</option>
                        <option value="opt6">Type 6</option>
                        <option value="opt7">Type 7</option>
                        <option value="opt8">Type 8</option>
                    </select></td>'
                    <td><input type="text" name="stakeholder_number" class="form-control" /></td>
                    <td><input type="text" name="stakeholder_email" class="form-control" /></td>
                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>`
                    $('#stakeholders').append(add_stakeholder);
                });

$('button#add-more').click(function(e){
var add_risks='<tr>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text"  class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><button class="btn btn-sm btn-danger" id="remove" onclick="removerow(this)" name="remove[]" type="button">-</button></td>'
                +'</tr>';
                $('#riskmatrix').append(add_risks);
});

$('button#add_activity').click(function(e){

var add_activities ='<div class="row form-group component_Activities">'
                +'<div class="col-md-3 offset-md-1"><input type="text" class="form-control" placeholder="Add Task" name="c_activity[]"> </div>'
                +'<div class="col-md-2"> <input type="text" class="form-control" placeholder="Cost" name="c_cost[]"></div>'
                +'<div class="col-md-2"><input type="text" class="form-control" placeholder="Units" name="c_unit[]"></div>'
                +'<div class="col-md-2"><input type="text" class="form-control" placeholder="Quantity" name="c_quantity[]"></div>'
                +'<div class="col-md-1"><button class="btn btn-danger btn-sm" name="remove_activity[]" onclick="removerow(this)"  type="button">-</button></div>'
                +'</div>';
                $('.planMactivities').append(add_activities);
});


$('button#add_more_component').click(function(e){
    var add_component='<div class="row components">'
                        +'<div class="form-group col-md-1 offset-md-1 ">'
                        +'<br>'
                        +'<button class=" btn btn-sm btn-danger" onclick="removerow(this)" name="remove_component[]" id="remove_component" type="button"><i class="fa fa-minus"></i></button>'
                        +'</div>'
                       +'<div class="form-group col-md-6  ">'
                        +'<label for=""> <b>Component Title :</b></label><br>'
                        +'<select class=" form-control form-control-primary ">'
                        +'<option value="" selected disabled>Select Component</option>'
                        +'<option value="1" >Component 1</option>'
                        +'<option value="2">Component 2</option>'
                        +'<option value="3" >Component 3</option>'
                        +'</select>'
                        +'</div>'
                        +'<div class="col-md-2 offset-md-1">'
                        +'<br>'
                        +'<button class=" btn btn-sm btn-success" name="add_more_act[]" id="add_more_act" onclick="add_activityInComp(this)" type="button">Add Activity</button>'
                        +'</div>'
                        +'</div>';
            $('.oneComponentQA').append(add_component);
});

function add_activityInComp(e)
{
    var add_activities_to_assess='<div class="row singleActivity">'
                                  +'<div class="form-group col-md-3 offset-md-1 " style="margin-bottom:10px !important;">'
                                  +'<label for=""><b>Activities</b></label>'
                                  +'<select class="form-control form-control-warning" style="width: 90%;">'
                                  +'<option value="" selected disabled>Select Activity</option>'
                                  +'<option value="1" >Activity 1</option>'
                                   +'<option value="2">Activity 2</option>'
                                  +'<option value="3" >Activity 3</option>'
                                  +'</select></div>'
                                  +'<div class="form-group col-md-3 ">'
                                  +'<label for=""><b>Assesment</b></label>'
                                  +'<select class=" form-control " style="width: 90%;">'
                                  +'<option value="" selected disabled>Select Assesment Type</option>'
                                  +'<option value="1" style="background:#e85445;color:white;">Poor</option>'
                                  +'<option value="2" style="background:#f5d75c;color:white;">PartiallySatisfactory</option>'
                                  +'<option value="3" style="background:#44d581;color:white;">Satisfactory</option>'
                                  +'</select>'
                                  +'</div>'
                                  +'<div class="form-group col-md-3">'
                                  +'<label for=""><b>Remarks</b></label><br>'
                                  +'<textarea name="qa_remarks" id="qa_remarks" class="form-control"  style="width: 90%;" type="text"></textarea>'
                                  +'</div>'
                                  +'<div class="form-group col-md-1 ">'
                                  +' <br><button class="btn btn-danger btn-sm" onclick="removerow(this)" name="remove_Comp_activity[]"><span style="font-size:12px;">-</span></button>'
                                 +'</div>'
                                +'</div>';
                                $(e).parent().parent().append(add_activities_to_assess);
}

function removerow(e)
{
    $(e).parent().parent().remove();
}
