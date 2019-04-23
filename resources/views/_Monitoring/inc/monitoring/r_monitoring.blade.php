<style media="screen">
  .btn:focus,
  .btn:active,
  button:focus,
  button:active {
    outline: none !important;
    box-shadow: none !important;
  }

  .pointer {
    cursor: pointer;
  }

  #image-gallery .modal-footer {
    display: block;
  }

  .modal-lg {
    max-width: 660px !important;
  }

  .img-thumbnail {
    object-fit: cover !important;
    height: 100% !important;
    width: 100% !important;
  }

  .thumb {
    margin-top: 15px;
    margin-bottom: 15px;
    height: 135px;
    /* margin: 1%; */
  }

  /* #image-gallery-image{
    cursor:zoom-out;
    cursor:-webkit-zoom-out;
    cursor:-moz-zoom-out;
    width:100%;
} */
  .fullWidth {
    width: 100% !important;
  }

  .halfWidth {
    width: 50% !important;
  }

  html {
    overflow-x: hidden;
  }

  /* video */
  video {
    width: 100% !important;
    padding: 2%;
    border: 1px solid #77777747;
    border-radius: 3px;
  }

  /* start tree view */
  ul,
  #myUL {
    list-style-type: none;
  }

  #myUL {
    margin: 0;
    padding: 0;
  }

  .caret {
    cursor: pointer;
    -webkit-user-select: none;
    /* Safari 3.1+ */
    -moz-user-select: none;
    /* Firefox 2+ */
    -ms-user-select: none;
    /* IE 10+ */
    user-select: none;
  }

  .caret::before {
    content: "\25B6";
    color: black;
    display: inline-block;
    margin-right: 6px;
  }

  .caret-down::before {
    -ms-transform: rotate(90deg);
    /* IE 9 */
    -webkit-transform: rotate(90deg);
    /* Safari */
    '
transform: rotate(90deg);
  }

  .nested {
    /* display: block; */
    padding-left: 2% !important;
  }

  .active {
    display: block;
  }

  .caret {
    color: #01a9ac !important;
  }

  .caret::before {
    color: #01a9ac !important;
  }

  /* end tree view */
  .demo-gallery>ul {
    margin-bottom: 0;
  }

  .demo-gallery>ul>li {
    float: left;
    margin-bottom: 15px;
    /* margin-right: 20px;
      width: 200px; */
  }

  .demo-gallery>ul>li a {
    border: 3px solid #FFF;
    border-radius: 3px;
    display: block;
    overflow: hidden;
    position: relative;
    float: left;
  }

  .demo-gallery>ul>li a>img {
    -webkit-transition: -webkit-transform 0.15s ease 0s;
    -moz-transition: -moz-transform 0.15s ease 0s;
    -o-transition: -o-transform 0.15s ease 0s;
    transition: transform 0.15s ease 0s;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    height: 200px;
    object-fit: cover;
    width: 100%;
  }

  /* .demo-gallery > ul > li a:hover > img {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  } */
  .demo-gallery>ul>li a:hover .demo-gallery-poster>img {
    opacity: 1;
  }

  .demo-gallery>ul>li a .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.1);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background-color 0.15s ease 0s;
    -o-transition: background-color 0.15s ease 0s;
    transition: background-color 0.15s ease 0s;
  }

  .demo-gallery>ul>li a .demo-gallery-poster>img {
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    opacity: 0;
    position: absolute;
    top: 50%;
    -webkit-transition: opacity 0.3s ease 0s;
    -o-transition: opacity 0.3s ease 0s;
    transition: opacity 0.3s ease 0s;
  }

  .demo-gallery>ul>li a:hover .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.5);
  }

  .demo-gallery .justified-gallery>a>img {
    -webkit-transition: -webkit-transform 0.15s ease 0s;
    -moz-transition: -moz-transform 0.15s ease 0s;
    -o-transition: -o-transform 0.15s ease 0s;
    transition: transform 0.15s ease 0s;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    height: 100%;
    width: 100%;
  }

  .demo-gallery .justified-gallery>a:hover>img {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  .demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
    opacity: 1;
  }

  .demo-gallery .justified-gallery>a .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.1);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background-color 0.15s ease 0s;
    -o-transition: background-color 0.15s ease 0s;
    transition: background-color 0.15s ease 0s;
  }

  .demo-gallery .justified-gallery>a .demo-gallery-poster>img {
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    opacity: 0;
    position: absolute;
    top: 50%;
    -webkit-transition: opacity 0.3s ease 0s;
    -o-transition: opacity 0.3s ease 0s;
    transition: opacity 0.3s ease 0s;
  }

  .demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.5);
  }

  .demo-gallery .video .demo-gallery-poster img {
    height: 48px;
    margin-left: -24px;
    margin-top: -24px;
    opacity: 0.8;
    width: 48px;
  }

  .demo-gallery.dark>ul>li a {
    border: 3px solid #04070a;
  }

  .home .demo-gallery {
    padding-bottom: 80px;
  }
