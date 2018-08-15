$(document).ready(function () {
  $('#application-date-of-birth').datepicker();
  $('#application-date-issued').datepicker();
  $('#application-date-of-expiration').datepicker();
  $('#application-father-date-of-birth').datepicker();
  $('#application-mother-date-of-birth').datepicker();
  $('#application-spouse-date-of-birth').datepicker();
  $('#application-sibling-1-date-of-birth').datepicker();
  $('#application-sibling-2-date-of-birth').datepicker();
  $('#application-sibling-3-date-of-birth').datepicker();
  $('#application-child-1-date-of-birth').datepicker();
  $('#application-child-2-date-of-birth').datepicker();
  $('#application-child-3-date-of-birth').datepicker();
  $('#application-date-taken-1').datepicker();
  $('#application-date-taken-2').datepicker();
  $('#application-date-taken-3').datepicker();
  $('#application-membership-year-from-1').datepicker();
  $('#application-membership-year-to-1').datepicker();
  $('#application-membership-year-from-2').datepicker();
  $('#application-membership-year-to-2').datepicker();
  $('#application-membership-year-from-3').datepicker();
  $('#application-membership-year-to-3').datepicker();
  $('#application-employment-period-from-1').datepicker();
  $('#application-employment-period-to-1').datepicker();
  $('#application-employment-period-from-2').datepicker();
  $('#application-employment-period-to-2').datepicker();
  $('#application-employment-period-from-3').datepicker();
  $('#application-employment-period-to-3').datepicker();

  const personalInfoNextBtn = $('#btn-personal-information-next'),
    personalInfoWrapper = $('#personal-information'),
    educationalBackgroundBtn = $('#btn-educational-background-next'),
    educationalBackgroundWrapper = $('#educational-background'),
    governmentExamsNextBtn = $('#btn-government-exams-next'),
    governmentExamsWrapper = $('#government-exams'),
    organizationsWrapper = $('#organizations'),
    organizationsBtn = $('#btn-organizations-next'),
    employmentRecordWrapper = $('#employment-record'),
    employmentRecordBtn = $('#btn-employment-record-next'),
    questionWrapper = $('#question'),
    questionBtn = $('#btn-questions-next'),
    question2Wrapper = $('#question-2'),
    question2Btn = $('#btn-addtional-question-next'),
    personalPreferencesWrapper = $('#personal-preferences'),
    personalPreferencesBtn = $('#btn-application-finish');

  jQuery.validator.addMethod("dateGreaterThan", function(value, element, params) {
		if ($(params).val() === "")
		    return true;

		if (!/Invalid|NaN/.test(new Date(value))) {
		    return new Date(value) > new Date($(params).val());
		}
		return isNaN(value) && isNaN($(params).val())
		        || (Number(value) > Number($(params).val()));
		}
	);
	jQuery.validator.addMethod("dateLessThan", function(value, element, params) {
		if ($(params).val() === "")
		    return true;

		if (!/Invalid|NaN/.test(new Date(value))) {
		    return new Date(value) < new Date($(params).val());
		}
		return isNaN(value) && isNaN($(params).val())
        || (Number(value) < Number($(params).val()));
    }
  );

  personalInfoNextBtn.on('click', function (e) {
    e.preventDefault();
		personalInfo();
		var personal_info_valid = $('#frm-personal-info').valid();
    if (!personal_info_valid) {
	    return false;
	  } else {
	  	personalInfoWrapper.fadeOut('slow', function () {
	      $(this).addClass('d-none');
	    });
	    educationalBackgroundWrapper.fadeIn('slow', function () {
	      $(this).removeClass('d-none');
	    });
    }
  });

  educationalBackgroundBtn.on('click', function (e) {
    e.preventDefault();
    educationalBackground();
    var educational_background_valid = $('#frm-educational-background').valid();
    if (!educational_background_valid) {
	    return false;
	  } else {
	  	educationalBackgroundWrapper.fadeOut('slow', function () {
      $(this).addClass('d-none');
	    });
	    governmentExamsWrapper.fadeIn('slow', function () {
	      $(this).removeClass('d-none');
	    });
    }
  });

  governmentExamsNextBtn.on('click', function (e) {
    e.preventDefault();
    governmentExamsWrapper.fadeOut('slow', function () {
      $(this).addClass('d-none');
    });
    organizationsWrapper.fadeIn('slow', function () {
      $(this).removeClass('d-none');
    });
  });

  organizationsBtn.on('click', function (e) {
    e.preventDefault();
    organizationsWrapper.fadeOut('slow', function () {
      $(this).addClass('d-none');
    });
    employmentRecordWrapper.fadeIn('slow', function () {
      $(this).removeClass('d-none');
    });
  });

  employmentRecordBtn.on('click', function (e) {
    e.preventDefault();
    employmentRecordWrapper.fadeOut('slow', function () {
      $(this).addClass('d-none');
    });
    questionWrapper.fadeIn('slow', function () {
      $(this).removeClass('d-none');
    });
  });

  questionBtn.on('click', function (e) {
    e.preventDefault();
    questions();
    var questions_valid = $('#frm-questions').valid();
    if (!questions_valid) {
	    return false;
	  } else { 
	  	questionWrapper.fadeOut('slow', function () {
	      $(this).addClass('d-none');
	    });
	    question2Wrapper.fadeIn('slow', function () {
	      $(this).removeClass('d-none');
	    });
    }
  });

  question2Btn.on('click', function (e) {
    e.preventDefault();
    additionalQuestions();
    var additional_questions_valid = $('#frm-additional-questions').valid();
    if (!additional_questions_valid) {
	    return false;
	  } else {
	  	question2Wrapper.fadeOut('slow', function () {
	      $(this).addClass('d-none');
	    });
	    personalPreferencesWrapper.fadeIn('slow', function () {
	      $(this).removeClass('d-none');
	    });
    }
  });

	personalPreferencesBtn.on('click', function (e) {
		e.preventDefault();
		// personalInfo();
		// var personal_info_valid = $('#frm-personal-info').valid();
		// educationalBackground();
		// var educational_background_valid = $('#frm-educational-background').valid();
		// questions();
		// var questions_valid = $('#frm-questions').valid();
		// additionalQuestions();
		// var additional_questions_valid = $('#frm-additional-questions').valid();
		personalPreference();
		var personal_preference_valid = $('#frm-personal-preference').valid();
    if (!personal_preference_valid) {
	    return false;
	  } else { 
	  	var formData = new FormData($("#frm-personal-info")[0]);
      var educational_background = $("#frm-educational-background").serializeArray();
      for (var i = 0; i < educational_background.length; i++) {
          formData.append(educational_background[i].name, educational_background[i].value);
      }
      var government_exams = $("#frm-government-exams").serializeArray();
      for (var i = 0; i < government_exams.length; i++) {
          formData.append(government_exams[i].name, government_exams[i].value);
      }
      var organizations = $("#frm-organizations").serializeArray();
      for (var i = 0; i < organizations.length; i++) {
          formData.append(organizations[i].name, organizations[i].value);
      }
      var employment_record = $("#frm-employment-record").serializeArray();
      for (var i = 0; i < employment_record.length; i++) {
          formData.append(employment_record[i].name, employment_record[i].value);
      }
      var questions = $("#frm-questions").serializeArray();
      for (var i = 0; i < questions.length; i++) {
          formData.append(questions[i].name, questions[i].value);
      }
      var additional_questions = $("#frm-additional-questions").serializeArray();
      for (var i = 0; i < additional_questions.length; i++) {
          formData.append(additional_questions[i].name, additional_questions[i].value);
      }
      var personal_preference = $("#frm-personal-preference").serializeArray();
      for (var i = 0; i < personal_preference.length; i++) {
          formData.append(personal_preference[i].name, personal_preference[i].value);
      }

      var token = $('input[name="_token"]').val();
      
      $('#btn-application-finish').attr('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Finishing');

      $.ajax({
        url: '/job-application/store',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            if(data.success == true) {
	        		$('#btn-application-finish').attr('disabled', false).html('<i class="fas fa-check"></i>&nbsp; Finished');

            	$.toast({
								heading: 'Success!',
								text: data.message,
								position: 'top-right',
								icon: 'success',
								hideAfter: 3500,
								stack: 6
							});
	            setTimeout(function () {
	                window.location.href = '/';
	            }, 3400);
            } else {
	        		$('#btn-application-finish').attr('disabled', false).html('<i class="fas fa-check"></i>&nbsp; Finish');

            	$.toast({
								heading: 'Error!',
								text: 'An error has occur while sending your application.',
								position: 'top-right',
								icon: 'error',
								hideAfter: 3500,
								stack: 6
							});
            }
        },
        error: function (xhr, error, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
      });
    }
	});  
});

