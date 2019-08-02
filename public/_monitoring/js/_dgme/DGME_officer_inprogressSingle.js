"use strict";
var oc = 1;
var compopt = "";
$(document).ready(function () {
  $('[data-toggle="popover"]').popover();

  // $(".planNav").click(function () {
  //     $(".topSummary").show('slow');
  //     $(".mainTabsAndNav").animate({ marginTop: '6%' }, 1000);
  // });

  $("input:checkbox").click(function () {
    $("input:checkbox")
      .not(this)
      .prop("checked", false);
  });

  $(".golbtn").click(function () {
    $(this)
      .parent()
      .hide(100);
  });
  // $(".topSummary").mouseleave(function () {
  //     $(".uptiQ").hide(100);
  // });
  $(".uptiQ").click(function () {
    // $('this').hide();
    $(".downtiQ").show("slow");
    $(".topSummary ").slideUp("slow");
    $(".mainTabsAndNav").animate({
      marginTop: "0%"
    }, 1000);
  });
  $(".downtiQ").click(function () {
    // $('.downtiQ').hide();
    $(".uptiQ").show(100);
    $(".topSummary ").slideDown("slow");
    $(".mainTabsAndNav").animate({
      marginTop: "12%"
    }, 1000);
  });

  //financial progress
  $("#u_against_rel, #total_release_to_date").keyup(function () {
    var utilization_against_releases = $("#u_against_rel").val();
    var total_release_to_date = $("#total_release_to_date").val();

    var result = (utilization_against_releases / total_release_to_date) * 100;
    result = result.toFixed(2);
    $("#f_progress").val(result);
  });

  //FINANCIAL PHASING
  $(document).on("keyup", ".count-me", function () {
    var parent = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent();
    var tds = parent.find(".count-me");
    // console.log('counting',tds,'asdasdasd',parent);
    var sum = 0;
    for (var i = 0; i < tds.length; i++) {
      if (tds[i].value != "") sum += parseInt(tds[i].value, 10);
    }
    // console.log(sum, 'suuum');
    // parent.find('#ot_cost').text(sum)
    if (sum <= 119.75) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("errortiQ blue sky green")
        .addClass("red")
        .attr("title", "Bellow 25%");
    } else if (sum > 119.75 && sum <= 239.25) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("errortiQ green blue red")
        .addClass("sky")
        .attr("title", "Above 25%");
    } else if (sum > 239.25 && sum <= 359.25) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("errortiQ sky green red")
        .addClass("blue")
        .attr("title", "Above 50%");
    } else if (sum > 359.25 && sum < 479) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("errortiQ blue sky red")
        .addClass("green")
        .attr("title", "Above 75% but not 100%");
    } else if (sum > 479) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("blue sky green red")
        .addClass("errortiQ")
        .attr("title", "Something wrong");
    } else if ((sum = 479)) {
      parent
        .find("#ot_cost")
        .text(sum)
        .removeClass("errortiQ blue sky red green")
        .attr("title", "100% Completed");
    }
    if (parent.find("#t_cost").text() != parent.find("#ot_cost").text()) {
      var dif =
        parseInt(parent.find("#t_cost").text()) -
        parseInt(parent.find("#ot_cost").text());
      // console.log(dif, 'difff');
      if (dif <= 119.75) {
        parent
          .find("#od_cost")
          .text(dif)
          .removeClass("errortiQ blue sky red")
          .addClass("green")
          .attr("title", "Above 75%");
      } else if (dif > 119.75 && dif <= 239.25) {
        parent
          .find("#od_cost")
          .text(dif)
          .removeClass("errortiQ green sky red")
          .addClass("blue")
          .attr("title", "Bellow 75%");
      } else if (dif > 239.25 && dif <= 359.25) {
        parent
          .find("#od_cost")
          .text(dif)
          .removeClass("errortiQ blue green red")
          .addClass("sky")
          .attr("title", "Bellow 50%");
      } else if (dif > 359.25 && dif <= 479) {
        parent
          .find("#od_cost")
          .text(dif)
          .removeClass("errortiQ blue sky green")
          .addClass("red")
          .attr("title", "Bellow 25%");
      }
      if (dif < 0) {
        parent
          .find("#od_cost")
          .text(dif)
          .removeClass("blue sky green red")
          .addClass("errortiQ")
          .attr("title", "Exceed Amount");
      }
      parent.find(".fazuldiv").hide();
      parent.find(".dangercustom").show();
    } else {
      parent.find(".fazuldiv").show();
      parent.find(".dangercustom").hide();
    }
  });

  var start_date = moment(projectWithRevised.project_detail.planned_start_date);
  var end_date = moment(projectWithRevised.project_detail.planned_end_date);

  let orig_period = moment.duration(end_date.diff(start_date));
  var orig = {
    cost: projectWithRevised.project_detail.orignal_cost,
    period: Math.round(orig_period.asMonths()),
    date: start_date.format("D MMM Y")
  };

  var revs = [];

  projectWithRevised.revised_approved_cost.forEach(function (value, index) {
    if (value && projectWithRevised.revised_end_date[index]) {
      let start_date1 = moment(
        projectWithRevised.project_detail.revised_start_date
      );
      let end_date1 = moment(
        projectWithRevised.revised_end_date[index].end_date
      );
      let revs_period = moment.duration(end_date1.diff(start_date1));
      revs.push({
        cost: value.cost,
        period: Math.round(revs_period.asMonths()),
        date: start_date1.format("D MMM Y")
      });
    }
  });
  // { "cost": "450", "period": "33", "date": '15 September 2013' },
  // { "cost": "479", "period": "33", "date": '15 September 2013' },
  // { "cost": "479", "period": "37", "date": '15 September 2013' }

  var revisionTable = `<div>
    <h5 style="padding-top:20px;padding-bottom:10px;clear:both;" class="revisedLabel">Revised 1</h5>
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
    var substring = "";
    var j = 0;
    for (j = 2; j <= 30; j++) {
      if (j == 9)
        substring +=
        '<option value="200' +
        j +
        "-" +
        (j + 1) +
        '">200' +
        j +
        "-" +
        (j + 1) +
        "</option>";
      else if (j > 9)
        substring +=
        '<option value="20' +
        j +
        "-" +
        (j + 1) +
        '">20' +
        j +
        "-" +
        (j + 1) +
        "</option>";
      else
        substring +=
        '<option value="200' +
        j +
        "-0" +
        (j + 1) +
        '">200' +
        j +
        "-0" +
        (j + 1) +
        "</option>";
    }
    var tr = `
    <tr>
    <td id='serial'></td>
    <td>
        <select disabled class="form-control select2" name="financial_year" id="financial_year">
                <option value="0" hidden>Select Financial Year </option>`.concat(
      substring
    ).concat(`</select>
    </td>
    <td> <input id='m_duration' disabled type="text" class="form-control fn"> </td>
    <td> <input type="number" class="form-control fn count-me"> </td>
    </tr>
    `);

    // var tr_ob = $(tr)
    // var rtm = parseInt($('#rt_months').text(),10)
    var tm = parseInt(orig.period);
    var date = moment(orig.date, "DD MMMM YYYY");
    $(document)
      .find("#t_cost")
      .text(orig.cost);
    $(document)
      .find("#f_date")
      .text(date.format("DD MMMM YYYY"));
    $(document)
      .find("#t_months")
      .text(orig.period);
    var check = moment()
      .year(date.year())
      .month(7)
      .date(1);
    if (date >= check) {
      check.add(1, "years");
    }
    var months = moment.duration(date.diff(check)).as("months");
    months = parseInt(months, 10);
    if (months < 0) months *= -1;

    // var r_months = months

    var count = 1;
    while (tm != 0) {
      var tr_ob = $(tr);
      tr_ob.find("#financial_year").children()[
        parseInt(check.add(1, "years").format("YY")) - 3
      ].selected = "selected";
      tr_ob.find("#m_duration").val(months);
      tr_ob.find("#serial").text(count++);
      tm -= months;
      if (tm >= 12) months = 12;
      else months = tm;
      tr_ob.appendTo("#original_tbody");
    }

    if (revs.length != 0) {
      let mycount = 1;
      revs.forEach(item => {
        // console.log('THIS IS SPARTA');

        var tm = parseInt(item.period);
        var table = $(revisionTable);
        table.find("h5.revisedLabel").text("Revision " + mycount);
        var date = moment(item.date, "DD MMMM YYYY");
        table.find("#t_cost").text(item.cost);
        table.find("#f_date").text(date.format("DD MMMM YYYY"));
        table.find("#t_months").text(item.period);
        var check = moment()
          .year(date.year())
          .month(7)
          .date(1);
        if (date >= check) {
          check.add(1, "years");
        }
        var months = moment.duration(date.diff(check)).as("months");
        months = parseInt(months, 10);
        if (months < 0) months *= -1;

        var count = 1;
        while (tm != 0) {
          var tr_ob = $(tr);
          tr_ob.find("#financial_year").children()[
            parseInt(check.add(1, "years").format("YY")) - 3
          ].selected = "selected";
          tr_ob.find("#m_duration").val(months);
          tr_ob.find("#t_cost").text(item.cost);
          tr_ob.find("#serial").text(count++);
          tm -= months;
          if (tm >= 12) months = 12;
          else months = tm;
          tr_ob.appendTo(table.find("#original_tbody"));
        }
        mycount++;
        table.prependTo("#financial");
      });
    }
  });

  //END

  function hideallmaintabs() {
    $("#reviewDiv").hide();
    $("#p_monitoring").hide();
    $("#c_monitoring").hide();
    $("#r_monitoring").hide();
    $("#summary").hide();
  }

  $(".summaryNav").on("click", function () {
    hideallmaintabs();
    hideall();
    $(".mainTabsAndNav")
      .removeClass("col-md-12")
      .addClass("col-md-9");
    $(".nav-item")
      .children("a")
      .removeClass("active");
    $(this)
      .children("a")
      .addClass("active");
    $("#summary").show();
    $(".p_details").show(1000);
    $(".topSummary").hide("slow");
    $(".downtiQ").hide("slow");
    $(".uptiQ").hide("slow");
    $(".reviewNavBar").hide();
    $(".planNavBar").hide();
    $(".conductNavBar").hide();
    $(".resultNavBar").hide();
    $(".mainTabsAndNav").animate({
      marginTop: "0px"
    }, 500);
    $(".mainTabsAndNav").removeClass("mt_6p");
    $("#r_monitoring").hide();
    $('.p_details').insertAfter('.mainTabsAndNav')
  });

  $(".planNav").on("click", function () {
    hideallmaintabs();
    $(".nav-link").removeClass("active");
    $(".p_details").hide();
    $(".mainTabsAndNav")
      .removeClass("col-md-9")
      .addClass("col-md-12");
    $("#p_monitoring").show();
    $("#PlanDocDiv").show();
    $(".planNavBar").show();
    $(".conductNavBar").hide();
    $(".resultNavBar").hide();
    $(".PlanDoc").addClass("active");
    // $(".uptiQ").show('slow');
    $(".downtiQ").show();
    $(".reviewNavBar").hide();
    $(".r_monitoringDivv").hide();
    $("#r_monitoring").hide();
  });

  function hideall() {
    $("#PlanDocDiv").hide();
    $("#financial").hide();
    $("#physical").hide();
    $("#MOBdiv").hide();
    $("#quality_assesment").hide();
    $("#stakeholder").hide();
    $("#issues").hide();
    $("#risks").hide();
    $("#HSE").hide();
    $("#procuremnet").hide();
    $("#procu").hide();
    $("#kpis").hide();
    $("#activities").hide();
    $("#kpis").hide();
    $("#Gallery").hide();
    $("#Objectives").hide();
    $("#PAT").hide();
    $("#Documents").hide();
    $("#i-dates").hide();
    $("#reviewDiv").hide();
    $("#TimesDiv").hide();
    $("#CostingDiv").hide();
    $("#prolocDiv").hide();
    $("#galleryDiv").hide();
    $("#WBSDiv").hide();
    $("#r_monitoring").hide();
    $(".r_monitoringDivv").hide();
    $("#userlocDiv").hide();
    $("#userKPIDiv").hide();
    $("#costDiv").hide();
    $("#locationDiv").hide();
    $("#AgeOrgDiv").hide();
    $("#DatesDiv").hide();
    $(".resultNavBar").hide();
    $("#profile1").hide();
    $("#home1").hide();
  }

  $(".conductNav").on("click", function () {
    hideallmaintabs();
    hideall();
    $(".nav-link").removeClass("active");
    $(".quality_assesment").addClass("active");
    $("#quality_assesment").show();
    $("#c_monitoring").show();
    $("#quality_assesment").show();
    $(".conductNavBar").show();
    $(".resultNavBarr").hide();
    $("#p_monitoring").hide();
    $(".planNavBar").hide();
    $(".p_details").hide();
    $(".mainTabsAndNav")
      .removeClass("col-md-8")
      .addClass("col-md-12");
    // $('.mainTabsAndNav').animate({ marginTop: '6%' }, 1000);
    // $(".topSummary").show('slow');
    // $(".uptiQ").show('slow');
    $(".downtiQ").show();
    $(".reviewNavBar").hide();
    $(".r_monitoringDivv").hide();
    $("#r_monitoring").hide();
  });
  $(".resultNav").on("click", function () {
    hideallmaintabs();
    hideall();
    $(".nav-link").removeClass("active");
    $("#r_monitoring").addClass("active");
    $(".galnav").addClass("active");
    $("#home1").addClass("active");
    $("#r_monitoring").show();
    $(".mainTabsAndNav")
      .removeClass("col-md-9")
      .addClass("col-md-12");
    // $('.mainTabsAndNav').animate({ marginTop: '6%' }, 1000);
    // $(".topSummary").show('slow');
    $(".p_details").hide();
    // $(".uptiQ").show('slow');
    $(".downtiQ").show();
    $(".reviewNavBar").hide();
    $(".planNavBar").hide();
    $(".conductNavBar").hide();
    $(".resultNavBar").show();
    $(".r_monitoringDivv").show();
  });

  $(".CostingTab").on("click", function () {
    hideall();
    $("#CostingDiv").show();
  });
  $("#btnprofile1").on("click", function () {
    hideall();
    $("#profile1").show();
    $(".r_monitoringDivv").show();
    $("#r_monitoring").show();
    $(".resultNavBar").show();
    $("#home1").hide();
    $("#home1").removeClass("active");
  });
  $(".galnav").on("click", function () {
    hideall();
    $("#profile1").hide();
    $(".r_monitoringDivv").show();
    $("#r_monitoring").show();
    $(".resultNavBar").show();
    $("#profile1").removeClass("active");
    $("#home1").show();
  });
  $(".procurement").on("click", function () {
    hideall();
    $("#procu").show();
  });
  // $('#did').on('click', function () {
  //     hideall();
  //     $('#CostingDiv').show();
  //     $("#tili").removeClass("active");
  //     $("#cosli").addClass("active");
  // });
  $(".TimeTab").on("click", function () {
    hideall();
    $("#TimesDiv").show();
  });

  // $('#saveTasks').on('click', function () {
  //     hideall();
  //     $('#TimesDiv').show();
  //     $("#tali").removeClass("active");
  //     $("#tili").addClass("active");
  // });
  // $('#svkp').on('click', function () {
  //     hideall();
  //     $('#activities').show();
  //     $("#kpisss").removeClass("active");
  //     $("#proloc").addClass("active");
  // });

  $(".kpis").on("click", function () {
    hideall();
    $("#kpis").show();
  });
  $(".proloc").on("click", function () {
    hideall();
    $("#prolocDiv").show();
  });
  $(".PlanDoc").on("click", function () {
    hideall();
    $("#PlanDocDiv").show();
  });

  $(".activities").on("click", function () {
    hideall();
    $("#activities").show();
  });

  $(".i-dates").on("click", function () {
    hideall();
    $("#i-dates").show();
  });
  $(".reviewTab").on("click", function () {
    hideall();
    $(".nav-link").removeClass("active");
    $(".costTab").addClass("active");
    // $(".topSummary").show('slow');
    $(".reviewNavBar").show();
    $("#reviewDiv").show();
    $("#costDiv").show();
    // $(".mainTabsAndNav").animate({ marginTop: '6%' }, 1000);
    $("#p_monitoring").hide();
    $("#c_monitoring").hide();
    $(".planNavBar").hide();
    $("#summary").hide();
    $(".p_details").hide();
    $(".conductNavBar").hide();
    $(".resultNavBar").hide();
    $(".r_monitoringDivv").hide();
    $("#r_monitoring").hide();
    $(".mainTabsAndNav")
      .removeClass("col-md-8")
      .addClass("col-md-12");
    $(".downtiQ").show("slow");
  });
  $(".financialphase").on("click", function () {
    hideall();
    $("#financial").show();
  });
  $(".costTab").on("click", function () {
    hideall();
    $("#costDiv").show();
  });
  $(".LocationTab").on("click", function () {
    hideall();
    $("#locationDiv").show();
  });
  $(".AgeOrgTab").on("click", function () {
    hideall();
    $("#AgeOrgDiv").show();
  });
  $(".datestabrev").on("click", function () {
    hideall();
    $("#DatesDiv").show();
  });
  // $('#saveObjComp').on('click', function () {
  //     hideall();
  //     $('#MOBdiv').show();
  //     $('#MOBtab').addClass("active");
  //     $('#pdli').removeClass("active");
  // });
  $(".MOBtab").on("click", function () {
    hideall();
    $("#MOBdiv").show();
  });
  $(".userlocTab").on("click", function () {
    hideall();
    $("#userlocDiv").show();
  });
  $(".userKPITab").on("click", function () {
    hideall();
    $("#userKPIDiv").show();
  });
  // $('.planNav').on('click',function(){
  // hideall();
  // $('#PlanDocDiv').show();
  // });
  $(".physical").on("click", function () {
    hideall();
    $("#physical").show();
  });
  $(".quality_assesment").on("click", function () {
    hideall();
    $("#quality_assesment").show();
  });
  $(".stakeholder").on("click", function () {
    hideall();
    $("#stakeholder").show();
  });
  $(".issues").on("click", function () {
    hideall();
    $("#issues").show();
  });
  $(".risks").on("click", function () {
    hideall();
    $("#risks").show();
  });
  $(".HSE").on("click", function () {
    hideall();
    $("#HSE").show();
  });
  $(".procuremnet").on("click", function () {
    hideall();
    $("#procurement").show();
  });
  $(".gllery").on("click", function () {
    hideall();
    $("#Gallery").show();
  });
  $(".Objectives").on("click", function () {
    hideall();
    $("#Objectives").show();
  });
  $(".PAT").on("click", function () {
    hideall();
    $("#PAT").show();
  });
  $(".Documents").on("click", function () {
    hideall();
    $("#Documents").show();
    $("#r_monitoring").hide();
    $(".resultNavBar").hide();
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

// $(document).ready(() => {
// $('.select2').select2()
//     var SponsoringAgencylist=[]
//  var SAgency='';
// $.ajax({
//     type: "get",
//     url: '{{route("getAssignedSponsoringAgency")}}',
//     async: false,
//     success: function(data){
//     // console.log(data);
//     SponsoringAgencylist = data;
//     },
//     error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
//     console.log(JSON.stringify(jqXHR));
//     console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
//     }
// });
// for (var i = 0; i < SponsoringAgencylist.length; ++i) {
//     SAgency=SAgency+'<option value="'+SponsoringAgencylist[i].id+'">'+SponsoringAgencylist[i].name+'</option>';
// }
// })

$("button#addmoreexecuting").click(function (e) {
  var add_stakeholder =
    `<tr>
    <td>
        <div class="col-md-12">
            <select id="" name="stakeholderExecuting" class="form-control form-control-primary " data-placeholder="" style="width: 100%;">
                ` +
    Ea +
    `
            </select>
        </div>
    </td>
    <td><input type="text" name="Executingstakeholder_name[]"
    class="form-control" /></td>
    <td><input type="text" name="Executingstakeholder_designation[]"
        class="form-control" /> </td>
