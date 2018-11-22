@extends('layouts.landing')
@section('title')
   Home Page | DGME MIS
@endsection
@section('styleTags')
   <style media="screen">
     .btn, .nav-item, .nav-link{background: transparent !important;font-size: .9rem !important;color: #fff !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     .btn:hover, .nav-item:hover, .nav-link:hover{background: #687753 !important;color: #fff !important;opacity: 0.7 !important;border-radius: .25rem !important;font-size: .9rem !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     a{text-decoration: none !important;}
     hr {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
            border: 0;
            border-top: 1px solid #ffffff47 !important;
        }
     .tile {
      width: 100%;
      display: inline-block;
      box-sizing: border-box;
      background: #687753 !important;
      padding: 20px;
      margin-bottom: 7%;
      border-radius: 10px;
      -webkit-transition: all 600ms ease;
      transition: all 600ms ease;
    }
     .tile:hover {
       background: #687753e6 !important;
      box-shadow: 0px 0px 37px #777;
      -webkit-transition: all 600ms ease;
      transition: all 600ms ease;
    }
    .tile .title {
      margin-top: 0px;
    }
    .tile.purple, .tile.blue, .tile.red, .tile.orange, .tile.green {
      color: #fff;
    }
    /* .tile.purple {
      background: #5133AB;
    } */
    /* .tile.purple:hover {
      background: #3e2784 !important;
    }
    .tile.red {
      background: #AC193D;
    }
    .tile.red:hover {
      background: #7f132d;
    }
    .tile.green {
      background: #00A600;
    }
    .tile.green:hover {
      background: #007300;
    }
    .tile.blue {
      background: #2672EC;
    }
    .tile.blue:hover {
      background: #125acd;
    }
    .tile.orange {
      background: #DC572E;
    }
    .tile.orange:hover {
      background: #b8431f;
    } */
    .pt_3p{padding-top: 3% !important;}
    .black{color: #777 !important;}
    .mr_3p{margin: 3%;}
    .nopad-nomar{padding: 0px !important;margin: 0px !important;}
    .bg_g{ background: #687753 !important}
    .clr_g{ color: #687753 !important}
   </style>
@endsection
@section('content')
      <div class="main" id="main">
        {{-- start vertical auto clider --}}
        {{-- end vertical auto clider --}}
          <!-- Main Section-->
          <div class="hero-section app-hero">
              <div class="container">
                  <div class="hero-content app-hero-content text-center">
                      <div class="row justify-content-md-center">
                          <div class="col-md-10">
                              <h1 class="wow fadeInUp" data-wow-delay="0s">DIRECTORATE GENERAL MONITORING & EVALUATION</h1>
                              <p class="wow fadeInUp" data-wow-delay="0.2s">
                                  Welcome to the official INTRANET website of Directorate General Monitoring & Evaluation, Punjab. We invite you to get to know our organization by exploring this site on which you will learn about our mission, vision and objectives. The site also provides information about different projects and provides access to valuable statistics. We hope…
                              </p>
                              {{-- <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#">Live Preview</a> --}}
                              {{-- <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#">Buy Now</a> --}}
                          </div>
                          <div class="col-md-12">
                              <div class="hero-image">
                                  {{-- <img class="img-fluid" src="assets/images/app_hero_1.png" alt="" /> --}}
                                  {{-- main --}}
                                  <div id="testmodal" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  {{-- <h1 class="col-md-10 black nopad-nomar">Login</h2> --}}
                                                  <button type="button" class="close col-md-2" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  {{-- <h4 class="modal-title">Confirmation</h4> --}}
                                              </div>
                                              <div class="modal-body">
                                                <div class="limiter">
                                              		<div class="container-login100">
                                              			<div class="wrap-login100 p-t-50 p-b-20">
                                                      <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                                                        {{ csrf_field() }}
                                              					<span style="text-align: center ; text-decoration-color: lightslategray" class="p-b-7">
                                              						<div style="text-align: center ">
                                              								<img src="logo.jpg"  alt="AVATAR">
                                              						</div>
                                              					</span>
                                              					<div class="wrap-input100 validate-input m-t-40 m-b-35" data-validate = "Enter username">
                                              						<input class="input100" type="text" id="username" name="username" value="{{ old('username') }}">
                                                              <span class="focus-input100" data-placeholder="UserName"></span>
                                                              @if ($errors->has('username'))
                                                                   <div class="help-block">
                                                                      <strong>{{ $errors->first('username') }}</strong>
                                                                  </div>
                                                              @endif
                                              					</div>
                                              					<div class="wrap-input100 validate-input m-b-15" data-validate="Enter password">
                                              	  					<input class="input100" id="password" type="password" name="password">
                                                            <span class="focus-input100" data-placeholder="Password"></span>
                                                            @if ($errors->has('password'))
                                                            <div class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="checkbox m-b-20 mr_3p">
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember  me
                                              				 </div>

                                              					<div class="container-login100-form-btn ">
                                              						<button class="login100-form-btn btn bg_g"  >
                                              							Login
                                              						</button>
                                              					</div>

                                              					<ul class="login-more p-t-50 m-b-8 modal-footer">
                                              							<span class="txt1">
                                              								Forgot
                                              							</span>
                                              							<b>
                                              							<a href="#" class="txt2 clr_g">
                                              									Username  /  Password?
                                              							</a>
                                              							</b>
                                              							<b>
                                              								<a href="/register" class="txt2 btn bg_g" style=" float : right; margin-left: 20px;">
                                              									 Sign up
                                              								</a>
                                              							</b>

                                              					</ul>
                                              				</form>
                                              			</div>
                                              		</div>
                                              	</div>
                                              </div>
                                              {{-- <div class="">
                                                  <button type="button" class="btn-default" data-dismiss="modal">Close</button>
                                              </div> --}}
                                          </div>
                                      </div>
                                  </div>
                                  {{-- <div id="testmodal-1" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">Confirmation</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>Do you want to save changes you made to document before closing?</p>
                                                  <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div> --}}
                                  {{-- end main --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @auth
          <div class="pt_3p text-center">
            <div class="container">
              <div class="row">
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="" class="tile purple">
                      <h3 class="title">Monitoring</h3>
                      <hr/>
                      <p>Click here to visit Monitoring</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.6s">
                    <a href="" class="tile orange">
                      <h3 class="title">Evaluation</h3>
                      <hr/>
                      <p>Click here to visit Evaluation</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="" class="tile green">
                      <h3 class="title">TPV(s)</h3>
                      <hr/>
                      <p>Click here to visit TPV(s)</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.8s">
                  <a href="" class="tile green">
                    <h3 class="title">Inquires</h3>
                    <hr/>
                    <p>Click here to visit Inquires</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="" class="tile orange">
                      <h3 class="title">Plan My Trip</h3>
                      <hr/>
                      <p>Click here to visit Plan My Trip</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.0s">
                  <a href="" class="tile green">
                    <h3 class="title">Accounts</h3>
                    <hr/>
                    <p>Click here to visit Accounts</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.2s">
                  <a href="" class="tile green">
                    <h3 class="title">My Profile</h3>
                    <hr/>
                    <p>Click here to visit My Profile</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="1.3s">
                  <a href="" class="tile purple">
                    <h3 class="title">New Announcement</h3>
                    <hr/>
                    <p>Check Announcements</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endauth
          <div class="services-section text-center" id="services">
              <!-- Services section (small) with icons -->
              <div class="container">
                  <div class="row  justify-content-md-center">
                      <div class="col-md-8">
                          <div class="services-content">
                              <h1 class="wow fadeInUp" data-wow-delay="0s">Vission & Mission</h1>
                              <p class="wow fadeInUp" data-wow-delay="0.2s">
                                  Our Vission Modern, progressive, efficient, and reliable organization & Our Mission is Planning, monitoring and evaluation of PSDP
                              </p>
                          </div>
                      </div>
                      <div class="col-md-12 text-center">
                          <div class="services">
                              <div class="row">
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.2s">
                                      <div class="services-icon">
                                          <img src="{{ asset('landingPage/img/monitoring.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Monitoring</h1>
                                          <p>
                                              Assessing performance, analyzing organizational performance; and examining processes in the environment of an organization.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.3s">
                                      <div class="services-icon">
                                          <img class="icon-2" src="{{ asset('landingPage/img/evaluation.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Evaluation</h1>
                                          <p>
                                              Examination, at specified points in time of projects performance, usually with emphasis on impact and also on relevance & efficiency.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.4s">
                                      <div class="services-icon">
                                          <img class="icon-3" src="{{ asset('landingPage/img/Validation.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Validation</h1>
                                          <p>
                                              Third Party Validation is to gauge the progress with regard to its objectives and intended impact from an independent perspective.
                                          </p>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.4s">
                                      <div class="services-icon">
                                          <img class="icon-3" src="{{ asset('landingPage/img/specialAss.png')}}" height="60" width="60" alt="Service" />
                                      </div>
                                      <div class="services-description">
                                          <h1>Special Assignments</h1>
                                          <p>
                                              Special Assignments on the direction of CM Punjab, Chief Secretary’s Punjab and Chairman PND Board, Govt. of the Punjab
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="counter-section">
              <div class="container">
                  <div class="row text-center">
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-ioxhost"></i>
                              </div>
                              <h3><span class="counter">250</span>+</h3>
                              <div class="counter-text">
                                  <h4>Monitoring projects</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-industry"></i>
                              </div>
                              <h3><span class="counter">1000</span>+</h3>
                              <div class="counter-text">
                                  <h4>Evaluation Projects</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-check-square-o"></i>
                              </div>
                              <h3><span class="counter">500</span>+</h3>
                              <div class="counter-text">
                                  <h4>Validation</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="counter-up">
                              <div class="counter-icon">
                                  <i class="fa fa-bookmark"></i>
                              </div>
                              <h3><span class="counter">80</span>+</h3>
                              <div class="counter-text">
                                  <h4>Special Assignments</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer Section -->
          <div class="footer">
              <div class="container">
                  <div class="col-md-12 text-center">
                      {{-- <img src="assets/logos/logo.png" alt="Adminty Logo" /> --}}
                      <ul class="footer-menu">
                          <li><a href="http://demo.com">Site</a></li>
                          <li><a href="#">Support</a></li>
                          <li><a href="#">Terms</a></li>
                          <li><a href="#">Privacy</a></li>
                      </ul>
                      <div class="footer-text">
                          <p>
                              Copyright © 2017 Adminty. All Rights Reserved.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Scroll To Top -->
          <a id="back-top" class="back-to-top page-scroll" href="#main">
              <i class="fa fa-chevron-up"></i>
          </a>
          <!-- Scroll To Top Ends-->
      </div>
      <!-- Main Section -->
  </div>
@endsection
@section('scripttags')
  <script>
$(document).ready(function(){
  $('.nav-link').mouseenter(function(){
    $(this).attr(`style`,`color:#fff !important;`);
    });
  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if (scroll > 30)
    {
      $('.nav-link').attr(`style`,`color:#777777d9 !important;`);
      $('.nav-link').mouseenter(function(){
        $(this).attr(`style`,`color:#fff !important;`);
        });
      $('.nav-link').mouseleave(function(){
        $(this).attr(`style`,`color:#777777d9 !important;`);
        });
    }
    else
     {
       $('.nav-link').attr(`style`,`color:#fff !important;`);
       $('.nav-link').mouseenter(function(){
         $(this).attr(`style`,`color:#777777d9 !important;`);
         });
       $('.nav-link').mouseleave(function(){
         $(this).attr(`style`,`color:#fff !important;`);
         });
     }
  });
  });
  $(document).ready(function(){
  var show_btn=$('.show-modal');
      var show_btn=$('.show-modal');
      //$("#testmodal").modal('show');

        show_btn.click(function(){
          $("#testmodal").modal('show');
      })
    });

    $(function() {
            $('#element').on('click', function( e ) {
                Custombox.open({
                    target: '#testmodal-1',
                    effect: 'fadein'
                });
                e.preventDefault();
            });
        });
</script>
@endsection
