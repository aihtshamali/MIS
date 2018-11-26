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
     .w_30p{width: 46% !important;margin-top: -11% !important;}
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
                      </div>
                  </div>
              </div>
          </div>
          @auth
          <div class="pt_3p text-center">
            <div class="container">
              <div class="row">
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="{{route('monitoring_dashboard')}}" class="tile purple">
                      <h3 class="title">Monitoring</h3>
                      <hr/>
                      <p>Visit Monitoring</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.6s">
                    <a href="{{route('evaluation_dashboard')}}" class="tile orange">
                      <h3 class="title">Evaluation</h3>
                      <hr/>
                      <p>Visit Evaluation</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="" class="tile green">
                      <h3 class="title">TPV(s)</h3>
                      <hr/>
                      <p>Visit TPV(s)</p>
                    </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.8s">
                  <a href="" class="tile green">
                    <h3 class="title">Inquires</h3>
                    <hr/>
                    <p>Visit Inquires</p>
                  </a>
                </div>
                <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="{{route('trip.create')}}" class="tile orange">
                      <h3 class="title">Plan My Trip</h3>
                      <hr/>
                      <p>Visit Plan My Trip</p>
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
          <h4 class="modal-title">Login Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
          <div class="modal-body">
              <div class="form-group">
                <label>Username</label>
                <input v-model="form.username" type="text" name="username"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
                <has-error :form="form" field="username"></has-error>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input v-model="form.password" type="password" name="password"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
              </div>
              <div class="checkbox m-b-20">
                  <label>
                      <input type="checkbox" v-model="form.remember" name="remember" :class="{ 'is-invalid': form.errors.has('remember') }"> Remember Me
                  </label>
    				 </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button :disabled="form.busy" type="submit" class="btn btn-primary">Log In</button>
        </div>
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
  $(document).ready(function(){
  var show_btn=$('.show-modal');
      var show_btn=$('.show-modal');
      //$("#testmodal").modal('show');

        show_btn.click(function(){
          $("#testmodal").modal('show');
      })
    });

    // $(function() {
    //         $('#element').on('click', function( e ) {
    //             Custombox.open({
    //                 target: '#testmodal-1',
    //                 effect: 'fadein'
    //             });
    //             e.preventDefault();
    //         });
    //     });

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
