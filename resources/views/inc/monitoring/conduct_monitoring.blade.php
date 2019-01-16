<div class="tab-pane" id="c_monitoring" role="tabpanel" style="display:none;">
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-6">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs" role="tablist">
                {{-- <li class="nav-item">
                    <a class="nav-link  financial" data-toggle="tab" href="#financial"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Financial</b></a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link quality_assesment" data-toggle="tab" href="#quality_assesment"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Quality
                            Assesment</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link stakeholder" data-toggle="tab" href="#stakeholder"
                        role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Stakeholders</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link issues" data-toggle="tab" href="#issues" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Issues</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link risks" data-toggle="tab" href="#risks" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Risks</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link HSE" data-toggle="tab" href="#HSE" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Health
                            Safety Enviornment</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link procurement" data-toggle="tab" href="#procurement"
                        role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Procurement</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gllery" data-toggle="tab" href="#Gallery"
                        role="tab" aria-expanded="false">
                        <b style="font-size:14px; font-weight:bold;">Photos&Videos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link Documents" data-toggle="tab" href="#Documents"
                        role="tab" aria-expanded="false">
                        <b style="font-size:14px; font-weight:bold;">Documents</b></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabs card-block">
                <div class="tab-pane" id="quality_assesment" role="tabpanel"
                    aria-expanded="false">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Quality Assesment</h4>
                        </div>
                        <div class="card-block">
                          {{-- <div class="row">
                              <div class="col-md-10 offset-md-1 components" id="components" style="background: lavender;">
                                  <div class="form-group">
                                      <label for=""> <b>Component Title :</b></label>
                                      <select class=" form-control form-control-primary ">
                                            <option value="" selected disabled>Select Component</option>
                                            <option value="1" >Component 1</option>
                                            <option value="2">Component 2</option>
                                            <option value="3" >Component 3</option>
                                        </select>
                                  </div>

                                </div>
                              </div> --}}
                              <div class="row oneComponentQA">
                                  <div class="col-md-6 offset-md-1">
                                        To assess quality of components, press here. <button class="btn btn-sm btn-primary" id="add_more_component" name="add_more_component[]" type="button"><span><i class="fa fa-plus"></i></span></button>
                                  </div>
                              </div>

                            </div>
                        </div>
                            {{--  --}}
                        <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>General Feed Back</h4>
                        </div>
                        <div class="card-block">
                            <div class=" form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-1">
                                    <b><label for="">1 </label></b>
                                </div>

                                <div class="col-md-5">
                                    <b><label for="">Test Performed ?</label></b>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-success btn-sm btn-outline-success">
                                        YES</button>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger btn-sm btn-outline-danger">
                                        NO</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-1">
                                    <b><label for="">2 </label></b>
                                </div>

                                <div class="col-md-5">
                                    <b><label for="">Adequate Test Results</label></b>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-success btn-sm btn-outline-success">
                                        YES</button>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger btn-sm btn-outline-danger">
                                        NO</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-1">
                                    <b><label for="">3 </label></b>
                                </div>

                                <div class="col-md-5">
                                    <b><label for="">Onsite Labs Established</label></b>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-success btn-sm btn-outline-success">
                                        YES</button>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger btn-sm btn-outline-danger">
                                        NO</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-1">
                                    <b><label for="">4 </label></b>
                                </div>

                                <div class="col-md-5">
                                    <b><label for="">Overall Quality Good?</label></b>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-success btn-sm btn-outline-success">
                                        YES</button>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger btn-sm btn-outline-danger">
                                        NO</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h6><b>Comments</b></h6>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p class="block form-control">
                                        <!-- Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Dicta, eligendi! -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="stakeholder" role="tabpanel"
                    aria-expanded="true">
                    {{-- <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla
                        posuere elit quis auctor interdum praesent sit amet nulla vel
                        enim amet. Donec convallis tellus neque, et imperdiet felis
                        amet.</p> --}}
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Stakeholders</h4>
                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sunt similique totam harum sit. Quibusdam libero, harum rem
                            quam repellendus adipisci. Repellat sapiente asperiores
                            numquam beatae at distinctio quaerat reiciendis
                            repudiandae. -->
                        </div>
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table  table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr #</th>
                                                <th>Stakeholder Type</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Email </th>
                                                <th>Contact #</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="stakeholders">
                                            <tr>
                                                <td>
                                                    <label for="">1</label>
                                                </td>
                                                <td>
                                                    <div class="col-md-12">
                                                        <select id="districts" name="stakeholder" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                                            <option value="" hidden='hidden'>Select</option>
                                                            <option value="">some option</option>
                                                            <option value="">to choose</option>
                                                            <option value="">from</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="stakeholder_name"
                                                        class="form-control" /></td>
                                                        <td><input type="text" name="stakeholder_designation"
                                                            class="form-control" /> </td>
                                                <td><input type="text" name="stakeholder_number"
                                                        class="form-control" /></td>
                                                <td><input type="text" name="stakeholder_email"
                                                        class="form-control" /></td>
                                                <td><button type="button" name="add[]"
                                                        class=" form-control btn btn-success "
                                                        id="addmore" style="size:14px;">+</button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane active" id="issues" role="tabpanel" aria-expanded="true">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Issues and Observations</h4>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sunt similique totam harum sit. Quibusdam libero, harum rem
                            quam repellendus adipisci. Repellat sapiente asperiores
                            numquam beatae at distinctio quaerat reiciendis
                            repudiandae.
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Issues</th>
                                            <th>Issue Type</th>
                                            <th>Severity</th>
                                            <th>Department</th>
                                        </tr>
                                    </thead>
                                    <tbody id='add-issue-here'>
                                        <tr>
                                            <td><input type="text" name="issue" style="width:100%;padding:2%;" /></td>
                                            <td>
                                                <select id="issues2" name="issuetype" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                                    <option value="" hidden='hidden'>Select</option>
                                                    <option value="Time">Time</option>
                                                    <option value="Cost">Cost</option>
                                                    <option value="Quality">Quality</option>
                                                    <option value="Scope">Scope</option>
                                                    <option value="Benifits">Benifits</option>
                                                    <option value="Risks">Risks</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control form-control-primary">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1">Very High</option>
                                                    <option value="2">High</option>
                                                    <option value="3">Medium</option>
                                                    <option value="4">Low</option>
                                                    <option value="5">Very Low</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control form-control-primary">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1">Very High</option>
                                                    <option value="2">High</option>
                                                    <option value="3">Medium</option>
                                                    <option value="4">Low</option>
                                                    <option value="5">Very Low</option>
                                                </select>
                                            </td>
                                            <td style="width:5%;">
                                                <button class="btn btn-sm btn-success" type="button" id="add-more-issues">+</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="risks" role="tabpanel" aria-expanded="true">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Risks</h4>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sunt similique totam harum sit. Quibusdam libero, harum rem
                            quam repellendus adipisci. Repellat sapiente asperiores
                            numquam beatae at distinctio quaerat reiciendis
                            repudiandae.
                            <div class="progress clearfix mt2 clrornge" style="margin: 3% 0% 0%;">
                              <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="persontagetiQ" style="color:#fff !important;padding:0px !important;margin:0px !important;">25%</span></div>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="dt-responsive table-responsive">
                                    <style scoped media="screen">
                                        .bg_sky{background:#8abdd6e6;}
                                            .bg_yel{background:#ffc110;}
                                            .bg_br{background:#7d641da6;}
                                            .bg_bl{background:#2f779ae6;}
                                            .bg_gr{background:#349634;}
                                            .text_center{text-align:center;}
                                            th{border:1px solid #00000014;padding: 1% 0%;text-align:center;text-transform:capitalize;}
                                            td{border:1px solid #00000014;}
                                            .nobortop{border-top:none !important;}
                                            .noborbottom{border-bottom:none !important;}
                                            .white{color:#fff !important;}
                                            .black{color:#000 !important;}
                                            .red{color:red !important;}
                                            select.form-control:not([size]):not([multiple]){padding: 0% !important;}
                                            </style>
                                    <table class="col-md-12">
                                        <thead>
                                            <tr>
                                                <th class="bg_sky noborbottom wd-5p" rowspan="2"
                                                    colspan="1">
                                                    SR#.
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2"
                                                    colspan="1">
                                                    Activity
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2"
                                                    colspan="1">
                                                    Risk event
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2"
                                                    colspan="1">
                                                    Risk Type
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2"
                                                    colspan="1">
                                                    Cost
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2"
                                                    colspan="1">
                                                      probability
                                                </th>
                                                <th class="bg_sky noborbottom" rowspan="2">Impact</th>
                                                <th class="bg_sky noborbottom" rowspan="2">Score</th>
                                                <th class="bg_sky noborbottom" rowspan="2">
                                                    Rating
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="riskmatrix">
                                            <tr>
                                                <td><input type="text" class="form-control"></td>
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
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
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
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><button class="btn btn-sm btn-success"
                                                        type="button" id="add-more">+</button></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="HSE" role="tabpanel" aria-expanded="true">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Health Safety Enviornment</h4>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sunt similique totam harum sit. Quibusdam libero, harum rem
                            quam repellendus adipisci. Repellat sapiente asperiores
                            numquam beatae at distinctio quaerat reiciendis
                            repudiandae.
                        </div>
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Description</th>
                                                <th>Yes</th>
                                                <th>No</th>
                                                <th>Comments</th>

                                            </tr>
                                        </thead>
                                        <tbody id="stakeholders">
                                            <tr>
                                                <td>1.</td>
                                                <td>Do workers have a safe route to
                                                    their place of work?</td>

                                                <td>
                                                    <div class="checkbox-fade fade-in-success m-0">
                                                        <label>
                                                            <input type="checkbox" id="yes">
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox-fade fade-in-danger m-0">
                                                        <label>
                                                            <input type="checkbox" id="no"
                                                                checked>
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>

                                                <td>Lorem, ipsum dolor sit amet
                                                    consectetur adipisicing elit.
                                                    Quaerat, tempore?</td>
                                            </tr>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="Gallery" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                    <div class="container">
                      <div class="col-md-12 col-sm-12">

                        <!-- Our markup, the important part here! -->
                        <div id="drag-and-drop-zone" class="dm-uploader">
                          <h3 class="mb-5 mt-5 text-muted text_center">Drag &amp; drop files here</h3>

                          <div class="btn btn-primary btn-block">
                            <input type="file" id="html_btn" title='Click to add Files' />
                              <span>Open the file Browser</span>
                          </div>
                        </div><!-- /uploader -->

                      </div>
                      <div class="col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            File List
                          </div>

                          <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                            <li class="text-muted text-center empty">No files uploaded.</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane " id="Documents" role="tabpanel" aria-expanded="false"
                    style="display:none;">
                    <div class="container">
                    </div>
                </div>
                {{-- <div class="tab-pane active" id="procurment" role="tabpanel"
                    aria-expanded="true">
                </div> --}}

            </div>
        </div>

    </div>

    {{-- <button type="button" class="btn btn-success alert-success-msg m-b-10" style=" margin-left: 80%;">Submit
        Monitoring</button> --}}


</div>
