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
      <li class="active"><a href="{!! url('/') !!}">{{ trans("front/site.menu.home") }} <span class="sr-only">(current)</span></a></li>
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
        <li data-toggle="tooltip" data-placement="bottom" title="click to sign in"><a href="{!! url('/login') !!}">{{ trans("front/site.menu.sign_in") }}</a></li>
      @endif
      @if(Auth::check())
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="avatar" src="https://avatars1.githubusercontent.com/u/7555972?v=3&s=466">&nbsp;
           {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{!! url('/settings') !!}">Settings</a></li>
          <li><a href="{!! url('/user_management') !!}">{{ trans("front/site.menu.user_management") }}</a></li>
          <li><a href="{!! url('/logout') !!}">Sign Out</a></li>
        </ul>
      </li>
      @endif
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans("front/site.menu.langname") }} <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{!! url('/lang') !!}/id">Indonesia</a></li>
          <li><a href="{!! url('/lang') !!}/en">English</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
