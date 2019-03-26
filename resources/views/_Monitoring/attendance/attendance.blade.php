@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  DGME | Attendance
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
                    <th>#.</th>
                    <th>Employee</th>
                    <th colspan="7">week 1</th>
                    <th colspan="7">week 2</th>
                    <th colspan="7">week 3</th>
                    <th colspan="7">week 4</th>
                    <th colspan="7">week 5</th>
                </tr>
                <tr class"">
                        <th>id</th>
                        <th>Name</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                        <th>31</th>
                    </tr>
            </thead>
            <tbody id="example">
                <tr>
                    <td>1234</td>
                    <td>aihtsham</td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>anas</td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>atiQ</td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>hassan</td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
                    <td><span class="in">9:00</span><br/><span class="out">5:00</span></td>
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
  var intxt = $('.in').text();
  var in = $('.in');
  var intxtsplit = intxt.replace("%", "");
  if (intxtsplit <= 25) {
    in.attr("class", "pdz_six redtXt");
  }
  else if (intxtsplit <= 50) {
    in.attr("class", "orangetXt pdz_six");
  }
  // else if (temp<= 75 && temp>= 50) {
  //   status.addClass('blue');
  // }
  else if (intxtsplit <= 75) {
    in.attr("class", "pdz_six yeltXt");
  }
  else if (intxtsplit <=100) {
    in.attr("class", "pdz_six greentXt");
  }
});
</script>
@endsection