<td><input type="text" name="Executingstakeholder_number[]"
    class="form-control" /></td>
<td><input type="text" name="Executingstakeholder_email[]"
    class="form-control" /></td>
                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>`;
  $("#Executingstakeholders").append(add_stakeholder);
});
var Ea = "";

function executingAgencyforCM(agencies) {
  agencies.forEach(function (val, index) {
    Ea =
      Ea +
      `
            <option value="` +
      val.id +
      `">` +
      val.executing_agency_id +
      `</option>
        `;
  });
}
var Sa = "";

function sponsoringAgencyforCM(agencies) {
  // var agency = $(this).val();
  // var count = 1;

  agencies.forEach(function (val, index) {
    // console.log(val.sponsoring_agency_id.SponsoringAgency.name,'id');
    Sa =
      Sa +
      `
            <option value="` +
      val.id +
      `">` +
      val.sponsoring_agency_id +
      `</option>
        `;
  });

  // $('.select2').select2();
}
$("button#addmoresponsoring").click(function (e) {
  var add_stakeholder =
    `<tr>
    <td>
        <div class="col-md-12">
            <select id="" name="Sponsoringstakeholder" class="form-control form-control-primary " data-placeholder="" style="width: 100%;">
              ` +
    Sa +
    `
            </select>
        </div>
    </td>
    <td><input type="text" name="Sponsoringstakeholder_name[]"
    class="form-control" /></td>
    <td><input type="text" name="Sponsoringstakeholder_designation[]"
        class="form-control" /> </td>
<td><input type="text" name="Sponsoringstakeholder_number[]"
    class="form-control" /></td>
<td><input type="text" name="Sponsoringstakeholder_email[]"
    class="form-control" /></td>
                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>`;
  $("#Sponsoringstakeholders").append(add_stakeholder);
});

