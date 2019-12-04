@extends('layouts.uppernav')
@section('styletag')
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content">
  @include('inc.msgs')
    <div class="box box-primary">
        <div class="box-header">
         <h3><b>View All Miscellaneous Minutes</b></h3>
             <a href="{{route('misc_minutes_create')}}" class="btn btn-md btn-success pull-right">+ Add New Meeting</a>
        </div>
        <div class="box-body ">
            <table class="table table-bordered" data-page-lebght="100" id="misctable">
             <thead>
                <tr>
                    <th>Financial Year</th>
                    <th>Meeting Number</th>
                    <th>Attachment</th>
                    <th></th>

                </tr>
             </thead>
             <tbody>
             @foreach($viewMoms as $vm)
                <tr>
                    <td>{{$vm->Financialyear->year}}</td>
                    <td>{{$vm->meeting_num}}</td>
                    <td>
                     <a href="{{asset('storage/storage/uploads/projects/misc_meetings_mom/'.$vm->meeting_num.'/'.$vm->mom_attachment_file)}}" download >Download File</a>
                    </td>
                    <td>
                    <form action="{{route('removeMiscMom')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="mom_id" value="{{$vm->id}}">
                    <button class="btn btn-md btn-danger" type="submit">Delete M-O-M</button></form></td>
                </tr>
                @endforeach
             </tbody>
            </table>
        </div>

    
        
   </div>
  </section>
  </div>
@endsection
@section('scripttags')
<script>
     $('#misctable').DataTable(
          {
       dom: 'Bfrtip',
        buttons: [
           'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      
        
    } );
</script>
@endsection