function personalInfo() {
	$('#frm-personal-info').validate({
		ignore: [],
    debug: false,
		rules: {
			application_surname: 'required',
			application_given_name: 'required',
			application_middle_name: 'required',
			application_present_address: 'required',
			application_mobile_number: 'required',
			application_provincial_address: 'required',
			application_date_of_birth: 'required',
			application_place_of_birth: 'required',
			application_age: 'required',
			application_gender: 'required',
			application_religion: 'required',
			application_height: {
				required: true,
				min: 1
			},
			application_weight: {
				required: true,
				min: 1
			},
			application_civil_status: 'required',
			// application_sss_number: 'required',
			// application_tin_number: 'required',
			// application_philhealth: 'required',
			// application_license_number: 'required',
			application_date_issued: {
				required: function(element){
            return $("#application-license-number").val()!="";
        },
        date: true,
        dateLessThan : '#application-date-of-expiration'
			},
			application_date_of_expiration: {
				required: function(element){
            return $("#application-license-number").val()!="";
        },
        date: true,
        dateGreaterThan : "#application-date-issued"
			},
			application_name_of_father: 'required',
			application_father_date_of_birth: {
				required: true,
        date: true
			},
			application_father_occupation: 'required',
			application_name_of_mother: 'required',
			application_mother_date_of_birth: {
				required: true,
        date: true
			},
			application_mother_occupation: 'required',
			application_sibling_1_name: {
				required: function(element){
            return $("#application-sibling-1-date-of-birth").val()!="" || $("#application-sibling-1-occupation").val()!="";
        }
			},
			application_sibling_1_date_of_birth: {
				required: function(element){
            return $("#application-sibling-1-name").val()!="" || $("#application-sibling-1-occupation").val()!="";
        },
				date: true
			},
			application_sibling_1_occupation: {
				required: function(element){
            return $("#application-sibling-1-date-of-birth").val()!="" || $("#application-sibling-1-name").val()!="";
        }
			},
			application_sibling_2_name: {
				required: function(element){
            return $("#application-sibling-2-date-of-birth").val()!="" || $("#application-sibling-2-occupation").val()!="";
        }
			},
			application_sibling_2_date_of_birth: {
				required: function(element){
            return $("#application-sibling-2-name").val()!="" || $("#application-sibling-2-occupation").val()!="";
        },
				date: true
			},
			application_sibling_2_occupation: {
				required: function(element){
            return $("#application-sibling-2-date-of-birth").val()!="" || $("#application-sibling-2-name").val()!="";
        }
			},
			application_sibling_3_name: {
				required: function(element){
            return $("#application-sibling-3-date-of-birth").val()!="" || $("#application-sibling-3-occupation").val()!="";
        }
			},
			application_sibling_3_date_of_birth: {
				required: function(element){
            return $("#application-sibling-3-name").val()!="" || $("#application-sibling-3-occupation").val()!="";
        },
				date: true
			},
			application_sibling_3_occupation: {
				required: function(element){
            return $("#application-sibling-3-date-of-birth").val()!="" || $("#application-sibling-3-name").val()!="";
        }
			},
			application_name_of_spouse: {
				required: function(element){
            return $("#application-spouse-date-of-birth").val()!="" || $("#application-spouse-occupation").val()!="" || $("#application-dependent").val()!="";
        }
      },
			application_spouse_date_of_birth: {
				required: function(element){
            return $("#application-name-of-spouse").val()!="" || $("#application-spouse-occupation").val()!="" || $("#application-dependent").val()!="";
        },
				date: true
			},
			application_spouse_occupation: {
				required: function(element){
            return $("#application-name-of-spouse").val()!="" || $("#application-spouse-date-of-birth").val()!="" || $("#application-dependent").val()!="";
        }
      },
      application_dependent: {
      	required: function(element){
            return $("#application-name-of-spouse").val()!="" || $("#application-spouse-date-of-birth").val()!="" || $("#application-spouse-occupation").val()!="";
        }
      },
      application_child_1_name: {
      	required: function(element){
            return $("#application-child-1-date-of-birth").val()!="" || $("#application-child-1-occupation").val()!="";
        }
      },
			application_child_1_date_of_birth: {
				required: function(element){
            return $("#application-child-1-name").val()!="" || $("#application-child-1-occupation").val()!="";
        },
				date: true
			},
			application_child_1_occupation: {
				required: function(element){
            return $("#application-child-1-name").val()!="" || $("#application-child-1-date-of-birth").val()!="";
        }
			},
			application_child_2_name: {
      	required: function(element){
            return $("#application-child-2-date-of-birth").val()!="" || $("#application-child-2-occupation").val()!="";
        }
      },
			application_child_2_date_of_birth: {
				required: function(element){
            return $("#application-child-2-name").val()!="" || $("#application-child-2-occupation").val()!="";
        },
				date: true
			},
			application_child_2_occupation: {
				required: function(element){
            return $("#application-child-2-name").val()!="" || $("#application-child-2-date-of-birth").val()!="";
        }
			},
			application_child_3_name: {
      	required: function(element){
            return $("#application-child-3-date-of-birth").val()!="" || $("#application-child-3-occupation").val()!="";
        }
      },
			application_child_3_date_of_birth: {
				required: function(element){
            return $("#application-child-3-name").val()!="" || $("#application-child-3-occupation").val()!="";
        },
				date: true
			},
			application_child_3_occupation: {
				required: function(element){
            return $("#application-child-3-name").val()!="" || $("#application-child-3-date-of-birth").val()!="";
        }
			},
			application_contact_name: 'required',
			application_contact_relation: 'required',
			application_contact_number: 'required',
			application_contact_address: 'required',
		},
		messages: {
			application_surname: 'Required field cannot be left blank.',
			application_given_name: 'Required field cannot be left blank.',
			application_middle_name: 'Required field cannot be left blank.',
			application_present_address: 'Required field cannot be left blank.',
			application_mobile_number: 'Required field cannot be left blank.',
			application_provincial_address: 'Required field cannot be left blank.',
			application_date_of_birth: 'Required field cannot be left blank.',
			application_place_of_birth: 'Required field cannot be left blank.',
			application_age: 'Required field cannot be left blank.',
			application_gender: 'Required field cannot be left blank.',
			application_religion: 'Required field cannot be left blank.',
			application_height: {
				required: 'Required field cannot be left blank.',
				min: 'Please input a valid integer.'
			},
			application_weight: {
				required: 'Required field cannot be left blank.',
				min: 'Please input a valid integer.'
			},
			application_civil_status: 'Required field cannot be left blank.',
			// application_sss_number: 'Required field cannot be left blank.',
			// application_tin_number: 'Required field cannot be left blank.',
			// application_philhealth: 'Required field cannot be left blank.',
			// application_license_number: 'Required field cannot be left blank.',
			application_date_issued: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.',
				dateLessThan: 'Date must be less than Expiration date.'
			},
			application_date_of_expiration: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.',
				dateGreaterThan: 'Date must be greater than Issued date.'
			},
			application_name_of_father: 'Required field cannot be left blank.',
			application_father_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_father_occupation: 'Required field cannot be left blank.',
			application_name_of_mother: 'Required field cannot be left blank.',
			application_mother_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_mother_occupation: 'Required field cannot be left blank.',
			application_sibling_1_name: {
				required: 'Required field cannot be left blank.'
			},
			application_sibling_1_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_sibling_1_occupation: {
				required: 'Required field cannot be left blank.'
			},
			application_sibling_2_name: {
				required: 'Required field cannot be left blank.'
			},
			application_sibling_2_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_sibling_2_occupation: {
				required: 'Required field cannot be left blank.'
			},
			application_sibling_3_name: {
				required: 'Required field cannot be left blank.'
			},
			application_sibling_3_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_sibling_3_occupation: {
				required: 'Required field cannot be left blank.'
			},
			application_name_of_spouse: 'Required field cannot be left blank.',
			application_spouse_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_spouse_occupation:'Required field cannot be left blank.',
      application_dependent: 'Required field cannot be left blank.',
			application_child_1_name: 'Required field cannot be left blank.',
			application_child_1_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_child_1_occupation: 'Required field cannot be left blank.',
			application_child_2_name: 'Required field cannot be left blank.',
			application_child_2_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_child_2_occupation: 'Required field cannot be left blank.',
			application_child_3_name: 'Required field cannot be left blank.',
			application_child_3_date_of_birth: {
				required: 'Required field cannot be left blank.',
				date: 'Please input a valid date.'
			},
			application_child_3_occupation: 'Required field cannot be left blank.',
			application_contact_name: 'Required field cannot be left blank.',
			application_contact_relation: 'Required field cannot be left blank.',
			application_contact_number: 'Required field cannot be left blank.',
			application_contact_address: 'Required field cannot be left blank.',
		},
    highlight: function (element) {
        $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
	});
}

