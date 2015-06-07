@extends('app')

@section('title', '課程查詢')

@section('content')
<main>
  <div class="container">
    <div class="row section">
      <form class="col s12" action="" method="POST">
        <div class="input-field col m3">
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
        </div>
        <div class="input-field col m2">
          <input name="course_no" id="course_no" type="text" class="validate">
          <label for="course_no">課程代碼</label>
        </div>
        <div class="input-field col m2">
          <input name="course_name" id="course_name" type="text" class="validate">
          <label for="course_name">課程名稱</label>
        </div>
        <div class="input-field col m2">
          <input name="teacher" id="teacher" type="text" class="validate">
          <label for="teacher">教師名稱</label>
        </div>
        <div class="input-field right align-button">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn waves-effect waves-light" type="submit" name="action">
            <i class="mdi-action-search"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="divider"></div>
    <div class="section">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <table class="hoverable">
                <thead>
                  <tr>
                    <th data-field="id">課程代碼</th>
                    <th data-field="name">課程名稱</th>
                    <th data-field="teacher">講師</th>
                    <th data-field="type">選別</th>
                    <th data-field="credit">學分</th>
                    <th data-field="number">人數</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>G1432K</td>
                    <td>
                      <a href="#">國語文能力表達(二)</a>
                    </td>
                    <td>李懿純</td>
                    <td>必修</td>
                    <td>2</td>
                    <td>55</td>
                  </tr>
                  <tr>
                    <td>I2400</td>
                    <td>
                      <a href="#">資料結構</a>
                    </td>
                    <td>謝尚琳</td>
                    <td>必修</td>
                    <td>3</td>
                    <td>58</td>
                  </tr>
                  <tr>
                    <td>I2600A</td>
                    <td>
                      <a href="#">離散數學</a>
                    </td>
                    <td>陳俊銘</td>
                    <td>必修</td>
                    <td>3</td>
                    <td>55</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
    $('select').material_select();
    $("form input").keypress(function(event){
      if (event.keyCode == 13) $("action").click();
    });
  });
</script>
@endsection