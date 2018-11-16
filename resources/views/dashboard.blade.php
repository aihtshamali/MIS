@extends('layouts.uppernav')
@section('styletag')
  <style>
    .text_center{text-align:center !important;font-size: 20px;line-height: 12px;word-spacing: 1px;}
    .clr_yel{color:#f39c12 !important;font-weight: bolder;font-style: italic;}
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="well " style="text-align:center">
        <h3>Welcome {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}} to your Dashboard </h3>
    </section>
    @role('officer')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Global Score Ranking</h3>
            <div class="box-body">
                <div class="progress" style="height:30px;text-align:center">
                    <div class="progress-bar" style="width:{{ $current_score }}%;height:30px" role="progressbar" aria-valuenow="{{ $current_score }}" aria-valuemin="0" aria-valuemax="{{ $max_score }}">
                            <p style="margin-top:5px">{{ $current_score }}</p>
                        </div>
                </div>
            </div>
            <p class="text_center">Your Rank is <span class="clr_yel">{{ $rank }}</span> out of <span class="clr_yel">{{ count($person) }}</span> Evaluators</p>
            <p class="text_center">Your Relative Score is <span class="clr_yel">{{ $current_score }}</span> out of <span class="clr_yel">{{ $max_score }}</span></p>
        </div>
    </div>
    @endrole

</div>

@endsection
