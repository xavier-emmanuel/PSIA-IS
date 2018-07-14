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
            <li class="nav-item {{ Request::is('job-vacancy') ? 'active' : '' }}">
              <a class="nav-link" href="/job-vacancy">Job Vacancy
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown {{ Request::is('applicants') || Request::is('hired-applicants') || Request::is('approved-applicants') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Applicants
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/applicants">Applicant Lists</a>
                <a class="dropdown-item" href="/hired-applicants">Hired</a>
                <a class="dropdown-item" href="/approved-applicants">Approved</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Reports
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/hired-applicant-report">Hired Applicants</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center">
              <img src="http://via.placeholder.com/50x50" alt="" class="rounded-circle">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  John D.
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/user-profile">
                    <i class="fas fa-user-circle"></i>&nbsp; Profile</a>
                  <a class="dropdown-item" href="index.html">
                    <i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>