@extends('layouts.uppernav')
@section('content')
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6 col-sm-6 col-xs-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <b>Register User</b></h3>
            </div>
            <div class="box-body">
              <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <span style="color:red;">*</span><label> First Name :</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    @if ($errors->has('first_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                    @endif
                  </span>
                </div>
                <div class="col-md-6">
                  <span style="color:red;">*</span><label> Last Name :</label>
                  <input class="form-control" type="text" name="last_name" value="{{old('last_name')}}" required>
                  @if ($errors->has('last_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <hr/>
              <div class="row">
                <div class="col-md-6">
                  <span style="color:red;">*</span><label> CNIC :</label>
                  <input class="form-control" type="number" id="cnic" name="cnic" value="{{ old('cnic') }}"  required>

                  @if ($errors->has('cnic'))
                    <span class="help-block">
                      <strong>{{ $errors->first('cnic') }}</strong>
                    </span>
                  @endif
                </span>
              </div>
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Father Name :</label>
                <input class="form-control" type="text"  data-placeholder="Father Name" name="father_name" value="{{old('father_name')}}"  required>

                @if ($errors->has('father_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('father_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Select Role :</label>

                <select class="form-control select2 roleSelect" name="role_id" data-placeholder="Select Role"  required>
                  <option value="" selected>Select Role</option>
                  @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
                @if ($errors->has('role_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('role_id') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="sectorSelect" data-validate="Select Sector" style="display:none">
                  <span style="color:red;">*</span><label> Select Sector :</label>
                  <select id="sectors" name="sectors[]" class="form-control select2" multiple="multiple" data-placeholder="Sectors" required style="width: 100%;">
                    @foreach ($sectors as $sector)
                      @if($sector->status == 1)
                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                      @endif
                    @endforeach
                  </select>
                     
                </div>

              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Enter User-Name :</label>
                <input autocomplete="off" class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" required>

                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Enter Email :</label>
                <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Enter Password :</label>
                <input class="form-control" id="password" type="password" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6">
                <span style="color:red;">*</span><label> Confirm Password :</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>

            </div>
            <hr/>
            <ul>
              <input type="checkbox" required style="margin-right:6px;"> I Accept the
              <b><a href="#" >Terms of Use  </a></b>
              <span>&amp;</span>
              <b><a href="#" > Privacy Policy. </a></b>
            </ul>
            <hr/>
            <div>
              <button class="btn btn-md btn-success pull-right" type="submit" style="width:200px;border-radius: 20px; font-size:20px"  >
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"> </div>
  </div>
</section>
</div>
@endsection
@section('scripttags')
  <script type="text/javascript">
  $(document).ready(function() {
      $('.select2').select2();
    var subsector_div = `<select id="sub_sectors"  name="sub_sectors[]" class="subsector_select2" required multiple="multiple" data-placeholder="Sub Sectors"  style="width: 100%; display:none">
                    <option value="" selected>Select Sub Sectors</option>
                  </select>`;
    $('.roleSelect').change(function(){
      if($('.roleSelect option:selected').text()=='chief' || $('.roleSelect option:selected').text()=='officer' || $('.roleSelect option:selected').text()=='member'){
        if($('.roleSelect option:selected').text()=='chief'){
          $('.sectorSelect').append(subsector_div);
          $('.subsector_select2').select2();
          $('#sub_sectors').show('bottom')
        }
        $('.sectorSelect').show('top');
      }
      else{
          $('#sub_sectors').next().remove('bottom')
          $('#sub_sectors').remove('bottom')
        $('.sectorSelect').hide('left');

      }
    });
   $(document).on('change', '#sectors', function() {
  var opt = $(this).val()
  // console.log(opt);
  $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '{{route("sectorselect")}}', // This is the url we gave in the route
    data: {
      "_token": "{{ csrf_token() }}",
      'data' : opt}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
      console.log(response);
      $("#sub_sectors").empty();
      $.each(response, function () {
          $('#sub_sectors').append("<option value=\""+this.id+"\">"+this.name+"</option>");
      });
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
});
  });
  </script>
@endsection
