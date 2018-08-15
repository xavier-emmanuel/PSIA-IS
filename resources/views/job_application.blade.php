@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/bootstrap-tags-input/bootstrap-tagsinput.css' : '/vendors/bootstrap-tags-input/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.css' : '/vendors/datepicker/datepicker.min.css') }}">
  <style>
    .bootstrap-tagsinput {
      width: 100%;
    }
    main {
      margin-top: 94px;
    }
  </style>
@endsection

@section('content')
<main class="container py-5">
    <h2 class="text-center">Job Application for
      <span class="text-primary font-weight-bold" id="application-heading-label">{{ $job->name }}</span>
    </h2>
    <hr class="line">

    <section id="personal-information">
      <h5 class="text-muted text-center mb-4">Personal Information</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-personal-info" name="frm_personal_info">
        {{ csrf_field() }}
        <input type="hidden" id="job-id" name="job_id" class="form-control" value="{{ $job->id }}">
        <div class="row">
          <!-- Name -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Name</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Surname, Given Name, and Middle Name)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-surname" name="application_surname" class="form-control" placeholder="Surname" value="{{ Auth::user()->last_name }}" disabled="true">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-given-name" name="application_given_name" class="form-control" placeholder="Given Name" value="{{ Auth::user()->first_name }}" disabled="true">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-middle-name" name="application_middle_name" class="form-control" placeholder="Last Name" value="{{ Auth::user()->middle_name }}" disabled="true">
            </div>
          </div>

          <!-- Present Address -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Present Address</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Present Address and Mobile Number)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-present-address" name="application_present_address" class="form-control" placeholder="Present Address" value="{{ Auth::user()->address }}" disabled="true">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+63</div>
                </div>
                <input type="text" name="application_mobile_number" id="application-mobile-number" class="form-control" placeholder="e.g. 9363339999" value="{{ str_replace('+63', '', Auth::user()->mobile) }}" disabled="true">
              </div>
            </div>
          </div>

          <!-- Provincial Address -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Provincial Address</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Provincial Address and Phone Number)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-provincial-address" name="application_provincial_address" class="form-control" placeholder="Provincial Address">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-phone-number" name="application_phone_number" class="form-control" placeholder="Phone Number">
            </div>
          </div>

          <!-- Birth -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Birth Date</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Date of Birth and Place of Birth)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-date-of-birth" name="application_date_of_birth" class="form-control" data-toggle="datepicker"
                placeholder="06/21/1995" value="{{ Auth::user()->date_of_birth }}" disabled="true">
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-place-of-birth" name="application_place_of_birth" class="form-control" placeholder="Estevez Memorial Hospital">
            </div>
          </div>

          <!-- Age to Religion -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Basic Info</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Age, Gender, Religion, Height, Weight, and Civil Status)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-age" name="application_age" class="form-control" placeholder="Age" value="{{ Auth::user()->age }}" disabled="true">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <select name="application_gender" id="application-gender" class="form-control" disabled="true">
                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-religion" name="application_religion" class="form-control" placeholder="Religion">
            </div>
          </div>

          <!-- Height to Civil Status -->
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-height" name="application_height" class="form-control" placeholder="Height (in centimeter)">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-weight" name="application_weight" class="form-control" placeholder="Weight (in kilos)">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <select name="application_civil_status" id="application-civil-status" class="form-control" disabled="true">
                <option value="Single" {{ Auth::user()->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ Auth::user()->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Widowed" {{ Auth::user()->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                <option value="Separated" {{ Auth::user()->civil_status == 'Seperated' ? 'selected' : '' }}>Separated</option>
              </select>
            </div>
          </div>

          <!-- Government ID's -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Government ID's</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(SSS Number, TIN Number, PhilHealth, License No./SBR No., Date Issued, and Date of Expiration)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sss-number" name="application_sss_number" class="form-control" placeholder="SSS Number">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-tin-number" name="application_tin_number" class="form-control" placeholder="TIN Number">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-philhealth" name="application_philhealth" class="form-control" placeholder="PhilHealth">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-license-number" name="application_license_number" class="form-control" placeholder="License No./SBR No.">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-date-issued" name="application_date_issued" class="form-control" data-toggle="datepicker"
                placeholder="Date Issued">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-date-of-expiration" name="application_date_of_expiration" class="form-control" data-toggle="datepicker"
                placeholder="Expiration Date">
            </div>
          </div>

          <!-- Family Background -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Family Background</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Name of Father, Mother &amp; Siblings, Date of Birth, and Occupation)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <!-- Father -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-name-of-father" name="application_name_of_father" class="form-control" placeholder="Name of Father">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-father-date-of-birth" name="application_father_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-father-occupation" name="application_father_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>

          <!-- Mother -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-name-of-mother" name="application_name_of_mother" class="form-control" placeholder="Name of Mother">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-mother-date-of-birth" name="application_mother_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-mother-occupation" name="application_mother_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>

          <!-- Siblings -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-1-name" name="application_sibling_1_name" class="form-control" placeholder="Name of Sibling">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-1-date-of-birth" name="application_sibling_1_date_of_birth" class="form-control"
                placeholder="Date of Birth" data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-1-occupation" name="application_sibling_1_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-2-name" name="application_sibling_2_name" class="form-control" placeholder="Name of Sibling">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-2-date-of-birth" name="application_sibling_2_date_of_birth" class="form-control"
                placeholder="Date of Birth" data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-2-occupation" name="application_sibling_2_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-3-name" name="application_sibling_3_name" class="form-control" placeholder="Name of Sibling">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-3-date-of-birth" name="application_sibling_3_date_of_birth" class="form-control"
                placeholder="Date of Birth" data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-sibling-3-occupation" name="application_sibling_3_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <!-- <div class="col-sm-12 text-right">
            <div class="form-group">
              <a class="btn btn-warning" id="application-btn-sibling">+ Add Sibling Field</a>
            </div>
          </div> -->

          <!-- Spouse -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Spouse & Children</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Name of Married Spouse and Children)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-name-of-spouse" name="application_name_of_spouse" class="form-control" placeholder="Name of Married Spouse">
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-spouse-date-of-birth" name="application_spouse_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-spouse-occupation" name="application_spouse_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-dependent" name="application_dependent" class="form-control" placeholder="Dependent">
            </div>
          </div>

          <!-- Children -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-1-name" name="application_child_1_name" class="form-control" placeholder="Name of Child">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-1-date-of-birth" name="application_child_1_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-1-occupation" name="application_child_1_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-2-name" name="application_child_2_name" class="form-control" placeholder="Name of Child">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-2-date-of-birth" name="application_child_2_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-2-occupation" name="application_child_2_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-3-name" name="application_child_3_name" class="form-control" placeholder="Name of Child">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-3-date-of-birth" name="application_child_3_date_of_birth" class="form-control" placeholder="Date of Birth"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-child-3-occupation" name="application_child_3_occupation" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <!-- <div class="col-sm-12 text-right">
            <div class="form-group">
              <button class="btn btn-warning" id="application-btn-child">+ Add Child Field</button>
            </div>
          </div> -->

          <!-- Contact person in case of emergency -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Contact Person in case of Emergency</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Name, Relation, Contact Number, and Address)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-contact-name" name="application_contact_name" class="form-control" placeholder="Name">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-contact-relation" name="application_contact_relation" class="form-control" placeholder="Relation">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-contact-number" name="application_contact_number" class="form-control" placeholder="Contact Number">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" id="application-contact-address" name="application_contact_address" class="form-control" placeholder="Address">
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-personal-information-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="educational-background" class="d-none">
      <h5 class="text-muted text-center mb-4">Educational Background</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-educational-background" name="frm_educational_background">
        {{ csrf_field() }}
        <div class="row">
          <!-- Elementary -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Elementary</h6>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-elementary" name="application_elementary" class="form-control" placeholder="School">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-elementary-honor" name="application_elementary_honor" class="form-control" placeholder="Honor/Award">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-elementary-year-graduated" name="application_elementary_year_graduated" class="form-control"
                placeholder="Year Graduation">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_elementary_school_address" id="application-elementary-school-address" class="form-control"
                placeholder="School Address">
            </div>
          </div>

          <!-- High School -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">High School</h6>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-high-school" name="application_high_school" class="form-control" placeholder="School">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-high-school-honor" name="application_high_school_honor
              " class="form-control" placeholder="Honor/Award">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-high-school-year-graduated" name="application_high_school_year_graduated" class="form-control"
                placeholder="Year Graduation">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_high_school_school_address" id="application-high-school-school-address" class="form-control"
                placeholder="School Address">
            </div>
          </div>

          <!-- College -->
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">College</h6>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-college" name="application_college" class="form-control" placeholder="School">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-college-honor" name="application_college_honor" class="form-control" placeholder="Honor/Award">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="number" id="application-college-year-graduated" name="application_college_year_graduated" class="form-control"
                placeholder="Year Graduation">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_college_school_address" id="application-college-school-address" class="form-control"
                placeholder="School Address">
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-educational-background-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="government-exams" class="d-none">
      <h5 class="text-muted text-center mb-4">Government Exams</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-government-exams" name="frm_government_exams">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Government Exams Taken</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Type/Title of Examination, Date Taken, Place Taken, and Result/Grade)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-type-1" name="application_type_1" class="form-control" placeholder="Type/Title of Examination">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-date-taken-1" name="application_date_taken_1" class="form-control" placeholder="Date Taken"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-result-1" name="application_result_1" class="form-control" placeholder="Result/Grade">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_exam_address_1" id="application-exam-address-1" class="form-control" placeholder="Place Taken">
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-type-2" name="application_type_2" class="form-control" placeholder="Type/Title of Examination">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm22">
            <div class="form-group">
              <input type="text" id="application-date-taken-2" name="application_date_taken_2" class="form-control" placeholder="Date Taken"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-result-2" name="application_result_2" class="form-control" placeholder="Result/Grade">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_exam_address_2" id="application-exam-address-2" class="form-control" placeholder="Place Taken">
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-type-3" name="application_type_3" class="form-control" placeholder="Type/Title of Examination">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-date-taken-3" name="application_date_taken_3" class="form-control" placeholder="Date Taken"
                data-toggle="datepicker">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" id="application-result-3" name="application_result_3" class="form-control" placeholder="Result/Grade">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_exam_address_3" id="application-exam-address-3" class="form-control" placeholder="Place Taken">
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-government-exams-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="organizations" class="d-none">
      <h5 class="text-muted text-center mb-4">Organizations</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-organizations" name="frm_organizations">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Oragnizations</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Name of Organization, Years of Membership, Position)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="form-group">
              <input type="text" class="form-control" name="application_organization_name_1" id="application-organization-name-1" placeholder="Name of Organization">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-membership-year-from-1" name="application_membership_year_from_1"
                placeholder="From">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-membership-year-to-1" name="application_membership_year_to_1" placeholder="To">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_organization_position_1" id="application-organization-position-1" class="form-control"
                placeholder="Position">
            </div>
          </div>

          <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="form-group">
              <input type="text" class="form-control" name="application_organization_name_2" id="application-organization-name-2" placeholder="Name of Organization">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-membership-year-from-2" name="application_membership_year_from_2"
                placeholder="From">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-membership-year-to-2" name="application_membership_year_to_2" placeholder="To">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_organization_position_2" id="application-organization-position-2" class="form-control"
                placeholder="Position">
            </div>
          </div>

          <div class="col-lg-5 col-md-5 col-sm-12">
            <input type="text" class="form-control" name="application_organization_name_3" id="application-organization-name-3" placeholder="Name of Organization">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-membership-year-from-3" name="application_membership_year_from_3"
                placeholder="From">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-membership-year-to-3" name="application_membership_year_to_3" placeholder="To">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_organization_position_3" id="application-organization-position-3" class="form-control"
                placeholder="Position">
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-organizations-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="employment-record" class="d-none">
      <h5 class="text-muted text-center mb-4">Employment Record
        <small>(Previous Employers)</small>
      </h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form  id="frm-employment-record" name="frm_employment_record">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Employment Record</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(Company Name, Addres, Nature of Job, and etc.)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_company_name_1" id="application-company-name-1" class="form-control" placeholder="Company Name">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-employment-period-from-1" name="application_employment_period_from_1"
                placeholder="Period of Employment (From)">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-employment-period-to-1" name="application_employment_period_to_1"
                placeholder="Period of Employment (To)">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_address_1" id="application-employment-address-1" class="form-control" placeholder="Address">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_position_1" id="application-employment-position-1" class="form-control" placeholder="Last Position Held/Current Position">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_name_of_superior_1" id="application-name-of-superior-1" class="form-control" placeholder="Name of Immediate Superior">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_nature_of_job_1" id="application-nature-of-job-1" class="form-control" placeholder="Nature of Job">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_starting_salary_1" id="application-starting-salary-1" class="form-control" placeholder="Starting Salary">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_salary_1" id="application-leaving-salary-1" class="form-control" placeholder="Salary Upon Leaving">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_reason_1" id="application-leaving-reason-1" class="form-control" placeholder="Reason for Leaving">
            </div>
          </div>
          <div class="col-sm-12">
            <hr class="mt-1">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_company_name_2" id="application-company-name-2" class="form-control" placeholder="Company Name">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-employment-period-from-2" name="application_employment_period_from_2"
                placeholder="Period of Employment (From)">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-employment-period-to-2" name="application_employment_period_to_2"
                placeholder="Period of Employment (To)">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_address_2" id="application-employment-address-2" class="form-control" placeholder="Address">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_position_2" id="application-employment-position-2" class="form-control" placeholder="Last Position Held/Current Position">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_name_of_superior_2" id="application-name-of-superior-2" class="form-control" placeholder="Name of Immediate Superior">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_nature_of_job_2" id="application-nature-of-job-2" class="form-control" placeholder="Nature of Job">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_starting_salary_2" id="application-starting-salary-2" class="form-control" placeholder="Starting Salary">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_salary_2" id="application-leaving-salary-2" class="form-control" placeholder="Salary Upon Leaving">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_reason_2" id="application-leaving-reason-2" class="form-control" placeholder="Reason for Leaving">
            </div>
          </div>
          <div class="col-sm-12">
            <hr class="mt-1">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_company_name_3" id="application-company-name-3" class="form-control" placeholder="Company Name">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="input-group">
              <input type="text" class="form-control" id="application-employment-period-from-3" name="application_employment_period_from_3"
                placeholder="Period of Employment (From)">
              <div class="input-group-prepend">
                <div class="input-group-text">-</div>
              </div>
              <input type="text" class="form-control" id="application-employment-period-to-3" name="application_employment_period_to_3"
                placeholder="Period of Employment (To)">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_address_3" id="application-employment-address-3" class="form-control" placeholder="Address">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_employment_position_3" id="application-employment-position-3" class="form-control" placeholder="Last Position Held/Current Position">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_name_of_superior_3" id="application-name-of-superior-3" class="form-control" placeholder="Name of Immediate Superior">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_nature_of_job_3" id="application-nature-of-job-3" class="form-control" placeholder="Nature of Job">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_starting_salary_3" id="application-starting-salary-3" class="form-control" placeholder="Starting Salary">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_salary_3" id="application-leaving-salary-3" class="form-control" placeholder="Salary Upon Leaving">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_leaving_reason_3" id="application-leaving-reason-3" class="form-control" placeholder="Reason for Leaving">
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-employment-record-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="question" class="d-none">
      <h5 class="text-muted text-center mb-4">Questions</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-questions" name="frm_questions">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="application-dialects">What dialects or language do you speak or write?</label>
              <input type="text" name="application_dialects" id="application-dialects" class="form-control" placeholder="English" data-role="tagsinput">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Have you ever convicted/ charge in any court law?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="convictionsOptions1" name="convictionOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="convictionsOptions2" name="convictionOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_conviction_reason" id="application-conviction-reason" class="form-control" placeholder="If YES, Please write data/s and conviction/s">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Do you have any health problems?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="healthProblemOptions1" name="healthProblemOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="healthProblemOptions2" name="healthProblemOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_health_problem" id="application-health-problem" class="form-control" placeholder="If YES, Please please describe">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Have you ever had an accident or operation?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="operationOptions1" name="operationOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="operationOptions2" name="operationOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_operation"  class="form-control" placeholder="If YES, Please please describe">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="application-dialects">Who recommended you to this company?</label>
              <input type="text" name="application_recommended_by" id="application-recommended-by" class="form-control" placeholder="John Doe">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Do you have friend/s or relative/s working in the Company?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="companyRelativeOptions1" name="companyRelativeOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="companyRelativeOptions2" name="companyRelativeOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_relative"  class="form-control" placeholder="If YES, Please state name and relation">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Are you willing to be assigned to any subsidiary office of the Corporation?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="subsidiaryOptions1" name="subsidiaryOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="subsidiaryOptions2" name="subsidiaryOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_subsidary"  class="form-control" placeholder="If NO, Please state your reason">
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <label for="">Are you willing to accept provincial assignments?</label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" id="provicialAssignmentOptions1" name="provicialAssignmentOptions" value="Yes">
                <label class="form-check-label" for="">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="provicialAssignmentOptions2" name="provicialAssignmentOptions" value="No">
                <label class="form-check-label" for="">No</label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="application_assignment"  class="form-control" placeholder="If YES, Please state your preffered province of assignment">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="application-skills">Skills</label>
              <input type="text" name="application_skills" id="application-skills" class="form-control" placeholder="Data Encoder" data-role="tagsinput">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Please check appropriate box if you had an experience or training in any of the following:</label>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Accounting Work">
              <label class="form-check-label" for="defaultCheck1">
                Accounting Work
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Clerical Work">
              <label class="form-check-label" for="defaultCheck1">
                Clerical Work
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Computer Operations">
              <label class="form-check-label" for="defaultCheck1">
                Computer Operations
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Supervisory Work">
              <label class="form-check-label" for="defaultCheck1">
                Supervisory Work
              </label>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Computer Repair">
              <label class="form-check-label" for="defaultCheck1">
                Computer Repair
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Profiling Clients">
              <label class="form-check-label" for="defaultCheck1">
                Profiling Clients
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Sales Marketing">
              <label class="form-check-label" for="defaultCheck1">
                Sales Marketing
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Typing">
              <label class="form-check-label" for="defaultCheck1">
                Typing
              </label>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Stenography">
              <label class="form-check-label" for="defaultCheck1">
                Stenography
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Driving (w/ license)">
              <label class="form-check-label" for="defaultCheck1">
                Driving (w/ license)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Collection">
              <label class="form-check-label" for="defaultCheck1">
                Collection
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Programming">
              <label class="form-check-label" for="defaultCheck1">
                Programming
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="selected_skill[]" value="Others">
              <label class="form-check-label" for="defaultCheck1">
                Others
              </label>
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-questions-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="question-2" class="d-none">
      <h5 class="text-muted text-center mb-4">Additional Question</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-additional-questions" name="frm_additional_questions">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">In fifty words or less, please describe yourself. Indicate your likes and dislikes, strengths and areas of
                improvements, hobbies and interest among others</label>
              <textarea name="personal_description" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Explain why you joined Patton Security &amp; Investigation Agency Inc,.? </label>
              <textarea name="reasons_of_appying" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Briefly state our personal and career goals. How do you see yourself in five years from today? </label>
              <textarea name="carreer_goals" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">State your three (3) most important accomplishment in life: </label>
              <textarea name="personal_accomplishments" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-addtional-question-next">Next&nbsp;
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>

    <section id="personal-preferences" class="d-none">
      <h5 class="text-muted text-center mb-4">Personal Preferrences</h5>
      <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;
        <strong>NOTE: </strong> Please fill-out the form properly because you cannot edit the information you've provided once you
        click the NEXT button.
      </div>

      <form id="frm-personal-preference" name="frm_personal_preference">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-12">
            <div class="form-heading d-flex align-items-baseline">
              <h6 class="mb-0">Personal Preferences</h6>&nbsp;&nbsp;
              <small class="text-muted mb-0">(List down three (3) persons not related to you, whom you have known for two years)</small>
            </div>
            <hr class="mt-1 border-dark">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_name_1" class="form-control" placeholder="Full Name">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_occupation_1" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_contact_1" class="form-control" placeholder="Contact Number">
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_name_2" class="form-control" placeholder="Full Name">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_occupation_2" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_contact_2" class="form-control" placeholder="Contact Number">
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_name_3" class="form-control" placeholder="Full Name">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_occupation_3" class="form-control" placeholder="Occupation">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
              <input type="text" name="preference_contact_3" class="form-control" placeholder="Contact Number">
            </div>
          </div>

          <div class="col-sm-12 mt-3">
            <p class="text-justify">&emsp;&emsp;&emsp;I hereby certify that i have carefully read and understand the contents of this application
              form and that I agree to abide and be bound by the terms and conditions for my employment with Patton Security
              and Investigation Agency. Inc. I authorized the company to investigate the veracity of all information contained
              in this application. Any wittful falsification entered herein shall be considered a just cause for the forfeiture
              of this application/termination of my employment.</p>
          </div>

          <div class="col-sm-12 text-right mt-4">
            <div class="form-group">
              <button type="" class="btn btn-secondary" id="btn-application-finish">
                <i class="fas fa-check"></i>&nbsp; Finish
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/vendors/datepicker/datepicker.min.js' : '/vendors/datepicker/datepicker.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/bootstrap-tags-input/bootstrap-tagsinput.min.js' : '/vendors/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/job_application.js' : '/js/pages/job_application.js') }}"></script>
@endsection