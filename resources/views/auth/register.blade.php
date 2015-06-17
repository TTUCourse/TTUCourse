@extends('app')

@section('title', '註冊')

@section('content')
    <main>
    <div class="container">
      <div class="row"></div>
      <div class="row">
        <div class="col m4">
          <p>學校信箱為 <a href="https://mail.google.com/">GMail</a> 信箱，使用方法如下：</p>
          <p>若學號為 410206100</p>
          <p>帳號為：u10206100@ms.ttu.edu.tw</p>
          <p>4更換為u、6更換為g</p>
          <p>7更換為e、8更換為d</p>
          <p>密碼為身分證字號十碼，字母大寫，登入後可改</p>
          <p>其他資訊請參考<a href="http://cc.ttu.edu.tw/files/15-1003-22848,c20-1.php">學校網站</a></p>
          <p>P.S.另外僑生之密碼與本地生規則不同，請依外交部授號設定</p>
        </div>
        <form class="col m8 s12" action="{{ url('/auth/register') }}" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input name="email" type="email" class="validate" required pattern="\w\d{7,8}@ms.ttu.edu.tw"  title="請使用學校信箱">
              <label for="email">學校信箱</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <select name="department">
                <option value="B" selected>經營系所</option>
                <option value="E">電機系所</option>
                <option value="I">資工系所</option>
                <option value="C">化工系所</option>
                <option value="D">工設系所</option>
                <option value="L">應外系</option>
                <option value="M">機械系所</option>
                <option value="N">資經系所</option>
                <option value="O">光電所</option>
                <option value="K">設科所</option>
                <option value="R">產業研發班</option>
                <option value="P">能源科技碩士學位學程</option>
                <option value="Q">工程管理學位學程</option>
                <option value="S">生工系所</option>
                <option value="T">材料系所</option>
                <option value="V">媒體系</option>
                <option value="W">通訊所</option>
              </select>
              <label>你哪個科系？</label>
            </div>
            <div class="input-field col s6">
              <select name="grade">
                <option value="1" selected>大一新鮮人</option>
                <option value="2">大二小菜鳥</option>
                <option value="3">大三老菜鳥</option>
                <option value="4">大四老骨頭</option>
                <option value="5">大五延畢生</option>
                <option value="6">大六集滿點</option>
              </select>
              <label>你是幾年級？</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" required pattern=".{8,}" title="密碼長度至少八碼以上">
              <label for="password">密碼</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="password" class="validate" required pattern=".{8,}" title="請再次輸入你的密碼" onchange="this.setCustomValidity(this.value === password.value ? '' : '輸入的密碼與前一次不同！');">
              <label for="password">確認密碼</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="text" class="validate" name="lname" required>
              <label for="lname">姓</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="validate" name="fname" required>
              <label for="fname">名</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="nickname" type="text" class="validate">
              <label for="nickname">暱稱</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
                <label name="sex">生理性別：</label>
              <p>
                <input name="sex" type="radio" id="boy" value="boy" required />
                <label for="boy">男</label>
                <input name="sex" type="radio" id="girl" value="girl"/>
                <label for="girl">女</label>
              </p>
            </div>
          </div>
          <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col s12">
              <div class="input-field right">
                <button class="btn waves-effect waves-light" type="submit" name="action">註冊
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </div>
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
      $('select').material_select();
      $("form input").keypress(function(event){
        if (event.keyCode == 13) $("action").click();
      });
      @if(count($errors) > 0)
        @foreach( $errors->all() as $error)
          Materialize.toast('{{ $error }}',4000);
        @endforeach
      @endif
    });
    </script>
@endsection
