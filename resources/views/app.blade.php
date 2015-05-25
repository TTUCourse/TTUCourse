<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title') - 大同課評網</title>
    <meta name="description" content="大同大學課程評價網站">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffa000">
  </head>
  <body>
    <header>
      <nav class="#ffa000 amber darken-2">
        <a href="#" data-activates="nav-mobile" class="button-collapse fixed"><i class="mdi-navigation-menu"></i></a>
        <div class="container">
          <div class="nav-wrapper">
            <!-- desktop nav -->
            <a href="/" class="brand-logo">課評網</a>
            <ul class="right hide-on-med-and-down">
              <li><a href="{{ url('/auth/register') }}">註冊</a></li>
              <li><a href="{{ url('/auth/login') }}">登入</a></li>
            </ul>
            <!-- mobile nav -->
            <ul id="nav-mobile" class="side-nav">
              <li class="logo"><a href="/">首頁</a></li>
              <li class="bold"><a href="about.html" class="waves-effect waves-teal">關於</a></li>
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li class="bold">
                    <a class="collapsible-header  waves-effect waves-teal">會員</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="{{ url('/auth/register') }}">註冊</a></li>
                        <li><a href="{{ url('/auth/login') }}">登入</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

	@yield('content')

    <footer class="page-footer #ff8f00 amber darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Help us on Github!</h5>
            <p class="grey-text text-lighten-4">You can help us improve the site on github! <a href="https://github.com/TTUCourse/TTUCourse">TTUCourse</a></p>

          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">首頁</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="http://www.ttu.edu.tw/bin/home.php">大同大學</a></li>
              <li><a class="grey-text text-lighten-3" href="http://selquery.ttu.edu.tw/Main/ListClass.php">課程資料</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2015 Copyright TTUCourse
        </div>
      </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="{{ url('js/materialize.min.js') }}"></script>
    @yield('script')
  </body>
</html>
