@extends('app')

@section('title', '首頁')

@section('content')
<main>
  <div class="parallax-container">
    <div class="parallax"><img src="img/classes.jpg"></div>
    <div id="card" class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue">
            <div class="card-content white-text">
              <span class="card-title">有些事情...</span>
              <p>你沒經歷過是不會知道的</p>
              <p>有些老師...</p>
              <p>你沒上過是不會懂他的好</p>
              <p>為此，也為了學分</p>
              <p>我們建置了這個網站</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section white">
    <div class="container">
      <div class="row">
        <h2 class="header">課程評論網</h2>
        <p class="grey-text text-darken-3 lighten-3">
          是一個除了教學評量外，讓學生私底下給予老師正面評價的地方，在此，學生可以互相討論不同老師所教授的課程，並且可以認識不同系所的教授。
        </p>
        <div class="col m12 l6">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col l3 m2">
                <img src="https://graph.facebook.com/100002166171160/picture?width=320&height=320" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col l9 m8">
                <span class="black-text">
                  <p>從我開始使用課程評論網之後呢，不只人緣變好，學妹也蜂擁而上</p>
                  <p>真的是太感謝他們了！</p>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col m12 l6">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col l3 m2">
                <img src="https://graph.facebook.com/1799543839/picture?width=320&height=320" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col l9 m8">
                <span class="black-text">
                  <p>自從有了課程評論網，我的腰不酸，腿也不疼了，大感謝他們。</p>
                  <p>從此之後，選課有了依據，方便的多多了呢！</p>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @if (!Auth::check())
        <p class="flow-text center-align">立刻加入所有大同學生都關注的評價網</p>
        <a id="register" class="waves-effect waves-light btn-large" href="{{ url('/auth/register') }}">立即註冊</a>
        @endif
      </div>
    </div>
  </div>
</main>
@stop
@section('script')
<script>
$(document).ready(function(){
  $(".button-collapse").sideNav();
  $('.parallax').parallax();
});
</script>
@endsection

