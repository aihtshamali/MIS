<div class="tab-pane nodisplay" id="summary" role="tabpanel">
    <fieldset>
        <div class="form-group row">
            <div class="col-md-1 col-sm-1">
            </div>

            <div class="col-md-4 col-sm-2">
                <div class="card summary-card bg-new">
                    <div class="card-header"></div>
                    <div class="card-block">
                        <div class="animation-model">
                            {{-- <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                style="text-align:center; vertical-align:middle; font-size:13px; margin-top: -10%;margin-left: 10%;"
                                data-modal="modal-1">Work Breakdown <br>Structure<br>(WBS)</button> --}}
                                <!-- Button trigger modal -->
                                <button type="button"
                                class="btn btn-primary btn-outline-info waves-effect md-trigger "
                                style="text-align:center; vertical-align:middle; font-size:13px; margin-top: -10%;margin-left: 10%;"
                                data-modal="modal-1"
                                 data-toggle="modal" data-target="#exampleModalLong">
                                    Work Breakdown <br>Structure<br>(WBS)
                                </button>

                            {{-- <div class="md-modal md-effect-3" id="modal-1">
                                <div class="md-content">
                                    <h3>Work Breakdown Structure</h3>
                                    <div>
                                      <div id="WBSChart">

                                      </div>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="md-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-1 col-sm-1"></div>

            <div class="col-md-4 col-sm-2">
                <div class="card summary-card bg-new">
                    <div class="card-header"></div>
                    <div class="card-block">
                      <div class="animation-model">
                          {{-- <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                              style="text-align:center; vertical-align:middle; font-size:13px;margin-left: 20%;"
                              data-toggle="modal" data-target="modal-2"
                              >Gantt Chart</button> --}}

                              <button type="button"
                              class="btn btn-primary btn-outline-info waves-effect md-trigger "
                                  style="text-align:center; vertical-align:middle; font-size:13px;margin-left: 20%;"
                              data-toggle="modal" data-target="#modal-2">
                                Gantt Chart
                              </button>
                          <div class="md-overlay"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-1">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-md-4 col-sm-2">
                <div class="card summary-card bg-new">
                    <div class="card-header"></div>
                    <div class="card-block">
                        <div class="animation-model">
                            <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                style="text-align:center; vertical-align:middle; font-size:13px;margin-left:20%"
                                data-modal="modal-3">Burn Chart</button>
                            <div class="md-modal md-effect-3" id="modal-3">
                                <div class="md-content">
                                    <h3>Burn Chart </h3>
                                    <div>
                                        <canvas id="barChart" width="400" height="400"></canvas>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>
                            <div class="md-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-sm-1"></div>

            <div class="col-md-4 col-sm-2">
                <div class="card summary-card bg-new">
                    <div class="card-header"></div>
                    <div class="card-block">
                        <div class="animation-model">
                            <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                style="text-align:center; vertical-align:middle; font-size:13px;margin-left:20%"
                                data-modal="modal-4">PROGRESS</button>
                            <div class="md-modal md-effect-3" id="modal-4">
                                <div class="md-content">
                                    <h3>Progress in %</h3>
                                    <div>
                                        <canvas id="barChart" width="400" height="400"></canvas>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>
                            <div class="md-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-1 col-sm-1"></div>

        </div>
{{-- start newtiQ map --}}
        {{-- <div class="form-group row">
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-md-4 col-sm-2">
                <div class="card summary-card bg-new">
                    <div class="card-header"></div>
                    <div class="card-block">
                        <div class="animation-model">
                            <button type="button" class="btn btn-info btn-outline-info waves-effect md-trigger "
                                style="text-align:center; vertical-align:middle; font-size:13px;margin-left:20%"
                                data-modal="modal-3">Burn Chart</button>
                            <div class="md-modal md-effect-3" id="modal-3">
                                <div class="md-content">
                                    <h3>Burn Chart </h3>
                                    <div>
                                        <canvas id="barChart" width="400" height="400"></canvas>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>
                            <div class="md-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-sm-1"></div>

        </div> --}}
{{-- end newtiQ map --}}
    </fieldset>
    <div class="pull-right" style="padding-top:2%">
      <button type="button" class="btn btn-success btn-lg" disabled name="Complete">Complete This Monitoring</button>
    </div>
</div>
