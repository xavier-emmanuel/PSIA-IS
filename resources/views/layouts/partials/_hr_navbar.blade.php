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
            <li class="nav-item {{ Request::is('HR-dashboard') ? 'active' : '' }}">
              <a class="nav-link" href="/HR-dashboard">Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('job-vacancy') ? 'active' : '' }}">
              <a class="nav-link" href="/job-vacancy">Job Vacancy
              </a>
            </li>
            <li class="nav-item dropdown {{ Request::is('applicants') || Request::is('hired-applicants') || Request::is('approved-applicants') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Applicants
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#application-form-modal">Application Form</a>
                <a class="dropdown-item" href="/reports/hired-applicant-report" target="_blank">Hired Applicants</a>
                <a class="dropdown-item" href="/reports/approved-applicant-report" target="_blank">Approved Applicants</a>
              </div>
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

  <div class="modal fade" id="application-form-modal" tabindex="-1" role="dialog" aria-labelledby="addJobVacancyLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <input type="hidden" name="hdn_report_id" id="hdn-report-id" value="{{ $applicant_name->id }}">
        <input type="hidden" name="hdn_report_name" id="hdn-report-name" value="{{ $slug_name }}">
            {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title" id="addJobVacancyLabel">Generate Applicant Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="applicant-form-name">Select Name:</label>
            <select name="report_applicant_name" id="report-applicant-name" class="form-control">
              @foreach($data as $applicant)
              <option value="{{ $applicant->id }}" data-name="{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a target="_blank" class="btn btn-warning" id="btn-generate">Generate</a>
        </div>
      </div>
    </div>
  </div>