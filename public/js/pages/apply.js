$(document).ready(function() {
	$('.btn-read-more').on('click', function() {
		$('#job-title').html($(this).data('job-name'));
		$('#job-description').html($(this).data('job-description'));
		$('.btn-apply').attr('data-id', $(this).data('job-id'));
	})

	$('.btn-apply').on('click', function() {
		var job_id = $(this).data('id');
		setTimeout(function () {
      window.location.href = job_id + '/job-application';
    }, 100);
	})

	$('html, body').on('scroll', function(e){
		var w_height = $('body').height();
		var l_height = $('.left-panel').height();
		var l_outer_height = $('.left-panel').outerHeight() - $('body').scrollTop() - 600;
		var r_height = $(".right-panel").height();
		var windows_height = $(window).height();
		if ($('body').scrollTop() >= r_height) {
				$(".right-panel").css('top', $('body').scrollTop());
		}
		else {
			$(".right-panel").css('top', '0px');
		}
	})
})