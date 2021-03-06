@extends('app')

@section('title', '登入')

@section('content')
    <main>
    <div class="container">
      <div class="row">

      </div>
      <div class="row">
        <form class="col s12" action="{{ url('/auth/login') }}" method="POST">
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <i class="mdi-communication-email prefix"></i>
              <input name="email" type="email" class="validate" required pattern="\w\d{7,8}@ms.ttu.edu.tw" title="請使用學校信箱">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <i class="mdi-action-lock prefix"></i>
              <input name="password" type="password" class="validate" required pattern=".{8,}" title="密碼長度至少八碼以上">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col m9 s12">
              <div class="input-field right">
                <button class="btn waves-effect waves-light" type="submit" name="action">登入
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div>
    </div>
    </main>
@stop
@section('script')
    <script>
    $(document).ready(function(){
      $(".button-collapse").sideNav();
      $('.parallax').parallax();
      $("form input").keypress(function(event){
        if (event.keyCode == 13) $("action").submit();
      });
      @if(count($errors) > 0)
        @foreach( $errors->all() as $error)
          Materialize.toast('{{ $error }}<a href=\"{{ url("password/email") }}\">忘記密碼？</a>',4000);
        @endforeach
      @endif
      @if(Session::has('message'))
        Materialize.toast('{{ Session::get('message') }}',4000);
      @endif
    });
    </script>
@endsection
