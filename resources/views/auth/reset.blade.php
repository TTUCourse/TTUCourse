@extends('app')

@section('title', '重設')

@section('content')
<main>
    <div class="container">
      <div class="row"></div>
      <div class="row">
        <form class="col s12" action="{{ url('/password/reset') }}" method="POST">
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <input id="email" type="text" value="{{ $email }}" disabled>
              <label for="email">電子郵件</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <input name="password" id="password" type="password" class="validate" required pattern=".{8,}" title="密碼長度至少八碼以上">
              <label for="password">新的密碼</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <input type="password" class="validate" required pattern=".{8,}" title="請再次輸入你的密碼" onchange="this.setCustomValidity(this.value === password.value ? '' : '輸入的密碼與前一次不同！');" name="password_confirmation">
              <label for="password">確認密碼</label>
            </div>
          </div>
          <div class="row">
            <div class="col m9 s12">
              <div class="input-field right">
                <button class="btn waves-effect waves-light" type="submit" name="action">重設密碼
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </div>
          <input type="hidden" name="email" value="{{ $email }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="token" value="{{ $token }}">
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
    });
    </script>
@endsection
