
@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible" role="alert" >
        <button type="button" class="close" style ="margin-top:1px;"data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:black;">&times;</span>
        </button>
        {{$error}}
    </div>  
    

@endforeach
@endif
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" style ="margin-top:1px;"data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:black;">&times;</span>
        </button>
        {{session('success')}}
    </div>  
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" style ="margin-top:1px;"data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:black;">&times;</span>
        </button>
        {{session('error')}}
    </div>  
@endif
