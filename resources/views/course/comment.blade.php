@extends('app')

@section('title', '課程資訊')

@section('content')
    <main>
    <div class="row"></div>
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-content">
              <span class="card-title grey-text text-darken-1">{{ $course->course_name }}</span>
            </div>
            <div class="card-action">
              <table class="Borderless grey-text">
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
                  <div class="right">
                    <div class="row">
                      <div class="col s5">
                        <input type="checkbox" id="hideId" name="anonymous" value="1" />
                        <label for="hideId">匿名</label>
                      </div>
                      <div class="col s7">
                        <button class="btn waves-effect waves-light" type="submit" name="action">發佈
                        <i class="mdi-content-send right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
              </div>
            </div>
          </div>
          <div>
          @if (isset($comments[0]))
            <ul class="collection">
              @foreach ($comments as $comment)
              <li class="collection-item avatar">
                @if ($comment->anonymous > 0)
                <img src="{{ url('img/anonymous.png') }}" alt="" class="circle">
                @else
                <img src="{{ $comment->user[0]->gravatar }}" alt="" class="circle">
                @endif
                <div class="row">
                  <div class="title grey-text text-darken-3">
                    @if ($comment->anonymous > 0)
                    <p>ಠ_ಠ</p>
                    @else
                    <p>{{ $comment->user[0]->nickname }}</p>
                    @endif
                    <span class="date grey-text text-lighten-1">{{ date('Y-n-j H:i', strtotime($comment->updated_at)) }}</span>
                    <div class="secondary-content">
                    @if(Auth::user()->isLiked($comment->comment_uuid))
                      <a href="{{ url('comment/unlike/'.$comment->likekey) }}">
                        <i class="mdi-action-thumb-up">收回喜歡</i>
                    @else
                      <a href="{{ url('comment/like/'.$comment->likekey) }}">
                        <i class="mdi-action-thumb-up">喜歡</i>
                    @endif
                        <span >{{ $comment->rank }}</span>
                      </a>
                      {{-- if trush-disabled when you are not commnter --}}
                      @if (Auth::user()->id == $comment->user[0]->id)
                      <a href="{{ url('comment/delete/'.$comment->likekey) }}" >
                        <i class="mdi-action-delete"></i>
                      </a>
                      @else
                      <a href="#!" class="trush-disabled">
                        <i class="mdi-action-delete"></i>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row content grey-text text-darken-3">
                  {!! nl2br(e($comment->content)) !!}
                </div>
              </li>
              @endforeach
            </ul>
          @endif
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
      $(".secondary-content>a:first-child").click(function() {
        $.get(this.href, function (res){
          if (res.status == "unlike") {
            $(this).children("i").text("收回喜歡");
            this.href = this.href.replace("/like/", "/unlike/")
          }
          else {
            $(this).children("i").text("喜歡");
            this.href = this.href.replace("/unlike/", "/like/")
          }
          $(this).children("span").text(res.rank);
        }.bind(this))
        return false;
      })
    });
    </script>
@endsection
