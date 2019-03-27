@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | Daily Attendance
@endsection
@section('styleTags')
<style>
.navbar-logo,.pcoded-navbar{display:none !important;}
.pcoded[theme-layout="vertical"][vertical-placement="left"][vertical-nav-type="expanded"][vertical-effect="shrink"] .pcoded-content{margin-left:0px !important;}
td, th{text-align:center;}
button, input, optgroup, select, textarea{border-radius:6px !important}
table{margin-top:3% !important;}
th{padding: 8px 0px;}
tr{border-bottom:1px solid #ccc;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
tbody tr:nth-child(even){color:#555;background-color:#eeecec;}
tbody tr:hover{color:#777;background-color:#fff;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
thead:nth-child(1){background: #404e67 !important;color: #fff !important;}
th{border:1px solid #fff;}
td{border: 1px solid #cccccc47;font-weight: 600;}
td{border: 1px solid #cccccc47;font-weight: 600;}
</style>
@endsection
@section('content')
<div class="">
    <div class="row">
        <select name="" class="form-control col-md-2" id="">
            <option selected hidden>Search By Months</option>
            <option>month 1</option>
            <option>month 2</option>
            <option>month 3</option>
            <option>month 4</option>
        </select>
        <input class="form-control offset-md-6 col-md-4" id="search" type="text" placeholder="Search Here...">    
    </div>
    <div class="row">
        <table class="" style="width:100%">
            <thead>
                <tr class"">
                    <th>Sr #.</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>In</th>
                    <th>Incoming Status</th>
                    <th>Out</th>
                    <th>Outgoing Status</th>
                </tr>
            </thead>
            <tbody id="example">
                <tr>
                    <td>1234</td>
                    <td>hassan</td>
                    <td>IT Consultant</td>
                    <td><span class="in">9:00</span></td>
                    <td><span class="incomingstatus">on time</span></td>
                    <td><span class="out">5:00</span></td>
                    <td><span class="outgoingstatus">on time</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>anas</td>
                    <td>IT Consultant</td>
                    <td><span class="in">9:00</span></td>
                    <td><span class="incomingstatus">on time</span></td>
                    <td><span class="out">5:00</span></td>
                    <td><span class="outgoingstatus">on time</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>farhan fee chor</td>
                    <td>IT Consultant</td>
                    <td><span class="in">9:00</span></td>
                    <td><span class="incomingstatus">on time</span></td>
                    <td><span class="out">5:00</span></td>
                    <td><span class="outgoingstatus">on time</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>Tahir bhai</td>
                    <td>IT Consultant</td>
                    <td><span class="in">9:00</span></td>
                    <td><span class="incomingstatus">on time</span></td>
                    <td><span class="out">5:00</span></td>
                    <td><span class="outgoingstatus">on time</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section("js_scripts")
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#example tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection