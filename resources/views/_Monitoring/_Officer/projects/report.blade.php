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
        body{
             
                background:white;
        }
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

        /* .report-logo {
            height: 80% !important;
        } */

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
            top: 3% !important;
            right: 0% !important;
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

        .pdt3p {
            padding-top: 3% !important;
        }

        .breakpage p {
            border: 1px solid #777 !important;
            padding: 1%;
            min-height: 100px;
        }

            {
            background: #999;
        }

        .row .col-md-6,
        .row .col-md-12 {
            padding: 1%;
            border: 1px solid #999;
        }

        .graphHeader {
            border: 1px solid;
            width: fit-content;
            margin: auto;
            padding: 1% 0.5%;
        }
        .rem{
            height: 20px;
            width: 20px;
            background:#a64c4c;
            display:inline-block;
            vertical-align: middle;
        }
        .fcost{
            margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#8bc34a;
            display:inline-block;
            vertical-align: middle;
        }
        .planned{
            height: 20px;
            width: 20px;
            background:#f44336;
            display:inline-block;
            vertical-align: middle;
        }
        .achieved{
            margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#e91e63;
            display:inline-block;
            vertical-align: middle;
        }
        .variance{
            margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#9c27b0;
            display:inline-block;
            vertical-align: middle;
        }
        .approvedPC1Cost{
             /* margin-left: 5%; */
            height: 20px;
            width: 20px;
            background:#5075e5;
            display:inline-block;
            vertical-align: middle;
        }
        .TU{
            margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#b366b3;
            display:inline-block;
            vertical-align: middle;
        }
        .TR{
            margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#8bc34a;
            display:inline-block;
            vertical-align: middle;
        }
        .RC{
           margin-left: 5%;
            height: 20px;
            width: 20px;
            background:#a64c4c;
            display:inline-block;
            vertical-align: middle;  
        }
        table {
            margin-top: 3%;
        }

        th,
        td {
            border: 1px solid #999;
        }

        .border {
            border: 1px solid #999;
        }
        

        #chartdivprogressgraphs {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 600px;
                height: 400px;
            }
            #chartdiv_FinancialprogressCost{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 1000px;
                height: 400px;
            }
            #chartdiv_FinancialprogressReleases{

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 1000px;
                height: 400px;
            }
            #chartFinancialProgressagainstallocation{
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 800px;
                height: 400px;
            }

        @media print {
            @page {
                counter-increment: page;
                counter-reset: page 1;
                size: auto;
                margin: 10% !important;

                @top-right {
                    content: "Page "counter(page) " of "counter(pages);
                }
            }

            body {
                background:white;
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

            .printborder {
                border: 1px solid #777;
                padding: 3%;
            }

            .mainpage {
                /* width: 100%; */
                /* height: -webkit-fill-available; */
                /* border: 1px solid #777; */
            }

            .breakpage {
                page-break-before: always !important;
                padding: 1%;
                height: 100%;
            }

            .breakpage p {
                border: none ! !important;
                padding: 1%;
                height: -webkit-fill-available;
            }

            .redTxt {
                color: red
            }
           
             #chartdivprogressgraphs {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 600px;
                height: 400px;
            }
            #chartdiv_FinancialprogressCost{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 1000px;
                height: 400px;
                
            }
            #chartdiv_FinancialprogressReleases{

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 1000px;
                height: 400px;
            }
            #chartFinancialProgressagainstallocation{
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
             "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                width: 1050px;
                height: 400px;
            }
            .borderprint{
                border:2px solid #000;
            }
            .fullheightprint{
                height: 100% !important;
            }
            .margtopprintmain{
                margin-top:12% !important;
            }
            .noprintborder{border:none !important;}
            .bggradient{background:#418641 !improtant;background-image: linear-gradient(to right, #418641, #418641, #fff) !important;color:#fff}
            /* .absolutebottom{position: absolute;bottom: :0 !important;width:100% !important;} */
           table tr td{padding: 3% !important;width: 45% !important;}
           .paddingtopprint{padding-top:2%;}
            
        }
    </style>
    <script src="{{asset('lightRoom/picturefill.min.js')}}"></script>
    <script src="{{asset('lightRoom/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('_monitoring/js/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('_monitoring/js/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });
    </script>
</head>
@php
function getSeverity($num){
switch($num){
case '1':
return 'Very High';
case '2':
return 'High';
case '3':
return 'Medium';
case '4':
return 'Low';
case '5':
return 'Very Low';
default :
return 'Unknown';
}
}
@endphp

