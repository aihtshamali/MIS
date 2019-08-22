<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring Summary Table | DGME</title>
    <link href="{{ asset('landingPage/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{asset('_monitoring/js/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('_monitoring/js/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
    <style>
        .themecolor {
            color: #687753;
        }

        .margin-top-3per {
            margin-top: 3%;
        }

        .margin-top-5per {
            margin-top: 5%;
        }

        .row {
            margin-right: 0px !improtant;
            margin-left: 0px !improtant;
        }

        .font-13 {
            font-size: 13px;
        }

        .font-14 {
            font-size: 14px;
        }

        .widthfull {
            width: 100%;
        }

        .toppaddinglogos {
            padding-top: 11px;
        }

        .red {
            background-color: #bf0000;
            color: #fde3e3;
            width: 150px !important;
        }

        .yellow {
            background-color: #e9e929;
            color: #801d1d;
            width: 150px !important;
        }

        .green {
            background-color: #0aa70a;
            color: #f7f7f7;
            width: 150px !important;
        }

        .container {
            margin-top: 2% !important;
        }

        .halfheight {
            height: 50%;
        }

        .fullheight {
            height: 100%;
        }

        body {
            overflow-x: hidden
        }

        .relativetable {
            width: 100%;
            overflow: auto;
        }

        .table thead th {
            vertical-align: -webkit-baseline-middle !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: transparent !important;
        }

        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding: 3px 0px !important;
        }

        table.table-bordered.dataTable th,
        table.table-bordered.dataTable td {
            vertical-align: -webkit-baseline-middle !important;
        }

        .bgsky {
            background: #87ceeb82;
            color: #000;
        }

        .bglightgreen {
            background: #c6f7caa3;
            color: #000;
        }

        .bggrey {
            background: #ededed;
            color: #000;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #959798;
        }

        small {
            font-size: 55% !important;
            font-weight: 600;
        }

        .margintopbottom {
            margin: 3% 0% !important;
        }

        .nobordertop {
            border-top: none !important;
        }

        .noborderbottom {
            border-bottom: none !important;
        }

        .lineheightzero {
            line-height: 0 !important;
        }

        .lineheightone {
            line-height: 1.2 !important;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 96% !important;
                margin: auto;
            }

            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before,
            table.dataTable thead .sorting_desc_disabled:after {
                bottom: 0 !important;
                right: 0 !important;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example_1').DataTable();
        })
    </script>
</head>

<body>
    <div class="margintopbottom">
        <div class="row col-md-12">
            <div class="col-md-3">
                <div class="col-md-6 offset-md-3 toppaddinglogos">
                    <img class="widthfull" id="logo" src="{{ asset('dgme.png')}}" alt="DGME Logo" />
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="themecolor text-center text-capitalize">
                    Directorate General Monitoring & Evaluation <br />
                    Planning & Development Board <br />
                    Government of the Punjab
                </h5>
            </div>
            <div class="row col-md-3 toppaddinglogos">
                <div class="col-md-8 offset-md-2">
                    <img class="widthfull" id="logo" src="{{ asset('ISO.jpg')}}" alt="ISO Logo" />
                </div>
            </div>
            <div class="col-md-12  text-center">
                <b class="col-md-12 font-14 text-capitalize">
                    Monitoring report of development projects for Quarter {{date('M -', strtotime('-2 months'))}} {{date('M, Y')}}
                </b>
            </div>
            <div class="col-md-12 text-center">
                <table id="example" class="table table-striped table-bordered" data-page-length="10000" style="width:100%">
                    <thead>
                        <tr class="bggrey">
                            <th colspan="9" class="text-center">SUMMARY</th>
                        </tr>
                        <tr>
                            <th class="bggrey">Sr #.</th>
                            <th class="bggrey">Sectors</th>
                            <th class="bggrey">Sub-Sectors</th>
                            <th class="bggrey">Reports Issued By DGM&E<br /><small>No.</small></th>
                            <th class="bggrey">Total Cost Of Projects <br /><small>(Rs. Millions)</small></th>
                            <th class="bggrey">Locations<br /><small>Division Wise</small></th>
                            <th class="red">Project In Critical Phase<br /><small>No.</small></th>
                            <th class="yellow">Projects Need Consideration<br /><small>No.</small></th>
                            <th class="green">Projects within Defined Limits<br /><small>No.</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>pdkefj9rn plcmwof</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td>0</td>
                            <td>0</td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-12 row margin-top-3per">
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Critical Projects:</div>
                    <div class="col-md-2 red fullheight text-center"><b>15</b></div>
                </div>
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Projects Need Consideration:</div>
                    <div class="col-md-2 yellow fullheight text-center"><b>12</b></div>
                </div>
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Projects within Defined Limits:</div>
                    <div class="col-md-2 green fullheight text-center"><b>12</b></div>
                </div>
            </div>
            <div class="col-md-12 row margin-top-3per" style="padding: 0% 3%;">
                <h5>Note:</h5>
                <div class="col-md-12 row">
                    <div class="col-md-11 ">
                        <b> If difference between Planned and Achieved Progress is greater by more than 20%, the Project is "Critical"</b>
                    </div>
                    <div class="col-md-1 red "></div>
                    <div class="col-md-11 ">
                        <b> If difference of Planned & Achieved Progress is between 10% and 20%, the Project "Need Consideration"</b>
                    </div>
                    <div class="col-md-1 yellow "></div>
                    <div class="col-md-11 ">
                        <b> If difference of Planned & Achieved Progress is less than 10%, the Project is "With in Defined Limits"</b>
                    </div>
                    <div class="col-md-1 green "></div>
                </div>
            </div>
            <div class="relativetable margin-top-3per col-md-12 text-center">
                <table id="example_1" data-page-length="10000" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="">
                            <th colspan="5" class="bgsky text-center">Project Information</th>
                            <th colspan="4" class="bgsky text-center">Cost</th>
                            <th colspan="2" class="bgsky text-center">Time</th>
                            <th colspan="2" class="bgsky text-center">Scope</th>
                            <th class="bglightgreen noborderbottom"></th>
                        </tr>
                        <tr class="bglightgreen">
                            <th>Sr #.</th>
                            <th>GS Number</th>
                            <th>Project Name</th>
                            <th>Sub Sectors</th>
                            <th>District</th>
                            <th>Final PC-I Approved Cost<br /><small>Rs. Million</small></th>
                            <th>Released <br /> <small>Rs. Million</small></th>
                            <th>Utilized <br /> <small>Rs. Million</small></th>
                            <th>% Financial Progress<br /><small>(Against PC-I Cost)</small></th>
                            <th>Planned Start</th>
                            <th>Planned End</th>
                            <th colspan="2"> Physical Progress (%)</th>
                            <th style="width:5% !important" class="nobordertop noborderbottom">Status</th>
                        </tr>
                        <tr class="bglightgreen">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lineheightzero"><small class="lineheightone">[Col. H / F x 100]</small></th>
                            <th class="lineheightzero"><small class="lineheightone">Date</small></th>
                            <th class="lineheightzero"><small class="lineheightone">Date</small></th>
                            <th class="lineheightzero"><small class="lineheightone">Planned (Againt<br />Duration of Project)</small></th>
                            <th class="lineheightzero"><small class="lineheightone">Achieved<br />(As per Actual)</small></th>
                            <th class="nobordertop"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                            <td>fkowhdi</td>
                            <td class="red"></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                            <td>fkowhdi</td>
                            <td class="green"></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                            <td>fkowhdi</td>
                            <td class="red"></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                            <td>fkowhdi</td>
                            <td class="yellow"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>