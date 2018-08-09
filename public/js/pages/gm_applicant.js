$(document).ready(function () {
    $('#applicant-profile').on('show.bs.modal', function (e) {
        $('#btn-approval').show();
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
            date_hired = $(e.relatedTarget).data('date-hired');
            interviewed = $(e.relatedTarget).data('interviewed'),
            score = $(e.relatedTarget).data('score');

        if (interview_date == '') {
            interview_date = 'N/A';
            $('.dd-interview-date').addClass("d-none");
            $('.dd-interviewed').addClass("d-none");
            $('.dd-interview-score').addClass("d-none");
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
            result = 'N/A';
            $('.dd-result').addClass("d-none");
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
            $('.dd-interview-time').removeClass("d-none");
            $('.dd-interviewed').removeClass("d-none");
            $('.dd-interview-score').removeClass("d-none");
        } else {
            var formattedDate = 'N/A';
            var formattedTime = 'N/A';
        }

        if (result !== 'N/A') {
            $('.dd-result').removeClass("d-none");
            $('#btn-approval').hide();
        }

        $('#hdn-id').val(id);
        $('#hdn-email').val(email);
        $('#hdn-name').val(name);
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
        $('#score').html(score);
        $('#appicant-name').html(name);
    });

    $("#frm-approve-applicant").unbind('submit').on('submit', function (event) {
        event.preventDefault();

        var data = new FormData($("#frm-approve-applicant")[0]);

        $('#btn-approve').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Yes');

        $.ajax({
            url: '/approve-applicant',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#btn-approve').removeAttr('disabled', 'disabled').html('Yes');

                $('#approve-applicant').modal('hide');
                $('#tbl-evaluated-applicants').DataTable().ajax.reload(null, false);

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