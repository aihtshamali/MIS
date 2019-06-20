<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring Report | DGME</title>
    <link rel="icon" href="{{asset('dgme.png')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/feather/css/feather.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('_monitoring/css/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/css/jquery.mCustomScrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('_monitoring/css/icon/material-design/css/material-design-iconic-font.min.css')}}" />
    <link href="{{asset('lightRoom/lightgallery.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
    <style>
        .skin-blue .main-header .navbar {
            position: fixed !important;
            width: 100% !important;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .col-md-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: none
        }

        .col-md-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-md-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-md-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-md-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-md-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-md-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-md-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-md-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-md-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .float-left {
            float: left !important
        }

        .float-right {
            float: right !important
        }

        .float-none {
            float: none !important
        }

        /* gallery */

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

        .card {
            padding: 6%;
        }

        .card-block {
            padding: 1.25rem;
            margin: 0% 0% 0% 0%;
            border-bottom: 1px solid #404e6787;
        }

        table {
            width: 100%;
        }

        h1,
        h2,
        h3,
        h1,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: .5rem !important;
        }

        .levOne {
            padding-left: 1% !important;
        }

        p {
            margin-bottom: 0% !important;
        }

        .row .col-md-12 h5 {
            margin-top: 1.5%;
        }

        label b {
            font-size: 15px !important;
        }

        .green {
            color: #687753 !important
        }

        .report-logo {
            height: 80% !important;
        }

        .auto {
            margin: auto !important;
        }

        .bold {
            font-weight: 900;
        }

        .grey {
            color: #404E67
        }

        .black {
            color: #000
        }

        .bluetxt {
            color: #0270c0
        }

        .bglightblue {
            background-color: #9cc2e5;
            padding: 1%
        }

        .underline {
            text-decoration: underline;
        }

        .pdtop3p {
            padding-top: 3%
        }

        .pdtop2p {
            padding-top: 2%
        }

        .pdtop1p {
            padding-top: 1%
        }

        .topic {
            border-bottom: 1px solid #404e6787;
            padding-bottom: 3% !important;
        }

        .mgbottom1p {
            margin-bottom: 1% !important;
        }

        .sectionColor {
            color: #012060
        }

        .topbtns {
            background: #404E67;
            color: #fff;
            border-radius: 6px;
            margin: 0% 1%;
        }

        .topbtnparentwidth {
            min-width: 25% !important;
            top: 1% !important;
            right: -5% !important;
        }

        .fixbtns {
            position: fixed;
            z-index: 9999;
        }

        .clearfix {
            clear: both !important;
        }


        .demo-gallery>ul>li {
            float: left !important;
            width: 30% !important;
            margin: 1% !important;
        }

        .demo-gallery>ul>li>a>img {
            width: 100% !important;
        }

        img {
            margin: auto;
        }

        #inline {
            display: flex;
        }

        /* .fullwidthprint img, */
        .auto img {
            width: 100% !important;
        }


        @media print {

            @page {
                size: auto;
                margin: 10% !important;
            }

            body {
                margin: 10% !important;
            }

            .fullwidthprint img,
            .auto img {
                width: 100% !important;
            }

            .navbar-logo,
            .navbar,
            .topbtnparentwidth,
            .pcoded-navbar {
                display: none !important;
            }

            .white {
                color: #fff !important;
            }

            .nodiplayinprint {
                display: none !improtant;
            }

            .pcoded-content {
                margin-left: 0px !important;
            }

            .row {
                display: inline !important;
            }

            .col-md-6 {
                width: 50% !important;
                float: left !important;
            }

            .col-md-8 {
                width: 100% !important;
            }

            .row .col-md-2,
            .row .col-md-4 {
                float: left !important;
            }

            .row .col-md-4 {
                width: 80%
            }

            .row .col-md-2 {
                width: 20%
            }

            .pdtop3p,
            .pdtop2p,
            .pdtop1p {
                clear: both !important;
            }

            .report-logo {
                width: 20% !important;
                float: left;
            }

            .fullwidthprint {
                clear: both;
                width: 100% !important;
            }

            .text-center {
                text-align: center !important;
            }

            .martop4p {
                margin-top: 5%;
            }

            .demo-gallery>ul>li {
                float: left !important;
                width: 30% !important;
                margin: 1% !important;
            }

            .demo-gallery>ul>li>a>img {
                width: 100% !important;
            }

            .breakpage {
                page-break-before: always !important;
            }

            .breakpage h1 {
                page-break-before: always !important;
            }

            .mainpage {
                height: -webkit-fill-available;
            }

            /* table {
                page-break-after: always;
                overflow: visible !important;
            } */

            thead {
                display: table-header-group
            }

            tfoot {
                display: table-row-group
            }

            tr {
                page-break-inside: avoid
            }

            .mainpageimg {
                max-height: 250px !important;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });
    </script>
    <script src="{{asset('lightRoom/picturefill.min.js')}}"></script>
    <script src="{{asset('lightRoom/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
