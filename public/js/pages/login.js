$(document).ready(function () {
	$('#login-button').on('click', function () {
		$('#frm-login')[0].reset();
		login_form.resetForm();
		$('input').removeClass('error');

		$('input').on('focus', function () {
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
		submitHandler: function (frm_login, e) {
			e.preventDefault();
			$('#btn-login').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; Logging in...');
			$('#frm-login').unbind('submit').submit();
		}
	});
})