@extends('_Monitoring.layouts.upperNavigation')
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-12">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="feather icon-home bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600"> <span style="color:black">Welcome</span>  
                              @auth
                            {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                            @endauth <span style="color:black;">to your dashboard .</span></span>
                    <h4>Have A Nice Day 😊 !!</h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-yellow f-16 feather icon-calendar m-r-10"></i>Last 24 hours
                        </span>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
            