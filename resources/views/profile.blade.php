@extends('layouts.hr_master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.css' : '/vendors/datepicker/datepicker.min.css') }}">
  <style>
    
  </style>
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
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
        <div class="p-profile-photo">
          <div class="card">
            <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
              <span>Photo</span>
              <i class="fas fa-question-circle form-info" style="cursor: pointer;" title="Photo" data-toggle="popover" data-content="Feeling unease with your photo? Change and upload your photo below."></i>
            </div>
            <div class="card-body">
              <div class="p-profile__image text-center">
                <img src="http://via.placeholder.com/192x192" alt="John Doe" width="150px" height="150px" class="img-thumbnail">
              </div>
              <form action="" class="text-center">
                <input type="file" class="form-control my-3">
                <button type="submit" class="btn btn-warning"><i class="fas fa-upload"></i>&nbsp; Upload Photo</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
        <div class="p-profile-account">
          <form action="">
            <div class="card">
              <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
                <span>Account Details</span>
                <i class="fas fa-question-circle form-info" style="cursor: pointer;" title="Account Details" data-toggle="popover" data-content="Account insecure? Change and update your account details below."></i>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="">Username:</label>
                      <input type="text" name="" id="" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="">New Password:</label>
                      <input type="password" name="" id="" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="">Re-type Password:</label>
                      <input type="tepasswordxt" name="" id="" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="p-profile-personal mb-4">
      <form action="">
        <div class="card">
          <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
            <span>Personal Details</span>
            <i class="fas fa-question-circle form-info" style="cursor: pointer;" title="Personal Details" data-toggle="popover" data-content="You can modify your personal details below."></i>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">First Name:</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name:</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Last Name:</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Age:</label>
                  <input type="number" name="" id="" class="form-control">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name:</label>
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
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Date of Birth:</label>
                  <input type="text" name="" id="" class="form-control" data-toggle="datepicker">
                </div>
              </div>
              <div class="col-lg-8 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Place of Birth:</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
          </div>
        </div>
      </form>
    </div>
    <div class="p-profile-contact">
      <form action="">
        <div class="card">
          <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
            <span>Contact Details</span>
            <i class="fas fa-question-circle form-info" style="cursor: pointer;" title="Contact Details" data-toggle="popover" data-content="Your account contact details should always be up-to-date."></i>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Mobile #:</label>
                  <input type="number" name="" id="" class="form-control">
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="form-group">
                  <label for="">Email Address:</label>
                  <input type="email" name="" id="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="">Permanent Address:</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection

@section('scripts')
	<script src="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.js' : '/vendors/datepicker/datepicker.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="datepicker"]').datepicker();
      $('.form-info').popover({
        trigger: 'hover'
      });
    });
  </script>
@endsection