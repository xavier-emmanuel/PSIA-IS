@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.css' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.css') }}">
  <style>
    .c-breadcrumbs__wrapper {
      margin-top: 91px;
    }
  </style>
@endsection

@section('content')
	<div class="c-breadcrumbs__wrapper">
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
    <table id="tbl-approved-applicant" class="table table-hover ">
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
              <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="John Doe" title="John Doe" class="img-thumbnail" width="120px" height="120px">
            </div>
            <dl class="row">
              <dt class="col-sm-4">Name:</dt>
              <dd class="col-sm-8">John Doe</dd>
              <dt class="col-sm-4">Applying for:</dt>
              <dd class="col-sm-8">Security Guard</dd>
              <dt class="col-sm-4">Age:</dt>
              <dd class="col-sm-8">23</dd>
              <dt class="col-sm-4">Gender:</dt>
              <dd class="col-sm-8">Male</dd>
              <dt class="col-sm-4">Address:</dt>
              <dd class="col-sm-8">#23 P-3 example address, Legazpi City</dd>
              <dt class="col-sm-4">Contact Number:</dt>
              <dd class="col-sm-8">+639xx-xxx-xxxx</dd>
              <dt class="col-sm-4">Interview Date:</dt>
              <dd class="col-sm-8">July 10, 2018</dd>
              <dt class="col-sm-4">Inteview Time:</dt>
              <dd class="col-sm-8">09:00 AM</dd>
              <dt class="col-sm-4">Result:</dt>
              <dd class="col-sm-8">Hired</dd>
              <dt class="col-sm-4">Training Date:</dt>
              <dd class="col-sm-8">August 17, 2018 09:00 AM</dd>
              <dt class="col-sm-4">Date Hired:</dt>
              <dd class="col-sm-8">July 10, 2018</dd>
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
          <div class="modal-header">
            <h5 class="modal-title" id="setInterviewLabel">Set Inverview</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Title:</label>
              <input type="text|" name="" id="" class="form-control" placeholder="Interview">
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="form-group">
              <label for="">Title:</label>
              <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="form-group">
              <label for="">Date &amp; Time:</label>
              <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"
              />
              <div class="valid-feedback">Help text</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning">Save</button>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/moment.js' : '/vendors/timepicker/moment.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/timepicker/tempusdominus-bootstrap-4.min.js' : '/vendors/timepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
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

      $('#btn-set-interview').on('click', function () {
        $('#applicant-profile').modal('hide');
        $('#applicant-profile').on('hidden.bs.modal', function () {
          $('#set-interview').modal('show');
        });
      });
    });
  </script>
@endsection