@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.css' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.css') }}">
  <style>
    .c-breadcrumbs__wrapper {
      margin-top: 91px;
      z-index: -1
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
          <li class="breadcrumb-item ">
            <a href="/hired-applicants">Hired</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Approved</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Approved Applicants</h2>
    <hr class="line">
    <!-- <table id="tbl-approved-applicant" class="table table-hover ">
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

    <div class="card mb-3">
      <div class="card-body d-flex">
        <figure class="mb-0">
          <img src="img/default_image.png" width="192px" height="192px" class="border">
        </figure>
        <div class="info ml-3 w-50">
          <h3 class="font-weight-bold">Charles Marnie B. Limpo</h3>
          <p class="mb-1"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;+639367995285</p>
          <p class="mb-1"><i class="fas fa-envelope"></i>&nbsp;&nbsp;charlesmarnielimpo@gmail.com</p>
          <p class="mb-1"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;#23 Example Address, Legazpi City</p>
          <p class="mb-1"><i class="fas fa-male"></i>&nbsp;&nbsp;Male</p>
          <p><i class="fas fa-smile"></i>&nbsp;&nbsp;23 years old</p>
        </div>
        <div class="d-flex flex-column align-items-end w-50">
          <p><em>Applying for: </em><span class="text-primary">&nbsp;Web Developer</span></p>

          <dl class="row">
            <dt class="col-sm-4 dd-interview-date">Interview Date:</dt>
            <dd class="col-sm-8 dd-interview-date" id="interview-date">August 27, 2018</dd>
            <dt class="col-sm-4 dd-interview-time">Interview Time:</dt>
            <dd class="col-sm-8 dd-interview-time" id="interview-time">10:00 AM</dd>
            <dt class="col-sm-4 dd-interview-time">Score:</dt>
            <dd class="col-sm-8 dd-score" id="score"><span class="badge badge-success">Passed</span></dd>
            <dt class="col-sm-4 dd-date-approved">Date Approved:</dt>
            <dd class="col-sm-8 dd-date-approved" id="date-approved">August 19, 2018</dd>
          </dl>

          <div class="d-flex justify-content-end w-100">
            <button class="btn btn-warning">Hire</button>&emsp;
            <a class="btn btn-info" id="btn-applicant-form" href="" title="View Application" ><i class="fas fa-external-link-alt"></i>&nbsp;&nbsp;View Application</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Applicant Profile Modal -->
    <div class="modal fade" id="applicant-profile" tabindex="-1" role="dialog" aria-labelledby="applicantProfileLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applicantProfileLabel">Applicant Profile</h5>
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
              <dt class="col-sm-4 dd-date-approved">Date Approved:</dt>
              <dd class="col-sm-8 dd-date-approved" id="date-approved"></dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" id="btn-hiring">Hire</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Hire Modal -->
    <div class="modal fade" id="hire-applicant" tabindex="-1" role="dialog" aria-labelledby="hireApplicantLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm-hire-applicant">
            <input type="hidden" name="hdn_id" class="hdn-id">
            <input type="hidden" name="hdn_email" class="hdn-email">
            <input type="hidden" name="hdn_name" class="hdn-name">
            <input type="hidden" name="hdn_job" class="hdn-job">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="hireApplicantLabel">Hiring</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <i class="fas fa-question-circle" style="font-size: 32px;"></i>
                <p class="mb-0 ml-2">Are you sure you want to hire <span class="font-weight-bold text-primary" id="appicant-name"></span>?</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-hire-close" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-warning" id="btn-hire">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Set Interview Modal -->
    <div class="modal fade" id="set-interview" tabindex="-1" role="dialog" aria-labelledby="setInterviewLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm-set-interview">
            <input type="hidden" name="hdn_id" class="hdn-id">
            <input type="hidden" name="hdn_email" class="hdn-email">
            <input type="hidden" name="hdn_name" class="hdn-name">
            <input type="hidden" name="frm_status" id="frm-status" value="Save">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="setInterviewLabel">Set Inverview</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Title:</label>
                <input type="text" name="interview_title" id="interview-title" class="form-control" placeholder="Interview">
              </div>
              <div class="form-group">
                <label for="">Message:</label>
                <textarea name="interview_message" id="interview-message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <label for="">Date &amp; Time:</label>
                <input type="text" name="interview_date" class="form-control datetimepicker-input interview-date" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"
                />
              </div>
              <div class="form-group interview-field">
                <label for="">Interviewed?</label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="interviewed" id="interviewed-yes" value="1">
                  <label class="form-check-label" for="">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="interviewed" id="interviewed-no" value="0" checked="checked">
                  <label class="form-check-label" for="">No</label>
                </div>
              </div>
              <div class="form-group interview-field-score">
                <label for="">Score:&nbsp; </label>
                <div class="form-check form-check-inline ml-3 passed-field">
                  <input class="form-check-input" type="radio" name="exam_score" id="exam-passed" value="Passed">
                  <label class="form-check-label" for="">Passed</label>
                </div>
                <div class="form-check form-check-inline failed-field">
                  <input class="form-check-input" type="radio" name="exam_score" id="exam-failed" value="Failed">
                  <label class="form-check-label" for="">Failed</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-save-close" data-dismiss="modal">Back</button>
              <button type="submit" class="btn btn-warning btn-save">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/moment.js' : '/vendors/timepicker/moment.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.js' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/hr_applicant.js' : '/js/pages/hr_applicant.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/report.js' : '/js/pages/report.js') }}"></script>
  <script>
    $(function () {
      $('#datetimepicker5').datetimepicker({
        icons: {
          time: 'fas fa-clock',
          date: 'fas fa-calendar-alt'
        }
      });
    });
    $(document).ready(function () {
      $('#tbl-approved-applicant').DataTable({
        "ajax": {
            url: "/approved-applicants/show",
            type: 'GET'
        },
      });

      $('#btn-hiring').on('click', function () {
        $('#applicant-profile').modal('hide');
        $('#hire-applicant').modal('show');
      });
    });
  </script>
@endsection