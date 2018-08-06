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
    <h2 class="text-center">Dashboard</h2>
    <hr class="line">

    <section class="summary">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Total Applicant</h6>
                <i class="fas fa-list fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">0</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Approved Applicant</h6>
                <i class="fas fa-check-square fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">0</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Hired Applicant</h6>
                <i class="fas fa-briefcase fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">0</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">Active Job Post</h6>
                <i class="fas fa-thumbtack fa-2x"></i>
              </div>
              <h1 class="text-center mb-0 display-3">0</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mt-5">
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
@endsection

@section('scripts')
  <script>
    $(document).ready(function () {
      $('#tbl-applicant').DataTable({
        "ajax": {
            url: "/applicants/show",
            type: 'GET'
        },
      });
    });
  </script>
@endsection