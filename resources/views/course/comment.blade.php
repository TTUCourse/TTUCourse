@extends('app')

@section('title', '課程資訊')

@section('content')
<main>
  <div class="row"></div>
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <div class="row">
          <div class="card">
            <div class="card-content">
                <table class="striped grey-text comment">
                <thead>
                  <tr>
                    <th data-field="name" class="grey-text text-darken-1">程式設計一</th>
                  </tr>
                </thead>
              </table>
                <table class="Borderless grey-text comment">

                <tbody>
                  <tr>
                    <td>代碼</td>
                    <td>A1230</td>
                  </tr>
                  <tr>
                    <td>教師</td>
                    <td>Eclair</td>
                  </tr>
                  <tr>
                    <td>選別</td>
                    <td>必修</td>
                  </tr>
                  <tr>
                    <td>學分</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>人數</td>
                    <td>60</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m8">
        <div class="card">
          <div class="card-content">
            <span class="card-title grey-text text-darken-1">留言</span>
            <div class="row">
              <form class="col s12" action="{{ url('/course/commemt/') }}" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" length="200"></textarea>
                    <label for="textarea1">分享下你的經驗吧</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col offset-m7 m2 s5">
                    <input type="checkbox" id="hideId" />
                    <label for="hideId">匿名</label>
                  </div>
                  <div class="col m3 s7">
                      <button class="btn waves-effect waves-light" type="submit" name="action">發佈
                      <i class="mdi-content-send right"></i>
                    </button>
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </div>
          </div>
        </div>
        <div>
          <ul class="collection">
            <li class="collection-item avatar">
              <img src="https://graph.facebook.com/100002166171160/picture?width=320&height=320" alt="" class="circle">
              <div class="row">
                <div class="title grey-text text-darken-3">
                  <p>被當掉的同學B</p>
                  <span class="date grey-text text-lighten-1">2015-6-21 15:20</span>
                  <a href="#!" class="secondary-content">
                    <i class="mdi-action-thumb-up">喜歡</i>
                  </a>
                </div>
              </div>
              <div class="row content grey-text text-darken-3">
                我也只能跟你說
                <br>
                加油囉wwww
                <br>
                加油囉wwww
                <br>
                加油囉wwww
                <br>因為很重要所以要說三次唷</div>
            </li>
            <li class="collection-item avatar">
              <img src="https://graph.facebook.com/100002166171160/picture?width=320&height=320" alt="" class="circle">
              <div class="row">
                <div class="title grey-text text-darken-4">
                  <p>同學C</p>
                  <span class="date grey-text">2015-6-21 21:20</span>
                  <a href="#!" class="secondary-content">
                    <i class="mdi-action-thumb-up">喜歡</i>
                  </a>
                </div>
              </div>
                <div class="row content grey-text text-darken-3">
                  從這堂課能學到的知識，比預計中的還要多多呢
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>
@stop

@section('script')
<script>
  $(document).ready(function() {
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('select').material_select();
    $("form input").keypress(function(event) {
      if (event.keyCode == 13) $("action").click();
    });
  });
</script>
@endsection
