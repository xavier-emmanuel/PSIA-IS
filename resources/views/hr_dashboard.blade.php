@extends('layouts.master')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.css' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.css') }}">
  <style>
    main {
      margin-top: 91px;
    }
  </style>
@endsection

@section('content')
	<main class="container py-5">
    <h2 class="text-center">Dashboard</h2>
    <hr class="line">

    <section class="summary">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Approved Applicant</h6>
                <i class="fas fa-check-square fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">{{ $approved }}</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Hired Applicant</h6>
                <i class="fas fa-briefcase fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">{{ $hired }}</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Active Job Post</h6>
                <i class="fas fa-thumbtack fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">{{ $job }}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mt-5">
      <h2 class="text-center">Applicant Lists</h2>
      <hr class="line">
      <table id="tbl-applicant" class="table table-hover ">
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
      </table>
    </section>
  </main>
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
              <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="John Doe" title="John Doe" class="img-thumbnail" id="image-profile" width="120px" height="120px">
            </div>
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
              <dt class="col-sm-4 dd-result">Result:</dt>
              <dd class="col-sm-8 dd-result" id="result">Hired</dd>
              <dt class="col-sm-4 dd-training-date">Training Date:</dt>
              <dd class="col-sm-8 dd-training-date" id="training-date"></dd>
              <dt class="col-sm-4 dd-date-hired">Date Hired:</dt>
              <dd class="col-sm-8 dd-date-hired" id="date-hired"></dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btn-set-interview-close" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" id="btn-set-interview">Set Interview</button>
            <button type="button" class="btn btn-warning" id="btn-set-exam" data-toggle="modal" data-target="#set-exam">Set Exam</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Set Interview Modal -->
    <div class="modal fade" id="set-interview" tabindex="-1" role="dialog" aria-labelledby="setInterviewLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm-set-interview">
            <input type="hidden" name="hdn_id" id="hdn-id">
            <input type="hidden" name="hdn_email" id="hdn-email">
            <input type="hidden" name="hdn_name" id="hdn-name">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-save-close" data-dismiss="modal">Back</button>
              <button type="submit" class="btn btn-warning btn-save">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Set Exam Modal -->
    <div class="modal fade" id="set-exam" tabindex="-1" role="dialog" aria-labelledby="setExamLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm-set-interview">
            <input type="hidden" name="hdn_id" id="hdn-id">
            <input type="hidden" name="hdn_email" id="hdn-email">
            <input type="hidden" name="hdn_name" id="hdn-name">
            <input type="hidden" name="frm_status" id="frm-status" value="Save">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="setExamLabel">Set Exam</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="">Message for:&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="exam_hiring" id="exam-hiring" value="Yes">
                  <label class="form-check-label" for="exam-hiring">Hiring</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exam_training" id="exam-training" value="No">
                  <label class="form-check-label" for="exam-training">Training</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exam_others" id="exam-others" value="No">
                  <label class="form-check-label" for="edit-exam-others">Others</label>
                </div>
              </div>
              <div class="form-group">
                <label for="exam-title">Title:</label>
                <input type="text" name="exam_title" id="exam-title" class="form-control" placeholder="Interview">
              </div>
              <div class="form-group">
                <label for="exam-message">Message:</label>
                <textarea name="exam_message" id="exam-message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group interview-field">
                <label for="">Score:&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="exam_score" id="exam-passed" value="Passed">
                  <label class="form-check-label" for="">Passed</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exam_score" id="exam-failed" value="Failed">
                  <label class="form-check-label" for="">Failed</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-back-exam" data-dismiss="modal">Back</button>
              <button type="submit" class="btn btn-warning btn-save">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/moment.js' : '/vendors/timepicker/moment.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.js' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/hr_applicant.js' : '/js/pages/hr_applicant.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('#tbl-applicant').DataTable({
        "ajax": {
            url: "/applicants/show",
            type: 'GET'
        },
      });

      $('#btn-set-interview').on('click', function () {
        $('#applicant-profile').modal('hide');
        $('#set-interview').modal('show');
        var hdn_id = $('#hdn-id').val();
        $('#btn-save-close').on('click', function () {
          $('#btn-view-profile-'+ hdn_id).click();
        });
      });

      $('#btn-set-exam').on('click', function () {
        $('#applicant-profile').modal('hide');
        $('#set-exam').modal('show');
      });
    });

    $(function () {
      $('#datetimepicker5').datetimepicker({
        icons: {
          time: 'fas fa-clock',
          date: 'fas fa-calendar-alt'
        }
      });
    });
  </script>
@endsection