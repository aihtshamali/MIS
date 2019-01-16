@extends('layouts.landing')
@section('title')
   Home Page | DGME MIS
@endsection
@section('styleTags')
   <style media="screen">
     .btn, .nav-item, .nav-link{background: transparent !important;font-size: .9rem !important;color: #666 !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     .btn:hover, .nav-item:hover, .nav-link:hover{background: #687753 !important;color: #fff !important;border-radius: .25rem !important;font-size: .9rem !important;font-weight:700 !important;-webkit-transition: all 600ms ease;transition: all 600ms ease;}
     a{text-decoration: none !important;}
     hr {
            margin-top: 0.5rem !important;
            margin-bottom: 0.5rem !important;
            border: 0;
            border-top: 1px solid #ffffff47 !important;
        }
     .w_46p{width: 46% !important;margin-top: -11% !important;}
     .w_30p{width: 30% !important;margin-top: -11% !important;}
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
    .navbar-default{background-color: #fff !important;}
    /* .navbar-default .navbar-nav > li > a{color: #666 !important;} */
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
    .white{color: #fff !important;}
    .close{position: absolute;right: 0;z-index: 9999;}
    .text_center{text-align: center !important;}
    a p, a h3{text-transform: capitalize !important;}
    ::selection{color: #fff !important;background: #687753  !important;}
    .maraut{margin:auto !important;}
   </style>
@endsection
@section('content')
      <div class="main" id="main">
        {{-- start vertical auto clider --}}
        {{-- end vertical auto clider --}}
          <!-- Main Section-->
          {{-- @auth --}}
            {{-- <div class="pt_3p"></div> --}}
            {{-- <div class="pt_3p"></div> --}}
          {{-- @else --}}
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
                                              					<div class="wrap-input100 validate-input m-t-40 m-b-15" data-validate = "Enter username">
                                              						<input class="input100 col-md-8 offset-md-2 form-control" placeholder="Username" type="text" id="username" name="username" value="{{ old('username') }}">
                                                              <span class="focus-input100" data-placeholder="UserName"></span>
                                                              @if ($errors->has('username'))
                                                                   <div class="help-block">
                                                                      <strong>{{ $errors->first('username') }}</strong>
                                                                  </div>
                                                              @endif
                                              					</div>
                                              					<div class="wrap-input100 validate-input m-b-15" data-validate="Enter password">
                                              	  					<input class="input100 col-md-8 offset-md-2 form-control" placeholder="Password" id="password" type="password" name="password">
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
                                                            <button class="login100-form-btn btn bg_g white"  >
                                                                Login
                                                            </button>
                                                        </div>

                                              					{{-- <ul class="login-more p-t-50 m-b-8 modal-footer">
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

                                              					</ul> --}}
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
          {{-- @endauth --}}
          @auth
          <div class="pt_3p text-center">
            <div class="container">
              <div class="row">
                @role('adminhr')
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.3s">
                  <a href="#!" class="tile purple">
                    <h3 class="title">PDWP meetings</h3>
                    <hr/>
                    <p>visit PDWP Meetings</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.3s">
                  <a href="#!" class="tile purple">
                    <h3 class="title">LMS</h3>
                    <hr/>
                    <p>Leave Management System</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.3s">
                  <a href="#!" class="tile purple">
                    <h3 class="title">Human Resource System</h3>
                    <hr/>
                    <p>visit HR System</p>
                  </a>
                </div>
                @endrole
                @role('officer|evaluator|monitor|manager|directormonitoring|directorevaluation|dataEntry')
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.5s">
                      <a href="{{route('monitoring_dashboard')}}" class="tile purple">
                        <h3 class="title">Monitoring</h3>
                        <hr/>
                        <p>Visit Monitoring</p>
                      </a>
                  </div>
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.6s">
                      <a href="{{route('evaluation_dashboard')}}" class="tile orange">
                        <h3 class="title">Evaluation</h3>
                        <hr/>
                        <p>Visit Evaluation</p>
                      </a>
                  </div>
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.7s">
                      <a href="" class="tile green">
                        <h3 class="title">TPV(s)</h3>
                        <hr/>
                        <p>Visit TPV(s)</p>
                      </a>
                  </div>
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.8s">
                    <a href="" class="tile green">
                      <h3 class="title">Inquires</h3>
                      <hr/>
                      <p>Visit Inquires</p>
                    </a>
                  </div>
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.9s">
                    <a href="{{route('trip.create')}}" class="tile orange">
                      <h3 class="title">Plan My Trip</h3>
                      <hr/>
                      <p>Visit Plan My Trip</p>
                    </a>
                  </div>
                  <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="0.9s">
                  <a href="#!" class="tile orange">
                    <h3 class="title">leaves</h3>
                    <hr/>
                    <p>Schedule leaves here</p>
                  </a>
                </div>
                @endrole
                @role('transportofficer')
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.0s">
                  <a href="http://vmis.dgme.gov.pk:8081/" class="tile green">
                    <h3 class="title">Vehicle Management System</h3>
                    <hr/>
                    <p>visit VMIS</p>
                  </a>
                </div>
                @endrole
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.2s">
                  <a href="" class="tile green">
                    <h3 class="title">My Profile</h3>
                    <hr/>
                    <p>check Profile</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp maraut" data-wow-delay="1.3s">
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
                              <h3><span class="counter">113</span>+</h3>
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
                              <h3><span class="counter">239</span>+</h3>
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
                              <h3><span class="counter">0</span></h3>
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
                              <h3><span class="counter">0</span></h3>
                              <div class="counter-text">
                                  <h4>Special Assignments</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          {{-- start news slider --}}
          <div id="content-wrapper">
            <div class="inner clearfix">
              <section id="main-content">
                  <div id="demos">
                          <div id="carouselTicker" class="carouselTicker">
                              <ul class="carouselTicker__list">
                                <li class="carouselTicker__item grayeee">
                                  <h4>Capacity Building 1</h4>
                                  <p>celebration of project complition in CR room...</p>
                                  <b class="float-right" style="font-size: 11px !important;">12/12/2018</b>
                                </li>
                                <li class="carouselTicker__item grayeee">
                                  <h4>Capacity Building 2</h4>
                                  <p>celebration of project complition in CR room...</p>
                                  <b class="float-right" style="font-size: 11px !important;">12/12/2018</b>
                                </li>
                                <li class="carouselTicker__item grayeee">
                                  <h4>Capacity Building 3</h4>
                                  <p>celebration of project complition in CR room...</p>
                                  <b class="float-right" style="font-size: 11px !important;">12/12/2018</b>
                                </li>
                                <li class="carouselTicker__item grayeee">
                                  <h4>Capacity Building 4</h4>
                                  <p>celebration of project complition in CR room...</p>
                                  <b class="float-right" style="font-size: 11px !important;">12/12/2018</b>
                                </li>
                              </ul>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
          {{-- end news slider --}}
          <!-- Footer Section -->
          <div class="footer">
              <div class="container">
                  <div class="col-md-12 text-center">
                      {{-- <img src="assets/logos/logo.png" alt="Adminty Logo" /> --}}
                      {{-- <ul class="footer-menu">
                          <li><a href="http://demo.com">Site</a></li>
                          <li><a href="#">Support</a></li>
                          <li><a href="#">Terms</a></li>
                          <li><a href="#">Privacy</a></li>
                      </ul> --}}
                      <div class="footer-text">
                          <p>
                              Copyright © 2018 DGME. All Rights Reserved.
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
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text_center col-md-12" style="font-size:20px !important;">Login Form</h1>
          <button type="button" class="close col-md-2" data-dismiss="modal">&times;</button>
        </div>
        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
          {{ csrf_field() }}
          <div class="modal-body">
              <center>
                <img class="" src="{{ asset('dgme.png')}}" alt="DGME" />
              <div class="col-md-8 offset-md-2 clearfix">
                {{-- <label>Username</label> --}}
                <input v-model="form.username" type="text" name="username"
                  class="form-control" placeholder="UserName..." :class="{ 'is-invalid': form.errors.has('username') }">
                <has-error :form="form" field="username"></has-error>
              </div>

              <div class="col-md-8 offset-md-2 clearfix">
                {{-- <label>Password</label> --}}
                <input v-model="form.password" type="password" name="password"
                  class="form-control" placeholder="Password..." :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
              </div>
              <div class="checkbox m-b-20 col-md-8 offset-md-2 clearfix">
                  <label class="col-md-7" style="padding-top:4% !important;">
                      <input type="checkbox" v-model="form.remember" name="remember" :class="{ 'is-invalid': form.errors.has('remember') }" style="margin-top:1% !important;"> Remember Me
                  </label>
                  <button :disabled="form.busy" type="submit" class="btn col-md-5" style="margin-bottom:9% !important">Login</button>
    				 </div>
           </center>
          </div>
        {{-- <div class="modal-footer form-group col-md-12 clearfix">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </form>
    </div>

    </div>
  </div>
{{--/ Modal --}}



@endsection
@section('scripttags')
  <script>
// $(document).ready(function(){
//   $('.nav-link').mouseenter(function(){
//     $(this).attr(`style`,`color:#fff !important;`);
//     });
//   $(window).scroll(function(){
//     var scroll = $(window).scrollTop();
//     if (scroll > 30)
//     {
//       $('.nav-link').attr(`style`,`color:#777777d9 !important;`);
//       $('.nav-link').mouseenter(function(){
//         $(this).attr(`style`,`color:#fff !important;`);
//         });
//       $('.nav-link').mouseleave(function(){
//         $(this).attr(`style`,`color:#777777d9 !important;`);
//         });
//     }
//     else
//      {
//        $('.nav-link').attr(`style`,`color:#fff !important;`);
//        $('.nav-link').mouseenter(function(){
//          $(this).attr(`style`,`color:#777777d9 !important;`);
//          });
//        $('.nav-link').mouseleave(function(){
//          $(this).attr(`style`,`color:#fff !important;`);
//          });
//      }
//   });
//   });
new Vue({
  el: '#myModal',

  data () {
    return {
      // Create a new form instance
      form: new Form({
        username: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    login () {
      // Submit the form via a POST request
      this.form.post('/login')
        .then(({ data }) => {
          swal({
            title: 'Login',
            text: 'You Logged in SuccessFully!',
            type: 'success',
            showConfirmButton: false,
            timer:1500
          })
          $('#myModal').modal('hide')

          location.reload();
        })
        .catch(({error})=> {
          toast({
            type: 'error',
            title: 'Oops Error Occured!'
          })
        })
    }
  }
})
</script>
@endsection
