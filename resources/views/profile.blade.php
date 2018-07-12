@extends('layouts.hr_master')

@section('stylesheets')
@endsection
@section('content')
	<div class="c-breadcrumbs__wrapper">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-flex align-items-center">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item ">
            <a href="# ">Account</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Profile</li>
        </ol>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <div class="p-profile">
      <div class="p-profile__image text-center">
        <img src="http://via.placeholder.com/192x192" alt="John Doe" width="150px" height="150px" class="rounded-circle">
      </div>
    </div>
  </main>
@endsection
@section('scripts')
@endsection