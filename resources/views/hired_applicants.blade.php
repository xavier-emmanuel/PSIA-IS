@extends('layouts.master')

@section('stylesheets')
  <style>
    .c-breadcrumbs__wrapper {
      margin-top: 91px;
      z-index: 1;
    }

    main {
      margin-top: 145px;
    }
  </style>
@endsection

@section('content')
	 <div class="c-breadcrumbs__wrapper fixed-top">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-flex align-items-center">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item ">
            <a href="javascript:void(0);">Applicants</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Hired</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Hired Applicants</h2>
    <hr class="line">

    <div class="row">
      @forelse($data as $applicant)
        @php
          if ($applicant->hired == 1 && $applicant->approved == 1) {
            $result = 'Hired';
          } else if ($applicant->hired == 0 && $applicant->approved == 1) {
            $result = 'Approved';
          } else {
            $result = '';
          }
        @endphp
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
            <div class="card-body text-center">
              <img src="{{ asset(App::environment('production') ? '/public/uploads/accounts' : '/uploads/accounts') }}/{{ $applicant->image }}" alt="Charles Marnie B. Limpo" class="mb-3 border" width="192px" style="border-radius: 50%;">
              <a href="#" data-toggle="modal" data-target="#applicant-profile" title="View Title" data-id="{{ $applicant->id }}" data-email="{{ $applicant->email }}" data-image="/uploads/accounts/{{ $applicant->image }}" data-name="{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}" data-job="{{ $applicant->jobVacancies->name }}" data-age="{{ $applicant->age }}" data-gender="{{ $applicant->gender }}" data-address="{{ $applicant->address }}" data-mobile="{{ $applicant->mobile }}" data-interview-title="{{ $applicant->interview_title }}" data-interview-message="{{ $applicant->interview_message }}" data-interview-date="{{ $applicant->date_of_interview }}" data-interview-time="{{ $applicant->date_of_interview }}" data-result="{{ $result }}" data-training-date="" data-date-hired="{{ $applicant->date_hired }}" data-interviewed="{{ $applicant->interviewed }}" data-score="{{ $applicant->score }}">
                <h6 class="font-weight-bold">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</h6>
              </a>
              <small><p><em>{{ $applicant->jobVacancies->name }}</em></p></small>
              <a class="btn btn-info" id="btn-applicant-form" href="/HR/applicant-form/{{ $applicant->id }}/{{ str_slug($applicant->first_name .' '. $applicant->middle_name .' '. $applicant->last_name) }}" target="_blank" title="View Application" data-id="{{ $applicant->id }}" data-email="{{ $applicant->email }}" data-image="/uploads/accounts/{{ $applicant->image }}" data-name="{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}" data-job="{{ $applicant->jobVacancies->name }}" data-age="{{ $applicant->age }}" data-gender="{{ $applicant->gender }}" data-address="{{ $applicant->address }}" data-mobile="{{ $applicant->mobile }}" data-interview-title="{{ $applicant->interview_title }}" data-interview-message="{{ $applicant->interview_message }}" data-interview-date="{{ $applicant->date_of_interview }}" data-interview-time="{{ $applicant->date_of_interview }}" data-result="{{ $result }}" data-training-date="" data-date-hired="{{ $applicant->date_hired }}" data-interviewed="{{ $applicant->interviewed }}" data-score="{{ $applicant->score }}"><i class="fas fa-paperclip"></i></a>
            </div>
          </div>
        </div>
      @empty
        <div class="card mb-5 w-100" style="height: 243px;">
          <div class="card-body d-flex">
            <figure class="mb-0">
              <img src="img/default_image.png" width="192px" height="192px" class="border">
            </figure>
            <h5 class="card-title text-center w-100"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;No data available</h5>
          </div>
        </div>
      @endforelse
    </div>

    <!-- Applicant Profile Modal -->
    <div class="modal fade" id="applicant-profile" tabindex="-1" role="dialog" aria-labelledby="applicantProfileLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applicantProfileLabel">Employee Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="image" class="text-center mb-3">
              <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="John Doe" title="John Doe" class="img-thumbnail" id="image-profile" width="120px" height="120px"></div>
            <dl class="row">
              <dt class="col-sm-4">Name:</dt>
              <dd class="col-sm-8" id="name"></dd>
              <dt class="col-sm-4">Applying for:</dt>
              <dd class="col-sm-8" id="job"></dd>
              <dt class="col-sm-4">Age:</dt>
              <dd class="col-sm-8" id="age"></dd>
              <dt class="col-sm-4">Gender:</dt>
              <dd class="col-sm-8" id="gender"></dd>
              <dt class="col-sm-4">Address:</dt>
              <dd class="col-sm-8" id="address"></dd>
              <dt class="col-sm-4">Contact Number:</dt>
              <dd class="col-sm-8" id="mobile"></dd>
              <dt class="col-sm-4 dd-interview-date">Interview Date:</dt>
              <dd class="col-sm-8 dd-interview-date" id="interview-date"></dd>
              <dt class="col-sm-4 dd-interview-time">Interview Time:</dt>
              <dd class="col-sm-8 dd-interview-time" id="interview-time"></dd>
              <dt class="col-sm-4 dd-interview-time">Interviewed?</dt>
              <dd class="col-sm-8 dd-interviewed" id="interviewed">Yes</dd>
              <dt class="col-sm-4 dd-interview-time">Score:</dt>
              <dd class="col-sm-8 dd-score" id="score"></dd>
              <dt class="col-sm-4 dd-training-date">Training Date:</dt>
              <dd class="col-sm-8 dd-training-date" id="training-date"></dd>
              <dt class="col-sm-4 dd-date-hired">Date Hired:</dt>
              <dd class="col-sm-8 dd-date-hired" id="date-hired"></dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/hr_applicant.js' : '/js/pages/hr_applicant.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/report.js' : '/js/pages/report.js') }}"></script>
@endsection