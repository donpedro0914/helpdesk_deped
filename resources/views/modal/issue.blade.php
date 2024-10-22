<div id="addIssue" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h4 class="modal-title">Add New Issue Type</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.issue.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group col-md-12 col-xs-12">
								<label>Issue Type</label> <span class="issuecheck"></span>
								<input type="text" class="form-control" id="issueType" name="type" required />
							</div>
						</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addIssueBtn" class="btn btn-success">
                                    Add Issue Type
                                </button>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>