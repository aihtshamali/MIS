@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Projects List
@endsection
@section('styleTags')
@endsection
@section('content')
<!-- Hover table card start -->
<div class="container">
  <h2 class="topheading">Projects List</h2>
    <div class="card-block table-border-style col-md-10 col-md-offset-1 border">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sr#.</th>
                        <th>Name Of Project</th>
                        <th>Cost PKR.</th>
                        <th>Gestation Period</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pakistan Kidney & liver Institute (PKLI)</td>
                        <td>000000 Rs.</td>
                        <td>54654646</td>
                        <td class="statustable" id="status">20%</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Orange line train project</td>
                        <td>000000 Rs.</td>
                        <td>51554854</td>
                        <td class="statustable yel" id=""><a href="#"></a>50%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Hover table card end -->
@endsection
@section('script')
@endsection
