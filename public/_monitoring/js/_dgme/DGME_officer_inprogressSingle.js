"use strict";
$(document).ready(function()
{
$(".summaryNav").click(function(){
    $(".topSummary").hide();
    $(".mainTabsAndNav").css("margin-top", "0px");
}); 
$(".conductNav").click(function(){
    $(".topSummary").show();
    $(".mainTabsAndNav").css("margin-top", "12%");
});  
$(".planNav").click(function(){
    $(".topSummary").show();
    $(".mainTabsAndNav").css("margin-top", "12%");
});

$('input:checkbox').click(function() {
    $('input:checkbox').not(this).prop('checked', false);
});

//FINANCIAL PHASING


$(document).ready(()=>{
    var substring='';
    var j = 0
    for(j = 2 ; j <= 30 ; j++){
        if(j == 9)
            substring += '<option value="200' + j + '-' + (j+1) + '">200' + j +'-' + (j+1) + '</option>'
        else if(j > 9)
            substring+='<option value="20' + j + '-' + (j+1) + '">20' + j +'-' + (j+1) + '</option>'
            // <option value="20{{$i}}-{{$i+1}}">20{{$i}}-{{$i+1}}</option>
        else
            substring+='<option value="200' + j + '-0' + (j+1) + '">200' + j +'-0' + (j+1) + '</option>'
            // <option value="200{{$i}}-0{{$i+1}}">200{{$i}}-0{{$i+1}}</option>
            // console.log(j,'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',substring);
    }
    var tr = `
    <tr>
    <td id='serial'></td>
    <td>
        <select disabled class="form-control select2" name="financial_year" id="financial_year">
                <option value="0" hidden>Select Financial Year </option>`.concat(substring).concat (`</select>
    </td>
    <td> <input id='m_duration' disabled type="text" class="form-control fn"> </td>
    <td> <input type="text" class="form-control fn"> </td>
    </tr>
    `)
    
    // var tr_ob = $(tr) 
    var tm = parseInt($('#t_months').text(),10)
    var rtm = parseInt($('#rt_months').text(),10)
    var date = moment($('#f_date').text(), "DD MMMM YYYY")
    var check = moment().year(date.year()).month(7).date(1)
    var all_months = []
    if(date >= check){
        check.add(1,'years')    
    }
    var months = moment.duration(date.diff(check)).as('months')
    months = parseInt(months, 10)
    if(months < 0)
    months *= -1
    
    var r_months = months

    var count = 1;
    while(tm != 0){
        var tr_ob = $(tr) 
        tr_ob.find('#financial_year').children()[parseInt(check.add(1,'years').format('YY'))-3].selected = 'selected'
        tr_ob.find('#m_duration').val(months)
        tr_ob.find('#serial').text(count++)
        tm -= months
        if(tm >= 12)
            months = 12
        else
            months = tm   
        tr_ob.appendTo('#original_tbody')
    }

    var rcount = 1;
    check.add(-5,'years')
    while(rtm != 0){
        var tr_ob = $(tr) 
        tr_ob.find('#financial_year').children()[parseInt(check.add(1,'years').format('YY'))-3].selected = 'selected'
        tr_ob.find('#m_duration').val(r_months)
        tr_ob.find('#serial').text(rcount++)
        rtm -= r_months
        if(rtm >= 12)
            r_months = 12
        else
            r_months = rtm   
        tr_ob.appendTo('#revised_tbody')
    }

        console.log(all_months);    
})


//END



function hideallmaintabs()
{
$('#summary').hide();
$('#p_monitoring').hide();
$('#c_monitoring').hide();
}

$('.summaryNav').on('click',function(){
hideallmaintabs();
// hideall();
$('.mainTabsAndNav').removeClass( "col-xl-12" ).addClass( "col-xl-8" );
$('#summary').show();
$('.p_details').show(1000);
});

$('.planNav').on('click',function(){
hideallmaintabs();
$('.p_details').hide();
$('.mainTabsAndNav').removeClass( "col-xl-8" ).addClass( "col-xl-12" );
$('#p_monitoring').show();

});
$('.kpis').on('click',function(){
    $('#activities').hide();
    $('#i-dates').hide();
    $('#financial').hide();
    $('#kpis').show();
});

$('.activities').on('click',function(){
    $('#kpis').hide();
    $('#i-dates').hide();
    $('#financial').hide();
    $('#activities').show();
});

$('.i-dates').on('click',function(){
    $('#kpis').hide();
    $('#financial').hide();
    $('#activities').hide();
    $('#i-dates').show();
});

$('.financial').on('click',function(){
    $('#kpis').hide();
    $('#activities').hide();
    $('#i-dates').hide();
    $('#financial').show();
});

$('.conductNav').on('click',function(){
hideallmaintabs();
$('.p_details').hide();
$('.mainTabsAndNav').removeClass( "col-xl-8" ).addClass( "col-xl-12" );
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

$(document).ready(()=>{
    // $('.select2').select2() 
})

$('button#addmore').click(function(e){
var add_stakeholder=`<tr>
                    <td>
                    <label for="">1</label>
                    </td>
                    <td>
                    <div class="col-md-12">
                        <select id="districts" required name="stakeholder" class="form-control form-control-primary js-example-basic" data-placeholder="Districts" style="width: 100%;">
                            <option value="" hidden='hidded'>Select</option>
                            <option value="">some option</option>
                            <option value="">to choose</option>
                            <option value="">from</option>
                        </select>
                    </div>
                    </td>
                    <td><input type="text" name="stakeholder_name" class="form-control" /></td>
                    <td><input type="text" name="stakeholder_designation" class="form-control" /> </td>
                    <td><input type="text" name="stakeholder_number" class="form-control" /></td>
                    <td><input type="text" name="stakeholder_email" class="form-control" /></td>
                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>
                    `
                    $('#stakeholders').append(add_stakeholder);
                });
                $('button#add-more-issues').click(function(e){
                    var temp = `
                    <tr>
                        <td><input type="text" name="issue" style="width:100%" /></td>
                        <td>
                            <select id="issues2" name="issuetype" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                <option value="" hidden='hidden'>Select</option>
                                <option value="Time">Time</option>
                                <option value="Cost">Cost</option>
                                <option value="Quality">Quality</option>
                                <option value="Scope">Scope</option>
                                <option value="Benifits">Benifits</option>
                                <option value="Risks">Risks</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-primary">
                                <option value="" selected disabled>Select</option>
                                <option value="1">Very High</option>
                                <option value="2">High</option>
                                <option value="3">Medium</option>
                                <option value="4">Low</option>
                                <option value="5">Very Low</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-primary">
                                <option value="" selected disabled>Select</option>
                                <option value="1">Very High</option>
                                <option value="2">High</option>
                                <option value="3">Medium</option>
                                <option value="4">Low</option>
                                <option value="5">Very Low</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" id="remove-issue" onclick="removeIssuerow(this)" name="remove[]" type="button">-</button>
                        </td>
                    </tr>
                    `
                    $(temp).appendTo('#add-issue-here')
                });
$('button#add-more').click(function(e){
var add_risks='<tr>'
                +'<td><input type="text" class="form-control"></td>'
                +'<td><input type="text"  class="form-control"></td>'
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
                +'<div class="col-md-3 offset-md-1"><input type="text" class="form-control" placeholder="Add Activity" name="c_activity[]"> </div>'
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

function removeIssuerow(e)
{
    $(e).parent().parent().remove();
}
