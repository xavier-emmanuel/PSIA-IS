@extends('layouts.master')

@section('stylesheets')
  <style>
    main {
      margin-top: 91px;
    }
  </style>
@endsection

@section('content')
	<main class="container py-5">
    <h2 class="text-center">Evaluated Applicants</h2>
    <hr class="line">

     <table id="tbl-evaluated-applicants" class="table table-hover ">
       <thead>
         <th>#</th>
         <th>Name</th>
         <th>Job</th>
         <th>Contact</th>
         <th>Age</th>
         <th>Gender</th>
         <th>Action</th>
       </thead>
       <tbody></tbody>
     </table>
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
              <dt class="col-sm-4 dd-interview-time">Inteview Time:</dt>
              <dd class="col-sm-8 dd-interview-time" id="interview-time"></dd>
              <dt class="col-sm-4 dd-interview-time">Interviewed?</dt>
              <dd class="col-sm-8 dd-interviewed" id="interviewed">Yes</dd>
              <dt class="col-sm-4 dd-interview-time">Score:</dt>
              <dd class="col-sm-8 dd-score" id="score"></dd>
              <dt class="col-sm-4 dd-result">Result:</dt>
              <dd class="col-sm-8 dd-result" id="result">Hired</dd>
              <dt class="col-sm-4 dd-training-date">Training Date:</dt>
              <dd class="col-sm-8 dd-training-date" id="training-date"></dd>
              <dt class="col-sm-4 dd-date-hired">Date Hired:</dt>
              <dd class="col-sm-8 dd-date-hired" id="date-hired"></dd>
            </dl>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" id="btn-approve">Approve</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset(App::environment('production') ? '/public/js/pages/gm-applicant.js' : '/js/pages/gm-applicant.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#tbl-evaluated-applicants').DataTable({
        "ajax": {
            url: "/evaluated-applicants/show",
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