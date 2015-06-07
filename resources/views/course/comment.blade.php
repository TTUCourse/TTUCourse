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
                    <th data-field="name" class="grey-text text-darken-1">{{ $course->course_name }}</th>
                  </tr>
                </thead>
              </table>
                <table class="Borderless grey-text comment">

                <tbody>
                  <tr>
                    <td>代碼</td>
                    <td>{{ $course->course_no }}</td>
                  </tr>
                  <tr>
                    <td>教師</td>
                    <td>{{ $teacher->name }}</td>
                  </tr>
                  <tr>
                    <td>選別</td>
                    <td>{{ $course->essential }}</td>
                  </tr>
                  <tr>
                    <td>學分</td>
                    <td>{{ $course->credit }}</td>
                  </tr>
                  <tr>
                    <td>人數</td>
                    <td>{{ $course->enrollment_limit }}</td>
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
              <form class="col s12" action="{{ url('course/'.$course->course_no) }}" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="comment" length="200"></textarea>
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
            @foreach ($comments as $comment)
            <li class="collection-item avatar">
              <img src="{{ $comment->user[0]->gravatar }}" alt="" class="circle">
              <div class="row">
                <div class="title grey-text text-darken-4">
                  <p>{{ $comment->user[0]->nickname }}</p>
                  <span class="date grey-text">{{ date('Y-n-j H:i', strtotime($comment->updated_at)) }}</span>
                  <a href="#!" class="secondary-content">
                    <i class="mdi-action-thumb-up">喜歡</i>
                  </a>
                </div>
              </div>
                <div class="row content grey-text text-darken-3">
                  {!! nl2br(e($comment->content)) !!}
                </div>
            </li>
            @endforeach
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
