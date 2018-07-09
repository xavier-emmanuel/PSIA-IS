@extends('layouts.master')

@section('stylesheets')
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
          <a href="#personal">Personal
            <br />
            <small>Personal information</small>
          </a>
        </li>
        <li>
          <a href="#account">Account
            <br />
            <small>Account information</small>
          </a>
        </li>
        <li>
          <a href="#photo">Photo
            <br />
            <small>Photo to upload</small>
          </a>
        </li>
      </ul>

      <div>
        <div id="personal" class="">
          <form action="">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="" id="" class="form-control" placeholder="John">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Domestic">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Doe">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="email" name="" id="" class="form-control" placeholder="example@email.com">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="">Mobile #</label>
                  <input type="text" name="" id="" class="form-control" placeholder="+639xx-xxx-xxxx">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Age</label>
                  <input type="number" name="" id="" class="form-control" placeholder="23">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Gender</label>
                  <select name="" id="" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Civil Status</label>
                  <select name="" id="" class="form-control">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                  </select>
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" name="" id="" class="form-control" placeholder="#23 P-3 example address, Legazpi City">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="form-group">
                  <label for="">Place of Birth</label>
                  <input type="text" name="" id="" class="form-control" placeholder="#23 P-3 example address, Legazpi City">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="">Date of Birth</label>
                  <input type="text" name="" id="" class="form-control" data-toggle="datepicker" placeholder="06/21/1995">
                  <div class="valid-feedback">Message Here</div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="account" class="">
          <form action="">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" name="" id="" class="form-control" placeholder="user_name">
                  <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="" id="" class="form-control" placeholder="********">
                  <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Re-type Password</label>
                  <input type="password" name="" id="" class="form-control" placeholder="********">
                  <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="photo" class="">
          <form action="">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Photo:</label>
                  <input type="file" name="" id="" class="form-control-file">
                  <!-- Call this div below for form validation. class="valid-feedback" means success and class="invalid-feedback" mean error -->
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Preview:</label>
                  <figure>
                    <img src="http://via.placeholder.com/192x192" alt="" width="192px" height="192px">
                  </figure>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="form-group">
                  <label for="">Captcha:</label>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
	<script src="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.js' : '/vendors/datepicker/datepicker.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/smartWizard/jquery.smartWizard.min.js' : '/vendors/smartWizard/jquery.smartWizard.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('#smartwizard').smartWizard({
        transitionEffect: 'fade',
        toolbarSettings: {
          toolbarExtraButtons: [
            $('<button></button>').html('<i class="fa fa-check"></i>&nbsp; Submit')
            .addClass('btn btn-warning')
            .prop('disabled', true)
            .on('click', function () {
              alert('Finsih button click');
            })
          ]
        }
      });

      $('[data-toggle="datepicker"]').datepicker();
    });
  </script>
@endsection