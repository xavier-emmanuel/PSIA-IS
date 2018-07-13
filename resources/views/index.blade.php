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
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="card c-job-list__featured mb-4">
                        <div class="card-header bg-primary text-light">Featured Hiring</div>
                        <div class="card-body">
                            <h5 class="card-title">Security Guard</h5>
                            <p class="card-text">Job content here..</p>
                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-check"></i>&nbsp; Apply</button>
                        </div>
                    </div>
                    <div class="card c-job-list__urgent mb-4">
                        <div class="card-header bg-primary text-light">Urgent Hiring</div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start">
                                    <img src="img/patton-logo.png" alt="" class="border mr-2" width="80px">
                                    <div class="flex-column w-100">
                                        <div class="d-flex justify-content-between">
                                            <h5>asdas</h5>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nostrum quidem</p>
                                        <a href="" class="btn btn-link p-0">Read more</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start">
                                    <img src="img/patton-logo.png" alt="" class="border mr-2" width="80px">
                                    <div class="flex-column w-100">
                                        <div class="d-flex justify-content-between">
                                            <h5>asdas</h5>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nostrum quidem</p>
                                        <a href="" class="btn btn-link p-0">Read more</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-start">
                                    <img src="img/patton-logo.png" alt="" class="border mr-2" width="80px">
                                    <div class="flex-column w-100">
                                        <div class="d-flex justify-content-between">
                                            <h5>asdas</h5>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nostrum quidem</p>
                                        <a href="" class="btn btn-link p-0">Read more</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <img src="img/ads.jpg" alt="" width="100%">
                </div>
            </div>
        </section>
    </main>
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
@endsection