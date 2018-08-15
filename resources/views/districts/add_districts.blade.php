@extends('layouts.uppernav')

@section('content')

<div class="content-wrapper">
        <section class="content-header">
                <h1>
                Districts and Tehsils
                 
                </h1>
                  
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
                    <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
                
                </ol>
            </section>
   <section class="content">
       <div class="row">
           <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Districts File</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{route('post_Import')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group col-md-12" >
                                    <input type="file" name="file"/>
                                    <input type="hidden"  value="{{csrf_token()}}" name="_token"/> </br>
                            </div>
                        </div>
                        <div class="box-footer">
                            
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>
                    </form>
            </div>
        </div>
    </section>

</div>
@endsection