$("button#addmoreben").click(function (e) {
  var add_stakeholder = `<tr>

    <td>
        <div class="col-md-12">
        <input type="text" name="Beneficiarystakeholder[]" class="form-control" placeholder="Beneficiary">
        </div>
    </td>
    <td><input type="text" name="Beneficiarystakeholder_name[]"
    class="form-control" /></td>
    <td><input type="text" name="Beneficiarystakeholder_designation[]"
        class="form-control" /> </td>
        <td><input type="text" name="Beneficiarystakeholder_email[]"
    class="form-control" /></td>
<td><input type="text" name="Beneficiarystakeholder_number[]"
    class="form-control" /></td>

                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>`;
  $("#Beneficiarystakeholders").append(add_stakeholder);
});
$("button#add-more-issues").click(function (e) {
  
  var temp = $("tbody#add-issue-here")
    .children()
    .first()
    .clone();
  
  temp.children().children('span.select2').remove();    
  temp
    .children()
    .last()
    .remove();
  temp.append(
    '<td><button class="btn btn-sm btn-danger" id="remove-issue" onclick="removeIssuerow(this)" name="remove[]" type="button">-</button></td>'
  );
  $(temp).appendTo("#add-issue-here");
  $("select[name='issuetype[]']").select2();
    // $(".select2-hidden-accessible").last().css("display", "none");
});
$("button#add-more").click(function (e) {
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
                </tr>`;
  $("#riskmatrix").append(add_risks);
});
var countactivity = 0;
$(document).on("click", "#add_activity", function (e) {
  var id_component = $(this).attr("data-id");
  var activityCount = $(this).attr("data-activitycount");
  // console.log('there');
  var add_activities =
    `<div class="row col-md-9 offset-md-1 form-group component_Activities">
        <div class="col-md-11 mb_1">
        <input type="text" class="form-control" placeholder="Add Task" name="c_activity_` +
    id_component +
    `[]">
        </div>
        <div class="col-md-1"><button class="btn btn-danger btn-sm" name="remove_activity[]" onclick="removerow(this)"  type="button">-</button></div>
        </div>`;
  countactivity++;
  // $('.planMactivities').append(add_activities);
  console.log(
    $(this)
    .parent()
    .find("#alltasks"),
    $(this).parent()
  );
  $(this)
    .parent()
    .find("#alltasks")
    .append(add_activities);
});

