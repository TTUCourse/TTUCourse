@extends('app')

@section('title', '忘了')

@section('content')
    <main>
    <div class="container">
      <div class="row"></div>
      <div class="row">
        <form class="col s12" action="{{ url('/password/email') }}" method="POST">
          <div class="row">
            <div class="input-field col offset-m3 m6 s12">
              <i class="mdi-communication-email prefix"></i>
              <input name="email" type="email" class="validate" required pattern="\w\d{7,8}@ms.ttu.edu.tw" title="請使用學校信箱">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="col m9 s12">
              <div class="input-field right">
                <button class="btn waves-effect waves-light" type="submit" name="action">我忘記密碼了啾咪
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
          Materialize.toast('{{ $error }}',4000);
        @endforeach
      @endif
      @if (session('status'))
        Materialize.toast("{{ session('status') }}",4000);
      @endif
    });
    </script>
@endsection
