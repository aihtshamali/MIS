@extends('_Monitoring.layouts.upperNavigation')
@section('styleTags')
<style>
.pointer{cursor: pointer;}
.mt2{margin-top: 2%;}
.clrornge{color: #fe986c;}
p{text-align: left !important;}
.tab-pane{text-align: left !important;}
.persontagetiQ{color: #fff;font-weight: 900;}
li{text-transform: capitalize;}
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
                        @endauth <span style="color:black;">to Monitoring dashboard .</span>
                    </span>
                    <div class="progress clearfix mt2 clrornge">
                        <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ">25%</span></div>
                    </div>
                    <div class="col-md-12 mt2">
                        {{-- <div class="sub-title">Default</div> --}}
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home1" role="tab" aria-expanded="false">inprogress</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile1" role="tab" aria-expanded="false">quarterly complete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages1" role="tab" aria-expanded="false">complete</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
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
@endsection
