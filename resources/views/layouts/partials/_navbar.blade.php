  <header class="p-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="Patton Security Investigation and Agency" width="100%">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
              <a class="nav-link" href="/register">Register
              </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-warning" data-toggle="modal" data-target="#login-modal">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
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
            <div class="alert alert-danger" role="alert">
              ERROR MESSAGE HERE. DO NOT REMOVE THIS --> Don't have an account?
              <a href="register.html" class="alert-link">Register here.</a>
            </div>
            <div class="form-group">
              <label for="login-username">Username:</label>
              <input type="text" name="login_username" id="login-username" class="form-control" placeholder="John Doe">
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="form-group">
              <label for="login-password">Password:</label>
              <input type="password" name="login_password" id="login-password" class="form-control" placeholder="John Doe">
              <div class="valid-feedback">Help text</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-block">Login</button>
          </div>
        </div>
      </div>
    </div>
  </header>