$(document).ready(function() {
	$('[data-toggle="datepicker"]').datepicker();
  $('.form-info').popover({
    trigger: 'hover'
  });

  updatePhoto();
  updateAccount();
  updatePersonal();
  updateContact();
});

function updatePhoto() {
	function readImageUrlPreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#frm-photo").find('#image-preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-photo").find("#user-image").change(function() {
		var add_image_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
		var add_image = add_image_filename.split('.').pop();
		if (add_image == 'jpg' || add_image == 'png' || add_image == 'jpeg') {
			readImageUrlPreview(this);
		}
	});

	$('#frm-photo').validate({
    ignore: [],
    debug: false,
    rules: {
        user_image: {
            required: true,
            extension: "jpg|png|jpeg"
        }
    },
    messages: {
				user_image: {
					required: 'Required field cannot be left blank.',
					extension: 'Invalid file. Please select valid image file and try again.'
				}
    },
    submitHandler: function (frm_photo, e) {
			e.preventDefault();
			$('#btn-update-photo').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating')
			var data = new FormData($("#frm-photo")[0]);

			$.ajax({
				url: '/profile-update/photo',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('#frm-photo')[0].reset();
					$('#btn-update-photo').removeAttr('disabled', 'disabled').html('<i class="fas fa-upload"></i>&nbsp; Upload Photo')
					
					if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
						$('#user-image').attr('src', '/uploads/accounts/'+data.image);
					} else {
						$('#user-image').attr('src', '/public/uploads/accounts/'+data.image);
					}

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
  });
}

function updateAccount() {
	$('#frm-account-details').validate({
		rules: {
			username: {
				required: false,
				minlength: 4,
				maxlength: 20,
				remote: {
					url: '/profile-update/check-username',
					type: 'GET'
				},
			},
			new_password: {
				minlength: 6,
				maxlength: 20
			},
			retype_password: {
				equalTo: "#new-password"
			}
		},
		messages: {
			username: {
				remote: "Username already exists. Try a different one."
			}
		},
		submitHandler: function (frm_account_details, e) {
			e.preventDefault();
			if($('#username').val() == '' && $('#new-password').val() == '') {

			} else {
				$('#btn-update-account').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving')
				var data = new FormData($("#frm-account-details")[0]);

				$.ajax({
					url: '/profile-update/account',
					type: 'POST',
					data: data,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function (data) {
						$('#frm-account-details')[0].reset();
						$('#btn-update-account').removeAttr('disabled', 'disabled').html('<i class="fas fa-save"></i>&nbsp; Save Changes')

						$.toast({
							heading: 'Success!',
							text: data.success,
							position: 'top-right',
							icon: 'success',
							hideAfter: 3500,
							stack: 6
						});
					}, error: function (xhr, error, ajaxOptions, thrownError) {
						alert(xhr.responseText);
					}
				});
			}
		}
	});
}

function updatePersonal() {
	$('#frm-personal-details').validate({
		rules: {
			first_name: 'required',
			middle_name: 'required',
			last_name: 'required',
			age: 'required',
			gender: 'required',
			civil_status: 'required',
			date_of_birth: {
				required: true
			},
			place_of_birth: 'required'
		},
		messages: {
			first_name: 'Required field cannot be left blank.',
			middle_name: 'Required field cannot be left blank.',
			last_name: 'Required field cannot be left blank.',
			age: 'Required field cannot be left blank.',
			gender: 'Required field cannot be left blank.',
			civil_status: 'Required field cannot be left blank.',
			date_of_birth: {
				required: 'Required field cannot be left blank.'
			},
			place_of_birth: 'Required field cannot be left blank.'
		},
		submitHandler: function (frm_personal_details, e) {
			e.preventDefault();
			$('#btn-update-personal').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving')
			var data = new FormData($("#frm-personal-details")[0]);

			$.ajax({
				url: '/profile-update/personal',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					$('#btn-update-personal').removeAttr('disabled', 'disabled').html('<i class="fas fa-save"></i>&nbsp; Save Changes')
					$('#user-firstname').text(data.firstname);

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function updateContact() {
	$('#frm-contact-details').validate({
		rules: {
			mobile: {
				required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
			},
			email: {
				required: true,
				// remote: {
				// 	url: '/profile-update/check-email',
				// 	type: 'GET'
				// },
			},
			address: 'required',
		},
		messages: {
			mobile: {
				required: 'Required field cannot be left blank.',
                minlength: 'Please enter at least 10 characters. Ex: 9123456789',
                maxlength: 'Please enter at least 10 characters. Ex: 9123456789',
                digits: 'Please enter a valid mobile number.'
			},
			email: {
				required: 'Required field cannot be left blank.',
				// remote: 'This email already in used. Please choose different email.'
			},
			address: 'Required field cannot be left blank.',
		},
		highlight: function(element) {
			$(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
		},
		unhighlight: function(element) {
			$(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
		},
		errorElement: 'div',
		errorClass: 'invalid-feedback',
		errorPlacement: function(error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (frm_contact_details, e) {
			e.preventDefault();
			$('#btn-update-contact').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving')
			var data = new FormData($("#frm-contact-details")[0]);

			$.ajax({
				url: '/profile-update/contact',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					$('#btn-update-contact').removeAttr('disabled', 'disabled').html('<i class="fas fa-save"></i>&nbsp; Save Changes')

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}