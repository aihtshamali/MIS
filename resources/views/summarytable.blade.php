<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                bottom: -0.1em !important;
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
    <div class="container">
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
                <b class="col-md-12 font-14">
                    Monitoring report of developmnt projects for Quarter April-June, 2019
                </b>
            </div>
            <div class="col-md-12 text-center">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="9" class="text-center">SUMMARY</th>
                        </tr>
                        <tr>
                            <th>Sr #.</th>
                            <th>Sectors</th>
                            <th>Sub-Sectos</th>
                            <th>Reports Issued By DGM&E<br /><small>No.</small></th>
                            <th>Total Cost Of Projects <br /><small>(Rs. Millions)</small></th>
                            <th>Locations<br /><small>Division Wise</small></th>
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
                </table>
            </div>
            <div class="col-md-12 row margin-top-3per">
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Critical Projects:</div>
                    <div class="col-md-2 red fullheight"></div>
                </div>
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Projects Need Consideration:</div>
                    <div class="col-md-2 yellow fullheight"></div>
                </div>
                <div class="col-md-4 row">
                    <div class="col-md-10 text-right">Projects within Defined Limits:</div>
                    <div class="col-md-2 green fullheight"></div>
                </div>
            </div>
            <div class="col-md-12 row margin-top-3per">
                <h5>Note:</h5>
                <div class="col-md-12 row">
                    <div class="col-md-11 ">
                        <b>If Difference of Financial Progress is greater than Physical Progress by more than 20%, the Project is "Critical"</b>
                    </div>
                    <div class="col-md-1 red "></div>
                    <div class="col-md-11 ">
                        <b> If Difference of Physical & Financial Progress is between 10% and 20%, the Project "Need Consideration"</b>
                    </div>
                    <div class="col-md-1 yellow "></div>
                    <div class="col-md-11 ">
                        <b> If Difference of Physical & Financial Progress is less than 10%, the Project is "With in Defined Limits"</b>
                    </div>
                    <div class="col-md-1 green "></div>
                </div>
            </div>
            <div class="relativetable margin-top-3per col-md-12 text-center">
                <table id="example_1" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Project Information</th>
                            <th colspan="5" class="text-center">Cost</th>
                            <th colspan="2" class="text-center">Time</th>
                            <th colspan="2" class="text-center">Scoppe</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Sr #.</th>
                            <th>GS #.</th>
                            <th>Project Name</th>
                            <th>Sub Sectors</th>
                            <th>District</th>
                            <th>Final PC-I Approved Cost<br/><small>Rs. Million</small></th>
                            <th>Released <br/> <small>Rs. Million</small></th>
                            <th>Utilized <br/> <small>Rs. Million</small></th>
                            <th>% Financial Progress (Against Releases)</th>
                            <th>Planned Start</th>
                            <th>Gestation Period</th>
                            <th colspan="2"> Physical Progress (%)</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><small>Date</small></th>
                            <th><small>Year</small></th>
                            <th><small>Planned</small></th>
                            <th><small>Archived</small></th>
                            <th></th>
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
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
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
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
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
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
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
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                            <td>fkowhdi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>