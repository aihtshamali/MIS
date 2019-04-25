@extends('layouts.uppernav')
@section('styletag')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <div class=" col-md-6 col-md-offset-3">
        <form action="{{route('dispatchLetterCreated')}}" method="POST" enctype="multipart/form-data">
            <section class="content-header" style="">
                <h1 class="col-md-9">
                    Dispatch Letter
                </h1>
                <div class="col-md-3 form-group">
                    <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)">Scan Document</a>
                </div>
            </section>
            <section class="content" style="clear:both !Important;">
                {{ csrf_field() }}
                <div class="box">
                    <div class="box-body ">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Dispatch No.</b></label>
                                <input type="text" name="dispatch_num" class="form-control">
                            </div>
                            <div class="col-md-6  offset-md-2 form-group">
                                <label for=""><b>Issue Date</b></label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Priority</b></label>
                                <select name="d_priority" id="" class="form-control">
                                    <option value="" disabled selected>Select Priority</option>
                                    @foreach ($priorities as $priority)
                                    <option value="{{$priority->id}}">{{$priority->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Doc Type</b></label>
                                <select name="d_doctype" id="" class="form-control">
                                    <option value="" disabled selected>Select Doctype</option>
                                    @foreach ($doctypes as $doctype)
                                    <option value="{{$doctype->id}}">{{$doctype->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for=""><b>Address Deptt.</b></label>
                                <textarea name="address_dept" class="form-control" id="" cols="60" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Courier Company</b></label>
                                <input type="text" name="courier_c" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>Post Office</b></label>
                                <input type="text" name="post_office" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-2 form-group">
                                <label for=""><b>Sender</b></label>
                                <select name="d_Sender" id="" class="select2 form-control">
                                    <option value="" disabled selected>Select Sender Name</option>
                                    @foreach ($officers as $officer)
                                    <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}} -
                                        {{$officer->designation}}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><b>CC</b></label>
                                <select name="cc[]" id="" class="select2 form-control" multiple="multiple" data-placeholder="Select CC Names">
                                    @foreach ($officers as $officer)
                                    <option value="{{$officer->id}}">{{$officer->first_name}} {{$officer->last_name}} -
                                        {{$officer->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for=""><b>Subject</b></label>
                                <textarea name="letter_subject" class="form-control" id="" cols="60" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 offset-md-2 form-group">
                                <label for=""><b>Remarks</b></label>
                                <textarea name="remarks" class="form-control" id="" cols="60" rows="2"></textarea>
                            </div>
                            <div class="col-md-6 offset-md-2 form-group">
                                <label for=""><b>Upload Letter</b></label>
                                <input type="file" name="d_letter_attachment" id="">
                            </div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-md btn-primary"> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </section>
    </div>
</div>
@endsection
@section('scripttags')
<script>
$(function () {
    $('.select2').select2();
});

$('.d_address').on('change', function ()
                {

                    if($('.d_address').val()=="other")
                    {
                        $('.d_address_other').show(1000);
                    }
                    else{
                        $('.d_address_other').hide(1000);
                        // $('.b_Name').show(1000);

                }
            });
</script>
@endsection