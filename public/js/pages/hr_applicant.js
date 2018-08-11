$(document).ready(function () {
    $('#applicant-profile').on('show.bs.modal', function (e) {
        $('#frm-set-interview').trigger('reset');
        $('#frm-set-interview').validate().resetForm();
        $('#frm-set-interview :input').removeAttr('readonly', 'readonly');
        $('#frm-set-interview :input:radio').removeAttr('disabled', 'disabled');
        $('.btn-save').html('Save');
        $('.btn-save').show();
        $('#btn-hiring').show();
        var id = $(e.relatedTarget).data('id'),
            email = $(e.relatedTarget).data('email'),
            image = $(e.relatedTarget).data('image'),
            name = $(e.relatedTarget).data('name'),
            job = $(e.relatedTarget).data('job'),
            age = $(e.relatedTarget).data('age'),
            gender = $(e.relatedTarget).data('gender'),
            address = $(e.relatedTarget).data('address'),
            mobile = $(e.relatedTarget).data('mobile'),
            interview_title = $(e.relatedTarget).data('interview-title'),
            interview_message = $(e.relatedTarget).data('interview-message'),
            interview_date = $(e.relatedTarget).data('interview-date'),
            interview_time = $(e.relatedTarget).data('interview-time'),
            result = $(e.relatedTarget).data('result'),
            training_date = $(e.relatedTarget).data('training-date'),
            date_hired = $(e.relatedTarget).data('date-hired'),
            interviewed = $(e.relatedTarget).data('interviewed'),
            score = $(e.relatedTarget).data('score');

        if (interview_date == '') {
            interview_date = 'N/A';
            $('.dd-interview-date').addClass("d-none");
            $('.interview-field').addClass("d-none");
        }

        if (interview_time == '') {
            interview_time = 'N/A';
            $('.dd-interview-time').addClass("d-none");
        }

        if (training_date == '') {
            training_date = 'N/A';
            $('.dd-training-date').addClass("d-none");
        }

        if (date_hired == '') {
            date_hired = 'N/A';
            $('.dd-date-hired').addClass("d-none");
        }

        if (result == '') {
            $('.dd-result').addClass("d-none");
        }

        if (score == '') {
            score = 'N/A';
            $('.interview-field-score').addClass("d-none");
        }

        if (interviewed == 1) {
            $('#interviewed-yes').prop('checked', true);
            $('#interviewed-no').prop('checked', false);
            $('.interview-field-score').removeClass("d-none");
        } else {
            $('#interviewed-yes').prop('checked', false);
            $('#interviewed-no').prop('checked', true);
        }

        if (score == 'Passed') {
            $('#exam-passed').prop('checked', true);
            $('#exam-failed').prop('checked', false);
        } else if (score == 'Failed') {
            $('#exam-passed').prop('checked', false);
            $('#exam-failed').prop('checked', true);
        } else {
            $('#exam-passed').prop('checked', false);
            $('#exam-failed').prop('checked', false);
        }

        if (interview_date !== 'N/A') {
            var now = new Date(interview_date);
            months = ['Janunary', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var formattedDate = months[now.getMonth()] + ' ' + now.getDate() + ", " + now.getFullYear();
            var formattedTime = now.toLocaleString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
            $('.dd-interview-date').removeClass("d-none");
            $('.interview-field').removeClass("d-none");
            $('.dd-interview-time').removeClass("d-none");
            $('#setInterviewLabel').html('Interview Details');
            $('#btn-set-interview').html('Interview Details');
            $('#frm-set-interview :input').attr('readonly', 'readonly');
            $('.btn-save').html('Update');
            $('#frm-status').val('Update');
        } else {
            var formattedDate = 'N/A';
            var formattedTime = 'N/A';
        }

        if (result == 'Approved') {
            $('#frm-set-interview').find(':radio:not(:checked)').attr('disabled', true);
            $('.dd-result').removeClass("d-none");
            $('.btn-save').hide();
        } else if (result == 'Hired') {
            $('#frm-set-interview').find(':radio:not(:checked)').attr('disabled', true);
            $('.dd-result').removeClass("d-none");
            $('.btn-save').hide();
            $('#btn-hiring').hide();
        }

        if (date_hired !== 'N/A') {
            $('.dd-date-hired').removeClass("d-none");
        }

        if (score !== 'N/A') {
            $('.interview-field-score').removeClass("d-none");
        }

        $('#interviewed-yes').on('click', function() {
            $('.interview-field-score').removeClass("d-none");
        });

        $('#interviewed-no').on('click', function() {
            $('input[name=exam_score]').prop('checked', false);
            $('.interview-field-score').addClass("d-none");
        });
        
        var hired_date = new Date(date_hired);
        months = ['Janunary', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var formattedDateHired = months[hired_date.getMonth()] + ' ' + hired_date.getDate() + ", " + hired_date.getFullYear();

        $('.hdn-id').val(id);
        $('.hdn-email').val(email);
        $('.hdn-name').val(name);
        $('.hdn-job').val(job);
        $('#image-profile').attr('src', image);
        $('#name').html(name);
        $('#job').html(job);
        $('#age').html(age);
        $('#gender').html(gender);
        $('#address').html(address);
        $('#mobile').html(mobile);
        $('#interview-date').html(formattedDate);
        $('#interview-time').html(formattedTime);
        $('#result').html(result);
        $('#training-date').html(training_date);
        $('#date-hired').html(formattedDateHired);
        $('#interview-title').val(interview_title);
        $('#interview-message').val(interview_message);
        $('.interview-date').val($(e.relatedTarget).data('interview-date'));
        $('#score').html(score);
        $('#appicant-name').html(name);
    });

    $("#frm-set-interview").validate({
        ignore: [],
        debug: false,
        rules: {
            interview_title: {
                required: true
            },
            interview_message: {
                required: true,
            },
            interview_date: {
                required: true
            }
        },
        messages: {
            interview_title: 'Required field cannot be left blank.',
            interview_message: 'Required field cannot be left blank.',
            interview_date: 'Required field cannot be left blank.'
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.form-group'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (frm_add_job_vacancy, e) {
            e.preventDefault();
            if ($.trim($(".btn-save").html()) == 'Save') {
                $('.btn-save').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving');
            } else if ($.trim($(".btn-save").html()) == 'Update') {
                $('.btn-save').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating');
            }
            var data = new FormData($("#frm-set-interview")[0]);

            $.ajax({
                url: '/set-interview',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#tbl-applicant').DataTable().ajax.reload(null, false);
                    $('#frm-set-interview')[0].reset();
                    $('#set-interview').modal('hide');

                    if ($.trim($(".btn-save").html()) == '<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving') {
                        $('.btn-save').removeAttr('disabled', 'disabled').html('Save');
                    } else if ($.trim($(".btn-save").html()) == '<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating') {
                        $('.btn-save').removeAttr('disabled', 'disabled').html('Update');
                    }

                    if ($.trim($(".btn-save").html()) == 'Save') {
                        var message = data.success;
                    } else if ($.trim($(".btn-save").html()) == 'Update') {
                        var message = 'Interview details has been successfully updated.';
                    }

                    $.toast({
                        heading: 'Success!',
                        text: message,
                        position: 'top-right',
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    });
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    });

    $("#frm-hire-applicant").unbind('submit').on('submit', function (event) {
        event.preventDefault();

        var data = new FormData($("#frm-hire-applicant")[0]);

        $('#btn-hire').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Yes');

        $.ajax({
            url: '/hire-applicant',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#btn-hire').removeAttr('disabled', 'disabled').html('Yes');

                $('#hire-applicant').modal('hide');
                $('#tbl-approved-applicant').DataTable().ajax.reload(null, false);

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    position: 'top-right',
                    icon: 'success',
                    hideAfter: 3500
                });
            },
            error: function (xhr, error, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });
});