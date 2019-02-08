@extends('layouts.monitoringCM_Dashboard')
@section('title')
  DGME | Summary
@endsection
@section('styleTags')
<style media="screen">
</style>
@endsection
@section('content')
<!-- Hover table card start -->
<div class="container">
  <div class="border-bottom col-md-10 col-md-offset-1">
    <h2 class="topheading">Projects Summary</h2>
  </div>
  <div class="col-md-10 col-md-offset-1">
    <div class="row border-bottom">
      <div class="col-md-6">
        <b class="hedingTxt">Total No of project CFY<span class="pull-right hidden-xs hidden-sm">:</span></b>
      </div>
      <div class="col-md-6">
        <b class="hedingInt">123</b>
      </div>
    </div>
    <div class="row border-bottom">
      <div class="col-md-6">
        <b class="hedingTxt">Total ADP Cost<span class="pull-right hidden-xs hidden-sm">:</span></b>
      </div>
      <div class="col-md-6">
        <b class="hedingInt">400 million PKR</b>
      </div>
    </div>
  </div>
  <div class="clearfix col-md-10 col-md-offset-1">
    <div class="row border-bottom">
      <div class="col-md-6">
        <b class="hedingTxt">DGM&E monitoring projects (No)<span class="pull-right hidden-xs hidden-sm">:</span></b>
      </div>
      <div class="col-md-6">
        <b class="hedingInt">123</b>
      </div>
    </div>
    <div class="row border-bottom">
      <div class="col-md-6">
        <b class="hedingTxt">ADP cost of project (monitoring project cost)<span class="pull-right hidden-xs hidden-sm">:</span></b>
      </div>
      <div class="col-md-6">
        <b class="hedingInt">400 million PKR</b>
      </div>
    </div>
    <div class="row margin-top">
      <div class="col-md-6">
        <b class="hedingTxtLvlTwo">Summary of alerts<span class="pull-right hidden-xs hidden-sm">:</span></b>
      </div>
      <form class="" action="index.html" method="post">
        <div class="col-md-1 red marlf3p paddinLab">
          <label class="radio-inline">
            <input type="radio" name="optradio" checked>Red
          </label>
        </div>
        <div class="col-md-1 yel marlf3p paddinLab">
          <label class="radio-inline">
            <input type="radio" name="optradio">Yellow
          </label>
        </div>
        <!-- <div class="col-md-1 blue">
          <label class="radio-inline">
            <input type="radio" name="optradio">Blue
          </label>
        </div> -->
        <div class="col-md-1 green marlf3p paddinLab">
          <label class="radio-inline">
            <input type="radio" name="optradio">Green
          </label>
        </div>
        <div class="col-md-2">

        </div>
      </form>
    </div>
  </div>
    <div class="card-block margin-top table-border-style col-md-10 col-md-offset-1 nopad box-shadow">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="tblhd">
                        <th>Sr#.</th>
                        <th>Name</th>
                        <th>No. of projects monitored</th>
                        <th>Total cost Rs.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                          <a href="{{ route('projctlist') }}">
                            Pakistan Kidney & liver Institute (PKLI)
                          </a>
                        </td>
                        <td>25</td>
                        <td>000000 Rs.</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>
                          <a href="{{ route('projctlist') }}">
                            Orange line train project
                          </a>
                        </td>
                        <td>45</td>
                        <td>000000 Rs.</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                          <a href="{{ route('projctlist') }}">
                            Monitoring line project
                          </a>
                        </td>
                        <td>45</td>
                        <td>000000 Rs.</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>
                          <a href="{{ route('projctlist') }}">
                            Evaluation project
                          </a>
                        </td>
                        <td>45</td>
                        <td>000000 Rs.</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>
                          <a href="{{ route('projctlist') }}">
                            health & education
                          </a>
                        </td>
                        <td>45</td>
                        <td>000000 Rs.</td>
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
