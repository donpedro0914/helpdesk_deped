<div id="addUser" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h4 class="modal-title">Add New User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group col-md-12 col-xs-12">
								<h5>Basic Information</h5>
								<hr>
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>Full Name</label>
								<input type="text" class="form-control" name="name" required />
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>E-mail Address</label>
								<input type="email" class="form-control" name="email" required />
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>Role</label>
								<select name="role" class="form-control" id="employeePosition" required>
									<option value="">-- Select Postion --</option>
									<option value="Teacher/Staff">Teacher/Staff</option>
									<option value="Supervisor/Manager">Supervisor/Manager</option>
									<option value="HelpDesk Agent">HelpDesk Agent</option>
								</select>
							</div>
						</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <h5>Account Information</h5>
                            <hr>
                        </div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Username</label> <span class="usernamecheck"></span>
							<input type="text" id="username" class="form-control" name="username" required/>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Password</label>
							<input type="password" class="form-control" name="password" required/>
						</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addUserBtn" class="btn btn-success">
                                    Add User
                                </button>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>