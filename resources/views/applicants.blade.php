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
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td>Security Guard</td>
          <td>+63900-000-0000</td>
          <td>23</td>
          <td>Male</td>
          <td>
            <button class="btn btn-info " title="View Profile ">
              <i class="fas fa-eye "></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@endsection
@section('scripts')
  <script>
    $(document).ready(function () {
      $('#tbl-applicant').dataTable();
    });
  </script>
@endsection