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

    <div class="card">
      <div class="card-body">
        <div id="card-header" class="d-flex justify-content-between mb-3">
          <h5 class="card-title">Application for <span class="text-primary">Back-end Web Developer
</span></h5>
          <!-- Change badge accordngly
                badge badge-info = Pending
                badge badge-warning = Approved
                badge badge-success = Hired -->
          <p>Status: <span class="badge badge-info">Pending</span></p>
        </div>
        <p>CrunchMatch is a database created to list all of the individuals who are attending the TechCrunch Disrupt conference in San Francisco, and exhibiting in Startup Alley. It allows exhibitors to match with each other, and request meetings to chat about partnerships.<br><br>We need to record all of the individuals, their titles and their companies in this list into an excel document so that we can do further research on them.<br><br>Here are the steps:<br><br>1. Log into the CrunchMatch San Francisco website - choose "login with Brella Account" and the login will be provided via chat once the job is accepted.<br>2. Scroll down and ensure that "Matches" is selected in the menu bar under the search bar.<br>3. Please record the information for each profile into excel. You should not need to click into each profile to get this information. I will share the excel document with fields for each piece of information. There is an example picture of the profiles attached.<br>4. At 310 or so profiles, it will probably take about 2.5 hours to complete.<br>5. I need this completed by Tuesday morning Pacific Standard Time.</p>

        <hr>

        <h6 class="font-weight-bold">Interview: <span class="badge badge-success"><i class="fas fa-check"></i>&nbsp; Passed</span></h6>
        <h6 class="font-weight-bold">Exam: <span class="badge badge-danger"><i class="fas fa-times"></i>&nbsp; Failed</span></h6>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
@endsection