$(".select2").select2();

function ObjectiveComponent(components, objectives) {
  $("#planMactivities")
    .children()
    .remove();
  $("#ObjCompHere")
    .children()
    .remove();

  var comps = $(this).val();
  var count = 1;
  var compOpt = "";
  components.forEach(function (val, index) {
    compOpt =
      compOpt +
      `
              <option value="` +
      val.id +
      `">` +
      val.component +
      `</option>
          `;
  });
  console.log(compOpt);

  objectives.forEach(function (val, index) {
    var ObjCompHere =
      `
                          <li class="row mb_2"

                              <span id="objectiveHere" class="float-left col-md-6">
                                  <input type="hidden" value="` +
      val.id +
      `" name="objective[]">
                                 <span  class="float-left col-md-6">
                                 ` +
      val.objective +
      `
                                 </span>
                              </span>
                              <span class="float-right col-md-6">
                              <select class="select2 col-md-12" id="component" name="mappedComp_` +
      index +
      `[]" multiple="multiple">
                              ` +
      compOpt +
      `
                              </select>
                              </span>
                              </li>
                              `;

    var t = $(ObjCompHere);
    t.appendTo("#ObjCompHere");
    $(".select2").select2();
  });
}

//project design
// $(document).on('click', 'button#saveObjComp', function ()
//  {
//   $("#planMactivities").children().remove();
//   $("#ObjCompHere").children().remove();

//     var comps = $(this).val();
//     var count = 1;

