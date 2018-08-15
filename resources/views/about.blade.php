@extends('layouts.master')

@section('stylesheets')
  <style>
    main {
      margin-top: 91px;
    }

    .c-box i {
      font-size: 7em !important;
    }
  </style>
@endsection
@section('content')
	<main class="container py-5">
    <h2 class="text-center">About Us</h2>
    <hr class="line">
    <div class="d-md-flex flex-md-row">
      <div class="c-box w-100 py-4 px-3 text-center my-3">
        <div class="c-box__header mb-1 flex-column justify-content-center text-primary">
          <i class="fas fa-rocket fa-7x mb-3"></i>
          <h3>Mission</h3>
        </div>
        <div class="c-box__details">
        <p class="lead mb-0">Protect and secure the lives and property of the clients and serve in a manner consistent with the highest ideals within the industry.</p>
        </div>
      </div>
      <div class="c-box w-100 py-4 px-3 text-center my-3">
        <div class="c-box__header mb-1 flex-column justify-content-center text-primary">
          <i class="fas fa-eye fa-7x mb-3"></i>
          <h3>Vision</h3>
        </div>
        <div class="c-box__details">
          <p class="lead mb-0">We shall be the leading and foremost provider of security services, distinguished by high standard security procedures.</p>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
@endsection