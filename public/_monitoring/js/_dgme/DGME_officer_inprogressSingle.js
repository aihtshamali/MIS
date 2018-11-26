"use strict";
var oc = 1;
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();

    $(".planNav").click(function () {
        $(".topSummary").show('slow');
        $(".mainTabsAndNav").animate({ marginTop: '6%' }, 1000);
    });

    $('input:checkbox').click(function () {
        $('input:checkbox').not(this).prop('checked', false);
    });

    //FINANCIAL PHASING
    $(document).on('keyup', '.count-me', function () {
        var parent = $(this).parent().parent().parent().parent().parent().parent()
        var tds = parent.find('.count-me')
        // console.log('counting',tds,'asdasdasd',parent);
        var sum = 0;
        for (var i = 0; i < tds.length; i++) {
            if (tds[i].value != "")
                sum += parseInt(tds[i].value, 10)
        }
        console.log(sum, 'suuum');
        parent.find('#ot_cost').text(sum)
        if (parent.find('#t_cost').text() != parent.find('#ot_cost').text()) {
            var dif = (parseInt(parent.find('#t_cost').text()) - parseInt(parent.find('#ot_cost').text()))
            console.log(dif, 'difff');
            parent.find('#od_cost').text(dif)
            parent.find('.fazuldiv').hide()
            parent.find('.dangercustom').show()
        }
        else {
            parent.find('.fazuldiv').show()
            parent.find('.dangercustom').hide()
        }
    });

    var orig = { "cost": "430", "period": "30", "date": '15 September 2013' };

    var revs = [{ "cost": "450", "period": "33", "date": '15 September 2013' },
    { "cost": "479", "period": "33", "date": '15 September 2013' },
    { "cost": "479", "period": "37", "date": '15 September 2013' }]

    var revisionTable = `<div>
    <h5 style="padding-top:20px;padding-bottom:10px;clear:both;">Revised PC-I</h5>
        <div class="row">
            <h5 class="col-md-4">Gestation Period: <b><span id="t_months"></span> months</b></h5>
            <h5 class="col-md-4">Total Cost: <b><span id="t_cost"></span> Million(s)</b></h5>
            <h5 class="col-md-4">Start Date: <b id="f_date"></b></h5>
        </div>
        <div class="table-responsive">
            <table class="table  table-bordered nowrap"  id="countit">
                <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Financial Year</th>
                        <th>Duration</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody id='original_tbody'>

                </tbody>
            </table>
        </div>
        <div class='row' style="margin-bottom:20px">
            <div class="col-md-8 fazuldiv"></div>
            <div class="col-md-5 offset-md-3 alert alert-danger dangercustom">Cost does not match. Difference: <span id="od_cost">0</span> Million(s)</div>
            <h5 class="col-md-4 float-right" >Total Cost: <b>
                <span id="ot_cost">0</span> Million(s)</b>
            </h5>
        </div>
    </div>
    `;
    $(document).ready(() => {
        var substring = '';
        var j = 0
        for (j = 2; j <= 30; j++) {
            if (j == 9)
                substring += '<option value="200' + j + '-' + (j + 1) + '">200' + j + '-' + (j + 1) + '</option>'
            else if (j > 9)
                substring += '<option value="20' + j + '-' + (j + 1) + '">20' + j + '-' + (j + 1) + '</option>'
            else
                substring += '<option value="200' + j + '-0' + (j + 1) + '">200' + j + '-0' + (j + 1) + '</option>'
        }
        var tr = `
    <tr>
    <td id='serial'></td>
    <td>
        <select disabled class="form-control select2" name="financial_year" id="financial_year">
                <option value="0" hidden>Select Financial Year </option>`.concat(substring).concat(`</select>
    </td>
    <td> <input id='m_duration' disabled type="text" class="form-control fn"> </td>
    <td> <input type="number" class="form-control fn count-me"> </td>
    </tr>
    `)

        // var tr_ob = $(tr)
        // var rtm = parseInt($('#rt_months').text(),10)
        var tm = parseInt(orig.period)
        var date = moment(orig.date, "DD MMMM YYYY")
        $(document).find('#t_cost').text(orig.cost)
        $(document).find('#f_date').text(date.format('DD MMMM YYYY'))
        $(document).find('#t_months').text(orig.period)
        var check = moment().year(date.year()).month(7).date(1)
        if (date >= check) {
            check.add(1, 'years')
        }
        var months = moment.duration(date.diff(check)).as('months')
        months = parseInt(months, 10)
        if (months < 0)
            months *= -1

        // var r_months = months

        var count = 1;
        while (tm != 0) {
            var tr_ob = $(tr)
            tr_ob.find('#financial_year').children()[parseInt(check.add(1, 'years').format('YY')) - 3].selected = 'selected'
            tr_ob.find('#m_duration').val(months)
            tr_ob.find('#serial').text(count++)
            tm -= months
            if (tm >= 12)
                months = 12
            else
                months = tm
            tr_ob.appendTo('#original_tbody')
        }

        if (revs.length != 0) {
            revs.forEach(item => {
                // console.log('THIS IS SPARTA');

                var tm = parseInt(item.period)
                var table = $(revisionTable)
                var date = moment(item.date, "DD MMMM YYYY")
                table.find('#t_cost').text(item.cost)
                table.find('#f_date').text(date.format('DD MMMM YYYY'))
                table.find('#t_months').text(item.period)
                var check = moment().year(date.year()).month(7).date(1)
                if (date >= check) {
                    check.add(1, 'years')
                }
                var months = moment.duration(date.diff(check)).as('months')
                months = parseInt(months, 10)
                if (months < 0)
                    months *= -1

                var count = 1;
                while (tm != 0) {
                    var tr_ob = $(tr)
                    tr_ob.find('#financial_year').children()[parseInt(check.add(1, 'years').format('YY')) - 3].selected = 'selected'
                    tr_ob.find('#m_duration').val(months)
                    tr_ob.find('#t_cost').text(item.cost)
                    tr_ob.find('#serial').text(count++)
                    tm -= months
                    if (tm >= 12)
                        months = 12
                    else
                        months = tm
                    tr_ob.appendTo(table.find('#original_tbody'))
                }
                table.prependTo('#financial')
            })
        }
    })


    //END



    function hideallmaintabs() {
        $('#summary').hide();
        $('#p_monitoring').hide();
        $('#c_monitoring').hide();
        $('#reviewDiv').hide();
    }

    $('.summaryNav').on('click', function () {
        hideallmaintabs();
        hideall();
        $('.mainTabsAndNav').removeClass("col-md-12").addClass("col-md-9");
        $('#summary').show();
        $('.p_details').show(1000);
        $(".topSummary").hide('slow');
        $(".mainTabsAndNav").animate({ marginTop: '0px' }, 500);
        $(".mainTabsAndNav").removeClass("mt_6p");
    });

    $('.planNav').on('click', function () {
        // console.log('yahan tk');

        hideallmaintabs();
        $('.p_details').hide();
        $('.mainTabsAndNav').removeClass("col-md-9").addClass("col-md-12");
        $('#p_monitoring').show();
    });
    function hideall() {
        $('#PlanDocDiv').hide();
        $('#financial').hide();
        $('#physical').hide();
        $('#MOBdiv').hide();
        $('#quality_assesment').hide();
        $('#stakeholder').hide();
        $('#issues').hide();
        $('#risks').hide();
        $('#HSE').hide();
        $('#procuremnet').hide();
        $('#kpis').hide();
        $('#activities').hide();
        $('#kpis').hide();
        $('#Gallery').hide();
        $('#financialDiv').hide();
        $('#Objectives').hide();
        $('#PAT').hide();
        $('#Documents').hide();
        $('#i-dates').hide();
        $('#reviewDiv').hide();
        $('#TimesDiv').hide();
        $('#CostingDiv').hide();
    }


    $('.conductNav').on('click', function () {
        hideallmaintabs();
        hideall();
        $('#c_monitoring').show();
        $('#financialDiv').show();
        $('#p_monitoring').hide();
        $('.p_details').hide();
        $('.mainTabsAndNav').removeClass("col-md-8").addClass("col-md-12");
        $('.mainTabsAndNav').animate({ marginTop: '6%' }, 1000);
        $(".topSummary").show('slow');
    });
    $('.CostingTab').on('click', function () {
        hideall();
        $('#CostingDiv').show();
    });
    $('.TimeTab').on('click', function () {
        hideall();
        $('#TimesDiv').show();
    });
    $('.kpis').on('click', function () {
        hideall();
        $('#kpis').show();
    });
    $('.PlanDoc').on('click', function () {
        hideall();
        $('#PlanDocDiv').show();
    });

    $('.activities').on('click', function () {
        hideall();
        $('#activities').show();
    });

    $('.i-dates').on('click', function () {
        hideall();
        $('#i-dates').show();
    });
    $('.reviewTab').on('click', function () {
        hideall();
        $(".topSummary").show('slow');
        $('#reviewDiv').show();
        $(".mainTabsAndNav").animate({ marginTop: '6%' }, 1000);
        $('#p_monitoring').hide();
        $('#c_monitoring').hide();
        $('#summary').hide();
        $('.p_details').hide();
        $('.mainTabsAndNav').removeClass("col-md-8").addClass("col-md-12");
    });
    $('.financialphase').on('click', function () {
        hideall();
        $('#financial').show();
    });
    $('.MOBtab').on('click', function () {
        hideall();
        $('#MOBdiv').show();
    });
    // $('.planNav').on('click',function(){
    // hideall();
    // $('#PlanDocDiv').show();
    // });
    $('.physical').on('click', function () {
        hideall();
        $('#physical').show();
    });
    $('.quality_assesment').on('click', function () {
        hideall();
        $('#quality_assesment').show();
    });
    $('.stakeholder').on('click', function () {
        hideall();
        $('#stakeholder').show();
    });
    $('.issues').on('click', function () {
        hideall();
        $('#issues').show();
    });
    $('.risks').on('click', function () {
        hideall();
        $('#risks').show();
    });
    $('.HSE').on('click', function () {
        hideall();
        $('#HSE').show();
    });
    $('.procuremnet').on('click', function () {
        hideall();
        $('#procurement').show();
    });
    $('.gllery').on('click', function () {
        hideall();
        $('#Gallery').show();
    });
    $('.financial').on('click', function () {
        hideall();
        $('#financialDiv').show();
    });
    $('.Objectives').on('click', function () {
        hideall();
        $('#Objectives').show();
    });
    $('.PAT').on('click', function () {
        hideall();
        $('#PAT').show();
    });
    $('.Documents').on('click', function () {
        hideall();
        $('#Documents').show();
    });
});

