    @extends('layouts.uppernav')
    @section('styletag')
    <style>
    table.dataTable td, table.dataTable th
       {
            font-size: 12px !important;
        }
          /* table.dataTable th, */
        
        /* ::placeholder{font-weight: 200 !important;font-size: 14px; color:#ccc;}
        th input{width:100% !important;} */
    </style>
    @endsection
    @section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                View All Dispatch Letters
            </h1>
        </section>
        <section class="content">
            <div class="row">
            <div class="box box-primary col-md-12">
                <div class="box-body">
                    <table class="dispatchlettertable col-md-12 table table-bordered ">
                            <thead>
                                <tr>
                                    <th>
                                    Letter ID
                                    </th>
                                    <th>
                                        Dispatch No
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                    CC Names
                                    </th>
                                
                                    <th>
                                        Attachments
                                    </th>
            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letters as $letter)
                                <tr>
                                    <td>{{$letter->id}}</td>
                                    <td>{{$letter->dispatch_no}}</td>
                                    <td>{{$letter->subject}}</td>
                                    <td>
                                        <ol>
                                            @foreach ($letter->DispatchLetterCc as $letterCC)
                                                <li>
                                                    {{$letterCC->User->first_name}}   {{$letterCC->User->last_name}} -   {{$letterCC->User->designation}}
                                                </li>
                                            @endforeach
                                        </ol>  
                                    </td>
                                    <td>
                                        <a href="{{asset('storage/uploads/projects/dispatch_letters/'.$letter->document_name)}}" download>{{$letter->document_name}}</a>    
                                    </td>
                                </tr>
                                @endforeach     
                            </tbody>
                            
                    </table>
                </div>
            </div>
        </div>
        </section>
    </div>
    @endsection
    @section('scripttags')
    <script>
    $('.dispatchlettertable thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title.trim()+'" />' );
        } );

        var table = $('.dispatchlettertable').DataTable();
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    </script>
    @endsection