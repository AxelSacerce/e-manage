<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      @if(isset($title))
        @yield('title')
      @else
        {{ trans("front/site.$current_section.title") }}
      @endif
    </title>
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
      @include('front.templates.menu')
    <!-- START OF SECTION MAIN -->
      <div id="wrapper">
        @yield('main')
      </div>
    <!-- END OF SECTION MAIN -->
    <footer id="footer">
      <div>
        <center>
          <a href="https://github.com/noric1902/e-manage/issues/new?title=Contributing%20e-manage%20system&body=Hello%20noric1902," data-toggle="tooltip" data-placement="top" title="Send an issue to contribute">{{ trans("front/site.$current_section.footer.contribute") }}</a>
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
