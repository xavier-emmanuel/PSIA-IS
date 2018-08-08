$(document).ready(function() {
	$('.btn-read-more').on('click', function() {
		$('#job-title').html($(this).data('job-name'));
		$('#job-description').html($(this).data('job-description'));
		$('#btn-apply').attr('data-id', $(this).data('job-id'));
	})
})