@extends('app')

@section('title', '個人資料')

@section('content')
<main>
    <div class="container">
      <div class="row"></div>
      <div class="row">
        <div class="col m2">
          <img src="{{ Auth::user()->gravatar }}" alt="大頭" class="circle responsive-img">

        </div>
        <form class="col m10 s12" action="/users/profile" method="POST">
          <p>本系統使用 Gravatar 全球大頭貼系統</p>
          <p>您的 Gravatar 是一張跟著你穿梭各大網站的圖片。</p>
          <p>它會顯示在你的網誌、文章或評論的作者名稱旁邊。</p>
          <p>大頭照可以讓大家不管在哪個網站，都能一眼就認出這是你發表的文章，何不試一試？</p>
          <a href="https://zh-tw.gravatar.com/">全球認可的大頭貼</a>
          <div class="row">
            <div class="input-field col s12">
              <input disabled type="email" class="validate" required pattern="\w\d{7,8}@ms.ttu.edu.tw" value="{{ Auth::user()->email }}">
              <label for="email">學校信箱</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <select name="department">
                <option value="B">經營系所</option>
                <option value="E">電機系所</option>
                <option value="I" selected>資工系所</option>
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
              <label>科系</label>
            </div>
            <div class="input-field col s6">
              <select name="grade">
                <option value="1">大一新鮮人</option>
                <option value="2">大二小菜鳥</option>
                <option value="3">大三老菜鳥</option>
                <option value="4">大四老骨頭</option>
                <option value="5">大五延畢生</option>
                <option value="6">大六集滿點</option>
              </select>
              <label>年級</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" pattern=".{8,}" title="密碼長度至少八碼以上">
              <label for="password">修改密碼（不修改則留空）</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input disabled type="text" class="validate" value="{{ Auth::user()->lname }}">
              <label for="lname">姓</label>
            </div>
            <div class="input-field col s6">
              <input disabled type="text" class="validate" value="{{ Auth::user()->fname }}">
              <label for="fname">名</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="nickname" type="text" class="validate" value="{{ Auth::user()->nickname }}">
              <label for="nick">暱稱</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
                <label name="sex">生理性別：</label>
              <p>
                <input disabled name="sex" type="radio" id="boy" value="boy" />
                <label for="boy">男</label>
                <input disabled name="sex" type="radio" id="girl" value="girl" />
                <label for="girl">女</label>
              </p>
            </div>
          </div>
          <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col s12">
              <div class="input-field right">
                <button class="btn waves-effect waves-light" type="submit" name="action">修改
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
      $("select[name='department']").find("[value='{{ Auth::user()->department }}']").attr("selected", "selected")
      $("select[name='grade']").find("[value='{{ Auth::user()->grade }}']").attr("selected", "selected")
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
