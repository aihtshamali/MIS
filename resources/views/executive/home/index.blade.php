@extends('layouts.uppernav')

@section('content')


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
              <h3 class="box-title">Management Systems</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          <div class="box-body">
          {{--  row 1  --}}
          <div class="row" >
       
              <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box " style="background-color:rgb(102, 102, 102);">
                            <div class="inner">
                              <h3>10<sup style="font-size: 20px">%</sup></h3>
                              <b style="font-size:20px;">H R M S</b>
                            </div>
                            <div class="icon">
                              <i class="fa fa-address-book-o" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                              More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                </div>
              {{--/ BOX 1 --}}
              <div class="col-lg-3 col-xs-6">
                <div class="small-box "style="background-color:rgb(153, 153, 153);">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
      
                    <b style="font-size:20px;">V M I S</b>
                  </div>
                  <div class="icon">
                    <i class="fa fa-car"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              {{-- /BOX 2 --}}
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box " style="background-color:rgb(179, 179, 179);">
                        <div class="inner">
                          <h3>65<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">F M I S</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-money"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
              </div>
               {{-- /BOX 3 --}}
               <div class="col-lg-3 col-xs-6">
                  <div class="small-box " style="background-color:	rgb(230, 230, 230);">
                    <div class="inner">
                      <h3>75<sup style="font-size: 20px">%</sup></h3>
        
                      <b style="font-size:20px;">ATTENDENCE</b>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div></div>
             
      
          </div>
          </div>
      </div>
                {{--  row 2  --}}
      <div class="box box-Default">

          <div class="box-header with-border">
            <h3 class="box-title">Projects Progress</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
           <div class="row" >
            <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color:salmon !important;">
                      <div class="inner">
                        <h3>20<sup style="font-size: 20px">%</sup></h3>
                        <b style="font-size:20px;"> P E M S</b>
                      </div>
                      <div class="icon">
                        <i class="fa fa-balance-scale"></i>
                      </div>
                      <a href="{{route('Exec_pems_tab')}}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
              </div>
              {{--/ BOX 5 --}}
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box" style="background-color:mediumorchid !important">
                        <div class="inner">
                          <h3>53<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">P M M S</b>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
              {{-- /BOX 6 --}}
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>65<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">T P V S</b>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                {{-- /BOX 7 --}}
             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-lime-active">
                  <div class="inner">
                    <h3>44<sup style="font-size: 20px">%</sup></h3>
      
                    <b style="font-size:20px;">INQUIRY</b>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              {{-- /BOX8 --}}
      
          </div>
                {{-- row 3 --}}
          <div class="row" >
              <div class="col-lg-3 col-xs-6">
                </div>
      
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-purple">
                        <div class="inner">
                          <h3>10<sup style="font-size: 20px">%</sup></h3>
                          <b style="font-size:20px;"> SPECIAL</br> ASSIGNEMENT</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user-secret"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
              </div>
              {{--/ BOX 5 --}}
             
              <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-maroon">
                        <div class="inner">
                          <h3>53<sup style="font-size: 20px">%</sup></h3>
            
                          <b style="font-size:20px;">OTHER </br>ASSIGNMENT</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-cog"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
              {{-- /BOX 6 --}}
          </div>
        </div>
          
      </div>

      
    </section>
     
</div>



@endsection