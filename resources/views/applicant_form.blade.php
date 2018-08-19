@extends('layouts.master')

@section('stylesheets')
  <style>
    main {
      margin-top: 91px;
    }

    .table-header {
      background-color: whitesmoke;
      border-top: 1px solid #dee2e6 !important;
      border-bottom: 1px solid #dee2e6 !important;
      padding: 0.3rem;
      font-weight: bold;
    }

    .table-subheading {
      padding: 0 !important;
    }

    .table-border-right {
      border-right: 1px solid #dee2e6 !important;
    }
  </style>
@endsection

@section('content')
	<main class="container py-5 px-0 border border-dark">

    <section id="section-one">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-center" style="width: 80%;">Application Form</h1>
        <figure class="mr-3" style="width: 20%;">
          <img src="/uploads/accounts/{{ $applicant->image }}" alt="" height="192px" width="192px" class="border border-secondary">
        </figure>
      </div>
      <div class="table-header">1. PERSONAL INFORMATION</div>
      <div class="d-flex justify-content-around table-subheading">
        <h6 class="font-weight-bold">Last Name</h6>
        <h6 class="font-weight-bold">First Name</h6>
        <h6 class="font-weight-bold">Middle Name</h6>
      </div>
      <div class="d-flex justify-content-around border-bottom">
        <p class="mb-0">{{ $applicant->last_name }}</p>
        <p class="mb-0">{{ $applicant->first_name }}</p>
        <p class="mb-0">{{ $applicant->middle_name }}</p>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 20%;"><h6>Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="border-right" style="width: 55%;"><h6>Place of Birth <small>(City/Municipality/Province)</small></h6></div>
        <div class="border-right" style="width: 5%;"><h6>Sex</h6></div>
        <div class="border-right" style="width: 15%;"><h6>Civil Status</h6></div>
        <div style="width: 5%;"><h6>Age</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 20%;"><p class="mb-0">{{ $applicant->date_of_birth }}</p></div>
        <div class="border-right" style="width: 55%;"><p class="mb-0">{{ $applicant->place_of_birth }}</p></div>
        <div class="border-right" style="width: 5%;"><p class="mb-0">{{ $applicant->gender }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="mb-0">{{ $applicant->civil_status }}</p></div>
        <div style="width: 5%;"><p class="mb-0">{{ $applicant->age }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6>Height <small>(in centimeter)</small></h6></div>
        <div class="border-right w-25"><h6>Weight <small>(in kilo)</small></h6></div>
        <div class="border-right w-25"><h6>Religion</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="mb-0">{{ $applicant->personalInfos->height }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ $applicant->personalInfos->weight }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ $applicant->personalInfos->religion }}</p></div>
        <div class="w-25"><p class="mb-0">{{ $applicant->mobile }}</p></div>
      </div>
      <div class="table-header">&emsp;1.1. Spouse <small>(Married or Unmarried)</small></div>
      <div class="d-flex justify-content-around table-subheading">
        <h6 class="font-weight-bold">Full Name</h6>
        <h6 class="font-weight-bold">Date of Birth <small>(mm-dd-yyyy)</small></h6>
        <h6 class="font-weight-bold">Occupation</h6>
        <h6 class="font-weight-bold">Dependent</h6>
      </div>
      <div class="d-flex justify-content-around border-bottom">
        <p class="mb-0">{{ empty($applicant->personalInfos->spouse_name) ? 'N/A' : $applicant->personalInfos->spouse_name }}</p>
        <p class="mb-0">{{ empty($applicant->personalInfos->spouse_birth_date) ? 'N/A' : $applicant->personalInfos->spouse_birth_date }}</p>
        <p class="mb-0">{{ empty($applicant->personalInfos->spouse_occupation) ? 'N/A' : $applicant->personalInfos->spouse_occupation }}</p>
        <p class="mb-0">{{ empty($applicant->personalInfos->spouse_dependent) ? 'N/A' : $applicant->personalInfos->spouse_dependent }}</p>
      </div>
      <div class="table-header">&emsp;1.2. Children <small>(If any)</small></div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->child_name_1) ? 'N/A' : $applicant->personalInfos->child_name_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_birth_date_1) ? 'N/A' : $applicant->personalInfos->child_birth_date_1 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_occupation_1) ? 'N/A' : $applicant->personalInfos->child_occupation_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->child_name_2) ? 'N/A' : $applicant->personalInfos->child_name_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_birth_date_2) ? 'N/A' : $applicant->personalInfos->child_birth_date_2 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_occupation_2) ? 'N/A' : $applicant->personalInfos->child_occupation_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->child_name_3) ? 'N/A' : $applicant->personalInfos->child_name_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_name_3) ? 'N/A' : $applicant->personalInfos->child_name_3 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->child_name_3) ? 'N/A' : $applicant->personalInfos->child_name_3 }}</p></div>
      </div>
      <div class="table-header">&emsp;1.3. Address</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-75"><h6>&emsp;Present Address</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-75 text-left" style="padding-left: 0.3rem;"><p class="mb-0">&emsp;&emsp;{{ $applicant->address }}</p></div>
        <div class="w-25"><p class="mb-0">{{ $applicant->mobile }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-75"><h6>&emsp;Provincial Address</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-75 text-left" style="padding-left: 0.3rem;"><p class="mb-0">&emsp;&emsp;{{ $applicant->personalInfos->provincial_address }}</p></div>
        <div class="w-25"><p class="mb-0">{{ empty($applicant->personalInfos->phone_number) ? 'N/A' : $applicant->personalInfos->phone_number }}</p></div>
      </div>
      <div class="table-header">&emsp;1.4. Government ID's</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6>SSS Number</h6></div>
        <div class="border-right w-25"><h6>Tax Identification No. (TIN)</h6></div>
        <div class="border-right w-25"><h6>PhilHealth</h6></div>
        <div class="border-right w-25"><h6>License No,/SBR No.</h6></div>
        <div class="border-right w-25"><h6>Date Issued <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6>Date of Expiration <small>(mm-dd-yyyy)</small></h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="mb-0">{{ empty($applicant->personalInfos->sss_number) ? 'N/A' : $applicant->personalInfos->sss_number }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ empty($applicant->personalInfos->tin_number) ? 'N/A' : $applicant->personalInfos->tin_number }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ empty($applicant->personalInfos->philhealth_number) ? 'N/A' : $applicant->personalInfos->philhealth_number }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ empty($applicant->personalInfos->license_number) ? 'N/A' : $applicant->personalInfos->license_number }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ empty($applicant->personalInfos->date_issued) ? 'N/A' : $applicant->personalInfos->date_issued }}</p></div>
        <div class="w-25"><p class="mb-0">{{ empty($applicant->personalInfos->expiration_date) ? 'N/A' : $applicant->personalInfos->expiration_date }}</p></div>
      </div>
      <div class="table-header">2. FAMILY MEMBERS</div>
      <div class="table-header">&emsp;2.1. Parent's Details</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->personalInfos->father_name }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalInfos->father_birth_date }}</p></div>
        <div class="w-25"><p class="my-1">{{ $applicant->personalInfos->father_occupation }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->personalInfos->mother_name }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalInfos->mother_birth_date }}</p></div>
        <div class="w-25"><p class="my-1">{{ $applicant->personalInfos->mother_occupation }}</p></div>
      </div>
      <div class="table-header">&emsp;2.2. Sibling's Details</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->siblings_name_1) ? 'N/A' : $applicant->personalInfos->siblings_name_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_birth_date_1) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_1 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_occupation_1) ? 'N/A' : $applicant->personalInfos->siblings_occupation_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->siblings_name_2) ? 'N/A' : $applicant->personalInfos->siblings_name_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_birth_date_2) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_2 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_occupation_2) ? 'N/A' : $applicant->personalInfos->siblings_occupation_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->personalInfos->siblings_name_3) ? 'N/A' : $applicant->personalInfos->siblings_name_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_birth_date_3) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_3 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->personalInfos->siblings_occupation_3) ? 'N/A' : $applicant->personalInfos->siblings_occupation_3 }}</p></div>
      </div>
      <div class="table-header">3. CONTACT PERSON <small>(In case of Emergency)</small></div>
      <div class="d-flex w-100 text-center ">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Relation</h6></div>
        <div class="w-25"><h6 class="my-1">Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50 text-left"><p class="mb-0">&emsp;&emsp;{{ $applicant->personalInfos->contact_name }}</p></div>
        <div class="border-right w-25"><p class="mb-0">{{ $applicant->personalInfos->contact_relation }}</p></div>
        <div class="w-25"><p class="mb-0">{{ $applicant->personalInfos->contact_number }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-100"><h6 class="my-1">&emsp;Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="w-100"><p class="mb-0">&emsp;&emsp;{{ $applicant->personalInfos->contact_address }}</p></div>
      </div>

      <div class="w-100 my-3 pr-3 text-right">
        <button type="" class="btn btn-secondary" id="btn-next-section-one">Next&nbsp;
          <i class="fa fa-chevron-right"></i>
        </button>
      </div>
    </section>

    <section id="section-two" class="d-none">
      <div class="table-header">4. EDUCATIONAL BACKGROUND</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><h6 class="my-1">&emsp;Name of School</h6></div>
        <div class="border-right" style="width: 40%;"><h6 class="my-1">&emsp;Address</h6></div>
        <div class="border-right" style="width: 15%;"><h6 class="my-1">Honor/Award</h6></div>
        <div style="width: 15%;"><h6 class="my-1">Year Graduated</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->elementary_school }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->elementary_address }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->educationalBackground->elementary_award) ? 'N/A' : $applicant->educationalBackground->elementary_award }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ $applicant->educationalBackground->elementary_year }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->highschool_school }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->highschool_address }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->educationalBackground->highschool_award) ? 'N/A' : $applicant->educationalBackground->highschool_award }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ $applicant->educationalBackground->highschool_year }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->college_school }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->educationalBackground->college_address }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->educationalBackground->college_award) ? 'N/A' : $applicant->educationalBackground->college_award }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ $applicant->educationalBackground->college_year }}</p></div>
      </div>
      <div class="table-header">5. GOVERNMENT EXAMS TAKEN</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><h6 class="my-1">&emsp;Type/Title of Examination</h6></div>
        <div class="border-right" style="width: 40%;"><h6 class="my-1">&emsp;Place Taken</h6></div>
        <div class="border-right" style="width: 15%;"><h6 class="my-1">Date Taken</h6></div>
        <div style="width: 15%;"><h6 class="my-1">Result/Grade</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_1) ? 'N/A' : $applicant->governmentExams->examination_1 }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_place_taken_1) ? 'N/A' : $applicant->governmentExams->examination_place_taken_1 }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_date_taken_1) ? 'N/A' : $applicant->governmentExams->examination_date_taken_1 }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_result_1) ? 'N/A' : $applicant->governmentExams->examination_result_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_2) ? 'N/A' : $applicant->governmentExams->examination_2 }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_place_taken_2) ? 'N/A' : $applicant->governmentExams->examination_place_taken_2 }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_date_taken_2) ? 'N/A' : $applicant->governmentExams->examination_date_taken_2 }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_result_2) ? 'N/A' : $applicant->governmentExams->examination_result_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_3) ? 'N/A' : $applicant->governmentExams->examination_3 }}</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->governmentExams->examination_place_taken_3) ? 'N/A' : $applicant->governmentExams->examination_place_taken_3 }}</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_date_taken_3) ? 'N/A' : $applicant->governmentExams->examination_date_taken_3 }}</p></div>
        <div class="" style="width: 15%;"><p class="my-1">{{ empty($applicant->governmentExams->examination_result_3) ? 'N/A' : $applicant->governmentExams->examination_result_3 }}</p></div>
      </div>
      <div class="table-header">6. SCHOOL/CIVIC/BUSINESS/SOCIAL ORGANIZATIONS</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">Name of Organization</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Years of Membership <small>(From-To)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Position</h6></div>
      </div>
      @php
      	$year_of_employment1 = $applicant->organizations->organization_date_from_1 .'-'. $applicant->organizations->organization_date_to_1;
      	$year_of_employment2 = $applicant->organizations->organization_date_from_2 .'-'. $applicant->organizations->organization_date_to_2;
      	$year_of_employment3 = $applicant->organizations->organization_date_from_3 .'-'. $applicant->organizations->organization_date_to_3;
      @endphp
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->organizations->organization_name_1) ? 'N/A' : $applicant->organizations->organization_name_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->organizations->organization_date_from_1) ? 'N/A' : $year_of_employment1 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->organizations->organization_name_1) ? 'N/A' : $applicant->organizations->organization_position_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->organizations->organization_name_2) ? 'N/A' : $applicant->organizations->organization_name_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->organizations->organization_date_from_2) ? 'N/A' : $year_of_employment2 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->organizations->organization_name_2) ? 'N/A' : $applicant->organizations->organization_position_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ empty($applicant->organizations->organization_name_3) ? 'N/A' : $applicant->organizations->organization_name_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->organizations->organization_date_from_3) ? 'N/A' : $year_of_employment3 }}</p></div>
        <div class="w-25"><p class="my-1">{{ empty($applicant->organizations->organization_name_3) ? 'N/A' : $applicant->organizations->organization_position_3 }}</p></div>
      </div>
      <div class="table-header">7. EMPLOYMENT RECORD <small>(Previous Employers)</small></div>
      <div class="table-header">&emsp;7.1. Company 1</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(From-To)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      @php
      	$period_of_employment1 = $applicant->employmentRecord->period_of_emlployment_from_1 .'-'. $applicant->employmentRecord->period_of_emlployment_to_1;
      	$period_of_employment2 = $applicant->employmentRecord->period_of_emlployment_from_2 .'-'. $applicant->employmentRecord->period_of_emlployment_to_2;
      	$period_of_employment3 = $applicant->employmentRecord->period_of_emlployment_from_3 .'-'. $applicant->employmentRecord->period_of_emlployment_to_3;
      @endphp
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->company_name_1) ? 'N/A' : $applicant->employmentRecord->company_name_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->period_of_emlployment_from_1) ? 'N/A' : $period_of_employment1 }}</p></div>
        <div class="w-50"><p class="my-1">{{ empty($applicant->employmentRecord->company_address_1) ? 'N/A' : $applicant->employmentRecord->company_address_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->work_position_1) ? 'N/A' : $applicant->employmentRecord->work_position_1 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->superior_name_1) ? 'N/A' : $applicant->employmentRecord->superior_name_1 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->nature_of_job_1) ? 'N/A' : $applicant->employmentRecord->nature_of_job_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->starting_salary_1) ? 'N/A' : $applicant->employmentRecord->starting_salary_1 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->salary_upon_leaving_1) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_1 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div><div class="table-header">&emsp;{{ empty($applicant->employmentRecord->reason_of_leaving_1) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_1 }}</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(From-To)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->company_name_2) ? 'N/A' : $applicant->employmentRecord->company_name_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->period_of_emlployment_from_2) ? 'N/A' : $period_of_employment2 }}</p></div>
        <div class="w-50"><p class="my-1">{{ empty($applicant->employmentRecord->company_address_2) ? 'N/A' : $applicant->employmentRecord->company_address_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->work_position_2) ? 'N/A' : $applicant->employmentRecord->work_position_2 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->superior_name_2) ? 'N/A' : $applicant->employmentRecord->superior_name_2 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->nature_of_job_2) ? 'N/A' : $applicant->employmentRecord->nature_of_job_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->starting_salary_2) ? 'N/A' : $applicant->employmentRecord->starting_salary_2 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->salary_upon_leaving_2) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_2 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->reason_of_leaving_2) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_2 }}</p></div>
      </div><div class="table-header">&emsp;7.3. Company 3</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(From-To)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->company_name_3) ? 'N/A' : $applicant->employmentRecord->company_name_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ empty($applicant->employmentRecord->period_of_emlployment_from_3) ? 'N/A' : $period_of_employment3 }}</p></div>
        <div class="w-50"><p class="my-1">{{ empty($applicant->employmentRecord->company_address_3) ? 'N/A' : $applicant->employmentRecord->company_address_3 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->work_position_3) ? 'N/A' : $applicant->employmentRecord->work_position_3 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->superior_name_3) ? 'N/A' : $applicant->employmentRecord->superior_name_3 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->nature_of_job_3) ? 'N/A' : $applicant->employmentRecord->nature_of_job_3 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving</h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->starting_salary_3) ? 'N/A' : $applicant->employmentRecord->starting_salary_3 }}</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->salary_upon_leaving_3) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_3 }}</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">{{ empty($applicant->employmentRecord->reason_of_leaving_3) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_3 }}</p></div>
      </div>

      <div class="w-100 my-3 pr-3 text-right">
        <button type="" class="btn btn-secondary" id="btn-prev-section-two"><i class="fa fa-chevron-left"></i>&nbsp; Previous
        </button>
        <button type="" class="btn btn-secondary" id="btn-next-section-two">Next&nbsp;
          <i class="fa fa-chevron-right"></i>
        </button>
      </div>
    </section>

    <section id="section-three" class="d-none">
      <div class="table-header">8. OTHERS</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Dialects/Language</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Skills</h6></div>
        <div class="border-right w-50"><h6 class="my-1">Have you ever convicted? <small>(If YES, state the reason)</small></h6></div>
      </div>
      @php
      	if ($applicant->questions->convicted == '0') {
      		$convicted = 'No';
      	} else {
      		$convicted = 'Yes, '. $applicant->questions->convicted_details;
      	}

      	if ($applicant->questions->health_problems == '0') {
      		$health_problems = 'No';
      	} else {
      		$health_problems = 'Yes, '. $applicant->questions->health_problems_details;
      	}

      	if ($applicant->questions->accident == '0') {
      		$accident = 'No';
      	} else {
      		$accident = 'Yes, '. $applicant->questions->accident_details;
      	}

      	if ($applicant->questions->relative == '0') {
      		$relative = 'No';
      	} else {
      		$relative = 'Yes, '. $applicant->questions->relative_name;
      	}

      	if ($applicant->questions->provincial_assignments == '0') {
      		$provincial_assignments = 'No';
      	} else {
      		$provincial_assignments = 'Yes, '. $applicant->questions->preffered_office;
      	}
      @endphp
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">{{ $applicant->questions->dialect }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->questions->skills }}</p></div>
        <div class="border-right w-50"><p class="my-1">{{ $convicted }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Do you have any health problems <small>(If YES, kindly describe)</small></h6></div>
        <div class="border-right w-50"><h6 class="my-1">Have you ever had an operation/accident? <small>(If YES, kindly describe)</small></h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">{{ $health_problems }}</p></div>
        <div class="border-right w-50"><p class="my-1">{{ $accident }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Who recommended you in this company?</h6></div>
        <div class="border-right w-50"><h6 class="my-1">Do you have friend(s) or relative(s) working in the company? <small>(If YES, kindly state the name and relation)</small></h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">{{ empty($applicant->questions->recommend_name) ? 'N/A' : $applicant->questions->recommend_name }}</p></div>
        <div class="border-right w-50"><p class="my-1">{{ $relative }}</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Are you willing to accept provincial assignments? <small>(If YES, kindly state your preffered province)</small></h6></div>
        <div class="border-right w-50"><h6 class="my-1">Other experiences/training(s)</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">{{ $provincial_assignments }}</p></div>
        <div class="border-right w-50"><p class="my-1">{{ $applicant->questions->skills_select }}</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;In fifty words or less, please describe yourself. Indicate your likes and dislikes, strengths and areas of improvements, hobbies and interest among others</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;{{ $applicant->questions->self_description }}</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;Explain why you joined Patton Security & Investigation Agency Inc,.?</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;{{ $applicant->questions->reason_of_applying }}</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;Briefly state our personal and career goals. How do you see yourself in five years from today?</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;{{ $applicant->questions->career_goals }}</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;State your three (3) most important accomplishment in life:</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;{{ $applicant->questions->accomplishments }}</p></div>
      </div>
      <div class="table-header">9. PERSONAL PREFERENCES <small>(List down three (3) persons not related to you, whom you have known for two years)</small></div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Occupation</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->personalPreference->preference_name_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_occupation_1 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_contact_1 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->personalPreference->preference_name_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_occupation_2 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_contact_2 }}</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;{{ $applicant->personalPreference->preference_name_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_occupation_3 }}</p></div>
        <div class="border-right w-25"><p class="my-1">{{ $applicant->personalPreference->preference_contact_3 }}</p></div>
      </div>

      <p class="w-100 justified mt-4 p-3">&emsp;I hereby certify that i have carefully read and understand the contents of this application form and that I agree to abide and be bound by the terms and conditions for my employment with Patton Security and Investigation Agency. Inc. I authorized the company to investigate the veracity of all information contained in this application. Any wittful falsification entered herein shall be considered a just cause for the forfeiture of this application/ termination of my employment.</p>

      <div class="w-100 my-3 pr-3 text-right">
        <button type="button" class="btn btn-secondary" id="btn-prev-section-three"><i class="fa fa-chevron-left"></i>&nbsp; Previous
        </button>
        @if($page == 'Applicant Form | GM')
        <button type="button" data-toggle="modal" data-target="#approve-applicant" class="btn btn-warning" id="btn-approval"><i class="fas fa-thumbs-up"></i>&nbsp; Approve
        </button>
        @endif
      </div>
    </section>

    <!-- Approval Modal -->
    <div class="modal fade" id="approve-applicant" tabindex="-1" role="dialog" aria-labelledby="approveApplicantLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm-approve-applicant">
            <input type="hidden" name="hdn_id" id="hdn-id" value="{{ $applicant->id }}">
            <input type="hidden" name="hdn_email" id="hdn-email" value="{{ $applicant->email }}">
            <input type="hidden" name="hdn_name" id="hdn-name" value="{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}">
            <input type="hidden" name="hdn_job" id="hdn-job" value="{{ $applicant->jobVacancies->name }}">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="approveApplicantLabel">Approval</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <i class="fas fa-question-circle" style="font-size: 32px;"></i>
                <p class="mb-0 ml-2">Are you sure you want to approve <span class="font-weight-bold text-primary">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</span>?</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="btn-approve-close" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-warning" id="btn-approve">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/gm_applicant.js' : '/js/pages/gm_applicant.js') }}"></script>
  <script>
    const sectionOneBtn = $('#btn-next-section-one'),
        sectionOneWrapper = $('#section-one'),
        sectionTwoBtn = $('#btn-next-section-two'),
        sectionTwoBtnPrev = $('#btn-prev-section-two'),
        sectionTwoWrapper = $('#section-two'),
        sectionThreeBtn = $('#btn-approve'),
        sectionThreeBtnPrev = $('#btn-prev-section-three'),
        sectionThreeWrapper = $('#section-three');

    sectionOneBtn.on('click', function (e) {
      e.preventDefault();
      sectionOneWrapper.fadeOut('slow', function () {
        $(this).addClass('d-none');
      });
      sectionTwoWrapper.fadeIn('slow', function () {
        $(this).removeClass('d-none');
      });
    });

    sectionTwoBtn.on('click', function (e) {
      e.preventDefault();
      sectionTwoWrapper.fadeOut('slow', function () {
        $(this).addClass('d-none');
      });
      sectionThreeWrapper.fadeIn('slow', function () {
        $(this).removeClass('d-none');
      });
    });

    sectionTwoBtnPrev.on('click', function (e) {
      e.preventDefault();
      sectionTwoWrapper.fadeOut('slow', function () {
        $(this).addClass('d-none');
      });
      sectionOneWrapper.fadeIn('slow', function () {
        $(this).removeClass('d-none');
      });
    });

    sectionThreeBtnPrev.on('click', function (e) {
      e.preventDefault();
      sectionThreeWrapper.fadeOut('slow', function () {
        $(this).addClass('d-none');
      });
      sectionTwoWrapper.fadeIn('slow', function () {
        $(this).removeClass('d-none');
      });
    });

  </script>
@endsection