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
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#tbl-evaluated-applicants').DataTable({
        "ajax": {
            url: "/evaluated-applicants/show",
            type: 'GET'
        },
      });
    });
  </script>
@endsection