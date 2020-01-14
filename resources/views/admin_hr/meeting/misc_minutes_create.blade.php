@extends('layouts.uppernav')
@section('styletag')
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/AdminLTE/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content">
  @include('inc.msgs')
    <form action="{{route('store_misc_moms')}}"  method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box box-success">
        <div class="box-header">
                
         <h3><b>Add Minutes of Meetings</b></h3>
             <a href="{{route('view_misc_minutes')}}" class="btn btn-md btn-primary pull-right">View All Meeting</a>
           <a class="btn btn-success pull-left" href="hassan:" onclick="stop(this)" >Single Scan Document</a>
        <a class="btn btn-success pull-left" href="hassanduplex:" onclick="stop(this)">Duplex Scan</a>

        </div>
        <div class="box-body moms">
          <div class="b1">
             <div class="row">
                <div class="col-md-3">
                    <label for="">Choose Financial Year</label>
                    <select name="financial_year_id[]" id="" class="form-control">
                        @foreach($financial_year as $f_year)
                        @if($f_year->status=='1')
                            <option value="{{$f_year->id}}" selected ><b>{{$f_year->year}}</b></option>
                            @else
                            <option value="{{$f_year->id}}" ><b>{{$f_year->year}}</b></option>
                            @endif
                        @endforeach
                    </select>
                </div>
                 <div class="col-md-3" >
                    <label for="">ADP #</label>
                        <select class="form-control adp select2 " onchange="adp(this)" name="adp_no[]" id="">
                            <option value="" selected>Select GS #</option>
                            <?php $counting = 0?>
                            @foreach ($adp as $a)
                                <option value="{{$a->gs_no}} ,<?php echo $counting?>" >{{$a->gs_no}}</option>
                                <?php $counting += 1?>
                            @endforeach
                       </select>
                 </div>
                  <div class="col-md-5" >
                    <label for="name_of_scheme">Name Of the Scheme</label>
                    <input class="form-control name_of_scheme" id="" required name="name_of_scheme[]" type="text"style="text-align:center;">
                 </div>
               
           </div> 
           
           <div class="row" style="margin-top:1%;">
            <div class="col-md-3">
                    <label for="">Type Meeting Number</label>
                    <input type="text" placeholder="Type Meeting Number" required name="misc_mom_name[]" class="form-control">
                </div>
                <div class="col-md-3">
                <label for="">Upload Document</label>
                <input type="file" class="form-control" required name="misc_mom_file[]">
                </div>
                <div class="col-md-2">
                    <label for="" style="color:white !important;">Type Meeting Number</label><br>
                    <button class="btn btn-sm btn-info" id="add_more_misc_moms" type="button" name="add_more_misc_moms">+</button>
                </div>
           </div>
          </div>
           
        </div>
        <div class="box-footer">
            <button class="btn btn-md btn-success pull-right" type="submit">Submit</button>
        </div>
   </div>
    </form>
  </section>
  </div>
@endsection
@section('scripttags')
  <script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script>

     function adp(e){
       var arr = $(e).val().split(',');
        console.log(arr);
          console.log(projects[arr[1]]);
                      $(e).parent().next().children().next().val(projects[arr[1]].name_of_scheme);

          }


 $('#add_more_misc_moms').on('click',function(e){
  var mom='';
  mom=`  <div class="b1" style="margin-top:2%;">
             <div class="row">
                <div class="col-md-3">
                    <label for="">Choose Financial Year</label>
                    <select name="financial_year_id[]" id="" class="form-control">
                        @foreach($financial_year as $f_year)
                        @if($f_year->status=='1')
                            <option value="{{$f_year->id}}" selected ><b>{{$f_year->year}}</b></option>
                            @else
                            <option value="{{$f_year->id}}" ><b>{{$f_year->year}}</b></option>
                            @endif
                        @endforeach
                    </select>
                </div>
                 <div class="col-md-3" >
                    <label for="">ADP #</label>
                        <select class="form-control  adp select2 " name="adp_no[]" onchange="adp(this)">
                            <option value="" selected>Select GS #</option>
                            <?php $counting = 0?>
                            @foreach ($adp as $a)
                                <option value="{{$a->gs_no}},<?php echo $counting?>">{{$a->gs_no}}</option>
                                <?php $counting += 1?>
                            @endforeach
                       </select>
                 </div>
                  <div class="col-md-5" >
                    <label for="name_of_scheme">Name Of the Scheme</label>
                    <input class="form-control" id="" name="name_of_scheme[]" type="text"style="text-align:center;">
                 </div>
               
           </div> 
           
           <div class="row" style="margin-top:1%;">
            <div class="col-md-3">
                    <label for="">Type Meeting Number</label>
                    <input type="text" placeholder="Type Meeting Number" name="misc_mom_name[]" class="form-control">
                </div>
                <div class="col-md-3">
                <label for="">Upload Document</label>
                <input type="file" class="form-control" name="misc_mom_file[]">
                </div>
                <div class="col-md-2">
                    <label for="" style="color:white !important;">Type Meeting Number</label><br>
                    <button class="btn btn-sm btn-danger" id="" type="button" onclick="remove_misc_momsFunc(this)" name="remove_misc_moms">-</button>
                </div>
           </div>
          </div> `;
    $('.moms').append(mom);       
  
    function remove_misc_momsFunc(e)
        {
            $(e).parent().parent().parent().remove();
        }
  
        // adplist
       

 });
 
   
</script>
@endsection