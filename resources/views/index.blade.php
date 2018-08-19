@extends('layouts.master')

@section('stylesheets')
    <style>
        .c-hero {
            background: url('img/hero-background.jpeg') no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 450px;
        }

        main {
            margin-top: 91px;
        }
    </style>
@endsection

@section('content')
    <main>
        <section class="c-hero mb-5 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="owl-carousel">
                    <img src="/img/banner.png" alt="" width="100%">
                </div>
            </div>
        </section>
        <section class="c-job-list container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 left-panel">
                    <div class="card c-job-list__featured mb-4" style="display: {{ $featured_jobs->count() == 0 ? 'none' : ''}}">
                        <div class="card-header bg-primary text-light">Featured Hiring</div>
                        @foreach($featured_jobs as $featured_job)
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">{{ $featured_job->name }}</h4>
                                    <small class="text-muted">{{ $featured_job->created_at->diffForHumans() }}</small>
                                </div>
                                <div><p><strong>No. of vacancy:</strong> {{ $featured_job->no_of_vacancy }}</p></div>
                                <p class="card-text">{!! $featured_job->description !!}</p>
                                <button class="btn btn-sm btn-outline-primary btn-apply" style="display: {{ Auth::check() ? Auth::user()->job_vacancy_id == $featured_job->id ? 'none' : '' : 'none' }}" data-id="{{ $featured_job->id }}" {{ Auth::check() ? Auth::user()->role != 'Applicant' ? 'disabled': Auth::user()->job_vacancy_id != 0 ? 'disabled' : '' : '' }}><i class="fas fa-briefcase"></i>&nbsp; Apply</button>
                                <p class="mb-0 text-success" style="display: {{ Auth::check() ? Auth::user()->job_vacancy_id == $featured_job->id ? '' : 'none' : 'none' }}" {{ Auth::check() ? Auth::user()->role != 'Applicant' ? 'disabled': '' : '' }}><i class="fas fa-check"></i>&nbsp; Applied</p>
                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#login-modal" style="display: {{ Auth::check() ? 'none' : '' }}"><i class="fas fa-briefcase"></i>&nbsp; Apply</button>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    <div class="card c-job-list__urgent mb-4" style="display: {{ $urgent_jobs->count() == 0 ? 'none' : ''}}">
                        <div class="card-header bg-primary text-light">Urgent Hiring</div>
                        <div class="card-body p-0">
                            @foreach($urgent_jobs as $urgent_job)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start">
                                    <img src="{{ asset(App::environment('production') ? '/public/uploads/job_vacancy' : '/uploads/job_vacancy') }}/{{ $urgent_job->image }}" alt="" class="border mr-2" width="80px">
                                    <div class="flex-column w-100">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title">{{ $urgent_job->name }}</h4>
                                            <small class="text-muted">{{ $urgent_job->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="flex-column w-100">
                                            <div>
                                                {!! str_limit($urgent_job->description, 200) !!}
                                            </div>
                                            <button class="btn btn-link p-0 btn-read-more" data-toggle="modal" data-target="#job-modal" data-user-id="{{ Auth::check() ? Auth::user()->job_vacancy_id : ''}}" data-job-id="{{ $urgent_job->id }}" data-job-name="{{ $urgent_job->name }}" data-job-description="{{ $urgent_job->description }}" data-job-vacancy="{{ $urgent_job->no_of_vacancy }}" data-job-image="{{ $urgent_job->image }}" data-job-time="{{ $urgent_job->created_at->diffForHumans() }}">Read more</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="card c-job-list__urgent mb-4" style="display: {{ $jobs->count() == 0 ? 'none' : ''}}">
                        <div class="card-header bg-primary text-light">Other Job Openings</div>
                        <div class="card-body p-0">
                            @foreach($jobs as $job)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start">
                                    <img src="{{ asset(App::environment('production') ? '/public/uploads/job_vacancy' : '/uploads/job_vacancy') }}/{{ $job->image }}" alt="" class="border mr-2" width="80px">
                                    <div class="flex-column w-100">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title">{{ $job->name }}</h4>
                                            <small class="text-muted">{{ $job->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="flex-column w-100">
                                            <div>
                                                {!! str_limit($job->description, 200) !!}
                                            </div>
                                            <button class="btn btn-link p-0 btn-read-more" data-toggle="modal" data-target="#job-modal" data-user-id="{{ Auth::check() ? Auth::user()->job_vacancy_id : ''}}" data-job-id="{{ $job->id }}" data-job-name="{{ $job->name }}" data-job-description="{{ $job->description }}" data-job-vacancy="{{ $job->no_of_vacancy }}" data-job-image="{{ $job->image }}" data-job-time="{{ $job->created_at->diffForHumans() }}">Read more</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <img src="img/ads.jpg" alt="" width="100%" class="right-panel">
                </div>
            </div>
        </section>
    </main>

    <!-- Job Modal -->
    <div class="modal fade" id="job-modal" tabindex="-1" role="dialog" aria-labelledby="job-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="job-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div><p><strong>No. of vacancy:</strong> <span id="number-of-vacancy"></span></p></div>
                <div id="job-description"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary btn-apply" id="btn-apply" style="display: {{ Auth::check() ? '' : 'none' }}" {{ Auth::check() ? Auth::user()->role != 'Applicant' ? 'disabled': Auth::user()->job_vacancy_id != 0 ? 'disabled' : '' : '' }}><i class="fas fa-briefcase"></i>&nbsp; Apply</button>
                <button type="button" class="btn btn-outline-success" id="btn-applied" style="display: {{ Auth::check() ? Auth::user()->role != 'Applicant' || Auth::user()->job_vacancy_id == 0 ? 'none' : '' : 'none' }}"><i class="fas fa-check"></i>&nbsp; Applied</button>
                <button class="btn btn-outline-primary btn-apply-login" data-dismiss="modal" data-toggle="modal" data-target="#login-modal" style="display: {{ Auth::check() ? 'none' : '' }}"><i class="fas fa-briefcase"></i>&nbsp; Apply</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
	<script>
		$(document).ready(function(){
            if(localStorage.getItem("Verified")){
                $.toast({
                    heading: 'Success',
                    text: 'Your account has been successfully verified.',
                    position: 'top-right',
                    icon: 'success',
                    hideAfter: 3500
                });
                localStorage.clear();
            }
    });
	</script>
    <script src="{{ asset(App::environment('production') ? '/public/js/pages/apply.js' : '/js/pages/apply.js') }}"></script>
    <script src="{{ asset(App::environment('production') ? '/public/js/pages/report.js' : '/js/pages/report.js') }}"></script>
@endsection