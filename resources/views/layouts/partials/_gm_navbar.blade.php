<header class="p-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="Patton Security Investigation and Agency" width="100%">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('GM-dashboard') ? 'active' : '' }}">
              <a class="nav-link" href="/GM-dashboard">Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center">
              <img src="{{ asset(App::environment('production') ? '/public/uploads/accounts' : '/uploads/accounts') }}/{{ Auth::check() ? Auth::user()->image : '' }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; background-color: #fff;" id="user-image">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <span id="user-firstname">{{ Auth::user()->first_name }}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/user-profile">
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
  </header>