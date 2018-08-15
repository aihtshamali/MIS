@extends('layouts.uppernav')

@section('content')
<style>
    a {
      color:white;
    }
    a:hover {
      color:black;
    }
  </style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
         GLOBAL PROGRESS
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-backward" ></i>Back</a></li>
          <li style="padding-left:5px;"><a href="#">Forward<i style="padding-left:3px;" class="fa fa-forward"></i></a></li>
         
        </ol>
      </section>
    <section class="content">

      <div class="box box-Default">

          <div class="box-header with-border">
            <h3 class="box-title">Projects Progress</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body ">
           <div class="row" >
              <div class="col-lg-3 col-xs-6"></div>
            <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                   
                    <div class="small-box" style="background-color:salmon !important;">
                        
                      <div class="inner"><a  href="{{route('Evaluation_pems_tab')}}">
                        <h3>20<sup style="font-size: 20px">%</sup></h3>
                        <b style="font-size:20px;"> P E M S</b>
                      </div>
                      <div class="icon">
                        <i class="fa fa-balance-scale"></i>
                      </div>
                      <a  href="{{route('Evaluation_pems_tab')}} " class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </a>
                    </div>
                
              </div>
              {{--/ BOX 5 --}}
              
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box" style="background-color:mediumorchid !important">
                        <div class="inner"> <a href="{{route('Evaluation_pmms_tab')}}" >
                          <h3>53<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">P M M S</b>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('Evaluation_pmms_tab')}}" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </a>
                      </div>
                </div>
                <div class="col-lg-3 col-xs-6"></div>
              {{-- /BOX 6 --}}
           </div>
           <div class="row" >
              <div class="col-lg-3 col-xs-6"></div>
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box " style="background-color:skyblue !important;">
                     
                        <div class="inner">     <a href="{{route('Evaluation_tpv_tab')}}">
                        
                          <h3>65<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">T P V S</b>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('Evaluation_tpv_tab')}}"  class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </a>
                      </div>
                   
                </div>
                {{-- /BOX 7 --}}
             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box "  style="background-color:lightgreen !important;" >
                  <div class="inner"> <a href="{{route('Evaluation_inquiry_tab')}}" >
                    <h3>44<sup style="font-size: 20px">%</sup></h3>
      
                    <b style="font-size:20px;">INQUIRY</b>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('Evaluation_inquiry_tab')}}"  class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </a>
                </div>
              </div>
              {{-- /BOX8 --}}
              <div class="col-lg-3 col-xs-6"></div>
          </div>
      </div>
                {{-- row 3 --}}
          <div class="row" >
              <div class="col-lg-3 col-xs-6">
                </div>
      
          
              {{--/ BOX 5 --}}
            
              {{-- /BOX 6 --}}
          </div>
        </div>
          
      </div>

      
    </section>
     
</div>



@endsection