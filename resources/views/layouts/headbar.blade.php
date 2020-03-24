<header class="main-header">
        <!-- Logo -->
        <a href="/home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>A</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Apotek</b>Ananda</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(Sentinel::check())
                  <img width="150" height="120" alt="image" class="user-image" src="/assets/img/{{ Sentinel::getUser()->img}}" alt="User Image">
                  <span class="hidden-xs">{{ Sentinel::getUser()->first_name}}</span>
                  @else
                  <span class="hidden-xs">GUEST</span>
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  @if(Sentinel::check())
                    @if(Sentinel::getUser()->first_name == 'Spider')
                      @php($time = Sentinel::getUser()->created_at)
                      @php($times = date_format($time,"d F Y"))
                      <img width="150" height="120" alt="image" class="user-image" src="/assets/img/{{ Sentinel::getUser()->img}}" alt="User Image">
                      <p>
                        {{ Sentinel::getUser()->first_name}} - Spiderman
                        <small>Member sejak {{$times}}</small>
                      </p>
                    @else
                    <img width="150" height="120" alt="image" class="user-image" src="/assets/img/{{ Sentinel::getUser()->img}}" alt="User Image">
                    <p>
                      @php ($role = Sentinel::getUser()->roles()->first()->name)
                      @php($time = Sentinel::getUser()->created_at)
                      @php($times = date_format($time,"d F Y"))
                      {{ Sentinel::getUser()->first_name}} - {{$role}}
                      <small>Member sejak {{$times}} </small>
                    </p>
                    @endif
                  @else
                  <p>
                    GUEST - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                  @endif
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <form action="/logout" method="POST">
                      {{ csrf_field() }}
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <button class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
