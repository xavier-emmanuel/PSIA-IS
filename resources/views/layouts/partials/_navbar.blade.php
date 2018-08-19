  <header class="p-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ Auth::check() ? Auth::user()->verified == 0 ? '#' : '/' : '/'}}">
          <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="Patton Security Investigation and Agency" width="100%">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}" style="display: {{ Auth::check() ? Auth::user()->verified == 0 ? 'none' : '' : ''}}">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}" style="display: {{ Auth::check() ? Auth::user()->verified == 0 ? 'none' : '' : ''}}">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}" style="display: {{ Auth::check() ? Auth::user()->verified == 0 ? 'none' : '' : ''}}">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav" style="display: {{ Auth::check() ? 'none' : '' }}">
            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
              <a class="nav-link" href="/register">Register
              </a>
            </li>
            <li class="nav-item" style="display: {{ Auth::check() ? 'none' : '' }}">
              <a class="btn btn-warning" data-toggle="modal" data-target="#login-modal" id="login-button">Login</a>
            </li>
          </ul>
          <ul class="navbar-nav" style="display: {{ Auth::check() ? 'block' : 'none' }}">
            <li class="nav-item d-flex align-items-center">
              <img src="{{ Auth::check() ? asset(App::environment('production') ? '/public/uploads/accounts' : '/uploads/accounts') : '' }}/{{ Auth::check() ? Auth::user()->image : '' }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; background-color: #fff;" id="user-image">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <span id="user-firstname">{{ Auth::check() ? Auth::user()->first_name : '' }}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/applicant-dashboard" style="display: {{ Auth::check() ? Auth::user()->verified == 0 ? 'none' : '' : ''}}">
                    <i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
                  <a class="dropdown-item" href="/user-profile" style="display: {{ Auth::check() ? Auth::user()->verified == 0 ? 'none' : '' : ''}}">
                    <i class="fas fa-user-circle"></i>&nbsp; Profile</a>
                  <a class="dropdown-item" href="/logout">
                    <i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <form id="frm-login" name="fmr_login" action="/login" method="post">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group text-center">
                <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="Patton Security & Investigation Agency" width="100px" height="100px">
              </div>
              <div class="alert alert-danger" role="alert" id="error">
                <div class="text-center"><i class="fas fa-exclamation-triangle"></i> Invalid login credentials!</div>
                <small>Don't have an account?&nbsp;<a href="/register" class="alert-link">Register here.</a></small>
              </div>
              <div class="form-group">
                <label for="login-username">Username:</label>
                <input type="text" name="login_username" id="login-username" class="form-control" placeholder="John Doe" autocomplete="off">
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" name="login_password" id="login-password" class="form-control" placeholder="********">
                <div class="valid-feedback">Help text</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning btn-block" id="btn-login">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>