<body>
    <div class="topbtnparentwidth fixbtns">
        <!-- <button type="button" name="exp_button" class="topbtns exp_button btn btn-md" onclick="Export2Doc('exportContent');">
            Download Document
        </button> -->
        <button class="topbtns btn btn-md" onclick="window.print()">
            Save as PDF
        </button>
        {{-- <a class="topbtns btn btn-md" href="{{ route('generatePDF',['download'=>'pdf']) }}">Download PDF</a> --}}
    </div>
    <div class="card" id='exportContent'>
        <!-- myCode start here -->
        <div class="mainpage col-md-12 fullheightprint borderprint paddingtopprint">
            <div class="headerNew col-md-12">
                <div class="clearfix headerLogoNew">
                    <center>
                        <img src="{{asset('dgme.png')}}" id="dgmelogo" class="report-logo" alt="">
                        <h4>
                            <i>
                                Monitoring Report on the Project
                            </i>
                        </h4>
                        <h4>
                            {{$project->AssignedProject->Project->title}}
                        </h4>
                    </center>
                </div>
                @if (count($project->ReportImage->where('title_image',1)))
                <div class="col-md-12 fullwidthprint">
                    <img src="{{'http://172.16.10.14/storage/uploads/monitoring/'.$project->id.'/'.$project->ReportImage->where('title_image',1)->first()->MAppAttachment->project_attachement}}" alt="title image" class="mainpageimg pdtop1p" style="width: 90% !important;margin-left: 5% !important;max-height: 500px;">
                </div>
                @endif
                <h4 class="margtopprintmain">
                    <center>
                        DIRECTORATE GENERAL MONITORING & EVALUATION <br>
                        PLANNING & DEVELOPMENT DEPARTMENT<br>
                        GOVERNMENT OF THE PUNJAB
                    </center>
                </h4>
                <h4 class="text-capitalize margtopprintmain">
                    <center>
                        October , 2018
                    </center>
                </h4>
                <div class="fullwidthprint margtopprintmain bggradient">
                    <center>
                        <h4 class="text-capitalize printborder ">
                            DGM&E, 65-Trade center Block, M.A Johar Town, Lahore – Punjab
                        </h4>
                    </center>
                </div>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                1. History
            </h4>
            <p class="textarea col-md-12 grey" contenteditable="true">

            </p>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                2. PROJECT DATA (Sheet (12pt font size, Justified, Time new )
            </h4>
            <div class="table-responsive">
                  <table id="" dclass="table table-bordered ">
                      {{-- <thead>
                            <tr>
                                <th></th>
                                <th>Project Title</th>
                                <th>Project GS.No</th>
                                <th>Department</th>
                                <th>Sponsoring Agency/Department</th>
                                <th>Executing Agency/Department</th>
                                <th>O&M Agency/Department</th>
                                <th>Project Location</th>
                                <th>Status of Project w.r.t. Actual progress against Financial Progress</th>
                                <th> Status of Project w.r.t. Actual Vs Planned Progress</th>
                                <th>Approval Date </th>
                                <th>No. of Revisions</th>
                                <th>Project Gestation Period</th>
                            </tr>
                      </thead> --}}
                      <tbody>
                            <tr>
                                <td>Sr</td>
                                <td>1</td>
                            </tr>
                            <tr> 
                                <td>Project Title</td>
                                <td>{{$project->AssignedProject->Project->title}}</td>
                            </tr>
                             <tr>
                                <td>ADP Number</td> 
                                <td>{{$project->AssignedProject->Project->ADP}}</td>
                            </tr>
                              <tr>
                                  <td>Department</td>
                                   <td>Not implemented</td>
                                </tr>
                               <tr>
                                   <td>Sponsoring Agency/Department</td>
                                    <td>Not implemented</td>
                                </tr>
                                <tr>
                                    <td>Executing Agency/Department</td>
                                     <td>Not implemented</td>
                                </tr>
                                 <tr>
                                     <td>O&M Agency/Department</td>
                                     <td>Not implemented</td>
                                </tr>
                                <tr> 
                                     <td>Project Location</td>
                                    <td>  @foreach ($project->AssignedProject->Project->AssignedDistricts as $district)
                                        {{$district->District->name}}
                                    @endforeach</td>
                                </tr>
                                <tr>
                                  <td>Status of Project w.r.t. Actual progress against Financial Progress</td>
                                   <td>Not implemented</td>
                                </tr>
                               <tr>
                                   <td>Status of Project w.r.t. Actual Vs Planned Progress</td>
                                    <td>Not implemented</td>
                                </tr>
                                <tr>
                                    <td>Approval Date</td>
                                     <td>Not implemented</td>
                                </tr>
                                 <tr>
                                     <td>No. of Revisions</td>
                                     <td>Not implemented</td>
                                </tr>
                                  <tr>
                                     <td>Gestation Period</td>
                                     <td>Not implemented</td>
                                </tr>
                      </tbody>
                    </table>
            </div>

            {{-- <div class="row col-md-12 fullwidthprint">
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>1. Project Title :</b></div>
                    <div class="col-md-8">{{$project->AssignedProject->Project->title}}</div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 row">
                        <div class="col-md-4 prolable"><b>Project GS.No:</b></div>
                        <div class="col-md-8">{{$project->AssignedProject->Project->ADP}}</div>
                    </div>
                    <div class="col-md-4 row">
                        <div class="col-md-4 prolable"><b>Sector :</b></div>
                        <div class="col-md-8"></div>
                    </div>
                    <div class="col-md-4 row">
                        <div class="col-md-4 prolable"><b>Sub-Sector:</b></div>
                        <div class="col-md-8"></div>
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>2. Sponsoring Agency/Department:</b></div>
                    <div class="col-md-8"></div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>3. Executing Agency/Department:</b></div>
                    <div class="col-md-8"></div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>4. O&M Agency/Department:</b></div>
                    <div class="col-md-8"></div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>5. Project Location:</b></div>
                    <div class="col-md-8">
                        @foreach ($project->AssignedProject->Project->AssignedDistricts as $district)
                        {{$district->District->name}},
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>6. Status of Project with respect to Actual progress against Financial Progress:</b></div>
                    <div class="col-md-8">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4 prolable"><b>7. Status of Project with respect to Actual Vs Planned Progress:</b></div>
                    <div class="col-md-8">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-4">
                        <div class="col-md-4 prolable"><b>8. Approval Date:</b></div>
                        <div class="col-md-8">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-4 prolable"><b> No. of Revisions:</b></div>
                        <div class="col-md-8">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 prolable"><b> Project Gestation Period:</b></div>
                    <div class="col-md-8">
                    </div>
                </div>

            </div> --}}
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                9. PROJECT SCHEDULE DETAIL:
            </h4>
            <b>
                Overall Physical progress against Planned Progress with respect to time and over all project approved PC-I cost;<br /><br /><br />
            </b>
            <div class="row">
                 <div class="col-md-12">
                 <center class="">
                   <b>  Over all physical progress of the project aginst allocated scope or work</b>
                </center>
                <center class="">
                   <div id="chartdivprogressgraphs"></div>
                </center>
                 </div>
            </div>
            <table class="col-md-12">
                <tr>
                    <th>Planned Start Date as per PC-I</th>
                    <th>Planned End Date as per Latest PC-I</th>
                    <th>Actual Start Date (Award of contract)</th>
                    <th>Date of Visit</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="clearfix row col-md-12">
                <div class="col-md-5 border">
                    Are project activities going as per scheduled time?
                    Yes or No
                </div>
                <div class="col-md-6">
                    If yes (Reasons for any deviation in timeline from original time)
                </div>
            </div>
            <div class="clearfix row col-md-12">
                <div class="col-md-12 border">
                    Did the project team provided any approved baseline schedule?
                </div>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                10. Project Cost Details:
            </h4>
            <table class="col-md-12">
                <tr>
                    <th>PC-1 Original Cost</th>
                    <th>Final Revised Cost (If any)</th>
                    <th>Funds Released</th>
                    <th>Funds Utilized</th>
                    <th>% Financial Utilization (With Respect to Releases)</th>
                    <th>% Financial Utilization (With Respect to PC-I Cost)</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="clearfix row col-md-12">
                <div class="col-md-5 border">
                    Funds released according to the allocation
                </div>
                <div class="col-md-6">
                    Yes or No
                </div>
            </div>
            <div class="clearfix row col-md-12">
                <div class="col-md-5 border">
                    Cost Variation
                </div>
                <div class="col-md-6">
                    Yes or No
                </div>
            </div>
            <div class="clearfix row col-md-12">
                <div class="col-md-5 border">
                    Is escalation being paid to contractor? (in case of Capital only)
                </div>
                <div class="col-md-6">
                    Yes or No
                </div>
            </div>
            <div class="clearfix row col-md-12 border">
                <div class="col-md-5 border">
                    If Yes, how much cost escalation has so far been paid?
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="col-md-12">
                Based on the data provided, [% Financial Utilization (With Respect to PC-I Cost] project budget has been utilized against the total project cost, whereas the Rs [Funds Utilized] Million were utilized in the project against release of Rs. [Funds Released] Million starting form [ Planned Start Date]
            </div>
            <b>
                Overall Physical progress against Planned Progress with respect to time and over all project approved PC-I cost;<br /><br /><br />
            </b>
            <div class="row">
                <div class="col-md-12">
                <center >
                    <b>Financial Progress Chart Against Overall Project Approved Cost</b>
                     <br>
                </center>
                    <div class="">
                    <div id="chartdiv_FinancialprogressCost"></div>
                    </div>
                </div>
            </div>
             <hr style="border: transparent;">
            <div class="row">
                <div class="col-md-12">
                    <center class="text-center">
                         <b>Financial Progress Chart Against Releases</b>  <br>
                    </center> 
                    <div class="">
                    <div id="chartdiv_FinancialprogressReleases"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                11. Project Objectives:
            </h4>
            <div class="col-md-12">
                <table class="col-md-12">
                    <tr>
                        <th>Overall Project Objectives</th>
                        <th colspan="4">Achieved (100%) Partially Achieved (50%) Not Achieved ('<'50%)</th> </tr> <tr>
                        <th></th>
                        <th colspan="3">Results</th>
                        <th>Justification</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>A</th>
                        <th>PA</th>
                        <th>NA</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                12. Physical Targets and Performance:
            </h4>
            <div class="col-md-12">
                <table class="col-md-12">
                    <tr>
                        <th>Sr. No</th>
                        <th>WBS Component</th>
                        <th>Physical Progress (%)</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>Overall Progress</td>
                        <td>Out of 100%</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                13. Quality of the Project Activities
            </h4>
            <div class="col-md-12">
                <table class="col-md-12">
                    <tr>
                        <th colspan="3">Quality of Procurement (if any) (NA)</th>
                    </tr>
                    <tr>
                        <th>poor:</th>
                        <th>Good:</th>
                        <th>Excellent:</th>
                    </tr>
                </table>
                <table class="col-md-12">
                    <tr>
                        <th colspan="4">Quality of Civil Works (if any)</th>
                    </tr>
                    <tr>
                        <th>poor:</th>
                        <th>Average:</th>
                        <th>Good:</th>
                        <th>Excellent:</th>
                    </tr>
                </table>
                <table class="col-md-12">
                    <tr>
                        <th colspan="4">Quality of operation and project implementation (NA)</th>
                    </tr>
                    <tr>
                        <th>poor:</th>
                        <th>Average:</th>
                        <th>Good:</th>
                        <th>Excellent:</th>
                    </tr>
                </table>
            </div>

            <div class="col-md-12 row">
                <div class="col-md-4 prolable"><b>14. Project Beneficiaries:</b></div>
                <div class="col-md-8">
                </div>
            </div>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                15. Risk and Constraints:
            </h4>
            <table class="col-md-12">
                <tr>
                    <th>Risks and Constraints</th>
                    <th>Impact<small>(Low, Medium, High)</small>:</th>
                    <th>Probable Results</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                16. Human Resource:
            </h4>
            1. Was there any qualified PEC registered engineer at site by the Contractor?<br />
            2. Was the human resource of resident supervision consultant available at project site during visit if DGM&E team? (if yes add team)

        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                17. Project Stakeholders Interviewed:
            </h4>
            <table class="col-md-12">
                <tr>
                    <th>Project Stakeholders Interviewed: Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Contact No.</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                18. Monitoring Team:
            </h4>
            <table class="col-md-12">
                <tr>
                    <th>NAme</th>
                    <th>Designation.</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                19. Financial Summary:
            </h4>

            <b>
                Up till now total expenditure of Rs. ____ Million has been incurred against the total release of Rs.<br /><br /><br />
            </b>
            <div class="row">
                <div class="col-md-12">
                    <center class="">
                    <b> Financial progress chart against allocations by sponsoring agency (2014 to 2018)</b>
                    </center>
                    
                    <center class="">
                        <div id="chartFinancialProgressagainstallocation"></div>
                    </center>
                </div>
            </div>
            <table class="col-md-12">
                <tr>
                    <th>Year</th>
                    <th>Allocation (M)</th>
                    <th>Releases (M)</th>
                    <th>Expenditure (M)</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                20. Project Contract Summary:
            </h4>
            The detail of project brief is given below;
            <table class="col-md-12">
                <tr>
                    <th>Description</th>
                    <th>Agreement Amount(M)</th>
                    <th>Name of Supplier/ Contractor</th>
                    <th>Start Date of work</th>
                    <th>Expected Completion Date of work</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                1. History
            </h4>
            <p class="col-md-12 grey">

            </p>
        </div>
        <div class="clearfix breakpage ">
            <h4 class="redTxt">
                21. RECOMMENDATIONS
            </h4>
            <p class="col-md-12 grey">
                 Recomendation       
            </p>
        </div>
    </div>

    <div>
        <!-- <button class="btn btn-success" type="button" onclick="save_report_data()">SAVE Report Data</button> -->
    </div>
   
</body>
<script src="{{asset('js/charts/amcharts.js')}}"></script>
<script src="{{asset('js/charts/serial.js')}}"></script>
<script src="{{asset('js/charts/light.js')}}"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>

<script>
    var chart = AmCharts.makeChart("chartdiv_FinancialprogressReleases", {
    "type": "pie",
    "theme": "light",
     "legend": {
     "position": "absolute",
    "align":"center",
    "marginRight": 100,
    "autoMargins": false
     },
    "dataProvider": [{
        "financial_status": "Financial Cost",
        "value": 30,
         "color": "#00bcd4"
    }, {
        "financial_status": "Remainig Cost",
        "value": 71,
        "color": "#8bc34a"
    }],
    "valueField": "value",
    "titleField": "financial_status",
    "colorField": "color",
    "balloon": {
        "fixedPosition": true
    }
    });
</script>
<script>
    var chart = AmCharts.makeChart("chartdiv_FinancialprogressCost", {
  "type": "pie",
    "theme": "light",
     "legend": {
    "position": "absolute",
    "align":"center",
    "marginRight": 100,
    "autoMargins": false
  },
    "dataProvider": [{
        "financial_status": "Financial Cost",
        "value": 30,
        "color": "#00bcd4"
    }, {
        "financial_status": "Remainig Cost",
        "value": 70,
       "color": "#8bc34a"
    }],
    "valueField": "value",
    "titleField": "financial_status",
    "colorField": "color",
    "balloon": {
        "fixedPosition": true
                }
             

    });
    // chart.legend = new AmCharts.Legend();
</script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/material.js"></script>

<script>

    // Themes begin
    am4core.useTheme(am4themes_material);
    // Themes end

    var chart = am4core.create("chartFinancialProgressagainstallocation", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

    chart.data = [{
    "Type": "Approved PC-1 Cost",
    "value": 1700,
     "color": "#5075e5"
     
    }, {
    "Type": "Total Release",
    "value": 500,
     "color": "#8bc34a"
    }, {
    "Type": "Total Utilization",
    "value": 600,
     "color": "#b366b3"
    }, {
    "Type": "Remaining Cost",
    "value": 1322,
     "color": "#a64c4c"
    }];

        // X axis
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "Type";
        categoryAxis.renderer.minGridDistance = 20;
        categoryAxis.title.text="[bold]Financial Status"; 
        
        // Y axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.title.text = "[bold]Amount In Millions";
        valueAxis.calculateTotals = true;
        valueAxis.min = 0;
        valueAxis.max = 2500;
        valueAxis.strictMinMax = true;

        // Chart series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "Type";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value} Millions";
        series.columns.template.strokeOpacity = 0;
        series.columns.template.tension = 1;
        series.columns.template.width = am4core.percent(40);
        series.columns.template.fillOpacity = 0.75;

        // Hover
        var hoverState = series.columns.template.states.create("hover");
        hoverState.properties.fillOpacity = 1;
        hoverState.properties.tension = 0.8;

        // chart cursor   
        chart.cursor = new am4charts.XYCursor();

        // legends
        var legend = new am4charts.Legend();
        legend.parent = chart.chartContainer;
        // legend.background.fill = am4core.color("#000");
        // legend.background.fillOpacity = 0.05;
        // legend.width = 120;f44336 ,#e91e63,#9c27b0
        legend.align = "top";
        legend.data = [{
         "name": "Approved PC-1 Cost",
         "fill":"#00bcd4"
     
    }, {
    "name": "Total Release",
    "fill":"#009688"
        }, {
        "name": "Total Utilization",
        "fill":"#4caf50"
        }, {
        "name": "Remaining Cost",
    "fill":"#8bc34a"
            }];

        // Add distinctive colors for each column using adapter
        series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index+7);
        });
        // chart.scrollbarX = new am4core.Scrollbar();
        // chart.scrollbarY = new am4core.Scrollbar();

