@extends('layouts.landing')

@section('content')
  <div class="">
    <form class="form" action="/home" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="file" name="upload_file" value="">
      <button type="submit" name="button">Done</button>
    </form>
  </div>
@endsection
