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

        if (stepNumber === 0) {
            personalValidator();
            var valid = $('#frm-personal').valid();
            if (!valid && stepDirection === 'forward') {

                return false;

            }
            $('.btn-finish').prop('disabled', false);
        }

        if (stepNumber === 1) {
            accountValidator();
            var valid2 = $('#frm-account').valid();
            if (!valid2 && stepDirection === 'forward') {

                return false;
            }
            $('.btn-finish').prop('disabled', false);
        }

        if (stepNumber === 2) {
            photoValidator();
            var valid3 = $('#frm-photo').valid();
            if (!valid3 && stepDirection === 'forward') {

                return false;
            }
            $('.btn-finish').prop('disabled', false);
        }

        return true;
    });

    $('.btn-finish').on('click', function () {
        personalValidator();
        var valid = $('#frm-personal').valid();
        accountValidator();
        var valid2 = $('#frm-account').valid();
        photoValidator();
        var valid3 = $('#frm-photo').valid();
        if (valid && valid2 && valid3) {
            event.preventDefault();

            var formData = new FormData($("#frm-photo")[0]);
            var data_personal = $("#frm-personal").serializeArray();
            for (var i = 0; i < data_personal.length; i++) {
                formData.append(data_personal[i].name, data_personal[i].value);
            }
            var data_account = $("#frm-account").serializeArray();
            for (var i = 0; i < data_account.length; i++) {
                formData.append(data_account[i].name, data_account[i].value);
            }

            var token = $('input[name="_token"]').val();

            $('.btn-finish').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Finishing');
            $('.btn-finish').attr('disabled', false);

            $.ajax({
                url: '/register/store',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    setTimeout(function () {
                        window.location.href = '/verify-account/'+data.username;
                    }, 2000);
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        } else {
            if (!valid) {
                window.location.href = '/register#personal';
            } else if (!valid2) {
                window.location.href = '/register#account';
            } else if (!valid3) {
                window.location.href = '/register#photo';
            }
        }
    });

    $('[data-toggle="datepicker"]').datepicker();

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

    function personalValidator() {
        $("#frm-personal").validate({
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
                    minlength: 10,
                    maxlength: 10,
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
                    minlength: 'Please enter at least 10 characters. Ex: 9123456789',
                    maxlength: 'Please enter at least 10 characters. Ex: 9123456789',
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
    }

    function accountValidator() {
        $("#frm-account").validate({
            ignore: ".ignore",
            debug: false,
            rules: {
                username: {
                    required: true,
                    remote: {
                        url: "/check-username",
                        type: "get"
                    }
                },
                password: {
                    maxlength: 20,
                    required: true
                },
                retype_password: {
                    equalTo: "#password",
                    required: true
                }
            },
            messages: {
                username: {
                    required: 'Required field cannot be left blank.',
                    remote: 'This username already in used. Please choose different username.'
                },
                password: {
                    required: 'Required field cannot be left blank.'
                },
                retype_password: {
                    equalTo: 'Password did not match.',
                    required: 'Required field cannot be left blank.'
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
            }
        });
    }

    function photoValidator() {
        $("#frm-photo").validate({
            ignore: ".ignore",
            debug: false,
            rules: {
                image: {
                    required: true,
                    extension: "jpg|png|jpeg"
                },
                hiddenRecaptcha: {
                    required: function () {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                image: {
                    required: 'Required field cannot be left blank.',
                    extension: "You must select an image file only."
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
            }
        });
    }
});