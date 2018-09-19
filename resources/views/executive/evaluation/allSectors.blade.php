@extends('layouts.uppernav')
@section('styletag')
  <style >
@media print{
  body::-webkit-scrollbar {
 display: none;
}
}
  </style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content">
    <table class="table table-responsive table-striped">
      <thead>
        <th>Sr.#</th>
        <th>Name</th>
        <th>GS#</th>
        <th>Cost</th>
        <th>Sector</th>
      </thead>
      <tbody>
        @php
          $i=1;
        @endphp
        @foreach ($projects as $project)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$project->Project->title}}</td>
            <td>{{$project->Project->ADP}}</td>
            <td>{{round($project->Project->ProjectDetail->orignal_cost,2)}} Million {{$project->Project->ProjectDetail->currency}}</td>
            <td>{{$project->Project->AssignedSubSectors[0]->SubSector->Sector->name}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
</div>
@endsection
