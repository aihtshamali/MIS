@extends('layouts.uppernav')

@section('content')
<div class="content-wrapper">
        <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('permissions.store')}}" >
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group col-md-12" id="field">
                            <span class="firstspan">
                                <label for="" >Permission</label>
                                <input autocomplete="off" name="permissions[]" id="field1" type="text" class="form-control input"value="" data-items="8">
                                <button id="b1" class="btn add-more pull-right" style="    position: relative;
                                top: -34px;" type="button">+</button>
                                <label for="" >Model</label>
                                    <input autocomplete="off" value="Permission" disabled name="model[]" id="level1" type="text" class="form-control input" value="" data-items="8">
                                    <label for="" >Description (one line)</label>
                                    <input autocomplete="off" name="description[]" id="description1" type="text" class="form-control input" value="" data-items="8">                        
                                </span>

                        </div>
                    </div>
                    <div class="box-footer">
                            <button type="button" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                          </div>
                  </form>
                </div>
        </div>


{{-- 
    <div class="col-md-10" style="margin-top:20px">
     <!-- Input addon -->
     <div class="box box-info" style="max-width:50%;">
            <div class="box-header with-border">
              <h3 class="box-title">New Role</h3>
            </div>
            <div class="box-body">
                <label class="col-md-2" style="margin-top:8px">Role</label>
              <div class="input-group" id="field">
                <input type="text" class="form-control">
                <span class="input-group-addon"><i class="fa fa-check add-more" id="b1"></i></span>
              </div>
              <br>
            </div>
            <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Add Roles</button>
                  </div>
     </div>
    </div> --}}
</div>

@endsection

@section('scripttags')
<script>
        $(document).ready(function(){
          var next = 1;
          $(".add-more").click(function(e){
            //   console.log('adsf');
              
              e.preventDefault();
              var addto = "#field" + next;
              console.log(addto);
              var addRemove = "#field" + (next);
              next = next + 1;
              var newIn = '<div class="added'+(next-1)+'" > <label for="">Role </label><input name="permissions[]" autocomplete="off" class="input form-control" id="field'+ next +'" value="'+$('input#field1').val()+'" type="text"> ';
            //   var newInput = $(newIn);
              var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me pull-right" style="    position: relative;top: -34px;" >-</button><label for="" >Level</label><input autocomplete="off" value="Permission" disabled name="model[]" id="level'+next+'" type="text" class="form-control input" value="'+$('input#level1').val()+'" data-items="8"><label for="" >Description (one line)</label><input autocomplete="off" name="description[] id="decription"'+next+'"type="text" class="form-control input" value="'+$('input#description1').val()+'" data-items="8"></div> ';
            //   var removeButton = $(removeBtn);
              $("span.firstspan").before(newIn +removeBtn);
            //   $("#field").append(removeButton);
            $('#field1').val('');
            $('#level1').val('');
            $('#description1').val('');

              $("#field").attr('data-source',$(addto).attr('data-source'));
            //   console.log(("#field" + next));
            //   $("#count").val(next);              
                  $('.remove-me').click(function(e){
                      e.preventDefault();
                      var fieldNum = this.id.charAt(this.id.length-1);
                      var fieldID = "#field" + fieldNum;
                      console.log(fieldID);
                      
                      $('.added'+fieldNum).remove();
                    //   $(fieldID).remove();
                  });
          });
        });
</script>
@endsection