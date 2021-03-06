<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title') - 大同課評網</title>
    <meta name="description" content="大同大學課程評價網站">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/csshake.min.css') }}">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffa000">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-39220034-5', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
  <body>
    <header>
      @if(Auth::check())
      <!-- Dropdown Structure -->
      <ul id="dropdown" class="dropdown-content">
        <li><a href="{{ url('/course/') }}">課程查詢</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/users/profile') }}">個人資料</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/auth/logout') }}">登出</a></li>
      </ul>
      @endif
      <nav class="#ffa000 amber darken-2">
        <a href="#" data-activates="nav-mobile" class="button-collapse fixed"><i class="mdi-navigation-menu"></i></a>
        <div class="container">
          <div class="nav-wrapper">
            <!-- desktop nav -->
            <a href="/" class="brand-logo">課評網</a>
            <ul class="right hide-on-med-and-down">
              @if(Auth::check())
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-button" href="#!" data-activates="dropdown">Hi，{{ Auth::user()->nickname }}<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
              @else
              <li><a href="{{ url('/auth/register') }}">註冊</a></li>
              <li><a href="{{ url('/auth/login') }}">登入</a></li>
              @endif
            </ul>
            <!-- mobile nav -->
            <ul id="nav-mobile" class="side-nav">
              @if(Auth::check())
              <li class="avatar"><a href="profile.html" class="brand-logo"><img src="{{ Auth::user()->gravatar }}" alt="大頭" class="circle responsive-img center-align"></a></li>
              @endif
              <li class="logo"><a href="/">首頁</a></li>
              @if(Auth::check())
              <li class="blod"><a href="{{ url('/course/') }}">課程查詢</a></li>
              <li class="blod"><a href="{{ url('/users/profile') }}">個人資料</a></li>
              <li class="bold"><a href="{{ url('/auth/logout') }}">登出</a></li>
              @else
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
              @endif
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
    <script type="text/javascript" src="{{ url('js/jquery-2.1.1.min.js') }}"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="{{ url('js/materialize.min.js') }}"></script>
    @yield('script')
  </body>
</html>
