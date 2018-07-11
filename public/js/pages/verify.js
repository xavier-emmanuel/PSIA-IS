$(document).ready(function () {
  $('#frm-verify').validate({
    rules: {
      verification_code: 'required'
    },
    messages: {
      verification_code: 'Required field cannot be left blank.'
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
});