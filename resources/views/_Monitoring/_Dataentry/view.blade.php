@extends('_Monitoring.layouts.upperNavigation')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4><b>PC-1 of Projects</b></h4></div>
            <div class="card-block">
                    <div class="dt-responsive table-responsive">
                            <table id="simpletable"
                            class="table table-bordered table-stripped nowrap">
                        <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Sector</th>
                            <th>Entered By</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dummy Project</td>
                                <td>Dummy Sector</td>
                                <td>Dummy Person</td>
                                <td>
                                <a href="#" class="btn btn-sm btn-info">View PC-1</a>
                                </td>
                            </tr>

                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-header"></div>
        </div>
    </div>
</div>
@endsectionendsection