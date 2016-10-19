<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title') - nurodigital</title>
    <!-- CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom_style.css') }}">
      <link rel="stylesheet" href="{{ asset('/bootstrap/dist/theme/paper/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
      <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
      <style media="screen">
      @keyframes blink {
      to { color: red; }
      }

      .my-element {
      color: blue;
      animation: blink 0.4ms steps(2, start) infinite;
      }
      </style>
      <!-- START OF SECTION CUSTOM CSS -->
        @yield('custom_style')
      <!-- END OF SECTION CUSTOM CSS -->
    <!-- END OF CSS -->

    <!-- JAVASCRIPT -->
      <!-- START OF SECTION CUSTOM JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        @yield('custom_js_top')
      <!-- END OF SECTION CUSTOM JAVASCRIPT -->
    <!-- END OF JAVASCRIPT -->
  </head>
  <body class="nordev-layout">
    <div id="wrapper">
      <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! url('/') !!}" style="color:#2196f3;font-family:Waiting for The Sunrise"><b>e-manage</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{!! url('/') !!}">{{ trans('front/site.home') }} <span class="sr-only">(current)</span></a></li>
            @if(Auth::check())
              <!-- <li><a href="#"></a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{!! url('/items/in-warehouse') !!}">In Warehouse Items</a></li>
                <li><a href="#">In Delivery Items</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Item In</a></li>
                <li><a href="#">Item Out</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Sold Items</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">All Items</a></li>
              </ul>
            </li>
            <li><a href="#">Calendar</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
              <li data-toggle="tooltip" data-placement="bottom" title="click to sign in"><a href="{!! url('/login') !!}">Sign In</a></li>
              <li><a href="{!! url('/register') !!}">Sign Up</a></li>
            @endif
            @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="avatar" src="https://avatars1.githubusercontent.com/u/7555972?v=3&s=466">&nbsp;
                 {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{!! url('/settings') !!}">Settings</a></li>
                <li><a href="{!! url('/logout') !!}">Sign Out</a></li>
              </ul>
            </li>
            @endif
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('front/site.langname') }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{!! url('language') !!}/id">Indonesia</a></li>
                <li><a href="{!! url('language') !!}/en">English</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </nav>
    <!-- START OF SECTION MAIN -->
      <div id="wrapper">
        @yield('main')
      </div>
    <!-- END OF SECTION MAIN -->
    <footer id="footer">
      <div>
        <center>
          <a href="https://github.com/noric1902/e-manage/issues/new?title=Contributing%20e-manage%20system&body=Hello%20noric1902," data-toggle="tooltip" data-placement="top" title="Send an issue to contribute">Contribute</a>
          <a href="">Copyright <!--(DMCA)--></a>
          <a href="https://github.com/noric1902">@noric1902</a>
        </center>
      </div>
      <div>
        <center>
          <!-- Made with <i class="fa fa-headphones" aria-hidden="true"></i> &amp; <i class="fa fa-heart" aria-hidden="true"></i> using <span class="my_element">Laravel 5.3</span> in South Jakarta, Indonesia -->
          2016
        </center>
      </div>
    </footer>
    </div>
    <script type="text/javascript">
      $(window).bind("load", function() {
       var footerHeight = 0,
           footerTop = 0,
           $footer = $("#footer");
       positionFooter();
       function positionFooter() {
         footerHeight = $footer.height();
         footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";

         if ( ($(document.body).height()+footerHeight) < $(window).height()) {
           $footer.css({
             position: "absolute"
           }).animate({
             top: footerTop
           })
         } else {
           $footer.css({
             position: "static"
           })
         }
       }
       $(window)
       .scroll(positionFooter)
       .resize(positionFooter)
     });

      // Tooltip
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- START OF SECTION CUSTOM JAVASCRIPT -->
      @yield('custom_js_bottom')
    <!-- END OF SECTION CUSTOM JAVASCRIPT -->
  </body>
</html>
