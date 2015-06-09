@extends('app')

@section('title', '404')

@section('content')
    <main>
    <div class="container">
      <div class="row"></div>
      <div class="row valign-wrapper">
        <div class="col s12 valign center-align">
            <h1 class="shake shake-little shake-constant">404</h1>
            <p></p>
            <h2 class="text-darken-2 shake shake-constant">page not found</h2>
            <p></p>
            <h3 class="text-darken-1 shake">同學，你迷路了嗎？</h3>
        </div>
      </div>
    </div>
    </main>
@stopgit 

@section('script')
    <script>
    $(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    });
    </script>
@endsection