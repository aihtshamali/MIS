@extends('_Monitoring.layouts.upperNavigation')
@section('title')
  Monitoring Dashboard | DGME
@endsection
@section('styleTags')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/responsive.bootstrap4.min.css')}}">
<style>
.pointer{cursor: pointer;}
.mt2{margin-top: 2%;}
.clrornge{color: #fe986c;}
p{text-align: left !important;}
.tab-pane{text-align: left !important;}
.persontagetiQ{color: #fff;font-weight: 900;}
li{text-transform: capitalize;}
.headings{text-transform: capitalize;}
.nav-tabs .nav-item.show .nav-link, .nav-tabs {font-weight: 900;}
.nav-link {display: block;padding: .5rem 6rem !important;}
.nodisplay{display: none;}
/* .scrollbar{background: #F5F5F5;overflow-x: scroll;} */
/* .force-overflow{min-height: 450px;} */
/* #wrapper{text-align: center;margin: auto;}
#style-3::-webkit-scrollbar-track{-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
#style-3::-webkit-scrollbar{width: 6px;background-color: #F5F5F5;}
#style-3::-webkit-scrollbar-thumb{background-color: #000000;} */
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-12">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="feather icon-home bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600 pointer"> <span style="color:black">Welcome</span>
                        @auth
                          {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        @endauth <span style="color:black;">to Monitoring dashboard.</span>
                    </span>
                    <div class="progress clearfix mt2 clrornge">
                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                    </div>
                    <div class="col-md-12 mt2">
                        {{-- <div class="sub-title">Default</div> --}}
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item inProgress">
                                <a class="nav-link active" data-toggle="tab" href="#!" role="tab" aria-expanded="false">inprogress</a>
                            </li>
                            <li class="nav-item quarterlyComp">
                                <a class="nav-link" data-toggle="tab" href="#!" role="tab" aria-expanded="false">quarterly complete</a>
                            </li>
                            <li class="nav-item finished">
                                <a class="nav-link" data-toggle="tab" href="#!" role="tab" aria-expanded="false">finished</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs card-block ">
                            <div class="tab-pane inProgressDiv active" id="home1" role="tabpanel" aria-expanded="false">
                                <div class="card">
                                  <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                      <table id="simpletable1"
                                             class="table table-striped table-bordered nowrap">
                                          <thead>
                                          <tr>
                                              <th>S#1</th>
                                              <th>id#</th>
                                              <th>GS#</th>
                                              <th>project name</th>
                                              <th>cost</th>
                                              <th>district</th>
                                              <th>duration</th>
                                              <th>progress</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1.</td>
                                                  <td>12</td>
                                                  <td>3</td>
                                                  <td>61</td>
                                                  <td>2011/04/25</td>
                                                  <td>$320,800</td>
                                                  <td>2011/04/25</td>
                                                  <td>
                                                    <div class="progress clearfix mt2 clrornge">
                                                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                                                    </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>15</td>
                                                  <td>4</td>
                                                  <td>63</td>
                                                  <td>2011/07/25</td>
                                                  <td>$170,750</td>
                                                  <td>2011/07/25</td>
                                                  <td>
                                                    <div class="progress clearfix mt2 clrornge">
                                                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                                                    </div>
                                                  </td>
                                              </tr>
                                      </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane quarterlyCompDiv" id="profile1" role="tabpanel" aria-expanded="false">
                              <div class="card">
                                <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                    <table id="simpletable2"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                      <tr>
                                        <th>S#2</th>
                                        <th>id#</th>
                                        <th>GS#</th>
                                        <th>project name</th>
                                        <th>cost</th>
                                        <th>district</th>
                                        <th>duration</th>
                                        <th>next tentative monitoring</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                        <td>____________</td>
                                      </tr>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                        <td>___________</td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="tab-pane finishedDiv" id="messages1" role="tabpanel" aria-expanded="false">
                              <div class="card">
                                <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                    <table id="simpletable3"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                      <tr>
                                        <th>S#3</th>
                                        <th>id#</th>
                                        <th>GS#</th>
                                        <th>project name</th>
                                        <th>cost</th>
                                        <th>district</th>
                                        <th>duration</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                      </tr>
                                      <tr>
                                        <td>4545</td>
                                        <td>6444</td>
                                        <td>3452</td>
                                        <td>testing</td>
                                        <td>PKR</td>
                                        <td>Lahore</td>
                                        <td>___-___</td>
                                      </tr>

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
        </div>
</div>
@endsection
@section('js_scripts')
  <!-- data-table js -->
<script src="{{asset('_monitoring/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/vfs_fonts.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/pdfmake.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net/js/vfs_fonts.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('_monitoring/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_monitoring/js/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('_monitoring/css/pages/data-table/js/data-table-custom.js')}}"></script>
<script type="text/javascript">
    $('#simpletable1').DataTable();
    $('#simpletable2').DataTable();
    $('#simpletable3').DataTable();
    $(document).ready(function(){
    $(".inProgress").click(function(){
        $(".inProgressDiv").show();
        $(".quarterlyCompDiv").hide();
        $(".finishedDiv").hide();
    });
    $(".quarterlyComp").click(function(){
        $(".quarterlyCompDiv").show();
        $(".inProgressDiv").hide();
        $(".finishedDiv").hide();
    });
    $(".finished").click(function(){
        $(".finishedDiv").show();
        $(".inProgressDiv").hide();
        $(".quarterlyCompDiv").hide();
    });
    });
//     $(document).ready(function () {
//           if (!$.browser.webkit) {
//               $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
//           }
//       });
// </script>
@endsection