// document.querySelector('.alert-success-msg').onclick = function(){
// swal("Good job!", "You submitted the project!", "success");
// };
$(function () {
    $('input[name="asd"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});

$(function () {
    $('input[name="ts"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});

$(function () {
    $('input[name="cwd"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

});

$(document).ready(() => {
    // $('.select2').select2()
})

$('button#addmore').click(function (e) {
    var add_stakeholder = `<tr>
    <td>
        <label for="">1</label>
    </td>
    <td>
        <div class="col-md-12">
            <select id="districts" name="stakeholder" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                <option value="" hidden='hidden'>Select</option>
                <option value="">some option</option>
                <option value="">to choose</option>
                <option value="">from</option>
            </select>
        </div>
    </td>
    <td><input type="text" name="stakeholder_name"
            class="form-control" /></td>
    <td><input type="text" name="stakeholder_designation"
            class="form-control" /> </td>
    <td><input type="text" name="stakeholder_mil"
            class="form-control" />
      </td>
    <td><input type="text" name="stakeholder_number"
            class="form-control" /></td>
                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>`
    $('#stakeholders').append(add_stakeholder);
});
$('button#add-more-issues').click(function (e) {
    var temp = `
                    <tr>
                        <td><input type="text" name="issue" style="width:100%;padding:2%;" /></td>
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
$('button#add-more').click(function (e) {
    var add_risks = `<tr>
                <td><input type="text" class="form-control"></td>'
                <td>
                  <select class="form-control form-control-primary">
                    <option value="" selected="" disabled="">Activity</option>
                    <option value="1">Activity 1</option>
                    <option value="2">Activity 2</option>
                    <option value="3">Activity 3</option>
                    <option value="4">Activity 4</option>
                    <option value="5">Activity 5</option>
                  </select>
                </td>
                <td><input type="text"  class="form-control"></td>'
                <td><input type="text" class="form-control"></td>'
                <td><input type="text" class="form-control"></td>'
                <td>
                  <select class="form-control form-control-primary">
                    <option value="" selected="" disabled="">Probability</option>
                    <option value="1">Probability 1</option>
                    <option value="2">Probability 2</option>
                    <option value="3">Probability 3</option>
                    <option value="4">Probability 4</option>
                    <option value="5">Probability 5</option>
                  </select>
                </td>
                <td>
                  <select class="form-control form-control-primary">
                    <option value="" selected="" disabled="">Impact</option>
                    <option value="1">Impact 1</option>
                    <option value="2">Impact 2</option>
                    <option value="3">Impact 3</option>
                    <option value="4">Impact 4</option>
                    <option value="5">Impact 5</option>
                  </select>
                </td>
                <td><input type="text" class="form-control"></td>'
                <td><input type="text" class="form-control"></td>'
                <td><button class="btn btn-sm btn-danger" id="remove" onclick="removerow(this)" name="remove[]" type="button">-</button></td>'
                </tr>`
    $('#riskmatrix').append(add_risks);
});

$('button#add_activity').click(function (e) {

    var add_activities = '<div class="row form-group component_Activities">'
        + '<div class="col-md-10 mb_1 offset-md-1"><input type="text" class="form-control" placeholder="Add Task" name="c_activity[]"> </div>'
        // +'<div class="col-md-2"> <input type="text" class="form-control" placeholder="Cost" name="c_cost[]"></div>'
        // +'<div class="col-md-2"><input type="text" class="form-control" placeholder="Units" name="c_unit[]"></div>'
        // +'<div class="col-md-2"><input type="text" class="form-control" placeholder="Quantity" name="c_quantity[]"></div>'
        + '<div class="col-md-1"><button class="btn btn-danger btn-sm" name="remove_activity[]" onclick="removerow(this)"  type="button">-</button></div>'
        + '</div>';
    $('.planMactivities').append(add_activities);
});


$('button#add_more_component').click(function (e) {
    var add_component = '<div class="row components">'
        + '<div class="form-group col-md-1 offset-md-1 ">'
        + '<br>'
        + '<button class=" btn btn-sm btn-danger" onclick="removerow(this)" name="remove_component[]" id="remove_component" type="button"><i class="fa fa-minus"></i></button>'
        + '</div>'
        + '<div class="form-group col-md-6  ">'
        + '<label for=""> <b>Component Title :</b></label><br>'
        + '<select class=" form-control form-control-primary ">'
        + '<option value="" selected disabled>Select Component</option>'
        + '<option value="1" >Component 1</option>'
        + '<option value="2">Component 2</option>'
        + '<option value="3" >Component 3</option>'
        + '</select>'
        + '</div>'
        + '<div class="col-md-2 offset-md-1">'
        + '<br>'
        + '<button class=" btn btn-sm btn-success" name="add_more_act[]" id="add_more_act" onclick="add_activityInComp(this)" type="button">Add Activity</button>'
        + '</div>'
        + '</div>';
    $('.oneComponentQA').append(add_component);
});
var objct = 2;
function autoindex() {
    var sib = $(document).find('.newClass').siblings();
    // console.log(sib);
    var i = 0;
    for (i = 0; i < sib.length; i++) {
        var cl_array = sib[i].getAttribute('class').split(' ');
        var val = "";
        for (var j = 0; j < cl_array.length; j++) {
            if (cl_array[j].startsWith('newClass')) {
                val = cl_array[j];
                break;
            }
        }
        if (val != "") {
            $('.' + val + ' > label').text('Objective ' + (i + 2));
            $('.' + val + ' > div > input').attr('placeholder', 'Objective ' + (i + 2));
            $('.' + val).addClass('newClass' + (i + 2)).removeClass(val);
        }
    }
    objct = i + 2;
}
$('#add_more_objective').click(function (e) {
    // var newClass='obj_'objct++;
    var add_objective = `<div class="DisInlineflex newClass` + objct + ` mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective ` + objct + `</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective ` + objct + `">
                                </div>
                                <div class="col-sm-2 removeObjective text_center">
                                  <button class="btn btn-sm btn-danger" title="Delete Objective ` + objct + `" type="button" id="">-</button>
                                </div>
                              </div>`
    $('.objtivesNew').append(add_objective);
    objct += 1;
});
$('#saveObjComp').click(function () {
    // <select class="select2 col-md-12" id="option`+ oc + `" multiple>

    $('input[name^=obj]').each(function () {
        var ObjCompHere = `<li class="row mb_2">
                                <span id='objvalue`+ oc + `' class="float-left col-md-6"></span>
                                <span class="float-right col-md-6">
                                <select class="select2 col-md-12" id="option`+ oc + `" multiple="multiple">

                                </select>
                                </span>
                              </li>`
        var options = ""
        // $(ObjCompHere)
        // var obj = [];
        $('input[name^=comp]').each(function () {
            // obj.push($(this).val());
            options += "<option value='" + $(this).val() + "'>" + $(this).val() + "</option>"
        });
        // console.log(options,'here');
        // $('input[name^=obj]').each(function(){
        var t = $(ObjCompHere)
        t.find('#objvalue' + oc + '').text($(this).val())
        $(options).appendTo(t.find('#option' + oc + ''))
        t.appendTo('#ObjCompHere');
        // });
        $('.select2').select2()
        // console.log(obj);
        // return false;
        oc++;
    });
});
$(document).on('click', '.removeObjective', function () {
    if ($(this).parent().attr('class').split(' ')[0].split('ss')[1] == objct - 1) {
        $(this).parent().remove();
    }
    else {
        $(this).parent().remove();
        autoindex();
    }
});


var compAct = 2;
function autoindexcomp() {
    var sib = $(document).find('.newClasscompAct').siblings();
    // console.log(sib);
    var i = 0;
    for (i = 0; i < sib.length; i++) {
        var cl_array = sib[i].getAttribute('class').split(' ');
        var val = "";
        for (var j = 0; j < cl_array.length; j++) {
            if (cl_array[j].startsWith('newClasscompAct')) {
                val = cl_array[j];
                break;
            }
        }
        if (val != "") {
            $('.' + val + ' > label').text('Component ' + (i + 2));
            $('.' + val + ' > div > input').attr('placeholder', 'Component ' + (i + 2));
            $('.' + val).addClass('newClasscompAct' + (i + 2)).removeClass(val);
        }
    }
    compAct = i + 2;
}
$('#add_more_compAct').click(function (e) {
    // var newClass='obj_'objct++;
    var add_compAct = `<div class="DisInlineflex newClasscompAct` + compAct + ` mb_2 col-md-12">
                            <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component ` + compAct + `</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form-txt-primary" name="comp[]" placeholder="Component ` + compAct + `">
                            </div>
                            <div class="col-sm-2 removecompAct text_center">
                              <button class="btn btn-sm btn-danger" title="Delete Objective ` + compAct + `" type="button" id="">-</button>
                            </div>
                          </div>`
    $('.compActNew').append(add_compAct);

    compAct += 1;
});

$(document).on('click', '.removecompAct', function () {
    // console.log("Here");
    if ($(this).parent().attr('class').split(' ')[0].split('ct')[1] == compAct - 1) {
        $(this).parent().remove();
    }
    else {
        $(this).parent().remove();
        autoindexcomp();
    }
});


$(document).ready(function () {
    $("#ObjCompShowSum").click(function () {
        $(".SumObjComp").show('slow');
        var cc = oc
        for (var i = 1; i < cc; i++) {
            var t = $('#objvalue' + i)[0].innerHTML
            var SumObjComp = `<p class="clearfix pd_1_6">
            <span id="SumObj" class="float-left col-md-6"></span>
            <span id="SumComp" class="float-right col-md-6"></span>
            </p>`
            console.log($(SumObjComp).find('#SumObj')[0].innerHTML);
            $(SumObjComp).find('#SumObj')[0].innerHTML = t
            $(SumObjComp).find('#SumObj')
            $("#option" + i + " option:selected").each(function () {
                $(SumObjComp).find('#SumComp').innerHTML= $(this).val()
                // $(options).appendTo(t.find('#option'))
                // sumObjCaompHere.appendTo('#ObjCompHere')
            });
            $(SumObjComp).appendTo('.SumObjComp');
        }
    });
});
//
// $(document).on('click','#ObjCompShowSum',function(){
// console.log($(this).val());
// var a= $("#option1 :selected");
// a.map(function(){
//   console.log($(this).value);
//   return this.value
// }).get().join(", ");
// for(var i =1 ;i<oc;i++){
// $('#option'+i+':selected').each(function(){});
// };});
// newly
// $('#option1').change(function(){;
//   var SelectedOption = $('#option1 option:selected');
//   if(SelectedOption.length > 0)
//   var resultString = '';
//   SelectedOption.each(function(){
//     resultString+= 'value = ' +$(this).val() + ', Text = ' + $(this).text()+'<br/>';
//   })
//   $('.SumObjComp').html(resultString);
// });
// end newly


function add_activityInComp(e) {
    var add_activities_to_assess = '<div class="row singleActivity">'
        + '<div class="form-group col-md-3 offset-md-1 " style="margin-bottom:10px !important;">'
        + '<label for=""><b>Activities</b></label>'
        + '<select class="form-control form-control-warning" style="width: 90%;">'
        + '<option value="" selected disabled>Select Activity</option>'
        + '<option value="1" >Activity 1</option>'
        + '<option value="2">Activity 2</option>'
        + '<option value="3" >Activity 3</option>'
        + '</select></div>'
        + '<div class="form-group col-md-3 ">'
        + '<label for=""><b>Assesment</b></label>'
        + '<select class=" form-control " style="width: 90%;">'
        + '<option value="" selected disabled>Select Assesment Type</option>'
        + '<option value="1" style="background:#e85445;color:white;">Poor</option>'
        + '<option value="2" style="background:#f5d75c;color:white;">PartiallySatisfactory</option>'
        + '<option value="3" style="background:#44d581;color:white;">Satisfactory</option>'
        + '</select>'
        + '</div>'
        + '<div class="form-group col-md-3">'
        + '<label for=""><b>Remarks</b></label><br>'
        + '<textarea name="qa_remarks" id="qa_remarks" class="form-control"  style="width: 90%;" type="text"></textarea>'
        + '</div>'
        + '<div class="form-group col-md-1 ">'
        + ' <br><button class="btn btn-danger btn-sm" onclick="removerow(this)" name="remove_Comp_activity[]"><span style="font-size:12px;">-</span></button>'
        + '</div>'
        + '</div>';
    $(e).parent().parent().append(add_activities_to_assess);
}

function removerow(e) {
    $(e).parent().parent().remove();
}

function removeIssuerow(e) {
    $(e).parent().parent().remove();
}
