@extends('layouts.hr_master')

@section('stylesheets')
@endsection

@section('content')
	<div class="c-breadcrumbs__wrapper">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-flex align-items-center">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item ">
            <a href="# ">Applicants</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Applicant Lists</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Applicant Lists</h2>
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