</style>
<div class="tab-pane" id="r_monitoring" role="tabpanel" style="display:none;">
  <div class="col-md-12">
    <ul class="nav nav-tabs col-md-12 tabs resultNavBar" role="tablist">
      <li class="nav-item">
        <a class="nav-link galnav" data-toggle="tab" href="#home1" role="tab">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">WBS</a>
      </li>
    </ul>
    <div class="container r_monitoringDivv">
      <div class="tab-content tabs card-block">
        <div class="tab-pane active" id="home1" role="tabpanel">
          <div class="pdlfrt2">
            <!-- ----------------- start photo gallery -------------------- -->
            <h2 class="txtdecundlin pointer photogallary" title="click to Expand photo gallary">Photo Gallery</h2>
            <div class="photogallaryDiv nodisplay col-md-12" style="padding-bottom:2%">
              <!-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                        data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        data-target="#image-gallery">
                         <img class="img-thumbnail"
                              src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                              alt="">
                     </a>
                 </div> -->
              <div class="demo-gallery">
                <ul id="lightgallery" class="list-unstyled row">
                  <?php $i = 1; ?>
                  @foreach ($result_from_app->where('type','image/jpeg') as $attachment)
                  <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="" data-src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-sub-html="<h4>Date</h4><p>{{date('d M Y',strtotime($attachment->created_at))}} </p>">
                    <a href="">
                      <b class="float-left">#: {{$i++}}</b>
                      <img class="img-responsive" src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                      <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- old gallery
           @foreach ($result_from_app->where('type','image/jpeg') as $attachment)
           <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="text-align: -webkit-center !important;">
             <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                data-image="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">
                <b class="float-left">#: {{$i++}}</b>
                 <img class="img-thumbnail" src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">
                 <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
             </a>
         </div>
           @endforeach -->

            </div>


            <!-- <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-x: hidden !important;">
                 <div class="modal-dialog modal-lg" style="width:30% !important">
                     <div class="modal-content">
                         <div class="modal-header">
                             < <h4 class="modal-title" id="image-gallery-title"></h4>
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                             </button> ->
                             <div class="col-md-12">
                               <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                               </button>

                             </button>
                               <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                             </div>
                         </div>
                         <div class="modal-body">
                           <center>
                             <img id="image-gallery-image" class="img-responsive col-md-12 imggaltiQ" src="">
                           </center>
                         </div>
                         <div class="modal-footer">

                         </div>
                     </div>
                 </div>
             </div> -->
            <!-- ----------------------- end photo gallery ------------------ -->
            <h2 class="txtdecundlin vidgallary pointer" title="click to Expand video gallary">Video Gallery</h2>
            <!-- ----------------------- start video Gallery ---------------- -->
            <div class="row vidgallaryDiv nodisplay col-md-12">
              @foreach($result_from_app->where('type','video/mp4') as $video)
              <div class="col-lg-3 col-md-3 col-xs-6 thumb pdlfrt2">
                <b class="float-left">#: {{$i++}}</b>
                <video controls>
                  <source src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$video->m_project_progress_id.'/'.$video->project_attachement}}" type="video/mp4">
                  <source src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$video->m_project_progress_id.'/'.$video->project_attachement}}" type="video/ogg">
                  Your browser does not support the video tag.
                </video>
                <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
              </div>
              @endforeach
            </div>
          </div>
          <!-- ----------------------- end video Gallery ---------------- -->
        </div>
        <div class="tab-pane" id="profile1" role="tabpanel">
          <!-- ---------------- start tree vie ------------------ -->
          <div class="pdlfrt2">
            <h2 class="txtdecundlin pointer">WBS</h2>
            @forelse ($progresses->MAssignedUserLocation as $sites)
            <ul id="myUL">
              <li><span class="caret caret-right">{{$sites->District->name}} / {{$sites->site_name}}</span>
                @foreach ($sites->MAssignedUserKpi as $assigned_kpi)
                <ul class="nested nodisplay">
                  <li>{{$assigned_kpi->MProjectKpi->name}}</li>
                  @foreach ($assigned_kpi->MAssignedKpi as $kpi)
                  @foreach ($kpi->MAssignedKpiLevel1 as $kpilev1)
                  <li><span class="caret caret-right">{{$kpilev1->MProjectLevel1Kpi->name}} - Weightage Given ({{$kpilev1->current_weightage}})</span>
                    <ul class="nested nodisplay">
                      @foreach ($kpilev1->MAssignedKpiLevel2 as $kpilev2)
                      <li><span class="caret caret-right">{{$kpilev2->MProjectLevel2Kpi->name}} - Weightage Given ({{$kpilev2->current_weightage}})</span>
                        @foreach ($kpilev2->MAssignedKpiLevel3 as $kpilev3)
                      <li><span class="caret caret-right">{{$kpilev3->MProjectLevel3Kpi->name}} - Weightage Given ({{$kpilev3->current_weightage}})</span>

                        <ul class="nested nodisplay">
                          @foreach ($kpilev3->MAssignedKpiLevel4 as $kpilev4)
                          <li>{{$kpilev3->MProjectLevel4Kpi->name}} - Weightage Given ({{$kpilev4->current_weightage}})</li>
                          @endforeach
                        </ul>
                      </li>
                      @endforeach
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
              @endforeach
            </ul>
            </li>
            @endforeach
            </ul>
            @empty
            <p>No KPI Selected</p>
            @endforelse
          </div>
          <!-- ---------------- end tree vie ------------------ -->
        </div>
      </div>
    </div>
  </div>
</div>