var tbl_job_vacancy;
var add_job_vacancy_form;
var edit_job_vacancy_form;

$(document).ready(function() {
  jQuery.fn.dataTable.render.ellipsis = function ( cutoff, wordbreak, escapeHtml ) {
    var esc = function ( t ) {
        return t
            .replace( /&/g, '&amp;' )
            .replace( /</g, '&lt;' )
            .replace( />/g, '&gt;' )
            .replace( /"/g, '&quot;' );
    };
 
    return function ( d, type, row ) {
        // Order, search and type get the original data
        if ( type !== 'display' ) {
            return d;
        }
 
        if ( typeof d !== 'number' && typeof d !== 'string' ) {
            return d;
        }
 
        d = d.toString(); // cast numbers
 
        if ( d.length <= cutoff ) {
            return d;
        }
 
        var shortened = d.substr(0, cutoff-1);
 
        // Find the last white space character in the string
        if ( wordbreak ) {
            shortened = shortened.replace(/\s([^\s]*)$/, '');
        }
 
        // Protect against uncontrolled HTML input
        if ( escapeHtml ) {
            shortened = esc( shortened );
        }
 
        return '<span class="ellipsis" title="'+esc(d)+'">'+shortened+'&#8230;</span>';
    };
	};

  tbl_job_vacancy = $('#tbl-job-vacancy').DataTable({
  	'ajax': {
			url: '/job-vacancy/show',
			type: 'GET'
		},
		columnDefs: [ {
        targets: 3,
        render: $.fn.dataTable.render.ellipsis(50)
    } ]
  });

  CKEDITOR.replace('job_description');
  CKEDITOR.replace('edit_job_description');

	addJobVacancy();
	updateJobVacancy();
	deleteJobVacancy();
})

function addJobVacancy() {
	$('#btn-add-job-vacancy').on('click', function() {
		$('#frm-add-job-vacancy')[0].reset();
		$('.image-preview').hide();
		add_job_vacancy_form.resetForm();
		$('input').removeClass('error');
		$('textarea').removeClass('error');
	})
	
	add_job_vacancy_form = $("#frm-add-job-vacancy").validate({
    ignore: [],
    debug: false,
    rules: {
        job_name: {
            required: true
        },
        no_of_vacancy: {
            required: true,
            min: 1
        },
        job_image: {
            required: true,
            extension: "jpg|png|jpeg"
        },
        hiring_status: "required",
        job_description: {
            required: function() {
                CKEDITOR.instances.job_description.updateElement();
            },
            minlength: 10
        }
    },
    messages: {
        job_name: 'Required field cannot be left blank.',
				no_of_vacancy: {
					required: 'Required field cannot be left blank.',
					min: 'Value must be equal or greater than 1.'
				},
				job_image: {
					required: 'Required field cannot be left blank.',
					extension: 'Invalid file. Please select valid image file and try again.'
				},
				job_description: {
					required: 'Required field cannot be left blank.'
				},
				hiring_status: 'Please select from the options.'
    },errorPlacement: function(error, element) {
      if ( element.is(":radio") ) {
        error.appendTo( element.parents('.form-group') );
      } else { 
        error.insertAfter( element );
      }
    },
    submitHandler: function (frm_add_job_vacancy, e) {
			e.preventDefault();
			$('#add-job-vacancy-btn').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving')
			var data = new FormData($("#frm-add-job-vacancy")[0]);

			$.ajax({
				url: '/job-vacancy/create',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					tbl_job_vacancy.ajax.reload(null, false);
					$('#frm-add-job-vacancy')[0].reset();
					CKEDITOR.instances.job_description.setData('');
					$('#add-job-vacancy').modal('hide');
					$('.modal-backdrop').hide();
					$('#add-job-vacancy-btn').removeAttr('disabled', 'disabled').html('Save')


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
}

function updateJobVacancy() {
	$(document).on('click', '.btn-edit-job-vacancy', function() {
		$('#frm-edit-job-vacancy')[0].reset();
		edit_job_vacancy_form.resetForm();
		$('input').removeClass('error');
		$('textarea').removeClass('error');
		var id = $(this).data('id');

		$.ajax({
			url: '/job-vacancy/update-show',
			type: 'get',
			data: {job_id:id},
			success: function(job) {
				CKEDITOR.instances.edit_job_description.setData(job.description);
				$('#hdn-edit-job-id').val(job.id);
				$('#edit-job-name').val(job.name);
				$('#edit-no-of-vacancy').val(job.no_of_vacancy);
				
				if (job.hiring_status == 1) {
					$('#edit-hiring-status1').attr('checked', true);
					$('#edit-hiring-status2').attr('checked', false);
				} else {
					$('#edit-hiring-status1').attr('checked', false);
					$('#edit-hiring-status2').attr('checked', true);
				}
			}
		});
	});

	edit_job_vacancy_form = $('#frm-edit-job-vacancy').validate({
		ignore: [],
    debug: false,
    rules: {
        edit_job_name: {
            required: true
        },
        edit_no_of_vacancy: {
            required: true,
            min: 1
        },
        edit_job_image: {
            required: false,
            extension: "jpg|png|jpeg"
        },
        edit_hiring_status: "required",
        edit_job_description: {
            required: function() {
                CKEDITOR.instances.edit_job_description.updateElement();
            },
            minlength: 10
        }
    },
    messages: {
        edit_job_name: 'Required field cannot be left blank.',
				edit_no_of_vacancy: {
					required: 'Required field cannot be left blank.',
					min: 'Value must be equal or greater than 1.'
				},
				edit_job_image: {
					required: 'Required field cannot be left blank.',
					extension: 'Invalid file. Please select valid image file and try again.'
				},
				edit_job_description: {
					required: 'Required field cannot be left blank.'
				},
				edit_hiring_status: 'Please select from the options.'
    },errorPlacement: function(error, element) {
      if ( element.is(":radio") ) {
        error.appendTo( element.parents('.form-group') );
      } else { 
        error.insertAfter( element );
      }
    },
		submitHandler: function (frm_edit_job_vacancy, e) {
			e.preventDefault();
			$('#edit-job-vacancy-btn').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating')
			CKEDITOR.instances.edit_job_description.updateElement();
			var data = new FormData($("#frm-edit-job-vacancy")[0]);

			$.ajax({
				url: '/job-vacancy/update',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					tbl_job_vacancy.ajax.reload(null, false);
					$('#frm-edit-job-vacancy')[0].reset();
					$('#edit-job-vacancy').modal('hide');
					$('.modal-backdrop').hide();
					$('#edit-job-vacancy-btn').removeAttr('disabled', 'disabled').html('Update')


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
}

function deleteJobVacancy() {
	$(document).on('click', '.btn-delete-job-vacancy', function() {
		var id = $(this).data('id');
		var name = $(this).data('name');

		$('#hdn-delete-job-id').val(id);
		$('#job-name-show').text(name);
	})

	$('#frm-delete-job-vacancy').on('submit').bind('submit', function(e) {
		e.preventDefault();
		$('#delete-job-vacancy-btn').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Deleting')
		var data = new FormData($("#frm-delete-job-vacancy")[0]);

		$.ajax({
			url: '/job-vacancy/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				tbl_job_vacancy.ajax.reload(null, false);
				$('#frm-delete-job-vacancy')[0].reset();
				$('#delete-job-vacancy').modal('hide');
				$('.modal-backdrop').hide();
				$('#delete-job-vacancy-btn').removeAttr('disabled', 'disabled').html('Delete')

				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	})
}