</head>

<body>
    <div class="topbtnparentwidth fixbtns">
        <button type="button" name="exp_button" class="topbtns exp_button btn btn-md" onclick="Export2Doc('exportContent');">
            Download Document
        </button>
        <button class="topbtns btn btn-md" onclick="window.print()">
            Print
        </button>
    </div>
    <div class="card" id='exportContent' contenteditable="true">
        <!-- myCode start here -->
        <div class="mainpage col-md-12">
            <div class="col-md-12 row pdtop3p">
                <div class="row offset-md-1 col-md-9" id="inline">
                    <div class="col-md-2 text-center auto">
                        <img src="{{asset('dgme.png')}}" id="dgmelogo" class="col-md-2 report-logo" alt="">
                    </div>
                    <div class="col-md-9 text-center auto">
                        <h1 class="green">Directorate General Monitoring & Evaluation</h1>
                        <b class="grey bold">Planing & Development Department Government Of Punjab</b>
                    </div>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="row offset-md-1 col-md-8 fullwidthprint">
                    <div class="col-md-12 text-center auto">
                        <h3 class="green">Monitoring reports of project</h3>
                        <h5 class="grey bold underline" contenteditable="true">{{$project->AssignedProject->Project->title}}</h5>
                    </div>
                </div>
                @if (count($project->ReportImage->where('title_image',1)))
                <div class="col-md-12 fullwidthprint">
                    <img src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$project->id.'/'.$project->ReportImage->where('title_image',1)[0]->MAppAttachment->project_attachement}}" alt="title image" class="col-md-8 offset-md-2 mainpageimg pdtop1p" style="max-height:300px;width: 60% !important;margin-left: 20% !important;">
                    {{-- <img src="https://www.incimages.com/uploaded_files/image/970x450/getty_509107562_2000133320009280346_351827.jpg" alt="title image" class="col-md-8 offset-md-2 mainpageimg pdtop1p" style="width:100%;max-height:300px;" alt="" /> --}}
                </div>
                @endif
                <div class="pdtop3p col-md-12 fullwidthprint" contenteditable="true">
                    <!-- <div class="row">
                    <div class="col-md-12">
                        <label><b>Project Title :</b></label>
                        <span>{{$project->AssignedProject->Project->title}}</span>
                    </div>
                </div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>Locations :</b></label>
                            <span>
                                @foreach ($project->AssignedProject->Project->AssignedDistricts as $district)
                                {{$district->District->name}},
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="row fullwidthprint">
                        <div class="col-md-6">
                            <label><b>Project GS.No:</b></label>
                            <span>{{$project->AssignedProject->Project->ADP}}</span>
                        </div>
                        <div class="col-md-6">
                            <label><b>Planned Start Date :</b></label>
                            <span>{{date('d-M-Y', strtotime($project->AssignedProject->Project->ProjectDetail->planned_start_date))}}</span>
                        </div>
                        <div class="col-md-6">
                            <label><b>Planned End Date :</b></label>
                            <span>{{ date('d-M-Y', strtotime($project->AssignedProject->Project->ProjectDetail->planned_end_date))}}</span>
                        </div>
                        <div class="col-md-6">
                            <label><b>Actual Start Date :</b></label>
                            <span>
                                @if(isset($project->AssignedProject->Project->ProjectDetail->actual_start_date))
                                {{$project->AssignedProject->Project->ProjectDetail->actual_start_date}}

                                @endif
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label><b>Actual End Date :</b></label>
                            <span>
                                @if(isset($project->AssignedProject->Project->ProjectDetail->actual_end_date))
                                {{$project->AssignedProject->Project->ProjectDetail->actual_end_date}}

                                @endif
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Physical Progress :</b></label>
                            <span style="">
                                <b>{{round(calculateMPhysicalProgress($project->id,2),1)}}%</b>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Financial Progress :</b></label>
                            <span style="">
                                <b>{{round(calculateMFinancialProgress($project->id,2),1)}}%</b>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Original Approved Cost :</b></label>
                            <span>
                                {{round($project->AssignedProject->Project->ProjectDetail->orignal_cost,2)}} <small> Million PKR</small>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Final Revised Cost :</b></label>
                            <span>
                                @php
                                $revisedFinalCost=0;
                                @endphp
                                @foreach ($project->AssignedProject->Project->RevisedApprovedCost as $cost)
                                @php
                                $revisedFinalCost= $cost->cost;
                                @endphp
                                @endforeach
                                {{round($revisedFinalCost,2)}} <small> Million PKR</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center martop4p fullwidthprint col-md-12 pdtop3p">
                    <b class="bold">
                        4th Floor, 65- Trade Centre Block, Ayub Chowk, Johar Town, Lahore
                        042-99233177-91, <a href="mailto:info@dgmepunjab.gov.pk?Subject=Related%20DGM&E%20project%20Report%20Summary" target="_top">info@dgmepunjab.gov.pk</a>
                    </b>
                </div>
                <div class="clearfix"></div>
                <div class="text-center martop4p fullwidthprint col-md-12 pdtop3p" contenteditable="true">
                    <b class="bold">
                        April 2019
                    </b>
                </div>
            </div>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="bluetxt underline">Acknowledgements</h1>
            <p class="textarea grey">
                The DGM&E Team would like to thank all those who supported us to conduct the
                Monitoring of the project “Water Supply Pipeline from Kudwala to Banna Post”.
                Thanks to the Director Project Management, DGM&E for his guidance, advice and
                giving time to finalize the study design, research instruments and reviewing the draft
                report. We are grateful to the Director Project Management & Director Coordination
                & other stakeholders for their support and time to review the draft report and
                providing useful feedback.
            </p>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="bluetxt underline">Disclaimer</h1>
            <p class="grey">This report is based on the data provided by the relevant representative of the relevant
                department. DG M&E disclaims, expressed or implied, as to the accuracy or
                completeness of any information reported herein, and disclaims and makes no pledge
                that the information in this document will fulfill any of your particular purposes or
                needs. DG M&E does not undertake to assurance the performance of any individual
                Project or services by virtue of this report. <br /><br /> In dissemination and making this document available, DG M&E is not undertaking to
                render professional or other services for or on behalf of any person or entity, nor is
                DG M&E undertaking to perform any duty owed by any person or entity to someone
                else. Anyone using this document should rely on his or her own independent judgment
                or, as appropriate, seek the advice of a competent professional in determining the
                exercise of reasonable care in any given circumstances. <br /><br /> DG M&E does not undertake to police or enforce compliance with the contents of this
                document. DG M&E does not certify, test, or inspect products, designs, or
                installations for safety or health purposes. Any other statement of compliance with
                any health or safety-related information in this document shall not be attributable to
                DG M&E and is solely the responsibility of the relevant stakeholders.</p>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="bluetxt underline">Executive Summary</h1>
            <p class="grey">
                With the reference of the letter No. So (R&E) 8-2/2015-G of Section officer (R&E) of
                Agriculture Department, Government of Punjab in which it was requested to
                evaluate the lining of watercourse component at Research & Experimental Farm at
                Jalalpur, Multan under the ADP funded project “Establishment of Mohammad
                Nawaz Sahrif University of agriculture, Multan (Phase-II)”
                Main objectives of the construction of water course are to undertake fundamental
                and applied research and development projects aimed at wealth creation in the long,
                medium and short term and to develop and transfer region-based crop and livestock
                related technologies to the local farming community.
                As per PC-I the project planned start date was 17-12-2015 and planned completion
                date was 30-06-217. The PC-I original approved cost was Rs. 15.468 Million &
                actual expenditures were Rs. 14.818 Million.
                DGM&E has conducted Monitoring of the project by considering all factors those
                affect project construction performance against its planned objectives including
                project purpose and design, strategic planing and project management and
                prepared its Monitoring report. The purpose of this Monitoring report is to monitor
                the project in order to assess, whether the project is being constructed as per
                approved scope & the activities of the project are within schedule & budget.
                The scheme was within schedule. The financial progress of work was lesser than

                physical progress due to the saving done on account of labor charges. The non-
                availability of water in six months due to non-perennial canal attached to water

                course is a risk. The scheme was sustainable, relevance, efficient and effective. The
                execution was done by water management and the bidding process done by
                advertisement on the basis of approved firms. The TPV of the scheme as requested
                by the V.C conducted by PIPIP and completion report was submitted satisfactorily.
                The risk of non-availability of water should be mitigated by supplying the water

                through pumps and lines to the experimental farm from the source where non-
                brackish water is available. The usage of brackish water should be avoided in the

                research works in which non-brackish water is considered for cultivation. The local
                community should be engaged in the research work for awareness and guidance of
                community in developing their own farms in the adjacent areas of Jalapur
                experimental farms.<br /><br />
                <b class="float-right">Monitoring Team (DG M&E)</b>
            </p>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="bluetxt text-center underline">ACRONYMS</h1>
            <div class="row">
                <div class="mgbottom1p col-md-2 bold">DGM&E:</div>
                <div class="mgbottom1p col-md-4"> Directorate General Monitoring & Evaluation</div>
                <div class="mgbottom1p col-md-2 bold">IPC:</div>
                <div class="mgbottom1p col-md-4"> Interim Payment Certificate</div>
                <div class="mgbottom1p col-md-2 bold">MNS:</div>
                <div class="mgbottom1p col-md-4"> Muhammad Nawaz Shareef</div>
                <div class="mgbottom1p col-md-2 bold">O&M:</div>
                <div class="mgbottom1p col-md-4"> Operation & Maintenance</div>
                <div class="mgbottom1p col-md-2 bold">MNS:</div>
                <div class="mgbottom1p col-md-4"> Muhammad Nawaz Shareef</div>
                <div class="mgbottom1p col-md-2 bold">PC-I:</div>
                <div class="mgbottom1p col-md-4"> Planing Commission Performa-I</div>
                <div class="mgbottom1p col-md-2 bold">P&DB:</div>
                <div class="mgbottom1p col-md-4"> Planing & Development Board</div>
                <div class="mgbottom1p col-md-2 bold">PMU:</div>
                <div class="mgbottom1p col-md-4"> Project Management Unit</div>
                <div class="mgbottom1p col-md-2 bold">PIPIP:</div>
                <div class="mgbottom1p col-md-10"> Punjab Irrigated-Agriculture Productivity Improvement Project</div>
            </div>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="sectionColor text-center underline">Section-1: INTRODUCTION & BACKGROUND</h1>
            <h1 class="bluetxt underline">1.1 Introduction </h1>
            <p class="grey">
                Government of the Punjab provided Rs. 15.468 million for lining of water
                course including culverts, siphons, Nakkas and water storage ponds through ADP
                approved scheme “Establishment of Muhammad Nawaz Shareef University of
                Agriculture Multan (Phase-II). The MNS University of Agriculture Multan requested
                to get the work done through Water Management Multan as they are experts of lining
                of watercourses and have an approved procedure to execute such works.
                In response, the DO (WM), Multan provided cost estimates amounting to Rs.
                15.507 millions through his letter dated 12-04-2016 (Annexure-I) comprising of Rs.
                12.969 million on account of lining material with PCPS No. 7, Nakkas, cement etc
                as per approved rates by District Rate committee constituted by the Governor of the
                Punjab Vide Notification No. SOA (P) 3-12/2011 dated. 02-01-2012 (copy attached)
                and Rs. 2.538 million on account of labour and excavation charges (Annexure-II
                and III).
                The DO (WM), Multan through his letter dated 09-05-16 requested to constitute
                a project management/implementation committee in addition to ensure standard and
                specifications, purchase of quality material and good masonry work. Copy of the
                letter of DO (WM), Multan dated. 09-05-16 is attached as Annexure-IV. The
                University constituted the project management/implementation committee through
                notification dated 18-05-16 (Annexure-V).
                The University, through letter dated 27-05-16 requested the Secretary
                Agriculture to authorize Regional Manager PMU PIPIP Multan to act as consultant
                for third party validation (Annexure-VI). In response to the request of the University,
                the DG Agriculture (WM) upon the direction of Secretary (Agriculture), Punjab
                through his letter dated 22-06-16 authorized Regional Manager PMU PIPIP Multan
                to act as Consultant Engineer for verification/certification of civil work of watercourse
                for third party validation (Annexure-VII).
                After procurement of the material for the lining of watercourse and awarded the
                contract for labour work by department of Water Management, Multan. The lining of
                watercourse was initiated. While the excavation work is in process, the consultant
                advised the university to make sure the issuance of Farm-A from the irrigation
                department having the measurement of Mogha and cresset level from where the
                slope for lining of watercourse maintained.
                Upon sanction of canal water supply and issuance of Form-A by the Irrigation
                Department, the consultant change the segment design from No. 07 to 06 according
                to cresset level of sanctioned Mogha at Patti minor canal which is the starting point
                of water channel (Annexure-VIII). The PC-I was revised during May, 2017 with the
                watercourse length 4816 meter, culverts, nakkas and siphons as per actual
                execution (copy attached at Annexure-IX).
                Monitoring Report 10
                The final completion report issued by Deputy Director (OFWM) has been duly
                vetted by the consultant Assistant Regional Manager (PIPIP) and Regional
                Managing Director (PIPIP). The report contains the hand-written quantity of material
                which has been used in the execution as per actual verification by the
                implementation committee and the consultant (Annexure-X). The lining of
                watercourse has been completed as per the approved scope of PC-I.
                The slope and quality of constructed watercourse is as per standard design
                criteria (Annex-G) and the benefits of investments are obvious in the number and
                growth of forest & fruit trees and expansion of cropping area. Currently, about 250
                acres land is under cultivation and students/faculty are performing their field
                experiments.
                The former Chief Minister (CM) of Punjab during a meeting with
                parliamentarians of Multan Division on 28-01-2012 approved the “Establishment of
                an Agricultural University in Multan” and directed the Commissioner Multan to
                identify a piece of land for the purpose and start work on it, out of the announced
                package of Rs. 500.000 million for Multan. It was also advised by the CM Punjab
                that the Secretary Higher Education Department, Secretary Agriculture and the
                Commissioner Multan Division will visit the site and put up a feasibility report
                immediately. The Commissioner Multan Division identified 103 acres state land
                belonging to Agriculture Department at Old Shujabad Road near Chowk Nag Shah
                Multan. Later, a meeting was conducted in this regard on 13-07-2012 in the
                Agriculture Department, Government of the Punjab. In the said meeting, it was
                decided that 103 acres of land is insufficient for an Agricultural University, and it was
                unanimously agreed that at least 500 acres land is required for such a University.
                Meanwhile, the Commissioner/DCO Multan further identified three pieces of land as
                detailed below:
                • A piece of land measuring 180 acres land situated in Mouza Rangeel Pur,
                Old Shujabad Road, Multan owned by Provincial Government.
                • Another piece of land measuring 500 acres state land in Chak No. 84/M
                Tehsil Jalalpur, Pirwala owned by the Provincial Government but without
                irrigation water.
                • Another piece of land measuring 50 acres land owned by Auqaf, Department
                in the area of Makhdoom Rashid Multan.
                The total area for the proposed University of Agriculture is 730 acres to be
                provided by the Punjab Government. Consequently, on 26-11-2012 the Government
                of the Punjab, Colonies Department accorded the sanction to hand over the
                possession of state land measuring 500 acres at Mouza Jalalpur Pirwala and 50
                acres state land at Mouza Makhdoom Rasheed in favour of Agriculture Department
                free of cost for establishment of Muhammad Nawaz Shareef University of
                Agriculture, Multan (MNSUAM) in addition to the land measuring 180 acres of
                Agriculture Department identified for the University in Mouza Rangeel Pur, Old
                Shujabad Road, Multan.
                Monitoring Report 11
                The major piece of land of 500 acres situated in Tehsil Jalalpur Pirwala is
                without irrigation water and at present it is almost useless for the cultivation purpose.
                However, a non-6 perennial canal “Patti Minor” is passing through the area which
                may be extended up to the required level purely for the objective of supply of
                irrigation water to this land. However, proposed plan is to establish main
                infrastructure of the University at Old Shujabad Road as main campus, while the
                other two sites will be used as sub-campus cum experimental stations of the
                university. The classes for different disciplines were started in the year 2012 and at
                present near about 635 students are studying in this University as regular students.
            </p>
        </div>
        <div class="breakpage col-md-12 topic pdtop3p" contenteditable="true">
            <h1 class="bluetxt underline">1.2 Project Description</h1>
            <p class="grey">The project description is given in the table below;<br /><br />
                <b class="pdtop1p col-md-12 text-center bold black">Table 1 Project Summary</b></p>
            <table class="table table-bordered pdtop3p">

                <tr>
                    <th class="bglightblue black bold"> Heading</th>
                    <th class="bglightblue black bold">Description</th>
                </tr>


                <tr>
                    <td class="bglightblue black bold">Project Title</td>
                    <td>{{$project->AssignedProject->Project->title}}</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold">Location</td>
                    <td>@foreach ($project->AssignedProject->Project->AssignedDistricts as $district)
                        {{$district->District->name}},
                        @endforeach</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Sponsoring Ministry/ Agency</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Execution Agency</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Operation & Maintenance</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Operation & Maintenance</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Actual Expenditure</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Planned Start Date</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Planned End Date</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Actual Start Date</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Planned Gestation Period</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">Beneficiaries</td>
                    <td>Dummy data...</td>
                </tr>
                <tr>
                    <td class="bglightblue black bold" contenteditable="false">% Financial Utilization</td>
                    <td>Dummy data...</td>
                </tr>

            </table>
        </div>
        <div class="breakpage card-block" contenteditable="true">
            {{-- Objectives and components --}}
            <div class="row pdtop3p" style="">
                <div class="col-md-12 text-center">
                    <h3 class="grey underline">Plan Monitoring</h3>
                </div>
                <div class="col-md-12 pdtop2p">
                    <h1 class="bluetxt underline">Planing Monitoring: Objectives & Components</h1>
                </div>
            </div>
            <div class="col-md-12 row pdtop2p" style="">
                <table class="table table-bordered">

                    <tr>
                        <th class="bglightblue black bold">
                            Sr.
                        </th>
                        <th class="bglightblue black bold"> Objectives</th>
                    </tr>


                    @php
                    $i=1;
                    $j=1;
                    @endphp
                    @if(isset($project->MPlanObjective))
                    @foreach ($project->MPlanObjective as $obj)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$obj->objective}}</td>
                    </tr>
                    @php
                    $i++;
                    $j=1;
                    @endphp
                    @endforeach

                    @endif

                </table>
                <table class="table table-bordered">

                    <tr>
                        <th class="bglightblue black bold">
                            Sr.
                        </th>
                        <th class="bglightblue black bold">Components</th>
                    </tr>


                    @php
                    $i=1;
                    $j=1;
                    @endphp
                    @if(isset($project->MPlanObjective))
                    @foreach ($project->MPlanComponent as $comp)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$comp->component}}</td>
                    </tr>
                    @php
                    $i++;
                    $j=1;
                    @endphp
                    @endforeach

                    @endif

                </table>
            </div>

            {{-- Mapping of Objectives --}}
            <div class="clearfix fullwidthprint"></div>
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Planing Monitoring: Mapping of Objectives and Components</h1>
                </div>
                <div class="col-md-12 pdtop2p">
                    <table class="table table-bordered">

                        <tr>
                            <th class="bglightblue black bold">
                                Sr.
                            </th>
                            <th class="bglightblue black bold"> Objectives</th>
                            <th class="bglightblue black bold">Components</th>
                        </tr>


                        @php
                        $i=1;
                        $j=1;
                        @endphp
                        @if(isset($project->MPlanObjective))
                        @foreach ($project->MPlanObjective as $obj)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$obj->objective}}</td>
                            <td>
                                @if(isset($project->MPlanComponent))
                                @foreach ($project->MPlanObjectivecomponentMapping as $comp)
                                @if($comp->m_plan_objective_id==$obj->id)
                                <p><span><b>{{$j}})</b></span> {{$comp->MPlanComponent->component}}</p>
                                @php
                                $j++;
                                @endphp
                                @endif
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        @php
                        $i++;
                        $j=1;
                        @endphp
                        @endforeach

                        @endif

                    </table>
                </div>
            </div>


            {{-- Mapping of Kpis&component --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Planing Monitoring: Mapping of Kpis & Components</h1>
                </div>
            </div>
            <div class="row" style="">
                <div class="col-md-12">
                    <span>
                        @php
                        $i=1;
                        $j=1;
                        @endphp
                        @if(isset($project->MPlanKpicomponentMapping))
                        @foreach ($project->MPlanKpicomponentMapping as $mappedKPi)
                        <h5 class="bluetxt underline">{{$i}}) {{$mappedKPi->MProjectKpi->name}}</h5>
                        @foreach ($project->MPlanKpicomponentMapping as $comp)
                        <p class="levOne grey"><span class="bluetxt">{{$j}}.</span> {{$comp->MPlanComponent->component}}</p>
                        @php
                        $j++;
                        @endphp
                        @endforeach
                        @php
                        $i++;
                        $j=1;
                        @endphp
                        @endforeach


                        @endif
                    </span>
                </div>
            </div>

            {{-- Mapping of component Activities --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Planing Monitoring: Components & Activities</h1>
                </div>
            </div>
            <div class="col-md-12 row pdtop2p" style="">
                <table class="table table-bordered">
                    <tr>
                        <th class="bglightblue black bold">
                            Sr.
                        </th>
                        <th class="bglightblue black bold"> Components</th>
                    </tr>
                    @if(isset($project->MPlanComponent))
                    @php
                    $i=1;
                    @endphp
                    @foreach ($project->MPlanComponent as $comp)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$comp->component}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach

                    @endif

                </table>
                <table class="table table-bordered">
                    <tr>
                        <th class="bglightblue black bold">
                            Sr.
                        </th>
                        <th class="bglightblue black bold"> Activities</th>
                    </tr>
                    @php
                    $j=1;
                    @endphp
                    @foreach ($project->MPlanComponentActivitiesMapping as $Comp_activities)
                    @if($Comp_activities->m_plan_component_id == $comp->id)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$Comp_activities->activity}}</td>
                    </tr>

                    @php
                    $j++;
                    @endphp
                    @endif
                    @endforeach

                </table>
            </div>

            {{-- Mapping of Activities --}}
            <div class="col-md-12 breakpage pdtop3p" style="">
                <h1 class="bluetxt underline row">Planing Monitoring: Activities Time & Costing</h1>
            </div>
            <div class="row" style="">
                <div class="col-md-12">
                    <table class="table table-bordered">

                        <tr>
                            <th>No.</th>
                            <th>Component</th>
                            <th>Activity</th>
                            <th>Duration In Days</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Amount</th>
                        </tr>


                        @if(isset($project->MPlanComponentActivitiesMapping))
                        @php
                        $i=1;

                        @endphp
                        @foreach ($project->MPlanComponentActivitiesMapping as $compActivity)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$compActivity->MPlanComponent->component}}</td>
                            <td>{{$compActivity->activity}}</td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->duration) && $compActivity->MPlanComponentactivityDetailMapping->duration!=null)
                                {{$compActivity->MPlanComponentactivityDetailMapping->duration}}

                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->unit) && $compActivity->MPlanComponentactivityDetailMapping->unit!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->unit}}

                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->quantity) && $compActivity->MPlanComponentactivityDetailMapping->quantity!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->quantity}}

                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->cost) && $compActivity->MPlanComponentactivityDetailMapping->cost!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->cost}}

                                @endif
                            </td>
                            <td>
                                @if(isset($compActivity->MPlanComponentactivityDetailMapping->amount) && $compActivity->MPlanComponentactivityDetailMapping->amount!=NULL)
                                {{$compActivity->MPlanComponentactivityDetailMapping->amount}}

                                @endif
                            </td>
                            @php
                            $i++;
                            @endphp
                        </tr>
                        @endforeach

                        @endif

                    </table>
                </div>
            </div>

        </div>
        <!-- myCode ends here -->
        {{-- Conduct Monitoring --}}
        <div class="breakpage cad-block pdtop3p" contenteditable="true">
            {{-- Quality Assesments --}}
            <div class="row pdtop3p" style="">
                <div class="col-md-12 text-center">
                    <h1 class="grey underline">Conduct Monitoring</h1>
                </div>
                <div class="col-md-12 pdtop2p">
                    <h1 class="bluetxt underline">Quality Assesments</h1>
                </div>
            </div>
            <div class="row pdtop2p" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>No.</th>
                                <th>Component</th>
                                <th>Activity</th>
                                <th>Assesment</th>
                                <th>Progress</th>
                                <th>Remarks</th>
                            </tr>


                            @php
                            $i=1;
                            @endphp
                            @foreach($project->MConductQualityassesment as $qa)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($qa->MPlanComponent->component) && $qa->MPlanComponent->component!=null)
                                    {{$qa->MPlanComponent->component}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($qa->MPlanComponentActivitiesMapping->activity) && $qa->MPlanComponentActivitiesMapping->activity!=null)
                                    {{$qa->MPlanComponentActivitiesMapping->activity}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($qa->assesment) && $qa->assesment!=null)
                                    {{$qa->assesment}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($qa->progressinPercentage) && $qa->progressinPercentage!=null)
                                    {{$qa->progressinPercentage}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($qa->remarks) && $qa->remarks!=null)
                                    {{$qa->remarks}}

                                    @endif
                                </td>
                                @php
                                $i++;
                                @endphp
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

            {{-- General Feed Backs --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">General FeedBacks</h1>
                </div>
            </div>
            <div class="row pdtop2p" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>General FeedBack</th>
                                <th>Action</th>
                            </tr>


                            <tr>
                                @foreach($project->MAssignedProjectFeedBack as $fb)
                                <td>{{$fb->MGeneralFeedBack->name}}</td>
                                <td>
                                    @if($fb->answer == "yes")
                                    {{$fb->answer}}
                                    @elseif($fb->answer=="no")
                                    {{$fb->answer}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

            {{-- Stakeholders --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt unerline">Stakeholders</h1>
                </div>
            </div>
            @if(isset($project->MExecutingStakeholder) && $project->MExecutingStakeholder!=null)
            <div class="row pdtop2p" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>Executing Stakeholder Dept.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Contact #</th>
                                <th>Email</th>
                            </tr>


                            @foreach ($project->MExecutingStakeholder as $Executing_S)
                            <tr>
                                <td>
                                    @if(isset($Executing_S->AssignedExecutingAgency) && $Executing_S->AssignedExecutingAgency !=null)
                                    {{$Executing_S->AssignedExecutingAgency->ExecutingAgency->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Executing_S->name) && $Executing_S->name!=null)
                                    {{$Executing_S->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Executing_S->designation) && $Executing_S->designation!=null)
                                    {{$Executing_S->designation}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Executing_S->contactNo) && $Executing_S->contactNo!=null)
                                    {{$Executing_S->contactNo}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Executing_S->email) && $Executing_S->email!=null)
                                    {{$Executing_S->email}}

                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($project->MSponsoringStakeholder) && $project->MSponsoringStakeholder!=null)
            <div class="row" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>Sponsoring Stakeholder Dept.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Contact #</th>
                                <th>Email</th>
                            </tr>


                            @foreach ($project->MSponsoringStakeholder as $Sponsoring_S)
                            <tr>
                                <td>
                                    @if(isset($Sponsoring_S->AssignedSponsoringAgency) && $Sponsoring_S->AssignedSponsoringAgency !=null)
                                    {{$Sponsoring_S->AssignedSponsoringAgency->SponsoringAgency->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Sponsoring_S->name) && $Sponsoring_S->name!=null)
                                    {{$Sponsoring_S->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Sponsoring_S->designation) && $Sponsoring_S->designation!=null)
                                    {{$Sponsoring_S->designation}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Sponsoring_S->contactNo) && $Sponsoring_S->contactNo!=null)
                                    {{$Sponsoring_S->contactNo}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Sponsoring_S->email) && $Sponsoring_S->email!=null)
                                    {{$Sponsoring_S->email}}

                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($project->MBeneficiaryStakeholder) && $project->MBeneficiaryStakeholder!=null)
            <div class="row" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">
                            <tr class="bglightblue black bold">
                                <th>Beneficiary Stakeholder Dept.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Contact #</th>
                                <th>Email</th>
                            </tr>

                            @foreach ($project->MBeneficiaryStakeholder as $Beneficiary_S)
                            <tr>
                                <td>
                                    @if(isset($Beneficiary_S->Beneficiary) && $Beneficiary_S->Beneficiary !=null)
                                    {{$Beneficiary_S->Beneficiary}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Beneficiary_S->name) && $Beneficiary_S->name!=null)
                                    {{$Beneficiary_S->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Beneficiary_S->designation) && $Beneficiary_S->designation!=null)
                                    {{$Beneficiary_S->designation}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Beneficiary_S->contactNo) && $Beneficiary_S->contactNo!=null)
                                    {{$Beneficiary_S->contactNo}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($Beneficiary_S->email) && $Beneficiary_S->email!=null)
                                    {{$Beneficiary_S->email}}

                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            @endif

            {{-- issues --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Issues</h1>
                </div>
            </div>
            <div class="row pdtop2p" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>Issues</th>
                                <th>Issue Type</th>
                                <th>Severity</th>
                                <th>Sponsoring Agency</th>
                                <th>Executing Agency</th>
                            </tr>


                            @foreach ($project->MAssignedProjectIssue as $ProjectIssue)
                            <tr>
                                <td>
                                    @if(isset($ProjectIssue->issue) && $ProjectIssue->issue !=null)
                                    {{$ProjectIssue->issue}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($ProjectIssue->MIssueType->name) && $ProjectIssue->MIssueType->name !=null)
                                    {{$ProjectIssue->MIssueType->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($ProjectIssue->severity) && $ProjectIssue->severity!=null)
                                    {{$ProjectIssue->severity}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($ProjectIssue->SponsoringAgency->name) && $ProjectIssue->SponsoringAgency->name!=null)
                                    {{$ProjectIssue->SponsoringAgency->name}}

                                    @endif
                                </td>
                                <td>
                                    @if(isset($ProjectIssue->ExecutingAgency->name) && $ProjectIssue->ExecutingAgency->name!=null)
                                    {{$ProjectIssue->ExecutingAgency->name}}

                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

            {{-- Health Safet Env --}}
            <div class="row breakpage pdtop3p" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Health Saftey Enviornment</h1>
                </div>
            </div>
            <div class="row pdtop2p" style="">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table  table-bordered nowrap">

                            <tr class="bglightblue black bold">
                                <th>Sr.</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Comments</th>
                            </tr>


                            @php
                            $i=1;
                            @endphp
                            @foreach($project->MAssignedProjectHealthSafety as $projecthealth)
                            <tr>
                                <td>
                                    {{$i}}
                                </td>
                                <td>
                                    @if(isset($projecthealth->MHealthSafety->description))
                                    {{$projecthealth->MHealthSafety->description}}

                                    @endif</td>
                                <td>@if($projecthealth->status==true)
                                    {{$projecthealth->status}}
                                    @elseif($projecthealth->status==false)
                                    {{$projecthealth->status}}

                                    @endif</td>
                                <td>@if(isset($projecthealth->remarks) && $projecthealth->remarks!=null)
                                    {{$projecthealth->remarks}}

                                    @endif</td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            {{--images--}}
            <div class="row" style="">
                <div class="col-md-12">
                    <h1 class="bluetxt underline">Images</h1>
                </div>
            </div>
            <div class="demo-gallery">
                <ul id="lightgallery" class="list-unstyled row">
                    <?php $i = 1; ?>
                    @foreach ($project->ReportImage->where('title_image',0) as $attachment)
                    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="" data-src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->MAppAttachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" data-sub-html="<h1>Date</h1><p>{{date('d M Y',strtotime($attachment->created_at))}} </p>">
                        <a href="">
                            <b class="float-left">#: {{$i++}}</b>
                            <img class="img-responsive" src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$attachment->m_project_progress_id.'/'.$attachment->MAppAttachment->project_attachement}}?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                            <b class="float-right" style="padding:0% 10%">Date: {{date('d M Y H:i:s',strtotime($attachment->created_at))}}<br> Location: ({{$attachment->MAppAttachment->longitude}},{{$attachment->MAppAttachment->latitude}})</b>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</body>

</html>