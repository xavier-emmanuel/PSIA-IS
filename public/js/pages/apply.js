$(document).ready(function() {
	$('.btn-read-more').on('click', function() {
		$('#job-title').html($(this).data('job-name'));
		$('#number-of-vacancy').html($(this).data('job-vacancy'));
		$('#job-description').html($(this).data('job-description'));
		$('.btn-apply').attr('data-id', $(this).data('job-id'));
		var job_id = $(this).data('job-id');
		var user_id = $(this).data('user-id');
		if(job_id == user_id) {
			$('#btn-apply').hide();
			$('#btn-applied').show();
		} else if (job_id != user_id && user_id != '') {
			$('#btn-applied').hide();
			$('#btn-apply').show();
		}
	})

	$('.btn-apply').on('click', function() {
		var job_id = $(this).data('id');
		setTimeout(function () {
      window.location.href = job_id + '/job-application';
    }, 100);
	})
})