</script> 

<script>

    // Themes begin
    am4core.useTheme(am4themes_material);
    // Themes end

    var chart = am4core.create("chartdivprogressgraphs", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect
    
    chart.data = [{
    "progress": "Planned Progress",
    "value": 30.2
    }, {
    "progress": "Achieved Progress",
    "value": 18.5
    }, {
    "progress": "Variance",
    "value": -18.4
    }];

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "progress";
        categoryAxis.renderer.minGridDistance = 40;
        categoryAxis.title.text="[bold]Progress"

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.title.text="[bold] Progress Percentages"


        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "progress";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value}%"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.tension = 1;
        series.columns.template.width = am4core.percent(40);
        series.columns.template.fillOpacity = 0.75;

        var hoverState = series.columns.template.states.create("hover");
        hoverState.properties.fillOpacity = 1;
        hoverState.properties.tension = 0.8;

        chart.cursor = new am4charts.XYCursor();
        var legend = new am4charts.Legend();
        legend.parent = chart.chartContainer;
        // legend.background.fill = am4core.color("#000");
        // legend.background.fillOpacity = 0.05;
        // legend.width = 120;f44336 ,#e91e63,#9c27b0
        legend.align = "top";
        legend.data = [{
        "name": "Planned Progress",
        "fill":"#f44336"
        }, {
        "name": "Achieved Progress",
        "fill": "#e91e63"
        }, {
        "name": "Variance",
        "fill": "#9c27b0"
        }];
        // Add distinctive colors for each column using adapter
        series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
        });
        // chart.scrollbarX = new am4core.Scrollbar();
        // chart.scrollbarY = new am4core.Scrollbar();

