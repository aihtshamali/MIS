
<div class="tab-pane {{isset($maintab) && $maintab=='conduct' ? 'active' : ''}}" id="c_monitoring" role="tabpanel">
    <style scoped="true">
        .select2-container--default .select2-selection--single{
        height: 37px !important;
        }
        /* file upload */

        /* .custom-file-upload {
        display: block;
        width: auto;
        font-size: 16px;
        margin-top: 30px;
        }
        .custom-file-upload label {
        display: block;
        margin-bottom: 5px;
        }
        .file-upload-wrapper
        {
        position: relative;
        margin-bottom: 5px;
        }

        .file-upload-input-conductMonitoring {
        width: 82%;
        color: #404e67;
        font-size: 16px;
        float:right !important;
        padding: 11px 17px;
        border: none;
        -moz-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        -webkit-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        float: left;
        }
        .file-upload-input-conductMonitoring:hover, .file-upload-input-conductMonitoring:focus {
        background-color: #ab3326;
        outline: none;
        }

        .file-upload-button-conductMonitoring {
        cursor: pointer;
        display: inline-block;
        color: #fff;
        font-size: 14px;
        text-transform: uppercase;
        padding: 1em;
        border: none;
        margin-left: -1px;
        background-color: #01a9ac;
        float: left;
        -moz-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        -webkit-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        border-radius: 0.7em;
        font-weight: 600;
        } */
        /* .file-upload-button:hover {
        background-color: #404E67;
        } */
        /* upload images */
        @keyframes spinner 
        {
            0% {
                transform: rotate(0deg);
            }
            50% {
                opacity: 0;
            }
            100% {
                transform: rotate(360deg);
            }
        }
        #drop--area 
        {
        display: block;
        /* margin: 2rem auto;
        border: .2rem solid #01a9ac;
        border-radius: 1rem;
        padding: 3rem; */
        }
        #drop--area>form>.file-upload-wrapper>input[type="text"] {display:none !important;}  
        #drop--area>form>.file-upload-wrapper>button {display:none !important;}
        #drop--area.highlight {
        border: .2rem dashed #34495e;
        }

        #file--input {
        margin-bottom: 1rem;
        background: blue;
        height: 100%;
        display: none;
        }

        #gallery {
        margin-top: 2rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        }

        .preview {
        height: 18rem;
        width: 18rem;
        overflow: hidden;
        position: relative;
        margin: 2rem .5rem 0;
        }
        .preview::before {
        content: '';
        width: 50%;
        height: 50%;
        border-radius: 50%;
        border: .5rem solid transparent;
        border-color: transparent transparent transparent #fff;
        transition: all .5s ease-in;
        background: transparent;
        position: absolute;
        top: 23%;
        left: 20%;
        animation: spinner 1s linear 1s infinite;
        }

        .progressSpan {
        background: #2c3e50;
        opacity: .6;
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 1000;
        transition: all 1s cubic-bezier(0.165, 0.84, 0.44, 1);
        top: 0;
        left: 0;
        }

        .done {
        height: 45%;
        width: 24%;
        overflow: hidden;
        position: relative;
        margin: 1% 0.5%;
        border: 1px dashed #404e67;
        }

        .done>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        }

        .mainSpan {
        position: absolute;
        width: 2.5rem;
        height: 2.5rem;
        z-index: 2000;
        top: 3.2%;
        right: 10%;
        cursor: pointer;
        opacity: .9;
        }

        .spanOne {
        position: absolute;
        background: #404e67;
        top: 2.2%;
        right: 34%;
        width: 11%;
        height: 55%;
        transform: rotate(-50deg);
        cursor: pointer;
        }

        .spanTwo {
        position: absolute;
        background: #404e67;
        z-index: 2000;
        top: 3.2%;
        right: 34%;
        width: 11%;
        height: 55%;
        transform: rotate(50deg);
        cursor: pointer;
        }

        .button {
        display: inline-block;
        padding: 1rem !important;
        background-color: #01a9ac !important;
        color: #fff;
        font-weight: 900;
        text-transform: uppercase;
        border-radius: .7em;
        margin-left: .6rem;
        }
        .button:hover {
        background-color: #2c3e50;
        cursor: pointer;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12  conductNavBar">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs" role="tablist">
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="QA" ? "active" : ""}} quality_assesment' data-toggle="tab" href="#quality_assesment"
                        role="tab" aria-expanded="false"><b style="font-size:14px; font-weight:bold;">Quality
                            Assesment</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link  {{isset($innertab) && $innertab=="stake" ? "active" : ""}} stakeholder' data-toggle="tab" href="#stakeholder"
                        role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Stakeholders</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link  {{isset($innertab) && $innertab=="issue" ? "active" : ""}} issues' data-toggle="tab" href="#issues" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Issues</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="risk" ? "active" : ""}} risks' data-toggle="tab" href="#risks" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Risks</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="HSE" ? "active" : ""}} HSE' data-toggle="tab" href="#HSE" role="tab"
                        aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Health
                            Safety Enviornment</b></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link {{isset($innertab) && $innertab=="proc" ? "active" : ""}} procurement' data-toggle="tab" href="#procu"
                        role="tab" aria-expanded="true"><b style="font-size:14px; font-weight:bold;">Procurement</b></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link gllery" data-toggle="tab" href="#Gallery"
                        role="tab" aria-expanded="false">
                        <b style="font-size:14px; font-weight:bold;">Photos&Videos</b></a>
                </li> --}}
                <li class='nav-item  {{isset($innertab) && $innertab=="docs" ? "active" : ""}}'>
                    <a class="nav-link Documents" data-toggle="tab" href="#Documents"
                        role="tab" aria-expanded="false">
                        <b style="font-size:14px; font-weight:bold;">upload image & video</b></a>
                </li>
                <li class='nav-item'>
                    <a class="nav-link observations" data-toggle="tab" href="#observations" role="tab" aria-expanded="false">
                        <b style="font-size:14px; font-weight:bold;">Observations</b></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabs card-block">
                
                <div class='tab-pane {{isset($innertab) && $innertab=="QA" ? "active" : ""}}' id="quality_assesment" role="tabpanel">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Quality Assesment</h4>
                        </div>
                        <form action="{{route('saveQualityAssesment')}}" class="" method="POST">
                                {{ csrf_field() }}
                            <input type="hidden" name="page_tabs" value="conduct_QA">
                         <div class="card-block">
                              <div class="row oneComponentQA">
                                  <div class="col-md-6 offset-md-1">
                                        To assess quality of components, press here. <button class="btn btn-sm btn-primary" id="add_more_component" name="add_more_component[]" type="button"><span><i class="fa fa-plus"></i></span></button>
                                  </div>
                              </div>

                            </div>
                        <div class="form-group row">
                                <div class="col-md-8"></div>
                                    <div class="col-md-3">
                                            <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                                    <button type="submit" class="btn btn-success btn-sm btn-outline-success">
                                        Save Quality Assesment</button>
                                    </div>
                                </div>
                        </form>
                        </div>
                        @if(isset($qualityassesments) && $qualityassesments!=Null )
                            <div class="card z-depth-right-0">
                                    <div class="card-header">
                                        <h4>Quality Assesment Summary</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table  table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Component</th>
                                                            <th>Activity</th>
                                                            <th>Assesment</th>
                                                            <th>Progress</th>
                                                            <th>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($qualityassesments as $qa)
                                                        <tr>
                                                        <td>
                                                            @if(isset($qa->MPlanComponent->component) && $qa->MPlanComponent->component!=null)
                                                            {{$qa->MPlanComponent->component}}
                                                            @else
                                                            <p style="color:red"> Not Added</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(isset($qa->MPlanComponentActivitiesMapping->activity) && $qa->MPlanComponentActivitiesMapping->activity!=null)
                                                            {{$qa->MPlanComponentActivitiesMapping->activity}}
                                                            @else
                                                                <p style="color:red"> Not Added</p>
                                                                @endif
                                                            </td>
                                                        <td>
                                                            @if(isset($qa->assesment) && $qa->assesment!=null)
                                                            {{$qa->assesment}}
                                                            @else
                                                            <p style="color:red"> Not Added</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                                @if(isset($qa->progressinPercentage) && $qa->progressinPercentage!=null)
                                                                {{$qa->progressinPercentage}}
                                                                @else
                                                                <p style="color:red"> Not Added</p>
                                                                @endif
                                                        </td>
                                                        <td>
                                                                @if(isset($qa->remarks) && $qa->remarks!=null)
                                                                {{$qa->remarks}}
                                                                @else
                                                                <p style="color:red"> Not Added</p>
                                                                @endif
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endif
                        <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>General Feed Back</h4>
                        </div>

                        <div class="card-block">
                          <form action="{{route('saveGeneralFeedBack')}}" class="serializeform" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                            <input type="hidden" name="page_tabs" value="conduct_QA">
                            @foreach ($generalFeedback as $key => $gf)
                              <div class=" form-group row">
                                  <div class="col-md-1"></div>
                                  <div class="col-md-1">
                                      <b><label for="">{{$key+1}}</label></b>
                                  </div>

                                  <div class="col-md-5">
                                      <b><label for="">{{$gf->name}}</label></b>
                                  </div>

                                  <div class="col-md-1">
                                      <label for="generalFeedback[{{$gf->id}}]" class="btn btn-success btn-sm btn-outline-success">
                                          YES</label>
                                      <input type="radio" value="{{$gf->id}}_yes"
                                       @if(isset($gf->MAssignedProjectFeedBack) 
                                        && $gf->MAssignedProjectFeedBack->where('m_project_progress_id',$progresses->id)->first() 
                                        && $gf->MAssignedProjectFeedBack->answer == "yes") 
                                        {{"checked"}} 
                                        @endif
                                      
                                      name="generalFeedback[{{$gf->id}}]">
                                  </div>
                                  <div class="col-md-1">
                                      <label for="generalFeedback[{{$gf->id}}]" class="btn btn-danger btn-sm btn-outline-danger">
                                          NO</label>
                                          <input type="radio" value="{{$gf->id}}_no"
                                          @if(isset($gf->MAssignedProjectFeedBack) 
                                        && $gf->MAssignedProjectFeedBack->where('m_project_progress_id',$progresses->id)->first() 
                                        && $gf->MAssignedProjectFeedBack->answer == "no") 
                                        {{"checked"}} 
                                        @endif
                                          name="generalFeedback[{{$gf->id}}]">
                                  </div>
                                  <div class="col-md-1"></div>
                              </div>
                            @endforeach
                            <div class="form-group row">
                              <div class="col-md-10"></div>
                                <div class="col-md-1">
                                  <button type="submit" class="btn btn-success btn-sm btn-outline-success">
                                      Save FeedBack</button>
                                </div>
                            </div>
                          </form>
                        </div>

                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="stake" ? "active" : ""}}' id="stakeholder" role="tabpanel">

                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Stakeholders</h4>

                        </div>
                        <form action="{{route('savestakeholders')}}" class="" method="POST">
                                {{ csrf_field() }}
                            <input type="hidden" name="page_tabs" value="conduct_stake">
                           
                            <div class="card-block">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered nowrap">
                                            <thead>
                                                <tr>

                                                    <th>Executing Stakeholders</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>

                                                    <th>Contact #</th>
                                                    <th>Email </th>
                                                    <th><button type="button" name="add[]"
                                                        class=" form-control btn btn-success "
                                                        id="addmoreexecuting" style="size:14px;">+</button></th>
                                                </tr>
                                            </thead>
                                            <tbody id="Executingstakeholders">

                                                    @if(isset($executingStakeholders) && $executingStakeholders!=NULL)
                                                        @foreach ($executingStakeholders as $assignedexecuter)
                                                            <tr>
                                                                <td>
                                                                <div class="col-md-12">
                                                                    <select id="" name="" disabled class="form-control form-control-primary" data-placeholder="" style="width: 100%;">
                                                                        <option value="" disabled selected> Select Here</option>
                                                                            @foreach ($org_project->AssignedExecutingAgencies as $executing)
                                                                                <option
                                                                                    @if($assignedexecuter->assigned_executing_agency_id == $executing->id)
                                                                                    {{"selected"}}
                                                                                    @endif

                                                                                    value="{{$executing->id}}" disabled >{{$executing->ExecutingAgency->name}}
                                                                                </option>
                                                                            @endforeach
                                                                            </select>
                                                                        </div>
                                                                            </td>
                                                                        <td><input type="text" name="" disabled class="form-control" value="{{$assignedexecuter->name}}" /></td>
                                                                         <td><input type="text" name="" disabled  class="form-control" value="{{$assignedexecuter->designation}}" /> </td>
                                                                        <td><input type="text" name="" disabled  class="form-control" value="{{$assignedexecuter->contactNo}}" /></td>
                                                                        <td><input type="text" name="" disabled  class="form-control" value="{{$assignedexecuter->email}}" /></td>
                                                                               
                                                                                {{-- <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr> --}}

                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <select id="" name="stakeholderExecuting[]" class="form-control form-control-primary" data-placeholder="" style="width: 100%;">
                                                                    <option value="" disabled selected> Select Here</option>
                                                                        @foreach ($org_project->AssignedExecutingAgencies as $executing)
                                                                            <option
                                                                            
                                                                            value="{{$executing->id}}" >{{$executing->ExecutingAgency->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                    </td>
                                                                <td><input type="text" name="Executingstakeholder_name[]"
                                                                class="form-control" /></td>
                                                                    <td><input type="text" name="Executingstakeholder_designation[]"
                                                                        class="form-control" /> </td>
                                                            <td><input type="text" name="Executingstakeholder_number[]"
                                                                    class="form-control"  /></td>
                                                            <td><input type="text" name="Executingstakeholder_email[]"
                                                                    class="form-control"  /></td>
                                                                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger" onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td></tr>
                                                    </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card-block">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered nowrap">
                                            <thead>
                                                <tr>

                                                    <th>Sponsoring Stakeholders</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Contact #</th>
                                                    <th>Email </th>
                                                    <th><button type="button" name="add[]"
                                                        class=" form-control btn btn-success "
                                                        id="addmoresponsoring" style="size:14px;">+</button></th>
                                                </tr>
                                            </thead>
                                            <tbody id="Sponsoringstakeholders">
                                                @if(isset($sponsoringStakeholders) && $sponsoringStakeholders!=NULL)
                                                @foreach ($sponsoringStakeholders as $Sp)
                                                <tr>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <select id="" name="" disabled class="form-control form-control-primary " data-placeholder="" style="width: 100%;">
                                                                    <option value="" disabled selected> Select Here</option>
                                                                    @foreach ($org_project->AssignedSponsoringAgencies as $sponsoring)
                                                                    <option
                                                                        @if($Sp->assigned_sponsoring_agency_id == $sponsoring->id)
                                                                        {{"selected"}}
                                                                        @endif
                                                                    value="{{$sponsoring->id}}"  >{{$sponsoring->SponsoringAgency->name}}</option>
                                                                    @endforeach

                                                            </select>
                                                        </div>
                                                    </td>
                                                        <td><input type="text" name="" disabled class="form-control" value="{{$Sp->name}}" /></td>
                                                        <td><input type="text" name="" disabled class="form-control" value="{{$Sp->designation}}" /> </td>
                                                        <td><input type="text" name="" disabled class="form-control" value={{$Sp->contactNo}}/></td>
                                                        <td><input type="text" name="" disabled class="form-control" value={{$Sp->email}} /></td>
                                                               
                                                                {{-- <td><button type="button" class=" form-control btn btn-danger btn-outline-danger"
                                                                onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td> --}}
                                                </tr>
                                                @endforeach
                                                @endif
                                                <tr>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <select id="" name="Sponsoringstakeholder[]" class="form-control form-control-primary " data-placeholder="" style="width: 100%;">
                                                                    <option value="" disabled selected> Select Here</option>
                                                                    @foreach ($org_project->AssignedSponsoringAgencies as $sponsoring)
                                                                    <option value="{{$sponsoring->id}}" >{{$sponsoring->SponsoringAgency->name}}</option>
                                                                    @endforeach

                                                            </select>
                                                        </div>
                                                    </td>
                                                        <td><input type="text" name="Sponsoringstakeholder_name[]"
                                                        class="form-control" /></td>
                                                                <td><input type="text" name="Sponsoringstakeholder_designation[]"
                                                                class="form-control"  /> </td>
                                                        <td><input type="text" name="Sponsoringstakeholder_number[]"
                                                        class="form-control" /> </td>
                                                        <td><input type="text" name="Sponsoringstakeholder_email[]"
                                                                class="form-control"  /></td>
                                                    <td><button type="button" class=" form-control btn btn-danger btn-outline-danger"
                                                        onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td>
                                                    </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card-block">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table  table-bordered nowrap">
                                            <thead>
                                                <tr>

                                                    <th>BeneFiciary Stakeholder</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Email </th>
                                                    <th>Contact #</th>
                                                    <th><button type="button" name="add[]"
                                                        class=" form-control btn btn-success "
                                                        id="addmoreben" style="size:14px;">+</button></th>
                                                </tr>
                                            </thead>
                                            <tbody id="Beneficiarystakeholders">
                                                @if(isset($B_Stakeholders) && $B_Stakeholders!=NULL)
                                                @foreach ($B_Stakeholders as $B_S)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="" disabled value= "{{$B_S->Beneficiary}}" class="form-control" placeholder="Beneficiary">
                                                        </td>
                                                        <td><input type="text" name="" disabled  class="form-control" value= "{{$B_S->name}}" /></td>
                                                        <td><input type="text" name=""  disabled  class="form-control" value= "{{$B_S->designation}}" /> </td>
                                                        <td><input type="text" name="" disabled  class="form-control" value= "{{$B_S->email}}" /></td>
                                                        <td><input type="text" name=""  disabled  class="form-control" value= "{{$B_S->contactNo}}" /></td>
                                                              
                                                        {{-- <td><button type="button" class=" form-control btn btn-danger btn-outline-danger"
                                                            onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td> --}}
                                                    </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                        <td>
                                                            <div class="col-md-12">
                                                            <input type="text" name="Beneficiarystakeholder[]" class="form-control" placeholder="Beneficiary">
                                                            </div>
                                                        </td>
                                                        <td><input type="text" name="Beneficiarystakeholder_name[]"
                                                                class="form-control" /></td>
                                                                <td><input type="text" name="Beneficiarystakeholder_designation[]"
                                                                    class="form-control" /> </td>
                                                        <td><input type="text" name="Beneficiarystakeholder_email[]"class="form-control" /></td>
                                                        <td><input type="text" name="Beneficiarystakeholder_number[] "
                                                                class="form-control" /></td>
                                                        <td><button type="button" class=" form-control btn btn-danger btn-outline-danger"
                                                            onclick="removerow(this)" name="remove[]" style="size:14px;">-</button></td>

                                                    </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row">
                                  <div class="offset-md-9">
                                    <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                                    <button type="submit" class="btn btn-success btn-sm btn-outline-success">
                                        Save </button>
                                  </div>
                             </div>
                        </form>
                    </div>

                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="issue" ? "active" : ""}}' id="issues" role="tabpanel">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Issues and Observations</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{route('saveMissues')}}" method="POST" class="serializeform">
                                {{ csrf_field() }}
                                <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                                <input type="hidden" name="page_tabs" value="conduct_issue">
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
                                                <td><input type="text" name="issue[]" style="width:100%;padding:2%;" /></td>
                                                <td>
                                                    <select id="issues2" name="issuetype[]" class="form-control form-control-primary select2" data-placeholder="" style="width: 100%;">
                                                            @foreach($issue_types as $issue)
                                                            <option value="{{$issue->id}}" >{{$issue->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="severity[]" class="form-control form-control-primary">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="1">Very High</option>
                                                            <option value="2">High</option>
                                                            <option value="3">Medium</option>
                                                            <option value="4">Low</option>
                                                            <option value="5">Very Low</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="sponsoring_department[]" class="form-control form-control-primary">
                                                            <option value="" selected disabled>Select Sponsoring Agency</option>
                                                            @foreach($project->Project->AssignedSponsoringAgencies as $sp)
                                                            <option value="{{$sp->SponsoringAgency->id}}">{{$sp->SponsoringAgency->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="">OR</label>
                                                        <select name="executing_department[]" class="form-control form-control-primary">
                                                            <option value="" selected disabled>Select Executing Agency</option>
                                                            @foreach($project->Project->AssignedExecutingAgencies as $exec)
                                                            <option value="{{$exec->ExecutingAgency->id}}">{{$exec->ExecutingAgency->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td style="width:5%;">
                                                        <button class="btn btn-sm btn-success" type="button" id="add-more-issues">+</button>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9"></div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-sm btn-success" >Submit</button>
                                            </div>
                                        </div>
                            </form>
                            @if(isset($m_assigned_issues) && $m_assigned_issues!=Null )
                                <div class="card z-depth-right-0">
                                        <div class="card-header">
                                            <h4>Issues and Observations Summary</h4>
                                        </div>
                                        <div class="card-block">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table  table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Issues</th>
                                                                <th>Issue Type</th>
                                                                <th>Severity</th>
                                                                <th>Sponsoring Agency</th>
                                                                <th>Executing Agency</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($m_assigned_issues as $mai)
                                                            <tr>
                                                            <td>
                                                                @if(isset($mai->issue))
                                                                {{$mai->issue}}
                                                                @else
                                                                <p style="color:red"> Not Added</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(isset($mai->MIssueType) && $mai->MIssueType!=null)
                                                                {{$mai->MIssueType->name}}
                                                                @else
                                                                    <p style="color:red"> Not Added</p>
                                                                    @endif
                                                                </td>
                                                            <td>
                                                                @if(isset($mai->severity))
                                                                    @if($mai->severity == 1)
                                                                    Very High
                                                                    @elseif($mai->severity == 2)
                                                                    High
                                                                    @elseif($mai->severity == 3)
                                                                    Medium
                                                                    @elseif($mai->severity == 4)
                                                                    Low
                                                                    @elseif($mai->severity == 5)
                                                                    Very Low
                                                                    @endif
                                                                @else
                                                                <p style="color:red"> Not Added</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                    @if(isset($mai->SponsoringAgency) && $mai->SponsoringAgency!=null)
                                                                    {{$mai->SponsoringAgency->name}}
                                                                    @else
                                                                    <p style="color:red"> Not Added</p>
                                                                    @endif
                                                            </td>
                                                            <td>
                                                                    @if(isset($mai->ExecutingAgency) && $mai->ExecutingAgency!=null)
                                                                    {{$mai->ExecutingAgency->name}}
                                                                    @else
                                                                    <p style="color:red"> Not Added</p>
                                                                    @endif
                                                            </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="risk" ? "active" : ""}}' id="risks" role="tabpanel">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Risks </h4>
                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sunt similique totam harum sit. Quibusdam libero, harum rem
                            quam repellendus adipisci. Repellat sapiente asperiores
                            numquam beatae at distinctio quaerat reiciendis
                            repudiandae. -->
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

                <div class='tab-pane {{isset($innertab) && $innertab=="HSE" ? "active" : ""}}' id="HSE" role="tabpanel" aria-expanded="true">
                    <div class="card z-depth-right-0">
                        <div class="card-header">
                            <h4>Health Safety Enviornment ( Infrastructure Sector Only )</h4>
                           
                        </div>
                        <div class="card-block">
                            <div class="col-md-12">
                              <form action="{{route('savehealthsafety')}}" method="POST" class="serializeform">
                                {{ csrf_field() }}
                                <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                                <input type="hidden" name="page_tabs" value="conduct_HSE">
                                {{-- <input type="hidden" name="page_tabs" value="conduct_proc"> --}}
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
                                            @foreach($healthsafety as $key=>$issue)
                                            <tr>
                                                <td>{{$key+1}}.</td>
                                                <td>{{$issue->description}}</td>
                                                <td>
                                                    
                                                    <div class="checkbox-fade fade-in-success m-0">
                                                        <label>
                                                            <input type="radio" name="status[{{$key}}]"
                                                               @if(isset($issue->MAssignedProjectHealthSafety) 
                                                               && $issue->MAssignedProjectHealthSafety->where('m_project_progress_id',$progresses->id)->first() 
                                                               && $issue->MAssignedProjectHealthSafety->status == "yes") 
                                                               {{"checked"}} 
                                                               @endif
                                                               value="{{$issue->id}}_yes" id="" >
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox-fade fade-in-danger m-0">
                                                        <label>
                                                            <input type="radio" name="status[{{$key}}]" value="{{$issue->id}}_no"
                                                            @if(isset($issue->MAssignedProjectHealthSafety) && $issue->MAssignedProjectHealthSafety->m_project_progress_id==$progresses->id && $issue->MAssignedProjectHealthSafety->status == "no")
                                                             {{"checked"}}
                                                              @endif
                                                            id="" >
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>

                                                <td><textarea name="comments[{{$key}}]" id="" cols="30" rows="2"></textarea></td>
                                            </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-1">
                                        <button type="submit" class="btn btn-sm btn-success" >Submit</button>
                                        </div>
                                    </div>
                                </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="proc" ? "active" : ""}}' id="procu" role="tabpanel" aria-expanded="true">
                  <div class="card-block">
                      <div class="col-md-12">
                          <form action="#" method="POST" class="serializeform">
                          {{ csrf_field() }}
                          <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">
                          <input type="hidden" name="page_tabs" value="conduct_docs">
                          <div class="table-responsive">
                              <table class="table table-bordered table-stripped nowrap">
                                  <thead>
                                      <tr>
                                          <th>Item Name</th>
                                          <th>Description</th>
                                          <th>Quantity/units</th>
                                          <th>PC-I Cost</th>
                                          <th>Amount</th>
                                          <th>Expected Date Of Perchase</th>
                                          <th>Actual Date of perchase</th>
                                          <th>Actual perchase Price</th>
                                          <th>Remarks</th>
                                      </tr>
                                  </thead>
                                  <tbody id="">
                                    <tr>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"></td>
                                      <td class="tdprocu"><textarea placeholder="Remarks..." style="border:none;"></textarea></td>
                                    </tr>
                                  </tbody>

                              </table>
                              <div class="row">
                                  <div class="col-md-9"></div>
                                  <div class="col-md-1">
                                  <button type="submit" class="btn btn-sm btn-success" >Submit</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                      </div>
                  </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="docs" ? "active" : ""}}' id="Documents" role="tabpanel" aria-expanded="false">
                    <div class="container">
                        <div id="drop--area">
                        <form action="{{route('saveManualImages')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}   
                            <input type="hidden" name="page_tabs" value="conduct_docs">
                            <input type="file"  name="imgs[]" id="file--input" multiple onchange="handleFiles(this.files)">
                            <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">   
                            <label for="file--input" class="button">Select Images or Videos</label>
                                <div id="gallery"></div>
                            <button type="submit" class="btn btn-primary" name="submitimages">Save</button>
                        </form>
                        </div>
                    </div>
                </div>

                <div class='tab-pane {{isset($innertab) && $innertab=="observation" ? "active" : ""}}'  id="observations" role="tabpanel" aria-expanded="false">
                    <form action="{{route('save_m_observations')}}" method="POST" class="border">
                        {{csrf_field()}}
                            <input type="hidden" name="page_tabs" value="conduct_observation">
                        <input type="hidden" name="m_project_progress_id" value="{{$progresses->id}}">   
                        <textarea name="observation" id="short_desc" style="height:200px;" class="offset-md-1 col-md-10">
                        @if(isset($m_observations->observation))
                            {{$m_observations->observation}}
                        @else
                            Type your Observations Here...
                        @endif
                        </textarea>

                        <button class="btn btn-success float-right mt-5" type="submit">SAVE</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
