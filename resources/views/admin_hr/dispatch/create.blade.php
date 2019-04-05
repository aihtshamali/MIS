@extends('layouts.uppernav')
@section('styletag')
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
  @endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dispatch Letter
        </h1>
    </section>
        <section class="content">
                <form action="">
                    {{ csrf_field() }}
                        <div class="box">
                            <div class="box-body ">  
                                    <div class="row">
                                        <div class="col-md-2 offset-md-2 form-group">
                                            <label for=""><b>Dispatch No.</b></label>
                                            <input type="text" name="dispatch_num" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)" >Scan Document</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4  offset-md-2 form-group">
                                            <label for=""><b>Issue Date</b></label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2 form-group">
                                            <label for=""><b>Priority</b></label>
                                            <select name="d_priority" id="" class="form-control">
                                                    <option value="" disabled selected >Select Priority</option>
                                                @foreach ($priorities as $priority)
                                                    <option value="{{$priority->id}}">{{$priority->name}}</option>                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for=""><b>Doc Type</b></label>
                                            <select name="d_doctype" id="" class="form-control">
                                                    <option value="" disabled selected >Select Doctype</option>
                                                @foreach ($doctypes as $doctype)
                                                    <option value="{{$doctype->id}}">{{$doctype->name}}</option>                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 form-group">
                                            <label for=""><b>Address Deptt.</b></label>
                                            <textarea name="address_dept" class="form-control" id="" cols="60" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2 form-group">
                                            <label for=""><b>Courier Company</b></label>
                                        <input type="text" name="courier_c" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for=""><b>Post Office</b></label>
                                            <input type="text" name="post_office" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2 form-group">
                                            <label for=""><b>Sender</b></label>
                                            <select name="d_Sender" id="" class="form-control">
                                                <option value="" disabled selected >Select Sender Name</option>
                                                    @foreach ($officers as $officer)
                                                        <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}} - {{$officer->designation}}</option>                                                    
                                                    @endforeach                                                
                                                </select>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for=""><b>CC</b></label>
                                            <select name="cc[]" id="" class="form-control" >
                                             <option value="" disabled selected >Select CC Names</option>
                                                @foreach ($officers as $officer)
                                            <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}} - {{$officer->designation}}</option>                                                    
                                                @endforeach                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 form-group">
                                        <label for=""><b>Subject</b></label>
                                        <textarea name="letter_subject" class="form-control" id="" cols="60" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2 form-group">
                                            <label for=""><b>Remarks</b></label>
                                            <textarea name="remarks" class="form-control" id="" cols="60" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-4 offset-md-2 form-group">
                                            <label for=""><b>Upload Letter</b></label>
                                            <input type="file" name="d_letter_attachment" id="">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <button type="submit" class="btn btn-md btn-primary"> Submit</button>
                                        </div>
                                    </div>
                            </div>    
                        </div>
                    </form>
        </section>
</div>
@endsection