$(document).ready(function() {

    var baseurl=window.location.protocol + "//" + window.location.host + "/";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$(".select2").select2();

	$('form').parsley();

	function ifValid(data) {
		if(data) {
            $('#addUserBtn').attr('disabled', 'disabled');
            $('#addIssueBtn').attr('disabled', 'disabled');
		} else {
            $('#addUserBtn').removeAttr('disabled');
            $('#addIssueBtn').removeAttr('disabled');
		}
	};

	function checkusername(username) {
        $.ajax({
            type: 'POST',
            url: baseurl + '/checkusername',
            data: {'username':username},
            success: function(data) {
                if(data) {
                    $('.usernamecheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username has been taken"> <small>Username has been taken</small></i>');
                    $('#username').removeClass('validuser');
                    ifValid(data);
                } else {
                    $('.usernamecheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username is available"> <small>Username is available</small></i>');
                    $('#username').addClass('validuser');
                    ifValid();
                }
            }
        })
	};

	function checkissue(issue) {
        $.ajax({
            type: 'POST',
            url: baseurl + '/checkissue',
            data: {'type':issue},
            success: function(data) {
                if(data) {
                    $('.issuecheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username has been taken"> <small>Username has been taken</small></i>');
                    $('#issueType').removeClass('validuser');
                    ifValid(data);
                } else {
                    $('.issuecheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username is available"> <small>Username is available</small></i>');
                    $('#issueType').addClass('validuser');
                    ifValid();
                }
            }
        })
	};
	
	$('#username').on('blur keyup change', function() {
        var username = $(this).val();
        checkusername(username);
	});
	
	$('#issueType').on('blur keyup change', function() {
        var issue = $(this).val();
        checkissue(issue);
	});
	
    $('.btn-delete').on('click', function(e) {
		e.preventDefault();

		swal({
			title: 'Are you sure?',
			text: 'You will not be able to recover this information!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if(result.value) {
				var id = $(e.currentTarget).attr('id');
				var module = $(e.currentTarget).attr('data-module');
				var name = $(e.currentTarget).attr('data-name');
				var datatable = "table";

				if(module == 'position') {
					var url = document.location.origin + "/admin/position/delete/" + id;
				} else if(module == 'user') {
                    var url = document.location.origin + "/admin/user/delete/" + id;
                }

				var data = "id="+id;
				$.ajax({
					type: "DELETE",
					url: url,
					data: data,
					success: function(data) {
						console.log(data);
						if(data) {
							$('.' + datatable).DataTable().row($(e.currentTarget).parents('tr')).remove().draw(false);
							swal('Deleted!', name + ' has been deleted', 'success');
						} else {
							if(module == 'position') {
								swal('Error!', name + ' has 1 or more user assigned', 'warning');
							} else {
								swal('Error!', 'something went wrong', 'warning');
							}
						}
					}
				});
			}
		});
	});
	
});