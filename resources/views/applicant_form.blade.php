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
      <figure class="d-flex justify-content-end mr-3">
        <img src="{{ asset('img/default_image.png') }}" alt="" height="192px" width="192px" class="border border-secondary">
      </figure>
      <div class="table-header">1. PERSONAL INFORMATION</div>
      <div class="d-flex justify-content-around table-subheading">
        <h6 class="font-weight-bold">Last Name</h6>
        <h6 class="font-weight-bold">First Name</h6>
        <h6 class="font-weight-bold">Middle Name</h6>
      </div>
      <div class="d-flex justify-content-around border-bottom">
        <p class="mb-0">Limpo</p>
        <p class="mb-0">Charles Marnie</p>
        <p class="mb-0">Barba</p>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 20%;"><h6>Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="border-right" style="width: 55%;"><h6>Place of Birth <small>(City/Municipality/Province)</small></h6></div>
        <div class="border-right" style="width: 5%;"><h6>Sex</h6></div>
        <div class="border-right" style="width: 15%;"><h6>Civil Status</h6></div>
        <div style="width: 5%;"><h6>Age</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 20%;"><p class="mb-0">06-21-1995</p></div>
        <div class="border-right" style="width: 55%;"><p class="mb-0">#23 Example Address, Legazpi City</p></div>
        <div class="border-right" style="width: 5%;"><p class="mb-0">Male</p></div>
        <div class="border-right" style="width: 15%;"><p class="mb-0">Single</p></div>
        <div style="width: 5%;"><p class="mb-0">23</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6>Height <small>(in centimeter)</small></h6></div>
        <div class="border-right w-25"><h6>Weight <small>(in kilo)</small></h6></div>
        <div class="border-right w-25"><h6>Religion</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="mb-0">172</p></div>
        <div class="border-right w-25"><p class="mb-0">55</p></div>
        <div class="border-right w-25"><p class="mb-0">Roman Catholic</p></div>
        <div class="w-25"><p class="mb-0">+639367995285</p></div>
      </div>
      <div class="table-header">&emsp;1.1. Spouse <small>(Married or Unmarried)</small></div>
      <div class="d-flex justify-content-around table-subheading">
        <h6 class="font-weight-bold">Last Name</h6>
        <h6 class="font-weight-bold">First Name</h6>
        <h6 class="font-weight-bold">Middle Name</h6>
        <h6 class="font-weight-bold">Dependent</h6>
      </div>
      <div class="d-flex justify-content-around border-bottom">
        <p class="mb-0">Doe</p>
        <p class="mb-0">Jane</p>
        <p class="mb-0">Domestic</p>
        <p class="mb-0">IDK</p>
      </div>
      <div class="table-header">&emsp;1.2. Children <small>(If any)</small></div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Marson B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">07-10-1992</p></div>
        <div class="w-25"><p class="my-1">Freelancer</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Monique Marsha B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">10-05-1993</p></div>
        <div class="w-25"><p class="my-1">Housewife</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Marion Mark B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">02-18-1997</p></div>
        <div class="w-25"><p class="my-1">Student</p></div>
      </div>
      <div class="table-header">&emsp;1.3. Address</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-75"><h6>&emsp;Present Address</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-75 text-left" style="padding-left: 0.3rem;"><p class="mb-0">&emsp;&emsp;#23 Example Address, Legazpi CIty</p></div>
        <div class="w-25"><p class="mb-0">+639367995285</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-75"><h6>&emsp;Provincial Address</h6></div>
        <div class="w-25"><h6>Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-75 text-left" style="padding-left: 0.3rem;"><p class="mb-0">&emsp;&emsp;#23 Example Address, Legazpi CIty</p></div>
        <div class="w-25"><p class="mb-0">+639367995285</p></div>
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
        <div class="border-right w-25"><p class="mb-0">12321</p></div>
        <div class="border-right w-25"><p class="mb-0">123213</p></div>
        <div class="border-right w-25"><p class="mb-0">123213</p></div>
        <div class="border-right w-25"><p class="mb-0">123213</p></div>
        <div class="border-right w-25"><p class="mb-0">06-21-1995</p></div>
        <div class="w-25"><p class="mb-0">06-21-1995</p></div>
      </div>
      <div class="table-header">2. FAMILY MEMBERS</div>
      <div class="table-header">&emsp;2.1. Parent's Details</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Marson A. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="w-25"><p class="my-1">Unemployed</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Delsharon B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">11-13-1973</p></div>
        <div class="w-25"><p class="my-1">Housewife</p></div>
      </div>
      <div class="table-header">&emsp;2.2. Sibling's Details</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Date of Birth <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Occupation</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Marson B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">07-10-1992</p></div>
        <div class="w-25"><p class="my-1">Freelancer</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Monique Marsha B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">10-05-1993</p></div>
        <div class="w-25"><p class="my-1">Housewife</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Marion Mark B. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">02-18-1997</p></div>
        <div class="w-25"><p class="my-1">Student</p></div>
      </div>
      <div class="table-header">3. CONTACT PERSON <small>(In case of Emergency)</small></div>
      <div class="d-flex w-100 text-center ">
        <div class="border-right w-50"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Relation</h6></div>
        <div class="w-25"><h6 class="my-1">Contact Number</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50 text-left"><p class="mb-0">&emsp;&emsp;Unknown</p></div>
        <div class="border-right w-25"><p class="mb-0">Father</p></div>
        <div class="w-25"><p class="mb-0">+639367995285</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-100"><h6 class="my-1">&emsp;Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="w-100"><p class="mb-0">&emsp;&emsp;#23 Example Address, Legazpi City</p></div>
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
        <div class="border-right" style="width: 30%;"><h6 class="my-1">&emsp;Name of School <small>(Elementary - Tertiary)</small></h6></div>
        <div class="border-right" style="width: 40%;"><h6 class="my-1">&emsp;Address</h6></div>
        <div class="border-right" style="width: 15%;"><h6 class="my-1">Honor/Award</h6></div>
        <div style="width: 15%;"><h6 class="my-1">Year Graduated</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Albay Central School</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Brgy. 16 Washington Drive East, Legazpi City</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">N/A</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2008</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Daraga National High School</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Daraga, Albay</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">Best in Late</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2012</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Southern Luzon Technological College Foundation, Inc.</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Brgy. 33 Ramon Santos St., Penaranda, Legazpi City</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">Best in Walwal</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2018</p></div>
      </div>
      <div class="table-header">5. GOVERNMENT EXAMS TAKEN</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><h6 class="my-1">&emsp;Type/Title of Examination <small>(Elementary - Tertiary)</small></h6></div>
        <div class="border-right" style="width: 40%;"><h6 class="my-1">&emsp;Place Taken</h6></div>
        <div class="border-right" style="width: 15%;"><h6 class="my-1">Date Taken</h6></div>
        <div style="width: 15%;"><h6 class="my-1">Result/Grade</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Albay Central School</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Brgy. 16 Washington Drive East, Legazpi City</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">N/A</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2008</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Albay Central School</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Brgy. 16 Washington Drive East, Legazpi City</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">N/A</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2008</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 30%;"><p class="my-1 text-left">&emsp;&emsp;Albay Central School</p></div>
        <div class="border-right" style="width: 40%;"><p class="my-1 text-left">&emsp;&emsp;Brgy. 16 Washington Drive East, Legazpi City</p></div>
        <div class="border-right" style="width: 15%;"><p class="my-1">N/A</p></div>
        <div class="" style="width: 15%;"><p class="my-1">2008</p></div>
      </div>
      <div class="table-header">6. SCHOOL/CIVIC/BUSINESS/SOCIAL ORGANIZATIONS</div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><h6 class="my-1">Name of Organization</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Years of Membership <small>(From-To)</small></h6></div>
        <div class="w-25"><h6 class="my-1">Position</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Supreme Student Council</p></div>
        <div class="border-right w-25"><p class="my-1">2015-2016</p></div>
        <div class="w-25"><p class="my-1">PIO</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;Cyber Infotronics Society</p></div>
        <div class="border-right w-25"><p class="my-1">2016-2017</p></div>
        <div class="w-25"><p class="my-1">President</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1 text-left">&emsp;&emsp;</p></div>
        <div class="border-right w-25"><p class="my-1"></p></div>
        <div class="w-25"><p class="my-1"></p></div>
      </div>
      <div class="table-header">7. EMPLOYMENT RECORD <small>(Previous Employers)</small></div>
      <div class="table-header">&emsp;7.1. Company 1</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="w-50"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div><div class="table-header">&emsp;7.2. Company 2</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="w-50"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div><div class="table-header">&emsp;7.3. Company 3</div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-25"><h6 class="my-1">Company Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Period of Employment <small>(mm-dd-yyyy)</small></h6></div>
        <div class="w-50"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="border-right w-25"><p class="my-1">N/A</p></div>
        <div class="w-50"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Last Position</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Name of Immediate Superior <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Nature of Job</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right" style="width: 33.33%"><h6 class="my-1"></h6>Starting Salary</h6></div>
        <div class="border-right" style="width: 33.33%"><h6 class="my-1">Salary Upon Leaving <small>(mm-dd-yyyy)</small></h6></div>
        <div class="" style="width: 33.33%"><h6 class="my-1">Reason for Leaving</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="border-right" style="width: 33.33%"><p class="my-1">N/A</p></div>
        <div class="" style="width: 33.33%"><p class="my-1">N/A</p></div>
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
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">Bicol, English</p></div>
        <div class="border-right w-25"><p class="my-1">Web Development, Programming</p></div>
        <div class="border-right w-50"><p class="my-1">No</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Do you have any health problems <small>(If YES, kindly describe)</small></h6></div>
        <div class="border-right w-50"><h6 class="my-1">Have you ever had an operation/accident? <small>(If YES, kindly describe)</small></h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">No</p></div>
        <div class="border-right w-50"><p class="my-1">Yes, broken neck HAHAHA</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Who recommended you in this company?</h6></div>
        <div class="border-right w-50"><h6 class="my-1">Do you have friend(s) or relative(s) working in the company? <small>(If YES, kindly state the name and relation)</small></h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">SECRET, Why should I say her name LOL!</p></div>
        <div class="border-right w-50"><p class="my-1">Friend, SECRET muna</p></div>
      </div>
      <div class="d-flex w-100 text-center">
        <div class="border-right w-50"><h6 class="my-1">Are you willing to accept provincial assignments? <small>(If YES, kindly state your preffered province)</small></h6></div>
        <div class="border-right w-50"><h6 class="my-1">Other experiences/training(s)</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-50"><p class="my-1">Oo naman, sa Maguindanao gusto ko.</p></div>
        <div class="border-right w-50"><p class="my-1">Computer Repair, Tagaputol ng Ulo, Killer</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;In fifty words or less, please describe yourself. Indicate your likes and dislikes, strengths and areas of improvements, hobbies and interest among others</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;Oo naman, sa Maguindanao gusto ko.</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;Explain why you joined Patton Security & Investigation Agency Inc,.?</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;Oo naman, sa Maguindanao gusto ko.</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;Briefly state our personal and career goals. How do you see yourself in five years from today?</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;Oo naman, sa Maguindanao gusto ko.</p></div>
      </div>
      <div class="w-100">
        <div class="table-header"><h6 class="my-1">&emsp;State your three (3) most important accomplishment in life:</h6></div>
      </div>
      <div class="w-100 border-bottom">
        <div><p class="my-1">&emsp;&emsp;Oo naman, sa Maguindanao gusto ko.</p></div>
      </div>
      <div class="table-header">9. PERSONAL PREFERENCES <small>(List down three (3) persons not related to you, whom you have known for two years)</small></div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><h6 class="my-1">&emsp;Full Name</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Occupation</h6></div>
        <div class="border-right w-25"><h6 class="my-1">Contact Number</h6></div>
        <div class="w-25"><h6 class="my-1">Address</h6></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">Marson A. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="w-25 text-left"><p class="my-1">&emsp;Unemployed</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">Marson A. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="w-25 text-left"><p class="my-1">&emsp;Unemployed</p></div>
      </div>
      <div class="d-flex w-100 text-center border-bottom">
        <div class="border-right w-25"><p class="my-1">Marson A. Limpo</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="border-right w-25"><p class="my-1">01-08-1974</p></div>
        <div class="w-25 text-left"><p class="my-1">&emsp;Unemployed</p></div>
      </div>

      <p class="w-100 justified mt-4 p-3">&emsp;I hereby certify that i have carefully read and understand the contents of this application form and that I agree to abide and be bound by the terms and conditions for my employment with Patton Security and Investigation Agency. Inc. I authorized the company to investigate the veracity of all information contained in this application. Any wittful falsification entered herein shall be considered a just cause for the forfeiture of this application/ termination of my employment.</p>

      <div class="w-100 my-3 pr-3 text-right">
        <button type="" class="btn btn-secondary" id="btn-prev-section-three"><i class="fa fa-chevron-left"></i>&nbsp; Previous
        </button>
        <button type="" class="btn btn-warning" id="btn-approve"><i class="fas fa-thumbs-up"></i>&nbsp; Approve
        </button>
      </div>
    </section>
  </main>
@endsection

@section('scripts')
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