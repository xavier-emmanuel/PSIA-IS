@extends('layouts.hr_master')

@section('stylesheets')
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
            <a href="/applicants">Applicant Lists</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Hired</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Hired Applicants</h2>
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

      </tbody>
    </table>
  </main>
@endsection

@section('scripts')
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