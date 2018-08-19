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
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/default_image.png" alt="Charles Marnie B. Limpo" class="mb-3" width="192px" style="border-radius: 50%;">
            <a href="#" data-toggle="modal" data-target="#applicant-profile">
              <h6 class="font-weight-bold">Charles Marnie B. Limpo</h6>
            </a>
            <small><p><em>Web Developer</em></p></small>
            <button class="btn btn-info"><i class="fas fa-paperclip"></i></button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/default_image.png" alt="Charles Marnie B. Limpo" class="mb-3" width="192px" style="border-radius: 50%;">
            <a href="#" data-toggle="modal" data-target="#applicant-profile">
              <h6 class="font-weight-bold">Charles Marnie B. Limpo</h6>
            </a>
            <small><p><em>Web Developer</em></p></small>
            <button class="btn btn-info"><i class="fas fa-paperclip"></i></button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/default_image.png" alt="Charles Marnie B. Limpo" class="mb-3" width="192px" style="border-radius: 50%;">
            <a href="#" data-toggle="modal" data-target="#applicant-profile">
              <h6 class="font-weight-bold">Charles Marnie B. Limpo</h6>
            </a>
            <small><p><em>Web Developer</em></p></small>
            <button class="btn btn-info"><i class="fas fa-paperclip"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- <table id="tbl-hired-applicant" class="table table-hover ">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Job</th>
        <th>Contact</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Action</th>
      </thead>
      <tbody>

      </tbody>
    </table> -->

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
  <script>
    $(document).ready(function () {
      $('#tbl-hired-applicant').DataTable({
        "ajax": {
            url: "/hired-applicants/show",
            type: 'GET'
        },
      });
    });
  </script>
@endsection