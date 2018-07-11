@extends('layouts.gm_master')

@section('stylesheets')
@endsection

@section('content')
	<main class="container py-5">
    <h2 class="text-center">Evaluated Applicants</h2>
    <hr class="line">

     <table id="tbl-evaluated-applicants" class="table table-hover ">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Vacancy</th>
        <th>Description</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Security Guard</td>
          <td>10</td>
          <td>Lorem ipsum asdasdasasas...</td>
          <td>
            <button class="btn btn-info" title="Profile" data-toggle="modal" data-target="#applicant-profile" data-backdrop="static">
              <i class="fas fa-user"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#tbl-evaluated-applicants').dataTable();
    });
  </script>
@endsection