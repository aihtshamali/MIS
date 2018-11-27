@extends('layouts.uppernav')
@section('styletag')
  <style>
    .text_center{text-align:center !important;font-size: 20px;line-height: 12px;word-spacing: 1px;}
    .clr_yel{color:#f39c12 !important;font-weight: bolder;font-style: italic;}
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
        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visit Request</a>
          </li>
        </ul> --}}
        {{-- <div class="tab-content" id="myTabContent">
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
          </div> --}}
        </div>
    </div>
    @endrole
<<<<<<< HEAD

</div>
=======
>>>>>>> c066efcd219f866a922a085b944b92e78bab36ed

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
