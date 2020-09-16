@extends('layouts.uppernav')
@section('styletag')
<style>
.width {
    width :30% !important;
    text-align:left;
}
button{
        padding: 0px 5px!important;
}
.btn{
      padding: 0px 5px !important;
}
</style>
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
            <table class="table table-bordered comapct" data-page-lenght="100" id="misctable">
             <thead>
                <tr>
                    <th></th>
                    <th >Financial Year/ADP</th>
                    <th>Meeting Number</th>
                     <th >Scheme Name</th>
                    <th>Attachment</th>
                    <th>Decision</th>

                </tr>
             </thead>
             <tbody>
             @foreach($viewMoms as $vm)
                <tr>
                  <td>
                    <form action="{{route('removeMiscMom')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="mom_id" value="{{$vm->id}}">
                    <button class="" type="submit"><i class="fa fa-trash "></i></button></form>
                    </td>
                    <td>{{$vm->Financialyear->year}}/{{$vm->adp}}</td>
                    <td>{{$vm->meeting_num}}</td>
                    <td>{{$vm->schemeName}}</td>
                    <td>
                         <a href="{{asset('storage/storage/uploads/projects/misc_meetings_mom/'.$vm->meeting_num.'/'.$vm->mom_attachment_file)}}" download >Download File</a>
                    </td>
                  
                    <td>
                    @if(isset($vm->HrDecision) && $vm->HrDecision!=null)
                        @if($vm->hr_decision_id=='1')
                        <span style="color:Green"><b>{{$vm->HrDecision->name}}</b></span>
                        @elseif($vm->hr_decision_id=='2')
                        <span style="color:orange"><b>{{$vm->HrDecision->name}}</b></span>
                        @elseif($vm->hr_decision_id=='3')
                        <span style="color:red"><b>{{$vm->HrDecision->name}}</b></span>
                        @else
                        <b>{{$vm->HrDecision->name}}</b>
                        @endif
                      @endif

                     <form action="{{route('addDescisioninMiscmom')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="mom_id" value="{{$vm->id}}">
                             <input type="hidden" name="meeting_num" value="{{$vm->meeting_num}}">
                       <select  name="agenda_decision" class="form-control select2" required style="text-align: center !important" id="">
                             <option value="">Select Decision</option>
                              @foreach ($hr_decisions as $decision)
                               <option value="{{$decision->id}}">{{$decision->name}}</option>
                           @endforeach
                      </select>
                      <br>
                    <button class="btn btn-sm btn-success" type="submit">save</button></form>

                      </form>
                    </td>
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