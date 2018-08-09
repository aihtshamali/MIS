@extends('layouts.uppernav')
@section('content')
<div class="content-wrapper">
        @foreach($permissions as $permission)
        <div class="col-md-6 col-sm-6 col-xs-12">
         
        <div class="info-box" style="margin-top:20px">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>     
          <div class="info-box-content">
            <span class="info-box-number">Permission &rarr; {{$permission->name}}</span>
            <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                {{csrf_field()}}  
              <input type="hidden" name="_method" value="DELETE">                
              <input type="submit" class="btn btn-danger pull-right" value="Delete">
              
          </form>
            @if($permission->description != null)
            <span class="info-box-text">Description &rarr; {{$permission->description}}</span>
            @else
            <span class="info-box-text">Description &rarr; NULL</span>
            @endif
          </div>
        
          
        </div>
     
      </div>
      @endforeach
</div>
        
        
@endsection