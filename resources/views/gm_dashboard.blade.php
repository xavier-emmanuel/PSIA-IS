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

    <div class="card mb-3">
      <div class="card-body d-flex">
        <figure class="mb-0">
          <img src="{{ asset('img/default_image.png') }}" width="192px" height="192px" class="border">
        </figure>
        <div class="info ml-3 w-100">
          <div class="d-flex justify-content-between align-content-center">
            <h4 class="font-weight-bold">Charles Marnie B. Limpo</h4>
            <a href="" class="ml-auto"><i class="fas fa-external-link-alt"></i>&nbsp;&nbsp;View Application</a>
          </div>
          <p class="mb-1"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;+639367995285</p>
          <p class="mb-1"><i class="fas fa-envelope"></i>&nbsp;&nbsp;charlesmarnielimpo@gmail.com</p>
          <p class="mb-1"><i class="fas fa-male"></i>&nbsp;&nbsp;Male</p>
          <!-- <p class="mb-1"><i class="fas fa-female"></i>&nbsp;&nbsp;Female</p> -->
          <p><i class="fas fa-smile"></i>&nbsp;&nbsp;23 years old</p>
          <p class="mb-0"><em>Applied for: </em><span class="text-primary">Back-end Web Developer</span></p>
        </div>
      </div>
    </div>

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
            <button type="button" class="btn btn-warning" id="btn-approval">Approve</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Approval Modal -->
    <div class="modal fade" id="approve-applicant" tabindex="-1" role="dialog" aria-labelledby="approveApplicantLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form method="post" id="frm-approve-applicant">
            <input type="hidden" name="hdn_id" id="hdn-id">
            <input type="hidden" name="hdn_email" id="hdn-email">
            <input type="hidden" name="hdn_name" id="hdn-name">
            <input type="hidden" name="hdn_job" id="hdn-job">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="approveApplicantLabel">Approval</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <i class="fas fa-question-circle" style="font-size: 32px;"></i>
                <p class="mb-0 ml-2">Are you sure you want to approve <span class="font-weight-bold text-primary" id="appicant-name"></span>?</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-approve-close" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-warning" id="btn-approve">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset(App::environment('production') ? '/public/js/pages/gm_applicant.js' : '/js/pages/gm_applicant.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#tbl-evaluated-applicants').DataTable({
        "ajax": {
            url: "/evaluated-applicants/show",
            type: 'GET'
        },
      });

      $('#btn-approval').on('click', function () {
        $('#applicant-profile').modal('hide');
        $('#approve-applicant').modal('show');
      });
    });

    $(document).ready(function(){
        if(localStorage.getItem("Approve"))
        {
            $.toast({
                heading: 'Success',
                text: 'You have successfully approved the applicant.',
                position: 'top-right',
                icon: 'success',
                hideAfter: 3500
            });
            localStorage.clear();
        }
    });
  </script>
@endsection