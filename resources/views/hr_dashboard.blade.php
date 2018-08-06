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
              <dd class="col-sm-8" id="name">John Doe</dd>
              <dt class="col-sm-4">Applying for:</dt>
              <dd class="col-sm-8" id="job">Security Guard</dd>
              <dt class="col-sm-4">Age:</dt>
              <dd class="col-sm-8" id="age">23</dd>
              <dt class="col-sm-4">Gender:</dt>
              <dd class="col-sm-8" id="gender">Male</dd>
              <dt class="col-sm-4">Address:</dt>
              <dd class="col-sm-8" id="address">#23 P-3 example address, Legazpi City</dd>
              <dt class="col-sm-4">Contact Number:</dt>
              <dd class="col-sm-8" id="mobile">+639xx-xxx-xxxx</dd>
              <dt class="col-sm-4">Interview Date:</dt>
              <dd class="col-sm-8" id="interview-date">July 10, 2018</dd>
              <dt class="col-sm-4">Inteview Time:</dt>
              <dd class="col-sm-8" id="interview-time">09:00 AM</dd>
              <dt class="col-sm-4">Result:</dt>
              <dd class="col-sm-8" id="result">Hired</dd>
              <dt class="col-sm-4">Training Date:</dt>
              <dd class="col-sm-8" id="training-date">August 17, 2018 09:00 AM</dd>
              <dt class="col-sm-4">Date Hired:</dt>
              <dd class="col-sm-8" id="date-hired">July 10, 2018</dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" id="btn-set-interview">Set Interview</button>
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
                <input type="text" name="interview_title" id="" class="form-control" placeholder="Interview">
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="form-group">
                <label for="">Message:</label>
                <textarea name="interview_message" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="form-group">
                <label for="">Date &amp; Time:</label>
                <input type="text" name="interview_date" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"
                />
                <div class="valid-feedback">Help text</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/applicant.js' : '/js/pages/applicant.js') }}"></script>
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
        $('#applicant-profile').on('hidden.bs.modal', function () {

          $('#set-interview').modal('show');
        });
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