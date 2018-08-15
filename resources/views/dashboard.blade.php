@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
    <section class="well " style="text-align:center">
        <h3>Welcome {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}} to your Dashboard </h3>
    </section>
</div>

@endsection
