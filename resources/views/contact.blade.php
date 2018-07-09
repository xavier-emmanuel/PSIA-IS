@extends('layouts.master')

@section('stylesheets')
@endsection
@section('content')
	<main class="container py-5 p-contact">
    <h2 class="text-center">Contact Us</h2>
    <hr class="line">

    <p class="lead text-center">For feedback, inquiries and suggestions you can reach us at</p>

    <div class="d-md-flex flex-md-row">
      <div class="c-box w-100 py-4 px-3 text-center">
        <div class="c-box__header mb-1 d-flex justify-content-center text-primary">
          <i class="fas fa-phone"></i>&nbsp;&nbsp;
          <h3>CALL US AT</h3>
        </div>
        <div class="c-box__details">
          <p class="mb-0">(052) 435-3992 / (052) 481-0321</p>
        </div>
      </div>
      <div class="c-box w-100 py-4 px-3 text-center">
        <div class="c-box__header mb-1 d-flex justify-content-center text-primary">
          <i class="fas fa-envelope"></i>&nbsp;&nbsp;
          <h3>EMAIL US AT</h3>
        </div>
        <div class="c-box__details">
          <p class="mb-0">patton_scrty@yahoo.com.ph</p>
        </div>
      </div>
    </div>

    <h5 class="text-center my-4 e-or">or</h5>
    <p class="lead text-center">you can leave us a message</p>

    <form action="">
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-7 col-sm-9">
          <div class="form-group">
            <label for="">Name:</label>
            <input type="text" name="" id="" class="form-control" placeholder="John Doe">
            <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
            <div class="valid-feedback">Help text</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-7 col-sm-9">
          <div class="form-group">
            <label for="">Email:</label>
            <input type="text" name="" id="" class="form-control" placeholder="example@email.com">
            <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
            <div class="valid-feedback">Help text</div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7 col-sm-9">
          <div class="form-group">
            <label for="">Subject:</label>
            <input type="text" name="" id="" class="form-control" placeholder="Subject">
            <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
            <div class="valid-feedback">Help text</div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7 col-sm-9">
          <div class="form-group">
            <label for="">Message:</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
            <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
            <div class="valid-feedback">Help text</div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7 col-sm-9">
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-warning">
              <i class="fas fa-paper-plane"></i>&nbsp; Send</button>
          </div>
        </div>
      </div>
    </form>
  </main>
@endsection
@section('scripts')
@endsection