function educationalBackground() {
	$('#frm-educational-background').validate({
		ignore: [],
    debug: false,
		rules: {
			application_elementary: 'required',
			application_elementary_year_graduated: {
				required: true,
				minlength: 4,
				maxlength: 4,
			},
			application_elementary_school_address: 'required',
			application_high_school: 'required',
			application_high_school_year_graduated: {
				required: true,
				minlength: 4,
				maxlength: 4,
			},
			application_high_school_school_address: 'required',
			application_college: 'required',
			application_college_year_graduated: {
				required: true,
				minlength: 4,
				maxlength: 4,
			},
			application_college_school_address: 'required',
		},
		messages: {
			application_elementary: 'Required field cannot be left blank.',
			application_elementary_year_graduated: {
				required: 'Required field cannot be left blank.',
				minlength: 'Invalid year of graduation.',
				maxlength: 'Invalid year of graduation.',
			},
			application_elementary_school_address: 'Required field cannot be left blank.',
			application_high_school: 'Required field cannot be left blank.',
			application_high_school_year_graduated: {
				required: 'Required field cannot be left blank.',
				minlength: 'Invalid year of graduation.',
				maxlength: 'Invalid year of graduation.',
			},
			application_high_school_school_address: 'Required field cannot be left blank.',
			application_college: 'Required field cannot be left blank.',
			application_college_year_graduated: {
				required: 'Required field cannot be left blank.',
				minlength: 'Invalid year of graduation.',
				maxlength: 'Invalid year of graduation.',
			},
			application_college_school_address: 'Required field cannot be left blank.',
		},
    highlight: function (element) {
        $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
	});
}

function questions() {
	$('#frm-questions').validate({
		ignore: [],
    debug: false,
		rules: {
			application_dialects: 'required',
			convictionOptions: 'required',
			application_conviction_reason: {
				required:'#convictionsOptions1:checked'
			},
			healthProblemOptions: 'required',
			application_health_problem: {
				required:'#healthProblemOptions1:checked'
			},
			operationOptions: 'required',
			application_operation: {
				required:'#operationOptions1:checked'
			},
			companyRelativeOptions: 'required',
			application_relative: {
				required:'#companyRelativeOptions1:checked'
			},
			subsidiaryOptions: 'required',
			application_subsidary: {
				required:'#subsidiaryOptions1:checked'
			},
			provicialAssignmentOptions: 'required',
			application_assignment: {
				required:'#provicialAssignmentOptions1:checked'
			},
			application_skills: 'required',
		},
		messages: {
			application_dialects: 'Required field cannot be left blank.',
			convictionOptions: 'Required field cannot be left blank.',
			application_conviction_reason: 'Required field cannot be left blank.',
			healthProblemOptions: 'Required field cannot be left blank.',
			application_health_problem: 'Required field cannot be left blank.',
			operationOptions: 'Required field cannot be left blank.',
			application_operation: 'Required field cannot be left blank.',
			companyRelativeOptions: 'Required field cannot be left blank.',
			application_relative: 'Required field cannot be left blank.',
			subsidiaryOptions: 'Required field cannot be left blank.',
			application_subsidary: 'Required field cannot be left blank.',
			provicialAssignmentOptions: 'Required field cannot be left blank.',
			application_assignment: 'Required field cannot be left blank.',
			application_skills: 'Required field cannot be left blank.',
		},
    highlight: function (element) {
        $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if( element.is(":radio") ) {
	        error.appendTo( element.parents('.form-group') );
        } else {
            error.insertAfter(element);
        }
    }
	});
}

function additionalQuestions() {
	$('#frm-additional-questions').validate({
		ignore: [],
    debug: false,
		rules: {
			personal_description: {
				required: true,
				minlength: 30,
			},
			reasons_of_appying: {
				required: true,
				minlength: 30,
			},
			carreer_goals: {
				required: true,
				minlength: 30,
			},
			personal_accomplishments: {
				required: true,
				minlength: 30,
			},
		},
		messages: {
			personal_description: {
				required: 'Required field cannot be left blank.',
				minlength: 'Please input atleast 30 characters.'
			},
			reasons_of_appying: {
				required: 'Required field cannot be left blank.',
				minlength: 'Please input atleast 30 characters.'
			},
			carreer_goals: {
				required: 'Required field cannot be left blank.',
				minlength: 'Please input atleast 30 characters.'
			},
			personal_accomplishments: {
				required: 'Required field cannot be left blank.',
				minlength: 'Please input atleast 30 characters.'
			},
		},
    highlight: function (element) {
        $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if( element.is(":radio") ) {
	        error.appendTo( element.parents('.form-group') );
        } else {
            error.insertAfter(element);
        }
    }
	});
}

function personalPreference() {
	$('#frm-personal-preference').validate({
		ignore: [],
    debug: false,
		rules: {
			preference_name_1: 'required',
			preference_occupation_1: 'required',
			preference_contact_1: 'required',
			preference_name_2: 'required',
			preference_occupation_2: 'required',
			preference_contact_2: 'required',
			preference_name_3: 'required',
			preference_occupation_3: 'required',
			preference_contact_3: 'required',
		},
		messages: {
			preference_name_1: 'Required field cannot be left blank.',
			preference_occupation_1: 'Required field cannot be left blank.',
			preference_contact_1: 'Required field cannot be left blank.',
			preference_name_2: 'Required field cannot be left blank.',
			preference_occupation_2: 'Required field cannot be left blank.',
			preference_contact_2: 'Required field cannot be left blank.',
			preference_name_3: 'Required field cannot be left blank.',
			preference_occupation_3: 'Required field cannot be left blank.',
			preference_contact_3: 'Required field cannot be left blank.',
		},
    highlight: function (element) {
        $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if( element.is(":radio") ) {
	        error.appendTo( element.parents('.form-group') );
        } else {
            error.insertAfter(element);
        }
    }
	});
}