@extends('layouts.hr_master')

@section('stylesheets')
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
            <a href="applicants.html">Applicant Lists</a>
          </li>
          <li class="breadcrumb-item ">
            <a href="hired-applicants.html">Hired</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Approved</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Approved Applicants</h2>
    <hr class="line">
    <table id="tbl-hired-applicant" class="table table-hover ">
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
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td>Security Guard</td>
          <td>+63900-000-0000</td>
          <td>23</td>
          <td>Male</td>
          <td>
            <button class="btn btn-info" title="View">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-info" title="Profile" data-toggle="modal" data-target="#applicant-profile" data-backdrop="static">
              <i class="fas fa-user-circle"></i>
            </button>
          </td>
        </tr>
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
            <button type="button" class="btn btn-warning">Contact</button>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('scripts')
  <script>
    $(document).ready(function () {
      $('#tbl-hired-applicant').dataTable();
    });
  </script>
@endsection