@extends('layouts.master')

@section('stylesheets')
	<!-- <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/smartWizard/smart_wizard_3.css' : '/vendors/smartWizard/smart_wizard_3.css') }}"> -->
	<link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/smartWizard/smart_wizard_theme_dots.min.css' : '/vendors/smartWizard/smart_wizard_theme_dots.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.css' : '/vendors/datepicker/datepicker.min.css') }}">
@endsection

@section('content')
  <main class="container py-5">
    <h2 class="text-center">Register</h2>
    <hr class="line"> 
    <div id="smartwizard" class="sw-theme-dots">
      <ul class="justify-content-around">
        <li>
          <a href="#personal">
            Personal
            <br />  
            <small>Personal information</small>
          </a>
        </li>
        <li>
          <a href="#account">
            Account
            <br />  
            <small>Account information</small>
          </a>
        </li>
        <li>
          <a href="#photo">
            Photo
            <br />  
            <small>Photo to upload</small>
          </a>
        </li>
      </ul>

      <div>

        <div id="personal" class="">
          <form id="frm-personal" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">First Name:</label>
                  <input type="text" name="first_name" id="first-name" class="form-control" placeholder="John"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name:</label>
                  <input type="text" name="middle_name" id="middle-name" class="form-control" placeholder="Domestic"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Last Name:</label>
                  <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Doe"></div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="form-group">
                  <label for="">Email Address:</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com"></div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="">Mobile #:</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="+639xx-xxx-xxxx"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Age:</label>
                  <input type="number" name="age" id="age" class="form-control" placeholder="23"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Gender:</label>
                  <select name="gender" id="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Civil Status:</label>
                  <select name="civil_status" id="civil-status" class="form-control">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Address:</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="#23 P-3 example address, Legazpi City"></div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="form-group">
                  <label for="">Place of Birth:</label>
                  <input type="text" name="place_of_birth" id="place-of-birth" class="form-control" placeholder="#23 P-3 example address, Legazpi City"></div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="">Date of Birth:</label>
                  <input type="text" name="date_of_birth" id="date-of-birth" class="form-control" data-toggle="datepicker" placeholder="06/21/1995"></div>
              </div>
            </div>
          </form>
        </div>

        <div id="account" class="">
          <form id="frm-account" method="post">
            {{ csrf_field() }}
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Username:</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="username"></div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Password:</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="********"></div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Re-type Password:</label>
                  <input type="password" name="retype_password" id="retype-password" class="form-control" placeholder="********"></div>
              </div>
            </div>
          </form>
        </div>

        <div id="photo" class="">
          <form id="frm-photo" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Photo:</label>
                  <input type="file" name="image" id="image" class="form-control-file"></div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <div class="div-preview">
                    <label for="">Preview:</label>
                    <figure>
                      <img src="http://via.placeholder.com/192x192" id="image-preview" alt="" width="192px" height="192px"></figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Captcha:</label>
                  <div class="g-recaptcha" data-sitekey="6Ld4T2MUAAAAAAOOPthxpLG-2Loe1FjD0gouvyoJ"></div>
                  <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Verification Modal -->
  <div class="modal fade" id="verification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form id="frm-verify" method="post" name="frm_verify">
          <input type="hidden" name="hdn_email" id="hdn-email" class="form-control">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group text-center">
              <img src="{{ asset(App::environment('production') ? '/public/img/patton-logo.png' : '/img/patton-logo.png') }}" alt="Patton Security & Investigation Agency" width="100px" height="100px"></div>
            <div class="form-group">
              <label for="v-code">Code:</label>
              <input type="text" name="v_code_input" id="v-code-input" class="form-control" placeholder="12345">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-block btn-verify">Verify</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
	<script src="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.js' : '/vendors/datepicker/datepicker.min.js') }}"></script>
  <!-- <script src="{{ asset(App::environment('production') ? '/public/vendors/smartWizard/jquery.smartWizard_3.js' : '/vendors/smartWizard/jquery.smartWizard_3.js') }}"></script> -->
  <script src="{{ asset(App::environment('production') ? '/public/vendors/smartWizard/jquery.smartWizard.min.js' : '/vendors/smartWizard/jquery.smartWizard.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/register.js' : '/js/pages/register.js') }}"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection