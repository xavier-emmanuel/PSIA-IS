$(document).ready(function () {
  $('#frm-verify').validate({
    rules: {
      verification_code: {
        required: true,
        equalTo: "#hdn-code"
      }
    },
    messages: {
      verification_code: {
        required: 'Required field cannot be left blank.',
        equalTo: "Invalid verification code."
      }
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
    },
    submitHandler: function (frm_verify, e) {
      event.preventDefault();

      var data = new FormData($("#frm-verify")[0]);

      $('.btn-verify').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Verifying');
      $('.btn-verify').attr('disabled', false);

      $.ajax({
        url: '/account/verify',
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
          localStorage.setItem("Verified", data.OperationStatus);
          setTimeout(function () {
            window.location.href = '/';
          }, 2000);
        },
        error: function (xhr, error, ajaxOptions, thrownError) {
          alert(xhr.responseText);
        }
      });
    }
  });
});