//     $('input[name^=comp]').each(function () {
//         var val = $(this).val();
//         var addTask = `
//       <div class="row form-group compTask`+ count + `">
//         <div class="col-md-4 offset-md-1"><label for=""> <b class="headText form-txt-primary" id="compname`+ count + `">` + val + `</b></label></div>
//         <div class="col-md-2 offset-md-4 mb_1 Taskbut` + count + `" id="add_activity" style="padding-top:0.6%;">
//           <button class="btn btn-sm btn-warning float-right"  type="button" name="add_activity">Add Tasks</button>
//         </div>
//         <div id="alltasks" class="row col-md-11 offset-md-1 form-group component_Activities">
//         </div>
//       </div>`
//         val = $(this).val();
//         // var comps = $(this).val();
//         $('.planMactivities').append(addTask);
//         // console.log($(e));
//         // yo++;
//         count++;
//     });

//     $('input[name^=obj]').each(function () {
//         var ObjCompHere = `<li class="row mb_2">
//                             <span id='objvalue`+ oc + `' class="float-left col-md-6"></span>
//                             <span class="float-right col-md-6">
//                             <select class="select2 col-md-12" id="option`+ oc + `" multiple="multiple">
//                             </select>
//                             </span>
//                           </li>`
//         var options = ""

//         $('input[name^=comp]').each(function () {

//             options += "<option value='" + $(this).val() + "'>" + $(this).val() + "</option>"
//         });
//         compopt = options

//         var t = $(ObjCompHere)
//         t.find('#objvalue' + oc + '').text($(this).val())
//         $(options).appendTo(t.find('#option' + oc + ''))
//         t.appendTo('#ObjCompHere');
//         // });
//         $('.select2').select2()
//         // console.log(obj);
//         // return false;
//         oc++;
//     });
//  });

function ObjectiveComponentTime(CompActivityMapping) {
  var tasks = CompActivityMapping;
  $("div.comptaskl")
    .children()
    .remove();
  $("div.costcomp")
    .children()
    .remove();
  console.log(tasks);
  var d = ``,
    t = ``;
  tasks.forEach(function (val, index) {
    d =
      d +
      ` <div id='comptaskl' class="col-md-12 row" style="margin-top:5px; padding-left:2% !important;">
        <div class="col-md-6">
        <label for=""><b>` +
      val.m_plan_component.component.component +
      `</b> <br> - ` +
      val.activity +
      `</label>
        <input type="hidden" name="componentActivityId[]" value="` +
      val.id +
      `">
        </div>
        <div class="col-md-4" style="">
        <input type="text" name="daysinduration[]" value="" class="form-control">
        </div>
       </div> `;
    t +=
      `<div class="col-md-12" style="display:inline-flex;">
        <label class="text_left col-md-3"><b>` +
      val.m_plan_component.component +
      `</b> <br> - ` +
      val.activity +
      ` </label>
        <input type="hidden" name="activityId[]" value="` +
      val.activity +
      `">
        <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" " placeholder="Unit" name="Unit[]"></div>
         <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" " placeholder="Quantity" name="Quantity[]"></div>
         <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" " placeholder="Cost" name="Cost[]"></div>
         <div class="col-md-2 mr_0_1"><input type="text" class="form-control" value=" " placeholder="Amount" name="Amount[]">
         </div>
     </div>`;
  });

  $("div.comptaskl").append($(d));
  $("div.costcomp").append($(t));
}

// $(document).on('click', '#saveTasks', function () {
//   $('#comptaskl').children().remove();
//   $('#costcomp').children().remove();
//     var tasks = $('#planMactivities').clone()
//     var c = 1
//     // console.log(tasks.children());

//     tasks.children().each(function () {
//         // console.log($(this),c);
//         var temp = `<div class="col-md-12">
//                       <h5 class="text_left form-txt-primary">
//                       ` + $(this).find('#compname' + c).text() + `
//                       </h5>
//                     </div>`
//         var t1 = `
//         <div class="col-md-12" style="display:inline-flex;">
//           <h5 class="text_left col-md-3 form-txt-primary">
//           ` + $(this).find('#compname' + c).text() + `
//           </h5>
//         <div class="col-md-2 mr_0_1"><input type="text" class="form-control form-txt-primary" placeholder="Unit" name="" /></div>
//         <div class="col-md-2 mr_0_1"><input type="text" class="form-control form-txt-primary" placeholder="Quantity" name="" /></div>
//         <div class="col-md-2 mr_0_1"><input type="text" class="form-control form-txt-primary" placeholder="Cost" name="" /></div>
//         <div class="col-md-2 mr_0_1"><input type="text" class="form-control form-txt-primary" placeholder="Amount" name="" /></div>
//         </div>
//         `
//         var t2 = t1
//         $(this).find('input[name="c_activity[]"]').each(function () {
//             // console.log($(this));
//             temp += `<div class="col-md-12" style="display:inline-flex;"><b class="col-md-3 text_left form-txt" style="padding-left:1% !important;">
//                 `+ $(this).val() + `
//                 </b>
//                 <div class="col-md-9"><input type="text" class="form-control form-txt mb_1" placeholder="Time Duration" /></div></div>`
//             t2 +=`<div class="col-md-12" style="display:inline-flex;"><b class="col-md-3 text_left form-txt" style="padding-left:1% !important;">
//                 `+ $(this).val() + `
//                 </b>
//                 <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Unit" name="" /></div>
//                 <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Quantity" name="" /></div>
//                 <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Cost" name="" /></div>
//                 <div class="col-md-2 mr_0_1"><input type="text" class="form-control" placeholder="Amount" name="" /></div></div>`
//           })
//         c++;
//         $(t2).appendTo('#costcomp')
//         $(temp).appendTo('#comptaskl')
//     });
// });

var compOpt = "";

function componentsfroConductMonitoring(components) {
  console.log(components);

  var comps = $(this).val();
  var count = 1;

  components.forEach(function (val, index) {
    compOpt =
      compOpt +
      `
            <option value="` +
      val.id +
      `">` +
      val.component +
      `</option>
        `;
  });
  $(".select2").select2();
}
var countforconduct = 0;
$("button#add_more_component").click(function (e) {
  var add_component =
    `<div class="row components">
                        <div class="form-group col-md-1 offset-md-1 ">
                        <br>
                        <button class=" btn btn-sm btn-danger" onclick="removerow(this)" name="remove_component[]" id="remove_component" type="button"><i class="fa fa-minus"></i></button>
                        </div>
                        <div class="form-group col-md-6  ">
                        <label for=""> <b>Component Title :</b></label><br>
                        <select class=" form-control kpisel form-control-primary " name="compforconduct_` +
    countforconduct +
    `">
                        ` +
    compOpt +
    `
                        </select>
                        </div>
                        <div class="col-md-2 offset-md-1">
                        <br>
                        <button class=" btn btn-sm btn-success" name="add_more_act[]" id="add_more_act" onclick="add_activityInComp(this,` +
    countforconduct +
    `)" type="button">Add Task</button>
                        </div>
                        </div>`;
  $(".kpisel").select2();

  $(".oneComponentQA").append(add_component);
  countforconduct++;
});
var objct = $("#objct").val() != 0 ? parseInt($("#objct").val()) : 1;
objct++;

