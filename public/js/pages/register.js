var frm_register_personal_validator;

$(document).ready(function () {
    $('#smartwizard').smartWizard({
        transitionEffect: 'fade',
        toolbarSettings: {
            toolbarExtraButtons: [
                $('<button></button>').html('<i class="fas fa-check"></i>&nbsp; Finish').addClass('btn btn-warning btn-finish').prop('disabled', true)
            ]
        }
    });

    $('#smartwizard').on('leaveStep', function (e, anchorObject, stepNumber, stepDirection) {
        var valid = $('#frm-register').valid();

        if (!valid && stepDirection === 'forward') {
            frm_register_personal_validator.focusInvalid();
            return false;
        }

        if (stepNumber === 1) {
            $('.btn-finish').prop('disabled', false);
        }

        return true;
    });

    $('[data-toggle="datepicker"]').datepicker();

    $(".sw-btn-next").on('click', function (event) {
        if ($(this).is('.disabled')) {
            $('.btn-submit').attr('disabled', false);
        }
    });

    $(".sw-btn-prev").on('click', function (event) {
        if ($(this).is('.disabled')) {
            $('.btn-submit').attr('disabled', false);
        }
    });

    $('#verification-modal').on('hide.bs.modal', function () {
        return false;
    });

    function readImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        var image_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
        var image = image_filename.split('.').pop();
        if (image == 'jpg' || image == 'png' || image == 'jpeg') {
            readImagePreview(this);
        } else {
            $('#image-preview').attr('src', 'http://via.placeholder.com/192x192');
        }
    });

    frm_register_personal_validator = $("#frm-register").validate({
        ignore: ".ignore",
        debug: false,
        rules: {
            first_name: "required",
            middle_name: "required",
            last_name: "required",
            email: {
                required: true,
                remote: {
                    url: "/check-email",
                    type: "get"
                }
            },
            mobile: {
                required: true,
                maxlength: 11,
                digits: true
            },
            age: "required",
            address: "required",
            place_of_birth: "required",
            date_of_birth: "required"
        },
        messages: {
            first_name: "Required field cannot be left blank.",
            middle_name: "Required field cannot be left blank.",
            last_name: "Required field cannot be left blank.",
            email: {
                required: 'Required field cannot be left blank.',
                remote: 'This email already in used. Please choose different email.'
            },
            mobile: {
                required: 'Required field cannot be left blank.',
                maxlength: 'Please enter at least 11 characters.',
                digits: 'Please enter your mobile number.'
            },
            age: "Required field cannot be left blank.",
            address: "Required field cannot be left blank.",
            place_of_birth: "Required field cannot be left blank.",
            date_of_birth: "Required field cannot be left blank."
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

    // frm_register_validator = $("#frm-register").validate({
    //     ignore: ".ignore",
    //     debug: false,
    //     rules: {
    //         first_name: "required",
    //         middle_name: "required",
    //         last_name: "required",
    //         email: {
    //             required: true,
    //             remote: {
    //                 url: "/check-email",
    //                 type: "get"
    //             }
    //         },
    //         mobile: {
    //             required: true,
    //             maxlength: 11,
    //             digits: true
    //         },
    //         age: "required",
    //         address: "required",
    //         place_of_birth: "required",
    //         date_of_birth: "required",
    //         username: {
    //             required: true,
    //             remote: {
    //                 url: "/check-username",
    //                 type: "get"
    //             }
    //         },
    //         password: {
    //             maxlength: 20
    //         },
    //         retype_password: {
    //             equalTo: "#password"
    //         },
    //         image: {
    //             required: true,
    //             extension: "jpg|png|jpeg"
    //         },
    //         hiddenRecaptcha: {
    //             required: function () {
    //                 if (grecaptcha.getResponse() == '') {
    //                     return true;
    //                 } else {
    //                     return false;
    //                 }
    //             }
    //         }
    //     },
    //     messages: {
    //         first_name: "Required field cannot be left blank.",
    //         middle_name: "Required field cannot be left blank.",
    //         last_name: "Required field cannot be left blank.",
    //         email: {
    //             required: 'Required field cannot be left blank.',
    //             remote: 'This email already in used. Please choose different email.'
    //         },
    //         mobile: {
    //             required: 'Required field cannot be left blank.',
    //             maxlength: 'Please enter at least 11 characters.',
    //             digits: 'Please enter your mobile number.'
    //         },
    //         age: "Required field cannot be left blank.",
    //         address: "Required field cannot be left blank.",
    //         place_of_birth: "Required field cannot be left blank.",
    //         date_of_birth: "Required field cannot be left blank.",
    //         username: {
    //             required: 'Required field cannot be left blank.',
    //             remote: 'This username already in used. Please choose different username.'
    //         },
    //         retype_password: {
    //             equalTo: 'Password did not match.'
    //         },
    //         image: {
    //             required: 'Required field cannot be left blank.',
    //             extension: "You must select an image file only."
    //         }
    //     },
    //     highlight: function (element) {
    //         $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    //     },
    //     unhighlight: function (element) {
    //         $(element).closest('.form-control').removeClass('is-invalid').removeClass('is-valid').addClass('is-valid');
    //     },
    //     errorElement: 'div',
    //     errorClass: 'invalid-feedback',
    //     errorPlacement: function (error, element) {
    //         if (element.parent('.input-group').length) {
    //             error.insertAfter(element.parent());
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    //     submitHandler: function (frm_register, e) {
    //         event.preventDefault();

    //         var data = new FormData($("#frm-register")[0]);

    //         $('.btn-submit').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Submitting');
    //         $('.btn-submit').attr('disabled', 'disabled');

    //         $.ajax({
    //             url: '/register/store',
    //             type: 'POST',
    //             data: data,
    //             dataType: 'json',
    //             processData: false,
    //             contentType: false,
    //             success: function (data) {
    //                 setTimeout(function () {
    //                     var email = $('#email').val();
    //                     $('.btn-submit').attr('disabled', false);
    //                     $('.btn-submit').html('<i class="fas fa-check"></i>&nbsp; Submit');
    //                     $('#verification-modal').modal('show');
    //                     $('#hdn-email').val(email);

    //                     /*                      $.toast({
    //                                                 heading: 'Success',
    //                                                 text: 'Registered successfully.',
    //                                                 position: 'top-right',
    //                                                 icon: 'success',
    //                                                 hideAfter: 3500
    //                                             });*/

    //                 }, 2000);
    //             },
    //             error: function (xhr, error, ajaxOptions, thrownError) {
    //                 alert(xhr.responseText);
    //             }
    //         });
    //     }
    // });

});