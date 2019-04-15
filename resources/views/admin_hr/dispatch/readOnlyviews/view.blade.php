@extends('_Monitoring.layouts.upperNavigation')
@section('styleTags')
<style>
    .feather,.pcoded-navbar{display:none !important;}
    </style>
    @endsection
@section('content')
<div class="row">
    <div class="card col-md-12">
        <div class="card-header">
            <h4><b>Dispatch Letters</b></h4>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="dispatchtable" class="table table-bordered table-stripped nowrap">
                    <thead>
                        <tr>
                            <th>Dispatch No.</th>
                            <th>Subject</th>
                            <th>CC Names</th>
                            <th>Attachments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($letters as $letter)
                        <tr>
                        <td>{{$letter->dispatch_no}}</td>
                                <td>{{$letter->subject}}</td>
                                <td> <ol>
                                        @foreach ($letter->DispatchLetterCc as $letterCC)
                                            <li>
                                                {{$letterCC->User->first_name}}   {{$letterCC->User->last_name}} -   {{$letterCC->User->designation}}
                                            </li>
                                        @endforeach
                                    </ol>  </td>
                                <td>
                                        <a href="{{asset('storage/uploads/projects/dispatch_letters/'.$letter->document_name)}}" download>{{$letter->document_name}}</a>    

                                </td>
                        </tr>
                        @endforeach
                      
                    </tbody>

                </table>

            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
@endsection