function autoindex() {
  var sib = $(document)
    .find(".newClass1")
    .siblings();

  sib.removeClass(function (index, css) {
    return (css.match(/(^|\s)newClass\S+/g) || []).join(" ");
  });
  sib.each(function (entry) {
    $(this)
      .children("div")
      .children("input")
      .attr("placeholder", "Objective " + (entry + 2));
    $(this)
      .children("label")
      .text("Objective " + (entry + 2));
    $(this).addClass("newClass" + (entry + 2));
  });

  objct = i + 2;
}
$("#add_more_objective").click(function (e) {
  var add_objective =
    `<div class="DisInlineflex newClass` +
    objct +
    ` mb_2 col-md-12">
                                <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Objective ` +
    objct +
    `</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control form-txt-primary" name="obj[]" placeholder="Objective ` +
    objct +
    `">
                                </div>
                                <div class="col-sm-2 removeObjective text_center">
                                  <button class="btn btn-sm btn-danger" title="Delete Objective ` +
    objct +
    `" type="button" id="" tabindex=` +
    objct +
    `>-</button>
                                </div>
                              </div>`;
  $(".objtivesNew").append(add_objective);
  objct += 1;
});

$(document).on("click", ".removeObjective", function () {
  if (
    $(this)
    .parent()
    .attr("class")
    .split(" ")[0]
    .split("ss")[1] ==
    objct - 1
  ) {
    $(this)
      .parent()
      .remove();
  } else {
    $(this)
      .parent()
      .remove();
    autoindex();
  }
});
  // $(document).on("click", ".deleteObjective", function()    
  // {
  //         e.preventDefault() // Don't post the form, unless confirmed
  //         if( confirm('Are you sure?') ) 
  //         {
  //             // Post the form
  //             $(e.target).closest('form').submit() // Post the surrounding form
  //         }
  //     });


    
var compAct = $("#compAct").val() != 0 ? parseInt($("#compAct").val()) : 1;
compAct++;

function autoindexcomp() {
  var sib = $(document)
    .find(".newClasscompAct1")
    .siblings();
  sib.removeClass(function (index, css) {
    return (css.match(/(^|\s)newClasscompAct\S+/g) || []).join(" ");
  });
  sib.each(function (entry) {
    $(this)
      .children("div")
      .children("input")
      .attr("placeholder", "Component  " + (entry + 2));
    $(this)
      .children("label")
      .text("Component " + (entry + 2));
    $(this).addClass("newClasscompAct" + (entry + 2));
  });
  compAct = i + 2;
}
$("#add_more_compAct").click(function (e) {
  // var newClass='obj_'objct++;
  var compActTab = 101;
  var add_compAct =
    `<div class="DisInlineflex newClasscompAct` +
    compAct +
    ` mb_2 col-md-12">
                            <label class="col-sm-3 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Component ` +
    compAct +
    `</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form-txt-primary" name="comp[]" placeholder="Component ` +
    compAct +
    `">
                            </div>
                            <div class="col-sm-2 removecompAct text_center">
                              <button class="btn btn-sm btn-danger" title="Delete Objective ` +
    compAct +
    `" type="button" id=""  tabindex=` +
    compActTab++ +
    `>-</button>
                            </div>
                          </div>`;
  $(".compActNew").append(add_compAct);

  compAct += 1;
});

$(document).on("click", ".removecompAct", function () {
  // console.log("Here");
  if (
    $(this)
    .parent()
    .attr("class")
    .split(" ")[0]
    .split("ct")[1] ==
    compAct - 1
  ) {
    $(this)
      .parent()
      .remove();
  } else {
    $(this)
      .parent()
      .remove();
    autoindexcomp();
  }
});

