$(document).ready(function() {
    $('#applicant-profile').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var image = $(e.relatedTarget).data('image');
        var name = $(e.relatedTarget).data('name');
        var job = $(e.relatedTarget).data('job');
        var age = $(e.relatedTarget).data('age');
        var gender = $(e.relatedTarget).data('gender');
        var address = $(e.relatedTarget).data('address');
        var mobile = $(e.relatedTarget).data('mobile');
        var interview_title = $(e.relatedTarget).data('interview-title');
        var interview_message = $(e.relatedTarget).data('interview-message');
        var interview_date = $(e.relatedTarget).data('interview-date');
        var interview_time = $(e.relatedTarget).data('interview-time');
        var result = $(e.relatedTarget).data('result');
        var training_date = $(e.relatedTarget).data('training-date');
        var date_hired = $(e.relatedTarget).data('date-hired');

        if (interview_date == '') {
            interview_date = 'N/A';
        }

        if (interview_time == '') {
            interview_time = 'N/A';
        }

        if (training_date == '') {
            training_date = 'N/A';
        }

        if (date_hired == '') {
            date_hired = 'N/A';
        }

        if (interview_date !== 'N/A') {
            var now = new Date(interview_date);
            months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            var formattedDate = months[now.getMonth()] + ' ' + now.getDate() + ", " + now.getFullYear();
            var formattedTime = now.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        } else {
            var formattedDate = 'N/A';
            var formattedTime = 'N/A';
        }

        $('#hdn-id').val(id);
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
        $('#date-hired').html(date_hired);
        $('#interview-title').val(interview_title);
        $('#interview-message').val(interview_message);
        $('.interview-date').val($(e.relatedTarget).data('interview-date'));
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
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.form-group'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(frm_add_job_vacancy, e) {
            e.preventDefault();
            $('.btn-save').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving')
            var data = new FormData($("#frm-set-interview")[0]);

            $.ajax({
                url: '/set-interview',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#tbl-applicant').DataTable().ajax.reload(null, false);
                    $('#frm-set-interview')[0].reset();
                    $('#set-interview').modal('hide');
                    $('.btn-save').removeAttr('disabled', 'disabled').html('Save')

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
});