</script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
<script>
    $(document).ready(function() {
        var first_val = $("#planned_start_date").text();
        var second_val = $("#planned_end_date").text();
        var first = first_val.split('-');
        var second = second_val.split('-');
        var year = second[0] - first[0];
        var month = Math.abs(second[1] - first[1]);
        var days = Math.abs(second[2] - first[2]);
        $("td.gestation_period_column").text(year + " Years " + month + " Months " + days + " Days");
    });
</script>
<script>
    $(document).ready(function() {
        var first_val = $("#planned_start_date").text();
        var second_val = $("#planned_end_date").text();
        var first = first_val.split('-');
        var second = second_val.split('-');
        var year = second[0] - first[0];
        var month = Math.abs(second[1] - first[1]);
        var days = Math.abs(second[2] - first[2]);
        $("td.gestation_period_column").text(year + " Years " + month + " Months " + days + " Days");
    });
    CKEDITOR.inlineAll();
    CKEDITOR.instances.block1.on('blur', function(evt) {
        // getData() returns CKEditor's HTML content.
        axios.post('/save_report_data', {
                block: 'block1',
                project: project_id,
                data: evt.editor.getData()
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
        // console.log(evt.editor.getData());
    });
    CKEDITOR.instances.block2.on('blur', function(evt) {
        // getData() returns CKEditor's HTML content.
        axios.post('/save_report_data', {
                block: 'block2',
                project: project_id,
                data: evt.editor.getData()
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
    });
    CKEDITOR.instances.block3.on('blur', function(evt) {
        // getData() returns CKEditor's HTML content.
        axios.post('/save_report_data', {
                block: 'block3',
                project: project_id,
                data: evt.editor.getData()
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
    });
    CKEDITOR.instances.block4.on('blur', function(evt) {
        // getData() returns CKEditor's HTML content.
        axios.post('/save_report_data', {
                block: 'block4',
                project: project_id,
                data: evt.editor.getData()
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
    });
    CKEDITOR.instances.block5.on('blur', function(evt) {
        // getData() returns CKEditor's HTML content.
        axios.post('/save_report_data', {
                block: 'block5',
                project: project_id,
                data: evt.editor.getData()
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
    });
</script>
<script>
    function Export2Doc(element, filename = '') {
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + document.getElementById(element).innerHTML + postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

        // Specify file name
        filename = filename ? filename + '.doc' : 'document.doc';

        // Create download link element
        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = url;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);

    }
</script>
</html>
@section("js_scripts")


@endsection