$(document).ready(function () {
  $("#ObjCompShowSum").click(function () {
    $(".SumObjComp")
      .children()
      .remove();
    var headings = `
        <div class="col-md-12 clearfix"><h4>Summary</h4></div>
        <div class="float-left col-md-6"><h5 class="float-left">Objectives</h5></div>
        <div class="float-right col-md-6"><h5 class="float-right">Component</h5></div>`;
    var heading = $(headings);
    heading.appendTo(".SumObjComp");
    $(".SumObjComp").show("slow");
    var cc = oc;

    for (var i = 1; i < cc; i++) {
      var t = $("#objvalue" + i).text();
      var SumObjComp = `
            <div class="clearfix headText" style="border: 1px solid #77777729;padding: 2% 4%;">
            <div id="SumObj" class="float-left col-md-6 boldText"></div>
            <div id="SumComp" class="float-right col-md-6"></div>
            </div>`;
      var has = $(SumObjComp);
      has.find("div#SumObj").text(t);
      $("#option" + i + " option:selected").each(function () {
        // console.log($(this).val());
        var t = `<div>` + $(this).val() + `</div>`;
        $(t).appendTo(has.find("#SumComp"));
      });
      has.appendTo(".SumObjComp");
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

var activitiesforConductmonitoring = "";

function activitiesfroConductMonitoring(activities) {
  var comps = $(this).val();
  var count = 1;

  activities.forEach(function (val, index) {
    activitiesforConductmonitoring =
      activitiesforConductmonitoring +
      `
            <option value="` +
      val.id +
      `">` +
      val.activity +
      `</option>
        `;
  });
}

function add_activityInComp(e, myc) {
  var countforcomponent = myc;
  var add_activities_to_assess =
    `<div class="row singleActivity">
        <div class="form-group col-md-2 offset-md-1" style="margin-bottom:10px !important;">
        <label for=""><b>Tasks</b></label>
        <select class="form-control select2 form-control-warning" name="activitiesforconduct_` +
    countforcomponent +
    `[]">
        <option value="" selected disabled>Select Tasks</option>
          ` +
    activitiesforConductmonitoring +
    `
        </select></div>
        <div class="form-group col-md-2">
        <label for=""><b>Assesment</b></label>
        <select class=" form-control" name="qualityassesment_` +
    countforcomponent +
    `[]">
        <option value="" selected hidden>Assesment Type</option>
        <option value="Poor" style="background:#cc18068c;color:white;">Poor</option>
        <option value="Partially Satisfactory" style="background:#f5d75c;color:white;">Partially Satisfactory</option>
        <option value="Satisfactory" style="background:#44d581;color:white;">Satisfactory</option>
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for=""><b>Progress in %</b></label>
        <select class=" form-control" name="progresspercentage_` +
    countforcomponent +
    `[]">
        <option value="" selected disabled>Progress Percentage</option>
        <option value="25%">0%-25%</option>
        <option value="50%">25%-50%</option>
        <option value="75%">50%-75%</option>
        <option value="100%">75%-100%</option>
        </select>
        </div>
        <div class="form-group col-md-3">
        <label for=""><b>Remarks</b></label><br>
        <textarea name="qa_remarks_` +
    countforcomponent +
    `[]" id="qa_remarks" style="height:37px !important;" class="form-control" type="text"></textarea>
        </div>

        <div class="form-group col-md-1">
         <br><button class="btn btn-danger btn-sm" onclick="removerow(this)" name="remove_Comp_activity[]"><span style="font-size:12px;">-</span></button>
        </div>
        </div>`;
  $(".select2").select2();
  $(e)
    .parent()
    .parent()
    .append(add_activities_to_assess);
}

function removerow(e) {
  $(e)
    .parent()
    .parent()
    .remove();
}

function removeIssuerow(e) {
  $(e)
    .parent()
    .parent()
    .remove();
}
$(document).ready(function () {
  let user_location_count = 2;
  let location_user_count = 2;
  $("#CloneUserLoc").click(function () {
    let data = $("#CloneThisUserLoc").clone();
    let user_div = data.find("select")[0];
    let location_div = data.find("select")[1];
    let site_div = data.find("input.site_name");
    let site_start = data.find("input.site_start");
    let site_end = data.find("input.site_end");
    // let date_div = data.find('input.loc_date');
    let new_user = "user_location_" + user_location_count;
    let new_site = "site_name_" + user_location_count;
    let new_site_start = "site_start_" + user_location_count;
    let new_site_end = "site_end_" + user_location_count;
    let new_location = "location_user_" + user_location_count++ + "[]";
    // let mydate ="dateLoc_"+user_location_count++;
    $(user_div).attr("name", new_user);
    $(site_div).attr("name", new_site);
    $(site_start).attr("name", new_site_start);
    $(site_end).attr("name", new_site_end);
    $(location_div).attr("name", new_location);
    // $(date_div).attr('name',mydate);
    data.appendTo(".CloneUserLocHere");
    $("#counts_user_location").attr("value", user_location_count);
    $(".select2").select2();
    $(".delLastLocChild").each(function (index) {
      if (index == 0 || index == 1) {} else {
        $(this)
          .children()
          .last()
          .hide();
      }
    });
    // var i=0;
    var removeSib = `
    <div class="col-sm-1 text_center RemoveUserLoc">
      <button class=" btn btn-sm btn-danger" title="Remove" type="button" id="">-</button>
    </div>
    `;
    $(removeSib).appendTo(".CloneUserLocHere");
    // console.log('hre');
  });
  $(document).on("click", ".RemoveUserLoc", function () {
    $(this)
      .prev()
      .remove();
    $(this).remove();
  });

  var user_location_id_count = 1;
  //   $("#counts_user_location_id").val(user_location_id_count);

  $(".defaultkpiplus").click(function () {
    $(".defaultKPIsDiv").show();
    // $(".defaultKPIs").show("slow");
    $(".defaultkpiplus").hide();
    $(".defaultkpiminus").show();
  });
  $(".defaultkpiminus").click(function () {
    $(".defaultKPIsDiv").hide();
    // $(".defaultKPIs").hide("slow");
    $(".defaultkpiplus").show();
    $(".defaultkpiminus").hide();
  });
  $(".Customkpiplus").click(function () {
    $(".CustomKPIsDiv").show();
    // $(".defaultKPIs").show("slow");
    $(".Customkpiplus").hide();
    $(".Customkpiminus").show();
  });
  $(".Customkpiminus").click(function () {
    $(".CustomKPIsDiv").hide();
    // $(".defaultKPIs").hide("slow");
    $(".Customkpiplus").show();
    $(".Customkpiminus").hide();
  });
  var p = 1;
  var child = 1;
  var childl2 = 0;
  var child2 = 0;
  var child3 = 0;
  var child4 = 0;
  var childl3 = 0;
  var childl4 = 0;
  $("#addcustomeKPIs").click(function () {
    var customeKPIs = `
      <div class="col-md-12">
          <div class="DisInlineflex mb_2 col-md-12">
              <label class="col-sm-1 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Level  ` + ++p + ` <span style="color:red">*</span></label>
              <div class="col-sm-7">
                  <input type="text" required name="level1_` + child++ + `" class="form-control" placeholder="Level ` + p + `">
              </div>
              <div class="col-sm-1 text_center">
                  <button class="btn btn-sm btn-info" type="button" id="addcustomeKPIs` + p + `" tabindex="1">+</button>
              </div>
              <div class="col-sm-1 text_center">
                  <button class="delcustomeKPIs btn btn-sm btn-danger" type="button" id="" tabindex="1">-</button>
              </div>
            </div>
            <div class="mb_2 level` + p + `child cloneleveltwohere clearfix">
            </div>
      </div>
      `;
    $(".customeKPIsHere").append(customeKPIs);
    // level 2 custom kpi
    $("#addcustomeKPIs" + p).click(function () {
      var parent = $($(this).parent().siblings()[1]).find('input').attr('name');
      var customeKPIslevel2 = `
        <div class="col-md-12">
            <div class="DisInlineflex mb_2 col-md-12">
                <label class="col-sm-2 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Level ` + ++p + ` child ` + ++childl2 + ` <span style="color:red">*</span></label>
                <div class="col-sm-5 mr-2">
                    <input type="text" name="` + parent.toString() + `_` + child2++ + `" class="form-control" placeholder="Level ` + p + `">
                </div>
                 <div class="col-sm-2">
                 <span style="color:red">*</span>  <input type="number" required="required" name="weightage_` + parent.toString() + `_` + child2++ + `" class="form-control" placeholder="Level ` + p + `  Weightage">
                </div> 
                <div class="col-sm-1 text_center">
                  <button class="btn btn-sm btn-info" type="button" id="addcustomeKPIs` + p + `" tabindex="1">+</button>
              </div>
                <div class="col-sm-1 text_center">
                    <button class="delcustomeKPIs btn btn-sm btn-danger" type="button" id="" tabindex="1">-</button>
                </div>
            </div>
            <div class="mb_2 level` + p + `child clonelevelthreehere clearfix">
            </div>
        </div>
        `;
      $(this).parents().parents().next(".cloneleveltwohere").append(customeKPIslevel2);
      // level 3 custom kpi
      $("#addcustomeKPIs" + p).click(function () {
        var parent2 = $($(this).parent().siblings()[1]).find('input').attr('name');

        var customeKPIslevel3 = `
        <div class="col-md-12">
            <div class="DisInlineflex mb_2 col-md-12">
                <label class="offset-md-1 col-sm-2 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Level ` + ++p + ` child ` + ++childl3 + ` <span style="color:red">*</span></label>
                <div class="col-sm-5 mr-2">
                    <input type="text" name="` + parent2.toString() + `_` + child3++ + `" class="form-control" placeholder="Level ` + p + `">
                </div>
                 <div class="col-sm-2">
                 <span style="color:red">*</span><input type="number" required="required" name="weightage_` + parent2.toString() + `_` + child3++ + `" class="form-control" placeholder="Level ` + p + ` Weightage">
                </div> 
                <div class="col-sm-1 text_center">
                  <button class="btn btn-sm btn-info" type="button" id="addcustomeKPIs` + p + `" tabindex="1">+</button>
                </div>
                <div class="col-sm-1 text_center">
                    <button class="delcustomeKPIs btn btn-sm btn-danger" type="button" id="" tabindex="1">-</button>
                </div>
            </div>
            <div class="mb_2 level` + p + `child clonelevelfourhere clearfix">
            </div>
        </div>
        `;
        $(this).parents().parents().next(".clonelevelthreehere").append(customeKPIslevel3);
        // level 4 custom kpi
        $("#addcustomeKPIs" + p).click(function () {
          var parent3 = $($(this).parent().siblings()[1]).find('input').attr('name');
          var customeKPIslevel4 = `
          <div class="col-md-12">
              <div class="DisInlineflex mb_2 col-md-12">
                  <label class="offset-md-2 col-sm-2 text_center form-txt-primary font-15" style="padding: 0.3rem 0.3rem !important;">Level ` + ++p + ` child ` + ++childl4 + ` <span style="color:red">*</span></label>
                  <div class="col-sm-5 mr-2">
                      <input type="text" name="` + parent3.toString() + `_` + child4++ + `" class="form-control" placeholder="Level ` + p + `">
                  </div>
                   <div class="col-sm-2">
                   <span style="color:red">*</span> <input type="number" required="required" name="weightage_` + parent3.toString() + `_` + child4++ + `" class="form-control" placeholder="Level ` + p + ` Weightage">
                  </div> 
                  <div class="col-sm-1 text_center">
                      <button class="delcustomeKPIs btn btn-sm btn-danger" type="button" id="" tabindex="1">-</button>
                  </div>
              </div>
          </div>
          `;
          $(this).parents().parents().next(".clonelevelfourhere").append(customeKPIslevel4);
        });
      });
    });
  });
  // remove custom kpis
  $(document).on('click', 'button.delcustomeKPIs', function () {
    $(this).parent().parent().parent().remove();
  });
  $("#CloneUserKPI").click(function () {
    let data = $("#CloneThisUserKPI").clone();
    let user_div = data.find("select")[0];
    let location_div = data.find("select")[1];
    let user_location = "user_location_id[]";
    let project_kpi = "m_project_kpi_id[]";
    $(user_div).attr("name", user_location);
    $(location_div).attr("name", project_kpi);
    data.appendTo(".CloneUserKPIHere");
    $("#counts_user_location_id").val(++user_location_id_count);
    $(".select2").select2();
    $(".delLastChild").each(function (index) {
      if (index == 0 || index == 1) {} else {
        $(this)
          .children()
          .last()
          .hide();
      }
    });
    // var i=0;
    var removeSibKPI = `
    <div class="col-sm-1 text_center RemoveUserKPI">
      <button class=" btn btn-sm btn-danger" type="button" id="">-</button>
    </div>
    `;
    $(removeSibKPI).appendTo(".CloneUserKPIHere");
    // $(this).next()remove();
    // console.log('hre');
  });
  $(document).on("click", ".RemoveUserKPI", function () {
    $(this)
      .prev()
      .remove();
    $(this).remove();
  });

  
  $(document).on("click", "#customButton", function () {
    $.each($('.cloneleveltwohere'), function (index, value) {
      // console.log(value);
      var count = 0;
      $.each($(value).children(), function (i, v) {
        let name = $($($(v).find('input'))[0]).attr('name').split('_');
        let new_name = name[0] + '_' + name[1] + '_' + count;
        $($($(v).find('input'))[0]).attr('name', new_name);

        name = $($($(v).find('input'))[1]).attr('name').split('_');
        new_name = name[0] + '_' + name[1] + '_' + name[2] + '_' + count++;
        $($($(v).find('input'))[1]).attr('name', new_name);
      });
    });

    $.each($('.clonelevelthreehere'), function (index, value) {
      // console.log(value);
      var count = 0;
      $.each($(value).children(), function (i, v) {
        let name = $($($(v).find('input'))[0]).attr('name').split('_');
        let new_name = name[0] + '_' + name[1] + '_' + name[2] + '_' + count;
        $($($(v).find('input'))[0]).attr('name', new_name);

        name = $($($(v).find('input'))[1]).attr('name').split('_');
        new_name = name[0] + '_' + name[1] + '_' + name[2] + '_' + name[3] + '_' + count++;
        $($($(v).find('input'))[1]).attr('name', new_name);
      });
    });

    $.each($('.clonelevelfourhere'), function (index, value) {
      // console.log(value);
      var count = 0;
      $.each($(value).children(), function (i, v) {
        let name = $($($(v).find('input'))[0]).attr('name').split('_');
        let new_name = name[0] + '_' + name[1] + '_' + name[2] + '_' + name[3] + '_' + count;
        $($($(v).find('input'))[0]).attr('name', new_name);

        name = $($($(v).find('input'))[1]).attr('name').split('_');
        new_name = name[0] + '_' + name[1] + '_' + name[2] + '_' + name[3] + '_' + name[4] + '_' + count++;
        $($($(v).find('input'))[1]).attr('name', new_name);
      });
    });
    $('#customForm').submit();
  });
});
