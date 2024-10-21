$(document).ready(function() {

    var baseurl=window.location.protocol + "//" + window.location.host + "/";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$(".select2").select2();
	$('.dualselect2').select2({
		placeholder: {
			id: '-1',
			text: 'Not dual measure'
		}
	});
	$('form').parsley();

	function ifValid(data) {
		if(data) {
            $('#addUserBtn').attr('disabled', 'disabled');
		} else {
            $('#addUserBtn').removeAttr('disabled');
		}
	};
	
	  //Email Notification on new lead
	  $('#leadnote').on('keyup keypress', function (e) {
		if ($(this).val().length >= 1) {
		  $('#sendToEmail').show();
		}
	  });
	
	  $('#leadnote').on('keyup', function () {
		if ($(this).val().length == 0) {
		  $('#sendToEmail').hide();
		}
	  });
	
	  $('#sendToEmail').on('click', function () {
		var leadnote = $('#leadnote').val();
		$('#sendnotes').text(leadnote);
	  });

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
	
	$('#username').on('blur keyup change', function() {
        var username = $(this).val();
        checkusername(username);
	});
	
	$('.step').on('click', function() {
		var slug = $('#slug').val();
		var status = $(this).attr('data-status');

		$.ajax({
			url: baseurl + 'jobfilestatus/' + slug,
			type: 'POST',
			data:{'status':status},
			success: function(data) {
				if(status == 'Uploaded by Installer') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').removeClass('activated');
					$('.step[data-status="Documentation Uploaded"]').removeClass('activated');
					$('.step[data-status="Action Needed by Installer"]').removeClass('activated');
					$('.step[data-status="Currently with JFC"]').removeClass('activated');
					$('.step[data-status="Level 1 QA"]').removeClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Documentation Required') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').removeClass('activated');
					$('.step[data-status="Action Needed by Installer"]').removeClass('activated');
					$('.step[data-status="Currently with JFC"]').removeClass('activated');
					$('.step[data-status="Level 1 QA"]').removeClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Documentation Uploaded') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').removeClass('activated');
					$('.step[data-status="Currently with JFC"]').removeClass('activated');
					$('.step[data-status="Level 1 QA"]').removeClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Action Needed by Installer') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').removeClass('activated');
					$('.step[data-status="Level 1 QA"]').removeClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Currently with JFC') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').removeClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Level 1 QA') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').removeClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Installer Amendments Done') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').removeClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Waiting on Second Measure(Dual)') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Ready for Level 2 QA') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').addClass('activated');
					$('.step[data-status="Action Required Level 2"]').removeClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Action Required Level 2') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').addClass('activated');
					$('.step[data-status="Action Required Level 2"]').addClass('activated');
					$('.step[data-status="Level 2 QA"]').removeClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Level 2 QA') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').addClass('activated');
					$('.step[data-status="Action Required Level 2"]').addClass('activated');
					$('.step[data-status="Level 2 QA"]').addClass('activated');
					$('.step[data-status="Approval by Installer"]').removeClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Approval by Installer') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').addClass('activated');
					$('.step[data-status="Action Required Level 2"]').addClass('activated');
					$('.step[data-status="Level 2 QA"]').addClass('activated');
					$('.step[data-status="Approval by Installer"]').addClass('activated');
					$('.step[data-status="Sent to Energy Company"]').removeClass('activated');
				}
				else if(status == 'Sent to Energy Company') {
					$('.step[data-status="Uploaded by Installer"]').addClass('activated');
					$('.step[data-status="Documentation Required"]').addClass('activated');
					$('.step[data-status="Documentation Uploaded"]').addClass('activated');
					$('.step[data-status="Action Needed by Installer"]').addClass('activated');
					$('.step[data-status="Currently with JFC"]').addClass('activated');
					$('.step[data-status="Level 1 QA"]').addClass('activated');
					$('.step[data-status="Installer Amendments Done"]').addClass('activated');
					$('.step[data-status="Waiting on Second Measure(Dual)"]').addClass('activated');
					$('.step[data-status="Ready for Level 2 QA"]').addClass('activated');
					$('.step[data-status="Action Required Level 2"]').addClass('activated');
					$('.step[data-status="Level 2 QA"]').addClass('activated');
					$('.step[data-status="Approval by Installer"]').addClass('activated');
					$('.step[data-status="Sent to Energy Company"]').addClass('activated');
				}
				swal({
					position: 'middle-center',
					type: 'success',
					title: 'Status Updated',
					showConfirmButton: false,
					timer: 1000
				});

				setTimeout(function() {
					location.reload();
				}, 500);
			}
		});
	});

	$('.operator').on('click', function(e) {
		e.stopPropagation();
	});

	$('.wah').on('click', function() {
		alert('test');
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

	$('#lvl1Dropzone').dropzone({
        paramName: 'lvl1',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#lvl2Dropzone').dropzone({
        paramName: 'lvl2',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#additionalInformationDropzone').dropzone({
        paramName: 'additional_information',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#technicalMonitoringDropZone').dropzone({
        paramName: 'technical_monitoring',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#energyCompanyDropzone').dropzone({
        paramName: 'energy_company',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#dssybDropzone').dropzone({
        paramName: 'dssyb',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#picaDropzone').dropzone({
        paramName: 'pica',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#picmDropzone').dropzone({
        paramName: 'picm',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#picsDropzone').dropzone({
        paramName: 'pics',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

	$('#otherDropzone').dropzone({
        paramName: 'other',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {

                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'File Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
				
				setTimeout(function() {
					location.reload();
				}, 1000);
            })
        }
	});

// =========================================================================== //
// Boiler
	var boiler = [
		['bacl_a', 'BACL_A'],
		['bacl_b', 'BACL_B'], 
		['bcom', 'BCOM (GAS & LPG)'], 
		['breq', 'BREQ'],
		['brpq', 'BRPQ'],
		['brvd', 'BRVD'],
		['cban', 'CBAN (if Child Benefit)'],
		['cbsd', 'CBSD (if Child Benefit)'],
		['cd10', 'CD10 (OIL)'], 
		['cd11', 'CD11 (OIL)'], 
		['cd33', 'CD33 (OIL)'], 
		['cusg', 'CUSG'],
		['docc', 'DOCC'],
		['efgm', 'EFGM (if applicable)'],
		['eooc', 'EOOC'],
		['estc', 'ESTC (if DWP provided)'],
		['gase', 'GASE'],
		['hcal', 'HCAL (if POPT less than 100%)'],
		['hhev_ab', 'HHEV_A & B'],
		['hhev_c', 'HHEV_C'],
		['hthe', 'HTHE (if applicable)'],
		['htsc', 'HTSC (GAS & LPG)'],
		['lasi', 'LASI (if applicable)'],
		['lafd', 'LAFD (if applicable)'],
		['pasc', 'PASC'],
		['pcdb_ab', 'PCDB_A & B'],
		['phfd', 'PHFD (PRS or FTCH)'],
		['pibi', 'PIBI'], 
		['pibi_b', 'PIBI_B'],
		['ppes', 'PPES'],  
		['pree', 'PREE (EFG, PRS & LA FLEX)'],
		['pres', 'PRES'],
		['priv', 'PRIV'],
		['pste', 'PSTE (EFG)'],
		['qwod', 'QWOD'],
		['udwp', 'UDWP (if Child Benefit)'],
		['breg', 'BREG'],
		['pics', 'PICS'],
		['picm', 'PICM'],
		['pica', 'PICA'],
		['trust', 'TRUSTMARK SCREEN SHOT'],
		['lctm_a', 'LCTM_A'],
		['lctm_c', 'LCTM_C'],
		['cus_sig', 'CUSTOMER SIGNATURE'],
		['ins_sig', 'INSTALLER SIGNATURE']
	];
  	var boiler_ctr = 0;
	boiler.forEach((_key, value) => {
		var boiler_str = "boiler_dropzone_upload_image_" + boiler_ctr;

		$('#' + boiler_str).dropzone({
			paramName: 'files',
			addRemoveLinks: false,
			thumbnail: false,
			createImageThumbnails: false,
			uploadMultiple: false,
			init: function() {
				this.on("complete", function (file) {
					this.removeFile(file);
				}),
				this.on("queuecomplete", function (file) {
	
					swal({
						position: 'middle-center',
						type: 'success',
						title: 'File Uploaded',
						showConfirmButton: false,
						timer: 1000
					});

					$('#'+boiler_str).addClass('bg-success text-white');
				})
			}
		});
		boiler_ctr++;
	});

// =========================================================================== //
// ESH
	var esh = [
		['breg', 'BREG'],
		['cban', 'CBAN (if Child Benefit)'],
		['cbsd', 'CBSD (if Child Benefit)'],
		['cusg', 'CUSG'],
		['efgm', 'EFGM (if applicable)'],
		['eooc', 'EOOC'],
		['estc', 'ESTC (if DWP provided)'],
		['hcal', 'HCAL'],
		['hhev_ab', 'HHEV_A & B'],
		['hhev_c', 'HHEV_C'],
		['hthe', 'HTHE (if applicable)'],
		['lasi', 'LASI (if applicable)'],
		['lafd', 'LAFD (if applicable)'],
		['pasc', 'PASC'],
		['phfd', 'PHFD (PRS or FTCH)'],
		['pibi', 'PIBI'], 
		['pibi_b', 'PIBI_B'],
		['ppes', 'PPES'],
		['pree', 'PREE (EFG, PRS & LA FLEX)'],
		['pres', 'PRES'],
		['priv', 'PRIV'],
		['pste', 'PSTE (EFG)'],
		['ubil', 'UBIL'], 
		['udwp', 'UDWP (if Child Benefit)'],
		['pics', 'PICS'],
		['picm', 'PICM'],
		['pica', 'PICA'],
		['trust', 'TRUSTMARK SCREEN SHOT'],
		['qwod', 'QWOD'],
		['ltsm_a', 'LTSM_A'],
		['lctm_c', 'LCTM_C'],
		['cus_sig', 'CUSTOMER SIGNATURE'],
		['ins_sig', 'INSTALLER SIGNATURE']
	];
  	var esh_ctr = 0;
	esh.forEach((_key, value) => {
		var esh_str = "esh_dropzone_upload_image_" + esh_ctr;

		$('#' + esh_str).dropzone({
			paramName: 'files',
			addRemoveLinks: false,
			thumbnail: false,
			createImageThumbnails: false,
			uploadMultiple: false,
			init: function() {
				this.on("complete", function (file) {
					this.removeFile(file);
				}),
				this.on("queuecomplete", function (file) {
	
					swal({
						position: 'middle-center',
						type: 'success',
						title: 'File Uploaded',
						showConfirmButton: false,
						timer: 1000
					});

					$('#'+esh_str).addClass('bg-success text-white');
				})
			}
		});
		esh_ctr++;
	});

// =========================================================================== //
// Loft
var loft = [
	['breg', 'BREG'],
    ['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['docc', 'DOCC'],
	['efgm', 'EFGM (if applicable)'],
	['estc', 'ESTC (if DWP provided)'],
	['hhev_ab', 'HHEV_A & B'],
    ['hhev_c', 'HHEV_C'],
    ['hthe', 'HTHE (if applicable)'],
    ['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['ldec', 'LDEC'],
	['misc', 'MISC'],
    ['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pibi', 'PIBI'],
	['pibi_b', 'PIBI_B'],
    ['pree', 'PREE (EFG, PRS & LA FLEX)'],
    ['pres', 'PRES'],
	['priv', 'PRIV'],
	['pste', 'PSTE (EFG)'],
	['udwp', 'UDWP (if Child Benefit)'],
	['pics', 'PICS'],
	['picm', 'PICM'],
	['pica', 'PICA'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['lctm_a', 'LCTM_A'],
	['lctm_b', 'LCTM_B'],
	['lctm_c', 'LCTM_C'],
	['qwod', 'QWOD'],
	['cus_sig', 'CUSTOMER SIGNATURE'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var loft_ctr = 0;
loft.forEach((_key, value) => {
	var loft_str = "loft_dropzone_upload_image_" + loft_ctr;

	$('#' + loft_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+loft_str).addClass('bg-success text-white');

			})
		}
	});
	loft_ctr++;
});

// =========================================================================== //
// FTCH
var ftch = [
	['bacl_a', 'BACL_A'],
	['bacl_b', 'BACL_B'], 
	['bcom', 'BCOM (GAS & LPG)'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['cd10', 'CD10 (OIL)'],
	['cd11', 'CD11 (OIL)'],
	['cd33', 'CD33 (OIL)'],
	['cusg', 'CUSG'],
	['efgm', 'EFGM (if applicable)'],
	['eooc', 'EOOC'],
	['estc', 'ESTC (if DWP provided)'],
	['gase', 'GASE'],
	['hcal', 'HCAL (if POPT less than 100%)'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['htsc', 'HTSC (GAS & LPG)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['pasc', 'PASC'],
	['pccr', 'PCCR'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['ppes', 'PPES'],  
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['qwod', 'QWOD'],
	['udwp', 'UDWP (if Child Benefit)'],
	['breg', 'BREG'],
	['lctm_a', 'LCTM_A'],
	['lctm_c', 'LCTM_C'],
	['cus_sig', 'CUSTOMER SIGNATURE'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var ftch_ctr = 0;
ftch.forEach((_key, value) => {
	var ftch_str = "ftch_dropzone_upload_image_" + ftch_ctr;

	$('#' + ftch_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+ftch_str).addClass('bg-success text-white');
			})
		}
	});
	ftch_ctr++;
});

// =========================================================================== //
// Cavity Wall
var cavity = [
	['breg', 'BREG'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['cusg', 'CUSG'],
    ['eooc', 'EOOC'],
	['efgm', 'EFGM (if applicable)'],
	['estc', 'ESTC (if DWP provided)'],
	['hhev_ab', 'HHEV_A & B'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pibi', 'PIBI'],
	['pibi_b', 'PIBI_B'],
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['pres', 'PRES'],
	['priv', 'PRIV'],
	['pste', 'PSTE (EFG)'],
	['udwp', 'UDWP (if Child Benefit)'],
	['pics', 'PICS'],
	['picm', 'PICM'],
	['pica', 'PICA'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['lctm_a', 'LCTM_A'],
	['lctm_c', 'LCTM_C'],
	['cus_sig', 'CUSTOMER SIGNATURE'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var cavity_ctr = 0;
cavity.forEach((_key, value) => {
	var cavity_str = "cavity_dropzone_upload_image_" + cavity_ctr;

	$('#' + cavity_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+cavity_str).addClass('bg-success text-white');
			})
		}
	});
	cavity_ctr++;
});

// =========================================================================== //
// Solid Wall
var solid = [
	['breg', 'BREG'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['cusg', 'CUSG'],
	['docc', 'DOCC'],
	['efgm', 'EFGM (if applicable)'], 
	['eooc', 'EOOC'], 
	['estc', 'ESTC (if DWP provided)'],
	['hhev_ab', 'HHEV_A & B'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['misc', 'MISC'],
	['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pibi', 'PIBI'],
	['pibi_b', 'PIBI_B'],
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['pres', 'PRES'],
	['priv', 'PRIV'],
	['pste', 'PSTE (EFG)'],
	['udwp', 'UDWP (if Child Benefit)'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['lctm_a', 'LCTM_A'],
	['lctm_c', 'LCTM_C'],
	['cus_sig', 'CUSTOMER SIGNATURE'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var solid_ctr = 0;
solid.forEach((_key, value) => {
	var solid_str = "solid_dropzone_upload_image_" + solid_ctr;

	$('#' + solid_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+solid_str).addClass('bg-success text-white');
			})
		}
	});
	solid_ctr++;
});

// =========================================================================== //
// RIRI
var riri = [
	['breg', 'BREG'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['cdva', 'CDVA'],
	['docc', 'DOCC'],
	['efgm', 'EFGM (if applicable)'],
	['estc', 'ESTC (if DWP provided)'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['pres', 'PRES'],
	['priv', 'PRIV'],
	['riri', 'RIRI'],
	['udwp', 'UDWP (if Child Benefit)'],
	['lctm_a', 'LCTM_A'],
	['lctm_c', 'LCTM_C'],
	['qwod', 'QWOD'],
	['dssy_a', 'DSSY_A'],
	['docc_a', 'DOCC_A'], 
	['misc_a', 'MISC_A'], 
	['pica_a', 'PICA_A'],
	['picp_a', 'PICP_A'],
	['picm_b', 'PICM_B'], 
	['riri_a', 'RIRI_A'],
	['priv_a', 'PRIV_A'],
	['pmhs_a', 'PMHS_A'],
	['epop_a', 'EPOP_A'], 
	['ubil_a', 'UBIL_A'],
	['pibi_b', 'PIBI_B'],
	['pibi_a', 'PIBI_A'], 
	['breg_a', 'BREG_A'], 
	['pasc_a', 'PASC_A'], 
	['ccsc_a', 'CCSC_A'], 
	['floor_plan', 'FLOOR PLAN'], 
	['hhev_a', 'HHEV_A'],  
	['tenancy', 'TENANCY AGREEMENT'], 
	['landlord', 'LANDLORD PERMISSION'], 
	['dwp', 'DWP MATCH'], 
	['cus_sig', 'CUSTOMER SIGNATURE'], 
	['eng_sig', 'ENGINEER SIGNATURE'], 
	['picp', 'PICP'],
	['misc_cus', 'MISC_CUS'],  
	['misc_risk', 'MISC_RISK'], 
	['misc_accident', 'MISC_ACCIDENT'], 
	['misc_term', 'MISC_TERMS'], 
	['misc_waiver', 'MISC_WAIVER'], 
	['asbr_a', 'ASBR_A'], 
	['pre_epc', 'PRE_EPC'],
	['post_epc', 'POST_EPC'],
	['pics', 'PICS'],
	['picm', 'PICM'],
	['pica', 'PICA'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var riri_ctr = 0;
riri.forEach((_key, value) => {
	var riri_str = "riri_dropzone_upload_image_" + riri_ctr;

	$('#' + riri_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+riri_str).addClass('bg-success text-white');
			})
		}
	});
	riri_ctr++;
});

// =========================================================================== //
// INTERNAL WALL INSULATION
var iwi = [
	['breg', 'BREG'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['cdva', 'CDVA'],
	['cusg', 'CUSG'],
	['dssy_b', 'DSSY_B'],
	['efgm', 'EFGM (if applicable)'],
	['eooc', 'EOOC'],
	['estc', 'ESTC (if DWP provided)'],
	['epop', 'EPOP'],
	['hhev_ab', 'HHEV_A & B'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pibi', 'PIBI'],
	['pibi_b', 'PIBI_B'],
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['pres', 'PRES'],
	['priv', 'PRIV'],
	['pste', 'PSTE (EFG)'],
	['udwp', 'UDWP (if Child Benefit)'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['lctm_a', 'LCTM_A'],
	['lctm_c', 'LCTM_C'],
	['cus_sig', 'CUSTOMER SIGNATURE'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var iwi_ctr = 0;
iwi.forEach((_key, value) => {
	var iwi_str = "iwi_dropzone_upload_image_" + iwi_ctr;

	$('#' + iwi_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+iwi_str).addClass('bg-success text-white');
			})
		}
	});
	iwi_ctr++;
});

// =========================================================================== //
// UNDERFLOOR WALL INSULATION
var ufi = [
	['breg', 'BREG'],
	['cban', 'CBAN (if Child Benefit)'],
	['cbsd', 'CBSD (if Child Benefit)'],
	['docc', 'DOCC'],
	['efgm', 'EFGM (if applicable)'],
	['estc', 'ESTC (if DWP provided)'],
	['hhev_c', 'HHEV_C'],
	['hthe', 'HTHE (if applicable)'],
	['lasi', 'LASI (if applicable)'],
	['lafd', 'LAFD (if applicable)'],
	['misc', 'MISC (daily checks/flues&vents)'],
	['pasc', 'PASC'],
	['phfd', 'PHFD (PRS or FTCH)'],
	['pree', 'PREE (EFG, PRS & LA FLEX)'],
	['pres', 'PRES'],
	['priv', 'PRIV'],
	['udwp', 'UDWP (if Child Benefit)'],
	['ltsm_a', 'LTSM_A'],
	['lctm_c', 'LCTM_C'],
	['qwod', 'QWOD'],
	['pibi_a', 'PIBI_A'], 
	['dssy_a', 'DSSY_A'], 
	['misc_a', 'MISC_A'],
	['picp', 'PICP'], 
	['pica', 'PICA'],
	['pmhs', 'PMHS (PreMain Heating Source)'], 
	['pibi_b', 'PIBI_B'],
	['land_registry', 'LAND REGISTRY'],
	['ubil', 'UBIL'],
	['dwp', 'DWP MATCH CONFIRMATION'],
	['eng_sig', 'ENGINEER SIGNATURE'], 
	['cus_sig', 'CUSTOMER SIGNATURE SPECIMEN'], 
	['epop', 'EPOP (EXTERNAL PHOTO OF PROPERTY)'], 
	['floor_plan', 'FLOOR PLAN'],
	['ldec', 'LDEC (LOFT INSULATION DECLARATION FORM)'], 
	['tenancy_agreement', 'TENANCY AGREEMENT'], 
	['landlord_permission', 'LANDLORD PERMISSION'],
	['pics', 'PICS'],
	['picm', 'PICM'],
	['trust', 'TRUSTMARK SCREEN SHOT'],
	['ins_sig', 'INSTALLER SIGNATURE']
];
  var ufi_ctr = 0;
ufi.forEach((_key, value) => {
	var ufi_str = "uwi_dropzone_upload_image_" + ufi_ctr;

	$('#' + ufi_str).dropzone({
		paramName: 'files',
		addRemoveLinks: false,
		thumbnail: false,
		createImageThumbnails: false,
		uploadMultiple: false,
		init: function() {
			this.on("complete", function (file) {
				this.removeFile(file);
			}),
			this.on("queuecomplete", function (file) {

				swal({
					position: 'middle-center',
					type: 'success',
					title: 'File Uploaded',
					showConfirmButton: false,
					timer: 1000
				});

				$('#'+ufi_str).addClass('bg-success text-white');
			})
		}
	});
	ufi_ctr++;
});

// =================================================================================================== //
// DSSY_B UPLOADS
	var dssy_b = [
		['Elevations', ['front', 'rear', 'sides']],
		['Hallway', ['hallway1', 'hallway2']],
		['Landing', ['landing1', 'landing2']],
		['Living Room', ['living_room1', 'living_room2', 'living_room3']],
		['Dining Room', ['dining_room']],
		['Kitchen', ['kitchen']],
		['Bathrooms', ['bathroom1','bathroom2','bathroom3','bathroom4']],
		['Stairs', ['stairs']],
		['Bedrooms', ['bedroom1','bedroom2','bedroom3','bedroom4','bedroom5', 'bedroom6', 'bedroom7', 'bedroom8']],
		['Garadge', ['garadge']],
		['Conservatory', ['conservatory']],
		['Utility Room', ['utility_room']],
		['Wall Thickness Measurement', ['wall_thickness']],
		['Pre-main Heating Source/Sources', ['pre-main']],
		['Room Stat', ['room_stat']],
		['LPG Bootles or Tank', ['lpg_bottles']],
		['Oil Tank', ['oil_tank']],
		['Data Badge', ['data_badge']],
		['Flue', ['flue']],
		['Room Stat', ['room_stat']],
		['Programmer', ['programmer']],
		['Fuse Spur', ['fuse_spur']],
		['Gas / Electric Meter', ['gas_electric']],
		['Electric Meter', ['electric_meter']],
		['Room-In-Roof', ['room_in_roof']],
		['Residual Area', ['residual_area']],
		['Picture of Cavity Hole Depth', ['hole_depth']],
		['Picture of Installer Taking Borescope Picture', ['borescope_picture']],
		['Actual Borescope Image from Borescope', ['borescope_image']],
		['Loft Declaration & Warning Sign in Loft', ['delcaration']],
	];

	dssy_b_ctr = 0;
	dssy_b.forEach((key, value) => {
	  key[1].forEach((v) => {
		var dssy_b_str = "dropzone_dssy_b" + dssy_b_ctr;
		var fieldname = v;
		$('#' + dssy_b_str).dropzone({
			paramName: 'files',
			addRemoveLinks: false,
			thumbnail: false,
			createImageThumbnails: false,
			uploadMultiple: false,
			init: function() {
				this.on("complete", function (file) {
					this.removeFile(file);
				}),
				this.on("queuecomplete", function (file) {
	
					swal({
						position: 'middle-center',
						type: 'success',
						title: 'File Uploaded',
						showConfirmButton: false,
						timer: 1000
					});

					$('#'+dssy_b_str).addClass('bg-success text-white');
				})
			}
		});
		dssy_b_ctr++;
	  });
	});

	$('.changeCampaignBtn').on('click', function() {
		var campaignID = $('.changeCampaignField').val();
		var id = $('.jobFileID').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'changecampaign',
			data: {'campaign_id': campaignID, 'id': id},
			success: function(data) {
				swal({
					position: 'middle-center',
					type: 'success',
					title: 'Campaign Measure Changed',
					showConfirmButton: false,
					timer: 1000
				});

				setTimeout(function() {
					location.reload();
				}, 1000)
			}
		})
	});

	$('#saveJFC').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#jfcList').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignJFC',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'JFC has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.jfcinfo').text(data['name']);
				$('.operator').removeClass('show');
			}
		});
	});

	$('#saveLvl1').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#lvl1qaList').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignQA1',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'QA Level 1 has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.lvl1qainfo').text(data['name']);
				$('.operator').removeClass('show');
			}
		});
	});

	$('#saveLvl2').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#lvl2qaList').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignQA2',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'QA Level 2 has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.lvl2qainfo').text(data['name']);
				$('.operator').removeClass('show');
			}
		});
	});

	$('#saveRaw').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#rawfileList').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignRawFile',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Raw File has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.rawfileinfo').text(data['name']);
				$('.operator').removeClass('show');
			}
		});
	});

	$('#saveSurveyor').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#surveyorList').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignSurveyor',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Surveyor has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.surveyorinfo').text(data['name']);
				$('.operator').removeClass('show');
			}
		});
	});

	$('#saveInstaller').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#installerList').val();
		$.ajax({
			type: 'POST', 
			url: baseurl + 'assignInstaller',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Installer Operative has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.installerinfo').text(data['name']);
				$('.operator').removeClass('show');
				$("#installerListDual option[value='" + id + "']").remove();
			}
		});
	});
	
	$('#saveInstallerDual').on('click', function() {
		var slug = $(this).attr('data-slug');
		var id = $('option:selected', '#installerListDual').val();
		$.ajax({
			type: 'POST',
			url: baseurl + 'assignInstallerDual',
			data: {'slug':slug,'id':id},
			success: function(data) {
				swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Installer Dual Operative has been assigned to this job file',
                    showConfirmButton: false,
                    timer: 1000
				});
				
				$('.installerinfo_dual').text(data['name']);
				$('.operator').removeClass('show');
				$("#installerList option[value='" + id + "']").remove();
			}
		});
	});

	$('.h1_select').on('change', function() {
		var h1 = $(this).val();
		if(h1=='No') {
			$('.submitBtn').attr('disabled', 'disabled');
		}
	});

	$('.tm_field').blur(function() {
        if(!$(this).val()){
            $('.submitBtn').attr('disabled', 'disabled');
        } else{
            $('.submitBtn').removeAttr('disabled');
        }
	});

	$('#sendEmailBtn').on('click', function(e){
		e.preventDefault();
		var sendto = $('#sendto').val();
		var subject = $('#subject').val();
		var sendnotes = $('#sendnotes').val();
		var name = $('#name').val();
		var leadurl = $('#url').val();
		var username = $('#userid').attr('data-name');

		$.ajax({
		  type: "POST",
		  url: baseurl + 'sendemail',
		  async: true,
		  data: {
			'sendto': sendto,
			'subject': subject,
			'sendnotes': sendnotes,
			'name': name,
			'leadurl': leadurl,
			'username': username
		  },
		  success: function (data) {
			$('#sendEmail').modal('hide');
			swal({
				position: 'middle-center',
				type: 'success',
				title: 'Email Sent',
				showConfirmButton: false,
				timer: 1000
			});
		  },
		});

	});

	$('.notes.well').on('click', '.deleteleadcomment', function (e) {

		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
	
		e.preventDefault();
		var comment = $('.deleteleadcomment2').attr('data-content');
		var slug = $('.deleteleadcomment2').attr('data-slug');

		swal({
			title: 'Are you sure?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if(result.value) {

				$.ajax({
					type: "POST",
					url: baseurl + "deletecomment/" + slug,
					data: {'note':comment},
					success: function(data) {
						swal('Deleted!', 'note has been deleted', 'success');
						setTimeout(function(){
							location.reload()
						},500);						
					}
				});
			}
		});
	});

	$('.filesli').on('click', '.deletefile', function (e) {

		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
	
		e.preventDefault();
		var id = $(this).attr('data-id');
		var path = $(this).attr('data-path');

		swal({
			title: 'Are you sure?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if(result.value) {

				$.ajax({
					type: "DELETE",
					url: baseurl + "deleteattachment/" + id,
					data: {'path':path},
					success: function(data) {
						swal('Deleted!', 'attachment has been deleted', 'success');
						setTimeout(function(){
							location.reload()
						},500);						
					}
				});
			}
		});

	});
	
});