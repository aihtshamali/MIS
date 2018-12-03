@extends('layouts.uppernav')
@section('styletag')
<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  <style>
    .text_center{text-align:center !important;font-size: 20px;line-height: 12px;word-spacing: 1px;}
    .clr_yel{color:#f39c12 !important;font-weight: bolder;font-style: italic;}
    th,td{text-align:center;}
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="well " style="text-align:center">
        <h3>Welcome {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}} to your Dashboard </h3>
    </section>
    @role('officer')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Global Score Ranking</h3>
            <div class="box-body">
                <div class="progress" style="height:30px;text-align:center">
                    <div class="progress-bar" style="width:{{ $current_score }}%;height:30px" role="progressbar" aria-valuenow="{{ $current_score }}" aria-valuemin="0" aria-valuemax="{{ $max_score }}">
                            <p style="margin-top:5px">{{ $current_score }}</p>
                        </div>
                </div>
            </div>
            <p class="text_center">Your Rank is <span class="clr_yel">{{ $rank }}</span> out of <span class="clr_yel">{{ count($person) }}</span> Evaluators</p>
            <p class="text_center">Your Relative Score is <span class="clr_yel">{{ $current_score }}</span> out of <span class="clr_yel">{{ $max_score }}</span></p>
        </div>
      </div> 
        @endrole
        @role("manager")
        <div class="col-md-12">
         <div class="box box-primary">
           <div class="box-header"><h4><b>Pending Visit Requests</b></h4><small>Following requests needs approval.</small></div>
           {{-- <div class="box-body"> 
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="dataTables_length" id="example1_length">
                        <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                          <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row"><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 182px;">Rendering engine</th><th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending" style="width: 224px;">Browser</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">CSS grade</th></tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd">
                    <td class="">Gecko</td>
                    <td class="sorting_1">Seamonkey 1.1</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                  </tr><tr role="row" class="even">
                    <td class="">Webkit</td>
                    <td class="sorting_1">Safari 3.0</td>
                    <td>OSX.4+</td>
                    <td>522.1</td>
                    <td>A</td>
                  </tr><tr role="row" class="odd">
                    <td class="">Webkit</td>
                    <td class="sorting_1">Safari 2.0</td>
                    <td>OSX.4+</td>
                    <td>419.3</td>
                    <td>A</td>
                  </tr><tr role="row" class="even">
                    <td class="">Webkit</td>
                    <td class="sorting_1">Safari 1.3</td>
                    <td>OSX.3</td>
                    <td>312.8</td>
                    <td>A</td>
                  </tr><tr role="row" class="odd">
                    <td class="">Webkit</td>
                    <td class="sorting_1">Safari 1.2</td>
                    <td>OSX.3</td>
                    <td>125.5</td>
                    <td>A</td>
                  </tr><tr role="row" class="even">
                    <td class="">Webkit</td>
                    <td class="sorting_1">S60</td>
                    <td>S60</td>
                    <td>413</td>
                    <td>A</td>
                  </tr><tr role="row" class="odd">
                    <td class="">Misc</td>
                    <td class="sorting_1">PSP browser</td>
                    <td>PSP</td>
                    <td>-</td>
                    <td>C</td>
                  </tr><tr role="row" class="even">
                    <td class="">Presto</td>
                    <td class="sorting_1">Opera for Wii</td>
                    <td>Wii</td>
                    <td>-</td>
                    <td>A</td>
                  </tr><tr role="row" class="odd">
                    <td class="">Presto</td>
                    <td class="sorting_1">Opera 9.5</td>
                    <td>Win 88+ / OSX.3+</td>
                    <td>-</td>
                    <td>A</td>
                  </tr><tr role="row" class="even">
                    <td class="">Presto</td>
                    <td class="sorting_1">Opera 9.2</td>
                    <td>Win 88+ / OSX.3+</td>
                    <td>-</td>
                    <td>A</td>
                  </tr></tbody>
                  <tfoot>
                  <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
           </div> --}}
           <div class="box-body">
             <div class="row">
               <div class="col-md-12">
                 <table class="table table-responsive table-bordered">
                   <thead>
                     <th>Sr #.</th>
                     <th>Requestee Name</th>
                     <th># of Purposes</th>
                     <th>Location(s)</th>
                     <th>Date(s)</th>
                     <th></th>
                     <th></th>
                    </thead>
                   <tbody>
                     <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td><a href="#" type="button" class="btn btn-danger btn-sm">Reject Request</a></td>
                       <td><a href="#" type="button" class="btn btn-primary btn-sm">View Full Summary</a></td>
                     </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
        </div>
        @endrole
        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visit Request</a>
          </li>
        </ul>
       <div class="tab-content" id="myTabContent"> --}}
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                new inProgress
                complete
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="true">new</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">approved</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new">
                    new
                  </div>
                  <div class="tab-pane fade show active" id="approved" role="tabpanel" aria-labelledby="approved">
                    approved
                  </div>
                </div>
              </div>
          </div>
  
@endsection

{{-- @section('content')
<div class="row">
    <div class="col-md-6 col-xl-12">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="feather icon-home bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600 pointer"> <span style="color:black">Welcome</span>
                        @auth
                          {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        @endauth <span style="color:black;">to Evaluation dashboard .</span>
                    </span>
                    <div class="progress clearfix mt2 clrornge">
                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                    </div>
                    <div class="col-md-12 mt2">
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home1" role="tab" aria-expanded="false">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile1" role="tab" aria-expanded="false">inProgress</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages1" role="tab" aria-expanded="false">complete</a>
                            </li>
                        </ul>
                        <div class="tab-content tabs card-block">
                            <div class="tab-pane active" id="home1" role="tabpanel" aria-expanded="false">
                                <div class="m-0 row">
                                  <div class="col-md-1">1</div>
                                  <div class="col-md-8">there</div>
                                  <div class="col-md-3">
                                    <div class="progress clearfix mt2">
                                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel" aria-expanded="false">
                              <div class="m-0 row">
                                <div class="col-md-1">1</div>
                                <div class="col-md-8">there</div>
                                <div class="col-md-3">
                                  <div class="progress clearfix mt2">
                                      <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">75%</span></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel" aria-expanded="false">
                              <div class="m-0 row">
                                <div class="col-md-1">1</div>
                                <div class="col-md-8">there</div>
                                <div class="col-md-3">
                                  <div class="progress clearfix mt2">
                                      <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">100%</span></div>
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
@endsection --}}
@section('scripttags')
{{-- 
<script src="{{asset('js/AdminLTE/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/AdminLTE/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(function () {
   
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script> --}}
@endsection