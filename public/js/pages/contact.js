$(document).ready(function () {
    $("#frm-contact").validate({
        ignore: [],
        debug: false,
        rules: {
            contact_name: "required",
            contact_email: "required",
            message: "required",
        },
        messages: {
            contact_name: "Required field cannot be left blank.",
            contact_email: "Required field cannot be left blank.",
            message: "Required field cannot be left blank.",
        },
        submitHandler: function (frm_contact, e) {
            event.preventDefault();

            var data = new FormData($("#frm-contact")[0]);

            $('#frm-contact input').prop('disabled', true);
            $('#frm-contact .btn').prop('disabled', true);
            $('.btn-send').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Sending');

            $.ajax({
                url: '/contact/send',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#frm-contact input').prop('disabled', false);
                    $('#frm-contact .btn').prop('disabled', false);
                    $('.btn-send').html('<i class="fas fa-paper-plane"></i>&nbsp; Send');

                    $('#frm-contact').trigger('reset');

                    $.toast({
                        heading: 'Success',
                        text: 'Mail sent successfully. Thank you!',
                        position: 'top-right',
                        icon: 'success',
                        hideAfter: 3500
                    });
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    });
});