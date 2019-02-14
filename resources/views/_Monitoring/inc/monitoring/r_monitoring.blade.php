<style media="screen">
.btn:focus, .btn:active, button:focus, button:active {
outline: none !important;
box-shadow: none !important;
}
.pointer{cursor: pointer;}
#image-gallery .modal-footer{
display: block;
}
.modal-lg{max-width: 660px !important;}
.img-thumbnail{object-fit: cover !important;height: 100% !important;width: 100% !important;}
.thumb{
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
.fullWidth{width: 100% !important;}
.halfWidth{width: 50% !important;}
html{overflow-x: hidden;}
/* video */
video{width: 100% !important;padding: 2%;border: 1px solid #77777747;border-radius: 3px;}
/* start tree view */
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);
}

.nested {
  /* display: block; */
  padding-left: 2% !important;
}

.active {
  display: block;
}
.caret{color: #01a9ac !important;}
.caret::before{color: #01a9ac !important;}
/* end tree view */
</style>
<div class="tab-pane" id="r_monitoring" role="tabpanel" style="display:none;">
  <div class="border col-md-12 row">
    <div class="container">
	     <div class="pdlfrt2">
    <!-- ---------------- start tree vie ------------------ -->
        {{-- <h2 class="txtdecundlin pointer">Tree View</h2>
        <ul id="myUL">
          <li><span class="caret caret-down">Beverages</span>
            <ul class="nested active">
              <li>Water</li>
              <li>Coffee</li>
              <li><span class="caret caret-down">Tea</span>
                <ul class="nested active">
                  <li>Black Tea</li>
                  <li>White Tea</li>
                  <li><span class="caret caret-down">Green Tea</span>
                    <ul class="nested active">
                      <li>Sencha</li>
                      <li>Gyokuro</li>
                      <li>Matcha</li>
                      <li>Pi Lo Chun</li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul> --}}
    <!-- ---------------- end tree vie ------------------ -->
    <!-- ----------------- start photo gallery -------------------- -->
    <h2 class="txtdecundlin pointer photogallary" title="click to Expand photo gallary">Photo Gallery</h2>
		<div class="row photogallaryDiv nodisplay col-md-12" style="padding-bottom:5%">
            <!-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="">
                </a>
            </div> -->
            <?php $i=1; ?>
      @foreach ($result_from_app->where('type','image/jpeg') as $attachment)
      <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="text-align: -webkit-center !important;">
        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
           data-image="{{'http://172.16.10.11/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-target="#image-gallery">
           <b class="float-left">#: {{$i++}}</b>
            <img class="img-thumbnail" src="{{'http://172.16.10.11/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Another alt text">
            <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
        </a>
    </div>
      @endforeach

        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-x: hidden !important;">
            <div class="modal-dialog modal-lg" style="width:30% !important">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button> -->
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
        </div>
        <!-- ----------------------- end photo gallery ------------------ -->
        <h2 class="txtdecundlin vidgallary pointer" title="click to Expand video gallary">Video Gallery</h2>
        <!-- ----------------------- start video Gallery ---------------- -->
        <div class="row vidgallaryDiv nodisplay col-md-12">
          @foreach($result_from_app->where('type','video/mp4') as $video)
          <div class="col-lg-3 col-md-3 col-xs-6 thumb pdlfrt2">
            <b class="float-left">#: {{$i++}}</b>
          <video controls autoplay>
            <source src="{{'http://172.16.10.11/storage/uploads/monitoring/'.$video->m_project_progress_id.'/'.$video->project_attachement}}" type="video/mp4">
            <source src="{{'http://172.16.10.11/storage/uploads/monitoring/'.$video->m_project_progress_id.'/'.$video->project_attachement}}" type="video/ogg">
            Your browser does not support the video tag.
          </video>
          <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y',strtotime($attachment->created_at))}} </b>
        </div>
        @endforeach
        </div>
        </div>
        <!-- ----------------------- end video Gallery ---------------- -->
	</div>
</div>
  </div>
</div>
