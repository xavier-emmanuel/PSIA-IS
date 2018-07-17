@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.css' : '/vendors/datepicker/datepicker.min.css') }}">
  <style>
    .c-breadcrumbs__wrapper {
      margin-top: 91px;
    }
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
          <form name="frm_photo" id="frm-photo">
            {{ csrf_field() }}
            <div class="card">
              <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
                <span>Photo</span>
                <i class="fas fa-question-circle form-info" style="cursor: pointer;" title="Photo" data-toggle="popover" data-content="Feeling unease with your photo? Change and upload your photo below."></i>
              </div>
              <div class="card-body">
                <div class="p-profile__image text-center">
                  <img src="{{ asset(App::environment('production') ? '/public/uploads/accounts' : '/uploads/accounts') }}/{{ Auth::user()->image }}" alt="{{ Auth::user()->first_name }}" width="150px" height="150px" class="img-thumbnail" id="image-preview">
                </div>
                <div class="form-group">
                  <input type="file" class="form-control my-3" id="user-image" name="user_image">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-warning" id="btn-update-photo"><i class="fas fa-upload"></i>&nbsp; Upload Photo</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
        <div class="p-profile-account">
          <form name="frm_account_details" id="frm-account-details">
            {{ csrf_field() }}
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
                      <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="">New Password:</label>
                      <input type="password" name="new_password" id="new-password" class="form-control" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="">Re-type Password:</label>
                      <input type="password" name="retype_password" id="retype-password" class="form-control" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-warning" type="submit" id="btn-update-account"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="p-profile-personal mb-4">
      <form name="frm_personal_details" id="frm-personal-details">
        {{ csrf_field() }}
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
                  <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Auth::user()->first_name }}" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name:</label>
                  <input type="text" name="middle_name" id="middle-name" class="form-control" value="{{ Auth::user()->middle_name }}" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Last Name:</label>
                  <input type="text" name="last_name" id="last-name" class="form-control" value="{{ Auth::user()->last_name }}" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Age:</label>
                  <input type="number" name="age" id="age" class="form-control" value="{{ Auth::user()->age }}" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Gender:</label>
                  <select name="gender" id="gender" class="form-control"">
                    <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Civil Status:</label>
                  <select name="civil_status" id="civil-status" class="form-control" value="{{ Auth::user()->civil_status }}">
                    <option value="Single" {{ Auth::user()->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ Auth::user()->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Widowed" {{ Auth::user()->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    <option value="Separated" {{ Auth::user()->civil_status == 'Seperated' ? 'selected' : '' }}>Separated</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Date of Birth:</label>
                  <input type="text" name="date_of_birth" id="date-of-birth" class="form-control" data-toggle="datepicker" value="{{ Auth::user()->date_of_birth }}" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-8 col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Place of Birth:</label>
                  <input type="text" name="place_of_birth" id="place-of-birth" class="form-control" value="{{ Auth::user()->place_of_birth }}" autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-warning" type="submit" id="btn-update-personal"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
          </div>
        </div>
      </form>
    </div>
    <div class="p-profile-contact">
      <form name="frm_contact_details" id="frm-contact-details">
        {{ csrf_field() }}
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
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+63</div>
                    </div>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="{{ str_replace('+63', '', Auth::user()->mobile) }}" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="form-group">
                  <label for="">Email Address:</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="">Permanent Address:</label>
                  <input type="text" name="address" id="address" class="form-control" value="{{ Auth::user()->address }}" autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-warning" type="submit" id="btn-update-contact"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection

@section('scripts')
	<script src="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.js' : '/vendors/datepicker/datepicker.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/profile.js' : '/js/pages/profile.js') }}"></script>
@endsection