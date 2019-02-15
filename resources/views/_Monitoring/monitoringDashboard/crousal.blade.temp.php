<div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel">
  <div id="text-carousel" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="row">
          <div class="col-xs-12">
              <div class="carousel-inner">
                @php
                    $i=0;
                @endphp
                @foreach ($projects as $project)
              <div class="item {{$i==0 ? 'active' : ''}}">
                      <!-- <div class="col-md-12 row">
                        <div class="col-md-12">
                          <h3 class="topheading">{{$project->title}}</h3>
                        </div>
                      </div> -->
                      <!-- <div class="col-md-12 border-bottom border-top">
                        <div class="col-md-2">
                          <b class="hedingTxt">GS No<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                        <b class="hedingInt">{{$project->financial_year}}/{{$project->ADP}}</b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Status Alert<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <a href="{{ route('Summary') }}">
                            <b class="statusTxt status" id="">{{(round(calculateMFinancialProgress($project->AssignedProject->MProjectProgress->last()->id),2) + round(calculateMPhysicalProgress($project->AssignedProject->MProjectProgress->last()->id),2)) / 2}} %</b>
                          </a>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Financial Progress<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">{{round(calculateMFinancialProgress($project->AssignedProject->MProjectProgress->last()->id),2)}}%</b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingTxt">Physical Progress<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                          <b class="hedingInt">{{round(calculateMPhysicalProgress($project->AssignedProject->MProjectProgress->last()->id),2)}}%</b>
                        </div>
                      </div> -->
                      <!-- <div class="col-md-12 border-bottom">

                        <div class="col-md-2">
                          <b class="hedingTxt">Project Cost<span class="pull-right hidden-xs hidden-sm">:</span></b>
                        </div>
                        <div class="col-md-2">
                        <b class="hedingInt">{{round($project->ProjectDetail->orignal_cost,2)}} million {{$project->ProjectDetail->currency}}</b>
                        </div>
                      </div> -->
                        <div class="col-md-8 col-md-offset-2 carousel-content pdt3p">
                            <div>
                              @if ($project->AssignedProject->MProjectProgress->last()->MAppAttachment->where('type','image/jpeg')->last())
                                @php
                                   $attachment= $project->AssignedProject->MProjectProgress->last()->MAppAttachment->where('type','image/jpeg')->last()
                                @endphp
                                <img src="{{'http://172.16.10.11/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}" alt="Chicago" style="width:100%;">
                              @else
                                <img src="{{'http://172.16.10.11/storage/monitoringDashboard/img/a (1).jpg'}}" alt="" style="width:100%;">
                              @endif
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                  </div>

          </div>
      </div>
  </div>
  <div class="arrowstiQ">
    <a class="left carousel-control" href="#text-carousel" data-slide="prev" style="left: 14% !important;">
      <span class="glyphicon glyphicon-chevron-left fas fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#text-carousel" data-slide="next" style="right: 14% !important;">
      <span class="glyphicon glyphicon-chevron-right fas fa-angle-right"></span>
    </a>
  </div>
</div>
