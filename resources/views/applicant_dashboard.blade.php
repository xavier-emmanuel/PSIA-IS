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
    @if(isset($job))
      <div class="card">
        <div class="card-body">
          <div id="card-header" class="d-flex justify-content-between mb-3">
            <h5 class="card-title">Application for <span class="text-primary">{{ $job->name }}</span></h5>
            @if($data->approved == 1 && $data->hired == 0) 
              <p>Status: <span class="badge badge-warning">Approved</span></p>
            @elseif($data->hired == 1) 
              <p>Status: <span class="badge badge-success">Hired</span></p>
            @else 
              <p>Status: <span class="badge badge-info">Pending</span></p>
            @endif
          </div>
          {!! $job->description !!}

          <hr>

          <h6 class="font-weight-bold">Interview: <span class="badge badge-{{ $data->interviewed == 1 ? 'success' : 'danger' }}"><i class="fas fa-{{ $data->interviewed == 1 ? 'check' : 'times' }}"></i>&nbsp; {{ $data->interviewed == 1 ? 'Yes' : 'No' }}</span></h6>
          @if($data->interviewed == 1)
            <h6 class="font-weight-bold">Exam: <span class="badge badge-{{ $data->score == 'Passed' ? 'success' : 'danger' }}"><i class="fas fa-{{ $data->score == 'Passed' ? 'check' : 'times' }}"></i>&nbsp; {{ $data->score == 'Passed' ? 'Passed' : 'Failed' }}</span></h6>
          @endif
        </div>
      </div>
    @else
      <div class="card mb-5" style="height: 243px;">
        <div class="card-body d-flex">
          <h5 class="card-title text-center w-100"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;No data available</h5>
        </div>
      </div>
    @endif
  </main>
@endsection

@section('scripts')
@endsection