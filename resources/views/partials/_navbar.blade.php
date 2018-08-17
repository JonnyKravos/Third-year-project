<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand">Mike E Brown</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
            <li class="{{ Request::is('publications') ? "active" : "" }}"><a href="/publications">Publications</a></li>
            <li class="{{ Request::is('forumposts') ? "active" : "" }}"><a href="/forumposts">Forum </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/profile">{{ Auth::user()->name }}</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/myPosts">My posts</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
            @else
            <li class="{{ Request::is('login') ? "active" : "" }}"><a href="/login">Login</a></li>
            <li class="{{ Request::is('admin-login') ? "active" : "" }}"><a href="/admin/login">Admin Login</a></li>
            <li class="{{ Request::is('register') ? "active" : "" }}"><a href="/register">Register</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>