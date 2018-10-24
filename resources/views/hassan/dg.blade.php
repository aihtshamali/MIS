@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  {{-- <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}"> --}}
  <style>
    .pt-3-half {
        padding-top: 1.4rem;
    }
  </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Approve / Reject Trip
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
            <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
    
            </ol>
        </section>

        <section class="content col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Summary</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Project: </label> Construction of VMIS By Hassan</div>
                        {{-- <div class="form-group">
                            <label>Location: </label> Some reason i don't know yet
                        </div> --}}
                        <div class="form-group">
                            <label>Officers</label>
                            <select name="reason" id="reason" class="form-control select2" multiple="multiple" style="width: 100%;">
                                {{-- <option >Select Reason For Visit</option> --}}
                                <option value="Monitoring" selected="selected">Hassan Ali</option>
                                <option value="Evaluation" selected="selected">Anum Khalid</option>
                                <option value="Meeting">Ali Dogar</option>
                                <option value="Other" >Anas Majeed</option>
                            </select>
                        </div>
                        {{-- <div class="form-group" id='bd'>
                            <label>Brief Description</label>
                            <input type="text" class="form-control" id="purpose" placeholder="Enter purpose for the trip">
                        </div> --}}

                        {{-- EDITABLE TABLE --}}
                        
                        <!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Trip Plan</h3>
    <div class="card-body">
      <div id="table" class="table-editable">
        
        <table class="table table-bordered table-responsive-md table-striped text-center">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Date</th>
            <th class="text-center">Departure</th>
            <th class="text-center">Arrival</th>
            <th class="text-center">Night Stay</th>
            <th>
                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x"
                        aria-hidden="true"></i></a></span>
            </th>
          </tr>
          <tr>
            <td class="pt-3-half" contenteditable="true">1</td>
            <td class="pt-3-half" contenteditable="true">30/10/18</td>
            <td class="pt-3-half" contenteditable="true">Lahore</td>
            <td class="pt-3-half" contenteditable="true">Spain</td>
            <td class="pt-3-half" contenteditable="true">Spain</td>
            <td>
              <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr>
            <td class="pt-3-half" contenteditable="true">2</td>
            <td class="pt-3-half" contenteditable="true">1/11/18</td>
            <td class="pt-3-half" contenteditable="true">Spain</td>
            <td class="pt-3-half" contenteditable="true">Qatar</td>
            <td class="pt-3-half" contenteditable="true">Qatar</td>
            <td>
              <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr>
            <td class="pt-3-half" contenteditable="true">3</td>
            <td class="pt-3-half" contenteditable="true">3/11/18</td>
            <td class="pt-3-half" contenteditable="true">Qatar</td>
            <td class="pt-3-half" contenteditable="true">Lahore</td>
            <td class="pt-3-half" contenteditable="true">-</td>
            <td>
              <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr class="hide">
            <td class="pt-3-half" contenteditable="true">3</td>
            <td class="pt-3-half" contenteditable="true">3/11/18</td>
            <td class="pt-3-half" contenteditable="true">Qatar</td>
            <td class="pt-3-half" contenteditable="true">Lahore</td>
            <td class="pt-3-half" contenteditable="true">-</td>
            <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
            </td>
        </tr>
        </table>
      </div>
    </div>
  </div>
  
  <!-- Editable table -->
                        
                        {{-- END --}}

                        {{-- <div class="box-header with-border">
                                <h3 class="box-title">Trip Plan</h3>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Date</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Night Stay</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>10-9-18</td>
                                    <td>Lahore</td>
                                    <td>Bahawalnager</td>
                                    <td>Bahawalnager</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>11-9-18</td>
                                    <td>Bahawalnager</td>
                                    <td>Okara</td>
                                    <td>Okara</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>12-9-18</td>
                                    <td>Okara</td>
                                    <td>Lahore</td>
                                    <td>-</td>
                                </tr>
                            </table> --}}
                            <div class="form-group">
                                <label>Vehicle</label>
                                <select name="reason" id="reason" class="form-control select2" style="width: 100%;">
                                    {{-- <option >Select Reason For Visit</option> --}}
                                    <option value="Monitoring" >Vego</option>
                                    <option value="Evaluation" selected="selected">Cultus</option>
                                    <option value="Meeting" disabled>Corrolla</option>
                                    <option value="Other" >Vego 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Driver</label>
                                <select name="reason" id="reason" class="form-control select2" style="width: 100%;">
                                    {{-- <option >Select Reason For Visit</option> --}}
                                    <option value="Monitoring" disabled>Hassan Ali</option>
                                    <option value="Evaluation" selected="selected">Anum Khalid</option>
                                    <option value="Meeting">Ali Dogar</option>
                                    <option value="Other" >Anas Majeed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Purpose</label>
                                <select name="reason" id="reason" class="form-control" style="width: 100%;">
                                    {{-- <option selected="selected">Select Reason For Visit</option> --}}
                                    <option value="Monitoring" selected="selected">Monitoring</option>
                                    <option value="Evaluation">Evaluation</option>
                                    <option value="Meeting">Meeting</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-block btn-primary revise">Revise</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-block btn-success">Approve</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-block btn-danger">Decline</button>
                                </div>
                            </div>
                            <div class="form-group" id='revise' style="display: none">
                                <label>Comments</label>
                                <input type="text" class="form-control" id="purpose">
                            </div>
                            <div class="col-md-4" id='rv' style="display: none">
                                <button type="button" class="btn btn-block btn-primary">Send Revision</button>
                            </div>
                            {{-- <a href=":hassan">asdasdas</a> --}}

                        </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </section>
    </div>
@endsection
@section('scripttags')
    <script>
        
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })

        $('.revise').on('click',function(){
            $('#revise').show('slow');
            $('#rv').show('slow');
        });

        var $TABLE = $('#table');
        var $BTN = $('#export-btn');
        var $EXPORT = $('#export');

        $('.table-add').click(function () {
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $TABLE.find('table').append($clone);
        });

        $('.table-remove').click(function () {
        $(this).parents('tr').detach();
        });

        $('.table-up').click(function () {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
        });

        $('.table-down').click(function () {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
        });

        // A few jQuery helpers for exporting only
        jQuery.fn.pop = [].pop;
        jQuery.fn.shift = [].shift;

        $BTN.click(function () {
        var $rows = $TABLE.find('tr:not(:hidden)');
        var headers = [];
        var data = [];

        // Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty)').each(function () {
        headers.push($(this).text().toLowerCase());
        });

        // Turn all existing rows into a loopable array
        $rows.each(function () {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function (header, i) {
        h[header] = $td.eq(i).text();
        });

        data.push(h);
        });

        // Output the result
        $EXPORT.text(JSON.stringify(data));
        });

    </script>

    

@endsection
