$(document).ready(function() {
	var slug = function(str) {
		str = str.replace(/^\s+|\s+$/g, '');
		str = str.toLowerCase();

		var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
		var to = "aaaaaeeeeeiiiiooooouuuunc------";
		for (var i = 0, l = from.length; i < l; i++) {
			str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
		}

		str = str.replace(/[^a-z0-9 -]/g, '')
			.replace(/\s+/g, '-')
			.replace(/-+/g, '-');

		return str;
	};

	$('#report-applicant-name').on('change', function() {
		var name = $(this).find('option:selected').data('name');
		$('#hdn-report-id').val(this.value);
		$('#hdn-report-name').val(slug(name));
	});

	$("#btn-generate").unbind('click').on('click', function(event) {
		event.preventDefault();
		var id = $('#hdn-report-id').val();
		var name = $('#hdn-report-name').val();

		$('#btn-generate').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Generating');

		setTimeout(function() {
			$('#btn-generate').removeAttr('disabled', 'disabled').html('Generate');
			var new_tab = window.open('/reports/application-form-report/'+ id +'/'+ name +'','_blank');
			if (new_tab) {
			    new_tab.focus();
			} else {
			    alert('Please allow popups for this website.');
			}
		}, 2000);
	});
});