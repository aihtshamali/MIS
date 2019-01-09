@extends('_Monitoring.layouts.upperNavigation')
@section('styleTags')
  <style media="screen">
    .green{
      background-color:green;color:white;
    }
    .red{
      background-color:red;color:white;
    }
    .capitalize{
      text-transform: capitalize;
    }
  </style>
@endsection
@section('content')
  <div class="row">
      <div class="col-md-12 main">
        <form class="" action="{{route('mprojectkpis.store')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Select Sector</label>
            <select class="form-control" name="sector_id">
              <option value="">Select Sector</option>
              @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group project_kpi">
            <label for="project_kpi_level_1_name" class="capitalize">Project kpi Level 1 Name</label>
            <input type="text" class="form-control" name="project_kpi_level_0_name">
            <span style="font-weight:bold;padding:1%;position:relative" class="pull-right addbutton green">+</span>
          </div>
        </form>
      </div>
  </div>
@endsection
@section('js_scripts')
<script type="text/javascript">
  $('.addbutton').on('click',function(){
    var a=$('.main > form').children().last().clone();
      var b=a.find('label').attr('for');
      b=b.split('_');
      b[3]=parseInt(b[3])+1;
      a.find('label').attr('for',b.join("_"));
      a.find('input').attr('name',b.join("_"));
      a.find('label').text(b.join(" "));
      a.removeClass('project_kpi');
      a.find('.addbutton').removeClass('green').addClass('red removebutton').removeClass('addbutton');
      a.find('.removebutton').text("-");
      a.appendTo('.main>form');
  })
  $(document).on('click','.removebutton',function(){
      $(this).parent().remove();
  })
</script>
@endsection
