@extends('layouts.uppernav')
@section('styletag')
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
           <div class="row">
                <div class="col-md-2">
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
                    <button class="btn btn-sm btn-info" id="add_more_misc_moms" type="button" name="add_more_misc_moms">+</button>
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
<script>

  function remove_misc_moms(e)
    {

    $(e).parent().parent().remove();

    }

 $('#add_more_misc_moms').on('click',function(e){
  var mom='';
  mom=` <div class="row">
                <div class="col-md-2">
                <label for="">Choose Financial Year</label>
                <select name="financial_year_id[]" id="" class="form-control" >
                    @foreach($financial_year as $f_year)
                    @if($f_year->status=='1')
                        <option value="{{$f_year->id}}" selected ><b>{{$f_year->year}}</b></option>
                        @else
                        <option value="{{$f_year->id}}" ><b>{{$f_year->year}}</b></option>
                        @endif
                    @endforeach
                </select>
                </div>
                <div class="col-md-3">
                    <label for="">Type Meeting Number</label>
                    <input type="text" placeholder="Type Meeting Number" name="misc_mom_name[]" class="form-control">
                </div>
                <div class="col-md-3">
                <label for="">Upload Document</label>
                <input type="file" class="form-control" name="misc_mom_file[]">
                </div>
                <div class="col-md-2">
                    <label for="" style="color:white !important;">Button</label><br>
                    <button class="btn btn-sm btn-danger" id="" type="button" onclick="remove_misc_moms(this)" >-</button>
                </div>
           </div> `;
    $('.moms').append(mom);       

 });
 
   
</script>
@endsection