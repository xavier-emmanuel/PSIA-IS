$(document).ready(function() {
	$('#error').hide();

	$('#login-button').on('click', function() {
		$('#frm-login')[0].reset();
		login_form.resetForm();
		$('input').removeClass('error');

		$('input').on('focus', function() {
			$('#error').hide();
		});
	});

	login_form = $('#frm-login').validate({
   	rules: {
			login_username: "required",
			login_password: "required"
		},
		messages: {
			login_username: "Please input your username.",
			login_password: "Please input your password."
		},
		submitHandler: function(frm_login, e){
			e.preventDefault();
			$('#btn-login').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; Logging in...');
			var data = new FormData($("#frm-login")[0]);

			$.ajax({
				url: '/login',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					if(data.status == 'success'){
						if(data.role == 'Applicant') {
							if(data.confirmed == false) {
								setTimeout(function () {
			            window.location.href = '/verify-account/'+data.username;
			          }, 2000);	
							} else if(data.confirmed == true) {
								setTimeout(function () {
			            window.location.href = '/';
			          }, 2000);
			        }
						}
						else if(data.role == 'Human Resource') {
							setTimeout(function () {
		            window.location.href = '/HR-dashboard';
		          }, 2000);
						}
						else if(data.role == 'General Manager') {
							setTimeout(function () {
		            window.location.href = '/GM-dashboard';
		          }, 2000);
						}
					} else {
						$('#frm-login')[0].reset();
						$('#error').show();
						$('#btn-login').removeAttr('disabled', 'disabled').html('LOGIN');
					}
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
})